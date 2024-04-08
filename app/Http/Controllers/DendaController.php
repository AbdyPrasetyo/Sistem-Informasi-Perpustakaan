<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $den = Denda::all();
        return view('admin.katalog_buku.denda', [
            "title" => "Data Denda",
            "denda" => $den
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
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function show(Denda $denda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function edit(Denda $denda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'charge' => 'required',
        ]);

        $denda = Denda::findOrFail($id);
        $denda->update([
            'charge' => $request->charge
        ]);

        if ($denda) {
            return redirect()->route('denda.index')->with('success', 'Nominal Denda berhasil di update');
        } else {
            return back()->with('error', 'Some problem occurred, please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denda $denda)
    {
        //
    }
}
