<?php

namespace App\Http\Controllers;

use App\Models\DataAnak;
use App\Models\DataIbu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DataAnakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    $data_anak= DB::table('anak')
                ->select('anak.*','orang_tua.nama_ibu')
                ->join('orang_tua','anak.no_kk','=','orang_tua.no_kk')
                ->get();
    return view('data-anak.index', compact('data_anak'));
    }
    public function cari(Request $request)
    {
    // Menangkap data pencarian
    $cari = $request->cari;

    // Mengambil data dari tabel anak sesuai pencarian data, termasuk nama ibu
    $data_anak = DB::table('anak')
                    ->select('anak.*', 'orang_tua.nama_ibu')
                    ->join('orang_tua', 'anak.no_kk', '=', 'orang_tua.no_kk')
                    ->where('nama_anak', 'like', "%".$cari."%")
                    ->paginate();

    // Mengirim data anak ke view index
    return view('data-anak.index', compact('data_anak'));
    }
    public function create()
    {
        $nik_ibu_list = DataIbu::pluck('nama_ibu', 'no_kk');
        return view('data-anak.create', compact('nik_ibu_list'));
    }

    public function store(Request $request)
    {
        DataAnak::create($request->all());
        return redirect()->route('pages.data_anak')->with('success', 'Data admin telah berhasil disimpan');
    }
    public function edit($nik_anak)
    {
    $data_anak = DataAnak::find($nik_anak);
    $nik_ibu_list = DataIbu::pluck('nama_ibu', 'no_kk'); 
    return view('data-anak.edit', compact('data_anak', 'nik_ibu_list'));
    }

    public function update(Request $request, $nik_anak)
    {
        $data_anak = DataAnak::findOrFail($nik_anak);
        $data_anak->update($request->all());
        return redirect()->route('pages.data_anak')->with('success', 'Data admin Berhasil Diperbarui');
    }
    public function destroy($nik_anak)
    {
        $data_anak = DataAnak::findOrFail($nik_anak);
        $data_anak->delete();
        return redirect()->route('pages.data_anak')->with('success','Data admin Berhasil Dihapus');
    }
}
