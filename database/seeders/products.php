<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 5; $i++) {

            // insert data ke table pegawai menggunakan Faker
            DB::table('products')->insert([
                "user_id" => rand(1, 5),
                "nama_produk" => $faker->sentence(3),
                "deskripsi_produk" => $faker->paragraph(4),
                "harga_produk" => rand(100000, 1000000),
            ]);
        }
    }
}
