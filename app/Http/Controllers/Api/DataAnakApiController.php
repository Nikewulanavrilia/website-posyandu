<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataAnak;
use Illuminate\Database\QueryException;

class DataAnakApiController extends Controller
{
    private $response = [
        'message' => null,
        'data' => null,
    ];

    public function dataGrafik(Request $request)
    {
        $request->validate([
            'no_kk' => 'required|numeric',
        ]);

        $no_kk = $request->input('no_kk');

        $anak = DataAnak::where('no_kk', $no_kk)->with('posyandu')->get();

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
        $request->validate([
            'no_kk' => 'required|numeric',
        ]);

        try {
            $no_kk = $request->input('no_kk');

            $anak = DataAnak::where('no_kk', $no_kk)->with('posyandu.vaksin')->get();
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
        } catch (QueryException $e) {
            return response()->json(['message' => 'Terjadi kesalahan dalam memproses permintaan'], 500);
        }
    }
}