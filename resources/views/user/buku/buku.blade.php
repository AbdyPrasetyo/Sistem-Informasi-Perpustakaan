@extends('layouts.mainuser')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Daftar Buku /</span> Data Buku</h4>


<div class="card mb-4">
    <h5 class="card-header">

        <form class="navbar-search mb-3 mt-3" action="" method="GET">
            <div class="input-group mb-3">
                <input type="search" name="search" class="form-control" placeholder="Cari Judul Buku"
                    aria-label="search" aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit" id="button-addon2"> <i class='bx bx-search'></i></button>
            </div>
        </form>

    </h5>

    <div class="row">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse ($books as $b)
                <div class="col">
                    <div class="card h-100">
                        <div class="text-center mt-4">

                            @if ($b->image != null)
                            <img src="{{ asset('img/books/'. $b->image) }}"  height="350px" width="300px" />
                            @else
                            <img src="{{ asset('/img/books/2.jpg') }}"  height="350px" width="300px">
                            @endif <div class="card-body">
                                <h6 class="card-title text-uppercase text-primary"> {{ $b->title }}</h6>
                        </div>
<div class="justify-conten-center">


                            <table class="m-5 table-responsive mt-0 " cellpadding="6">
                                <tr class="text-dark">
                                    <td >Kode Buku</td>
                                    <td>:</td>
                                    <td>{{ $b->book_code }}</td>
                                </tr>
                                <tr class="text-dark">
                                    <td >ISBN</td>
                                    <td>:</td>
                                    <td>{{ $b->isbn }}</td>
                                </tr>
                                <tr class="text-dark">
                                    <td>Jumlah</td>
                                    <td>:</td>
                                    <td>{{ $b->amount }}</td>
                                </tr>
                            </table>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('userbook.show',  $b->book_id) }}" class="btn btn-success mb-4">Detail Buku</a>

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
</div>



@endsection
