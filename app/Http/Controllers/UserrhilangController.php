<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Book;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class UserrhilangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku   = Book::all();
        $user = auth()->id();
        $hilang   = Peminjaman::join('books', 'books.book_id', '=', 'transactions.book_id')
        ->join('users', 'users.id', '=', 'transactions.users_id')
        ->get()->where('status', 'HILANG')->where('users_id', $user);

        return view('user.Riwayat.hilang', [
            "title" => "Data Buku Hilang",
            "hilang" => $hilang,

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
        $buku   = Book::all();
        $user = auth()->id();
        $lunas   = Peminjaman::join('books', 'books.book_id', '=', 'transactions.book_id')
        ->join('users', 'users.id', '=', 'transactions.users_id')
        ->get()->where('status', 'LUNAS')->where('users_id', $user);
        return view('user.Riwayat.riwayat', [
            "title" => "Riwayat Pelunasan",
            "lunas" => $lunas,

        ]);
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
}
