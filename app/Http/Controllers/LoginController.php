<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
 public function index()
 {
    if ($user = Auth::user()) {
        if ($user->role == 'ADMIN') {
            return redirect()->intended('home');
        }elseif ($user->level == 'USER'){
            return redirect()->intended('beranda');
        }
    }
    return view('auth.login',[
        'title' => "Login"
    ]);
 }

public function proses(Request $request)
{
    $request->validate([
        'nis' => 'required',
        'password' => 'required',
    ]);

    $kredensial = $request->only('nis', 'password');

    if (Auth::attempt($kredensial)) {
        $user = Auth::user();
        if ($user->level == 'USER') {
            return redirect()->intended('beranda');
        }elseif ($user->level == 'ADMIN'){
            return redirect()->intended('home');
        }
        return redirect()->intended('login');
    }


    return redirect('login')->with('error', 'your username and password is invalid!!!');

}

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('login');
}

}

