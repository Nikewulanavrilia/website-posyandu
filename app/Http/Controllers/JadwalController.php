<?php

namespace App\Http\Controllers;

use App\Models\JadwalModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $jadwal_posyandu = DB::table('jadwal_posyandu')->paginate(5);
        return view('jadwal-posyandu.index', compact('jadwal_posyandu'));
    }
    public function create()
    {
        $jadwal_posyandu = null;
        return view('jadwal-posyandu.create', compact('jadwal_posyandu'));
    }
    public function store(Request $request)
    {
        JadwalModel::create($request->all());
        return redirect()->route('pages.jadwal')->with('success', 'Data Jadwal telah berhasil di tambahkan');
    }
    public function edit($id_jadwal)
    {
        $jadwal_posyandu = JadwalModel::find($id_jadwal);
        return view('jadwal-posyandu.edit', compact('jadwal_posyandu'));
    }

    public function update(Request $request, $id_jadwal)
    {
        $jadwal_posyandu = JadwalModel::findOrFail($id_jadwal);

        $originalData = $jadwal_posyandu->toArray();

        $jadwal_posyandu->update($request->all());

        $updatedData = $jadwal_posyandu->toArray();

        if ($originalData == $updatedData) {
            return redirect()->route('pages.jadwal')->with('info', 'Tidak ada pembaruan pada data jadwal');
        } else {
            return redirect()->route('pages.jadwal')->with('success', 'Data Jadwal Berhasil Diperbarui');
        }
    }
    public function destroy($id_jadwal)
    {
        $jadwal_posyandu = JadwalModel::findOrFail($id_jadwal);
        $jadwal_posyandu->delete();
        return redirect()->route('pages.jadwal')->with('success', 'Data Jadwal Berhasil Dihapus');
    }
}