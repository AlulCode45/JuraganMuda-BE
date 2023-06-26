<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        DB::table('users')->insert([
            "nama" => $faker->name(),
            "nisn" => $faker->randomNumber(8, true),
            "password" => Hash::make('12345'),
            "is_banned" => false,
            "is_active" => true,
            "role" => "admin",
            "login_terakhir" => now()
        ]);
        for ($i = 1; $i <= 5; $i++) {

            // insert data ke table pegawai menggunakan Faker
            DB::table('users')->insert([
                "nama" => $faker->name(),
                "nisn" => $faker->randomNumber(8, true),
                "password" => Hash::make('12345'),
                "is_banned" => false,
                "is_active" => true,
                "login_terakhir" => now()
            ]);
        }
    }
}
