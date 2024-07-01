<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserSuratKeluarController extends Controller
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
                ->addColumn('action', function ($row) {
                    $btnEdit  = '<a href="'.route('user.suratKeluar.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    return '<div class="d-flex gap-2">'.$btnEdit.'</div>';
                })
                ->make(true);
        }
        return view('user.surat_keluar.index');
    }

    public function create(){
        $petugas = Petugas::all();
        return view('user.surat_keluar.create', compact('petugas'));
    }

    public function store(Request $request){
        $request->validate([
            'no_sk' => ['required'],
            'tgl_dikeluarkan' => ['required'],
            'perihal' => ['required'],
            'penerima' => ['required'],
            'keterangan' => ['required'],
            'lokasi_sk' => ['required'],
            'berkas_sk' => ['required','mimes:pdf'],
            'yang_menandatangani' => ['required'],
        ]);
        
        // dd($validator);
        $filePath = "";
        if ($request->file('berkas_sk')) {
            $file = $request->file('berkas_sk');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        }
        // dd($filePath);
        SuratKeluar::create([
            'no_sk' => $request->no_sk,
            'tgl_dikeluarkan' => $request->tgl_dikeluarkan,
            'perihal' => $request->perihal,
            'penerima' => $request->penerima,
            'yang_menandatangani' => $request->yang_menandatangani,
            'keterangan' => $request->keterangan,
            'lokasi_sk' => $request->lokasi_sk,
            'berkas_sk' => $filePath,
        ]);

        toastr()->success('Create Surat Keluar Successfully');
        return redirect()->route('user.suratKeluar.index');
    }

    public function edit($id){
        $data = SuratKeluar::findOrFail($id);
        $petugas = Petugas::all();
        return view('user.surat_keluar.edit', compact('data', 'petugas'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'no_sk' => ['required'],
            'tgl_dikeluarkan' => ['required'],
            'perihal' => ['required'],
            'penerima' => ['required'],
            'keterangan' => ['required'],
            'lokasi_sk' => ['required'],
            'berkas_sk' => ['mimes:pdf'],
            'yang_menandatangani' => ['required'],
        ]);

        $data = SuratKeluar::findOrFail($id);

        $oldFilePath = $data->berkas_sk; // Ambil path file lama dari model atau database

        if ($request->file('berkas_sk')) {
            // Simpan file baru
            $file = $request->file('berkas_sk');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $data->berkas_sk = $filePath;

            if ($oldFilePath) {
                Storage::disk('public')->delete($oldFilePath);
            }
        }

        $data->no_sk = $request->no_sk;
        $data->tgl_dikeluarkan = $request->tgl_dikeluarkan;
        $data->perihal = $request->perihal;
        $data->penerima = $request->penerima;
        $data->keterangan = $request->keterangan;
        $data->lokasi_sk = $request->lokasi_sk;
        $data->yang_menandatangani = $request->yang_menandatangani;
        $data->save();

        toastr()->success('Update Surat Keluar Successfully');
        return redirect()->route('user.suratKeluar.index');
    }

    public function destroy(Request $request)
    {
        $ids = $request->ids;

        // Hapus data berdasarkan ID yang diterima
        $suratKeluars = SuratKeluar::whereIn('id', explode(",", $ids))->get();

        foreach ($suratKeluars as $suratKeluar) {
            if ($suratKeluar->berkas_sm) {
                Storage::disk('public')->delete($suratKeluar->berkas_sm);
            }
    
            $suratKeluar->delete();
        }

        return response()->json(['success' => "Records deleted successfully."]);
    }
}
