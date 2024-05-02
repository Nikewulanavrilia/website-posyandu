<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\DataImunisasi;
use Illuminate\Http\Request;

class DataImunisasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data_imunisasi = DB::table('imunisasi')->paginate(4);
        return view('data-imunisasi.index',compact('data_imunisasi'));
    }
    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$data_imunisasi = DB::table('imunisasi')
		->where('nama_vaksin','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
            return view('data-imunisasi.index',compact('data_imunisasi'));

	}
    public function create()
    {
        $data_imunisasi = null;
        return view('data-imunisasi.create', compact('data_imunisasi'));
    }
    public function store(Request $request)
    {
        DataImunisasi::create($request->all());
        return redirect()->route('pages.data_imunisasi')->with('success','Data admin telah berhasil disimpan');
    }
    public function edit($id_vaksin)
    {
    $data_imunisasi = DataImunisasi::find($id_vaksin);
    return view('data-imunisasi.edit', compact('data_imunisasi'));
    }

    public function update(Request $request, $id_vaksin)
    {
    $data_imunisasi = DataImunisasi::findOrFail($id_vaksin); 
    $data_imunisasi->update($request->all());
    return redirect()->route('pages.data_imunisasi')->with('success', 'Data admin Berhasil Diperbarui');
    }
    public function destroy($id_vaksin)
    {
        $data_imunisasi = DataImunisasi::findOrFail($id_vaksin);
        $data_imunisasi->delete();
        return redirect()->route('pages.data_imunisasi')->with('success','Data admin Berhasil Dihapus');
    }
}
