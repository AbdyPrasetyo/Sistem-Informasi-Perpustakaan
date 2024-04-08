@extends('layouts.main')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Katalog Buku /</span> Data Kategori Buku</h4>



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
    <h5 class="card-header"><Button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah
            Data</Button></h5>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mb-4 justify-content-center" id="example"  >
                <thead class="table-dark">
                    <tr>
                        <th  class="text-center">No</th>
                        <th  class="text-center">Kategori Buku</th>
                        <th  class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody >
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($categories as $cate)
                    <tr >
                        <td  class="text-center align-text-top">{{ $no++ }}</td>
                        <td  class="text-center align-text-top">{{ $cate->categori_name }}</td>
                        <td class="text-center align-text-top">
                            <Button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#update-{{ $cate->categorie_id }}"><i class='bx bx-edit-alt'></i>
                                Edit</Button>
                            <Button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-{{ $cate->categorie_id }}">
                                <i class='bx bx-trash'></i> Delete</Button>
                        </td>
                    </tr>


                     <!-- Modal update-->
                     <div class="modal fade" id="update-{{ $cate->categorie_id  }}" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Masukan Data Perubahan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('kategori.update', $cate->categorie_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="categori_name" class="form-label">Kategori</label>
                                            <input type="text" class="form-control" @error('categori_name') is-invalid @enderror
                                                name="categori_name" value="{{ old('categori_name', $cate->categori_name) }}" required>

                                            <!-- error message untuk categori_name -->
                                            @error('categori_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- end modal --}}


                    <!-- Modal delete -->
                    <div class="modal fade" id="delete-{{ $cate->categorie_id }}" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin ingin Menghapus data!!!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('kategori.destroy',  $cate->categorie_id ) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <div class="text-center">
                                           <h5 class="text-danger"> {{ $cate->categori_name  }}</h5>
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
                    @endforeach
                </tbody>


            </table>
              <!--/ Basic DataTable -->

    <hr class="my-5">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukan Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Kategori Buku</label>
                        <input type="text" class="form-control" id="defaultFormControlInput" @error('categori_name')
                            is-invalid @enderror" name="categori_name" id="categori_name"
                            value="{{ old('categori_name') }}" required />
                        <!-- error message untuk categori_name -->
                        @error('categori_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
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
