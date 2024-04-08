<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RakController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\UserbookController;
use App\Http\Controllers\UserhomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontBookController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\BukuhilangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SuggestionsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserrhilangController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\RiwayathilangController;
use App\Http\Controllers\UserpeminjamanController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontend
Route::get('/', [FrontController::class,'index']);
Route::get('/tentang', [FrontController::class,'tentang']);
Route::get('/visi', [FrontController::class,'visi']);
Route::get('/struktur', [FrontController::class,'struktur']);
Route::resource('koleksi', FrontBookController::class)->except( 'create', 'edit','destroy', 'store', 'update');
Route::resource('kontak', SuggestionsController::class)->except( 'create', 'edit','update', 'show');
Route::resource('guestssmackonelibrary', GuestsController::class)->except( 'create', 'edit','update', 'show');
//endfrontend
// Login
// Route::get('login', [AuthController::class,'index'])->name('login');
// Route::post('authenticate', [AuthController::class,'authenticate']);
Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::controller(LoginController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('login/proses','proses');
    // Route::get('logout','logout');


 });


Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['cek_login:USER']], function () {
        //user
        Route::resource('userbook', UserbookController::class)->except( 'create', 'edit','destroy', 'store', 'update');
            Route::resource('beranda', UserhomeController::class)->except( 'create', 'edit','destroy', 'store', 'update');
            Route::resource('riwayatuser', UserpeminjamanController::class)->except( 'create', 'edit','destroy', 'store', 'update');
            Route::resource('userhilang', UserrhilangController::class)->except( 'create', 'edit','destroy', 'store', 'update');
            Route::resource('userprofile', UserProfileController::class)->except( 'create', 'edit','destroy', 'store');
            //enduser
        });

        Route::group(['middleware' => ['cek_login:ADMIN']], function () {
            //admin
            Route::resource('home', DashboardController::class);
            Route::resource('rak',RakController::class)->except( 'create','show', 'edit');
            Route::resource('kategori', KategoriController::class)->except( 'create','show', 'edit');
            Route::resource('penerbit', PenerbitController::class)->except( 'create','show', 'edit');
            Route::resource('buku', BookController::class);
            Route::resource('pengguna', PenggunaController::class)->except( 'create','show', 'edit');
            Route::resource('anggota', AnggotaController::class)->except( 'show');
            Route::resource('denda', DendaController::class)->except( 'create','show', 'edit','destroy', 'store');
            Route::resource('peminjaman', PeminjamanController::class);
            Route::get('export_peminjaman', [PeminjamanController::class,'cetak_pdf']);
            Route::resource('pengembalian', PengembalianController::class);
            Route::resource('hilang', BukuhilangController::class);
            Route::resource('riwayat', RiwayathilangController::class);
            Route::resource('guestbook', GuestBookController::class)->except( 'create', 'edit','update', 'show');

            Route::resource('donatur', DonaturController::class);

            Route::resource('kotaksaran', ProfileController::class);

            Route::get('export_pengembalian',  [PengembalianController::class,'report_pengembalian']);
            Route::get('export_confirm_hilang',  [BukuhilangController::class,'report_hilang']);
            Route::get('export_riwayat_hilang',  [RiwayathilangController::class,'report_riwayat']);
        //endadmin
        });
});

