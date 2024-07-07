<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserSuratMasukController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {
            $query = DB::table('surat_masuk')
                ->join('jenis_surat', 'surat_masuk.jenis_surat_id', '=', 'jenis_surat.id')
                ->select('surat_masuk.*', 'jenis_surat.jenis_surat')
                ->latest();
    
            // Filter berdasarkan tanggal
            if ($request->filled('min_date') && $request->filled('max_date')) {
                $query->whereBetween('tgl_surat', [$request->min_date, $request->max_date]);
            }
    
            return datatables()::of($query)
                ->addIndexColumn()
                // ->addColumn('action', function ($row) {
                //     $btnDisposisi = '<a href="'.route('user.suratMasuk.edit', $row->id).'" class="disposisi btn btn-warning btn-sm">Disposisi</a>';
                //     $btnEdit  = '<a href="'.route('user.suratMasuk.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                //     return '<div class="d-flex gap-2">'.$btnDisposisi.$btnEdit.'</div>';
                // })
                ->make(true);
        }
        return view('user.surat_masuk.index');
    }

    public function create(){
        $jenisSurat = JenisSurat::all();
        return view('user.surat_masuk.create', compact('jenisSurat'));
    }

    public function store(Request $request){
        $request->validate([
            'no_sm' => ['required'],
            'tgl_surat' => ['required'],
            'perihal' => ['required'],
            'jenis_surat_id' => ['required'],
            'asal_surat' => ['required'],
            'keterangan' => ['required'],
            'lokasi_sm' => ['required'],
            'berkas_sm' => ['required','mimes:pdf'],
            'status_disposisi' => ['required'],
        ]);
        
        // dd($validator);


        $filePath = "";
        if ($request->file('berkas_sm')) {
            $file = $request->file('berkas_sm');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        }
        // dd($filePath);
        SuratMasuk::create([
            'no_sm' => $request->no_sm,
            'tgl_surat' => $request->tgl_surat,
            'perihal' => $request->perihal,
            'jenis_surat_id' => $request->jenis_surat_id,
            'asal_surat' => $request->asal_surat,
            'keterangan' => $request->keterangan,
            'lokasi_sm' => $request->lokasi_sm,
            'berkas_sm' => $filePath,
            'status_disposisi' => $request->status_disposisi,
        ]);

        toastr()->success('Create Surat Masuk Successfully');
        return redirect()->route('user.suratMasuk.index');
    }

    public function edit($id){
        $data = SuratMasuk::findOrFail($id);
        $jenisSurat = JenisSurat::all();
        return view('user.surat_masuk.edit', compact('data', 'jenisSurat'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'no_sm' => ['required'],
            'tgl_surat' => ['required'],
            'perihal' => ['required'],
            'jenis_surat_id' => ['required'],
            'asal_surat' => ['required'],
            'keterangan' => ['required'],
            'lokasi_sm' => ['required'],
            'berkas_sm' => ['mimes:pdf'],
            'status_disposisi' => ['required'],
        ]);

        $data = SuratMasuk::findOrFail($id);

        $oldFilePath = $data->berkas_sm; // Ambil path file lama dari model atau database

        if ($request->file('berkas_sm')) {
            // Simpan file baru
            $file = $request->file('berkas_sm');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $data->berkas_sm = $filePath;

            if ($oldFilePath) {
                Storage::disk('public')->delete($oldFilePath);
            }
        }

        $data->no_sm = $request->no_sm;
        $data->tgl_surat = $request->tgl_surat;
        $data->perihal = $request->perihal;
        $data->jenis_surat_id = $request->jenis_surat_id;
        $data->asal_surat = $request->asal_surat;
        $data->keterangan = $request->keterangan;
        $data->lokasi_sm = $request->lokasi_sm;
        $data->status_disposisi = $request->status_disposisi;
        $data->save();

        toastr()->success('Update Surat Masuk Successfully');
        return redirect()->route('user.suratMasuk.index');
    }

    public function destroy(Request $request)
    {
        $ids = $request->ids;

        // Hapus data berdasarkan ID yang diterima
        $suratMasuks = SuratMasuk::whereIn('id', explode(",", $ids))->get();

        foreach ($suratMasuks as $suratMasuk) {
            if ($suratMasuk->berkas_sm) {
                Storage::disk('public')->delete($suratMasuk->berkas_sm);
            }
    
            $suratMasuk->delete();
        }

        return response()->json(['success' => "Records deleted successfully."]);
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
