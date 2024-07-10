<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class LaporanSuratMasukController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $query = DB::table('disposisi')
            ->join('surat_masuk', 'disposisi.surat_masuk_id', '=', 'surat_masuk.id')
            ->join('jenis_surat', 'surat_masuk.jenis_surat_id', '=', 'jenis_surat.id')
            ->select('disposisi.*', 'surat_masuk.perihal', 'surat_masuk.no_sm', 'surat_masuk.tgl_surat', 'surat_masuk.berkas_sm', 'jenis_surat.jenis_surat', 'surat_masuk.status_disposisi')
            ->latest();
    
            // Filter berdasarkan tanggal
            if ($request->filled('min_date') && $request->filled('max_date')) {
                $query->whereBetween('surat_masuk.tgl_surat', [$request->min_date, $request->max_date]);
            }
    
            return datatables()::of($query)
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.laporan_surat_masuk.index');
    }

    public function previewPdf($id){
        try {
            // Temukan data SuratMasuk berdasarkan $id
        $suratMasuk = SuratMasuk::findOrFail($id);

        // Path ke file PDF di storage
        $filePath = storage_path('app/public/' . $suratMasuk->berkas_sm);

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
        $query = DB::table('disposisi')
            ->join('surat_masuk', 'disposisi.surat_masuk_id', '=', 'surat_masuk.id')
            ->join('jenis_surat', 'surat_masuk.jenis_surat_id', '=', 'jenis_surat.id')
            ->select('disposisi.*', 'surat_masuk.perihal', 'surat_masuk.no_sm', 'surat_masuk.tgl_surat', 'surat_masuk.berkas_sm', 'jenis_surat.jenis_surat', 'surat_masuk.status_disposisi')
            ->latest();

        // Filter berdasarkan tanggal
        if ($request->filled('min_date') && $request->filled('max_date')) {
            $query->whereBetween('surat_masuk.tgl_surat', [$request->min_date, $request->max_date]);
        }

        $data = $query->get();
        if($data->isEmpty()){
            sweetalert()->error('Data Kosong');
            return redirect()->back();
        }

        $min_date = $request->min_date ?: $data->min('tgl_surat');
        $max_date = $request->max_date ?: $data->max('tgl_surat');

        $loadData = [
            'data' => $data,
            'min_date' => $min_date,
            'max_date' => $max_date,
        ];
        $pdf = PDF::loadView('print.laporan-cetak-masuk', $loadData)->setPaper('a4', 'landscape');

        return $pdf->download('laporan_surat_masuk.pdf');
    }

    public function cetakBulanIni(){
        $query = DB::table('disposisi')
            ->join('surat_masuk', 'disposisi.surat_masuk_id', '=', 'surat_masuk.id')
            ->join('jenis_surat', 'surat_masuk.jenis_surat_id', '=', 'jenis_surat.id')
            ->select('disposisi.*', 'surat_masuk.perihal', 'surat_masuk.no_sm', 'surat_masuk.tgl_surat', 'surat_masuk.berkas_sm', 'jenis_surat.jenis_surat', 'surat_masuk.status_disposisi')
            ->latest();

        // Filter berdasarkan tanggal
        $query->whereBetween('surat_masuk.tgl_surat', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        $data = $query->get();
        if($data->isEmpty()){
            sweetalert()->error('Data Kosong');
            return redirect()->back();
        }
        $min_date = Carbon::now()->startOfMonth();
        $max_date = Carbon::now()->endOfMonth();

        $loadData = [
            'data' => $data,
            'min_date' => $min_date,
            'max_date' => $max_date,
        ];
        $pdf = PDF::loadView('print.laporan-cetak-masuk', $loadData)->setPaper('a4', 'landscape');

        return $pdf->download('laporan_surat_masuk.pdf');
    }

    public function cetakMingguIni(){
        $query = DB::table('disposisi')
            ->join('surat_masuk', 'disposisi.surat_masuk_id', '=', 'surat_masuk.id')
            ->join('jenis_surat', 'surat_masuk.jenis_surat_id', '=', 'jenis_surat.id')
            ->select('disposisi.*', 'surat_masuk.perihal', 'surat_masuk.no_sm', 'surat_masuk.tgl_surat', 'surat_masuk.berkas_sm', 'jenis_surat.jenis_surat', 'surat_masuk.status_disposisi')
            ->latest();

        // Filter berdasarkan tanggal
        $query->whereBetween('surat_masuk.tgl_surat', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        $data = $query->get();
        if($data->isEmpty()){
            sweetalert()->error('Data Kosong');
            return redirect()->back();
        }
        $min_date = Carbon::now()->startOfWeek();
        $max_date = Carbon::now()->endOfWeek();

        $loadData = [
            'data' => $data,
            'min_date' => $min_date,
            'max_date' => $max_date,
        ];
        $pdf = PDF::loadView('print.laporan-cetak-masuk', $loadData)->setPaper('a4', 'landscape');

        return $pdf->download('laporan_surat_masuk.pdf');
    }

    public function cetakHariIni(){
        $query = DB::table('disposisi')
            ->join('surat_masuk', 'disposisi.surat_masuk_id', '=', 'surat_masuk.id')
            ->join('jenis_surat', 'surat_masuk.jenis_surat_id', '=', 'jenis_surat.id')
            ->select('disposisi.*', 'surat_masuk.perihal', 'surat_masuk.no_sm', 'surat_masuk.tgl_surat', 'surat_masuk.berkas_sm', 'jenis_surat.jenis_surat', 'surat_masuk.status_disposisi')
            ->latest();

        // Filter berdasarkan tanggal
        $query->whereDate('surat_masuk.tgl_surat', Carbon::today());
        $data = $query->get();
        if($data->isEmpty()){
            sweetalert()->error('Data Kosong');
            return redirect()->back();
        }
        $min_date = Carbon::today();
        $max_date = Carbon::today();

        $loadData = [
            'data' => $data,
            'min_date' => $min_date,
            'max_date' => $max_date,
        ];
        $pdf = PDF::loadView('print.laporan-cetak-masuk', $loadData)->setPaper('a4', 'landscape');

        return $pdf->download('laporan_surat_masuk.pdf');
    }

    public function cetakBulanKemarin(){
        $query = DB::table('disposisi')
            ->join('surat_masuk', 'disposisi.surat_masuk_id', '=', 'surat_masuk.id')
            ->join('jenis_surat', 'surat_masuk.jenis_surat_id', '=', 'jenis_surat.id')
            ->select('disposisi.*', 'surat_masuk.perihal', 'surat_masuk.no_sm', 'surat_masuk.tgl_surat', 'surat_masuk.berkas_sm', 'jenis_surat.jenis_surat', 'surat_masuk.status_disposisi')
            ->latest();

        // Filter berdasarkan tanggal
        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

        $query->whereBetween('surat_masuk.tgl_surat', [$startOfLastMonth, $endOfLastMonth]);
        $data = $query->get();
        if($data->isEmpty()){
            sweetalert()->error('Data Kosong');
            return redirect()->back();
        }
        $min_date = Carbon::now()->subMonth()->startOfMonth();
        $max_date = Carbon::now()->subMonth()->endOfMonth();

        $loadData = [
            'data' => $data,
            'min_date' => $min_date,
            'max_date' => $max_date,
        ];
        $pdf = PDF::loadView('print.laporan-cetak-masuk', $loadData)->setPaper('a4', 'landscape');

        return $pdf->download('laporan_surat_masuk.pdf');
    }

    public function cetakKemarin(){
        $query = DB::table('disposisi')
            ->join('surat_masuk', 'disposisi.surat_masuk_id', '=', 'surat_masuk.id')
            ->join('jenis_surat', 'surat_masuk.jenis_surat_id', '=', 'jenis_surat.id')
            ->select('disposisi.*', 'surat_masuk.perihal', 'surat_masuk.no_sm', 'surat_masuk.tgl_surat', 'surat_masuk.berkas_sm', 'jenis_surat.jenis_surat', 'surat_masuk.status_disposisi')
            ->latest();

        // Filter berdasarkan tanggal
        $yesterday = Carbon::yesterday()->toDateString();

        $query->whereDate('surat_masuk.tgl_surat', $yesterday);
        $data = $query->get();
        if($data->isEmpty()){
            sweetalert()->error('Data Kosong');
            return redirect()->back();
        }
        $min_date = Carbon::yesterday()->toDateString();
        $max_date = Carbon::yesterday()->toDateString();

        $loadData = [
            'data' => $data,
            'min_date' => $min_date,
            'max_date' => $max_date,
        ];
        $pdf = PDF::loadView('print.laporan-cetak-masuk', $loadData)->setPaper('a4', 'landscape');

        return $pdf->download('laporan_surat_masuk.pdf');
    }
}
