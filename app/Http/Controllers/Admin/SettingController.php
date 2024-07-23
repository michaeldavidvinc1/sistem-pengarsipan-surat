<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $data = Setting::first();
        return view('admin.setting.index', compact('data'));
    }

    public function update(Request $request){
        $data = Setting::first();
        $data->nama_sekolah = $request->nama_sekolah;
        $data->nama_pimpinan = $request->nama_pimpinan;
        $data->save();

        toastr()->success('Update Setting Successfully');
        return redirect()->route('setting.index');
    }
}
