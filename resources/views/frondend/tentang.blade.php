@extends('frondend.partial.content')
@section('content')

 <!-- Page Header Start -->
 <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background-image: url(' assets1/img/12.jpg'); ">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Tentang</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">Tentang</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->



<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container ">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-5">Team Perpustakaan</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item rounded overflow-hidden pb-4">
                    <img class="img-fluid mb-4" src="assets1/img/1.jpg" alt="">
                    <h5>Sujud, S.Pd</h5>
                    <span class="text-primary">Kepala Sekolah</span>
                    <ul class="team-social">
                        <li><a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a class="btn btn-square" href=""><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden pb-4">
                    <img class="img-fluid mb-4" src="assets1/img/2.jpg" alt="">
                    <h5>Isma Mariani, S.Pd</h5>
                    <span class="text-primary">Kepala Perpustakaan</span>
                    <ul class="team-social">
                        <li><a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a class="btn btn-square" href=""><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item rounded overflow-hidden pb-4">
                    <img class="img-fluid mb-4" src="assets1/img/4.jpg" alt="">
                    <h5>Sahriani, S.Pd</h5>
                    <span class="text-primary">Teknisi Perpustakaan</span>
                    <ul class="team-social">
                        <li><a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a class="btn btn-square" href=""><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item rounded overflow-hidden pb-4">
                    <img class="img-fluid mb-4" src="assets1/img/3.jpg" alt="">
                    <h5> Sitti Rahmawati, S.Pd</h5>
                    <span class="text-primary">Administrasi Perpustakaan</span>
                    <ul class="team-social">
                        <li><a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a class="btn btn-square" href=""><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Team End -->



@endsection
