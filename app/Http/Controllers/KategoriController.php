<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Kategori::all();

        return view('admin.katalog_buku.kategori', [
            "title" => "Data Kategori",
            'categories' => $categories,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'categori_name' => 'required|string|max:129',
        ]);

        $categories = Kategori::create([
            'categori_name' => $request->categori_name,
        ]);

        if ($categories) {
            return redirect()->route('kategori.index')->with('success', 'Data Kategori buku berhasil ditambahkan');
        } else {
            return back()
                ->with('error', 'Some problem occurred, please try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit( )
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'categori_name' => 'required|string|max:129',
        ]);

        $categories = Kategori::findOrFail($id);
        $categories->update([
            'categori_name' => $request->categori_name,
        ]);

        if ($categories) {
            return redirect()->route('kategori.index')->with('success', 'Data Kategori buku berhasil diupdate');
        } else {
            return back()->with('error', 'Some problem occurred, please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Kategori::where('categorie_id', $id)->delete();
        } catch (Exception $e) {
            return back()->with(["error" => true, "message" => $e->getMessage()]);
        }

        return redirect()->route('kategori.index')->with('success', 'Data Kategori berhasil dihapus');
    }
}
