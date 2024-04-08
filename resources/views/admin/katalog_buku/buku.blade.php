@extends('layouts.main')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Katalog Buku /</span> Data Buku</h4>


<div class="card mb-4">
    <h5 class="card-header">
        <a href="{{ route('buku.create') }}" class="btn btn-primary">
            Tambah Data Buku
        </a>
        @if (session('success'))
        <div class="alert alert-primary alert-dismissible mt-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('error'))<div class="alert alert-danger alert-dismissible mt-4" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- <form class="navbar-search mb-3 mt-3" action="{{ route('buku.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="search" name="search" class="form-control" placeholder="Cari Judul Buku"
                    aria-label="search" aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit" id="button-addon2"> <i class='bx bx-search'></i></button>
            </div>
        </form> --}}

    </h5>

    <div class="card-body">
    <div class="table-responsive text-nowrap">
        <table class="table table-bordered mb-4 justify-content-center text-center" id="example"  >
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kode Buku</th>
                    <th>Kategori</th>
                    <th>Pengarang</th>
                    <th>Jumlah</th>
                    <th>Image </th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
@foreach ($books as $b )

<tr>
    <td class="align-text-top">{{ $no++ }}</td>
<td class="align-text-top">{{ $b->title }}</td>
<td class="align-text-top">{{ $b->book_code }}</td>
<td class="align-text-top">{{ $b->book_category }}</td>
<td class="align-text-top">{{ $b->author }}</td>
<td class="align-text-top">{{ $b->amount }}</td>
<td> @if ($b->image != null)
    <img class="card-circle" src="{{ asset('img/books/'. $b->image) }}"  height="100px" />
    @else
    <img class="card-img" src="{{ asset('/img/books/2.jpg') }}"  height="100px">
    @endif </td>
<td class="align-text-top"><a href="{{ route('buku.show', $b->book_id) }}" class="btn btn-sm btn-success">Detail</a>
 <a class="btn btn-sm btn-warning"
            href="{{ route('buku.edit', $b->book_id) }}"
            style="text-decoration: none;color:white">
            Edit</a>
 <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
        data-bs-target="#delete-{{ $b->book_id }}">Delete</button></td>
</tr>

  <!-- Modal delete -->
  <div class="modal fade" id="delete-{{ $b->book_id }}" tabindex="-1" aria-labelledby="#exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin ingin Menghapus data!!!
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('buku.destroy',  $b->book_id ) }}" method="POST">
                    @method('DELETE')
                    @csrf

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary"
                    data-bs-dismiss="modal">Close</button>
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
    {{-- <div class="row">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse ($books as $b)
                <div class="col">
                    <div class="card h-100">
                        @if ($b->image != null)
                        <img class="card-img-top" src="{{ asset('img/books/'. $b->image) }}"  height="500px" />
                        @else
                        <img class="card-img-top" src="{{ asset('/img/books/2.jpg') }}"  height="500px">
                        @endif <div class="card-body">
                            <h6 class="card-title text-uppercase text-primary text-center"> {{ $b->title }}</h6>
                            <table class="m-5 table-responsive mt-0" cellpadding="6">
                                <tr>
                                    <td>Kode Buku</td>
                                    <td>:</td>
                                    <td>{{ $b->book_code }}</td>
                                </tr>
                                <tr>
                                    <td>Pengarang</td>
                                    <td>:</td>
                                    <td>{{ $b->author }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td>{{ $b->book_category }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>:</td>
                                    <td>{{ $b->amount }}</td>
                                </tr>
                            </table>
                            <table class="m-5 table-responsive" cellpadding="2">
                                <tr>
                                    <td><a href="{{ route('buku.show', $b->book_id) }}" class="btn btn-sm btn-success">Detail</a></td>
                                    <td> <a class="btn btn-sm btn-warning"
                                                href="{{ route('buku.edit', $b->book_id) }}"
                                                style="text-decoration: none;color:white">
                                                Edit</a></td>
                                    <td> <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-{{ $b->book_id }}">Delete</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>



                @empty

                <h1 class="text-primary mt-3">Tidak ada buku</h1>

                @endforelse
            </div>
        </div>
    </div>

    <div class="d-flex flex-row mb-3 justify-content-between mt-3">
        <p class="text-primary m-4">Menampilkan {{ $books->currentPage() }} dari {{ $books->lastPage() }} Halaman</p>


        {{ $books->links() }}

    </div> --}}
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

@endsection
