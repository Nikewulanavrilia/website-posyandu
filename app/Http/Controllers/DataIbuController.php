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
        $data_ibu = DB::table('orang_tua')->get();
        return view('data-ibu.index', compact('data_ibu'));
    }
    public function store(Request $request)
    {
        DataIbu::create($request->all());
        return redirect()->route('pages.data_ibu')->with('success','Data admin telah berhasil disimpan');
    }
    public function edit($nik_ibu)
    {
    $data_ibu = DataIbu::find($nik_ibu);
    return view('data-ibu.edit', compact('data_ibu'));
    }

    public function update(Request $request, $nik_ibu)
    {
    $data_ibu = DataIbu::findOrFail($nik_ibu); 
    $data_ibu->update($request->all());
    return redirect()->route('pages.data_ibu')->with('success', 'Data admin Berhasil Diperbarui');
    }
    public function destroy($nik_ibu)
    {
        $data_ibu = DataIbu::findOrFail($nik_ibu);
        $data_ibu->delete();
        return redirect()->route('pages.data_ibu')->with('success','Data admin Berhasil Dihapus');
    }
    
}
