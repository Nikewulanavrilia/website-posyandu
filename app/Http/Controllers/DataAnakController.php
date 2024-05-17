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
        $data_anak = DB::table('anak')
            ->select('anak.*', 'orang_tua.nama_ibu')
            ->join('orang_tua', 'anak.no_kk', '=', 'orang_tua.no_kk')
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
            ->where('nama_anak', 'like', "%" . $cari . "%")
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
        return redirect()->route('pages.data_anak')->with('success', 'Data Anak telah berhasil ditambahkan');
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

        $updatedData = $request->except('_token', '_method');
        $originalData = $data_anak->only(array_keys($updatedData));
        $changes = array_diff_assoc($updatedData, $originalData);

        if (empty($changes)) {
            return redirect()->route('pages.data_anak')->with('info', 'Tidak ada pembaruan pada data anak');
        }

        $data_anak->update($updatedData);
        return redirect()->route('pages.data_anak')->with('success', 'Data Anak Berhasil Diperbarui');
    }

    public function destroy($nik_anak)
    {
        $data_anak = DataAnak::findOrFail($nik_anak);
        $data_anak->delete();
        return redirect()->route('pages.data_anak')->with('success', 'Data Anak Berhasil Dihapus');
    }

    public function getAnakDetail($nik_anak)
    {
        $data_anak = DB::table('anak')->where('nik_anak', $nik_anak)->first();
        $data_ibu = DB::table('orang_tua')->where('no_kk', $data_anak->no_kk)->first();

        if ($data_anak && $data_ibu) {
            return response()->json(['anak' => $data_anak, 'ibu' => $data_ibu]);
        }
        return response()->json([], 404);
    }
}