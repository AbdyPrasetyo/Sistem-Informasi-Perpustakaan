@extends('layouts.main')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengolahan Data /</span> Tambah Data Penyumbang Buku</h4>

<!-- Custom file input -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Identitas Penyumbang</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <form action="{{ route('donatur.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Id Anggota</label>
                            <input type="text" name="nis" placeholder="Masukan ID Anggota Perpustakaan" class="form-control" required>
                            @error('nis')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" placeholder="Masukan Nama Lengkap" class="form-control" required>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>


                    <div class="row mt-3">



                        <div class="col">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" class="form-control"
                            name="street" placeholder="write your message here.." required> </textarea>
                            @error('street')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>


                        <div class="col">
                            <label for="nomer" class="form-label">Kontak</label>
                            <input type="number" id="nomer" class="form-control" placeholder="Nomer HP Aktif" name="contact" required>
                            @error('contact')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>


                      {{-- percoaan --}}
                      <h5 class="modal-title mt-5 mb-0" id="exampleModalLabel">Item Buku</h5>
                      <button type="button" class="btn btn-outline-primary col-3 mb-2" id="btn-add">Tambah Item</button>
                      <div id="items">
                          <div class="item">
                              <div class="input-group mb-3">
                                  <input type="text" class="form-control" placeholder="Masukan Judul Buku"
                                      aria-label="Masukan Judul Buku" name="inputs[0][title]" aria-describedby="button-addon2" required>
                                  <input type="number" class="form-control" placeholder=" Masukan Jumlah Buku"
                                      aria-label="Masukan Jumlah Buku" name="inputs[0][amount]" aria-describedby="button-addon2" required>
                                  <button class="btn btn-outline-danger btn-remove" type="button"
                                      id="button-addon2">Remove</button>
                              </div>
                          </div>
                      </div>
                      {{-- end percobaan --}}
                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                    <a href="{{ route('donatur.index') }}" class="btn btn-secondary mt-3">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('js')

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
$(document).ready(function() {
// Tambahkan input ketika tombol "Tambah Barang" diklik
i = 0;
$("#btn-add").click(function() {
++i;
var item = `
<div id="items">
<div class="item">
<div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Masukan Judul Buku" aria-label="Masukan Judul Buku"
        name="inputs[`+i+`][title]" aria-describedby="button-addon2" required>
    <input type="number" class="form-control" placeholder="Masukan Jumlah Buku" aria-label="Masukan Jumlah Buku"
        name="inputs[`+i+`][amount]" aria-describedby="button-addon2" required>
    <button class="btn btn-outline-danger btn-remove" type="button" id="button-addon2">Remove</button>
</div>

</div>
</div>
`;
$("#items").append(item);
});

// Hapus input ketika tombol "Hapus" diklik
$(document).on("click", ".btn-remove", function() {
$(this).closest(".item").remove();
});
});
</script>
@endpush



