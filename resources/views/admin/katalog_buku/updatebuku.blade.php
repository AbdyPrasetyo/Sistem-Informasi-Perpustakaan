@extends('layouts.main')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Katalog Buku /</span> Update Data Buku</h4>

<!-- Custom file input -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Form Update Data Buku</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">
                @if (session('error'))<div class="alert alert-danger alert-dismissible mt-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="{{ route('buku.update', $books->book_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col">
                            <label for="book_code" class="form-label">Kode Buku</label>
                            <input type="text" id="book_code" name="book_code" class="form-control" placeholder="Kode Buku" value="{{ old('book_code', $books->book_code) }}" required>
                            @error('book_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="number" id="isbn" name="isbn" class="form-control" placeholder="ISBN" value="{{ old('isbn', $books->isbn) }}" required>
                            @error('isbn')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="title" class="form-label">Judul Buku</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Judul Buku" value="{{ old('title', $books->title) }}" required>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea  id="description" class="form-control"
                            name="description" required> {{ old('description', $books->description) }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="book_location" class="form-label">Lokasi Buku</label>
                            <select id="book_location" class="form-select" aria-label="Default select example" name="book_location"  required>
                                @foreach ($raks as $r)
                                <option value="{{ $r->name_rak }}" @if ($books->name_rak == $r->name_rak)
                                    'selected'
                                @endif>{{ $r->name_rak }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col">
                            <label for="category" class="form-label">Kategori Buku</label>
                            <select id="category" class="form-select" aria-label="Default select example2" name="book_category" required>

                                @foreach ($categories as $cate)
                                <option value="{{ $cate->categori_name }}" @if ($books->categori_name == $cate->categori_name )
                                    'selected'
                                @endif>{{ $cate->categori_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row mt-3 ">
                        <div class="col">
                            <label for="author" class="form-label">Pengarang</label>
                            <input type="text" id="author" class="form-control" placeholder="Apras" name="author" value="{{ old('author', $books->author) }}" required>
                            @error('author')
                            <div class="container alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="publisher" class="form-label">Penerbit</label>
                            <select class="form-select" id="publisher" aria-label="Default select example" name="publisher" required>
                                @foreach ($penerbit as $p)
                                <option value="{{ $p->name_publisher }}"
                                    @if ($books->name_publisher == $p->name_publisher)
                                        'selected'
                                    @endif>{{ $p->name_publisher }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label for="tahunterbit" class="form-label">Tahun Terbit</label>
                            <input type="number" name="year" id="year" class="form-control" placeholder="Tahun Terbit" value="{{ old('year', $books->year) }}" required>
                            @error('year')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="jumlah" class="form-label">Jumlah Buku</label>
                            <input type="number" id="amount" class="form-control" placeholder="Jumlah Stok" name="amount" value="{{ old('amount', $books->amount) }}" required >
                            @error('amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <label for="inputGroupFile04" class="form-label mt-3">Masukan Cover Buku Baru</label>
                    <div class="input-group mb-2">
                        <input type="file" name="image" class="form-control" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" value="{{ old('image', $books->image) }}">

                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <img src="{{ asset('img/books/'.$books->image) }}" class="img-fluid img-thumbnail mb-3" width="100" height="100">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary ">Back</a>
                </form>
            </div>
        </div>
    </div>
    @endsection
