<?php

namespace App\Http\Controllers;

use App\Models\DataAnak;
use App\Models\DataPosyandu;
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
        $data_posyandu = DB::table('posyandu')->paginate(4);
        return view('data_posyandu.index', compact('data_posyandu'));
    }
    public function create()
{
    $nik_anak_list = DataAnak::pluck('nama_anak', 'nik_anak');
    $data_vaksin_list = $this->getDataVaksin(); // Call getDataVaksin() method here
    return view('data_posyandu.create', compact('nik_anak_list', 'data_vaksin_list'));
}


    public function store(Request $request)
    {
        DataPosyandu::create($request->all());
        return redirect()->route('pages.penimbangan')->with('success', 'Data admin telah berhasil disimpan');
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
