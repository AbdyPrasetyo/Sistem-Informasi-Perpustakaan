<!-- Navbar Start -->
<div class="container-fluid bg-white sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
            <a href="/" class="navbar-brand d-lg-none">
                <h1 class="fw-bold m-0">SmackOne</h1>
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="/" class="nav-item nav-link {{ ($title === "Beranda") ?  'active' : '' }}">Beranda</a>
                    <div class="nav-item dropdown">

                        <a href="#" class="nav-link dropdown-toggle {{ ($title === "Struktur Organisasi") ?  'active' : '' }} {{ ($title === "Visi & Misi") ?  'active' : '' }}" data-bs-toggle="dropdown">Profile</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                            <a href="/visi" class="dropdown-item">Visi & Misi</a>
                            <a href="/struktur" class="dropdown-item">Struktur Organisasi</a>
                        </div>

                    </div>
                    <a href="{{ route('koleksi.index') }}" class="nav-item nav-link {{ ($title === "Koleksi") ?  'active' : '' }} {{ ($title === "Detail Buku") ?  'active' : '' }}">Koleksi Buku</a>
                    <a href="/tentang" class="nav-item nav-link {{ ($title === "Tentang") ?  'active' : '' }}">Tentang</a>
                    <a href="{{ url('kontak') }}" class="nav-item nav-link {{ ($title === "Kontak") ?  'active' : '' }}">Kontak</a>

                </div>
                <div class="ms-auto d-none d-lg-block">
                    <a href="{{ url('/login') }}" class="btn btn-primary rounded-pill py-2 px-3">Login</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
