<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function autentikasi(Request $request)
    {
        $tes = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($tes)){
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->with('Gagal', 'Login Gagal');
    }

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
