<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facedes\Redirect;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->role == 'ADMIN') {
                return redirect()->intended('home');
            } else if ($user->role == 'USER') {
                return redirect()->intended('beranda');
            }
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function authenticate(Request $request)
    {

        $this->validate($request, [
            'nis' => 'required|numeric',
            'password' => 'required'
        ]);

        $requestData = $request->only('nis', 'password');

        if (Auth::attempt($requestData)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'USER') {
                return redirect()->intended('beranda');
            } else if ($user->role == 'ADMIN') {
                return redirect()->intended('home');
            }
            return redirect()->intended('login');
        }
        return redirect('login')->with('error', 'your username and password is invalid!!!');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect ('login');
    }
}
