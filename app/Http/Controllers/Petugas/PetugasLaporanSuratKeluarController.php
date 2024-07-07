<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PetugasLaporanSuratKeluarController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {

            $query = DB::table('surat_keluar')->latest();
            
                if ($request->filled('min_date') && $request->filled('max_date')) {
                    $query->whereBetween('surat_keluar.tgl_dikeluarkan', [$request->min_date, $request->max_date]);
                }
                $suratKeluar = $query->get();

    
            return datatables()::of($suratKeluar)
                ->addIndexColumn()
                ->make(true);
        }
        return view('petugas.laporan_surat_keluar.index');
    }
    public function previewPdf($id){
        try {
            // Temukan data SuratMasuk berdasarkan $id
        $suratMasuk = SuratKeluar::findOrFail($id);

        // Path ke file PDF di storage
        $filePath = storage_path('app/public/' . $suratMasuk->berkas_sk);

        // Pastikan file PDF ada
        if (!file_exists($filePath)) {
            throw new \Exception("File not found: $filePath");
        }

        // $pdfContent = file_get_contents($filePath);

        // $dompdf = new Dompdf();

        // $dompdf->loadHtml($filePath);

        // $dompdf->render();

        // return $dompdf->stream('', array("Attachment" => false));

        $content = file_get_contents($filePath);

        // Set header untuk menampilkan PDF di browser
        return response($content)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . basename($filePath) . '"');
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function generatePDF(Request $request)
    {
        $query = DB::table('surat_keluar')->latest();
            
            if ($request->filled('min_date') && $request->filled('max_date')) {
                $query->whereBetween('tgl_dikeluarkan', [$request->min_date, $request->max_date]);
            }

        $data = $query->get();
        if($data->isEmpty()){
            sweetalert()->error('Data Kosong');
            return redirect()->back();
        }
        $loadData = ['data' => $data];
        $pdf = PDF::loadView('print.laporan-cetak-keluar', $loadData)->setPaper('a4', 'landscape');

        return $pdf->download('laporan_surat_keluar.pdf');
    }

    public function cetakBulanIni(){
        $query = DB::table('surat_keluar')->latest();
            
        // Filter berdasarkan tanggal
        $query->whereBetween('tgl_dikeluarkan', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        $data = $query->get();
        if($data->isEmpty()){
            sweetalert()->error('Data Kosong');
            return redirect()->back();
        }
        $loadData = ['data' => $data];
        $pdf = PDF::loadView('print.laporan-cetak-keluar', $loadData)->setPaper('a4', 'landscape');

        return $pdf->download('laporan_surat_keluar.pdf');
    }

    public function cetakMingguIni(){
        $query = DB::table('surat_keluar')->latest();

        // Filter berdasarkan tanggal
        $query->whereBetween('tgl_dikeluarkan', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        $data = $query->get();
        if($data->isEmpty()){
            sweetalert()->error('Data Kosong');
            return redirect()->back();
        }
        $loadData = ['data' => $data];
        $pdf = PDF::loadView('print.laporan-cetak-keluar', $loadData)->setPaper('a4', 'landscape');

        return $pdf->download('laporan_surat_keluar.pdf');
    }

    public function cetakHariIni(){
        $query = DB::table('surat_keluar')->latest();

        // Filter berdasarkan tanggal
        $query->whereDate('tgl_dikeluarkan', Carbon::today());
        $data = $query->get();
        if($data->isEmpty()){
            sweetalert()->error('Data Kosong');
            return redirect()->back();
        }
        $loadData = ['data' => $data];
        $pdf = PDF::loadView('print.laporan-cetak-keluar', $loadData)->setPaper('a4', 'landscape');

        return $pdf->download('laporan_surat_keluar.pdf');
    }

    public function cetakBulanKemarin(){
        $query = DB::table('surat_keluar')->latest();

        // Filter berdasarkan tanggal
        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

        $query->whereBetween('tgl_dikeluarkan', [$startOfLastMonth, $endOfLastMonth]);
        $data = $query->get();
        if($data->isEmpty()){
            sweetalert()->error('Data Kosong');
            return redirect()->back();
        }
        $loadData = ['data' => $data];
        $pdf = PDF::loadView('print.laporan-cetak-keluar', $loadData)->setPaper('a4', 'landscape');

        return $pdf->download('laporan_surat_keluar.pdf');
    }

    public function cetakKemarin(){
        $query = DB::table('surat_keluar')->latest();

        // Filter berdasarkan tanggal
        $yesterday = Carbon::yesterday()->toDateString();

        $query->whereDate('tgl_dikeluarkan', $yesterday);
        $data = $query->get();
        if($data->isEmpty()){
            sweetalert()->error('Data Kosong');
            return redirect()->back();
        }
        $loadData = ['data' => $data];
        $pdf = PDF::loadView('print.laporan-cetak-keluar', $loadData)->setPaper('a4', 'landscape');

        return $pdf->download('laporan_surat_keluar.pdf');
    }
}
