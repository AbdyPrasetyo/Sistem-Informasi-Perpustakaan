<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terbit = Penerbit::all();
        return view('admin.katalog_buku.penerbit', [
            "title" => "Penerbit",
            "penerbit" => $terbit,
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
            'name_publisher' => 'required|string|max:129'
        ]);

        $terbit = Penerbit::create([
            'name_publisher' => $request->name_publisher,
        ]);

        if ($terbit) {
            return redirect()->route('penerbit.index')->with('success', 'New Publisher has been created successfully');
        } else {
            return back()
                ->with('error', 'Some problem occurred, please try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function show(Penerbit $penerbit)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'name_publisher' => 'required'

        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update([
            'name_publisher' => $request->name_publisher
        ]);

        if ($penerbit) {
            return redirect()->route('penerbit.index')->with('success', 'Publihser Data has been updated successfully');
        } else {
            return back()->with('error', 'Some problem occurred, please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Penerbit::where('publisher_id', $id)->delete();
        } catch (Exception $e) {
            return back()->with(["error" => true, "message" => $e->getMessage()]);
        }

        return redirect()->route('penerbit.index')->with('success', 'Publisher data has been deleted successfully');
    }
}
