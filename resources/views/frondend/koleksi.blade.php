@extends('frondend.partial.content')
@section('content')
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background-image: url(' assets1/img/12.jpg'); ">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4 animated slideInDown">Koleksi Buku</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-primary" aria-current="page">Koleksi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->



<div class="container">

    <form class="navbar-search mb-3 mt-3" action="" method="GET">
        <div class="input-group mb-3">
            <input type="search" name="search" class="form-control" placeholder="Cari Judul Buku"
                aria-label="search" aria-describedby="button-addon2">
            <button class="btn  btn-lg btn-primary" type="submit" id="button-addon2">search</button>
        </div>
    </form>
        <div class="row">
            <div class="container ">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @forelse ($books as $b)
                    <div class="col">
                        <div class="card h-100">
                            <div class=" text-center mt-4">

                                @if ($b->image != null)
                                <img src="{{ asset('img/books/'. $b->image) }}"   height="350px" width="300px" />
                                @else
                                <img src="{{ asset('/img/books/2.jpg') }}"  height="350px"  width="300px">
                                @endif <div class="card-body">
                                    <h6 class="card-title text-uppercase text-primary"> {{ $b->title }}</h6>
                            </div>
    <div class="justify-conten-center">



                                </div>
                                <div class="text-center">
                                    <a href="{{ route('koleksi.show', $b->book_id) }}" class="btn btn-success mb-4">Detail Buku</a>

                                </div>

                            </div>
                        </div>
                    </div>
























                    @empty

                    <h1 class="text-primary mt-3">Tidak ada buku</h1>

                    @endforelse
                </div>
            </div>
        </div>
        <div class="d-flex flex-row mb-3 justify-content-between mt-3">
            <p class="text-primary m-4">Menampilkan {{ $books->currentPage() }} dari {{ $books->lastPage() }} Halaman</p>


            {{ $books->links() }}

        </div>


    </div>








@endsection
