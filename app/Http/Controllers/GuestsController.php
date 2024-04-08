<?php

namespace App\Http\Controllers;

use App\Models\Guests;
use Illuminate\Http\Request;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frondend.guests', [
            "title" => "Buku Tamu",
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
        $this->validate($request, [
            'nis'   => 'numeric',
            'name' => 'required|string|max:129',
            'major' => 'required',
        ]);

        $guests = Guests::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'major' => $request->major,
        ]);

        if ($guests) {
            return redirect()->route('guestssmackonelibrary.index')->with('success', 'Selamat datang di Perpustakaan SMK Negeri 1 Sebatik Barat');
        } else {
            return back()
                ->with('error', 'Some problem occurred, please try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guests  $guests
     * @return \Illuminate\Http\Response
     */
    public function show(Guests $guests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guests  $guests
     * @return \Illuminate\Http\Response
     */
    public function edit(Guests $guests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guests  $guests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guests $guests)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guests  $guests
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guests $guests)
    {
        //
    }
}
