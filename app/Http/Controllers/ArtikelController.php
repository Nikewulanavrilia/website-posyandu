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
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $edukasi = DB::table('edukasi')
            ->where('judul', 'like', "%" . $cari . "%")
            ->paginate(4);

        // mengirim data pegawai ke view index
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
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $fotoData = file_get_contents($request->file('foto')->getRealPath());

        Artikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $fotoData,
        ]);

        return redirect()->route('pages.edukasi')->with('success', 'Edukasi berhasil dibuat.');
    }
    public function edit($id_edukasi)
    {
    $edukasi = Artikel::find($id_edukasi);
    return view('edukasi.edit', compact('edukasi'));
    }

    public function update(Request $request, $id_edukasi)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
    ]);

    $edukasi = Artikel::findOrFail($id_edukasi);

    $data = [
        'judul' => $request->judul,
        'isi' => $request->isi,
    ];

    if ($request->hasFile('foto')) {
        $data['foto'] = file_get_contents($request->file('foto')->getRealPath());
    }

    $edukasi->update($data);

    return redirect()->route('pages.edukasi')->with('success', 'Edukasi updated successfully.');
}


    public function destroy($id_edukasi)
    {
        $edukasi = Artikel::findOrFail($id_edukasi);
        $edukasi->delete();
        return redirect()->route('pages.edukasi')->with('success','Data admin Berhasil Dihapus');
    }
}