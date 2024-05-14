<?php

namespace App\Http\Controllers;

use App\Models\DataAnak;
use App\Models\DataPosyandu;
use App\Models\DetailPosyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataImunisasi;

class PenimbanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
{
    $data_posyandu = DB::table('posyandu')
                    ->select('posyandu.*', 'detail_posyandu.*', 'imunisasi.nama_vaksin', 'anak.nama_anak')
                    ->join('detail_posyandu', 'posyandu.id_posyandu', '=', 'detail_posyandu.id_posyandu')
                    ->join('imunisasi', 'detail_posyandu.id_vaksin', '=', 'imunisasi.id_vaksin')
                    ->join('anak', 'posyandu.nik_anak', '=', 'anak.nik_anak')
                    ->get();
    return view('data_posyandu.index', compact('data_posyandu'));
}

    public function create()
{
    $nik_anak_list = DataAnak::pluck('nama_anak', 'nik_anak');
    $data_vaksin_list = $this->getDataVaksin(); 
    return view('data_posyandu.create', compact('nik_anak_list', 'data_vaksin_list'));
}
public function store(Request $request)
    {
        $request->validate([
            'tb_anak' => 'required',
            'bb_anak' => 'required',
            'umur_anak' => 'required',
            'tanggal_posyandu' => 'required',
            'nik_anak' => 'required',
            'vaksin' => 'required|array|min:1', 
        ]);

        // Simpan data posyandu ke tabel 'posyandu'
        $posyandu = DataPosyandu::create([
            'tb_anak' => $request->tb_anak,
            'bb_anak' => $request->bb_anak,
            'umur_anak' => $request->umur_anak,
            'tanggal_posyandu' => $request->tanggal_posyandu,
            'nik_anak' => $request->nik_anak,
        ]);

        // Simpan detail vaksinasi ke tabel pivot 'detail_posyandu_imunisasi'
        $posyandu->vaksin()->attach($request->vaksin);

        
        return redirect()->route('pages.penimbangan')->with('success', 'Data posyandu berhasil disimpan');
    }
    public function getDataPosyandu() {
        $nik_anak_list = DataAnak::all();
        return response()->json($nik_anak_list);
    }

    public function getDataVaksin() {
        $data_vaksin_list = DataImunisasi::pluck('nama_vaksin', 'id_vaksin');
        return $data_vaksin_list;
    }
     
}
