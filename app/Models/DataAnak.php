<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnak extends Model
{
    protected $table ='anak';
    protected $primaryKey = 'nik_anak'; 
    protected $fillable = ['nik_anak','nama_anak', 'tempat_lahir_anak', 'tanggal_lahir_anak','anak_ke', 'gol_darah_anak', 'umur_anak', 'jenis_kelamin_anak', 'nik_ibu', ];
}
