<?php

namespace App\Http\Controllers;

use App\Models\DataIbu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DataIbuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data_ibu = DB::table('orang_tua')->paginate(4);
        return view('data-orangtua.index', compact('data_ibu'));
    }
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data_ibu = DB::table('orang_tua')
            ->where('nama_ibu', 'like', "%" . $cari . "%")
            ->paginate();

        // mengirim data pegawai ke view index
        return view('data-orangtua.index', compact('data_ibu'));

    }
    public function store(Request $request)
    {
        DataIbu::create($request->all());
        return redirect()->route('pages.data_ibu')->with('success', 'Data Orang Tua telah berhasil ditambahkan');
    }
    public function edit($nik_ibu)
    {
        $data_ibu = DataIbu::find($nik_ibu);
        return view('data-orangtua.edit', compact('data_ibu'));
    }

    public function update(Request $request, $nik_ibu)
    {
        $data_ibu = DataIbu::findOrFail($nik_ibu);

        $updatedData = $request->except('_token', '_method');
        $originalData = $data_ibu->only(array_keys($updatedData));
        $changes = array_diff_assoc($updatedData, $originalData);

        if (empty($changes)) {
            return redirect()->route('pages.data_ibu')->with('info', 'Tidak ada pembaruan pada Data Orang Tua');
        }

        $data_ibu->update($updatedData);
        return redirect()->route('pages.data_ibu')->with('success', 'Data Orang Tua Berhasil Diperbarui');
    }

    public function destroy($nik_ibu)
    {
        $data_ibu = DataIbu::findOrFail($nik_ibu);
        $data_ibu->delete();
        return redirect()->route('pages.data_ibu')->with('success', 'Data admin Berhasil Dihapus');
    }

    public function getOrtuDetail($no_kk)
    {
        $data_ibu = DB::table('orang_tua')->where('no_kk', $no_kk)->first();

        if ($data_ibu) {
            return response()->json($data_ibu);
        }
        return response()->json([], 404);
    }

}