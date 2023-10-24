<?php

namespace App\Http\Controllers;

use App\Models\DataPpns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin');
            } else {
                return redirect('user');
            }
        } else {
            return redirect('')->withErrors('Email dan Password yg anda masukan tidak sesuai')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function check_user()
    {
        return view('check_user');
    }

    public function check_user_submit(Request $request)
    {
        $request->validate([
            'nip' => 'required',
        ]);
        $user = DataPpns::where('nip', $request->nip)->first();
        if ($user) :
            return redirect('check_user')->withErrors('Hallo ' . $user->nama . '');
        else :
            return redirect('check_user')->withErrors('User Tidak Terdaftar');
        endif;
    }
}
