<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Book;
use App\Models\User;
use App\Models\Donatur;
use App\Models\Profile;
use App\Models\Dashboard;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        // $yearMonth = Carbon::now();
        // $data = DB::table('transactions')
        // ->select(DB::raw("DATE_FORMAT(created, '%M') as month"), DB::raw('COUNT(transaction_id) as total'))
        // ->where('created',  '>=', $yearMonth->year)
        // ->get()
        // ->orderBy('created', 'ASC');


            $pengunjung = DB::table('transactions')
            ->select(DB::raw("DATE_FORMAT(created, '%M') as month"), DB::raw('COUNT(transaction_id) as total'))
            ->groupBy('month')->OrderBy('month')
            ->get();

          // mengide
            // $peminjam = Peminjaman::select(DB::raw('COUNT(transaction_id) as total'))
            // ->GroupBy(DB::raw("Month(created)"))
            // ->pluck('total');

            // $bulan = Peminjaman::select(DB::raw("MONTHNAME(created) as bulan"))
            // ->GroupBy(DB::raw("MONTHNAME(created)"))
            // ->pluck('bulan');
        // tapi gagal

        // dd($yearMonth->year, $data, $pengunjung);
        $donate = Donatur::all()->count();
        $trac = Peminjaman::all()->where('status', 'PINJAM')->count();
        $inc = Peminjaman::all()->where('status', 'KEMBALI')->count();
        $users = User::count();
        $books = Book::count();
        return view('admin.index', compact('pengunjung'), [
            "title" => "Dashboard",
            "users" => $users,
            "books" => $books,
            "trac"   => $trac,
            "inc"   => $inc,
            "donate"   => $donate,
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
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }


}
