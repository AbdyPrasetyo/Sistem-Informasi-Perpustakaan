<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">



    <div class="app-brand demo">
        <a href="#  " class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="img/1.png" alt="" width="24px">
            </span>

            <span class="app-brand-text demo menu-text fw-bolder ms-2"><span class="text-uppercase">S</span>mack<span
                    class="text-uppercase">O</span>ne </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <ul class="menu-inner py-1">
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Halaman Utama</span></li>
        <!-- Dashboard -->
        <li class="menu-item {{ ($title === "Beranda") ?  'active' : '' }}">
            <a href="{{ url('beranda') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Beranda</div>
            </a>
        </li>
    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1">
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Daftar Buku</span></li>
        <!-- Dashboard -->

        <!-- Forms -->

                <li class="menu-item {{ ($title === "Data Buku") ?  'active' : '' }}">
                    <a href="{{ url('userbook') }}" class="menu-link">
                        <i class='menu-icon bx bx-book-bookmark'></i>
                        <div data-i18n="Input groups">Data Buku</div>
                    </a>
                </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Sirkulasi</span></li>
        <li class="menu-item {{ ($title === "Daftar Peminjaman") ?  'active' : '' }}">
            <a href="{{ url('riwayatuser') }}" class="menu-link">
                <i class='menu-icon bx bx-book-open'></i>
                <div data-i18n="Analytics">Daftar Peminjaman</div>
            </a>
        </li>

        <li class="menu-item {{ ($title === "Riwayat Peminjaman") ?  'active' : '' }}">
            <a href="{{ url('riwayatuser/show') }}" class="menu-link">
                <i class='menu-icon bx bx-bookmark-alt'></i>
                <div data-i18n="Analytics">Riwayat Peminjaman</div>
            </a>
        </li>
        <li class="menu-item {{ ($title === "Data Buku Hilang") ?  'active' : '' }}">
            <a href="{{ url('userhilang') }}" class="menu-link">
                <i class='menu-icon bx bxs-error'></i>
                <div data-i18n="Analytics">Buku Belum diganti</div>
            </a>
        </li>
        <li class="menu-item {{ ($title === "Riwayat Pelunasan") ?  'active' : '' }}">
            <a href="{{ url('userhilang/show') }}" class="menu-link">
                <i class='menu-icon bx bxs-book-bookmark'></i>
                <div data-i18n="Analytics">Riwayat Buku Hilang</div>
            </a>
        </li>





</aside>
<!-- / Menu -->
<div class="layout-page">
