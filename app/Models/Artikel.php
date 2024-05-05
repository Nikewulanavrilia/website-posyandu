<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table ='edukasi';
    protected $primaryKey = 'id_edukasi'; 
    protected $fillable = ['judul','isi','foto'];
}
