<?php

namespace App\Http\Controllers;
use Exception;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Denda;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;


class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denda  = Denda::all();
        $buku   = Book::all();
        $usr    = User::all()->where('role', 'USER');
        $data   = DB::table('transactions')
        ->join('books', 'books.book_id', '=', 'transactions.book_id')
        ->join('users', 'users.id', '=', 'transactions.users_id')
        ->get()->where('status', 'KEMBALI');

        return view('admin.transaksi.v_kembali', [
            "title"     => "Data Pengembalian",
            "data"      => $data,
            "user"      => $usr,
            "book"      => $buku,
            "denda"     => $denda,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $pinjam = Peminjaman::findorFail($id);
            $denda  = Denda::all();

            $date = $pinjam->deadline;
            $den = $denda[0]['charge'];

            $deadline = strtotime($date);
            $time = Carbon::now();
            $today = strtotime($time);
            $diff = $today - $deadline;
            $con = floor($diff / (60 * 60 * 24));
            $cal = str_replace('.', '', $den * $con);

            if ($diff < 0){

                $pinjam->update([
                    'return_date' => $time,
                    'late' => 0,
                    'charge' => 0,
                    'status' => 'KEMBALI',
                ]);
                $pinjam->save();
                $book = Book::find($pinjam->book_id);
                $book->amount = $book->amount + 1 ;
                $book->save();
                return redirect()->route('pengembalian.index')->with('success', 'Pelunasan Buku Berhasil!');

            }

                $pinjam->update([
                    'return_date' => $time,
                    'late' => $con,
                    'charge' => $cal,
                    'status' => 'KEMBALI',
                ]);
                $pinjam->save();
                $book = Book::find($pinjam->book_id);
                $book->amount = $book->amount + 1 ;
                $book->save();
                return redirect()->route('pengembalian.index')->with('success', 'Pelunaasan Buku Berhasil!');


        } catch (Exception $e) {
            return redirect()->route('pengembalian.index')->with('error', 'Pelunasan gagal!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function report_pengembalian()
    {
        $data   = DB::table('transactions')
        ->join('books', 'books.book_id', '=', 'transactions.book_id')
        ->join('users', 'users.id', '=', 'transactions.users_id')
        ->get()->where('status', 'KEMBALI');
        $denda  = Denda::all();
        $buku   = Book::all();
        $usr    = User::all()->where('role', 'USER');
    	$pdf = PDF::loadview('admin.transaksi.report_pengembalian',[
            "title"     => "Transaksi Pinjam",
            "data"      => $data,
            "user"      => $usr,
            "book"      => $buku,
            "denda"     => $denda,
        ])->setOptions(['defaultFont' => 'sans-serif']);
        // dd($pdf);
    	// return $pdf->download('laporan-peminjaman-pdf');
        return $pdf->stream();

        // return view('admin.transaksi.report_peminjaman', [
        //     "title"     => "Transaksi Pinjam",
        //     "data"      => $data,
        //     "user"      => $usr,
        //     "book"      => $buku,
        //     "denda"     => $denda,
        // ]);
    }
}
