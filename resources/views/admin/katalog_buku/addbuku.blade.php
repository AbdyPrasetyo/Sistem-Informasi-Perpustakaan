@extends('layouts.main')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Katalog Buku /</span> Tambah Data Buku</h4>

<!-- Custom file input -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Form Tambah Buku</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="book_code" class="form-label">Kode Buku</label>
                            <input type="text" id="book_code" name="book_code" class="form-control" placeholder="Masukan Kode Buku" value="{{ old('book_code') }}" required>
                            @error('book_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="number" id="isbn" name="isbn" class="form-control" placeholder="Masukan ID ISBN" value="{{ old('isbn') }}" required>
                            @error('isbn')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="title" class="form-label">Judul Buku</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Masukan Nama Judul Buku" value="{{ old('title') }}" required>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea placeholder="Leave a comment here" id="description" class="form-control"
                            name="description" required> {{ old('description') }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="book_location" class="form-label">Lokasi Buku</label>
                            <select id="book_location" class="form-select" aria-label="Default select example" name="book_location" required >
                                <option value="" disabled selected>-- Pilih Lokasi  Buku --</option>
                                @foreach ($raks as $r)
                                <option value="{{ $r->name_rak }}">{{ $r->name_rak }}</option>
                                @endforeach
                            </select>
                            @error('book_location')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="category" class="form-label">Kategori Buku</label>
                            <select id="category" class="form-select" aria-label="Default select example2" name="book_category" required >
                                <option value="" disabled selected>-- Pilih Kategori Buku --</option>
                                @foreach ($categories as $cate)
                                <option value="{{ $cate->categori_name }}">{{ $cate->categori_name }}</option>
                                @endforeach
                            </select>
                            @error('book_category')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>

                    </div>
                    <div class="row mt-3 ">
                        <div class="col">
                            <label for="author" class="form-label">Pengarang</label>
                            <input type="text" id="author" class="form-control" placeholder="Masukan Nama Penerbit" name="author" value="{{ old('author') }}" required>
                            @error('author')
                            <div class="container alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="publisher" class="form-label">Penerbit</label>
                            <select class="form-select" id="publisher" aria-label="Default select example" name="publisher" required>
                                <option value="" disabled selected>-- Pilih Penerbit Buku --</option>
                                @foreach ($penerbit as $p)
                                <option value="{{ $p->name_publisher }}">{{ $p->name_publisher }}</option>
                                @endforeach

                            </select>
                            @error('publisher')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label for="tahunterbit" class="form-label">Tahun Terbit</label>
                            <input type="number" name="year" id="year" class="form-control" placeholder="Tahun Terbit buku, contoh: 2023" value="{{ old('year') }}" required>
                            @error('year')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="jumlah" class="form-label">Jumlah Buku</label>
                            <input type="number" id="amount" class="form-control" placeholder="Jumlah Stok Buku" name="amount" value="{{ old('amount') }}" required>
                            @error('amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <label for="inputGroupFile04" class="form-label mt-3"> Cover Buku</label>
                    <div class="input-group">
                        <input type="file" name="image" class="form-control" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" value="{{ old('image') }}">
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary mt-3">Back</a>
                </form>
            </div>
        </div>
    </div>
    @endsection
