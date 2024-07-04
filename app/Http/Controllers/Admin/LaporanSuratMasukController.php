<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            if ($request->filled('status_disposisi')) {
                $query->where('surat_masuk.status_disposisi', $request->status_disposisi);
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
}
