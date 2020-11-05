<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('back.auth.login');
    }
    public function loginPost(Request $request)
    {
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            toastr()->success('Tekrar hoş geldiniz', Auth::user()->name);
            return redirect()->route('admin.dashboard');
        }
        else
        {
            return redirect()->route('login.index')->withErrors('Email adresi veya şifre hatalı!');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
