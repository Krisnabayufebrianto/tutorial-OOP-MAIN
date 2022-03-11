<?php
class Produk
{
    public
        $merk = "merk",
        $tipe = "tipe",
        $transmisi = "transmisi",
        $harga = 0;

    public function tampilkanProduk()
    {
        //$this-> digunakan untuk memanggil variabel yang ada diluar function
        return "$this->merk, $this->tipe";
    }
}

$produk1 = new Produk();
$produk1->merk = "TOYOTA";
$produk1->tipe = "All New Yaris";
$produk1->transmisi = "Manual";
$produk1->harga = 100000000;

echo "Mobil : $produk1->merk, $produk1->tipe";
echo "<br>";
// tanda (.) adalah Concatenation yitu menggabungkan string dengan string
echo "Mobil : " . $produk1->tampilkanProduk();
