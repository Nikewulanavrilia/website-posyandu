<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $filterMonth = $request->query('month');

        $query = DB::table('posyandu')
            ->select('posyandu.*', 'detail_posyandu.*', 'imunisasi.nama_vaksin', 'anak.nama_anak')
            ->join('detail_posyandu', 'posyandu.id_posyandu', '=', 'detail_posyandu.id_posyandu')
            ->join('imunisasi', 'detail_posyandu.id_vaksin', '=', 'imunisasi.id_vaksin')
            ->join('anak', 'posyandu.nik_anak', '=', 'anak.nik_anak');

        if ($filterMonth) {
            $query->whereMonth('posyandu.tanggal_posyandu', '=', $filterMonth);
        }

        $data_posyandu = $query->paginate(7);

        return view('cetak_laporan.index', compact('data_posyandu', 'filterMonth'));
    }

    public function cetakPdf(Request $request)
    {
        $filterMonth = $request->query('month');

        $query = DB::table('posyandu')
            ->select('posyandu.*', 'detail_posyandu.*', 'imunisasi.nama_vaksin', 'anak.nama_anak')
            ->join('detail_posyandu', 'posyandu.id_posyandu', '=', 'detail_posyandu.id_posyandu')
            ->join('imunisasi', 'detail_posyandu.id_vaksin', '=', 'imunisasi.id_vaksin')
            ->join('anak', 'posyandu.nik_anak', '=', 'anak.nik_anak');

        if ($filterMonth) {
            $query->whereMonth('posyandu.tanggal_posyandu', '=', $filterMonth);
        }

        $data_posyandu = $query->get();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('cetak_laporan.laporan_pdf', compact('data_posyandu'))->render());
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        return $pdf->stream('laporan_posyandu.pdf');
    }
}