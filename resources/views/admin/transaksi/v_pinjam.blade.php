@extends('layouts.main')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>
@endpush
@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu Sirkulasi /</span> Data Transaksi
    Peminjaman</h4>
@php
$tanggal_pinjam = date("Y-m-d");
$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
$kembali = date("Y-m-d", $tujuh_hari);

@endphp

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukan Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('peminjaman.store')}}" method="POST">
                    @csrf



                    <div class="col">
                        <label for="book" class="form-label">Judul Buku</label>
                        <select id="book" class="form-select " aria-label="Default select example2"
                            name="book_id">

                            <option value="" disabled selected>-- Pilih Kode & Judul Buku --</option>
                            @foreach ($book as $b)
                            <option value="{{ $b->book_id }}">({{ $b->book_code }})
                                <span class="me-1"> {{ $b->title }} </span>
                            </option>
                            @endforeach
                        </select>
                        @error('book_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="col">
                        <label for="peminjam" class="form-label mt-2">Nama Peminjam</label>
                        <select id="peminjam" class="form-select" aria-label="Default select example2" name="users_id">
                            <option value="" disabled selected>-- Pilih NIS & Nama Anggota --</option>
                            @foreach ($user as $u)
                            <option value="{{ $u->id }}">
                                ({{ $u->nis }})
                                <span class="me-1"> {{ $u->name }} </span>
                            </option>
                            @endforeach
                        </select>
                        @error('id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label for="defaultFormControlInput" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="defaultFormControlInput" name="created"
                            @error('created') is-invalid @enderror" value="{{ $tanggal_pinjam }}" readonly />
                        <!-- error message untuk categori_name -->
                        @error('created')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="defaultFormControlInput" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="defaultFormControlInput" @error('deadline')
                            is-invalid @enderror" name="deadline" id="defaultFormControlInput" value="{{ $kembali }}"
                            readonly />
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
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- endmodal --}}
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
    <h5 class="card-header"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah
            Transaksi Peminjaman </button>
        <a href="{{ url('export_peminjaman') }}" class="btn btn-success">Export
            Peminjaman </a></h5>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mb-4 justify-content-center text-center " id="example">
                <thead class="table-dark">
                    <tr>
                        <th class="align-text-top text-center">No</th>
                        <th class="align-text-top text-center">KODE BUKU</th>
                        <th class="align-text-top text-center">Judul</th>
                        <th class="align-text-top text-center">NIS</th>
                        <th class="align-text-top text-center">NAMA PEMINJAM</th>
                        <th class="align-text-top text-center">TANGGAL PINJAM</th>
                        <th class="align-text-top text-center">TANGGAL KEMBALI</th>
                        <th class="align-text-top text-center">TERLAMBAT</th>
                        <th class="align-text-top text-center">DENDA</th>
                        <th class="align-text-top text-center">STATUS</th>
                        <th class="align-text-top text-center">ACTION</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ( $denda as $d )
                    @php
                    $den= $d->charge;
                    $no = 1;
                    @endphp
                    @endforeach
                    @foreach ($data as $dat )


                    <tr>
                        <td class="align-text-top">{{ $no++ }}</td>
                        <td class="align-text-top">{{ $dat->book_code }}</td>
                        <td class="align-text-top">{{ $dat->title }}</td>
                        <td class="align-text-top">{{ $dat->nis }}</td>
                        <td class="align-text-top">{{ $dat->name }}</td>
                        <td class="align-text-top">{{ $dat->created }}</td>
                        <td class="align-text-top">{{ $dat->deadline }}</td>
                        <td class="align-text-top">
                            @php




                            $deadline = strtotime($dat->deadline);
                            $now = time();
                            $diff = $now - $deadline;
                            $con = floor($diff / (60 * 60 * 24)) ;
                            $cal = $den * $con;


                            $la=0;
                            @endphp


                            @if ($diff < 0) <span class="badge bg-label-danger me-1">
                                {{   floor($la / (60 * 60 * 24))  }} hari</span> <br>
                                @else
                                <span class="badge bg-label-danger me-1">{{   floor($diff / (60 * 60 * 24))  }}
                                    hari</span> <br>
                                @endif


                        </td>

                        <td class="align-text-top">

                            @if ($diff < 0) <span class="badge bg-label-warning me-1">Rp. {{  $la }}</span>
                                @else
                                <span class="badge bg-label-warning me-1">Rp. {{  $cal }}</span>
                                @endif


                        </td>
                        <td class="align-text-top">
                            <span class="badge bg-label-primary me-1">{{ $dat->status }}</span>
                        </td>
                        <td class="d-block text-center">


                            <button class="m-2 btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#updateModal-{{ $dat->transaction_id }}">Perpanjang</button>

                            <button class=" m-2 btn btn-sm btn-success" data-bs-toggle="modal"
                                data-bs-target="#returnModal-{{ $dat->transaction_id }}">Pengembalian</button>
                            <button class=" m-2 btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#hilangModal-{{ $dat->transaction_id }}">Hilang</button>
                        </td>
                    </tr>
                    {{-- batas --}}

                    <!-- Modal Update -->
                    <div class="modal fade" id="updateModal-{{ $dat->transaction_id }}" tabindex="-1"
                        aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel">Yakin perpanjang masa peminjaman?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                    <form action="{{ route('peminjaman.update', $dat->transaction_id)}}" method="POST">
                                        @method('PUT')
                                        @csrf

                                        <span class="text-dark">Nis:</span> <span class="text-primary ">
                                            {{ $dat->nis }}</span><br>
                                        <span class="text-dark">Nama:</span> <span class="text-primary ">
                                            {{ $dat->name }}</span><br>
                                        <span class="text-dark">Judul:</span> <span
                                            class="text-primary ">{{ $dat->title }}</span>


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
                    {{-- End Modal Update --}}

                    <!-- Modal Kembali -->
                    <div class="modal fade" id="returnModal-{{ $dat->transaction_id }}" tabindex="-1"
                        aria-labelledby="returnModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="returnModalLabel">Yakin ingin pengembalian buku?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('pengembalian.update', $dat->transaction_id) }}"
                                        method="POST">
                                        @method('PUT')
                                        @csrf

                                        <span class="text-dark">Nis:</span> <span class="text-primary ">
                                            {{ $dat->nis }}</span><br>
                                        <span class="text-dark">Nama:</span> <span class="text-primary ">
                                            {{ $dat->name }}</span><br>
                                        <span class="text-dark">Judul:</span> <span
                                            class="text-primary ">{{ $dat->title }}</span>
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
                    <!-- Modal Hilang -->
                    <div class="modal fade" id="hilangModal-{{ $dat->transaction_id }}" tabindex="-1"
                        aria-labelledby="returnModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="returnModalLabel">Apakah data yang bersangkutan telah
                                        menghilangakan buku?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('hilang.update', $dat->transaction_id) }}" method="POST">
                                        @method('PUT')
                                        @csrf

                                        <span class="text-dark">Nis:</span> <span class="text-primary ">
                                            {{ $dat->nis }}</span><br>
                                        <span class="text-dark">Nama:</span> <span class="text-primary ">
                                            {{ $dat->name }}</span><br>
                                        <span class="text-dark">Judul:</span> <span
                                            class="text-primary ">{{ $dat->title }}</span>
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
                    {{-- End Modal Hilang --}}

                    @endforeach

                </tbody>


            </table>
            <!--/ Basic DataTable -->

            <hr class="my-5">



            @push('js')


            <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#example').DataTable();
                    $('select:not(#exampleModal)').each(function () {
                    $(this).select2({
                        width: '100%',
                        dropdownParent: $(this).parent()
                    });
                });
            });


            </script>




            @endpush
        </div>
        @endsection
