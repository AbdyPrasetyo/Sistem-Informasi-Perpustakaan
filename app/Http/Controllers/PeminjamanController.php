<?php

namespace App\Http\Controllers;
use Exception;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Denda;
use PDF;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
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
        ->get()->where('status', 'PINJAM');

        return view('admin.transaksi.v_pinjam', [
            "title"     => "Transaksi Pinjam",
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'book_id'   =>  'required',
                'users_id'  =>  'required',
                'created'   =>  'required',
                'deadline'  =>  'required',
            ],
            [
                'buku_id.required'  => 'Masukan Buku yang akan dipinjam',
                'users_id.required' => 'Harap Masukan Nama Peminjam',
            ]
        );

        $pinjam = new Peminjaman;
        $pinjam->book_id    =   $request->book_id;
        $pinjam->users_id   =   $request->users_id;
        $pinjam->created    =   $request->created;
        $pinjam->deadline   =   $request->deadline;
        $pinjam->status     =   "PINJAM";


        $count  = Peminjaman::where('users_id',$request->users_id)->where('return_date', null)->count();


        if($count >= 3) {
            return redirect()->route('peminjaman.index')->with('error', 'Transaction  Gagal User telah mencapai limit peminjaman');
        }
        else {
            $amount = Book::find($request->book_id);
            if ($amount->amount <= 0 ) {

                return redirect()->route('peminjaman.index')->with('error', 'Transaction  Gagal Stok Buku Telah Habis');
            }
            else {

                $pinjam->save();
                $book = Book::find($request->book_id);
                $book->amount = $book->amount - 1 ;
                $book->save();
                return redirect()->route('peminjaman.index')->with('success', 'Transaction  successfully');
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $pinjam = Peminjaman::findorFail($id);

            $date = $pinjam->deadline;
            $time = Carbon::now();

            if ($date < $time) {
                return redirect()->route('peminjaman.index')->with('error', 'Perpanjang ditolak karena melewati batas waktu peminjaman silahkan mengembalikan buku terlebih dahulu');
            }

            $perpanjang = Carbon::parse($date)->addDays(7)->toDateString();
            $pinjam->update([
                'deadline' => $perpanjang,
            ]);
            return redirect()->route('peminjaman.index')->with('success', 'Perpanjang waktu pengembalian sukses');
        } catch (Exception $e) {
            return redirect()->route('peminjaman.index')->with('error', 'Perpanjang error');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }

    public function cetak_pdf()
    {
        $data   = DB::table('transactions')
        ->join('books', 'books.book_id', '=', 'transactions.book_id')
        ->join('users', 'users.id', '=', 'transactions.users_id')
        ->get()->where('status', 'PINJAM');
        $denda  = Denda::all();
        $buku   = Book::all();
        $usr    = User::all()->where('role', 'USER');
    	$pdf = PDF::loadview('admin.transaksi.report_peminjaman',[
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
