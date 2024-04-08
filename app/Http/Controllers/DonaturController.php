<?php

namespace App\Http\Controllers;
use App\Models\Donatur;
use App\Models\Itembook;
use Illuminate\Http\Request;
use App\Models\Donaterelation;
use Illuminate\Support\Facades\DB;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $donatur = Itembook::all();
        // $item = Itembook::all();
        $donatur = Donatur::with('item')->get();
        // dd($donatur);
        // $item   = Itembook::all();
        // $relations   = Donaterelation::all();
        // $donatur   = DB::table('donaturrelations')
        // ->join('datastudents', 'datastudents.id', '=', 'donaturrelations.student_id')
        // ->join('donationbooks', 'donationbooks.id', '=', 'donaturrelations.donation_id')
        // ->get();

        return view('admin.pengolahan_data.penyumbang',compact('donatur'), [
            "title" => "Penyumbang Buku",
            // 'donatur' => $donatur,
            // 'item' => $item,

            // 'item' => $item,
            // 'relation' => $relations,
            // 'data' => $data,

        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengolahan_data.add_penyumbang', [
            "title" => "Penyumbang Buku",

            // 'item' => $item,
            // 'relation' => $relations,
            // 'data' => $data,

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
            'nis'           => 'required|unique:datastudents,nis',
            'name'          => 'required',
            'street'        => 'required',
            'contact'       => 'required',
            'inputs.*.title' => 'required',
            'inputs.*.amount' => 'required',

        ]);

        $donate = new Donatur;
        $donate->nis = $request->nis;
        $donate->name = $request->name;
        $donate->street = $request->street;
        $donate->contact = $request->contact;
        $donate->save();

        $donateId = $donate->id;

        foreach ($request->inputs as $index => $title) {
           $dot = Itembook::create([
                    'title' => $title['title'],
                    'amount' => $title['amount'],
            ]);

            $itemId = $dot->id;
            $relations = new Donaterelation;
            $relations->student_id = $donateId;
            $relations->donation_id = $itemId;
            $relations->save();
        }


            return redirect()->route('donatur.index')->with('success', 'Data Penyumbang Buku berhasil ditambah');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function show(Donatur $donatur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function edit(Donatur $donatur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donatur $donatur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $donatur = Donatur::find($id);

        $donatur->item()->detach();


        $donatur->delete();

        return redirect()->route('donatur.index')
            ->with('success', 'Data Penyumbang Buku berhasil dihapus.');

    }
}
