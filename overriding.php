<?php
class Produk
{
    public
        $merk,
        $tipe,
        $transmisi,
        $harga,
        // Tambahn property baru
        $kondisi,
        $kilometer,
        $kategori;

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

    public function tampilkanProduk()
    {
        //$this-> digunakan untuk memanggil variabel yang ada diluar function
        return "$this->merk, $this->tipe";
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
        $str = parent::getInfoProduk() . "  Kondisi : {$this->kondisi}  ";

        return $str;
    }
}

class Motor extends Produk
{
    public function getInfoProduk()
    {
        $str = " {$this->kategori} : {$this->tampilkanProduk()} | Rp. {$this->harga}, {$this->kilometer} Kilometer. Kondisi : {$this->kondisi}  ";

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
