@extends('layouts.main')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu Sirkulasi /</span> Data Buku Hilang</h4>


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
    <h5 class="card-header"><a href="{{ url('export_confirm_hilang') }}" class="btn btn-success">Export Data</a></h5>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mb-4 justify-content-center" id="example">
                <thead class="table-dark">
                    <tr>
                        <th class="align-text-top">No</th>
                        <th class="align-text-top">Kode Buku</th>
                        <th class="align-text-top">Judul</th>
                        <th class="align-text-top">NIS</th>
                        <th class="align-text-top">NAMA </th>
                        <th class="align-text-top">TGL PINJAM</th>
                        <th class="align-text-top">TGL KEMBALI</th>
                        <th class="align-text-top">TGL Konfirmasi</th>
                        <th class="align-text-top">TERLAMBAT</th>
                        <th class="align-text-top">DENDA</th>
                        <th class="align-text-top">STATUS</th>
                        <th class="align-text-top">Pelunasan</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $dat )
                    <tr>
                        <td class="align-text-top">{{ $no++ }}</td>
                        <td class="align-text-top">{{ $dat->book_code }}</td>
                        <td class="align-text-top">{{ $dat->title }}</td>
                        <td class="align-text-top">{{ $dat->nis }}</td>
                        <td class="align-text-top">{{ $dat->name }}</td>
                        <td class="align-text-top">{{ $dat->created }}</td>
                        <td class="align-text-top">{{ $dat->deadline }}</td>
                        <td class="align-text-top">{{ $dat->return_date }}</td>
                        <td class="align-text-top">
                        <span class="badge bg-label-warning me-1">{{ $dat->late }} Hari</span></td>
                        <td class="align-text-top">
                        <span class="badge bg-label-danger me-1">Rp. {{ $dat->charge }}</span></td>
                        <td class="align-text-top">
                            <span class="badge bg-label-info me-1">{{ $dat->status }}</span>
                        </td>
                        <td class="align-text-top"><button class=" m-2 btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#lunasi-{{ $dat->transaction_id }}">Confirm</button></td>

                    </tr>


                     <!-- Modal Kembali -->
                     <div class="modal fade" id="lunasi-{{ $dat->transaction_id }}" tabindex="-1"
                        aria-labelledby="returnModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-danger" id="returnModalLabel">Apakah buku yang hilang telah diganti?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('riwayat.update', $dat->transaction_id) }}" method="POST">
                                        @method('PUT')
                                        @csrf

                                        <span class="text-dark">Nis:</span>  <span class="text-primary ">   {{ $dat->nis }}</span><br>
                                        <span class="text-dark">Nama:</span>  <span class="text-primary "> {{ $dat->name }}</span><br>
                                        <span class="text-dark">Judul:</span> <span class="text-primary ">{{ $dat->title }}</span>

                                        <p class="text-danger mt-4">Silahkan lakukan penambahan stok buku secara manual jika buku yang diganti sejenis, jika tidak sejenis silahkan tambahkan jenis buku baru atau menambahkan stok pada buku yang relevan</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal Kembali --}}
                    @endforeach


                </tbody>


            </table>
            <!--/ Basic DataTable -->

            <hr class="my-5">



            @push('js')

            <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script type="text/javascript" charset="utf8"
                src=" http://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" charset="utf8"
                src=" https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#example').DataTable();
                });
            </script>
            @endpush
        </div>
        @endsection
