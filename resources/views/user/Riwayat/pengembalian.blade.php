@extends('layouts.mainuser')
@section('content')








<h4 class="fw-bold py-3 mb-4">
   Riwayat Peminjaman</h4>


<!-- Bordered Table -->

<div class="card mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mb-4 justify-content-center text-center " id="example">
                <thead class="table-dark">
                    <tr>
                        <th class="align-text-top text-center">No</th>
                        <th class="align-text-top text-center">KODE BUKU</th>
                        <th class="align-text-top text-center">Judul</th>
                        <th class="align-text-top text-center">ID Anggota</th>
                        <th class="align-text-top text-center">NAMA</th>
                        <th class="align-text-top text-center">Tgl PINJAM</th>
                        <th class="align-text-top text-center">Batas Pinjam</th>
                        <th class="align-text-top text-center">Tgl Kembali</th>
                        <th class="align-text-top text-center">TERLAMBAT</th>
                        <th class="align-text-top text-center">DENDA</th>
                        <th class="align-text-top text-center">STATUS</th>

                    </tr>
                </thead>
                <tbody>


                    @php
                    $no = 1;
                    @endphp
                    @foreach ($kembali as $dat )
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
                            <span class="badge bg-label-success me-1">{{ $dat->status }}</span>
                        </td>

                    </tr>
                    @endforeach


                </tbody>


            </table>
            <!--/ Basic DataTable -->

            <hr class="my-5">

        </div>

            @push('js')


            <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script type="text/javascript" charset="utf8"
                src=" http://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" charset="utf8"
                src=" https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#example').DataTable();


                });
            </script>




            @endpush
    </div>

@endsection
