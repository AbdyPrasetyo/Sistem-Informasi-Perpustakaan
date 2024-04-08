
@extends('layouts.main')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Katalog Buku /</span> Data Penerbit</h4>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukan Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('penerbit.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Nama Penerbit</label>
                        <input type="text" class="form-control"   @error('name_publisher')
                            is-invalid @enderror" name="name_publisher" id="name_publisher"
                            value="{{ old('name_publisher') }}" required />

                        <!-- error message untuk categori_name -->
                        @error('name_publisher')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end modal --}}

@if (session('success'))
<div class="alert alert-primary alert-dismissible" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (session('update'))
<div class="alert alert-warning alert-dismissible" role="alert">
    {{ session('update') }}
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
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered mb-4 justify-content-center" id="smackdown"  >
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Penerbit</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($penerbit as $t)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $t->name_publisher }}</td>
                        <td>

                            <Button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#update-{{ $t->publisher_id }}"><i class='bx bx-edit-alt'></i>
                                Edit</Button>

                                <Button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-{{ $t->publisher_id }}">
                                    <i class='bx bx-trash'></i> Delete</Button>


                        </td>
                    </tr>


                    <!-- Modal update-->
                    <div class="modal fade" id="update-{{ $t->publisher_id }}" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Masukan Data Perubahan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('penerbit.update', $t->publisher_id ) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div>
                                            <label for="defaultFormControlInput" class="form-label">Nama Penerbit</label>
                                            <input type="text" class="form-control"   @error('name_publisher')
                                                is-invalid @enderror" name="name_publisher" id="name_publisher"
                                                value="{{ old('name_publisher', $t->name_publisher) }}" required />

                                            <!-- error message untuk categori_name -->
                                            @error('name_publisher')
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
                    <div class="modal fade" id="delete-{{ $t->publisher_id }}" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin ingin Menghapus data!!!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('penerbit.destroy', $t->publisher_id ) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <div class="text-center">
                                           <h5 class="text-danger"> {{ $t->name_publisher  }}</h5>
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
            @push('js')

            <script  type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script  type="text/javascript" charset="utf8" src=" http://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
            <script  type="text/javascript" charset="utf8" src=" https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
            <script>
                $(document).ready(function () {
                $('#smackdown').DataTable();
                }); </script>
            @endpush
        </div>
            @endsection



