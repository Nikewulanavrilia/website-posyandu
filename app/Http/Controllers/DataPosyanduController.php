<?php

namespace App\Http\Controllers;

use App\Models\DataAnak;
use App\Models\DataPosyandu;
use Illuminate\Http\Request;
use App\Models\DataImunisasi;

class DataPosyanduController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
    $nik_anak_list = DataAnak::pluck('nama_anak', 'nik_anak');
    $data_vaksin_list = $this->getDataVaksin(); 
    return view('data_posyandu.create_terlambat', compact('nik_anak_list', 'data_vaksin_list'));
    }
public function store(Request $request)
    {
        $request->validate([
            'tb_anak' => 'required',
            'bb_anak' => 'required',
            'umur_anak' => 'required',
            'tanggal_posyandu' => 'required',
            'nik_anak' => 'required',
            'vaksin' => 'required|array|min:1', 
        ]);

        // Simpan data posyandu ke tabel 'posyandu'
        $posyandu = DataPosyandu::create([
            'tb_anak' => $request->tb_anak,
            'bb_anak' => $request->bb_anak,
            'umur_anak' => $request->umur_anak,
            'tanggal_posyandu' => $request->tanggal_posyandu,
            'nik_anak' => $request->nik_anak,
        ]);

        // Simpan detail vaksinasi ke tabel pivot 'detail_posyandu_imunisasi'
        $posyandu->vaksin()->attach($request->vaksin);

        
        return redirect()->route('pages.penimbangan')->with('success', 'Data posyandu berhasil disimpan');
    }
    

    public function getDataPosyandu(Request $request) {
        $query = DataAnak::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_anak', 'like', '%' . $request->search . '%');
        }

        $data = $query->paginate(10);

        return response()->json($data);
    }

    public function getDataVaksin() {
        $data_vaksin_list = DataImunisasi::pluck('nama_vaksin', 'id_vaksin');
        return $data_vaksin_list;
    }

    public function getDataFirstVaksin()
    {
        $firstVaccine = DataImunisasi::first();
        $firstVaccineId = $firstVaccine ? $firstVaccine->id_vaksin : null;

        return view('data_posyandu.create_terlambat', ['firstVaccineId' => $firstVaccineId]);
    }
}
