<?php

namespace App\Http\Controllers;

use App\Models\DataAnak;
use App\Models\DataIbu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        // Mengambil data anak perempuan
        $anak_perempuan = DataAnak::where('jenis_kelamin_anak', 'Perempuan')->get();

        // Menghitung jumlah data anak perempuan
        $jumlah_anak_perempuan = $anak_perempuan->count();
        // Mengambil data anak perempuan
        $anak_laki_laki = DataAnak::where('jenis_kelamin_anak', 'Laki-laki')->get();

        // Menghitung jumlah data anak perempuan
        $jumlah_anak_laki_laki = $anak_laki_laki->count();
        // Mengambil data anak
        $anak = DataAnak::all();

        // Menghitung jumlah data anak
        $jumlah_anak = $anak->count();
        // Mengambil data anak
        $orang_tua = DataIbu::all();

        // Menghitung jumlah data anak
        $jumlah_orang_tua = $orang_tua->count();

        return view('home', compact('jumlah_anak','jumlah_anak_perempuan','jumlah_anak_laki_laki','jumlah_orang_tua'));
    }
    
}
