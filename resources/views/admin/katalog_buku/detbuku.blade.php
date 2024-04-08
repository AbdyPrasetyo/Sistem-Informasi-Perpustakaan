@extends('layouts/main')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Katalog Buku /</span> Detail Data Buku</h4>
<div class="row justify-content-center">

    <div class="card mb-4" >
        <img class="img-top mt-3 align-baseline" src="{{ asset('img/books/'.$books->image) }}" height="450px" width="400px"  />

        <div class="card-body text-center">
          <h5 class="card-title text-primary">{{ $books->title }}</h5>
          <p class="card-text">{{ $books->description }}</p>
        </div>
        <table class="m-5 table-responsive mt-0 align-top" cellpadding="6">

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
                <td>Kategori Buku</td>
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

        </table>
        <h5 class="card-header text-center">
        <a href="{{ route('buku.index') }}" class="btn btn-secondary mb-3">Back</a>
        </h5>

      </div>

@endsection
