<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Nike wulan avrilia",
            'email' => "nikewulan9079@gmail.com",
            'jenis_kelamin' => "Perempuan",
            'password' => Hash::make('pass1234')
        ]);

    }
}
