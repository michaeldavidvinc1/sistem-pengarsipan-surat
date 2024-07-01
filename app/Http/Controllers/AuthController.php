<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_page(){
        return view('auth.login');
    }

    public function login(Request $request){

        // Validation Form Login
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Check role user dan redirect sesuai role
            $request->session()->regenerate();
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin.dashboard');
            } elseif(Auth::user()->role == 'petugas'){
                return redirect()->route('petugas.dashboard');
            } elseif(Auth::user()->role == 'user'){
                return redirect()->route('user.dashboard');
            }
        }
        
        sweetalert()->error('Invalid Credentials!!');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.page');
    }
}
