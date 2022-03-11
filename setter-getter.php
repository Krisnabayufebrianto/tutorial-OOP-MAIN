<?php
class Produk
{
    //kita akan mengubah property nya menjadi private
    private
        $merk,
        $tipe,
        $transmisi,
        $kondisi,
        $kilometer,
        $kategori,
        $diskon;

    //membuat variabel harga tidak bisa di akses sembarangan    
    private $harga;


    //kenapa ada __ karena construct adalah salah magic methode (methode yang spesial yan dimiliki oleh php)
    public function __construct($merk = "merk", $tipe = "tipe", $transmisi = "transmisi", $harga = 0, $kilometer = 0, $kondisi, $kategori)
    {
        $this->merk = $merk;
        $this->tipe = $tipe;
        $this->transmisi = $transmisi;
        $this->harga = $harga;
        $this->kondisi = $kondisi;
        $this->kilometer = $kilometer;
        $this->kategori = $kategori;
    }

    //kita akan membuat method diskon
    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }

    //kita membuat sebuah method untuk menampilkan harga
    //kemudian kita atur diskon nya
    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function tampilkanProduk()
    {
        //$this-> digunakan untuk memanggil variabel yang ada diluar function
        return "$this->merk, $this->tipe, $this->transmisi, $this->kondisi";
    }

    //method untuk menampilkan merk
    public function getMerk()
    {
        return $this->merk;
    }

    //method untuk mengeSet variable $merk
    public function setMerk($merk)
    {
        $this->merk = $merk;
    }

    public function getInfoProduk()
    {
        $str = " {$this->kategori} : {$this->tampilkanProduk()} | Rp. {$this->harga}, {$this->kilometer} Kilometer.   ";

        return $str;
    }
}

// Disini kita membuat child class yaitu Mobil yang artinya class ini ini boleh untuk menggunakan semua method dan property dari Parent nya yaitu Produk    


class Mobil extends Produk
{
    public function getInfoProduk()
    {
        // Disinilah konsep overriding kita terapkan, dimana sebelumnya kita masih menulis manual apa yang ada di getInfoProduk
        $str = parent::getInfoProduk();

        return $str;
    }
}

class Motor extends Produk
{
    public function getInfoProduk()
    {
        $str =  parent::getInfoProduk();

        return $str;
    }
}

class CetakInfoProduk
{
    //Produk digunakan untuk memberikan penjelasan bahwasanya yang boleh dicetak adalah variabel produk, selain itu tidak bisa di tampilkan
    public function cetak(Produk $produk)
    {
        $str = "{$produk->tampilkanProduk()} | {$produk->transmisi} , Rp. {$produk->harga}";
        return $str;
    }
}

//tambahkan berapa jumlah kilometer yang sudah ditempuh
$produk1 = new Mobil("TOYOTA", "All New Yaris", "Manual", 100000000, 1200, "SECOND", "MOBIL");
$produk2 = new Motor("HONDA", "CBR 150 CC", "Manual", 50000000, 0, "BARU", "MOTOR");

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

//menampilkan harga dan mengganti harganya,
//sehingga hal ini bahaya, sehingga kita perlu untuk menjaga supaya class kita tidak bisa diubah sembarangan 
//$produk1->harga = 300000000;
//echo $produk1->harga;


//supaya aman, sekarang kita harus mengubah visibilitynya yang awalnya public menjadi protected
$produk1->setDiskon(30);
echo  $produk1->getHarga();
echo "<br>";
$produk2->setDiskon(30);
echo $produk2->getHarga();

echo "<hr>";

//kita akan mencoba memanggil merk
echo $produk1->getMerk();

//mengubah merk
$produk1->setMerk("MerkYangBaru");
echo "<br>";
echo $produk1->getMerk();
