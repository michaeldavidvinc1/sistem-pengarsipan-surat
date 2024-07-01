<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasDisposisiController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {

            $query = DB::table('disposisi')
                ->latest();
            
                if ($request->filled('min_date') && $request->filled('max_date')) {
                    $query->whereBetween('tgl_disposisi', [$request->min_date, $request->max_date]);
                }
                $suratKeluar = $query->get();

    
            return datatables()::of($suratKeluar)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnEdit  = '<a href="'.route('suratKeluar.index', $row->id).'" class="print btn btn-primary btn-sm">Print</a>';
                    return '<div class="d-flex gap-2">'.$btnEdit.'</div>';
                })
                ->make(true);
        }
        return view('petugas.disposisi.index');
    }

    public function create(){
        return view('petugas.disposisi.create');
    }

    public function store(Request $request){
        $request->validate([
            'no_sm' => 'required',
            'tgl_disposisi' => 'required',
            'keterangan' => 'required',
            'tgl_surat' => 'required',
            'asal_surat' => 'required',
            'penerima_disposisi' => 'required',
        ]);

        Disposisi::create([
            'no_sm' => $request->no_sm,
            'tgl_disposisi' => $request->tgl_disposisi,
            'keterangan' => $request->keterangan,
            'tgl_surat' => $request->tgl_surat,
            'asal_surat' => $request->asal_surat,
            'penerima_disposisi' => $request->penerima_disposisi,
        ]);

        toastr()->success('Create Disposisi Surat Masuk Successfully');
        return redirect()->route('petugas.disposisi.index');
    }

    public function destroy(Request $request)
    {
        $ids = $request->ids;

        // Hapus data berdasarkan ID yang diterima
        Disposisi::whereIn('id', explode(",", $ids))->delete();

        return response()->json(['success' => "Records deleted successfully."]);
    }
}
