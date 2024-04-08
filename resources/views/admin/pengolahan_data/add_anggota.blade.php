@extends('layouts.main')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengolahan Data /</span> Tambah Data Anggota</h4>

<!-- Custom file input -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Form Tambah Anggota</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="nis" class="form-label">NIS/NIP</label>
                            <input type="number" id="nis" name="nis" class="form-control" placeholder="Masukan NIS/NIP" value="{{ old('nis') }}" required>
                            @error('nis')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="Nama" class="form-label">Nama </label>
                            <input type="text" id="Nama" name="name" class="form-control" placeholder="Masukan Nama Lengkap" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="sandi" class="form-label">Kata Sandi</label>
                            <input type="password" id="sandi" name="password" class="form-control" placeholder="Masukan Kata Sandi minimal 8 karakter" value="{{ old('password') }}" required>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" name="major" id="jurusan" class="form-control" placeholder="Masukan Bidang Keahlian" value="{{ old('major') }}" required>
                            @error('major')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>


                    <div class="row mt-3">


                        <div class="col">
                            <label for="nomer" class="form-label">Nomor Hp</label>
                            <input type="phone_number" id="nomer" class="form-control" placeholder="Nomer HP Aktif" name="phone_number" value="{{ old('phone_number') }}" required>
                            @error('phone_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="col">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" class="form-control"
                            name="street" placeholder="write your message here.." required> {{ old('street') }}</textarea>
                            @error('street')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>

                    </div>

                    <label for="inputGroupFile04" class="form-label mt-3"> Photo Profile</label>
                    <div class="input-group">
                        <input type="file" name="image" class="form-control" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" value="{{ old('image') }}" placeholder="Pilih Photo Profile">
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                    <a href="{{ route('anggota.index') }}" class="btn btn-secondary mt-3">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection



