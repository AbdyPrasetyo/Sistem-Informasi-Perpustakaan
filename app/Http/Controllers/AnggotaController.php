<?php

namespace App\Http\Controllers;
use File;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = DB::table('users')
                    ->join('profiles', 'profiles.users_id', '=', 'users.id')
                    ->get();


        return view('admin.pengolahan_data.anggota', [
            "title"     => "Data Anggota",
            "data"      => $data,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pengolahan_data.add_anggota', [
            "title" => "Pendataan Anggota"
        ]);
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
            'nis'           => 'required',
            'password'      =>'required|min:8',
            'name'          => 'required',
            'major'         => 'required',
            'phone_number'  => 'required',
            'street'        => 'required',

        ],
        [
            'nis.required'          =>  "Nomor Induk tidak boleh kosong",
            'nis.unique'            =>  "NIS Telah Digunakan",
            'password.required'     =>  "Password Tidak boleh kosong",
            'password.min'          =>  "Password tidak boleh kurang dari 8 karakter",
            'name.required'         =>  "Nama tidak boleh kosong",
            'major.required'        =>  "Prodi tidak boleh kosong",
            'phone_number.required' =>  "Nomor Telepon tidak boleh kosong",
            'street.required'       =>  "Alamat tidak boleh kosong",
        ]);


        $user = new User;
        $user->nis = $request->nis;
        $user->password =  Hash::make($request->password);
        $user->name = $request->name;
        $user->role = "USER";
        $user->save();

        $userID = $user->id;

        $profile = new Profile;
        $profile->major = $request->major;
        $profile->users_id = $userID;
        $profile->street = $request->street;
        $profile->phone_number = $request->phone_number;

        if ($image = $request->file('image')) {
            $destinationPath = 'img/avatars/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $profile->image = "$profileImage";
        }

        $profile->save();
        if ($profile) {
            return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil ditambah.');
        } else {
            return back()->with('error', 'Some problem occurred, please try again');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // $data = DB::table('users')
        //             ->join('profiles', 'profiles.users_id', '=', 'users.id')->get();
        // dd($data);

        $user = User::find($id);
        $profile = Profile::where('users_id',$id)->first();

        return view('admin.pengolahan_data.up_anggota', [
            "title" => "Update Data Anggota",
            // "data" => $data,
            "user" => $user,
            "profile" => $profile,


        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis'=> 'required|unique:users,nis,'.$id,
            'name'=> 'required',
            'password'=> 'required',
            'major'=> 'required',
            'phone_number'=> 'required',
            'street'=> 'required',
            'image'=> 'nullable|mimes:jpg,jpeg,png|max:2048'
        ],
        [
            'nis.required'=>"Nomor Induk tidak boleh kosong",
            'name.required'=>"Nama tidak boleh kosong",
            'major.required'=>"Prodi tidak boleh kosong",
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
        $user->nis = $request->nis;
        $user->password = Hash::make($request->password);
        $profile->major = $request->major;
        $profile->phone_number = $request->phone_number;
        $profile->street = $request->street;

        $profile->save();
        $user->save();
        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $del = DB::table('users')
        //             ->join('profiles', 'profiles.users_id', '=', 'users.id')
        //             ->where('profiles.id', $id)
        //             ->delete();

        try {
            $user = User::find($id);
            $profile = Profile::find($id);
            $path='img/avatars/';
            File::delete($path.$profile->image);


            $user->delete();

        } catch (Exception $e) {
            return back()->with(["error" => true, "message" => $e->getMessage()]);
        }

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil dihapus');

    }
}
