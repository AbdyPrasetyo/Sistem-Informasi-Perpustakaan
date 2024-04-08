@extends('layouts.main')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengolahan Data /</span> Data Anggota</h4>


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
    <h5 class="card-header"><a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah
            Data Anggota </a></h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered mb-4 justify-content-center" id="example"  >
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>NAMA</th>
                        <th>JURUSAN</th>
                        <th>ALAMAT</th>
                        <th>NO HP</th>
                        <th>PHOTO PROFILE</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $dat)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $dat->nis }}</td>
                        <td>{{ $dat->name }}</td>
                        <td>{{ $dat->major }}</td>
                        <td>{{ $dat->street }}</td>
                        <td>{{ $dat->phone_number }}</td>
                        <td>
                            <ul class="list-unstyled">
                            <li
                            data-bs-toggle="tooltip"
                            data-popup="tooltip-custom"
                            data-bs-placement="top"
                            class="avatar avatar-xs pull-up "
                            title="{{ $dat->name }}">


                            @if ($dat->image != null)
                            <img class=" rounded-circle" src="{{ asset('/img/avatars/' . $dat->image) }}" />
                            @else
                            <img class=" rounded-circle" src="{{ asset('/img/avatars/6.png') }}">
                            @endif
                        </li>
                            </ul></td>
                        <td>
                            <a href="{{ route('anggota.edit', $dat->id) }}" class="btn btn-sm btn-warning"><i class='bx bx-edit-alt'></i>
                                Edit</a>
                                <Button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-{{ $dat->id }}">
                                <i class='bx bx-trash'></i> Delete</Button>


                        </td>
                    </tr>



                    <!-- Modal delete -->
                    <div class="modal fade" id="delete-{{ $dat->id }}" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('anggota.destroy', $dat->id) }}" method="POST">
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
                $('#example').DataTable();
                }); </script>
            @endpush
        </div>
            @endsection



