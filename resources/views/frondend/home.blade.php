@extends('frondend.partial.content')
@section('content')

<!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="assets1/img/library.jpg" alt="Image" height="700px">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7 text-start">
                                <p class="fs-4 text-white animated slideInRight">Selamat datang di
                                    <strong>SmackOne Library</strong>
                                </p>
                                <h1 class="display-1 text-white mb-4 animated slideInRight">Perpustakaan SMKN 1 Sebatik Barat</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>
</div>
<!-- Carousel End -->


{{-- <!-- Features Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 feature-row">
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature-item border h-100 p-5">
                    <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                        <img class="img-fluid" src="assets1/img/icon/icon-1.png" alt="Icon">
                    </div>
                    <h5 class="mb-3">Award Winning</h5>
                    <p class="mb-0">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="feature-item border h-100 p-5">
                    <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                        <img class="img-fluid" src="assets1/img/icon/icon-2.png" alt="Icon">
                    </div>
                    <h5 class="mb-3">Professional Staff</h5>
                    <p class="mb-0">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="feature-item border h-100 p-5">
                    <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                        <img class="img-fluid" src="assets1/img/icon/icon-3.png" alt="Icon">
                    </div>
                    <h5 class="mb-3">Fair Prices</h5>
                    <p class="mb-0">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="feature-item border h-100 p-5">
                    <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                        <img class="img-fluid" src="assets1/img/icon/icon-4.png" alt="Icon">
                    </div>
                    <h5 class="mb-3">24/7 Support</h5>
                    <p class="mb-0">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->




<!-- Video Modal Start -->
<div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-medium text-primary">Our Services</p>
            <h1 class="display-5 mb-5">Digital Marketing Services that We Offer</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item position-relative h-100">
                    <div class="service-text rounded p-5">
                        <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets1/img/icon/icon-5.png" alt="Icon">
                        </div>
                        <h5 class="mb-3">Digital Marketing</h4>
                            <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet</p>
                    </div>
                    <div class="service-btn rounded-0 rounded-bottom">
                        <a class="text-primary fw-medium" href="">Read More<i
                                class="bi bi-chevron-double-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item position-relative h-100">
                    <div class="service-text rounded p-5">
                        <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets1/img/icon/icon-6.png" alt="Icon">
                        </div>
                        <h5 class="mb-3">Internet Marketing</h4>
                            <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet</p>
                    </div>
                    <div class="service-btn rounded-0 rounded-bottom">
                        <a class="text-primary fw-medium" href="">Read More<i
                                class="bi bi-chevron-double-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item position-relative h-100">
                    <div class="service-text rounded p-5">
                        <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets1/img/icon/icon-7.png" alt="Icon">
                        </div>
                        <h5 class="mb-3">Content Marketing</h4>
                            <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet</p>
                    </div>
                    <div class="service-btn rounded-0 rounded-bottom">
                        <a class="text-primary fw-medium" href="">Read More<i
                                class="bi bi-chevron-double-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item position-relative h-100">
                    <div class="service-text rounded p-5">
                        <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets1/img/icon/icon-8.png" alt="Icon">
                        </div>
                        <h5 class="mb-3">Social Marketing</h4>
                            <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet</p>
                    </div>
                    <div class="service-btn rounded-0 rounded-bottom">
                        <a class="text-primary fw-medium" href="">Read More<i
                                class="bi bi-chevron-double-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item position-relative h-100">
                    <div class="service-text rounded p-5">
                        <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets1/img/icon/icon-9.png" alt="Icon">
                        </div>
                        <h5 class="mb-3">B2B Marketing</h4>
                            <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet</p>
                    </div>
                    <div class="service-btn rounded-0 rounded-bottom">
                        <a class="text-primary fw-medium" href="">Read More<i
                                class="bi bi-chevron-double-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item position-relative h-100">
                    <div class="service-text rounded p-5">
                        <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets1/img/icon/icon-10.png" alt="Icon">
                        </div>
                        <h5 class="mb-3">E-mail Marketing</h4>
                            <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet</p>
                    </div>
                    <div class="service-btn rounded-0 rounded-bottom">
                        <a class="text-primary fw-medium" href="">Read More<i
                                class="bi bi-chevron-double-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End --> --}}





@endsection
