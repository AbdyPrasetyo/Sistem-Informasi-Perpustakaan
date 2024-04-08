<?php

namespace App\Http\Controllers;
use File;
use auth;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->id();
        $profile   = Profile::join('users', 'users.id', '=', 'profiles.users_id')
        ->get()->where('users_id', $user);
        return view('user.profile.user', [
            "title" => "user profile",
            "profile" => $profile,

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
        $request->validate([
            'name'=> 'required',
            'password'=> 'required',
            'phone_number'=> 'required',
            'street'=> 'required',
            'image'=> 'nullable|mimes:jpg,jpeg,png|max:2048'
        ],
        [
            'name.required'=>"Nama tidak boleh kosong",
            'phone_number.required'=>"Nomor Telepon tidak boleh kosong",
            'street.required'=>"Alamat tidak boleh kosong",
            'image.mimes' =>"Foto Profile Harus Berupa jpg,jpeg,atau png",
            'image.max' => "ukuran gambar tidak boleh lebih dari 2048 MB"
        ]);
        $user = User::find($id);
        $profile = Profile::find($id);

        if($request->has('image')){
         $path='img/avatars/';

         File::delete($path.$profile->image);

         $namaGambar = time().'.'.$request->image->extension();

         $request->image->move(public_path('img/avatars/'),$namaGambar);

         $profile->image =$namaGambar;

         $profile->save();
        }
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $profile->phone_number = $request->phone_number;
        $profile->street = $request->street;

        $profile->save();
        $user->save();
        return redirect()->route('userprofile.index')->with('success', 'Data profile anda berhasil diupdate');
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
}
