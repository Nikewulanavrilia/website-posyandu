<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataIbu extends Model
{
    protected $table ='orang_tua';
    protected $primaryKey = 'no_kk'; 
    protected $fillable = ['nik_ibu','nama_ibu', 'tempat_lahir_ibu', 'tanggal_lahir_ibu', 'gol_darah_ibu', 'nik_ayah', 'nama_ayah', 'alamat', 'telepon'];
}
