@extends('frondend.partial.content')
@section('content')
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background-image: url(' ../assets1/img/12.jpg'); ">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4 animated slideInDown">Koleksi Buku</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('koleksi') }}">Koleksi</a></li>
                        <li class="breadcrumb-item text-primary" aria-current="page">Detail Buku</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->
<div class="container ">



                        <div class="feature-item border h-100 p-5">
                                <div class="col">
                                    @if($book->image !=null)
                                    <img class="img mb-3 mt-3" src="{{ asset('img/books/'. $book->image) }}" width="300px" height="350px">
                                    @else
                                    <img class="img mb-3 mt-3" src="{{ asset('img/books/'. $book->image) }}" width="300px" height="350px">
                                    @endif
                            </div>


<div class="justify-content-center">


                                <table class=" table-responsive mt-0 " cellpadding="6">
                                  <tr class="align-text-top">
                                      <td>Judul Buku</td>
                                      <td>:</td>
                                      <td class="text-uppercase text-primary">{{ $book->title }}</td>
                                  </tr>

                                  <tr>
                                      <td>Kode Buku</td>
                                      <td>:</td>
                                      <td>{{ $book->book_code }}</td>
                                  </tr>
                                  <tr>
                                      <td>ISBN</td>
                                      <td>:</td>
                                      <td>{{ $book->isbn }}</td>
                                  </tr>
                                  <tr>
                                      <td width="300px">Kategori Buku</td>
                                      <td>:</td>
                                      <td>{{ $book->book_category }}</td>
                                  </tr>

                                  <tr>
                                      <td>Lokasi Buku</td>
                                      <td>:</td>
                                      <td>{{ $book->book_location }}</td>
                                  </tr>
                                  <tr>
                                      <td>Pengarang</td>
                                      <td>:</td>
                                      <td>{{ $book->author }}</td>
                                  </tr>
                                  <tr>
                                      <td>Penerbit</td>
                                      <td>:</td>
                                      <td>{{ $book->publisher }}</td>
                                  </tr>
                                  <tr>
                                      <td>Tahun Terbit</td>
                                      <td>:</td>
                                      <td>{{ $book->year }}</td>
                                  </tr>
                                  <tr>
                                      <td>Jumlah Buku</td>
                                      <td>:</td>
                                      <td>{{ $book->amount }}</td>
                                  </tr>
                                  <tr class="align-text-top">
                                      <td>Deskripsi</td>
                                      <td>:</td>
                                      <td>{{ $book->description }}</td>
                                  </tr>

                              </table>

                            </div>

                          </div>
                        </div>









            @endsection
