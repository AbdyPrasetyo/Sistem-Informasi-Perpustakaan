<?php

namespace App\Http\Controllers;

use App\Models\Suggestions;
use Illuminate\Http\Request;

class SuggestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frondend.kontak', [
            "title" => "Kontak"
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
            'name' => 'required|string|max:129',
            'email' => 'required|email',
            'subject' => 'required|string|max:129',
            'message' => 'required'
        ]);

        $sugar = Suggestions::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        if ($sugar) {
            return redirect()->route('kontak.index')->with('success', 'Saran anda berhasil terkirim');
        } else {
            return back()
                ->with('error', 'Some problem occurred, please try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suggestions  $suggestions
     * @return \Illuminate\Http\Response
     */
    public function show(Suggestions $suggestions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suggestions  $suggestions
     * @return \Illuminate\Http\Response
     */
    public function edit(Suggestions $suggestions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suggestions  $suggestions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suggestions $suggestions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suggestions  $suggestions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suggestions $suggestions, $id)
    {
        try {
            $sugar = Suggestions::find($id);
            $sugar->delete();
        } catch (Exception $e) {
            return back()->with(["error" => true, "message" => $e->getMessage()]);
        }

        return redirect()->route('kotaksaran.index')->with('success', 'Data berhasil dihapus');
    }
}
