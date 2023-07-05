<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view("sesi/index");
    }
    
    function login(Request $request)
    {
        Session::flash('email', $request->identifier);
    
        $request->validate([
            'identifier' => 'required',
            'password' => 'required'
        ], [
            'identifier.required' => 'Email atau Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);
    
        $infoLogin = [
            'password' => $request->password,
        ];
    
        // Memeriksa apakah input identifier berupa email atau nama
        if (filter_var($request->identifier, FILTER_VALIDATE_EMAIL)) {
            // Jika identifier adalah email
            $infoLogin['email'] = $request->identifier;
        } else {
            // Jika identifier adalah nama
            $infoLogin['name'] = $request->identifier;
        }
    
        if (Auth::attempt($infoLogin)) {
            // Jika autentikasi sukses
            if (Auth::user()->is_admin == 1) {
                // Jika user adalah admin, redirect ke halaman /user
                return redirect('/user')->with('toast_success', 'Selamat Datang Operator!');
            } else {
                // Jika user adalah bukan admin, redirect ke halaman /alternatif
                return redirect('/alternatif')->with('toast_success', 'Selamat Datang Decision Maker!');
            }
        } else {
            // Jika autentikasi gagal
            return redirect('/')->withErrors('Username dan password yang dimasukkan tidak valid');
        }
    }    

    function logout(){
        Auth::logout();
        return redirect('/')->with('toast_success', 'Berhasil logout');
    }
}
