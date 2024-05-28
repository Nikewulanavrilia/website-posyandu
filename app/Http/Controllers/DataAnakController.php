<?php

namespace App\Http\Controllers;

use App\Models\DataAnak;
use App\Models\DataIbu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class DataAnakController extends Controller
{
    private $response = [
        'message' => null,
        'data' => null,
    ];
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data_anak = DB::table('anak')
            ->select('anak.*', 'orang_tua.nama_ibu')
            ->join('orang_tua', 'anak.no_kk', '=', 'orang_tua.no_kk')
            ->paginate(5);
        return view('data-anak.index', compact('data_anak'));
    }
    public function cari(Request $request)
    {
        // Menangkap data pencarian
        $cari = $request->cari;

        // Mengambil data dari tabel anak sesuai pencarian data, termasuk nama ibu
        $data_anak = DB::table('anak')
            ->select('anak.*', 'orang_tua.nama_ibu')
            ->join('orang_tua', 'anak.no_kk', '=', 'orang_tua.no_kk')
            ->where('nama_anak', 'like', "%" . $cari . "%")
            ->paginate();

        // Mengirim data anak ke view index
        return view('data-anak.index', compact('data_anak'));
    }
    public function create()
    {
        $nik_ibu_list = DataIbu::pluck('nama_ibu', 'no_kk');
        return view('data-anak.create', compact('nik_ibu_list'));
    }

    public function store(Request $request)
    {
        DataAnak::create($request->all());
        return redirect()->route('pages.data_anak')->with('success', 'Data Anak telah berhasil ditambahkan');
    }
    public function edit($nik_anak)
    {
        $data_anak = DataAnak::find($nik_anak);
        $nik_ibu_list = DataIbu::pluck('nama_ibu', 'no_kk');
        return view('data-anak.edit', compact('data_anak', 'nik_ibu_list'));
    }

    public function update(Request $request, $nik_anak)
    {
        $data_anak = DataAnak::findOrFail($nik_anak);

        $updatedData = $request->except('_token', '_method');
        $originalData = $data_anak->only(array_keys($updatedData));
        $changes = array_diff_assoc($updatedData, $originalData);

        if (empty($changes)) {
            return redirect()->route('pages.data_anak')->with('info', 'Tidak ada pembaruan pada data anak');
        }

        $data_anak->update($updatedData);
        return redirect()->route('pages.data_anak')->with('success', 'Data Anak Berhasil Diperbarui');
    }

    public function destroy($nik_anak)
    {
        $data_anak = DataAnak::findOrFail($nik_anak);
        $data_anak->delete();
        return redirect()->route('pages.data_anak')->with('success', 'Data Anak Berhasil Dihapus');
    }

    public function getAnakDetail($nik_anak)
    {
        $data_anak = DB::table('anak')->where('nik_anak', $nik_anak)->first();
        $data_ibu = DB::table('orang_tua')->where('no_kk', $data_anak->no_kk)->first();

        if ($data_anak && $data_ibu) {
            return response()->json(['anak' => $data_anak, 'ibu' => $data_ibu]);
        }
        return response()->json([], 404);
    }

    public function dataGrafik(Request $request) 
    {
        $user = Auth::user();

        $anak = DataAnak::where('no_kk', $user->no_kk)->with('posyandu')->get();

        if ($anak->isEmpty()) {
            $this->response['message'] = 'Data Anak tidak ditemukan';
            return response()->json($this->response, 404);
        }

        $anakData = [];
        foreach ($anak as $item) {
            $posyanduData = [];
            foreach ($item->posyandu as $posyandu) {
                $posyanduData[] = [
                    'tanggal_posyandu' => $posyandu->tanggal_posyandu,
                    'bb_anak' => $posyandu->bb_anak,
                    'tb_anak' => $posyandu->tb_anak,
                    'umur_anak' => $posyandu->umur_anak,
                ];
            }
            $anakData[] = [
                'nama_anak' => $item->nama_anak,
                'jenis_kelamin_anak' => $item->jenis_kelamin_anak,
                'posyandu' => $posyanduData,
            ];
        }
        $this->response['message'] = 'success';
        $this->response['data'] = $anakData;

        return response()->json($this->response, 200);
    }

    public function dataImunisasi(Request $request)
    {
    try {
        $user = $request->user();

        $anak = DataAnak::where('no_kk', $user->no_kk)->with('posyandu.vaksin')->get();

        if ($anak->isEmpty()) {
            return response()->json(['message' => 'Data Anak tidak ditemukan'], 404);
        }

        $formattedData = [];
        foreach ($anak as $child) {
            $posyanduData = [];
            foreach ($child->posyandu as $posyandu) {
                $posyanduData[] = [
                    'tanggal_posyandu' => $posyandu->tanggal_posyandu,
                    'tb_anak' => $posyandu->tb_anak,
                    'bb_anak' => $posyandu->bb_anak,
                    'umur_anak' => $posyandu->umur_anak,
                    'nama_vaksin' => $posyandu->vaksin->pluck('nama_vaksin')->toArray(),
                ];
            }
            $formattedData[] = [
                'nik_anak' => $child->nik_anak,
                'nama_anak' => $child->nama_anak,
                'tempat_lahir_anak' => $child->tempat_lahir_anak,
                'tanggal_lahir_anak' => $child->tanggal_lahir_anak,
                'anak_ke' => $child->anak_ke,
                'gol_darah_anak' => $child->gol_darah_anak,
                'jenis_kelamin_anak' => $child->jenis_kelamin_anak,
                'posyandu' => $posyanduData,
            ];
        }

        return response()->json(['data_anak' => $formattedData], 200);
    } catch (Exception $e) {
       
        return response()->json(['message' => 'Terjadi kesalahan dalam memproses permintaan'], 500);
    }
}
}