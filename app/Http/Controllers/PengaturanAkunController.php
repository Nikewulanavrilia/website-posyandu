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
        return redirect()->route('pages.pengaturanakun')->with('success','Data Akun telah berhasil ditambahkan');
    }
    public function edit($id)
    {
    $pengaturan_akun = User::find($id);
    return view('pengaturan-akun.edit', compact('pengaturan_akun'));
    }

    public function update(Request $request, $id)
{
    $pengaturan_akun = User::findOrFail($id);

    // Cek apakah ada perubahan data
    $updatedData = $request->except('_token', '_method'); // Menghilangkan token dan method dari request data
    $originalData = $pengaturan_akun->only(array_keys($updatedData));
    $changes = array_diff_assoc($updatedData, $originalData);

    if (empty($changes)) {
        return redirect()->route('pages.pengaturanakun')->with('info', 'Tidak ada pembaruan pada Data Akun');
    }

    $pengaturan_akun->update($updatedData);
    return redirect()->route('pages.pengaturanakun')->with('success', 'Data Akun Berhasil Diperbarui');
}

    public function destroy($id)
    {
        $pengaturan_akun = User::findOrFail($id);
        $pengaturan_akun->delete();
        return redirect()->route('pages.pengaturanakun')->with('success','Data admin Berhasil Dihapus');
    }
}
