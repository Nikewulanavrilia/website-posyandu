<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dataorangtua extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orang_tua')->insert([
            'no_kk' => "3528301827364867",
            'nik_ibu' => "3529384720364819",
            'nama_ibu' => "Hari Purnawati",
            'tempat_lahir_ibu' => "Blitar",
            'tanggal_lahir_ibu'=> "1987-02-03",
            'gol_darah_ibu'=>"O",
            'nik_ayah'=>"3528395423643275",
            'nama_ayah'=>"Irvan Wahyudi",
            'alamat'=>"Kp.Gudang,Desa.Mlandingan Kulon",
            'telepon'=>"085204967688",
            'email_orang_tua'=>"hari@gmail.com",
            'password_orang_tua'=>"pass1234"
        ]);
    }
}
