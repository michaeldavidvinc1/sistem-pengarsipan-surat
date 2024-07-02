<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {

            $query = DB::table('petugas')
                ->join('users', 'petugas.user_id', '=', 'users.id')
                ->select('petugas.*', 'users.username', 'users.role')
                ->latest()
                ->get();
    
            return datatables()::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnEdit  = '<a href="'.route('petugasUser.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    return '<div class="d-flex gap-2">'.$btnEdit.'</div>';
                })
                ->make(true);
        }
        return view('admin.petugas.index');
    }

    public function create(){
        return view('admin.petugas.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|unique:petugas,email',
            'username' => 'required|unique:users,username',
            'telp' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'role' => 'required',
            'tgl_lahir' => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        Petugas::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telp' => $request->telp,
            'jabatan' => $request->jabatan,
            'user_id' => $user->id,
        ]);

        toastr()->success('Create Petugas Successfully');
        return redirect()->route('petugasUser.index');
    }

    public function edit($id){
        $data = Petugas::findOrFail($id);
        return view('admin.petugas.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required',
            'username' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'role' => 'required',
            'jabatan' => 'required',
            'tgl_lahir' => 'required',
        ]);

        $petugas = Petugas::findOrFail($id);
        $petugas->nama_lengkap = $request->nama_lengkap;
        $petugas->email = $request->email;
        $petugas->telp = $request->telp;
        $petugas->alamat = $request->alamat;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->tgl_lahir = $request->tgl_lahir;
        $petugas->jabatan = $request->jabatan;

        $user = User::findOrFail($petugas->user_id);
        $user->username = $request->username;
        $user->role = $request->role;

        $petugas->save();
        $user->save();

        toastr()->success('Update Petugas Successfully');
        return redirect()->route('petugasUser.index');
    }

    public function destroy(Request $request)
    {
        $ids = explode(",", $request->ids);

        // Ambil data petugas yang akan dihapus
        $petugas = Petugas::whereIn('id', $ids)->get();
    
        // Ambil user_id dari data petugas yang akan dihapus
        $userIds = $petugas->pluck('user_id');
    
        // Hapus data petugas
        Petugas::whereIn('id', $ids)->delete();
    
        // Hapus data user berdasarkan user_id
        User::whereIn('id', $userIds)->delete();

        return response()->json(['success' => "Records deleted successfully."]);
    }
}
