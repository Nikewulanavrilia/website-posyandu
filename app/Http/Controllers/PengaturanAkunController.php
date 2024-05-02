<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PengaturanAkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pengaturan_akun = DB::table('users')->paginate(4);
        return view('pengaturan-akun.index', compact('pengaturan_akun'));
    }
    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$pengaturan_akun = DB::table('users')
		->where('name','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
            return view('pengaturan-akun.index', compact('pengaturan_akun'));

	}
    public function create()
    {
        $pengaturan_akun = null;
        return view('pengaturan-akun.create', compact('pengaturan_akun'));
    }
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('pages.pengaturanakun')->with('success','Data admin telah berhasil disimpan');
    }
    public function edit($id)
    {
    $pengaturan_akun = User::find($id);
    return view('pengaturan-akun.edit', compact('pengaturan_akun'));
    }

    public function update(Request $request, $id)
    {
    $pengaturan_akun = User::findOrFail($id); 
    $pengaturan_akun->update($request->all());
    return redirect()->route('pages.pengaturanakun')->with('success', 'Data admin Berhasil Diperbarui');
    }
    public function destroy($id)
    {
        $pengaturan_akun = User::findOrFail($id);
        $pengaturan_akun->delete();
        return redirect()->route('pages.pengaturanakun')->with('success','Data admin Berhasil Dihapus');
    }
}
