<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class JenisSuratController extends Controller
{
    public function index(){
        $data = JenisSurat::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addIndexColumn() // This will add the DT_RowIndex column
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="edit btn btn-primary btn-sm">Edit</a>';
                    // $btn .= ' <a href="javascript:void(0)" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.jenis_surat.index');
    }



    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'jenis_surat' => [
                'required',
                Rule::unique('jenis_surat', 'jenis_surat')->ignore($request->id),
            ],
        ], [
            'jenis_surat.required' => 'Jenis Surat harus diisi.',
            'jenis_surat.unique' => 'Jenis Surat sudah ada dalam database.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jenisSurat = new JenisSurat();
        $jenisSurat->jenis_surat = $request->jenis_surat;
        $jenisSurat->save();
        return response()->json(['success' => 'Create Jenis Surat Successfully']);
    }

    public function edit($id){
        $data = JenisSurat::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'jenis_surat' => [
                'required',
                Rule::unique('jenis_surat', 'jenis_surat')->ignore($request->id),
            ],
        ], [
            'jenis_surat.required' => 'Jenis Surat harus diisi.',
            'jenis_surat.unique' => 'Jenis Surat sudah ada dalam database.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jenisSurat = JenisSurat::findOrFail($id);
        $jenisSurat->jenis_surat = $request->jenis_surat;
        $jenisSurat->save();
        return response()->json(['success' => 'Update Jenis Surat Successfully']);
    }

    public function destroy(Request $request)
    {
        $ids = $request->ids;

        // Hapus data berdasarkan ID yang diterima
        JenisSurat::whereIn('id', explode(",", $ids))->delete();

        return response()->json(['success' => "Records deleted successfully."]);
    }
}
