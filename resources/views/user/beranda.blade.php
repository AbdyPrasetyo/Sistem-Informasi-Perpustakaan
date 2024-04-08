@extends('layouts.mainuser')


@section('content')
 <!-- Style variation -->
 <h5 class="pb-1 mb-4">Halaman Beranda</h5>

<div class="container justify-content-center">

<div class="row">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-lg">
            <div class="card-body">
                @foreach ($profile as $profile )

              <h5 class="card-title text-primary">Selamat Datang {{ $profile->name }}! 🎉</h5>
              <p class="mb-4">Selamat beraktifitas,<span class="fw-bold"> jangan lupa membaca buku</span></p>

              @endforeach
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-lg  mt-4">
        <div class="row">
          <div class="col-lg  mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="card avatar flex-shrink-0 alert-warning">
                    <i class='menu-icon bx bx-book-open text-center mt-2 text-center m-2'></i>
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                      <a class="dropdown-item" href="{{ url('riwayatuser') }}">View More</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1 text-warning">Sedang Pinjam</span>
            <h1 class="text-center">{{ $peminjaman }}</h1>
            </div>
            </div>
          </div>
          <div class="col-lg mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class=" card avatar flex-shrink-0 alert-danger">
                      <i class='menu-icon bx bxs-error text-center m-2'></i>
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                      <a class="dropdown-item" href="{{ url('userhilang') }}">View More</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1 text-danger">Buku Belum Diganti</span>
            <h1 class="text-center">{{ $hilang }}</h1>
            </div>
            </div>
          </div>

        </div>
      </div>



@endsection



