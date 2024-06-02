<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Models\Artikel;

class EdukasiApiController extends Controller
{
    public function edukasi()
    {
        try {
            $edukasi = Artikel::select('judul', 'foto', 'isi')->get();

            $edukasi->transform(function ($artikel) {
                $artikel->gambar = base64_encode($artikel->foto);
                unset ($artikel->foto);
                return $artikel;
            });

            return response()->json([
                'success' => true,
                'data' => $edukasi,
                'message' => 'Data retrieved successfully'
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data from database: ' . $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error: ' . $e->getMessage()
            ], 500);
        }
    }
}
