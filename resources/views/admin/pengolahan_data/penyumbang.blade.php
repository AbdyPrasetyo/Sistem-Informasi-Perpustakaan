@extends('layouts.main')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengolahan Data /</span> Data Penyumbang Buku</h4>

<!-- Bordered Table -->
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
<div class="card mb-4">
    <h5 class="card-header">
        <a href="{{ route('donatur.create') }}" class="btn btn-primary">
            Tambah Data Penyumbang </a>

    </h5>
    <form>

    </form>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mb-4" id="buttons">
                <thead class="table-dark">
                    <tr>

                        <th class="text-center">No Identitas</th>
                        <th class="text-center">NAMA</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Kontak</th>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Jumlah Disumbang</th>
                        <th class="text-center">Total Item</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                {{-- <tbody class="text-center">
                    @foreach ($donatur as $d )

                    <tr>
                        <td class="align-top">{{ $d->nis }}</td>
                        <td class="align-top">{{ $d->name }}</td>
                        <td class="align-top">{{ $d->street }}</td>
                        <td class="align-top">{{ $d->contact }}</td>
                        <td>

                            <ul>
                                @foreach ($d->item as $b )

                                <li>
                                    {{ $b->title }}

                                </li>

                            </ul>

                        </td>
                        <td class="align-top">

                            {{ $b->amount }}

                        </td>

                        @endforeach

                        <td class="align-top">

                            <button class="btn btn-sm btn-danger">

                                delete
                            </button>


                        </td>
                    </tr>
                    @endforeach

                </tbody> --}}
                <tbody class="text-center">
                    @foreach ($donatur as $d )
                    <tr>
                        <td class="align-top">{{ $d->nis }}</td>
                        <td class="align-top">{{ $d->name }}</td>
                        <td class="align-top">{{ $d->street }}</td>
                        <td class="align-top">{{ $d->contact }}</td>
                        <td class="align-top">
                            <ul>
                                @foreach ($d->item as $b )
                                <li>
                                    {{ $b->title }}
                                </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="align-top">
                            @foreach ($d->item as $b )
                            {{ $b->amount }}<br>
                            @endforeach
                        </td>
                        <td class="align-top">
                            {{ count($d->item) }}
                        </td>
                        <td class="align-top">
                            <form action="{{ route('donatur.destroy', $d->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>


            </table>
            <hr class="my-5">
        </div>
    </div>
</div>







@push('js')

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('#buttons').DataTable();
        $('select:not(#exampleModal)').each(function () {
            $(this).select2({
                width: '100%',
                dropdownParent: $(this).parent()
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Tambahkan input ketika tombol "Tambah Barang" diklik
        i = 0;
        $("#btn-add").click(function () {
            ++i;
            var item = `
<div id="items">
    <div class="item">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Masukan Judul Buku" aria-label="Masukan Judul Buku"
                name="inputs[` + i + `][title]" aria-describedby="button-addon2">
            <input type="text" class="form-control" placeholder="Masukan Jumlah Buku" aria-label="Masukan Jumlah Buku"
                name="inputs[` + i + `][amounts]" aria-describedby="button-addon2">
            <button class="btn btn-outline-danger btn-remove" type="button" id="button-addon2">Remove</button>
        </div>

    </div>
</div>
      `;
            $("#items").append(item);
        });

        // Hapus input ketika tombol "Hapus" diklik
        $(document).on("click", ".btn-remove", function () {
            $(this).closest(".item").remove();
        });
    });
</script>
@endpush
</div>
@endsection
