@extends('layouts.main')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Katalog Buku /</span> Data Administrator</h4>


@if (session('success'))
<div class="alert alert-primary alert-dismissible" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (session('error'))<div class="alert alert-danger alert-dismissible" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<!-- Bordered Table -->
<div class="card mb-4">
    <h5 class="card-header"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah
            Data Administrator </button></h5>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mb-4 justify-content-center" id="example"  >
                <thead class="table-dark">
                    <tr>

                        <th>No</th>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($usr as $dat)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $dat->nis }}</td>
                        <td>{{ $dat->name }}</td>
                        <td>{{ $dat->password }}</td>
                        <td>

                                <Button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#update-{{ $dat->id }}">
                                <i class='bx bx-edit-alt'></i> Edit</Button>
                                <Button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-{{ $dat->id }}">
                                <i class='bx bx-trash'></i> Delete</Button>





                        </td>
                    </tr>

   <!-- Modal delete -->
   <div class="modal fade" id="delete-{{ $dat->id }}" tabindex="-2" aria-labelledby="#exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengguna.destroy', $dat->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="text-center">
                       <h5 class="text-danger"> </h5>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end modal --}}


                    <!-- Modal update -->
                    <div class="modal fade" id="update-{{ $dat->id }}" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('pengguna.update', $dat->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                            <div class="col">
                                                <label for="nis" class="form-label">NIP</label>
                                                <input type="number" id="nis" name="nis" class="form-control" placeholder="contoh: 19330017" value="{{ old('nis', $dat->nis) }}" required>
                                                @error('nis')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            </div>
                                            <div class="col">
                                                <label for="Nama" class="form-label mt-2">Nama Petugas</label>
                                                <input type="text" id="Nama" name="name" class="form-control" placeholder="your name" value="{{ old('name', $dat->name) }}" required>
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            </div>

                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="sandi" class="form-label">Kata Sandi</label>
                                                <input type="password" id="sandi" name="password" class="form-control" placeholder="Masukan Kata Sandi minimal 8 karakter" value="{{ old('password', $dat->password) }}" required>
                                                @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    {{-- end modal --}}





                    @endforeach
                </tbody>


            </table>
              <!--/ Basic DataTable -->

    <hr class="my-5">


                    <!-- Modal tamabah -->
                    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Admin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">

                                        @csrf
                                        <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                                <div class="col">
                                                    <label for="nis" class="form-label">NIP</label>
                                                    <input type="number" id="nis" name="nis" class="form-control" placeholder="Masukan Nomor Induk Petugas" value="{{ old('nis') }}" required>
                                                    @error('nis')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="col">
                                                    <label for="Nama" class="form-label mt-2">Nama Petugas</label>
                                                    <input type="text" id="Nama" name="name" class="form-control" placeholder="your name" value="{{ old('name') }}" required>
                                                    @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                </div>

                                            <div class="row mt-3">
                                                <div class="col">
                                                    <label for="sandi" class="form-label">Kata Sandi</label>
                                                    <input type="password" id="sandi" name="password" class="form-control" placeholder="Masukan Kata Sandi minimal 8 karakter" value="{{ old('password') }}" required>
                                                    @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- end modal --}}
                    </div>
            @push('js')

            <script  type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script  type="text/javascript" charset="utf8" src=" http://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
            <script  type="text/javascript" charset="utf8" src=" https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
            <script>
                $(document).ready(function () {
                $('#example').DataTable();
                }); </script>
            @endpush
        </div>
            @endsection



