@extends('layouts/mainuser')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Katalog Buku /</span> Detail Data Buku</h4>


{{--
<div class="row justify-content-center">
   <div class="card mb-4">
    <div class="content m-4">
    @if($books->image !=null)
    <img class="img mb-3" src="{{ asset('img/books/'. $books->image) }}" width="300px" height="350px">
    @else
    <img class="img mb-3" src="{{ asset('img/books/'. $books->image) }}" width="300px" height="350px">
    @endif
    <h5 class="tahun_terbit">Judul : <a href="#" class="text-primary" style="text-decoration: none"></a></h5>
    <h5 class="tahun_terbit">Kode Buku : <a href="#" class="text-primary" style="text-decoration: none">{{ $books->book_code }}</a></h5>
    <h5 class="tahun_terbit">No ISBN : <a href="#" class="text-primary" style="text-decoration: none">{{ $books->isbn }}</a></h5>
    <h5 class="pengarang">Pengarang : <a href="#" class="text-primary" style="text-decoration: none">{{ $books->author }} </a></h5>
    <h5 class="penerbit">Penerbit : <a href="#" class="text-primary" style="text-decoration: none">{{ $books->publisher }}</a></h5>
    <h5 class="tahun_terbit">Kategori Buku : <a href="#" class="text-primary" style="text-decoration: none">{{ $books->book_category }}</a></h5>
    <h5 class="tahun_terbit">Location Buku : <a href="#" class="text-primary" style="text-decoration: none">{{ $books->book_location }}</a></h5>
    <h5 class="tahun_terbit">Jumlah Buku : <a href="#" class="text-primary" style="text-decoration: none">{{ $books->amount }}</a></h5>
   <h5 class="deskripsi">Deskripsi : <br><p class="deskripsi mt-2" style="text-align:justify; text-justify:inter-word; text-indent:1rem; letter-spacing:.1rem; word-spacing:.1rem">{{ $books->description }}</p></h5>
    <a href="{{ url('userbook') }}" class="btn btn-primary">Kembali</a>
    </div>
</div> --}}

<div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
        @if($books->image !=null)
        <img class="img mb-3 mt-3" src="{{ asset('img/books/'. $books->image) }}" width="300px" height="350px">
        @else
        <img class="img mb-3 mt-3" src="{{ asset('img/books/'. $books->image) }}" width="300px" height="350px">
        @endif
    </div>
      <div class="col mb-2">
        <div class="card-body">

          <table class=" table-responsive mt-0 align-top" cellpadding="6">
            <tr class="align-text-top">
                <td>Judul Buku</td>
                <td>:</td>
                <td class="text-uppercase text-primary">{{ $books->title }}</td>
            </tr>

            <tr>
                <td>Kode Buku</td>
                <td>:</td>
                <td>{{ $books->book_code }}</td>
            </tr>
            <tr>
                <td>ISBN</td>
                <td>:</td>
                <td>{{ $books->isbn }}</td>
            </tr>
            <tr>
                <td width="300px">Kategori Buku</td>
                <td>:</td>
                <td>{{ $books->book_category }}</td>
            </tr>

            <tr>
                <td>Lokasi Buku</td>
                <td>:</td>
                <td>{{ $books->book_location }}</td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td>:</td>
                <td>{{ $books->author }}</td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:</td>
                <td>{{ $books->publisher }}</td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td>:</td>
                <td>{{ $books->year }}</td>
            </tr>
            <tr>
                <td>Jumlah Buku</td>
                <td>:</td>
                <td>{{ $books->amount }}</td>
            </tr>
            <tr class="align-text-top">
                <td>Deskripsi</td>
                <td>:</td>
                <td>{{ $books->description }}</td>
            </tr>

        </table>



    </div>

</div>
<div class="text-center mb-4">


    <a href="{{ route('userbook.index') }}" class="btn btn-secondary"> Kembali</a>
</div>
    </div>

  </div>

@endsection
