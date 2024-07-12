<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class DisposisiController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {

            $query = DB::table('disposisi')
                ->join('surat_masuk', 'disposisi.surat_masuk_id', '=', 'surat_masuk.id')
                ->select('disposisi.*', 'surat_masuk.perihal', 'surat_masuk.no_sm')
                ->latest();
            
                if ($request->filled('min_date') && $request->filled('max_date')) {
                    $query->whereBetween('surat_masuk.tgl_disposisi', [$request->min_date, $request->max_date]);
                }
                $suratKeluar = $query->get();

    
            return datatables()::of($suratKeluar)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnEdit  = '<a href="'.route('disposisi.generatePdf', $row->id).'" target="_blank" class="print btn btn-primary btn-sm">Print</a>';
                    return '<div class="d-flex gap-2">'.$btnEdit.'</div>';
                })
                ->make(true);
        }
        return view('admin.disposisi.index');
    }

    public function create(){
        $surat_masuk = SuratMasuk::where('status_disposisi', 'belum')->get();
        return view('admin.disposisi.create', compact('surat_masuk'));
    }

    public function store(Request $request){
        $request->validate([
            'surat_masuk_id' => 'required',
            'tgl_disposisi' => 'required',
            'keterangan' => 'required',
            'sifat' => 'required',
            'asal_surat' => 'required',
            'penerima_disposisi' => 'required',
        ]);

        Disposisi::create([
            'surat_masuk_id' => $request->surat_masuk_id,
            'tgl_disposisi' => $request->tgl_disposisi,
            'keterangan' => $request->keterangan,
            'sifat' => $request->sifat,
            'asal_surat' => $request->asal_surat,
            'penerima_disposisi' => $request->penerima_disposisi,
        ]);

        $surat_masuk = SuratMasuk::findOrFail($request->surat_masuk_id);
        $surat_masuk->status_disposisi = 'sudah';
        $surat_masuk->save();

        toastr()->success('Create Disposisi Surat Masuk Successfully');
        return redirect()->route('disposisi.index');
    }

    public function destroy(Request $request)
    {
        $ids = $request->ids;

        // Hapus data berdasarkan ID yang diterima
        Disposisi::whereIn('id', explode(",", $ids))->delete();

        return response()->json(['success' => "Records deleted successfully."]);
    }

    public function generate_pdf($id){

        $disposisi = DB::table('disposisi')
        ->join('surat_masuk', 'disposisi.surat_masuk_id', '=', 'surat_masuk.id')
        ->select('disposisi.*', 'surat_masuk.perihal', 'surat_masuk.no_sm', 'surat_masuk.asal_surat')
        ->where('disposisi.id', $id)
        ->first();
        // dd($disposisi->perihal);
        $data = ['disposisi' => $disposisi];
        // dd($disposisi);
        $pdf = PDF::loadView('print.cetak-disposisi', $data)->setPaper('a4', 'landscape');

        return $pdf->stream('sample.pdf');
    }
}
