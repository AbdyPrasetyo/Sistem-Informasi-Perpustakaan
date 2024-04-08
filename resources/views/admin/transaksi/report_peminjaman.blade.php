
<style>
.table1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 50%;
    border: 1px solid #f2f5f7;
}

.table1 tr th{
    background: #040708;
    color: #fff;
    font-weight: normal;
}

.table1, th, td {
    padding: 7px;
    text-align: center;
}

.table1 tr:hover {
    background-color: #f5f5f5;
}

.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}
.text-center{
    text-align: center;
}

</style>

@php
$tanggal_pinjam = date("Y-m-d");
$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
$kembali = date("Y-m-d", $tujuh_hari);

@endphp


<!-- Bordered Table -->
<div class="text-center">



    <h1>PERPUSTAKAAN SMK NEGERI 1 SEBATIK BARAT</h1>
    <p>Jl. Trans Sebatik,  Sebatik Barat, Kalimantan Utara</p>
    <p>No Telp: (0212) 008899 Fax: (0234) 089298</p>
    <p>Website: <a href="">smkn1.sebatikbarat.com</a> , Email: <a href="">smkn1.sebatikbarat@gmail.com</a> </p>
</div>

<hr>
<h1 class="text-center">Laporan Data Peminjaman Buku</h1>


            <table class="table1 text-center ">
                <thead class="table-dark">
                    <tr>
                        <th class="align-text-top text-center" >No</th>
                        <th class="align-text-top text-center" width="100px">Kode Buku</th>
                        <th class="align-text-top text-center">NIS</th>
                        <th class="align-text-top text-center" width="150px">Nama </th>
                        <th class="align-text-top text-center" width="100px">Tgl Pinjam</th>
                        <th class="align-text-top text-center" width="100px">Tgl Kembali</th>
                        <th class="align-text-top text-center">Terlambat</th>
                        <th class="align-text-top text-center" width="100px">Denda</th>
                        <th class="align-text-top text-center">Status</th>

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

                    </tr>
                    {{-- batas --}}



                    @endforeach

                </tbody>


            </table>
