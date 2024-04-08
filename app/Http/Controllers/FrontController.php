<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;


class FrontController extends Controller
{
    public function index()
    {
         return view('frondend.home', [
        "title" => "Beranda"
    ]);
    }


    public function tentang()
    {
         return view('frondend.tentang', [
        "title" => "Tentang"
    ]);
    }
    public function koleksi(Request $request)
    {
        if($request->has('search')){
            $books = Book::where('title','like','%'.$request->search.'%')->paginate(6);
        }
        else{
            $books = Book::paginate(6);
        }

        return view('frondend.koleksi', [
            "title" => "Koleksi",
            "books" => $books,
        ]);

    }





    public function visi()
    {
         return view('frondend.visi', [
        "title" => "Visi & Misi"
    ]);
    }

    public function struktur()
    {
         return view('frondend.struktur', [
        "title" => "Struktur Organisasi"
    ]);
    }

    public function login()
    {
         return view('login.login', [
        "title" => "Login"
    ]);
    }

    public function show()
    {

        $books  = Book::where('book_id')->first();

        return view('frondend.detail', [
            "title" => "Detail Data Buku",
            "books" => $books
        ]);

    }

}
