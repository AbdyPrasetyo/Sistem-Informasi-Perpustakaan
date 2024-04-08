
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
    padding: 6px;
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




<!-- Bordered Table -->
<div class="text-center">



    <h1>PERPUSTAKAAN SMK NEGERI 1 SEBATIK BARAT</h1>
    <p>Jl. Trans Sebatik,  Sebatik Barat, Kalimantan Utara</p>
    <p>No Telp: (0212) 008899 Fax: (0234) 089298</p>
    <p>Website: <a href="">smkn1.sebatikbarat.com</a> , Email: <a href="">smkn1.sebatikbarat@gmail.com</a> </p>
</div>

<hr>
<h1 class="text-center">Laporan Data Konfirmasi Buku Hilang</h1>


            <table class="table1 text-center ">
                <thead class="table-dark">
                    <tr>
                        <th class="align-text-top">No</th>
                        <th class="align-text-top">Kode Buku</th>
                        <th class="align-text-top">NIS</th>
                        <th class="align-text-top" width="100px">Nama </th>
                        <th class="align-text-top" width="100px">Tgl Pinjam</th>
                        <th class="align-text-top" width="100px">Tgl Kembali</th>
                        <th class="align-text-top" width="100px">Tgl Konfirmasi</th>
                        <th class="align-text-top">Terlambat</th>
                        <th class="align-text-top" width="100px">Denda</th>
                        <th class="align-text-top">Status</th>

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
                        <td class="align-text-top">{{ $dat->nis }}</td>
                        <td class="align-text-top">{{ $dat->name }}</td>
                        <td class="align-text-top">{{ $dat->created }}</td>
                        <td class="align-text-top">{{ $dat->deadline }}</td>
                        <td class="align-text-top">{{ $dat->return_date }}</td>
                        <td class="align-text-top">
                        <span class="badge bg-label-warning me-1">{{ $dat->late }} Hari</span></td>
                        <td class="align-text-top">
                        <span class="badge bg-label-danger me-1">Rp.{{ $dat->charge }}</span></td>
                        <td class="align-text-top">
                            <span class="badge bg-label-info me-1">{{ $dat->status }}</span>
                        </td>

                    </tr>


                    {{-- batas --}}



                    @endforeach

                </tbody>


            </table>
