@extends('layouts.main')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Katalog Buku /</span> Data Denda </h4>

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
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered mb-4 justify-content-center text-center" id="example"  >
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Rak</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
@foreach ($denda as $d )


                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->charge }}</td>
                        <td>
                            <Button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#update-{{ $d->id }}"><i class='bx bx-edit-alt'></i>
                                Edit</Button>
                        </td>
                    </tr>



                    <!-- Modal update-->
                    <div class="modal fade" id="update-{{ $d->id }}" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Masukan Data Perubahan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('denda.update', $d->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="name_rak" class="form-label">Besaran Denda</label>
                                            <input type="text" class="form-control @error('charge') is-invalid @enderror"
                                                name="charge" value="{{ old('charge', $d->charge) }}" required>

                                            <!-- error message untuk categori_name -->
                                            @error('charge')
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


                </tbody>
                @endforeach

            </table>
              <!--/ Basic DataTable -->

        </div>
            @endsection



