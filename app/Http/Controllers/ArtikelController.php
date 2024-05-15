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
    $request->validate([
        'foto' => 'image|mimes:jpeg,png,jpg|max:2048', 
    ]);

    $edukasi = Artikel::create($request->all());
    
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $nama_file = time() . "_" . $foto->getClientOriginalName();
        $foto->move('foto_edukasi/', $nama_file);
        $edukasi->foto = $nama_file;
        $edukasi->save();
    }
    
    return redirect()->route('pages.edukasi')->with('success', 'Data admin telah berhasil disimpan');
    }
    public function edit($id_edukasi)
    {
    $edukasi = Artikel::find($id_edukasi);
    return view('edukasi.edit', compact('edukasi'));
    }

    public function update(Request $request, $id_edukasi)
    {
    $request->validate([
        'foto' => 'image|mimes:jpeg,png,jpg|max:2048', 
    ]);

    $edukasi_ubah = Artikel::findOrFail($id_edukasi);
    $awal = $edukasi_ubah->foto;

    $edukasi = [
        'judul' => $request['judul'],
        'isi' => $request['isi'],
        'foto' => $awal
    ];

    // Periksa apakah ada file gambar yang diunggah
    if ($request->hasFile('foto')) {
        // Hapus file lama jika ada
        if ($awal !== null) {
            unlink('foto_edukasi/' . $awal);
        }

        // Simpan file gambar yang baru diunggah
        $foto = $request->file('foto');
        $nama_file = time() . "_" . $foto->getClientOriginalName();
        $foto->move('foto_edukasi/', $nama_file);
        $edukasi['foto'] = $nama_file;
        }
    $edukasi_ubah->update($edukasi);

    return redirect()->route('pages.edukasi')->with('success', 'Data admin Berhasil Diperbarui');
    }
    public function destroy($id_edukasi)
    {
        $edukasi = Artikel::findOrFail($id_edukasi);
        $edukasi->delete();
        return redirect()->route('pages.edukasi')->with('success','Data admin Berhasil Dihapus');
    }
}
