@extends('layouts.mainuser')
@section('content')
<h4 class="fw-bold py-3 mb-4">Pengaturan Akun</h4>

@foreach ($profile as $profile )

<!-- Custom file input -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="container">

                @if (session('success'))<div class="alert alert-primary alert-dismissible mt-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <form action="{{ route('userprofile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <label for="nis" class="form-label">NIS</label>

                            <input type="text" class="form-control" value="{{ $profile->nis }}" readonly>
                            @error('nis')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" value="{{ $profile->major }}" readonly>
                            @error('major')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label for="Nama" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <div class="col">
                        <label for="sandi" class="form-label">Kata Sandi</label>
                        <input type="password" name="password" class="form-control" value="{{ $profile->password }}">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>



                    <div class="row mt-3">


                        <div class="col">
                            <label for="nomer" class="form-label">Nomor Hp</label>
                            <input type="text" class="form-control" name="phone_number" value="{{ $profile->phone_number }}">
                            @error('phone_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" class="form-control" name="street"
                                placeholder="write your message here.."> {{ $profile->street }}</textarea>
                            @error('street')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <label for="inputGroupFile04" class="form-label mt-3">Masukan Photo Profile</label>
                    <div class="input-group">
                        <input type="file" name="image" class="form-control" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" value="{{ $profile->image }}">
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                    <a href="{{ route('beranda.index') }}" class="btn btn-secondary mt-3">Back</a>
                </form>
            </div>
        </div>
    </div>

    @endforeach






    @endsection
