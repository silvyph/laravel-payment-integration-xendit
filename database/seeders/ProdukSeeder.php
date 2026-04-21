<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        Produk::insert([
            [
                "nama_produk" => "Kemeja_1",
                "nama_bahan" => "Gabardine",
                "harga" => 17500
            ],
            [
                "nama_produk" => "Kemeja_2",
                "nama_bahan" => "Polimicro Twill",
                "harga" => 12000
            ],
            [
                "nama_produk" => "Kemeja_3",
                "nama_bahan" => "Oxford",
                "harga" => 15500
            ],
            [
                "nama_produk" => "Kemeja_4",
                "nama_bahan" => "Geirge Poly Rami",
                "harga" => 9000
            ],
            [
                "nama_produk" => "Kemeja_7",
                "nama_bahan" => "Oxford Premium",
                "harga" => 21500
            ],
            [
                "nama_produk" => "Kemeja_6",
                "nama_bahan" => "Poly TC Square",
                "harga" => 9000
            ]
        ]);
    }
}