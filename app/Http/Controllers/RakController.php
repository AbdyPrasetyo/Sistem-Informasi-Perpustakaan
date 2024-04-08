<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raks   = Rak::all();
        return view('admin.katalog_buku.rak', [
            "title" => "Data Rak",
            "raks" => $raks
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
            'name_rak' => 'required',
        ]);

        $raks = Rak::create([
            'name_rak' => $request->name_rak
        ]);


        if ($raks) {
            return redirect()->route('rak.index')->with('success', 'New raks has been created successfully');
        } else {
            return back()
                ->with('error', 'Some problem occurred, please try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function show(Rak $rak)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'name_rak' => 'required'

        ]);

        $raks = Rak::findOrFail($id);
        $raks->update([
            'name_rak' => $request->name_rak
        ]);

        if ($raks) {
            return redirect()->route('rak.index')->with('success', ' Data Raks has been updated successfully');
        } else {
            return back()->with('error', 'Some problem occurred, please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Rak::where('id_rak', $id)->delete();
        } catch (Exception $e) {
            return back()->with(["error" => true, "message" => $e->getMessage()]);
        }

        return redirect()->route('rak.index')->with('success', ' Data Raks has been deleted successfully');
    }
}
