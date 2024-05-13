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
        $data_posyandu = DB::table('posyandu')->paginate(4);
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
    // Validasi data
    $request->validate([
        'bb_anak' => 'required|numeric',
        'tb_anak' => 'required|numeric',
        'umur_anak' => 'required|numeric',
        'nik_anak' => 'required|string',
        'tanggal_posyandu' => 'required|date',
        'vaksin' => 'required|array|min:1', // Memastikan minimal satu vaksin dipilih
        'vaksin.*' => 'exists:vaksins,id', // Memastikan vaksin tersedia di tabel vaksin
    ]);

    // Simpan data ke tabel DataPosyandu
    $dataPosyandu = DataPosyandu::create([
        'bb_anak' => $request->bb_anak,
        'tb_anak' => $request->tb_anak,
        'umur_anak' => $request->umur_anak,
        'nik_anak' => $request->nik_anak,
        'tanggal_posyandu' => $request->tanggal_posyandu,
    ]);

    // Jika data berhasil disimpan ke tabel DataPosyandu, simpan data vaksin ke tabel DetailPosyandu
    if ($dataPosyandu) {
        foreach ($request->vaksin as $id_vaksin) {
            DetailPosyandu::create([
                'id_posyandu' => $dataPosyandu->id_posyandu,
                'id_vaksin' => $id_vaksin,
            ]);
        }
    }

    // Redirect ke halaman yang sesuai dengan route
    return redirect()->route('pages.penimbangan')->with('success', 'Data posyandu telah berhasil disimpan');
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
