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
            'name' => "Yanuar Ardhika",
            'email' => "ardhikayanuar58@gmail.com",
            'jenis_kelamin' => "Laki-laki",
            'password' => Hash::make('12345')
        ]);

    }
}
