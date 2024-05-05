<?php

namespace App\Http\Controllers;
use App\Models\Artikel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $edukasi = DB::table('edukasi')->paginate(4);
        return view('edukasi.index', compact('edukasi'));
    }
    public function create()
    {
        $edukasi = null;
        return view('edukasi.create', compact('edukasi'));
    }
    public function store(Request $request)
    {
        Artikel::create($request->all());
        return redirect()->route('pages.edukasi')->with('success','Data admin telah berhasil disimpan');
    }
    public function edit($id_edukasi)
    {
    $edukasi = Artikel::find($id_edukasi);
    return view('edukasi.edit', compact('edukasi'));
    }

    public function update(Request $request, $id_edukasi)
    {
    $edukasi = Artikel::findOrFail($id_edukasi); 
    $edukasi->update($request->all());
    return redirect()->route('pages.edukasi')->with('success', 'Data admin Berhasil Diperbarui');
    }
    public function destroy($id_edukasi)
    {
        $edukasi = Artikel::findOrFail($id_edukasi);
        $edukasi->delete();
        return redirect()->route('pages.edukasi')->with('success','Data admin Berhasil Dihapus');
    }
}
