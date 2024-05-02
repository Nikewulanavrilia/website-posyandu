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
    $umur_tertinggi_per_anak = DB::table('posyandu')
                                ->select('nik_anak', DB::raw('MAX(umur_anak) as max_umur'))
                                ->groupBy('nik_anak')
                                ->get();
    $data_anak = collect([]);

    foreach ($umur_tertinggi_per_anak as $umur) {
        $anak = DB::table('anak')
                ->select('anak.*', 'posyandu.umur_anak', 'orang_tua.nama_ibu') 
                ->join('posyandu', 'anak.nik_anak', '=', 'posyandu.nik_anak') 
                ->join('orang_tua', 'anak.nik_ibu', '=', 'orang_tua.nik_ibu')
                ->where('anak.nik_anak', $umur->nik_anak)
                ->where('posyandu.umur_anak', $umur->max_umur)
                ->first();

        $data_anak->push($anak);
    }
    return view('data-anak.index', compact('data_anak'));
    }

    public function create()
    {
        $nik_ibu_list = DataIbu::pluck('nama_ibu', 'nik_ibu');
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
    return view('data-anak.edit', compact('data_anak'));
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
        return redirect()->route('pages.data_ibu')->with('success','Data admin Berhasil Dihapus');
    }
}
