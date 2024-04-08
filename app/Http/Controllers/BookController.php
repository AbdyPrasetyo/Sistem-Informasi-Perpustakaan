<?php

namespace App\Http\Controllers;
use File;
use App\Models\Rak;
use App\Models\Book;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request->has('search')){
        //     $books = Book::where('title','like','%'.$request->search.'%')->paginate(6);
        // }
        // else{
        //     $books = Book::paginate(6);
        // }
        $books = Book::All();

        return view('admin.katalog_buku.buku', [
            "title" => "Data Buku",
            "books" => $books,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $books = Book::All();
        $categories = Kategori::All();
        $raks = Rak::All();
        $penerbit = Penerbit::All();
        return view('admin.katalog_buku.addbuku', [
            "title" => "Tambah Data Buku",
            "categories" => $categories,
            "raks" => $raks,
            "penerbit" => $penerbit,
            "books" => $books
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
            //
            'book_code'     => 'required|unique:books',
            'isbn'          => 'required|unique:books',
            'title'         => 'required',
            'description'   => 'required',
            'book_location' => 'required',
            'book_category' => 'required',
            'author'        => 'required',
            'publisher'     => 'required',
            'year'          => 'required',
            'amount'        => 'required',
            'image'         => 'file|image|mimes:jpg,jpeg,png|max:2048'
        ]  );
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'img/books/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Book::create($input);
        if ($input) {
            return redirect()->route('buku.index')->with('success', 'Data buku berhasil ditambah');
        } else {
            return back()
                ->with('error', 'Some problem occurred, please try again');
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $where  = array('book_id' => $id);
        $books  = Book::where($where)->first();

        return view('admin.katalog_buku.detbuku', [
            "title" => "Detail Data Buku",

            "books" => $books
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $where          = array('book_id' => $id);
        $books          = Book::where($where)->first();
        $categories     = Kategori::All();
        $raks           = Rak::All();
        $penerbit       = Penerbit::All();
        return view('admin.katalog_buku.updatebuku', [
            "title"         => "Update Data Buku",
            "categories"    => $categories,
            "raks"          => $raks,
            "penerbit"      => $penerbit,
            "books"         => $books
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $where = array('book_id' => $id);
        // $book = Book::where($where)->get(['book_id']);
        $book = Book::where($where)->get(['book_code', 'isbn'])->first();
        $buku = Book::get(['book_code', 'isbn']);
        // dd($buku);

        $request->validate([
            //
            'book_code'     => 'required',
            'isbn'          => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'book_location' => 'required',
            'book_category' => 'required',
            'author'        => 'required',
            'publisher'     => 'required',
            'year'          => 'required',
            'amount'        => 'required',
            'image'         => 'file|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request['book_code'] != $book['book_code']) {
                foreach ($buku as $books) {
                    if ($request['book_code'] == $books['book_code']) {
                        return back()->with('error', 'terjadi duplikat data pada isbn dan pada kode buku');
                        // dd('Gagal');
                    }
                };
        }
        if ($request['isbn'] != $book['isbn']) {
            foreach ($buku as $books) {
                if ($request['isbn'] == $books['isbn']) {
                    return back()->with('error', 'terjadi duplikat data pada isbn dan pada kode buku');
                    // dd('Gagal');
                }
            };
    }

        $books = Book::find($id);
        if($request->has('image')){
            $path='img/books/';
            File::delete($path.$books->image);
            $namaGambar = time().'.'.$request->image->extension();
            $request->image->move(public_path('img/books/'),$namaGambar);
            $books->image =$namaGambar;
            $books->save();
           }
           $books->book_code      = $request->book_code;
           $books->isbn           = $request->isbn;
           $books->title          = $request->title;
           $books->description    = $request->description;
           $books->book_location  = $request->book_location;
           $books->book_category  = $request->book_category;
           $books->author         = $request->author;
           $books->publisher      = $request->publisher;
           $books->year           = $request->year;
           $books->amount         = $request->amount;
           $books->save();

        if ($books) {
            return redirect()->route('buku.index')->with('success', 'Data Berhasil di update!');
        } else {
            return back()
                ->with('error', 'Some problem occurred, please try again');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        try {
            $book = Book::findOrFail($id);

            // $book = Book::where('book_id', $id)
            File::delete(public_path().'/img/books/' . $book->image);
            $book->delete();
            // Storage::delete('img/books'.$book->image);

        } catch (Exception $e) {
            return back()->with(["error" => true, "message" => $e->getMessage()]);
        }

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus!');
    }
}
