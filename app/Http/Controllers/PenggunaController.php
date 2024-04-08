<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usr = DB::table('users')->where('role', 'ADMIN')->get();
        return view('admin.pengolahan_data.pengguna', [
            "title" => "Data Pengguna",
            "usr" => $usr
        ]);
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
        $request->validate([
            'nis'           => 'required|unique:users',
            'password'      =>'required|min:8',
            'name'          => 'required',

        ],
        [
            'nis.required'          =>  'Nomor Induk tidak boleh kosong',
            'nis.unique'            =>  'NIS Telah Digunakan',
            'password.required'     =>  "Password Tidak boleh kosong",
            'password.min'          =>  "Password tidak boleh kurang dari 8 karakter",
            'name.required'         =>  "Nama tidak boleh kosong",

        ]);


        $user = new User;
        $user->nis = $request->nis;
        $user->password =  Hash::make($request->password);
        $user->name = $request->name;
        $user->role = "ADMIN";
        $user->save();
        if ($user) {
            return redirect()->route('pengguna.index')->with('success', ' Data Users Created successfully ');
        } else {
            return back()->with('error', 'Some problem occurred, please try again');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nis'=> 'required|unique:users,nis,'.$id,
            'name' => 'required|max:129',
            'password' => 'required|min:8'
        ]);

        $users = User::findOrFail($id);
        $users->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        if ($users) {
            return redirect()->route('pengguna.index')->with('success', 'Data Users has been updated successfully');
        } else {
            return back()->with('error', 'Some problem occurred, please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try {
            User::where('id', $id)->delete();
        } catch (Exception $e) {
            return back()->with(["error" => true, "message" => $e->getMessage()]);
        }

        return redirect()->route('pengguna.index')->with('success', 'Data Users has been deleted successfully');
    }
}
