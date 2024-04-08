<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo">
        <a href="{{ url('home') }}" class="app-brand-link">
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

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Main Menu</span></li>
        <!-- Dashboard -->
        <li class="menu-item {{ ($title === "Dashboard") ?  'active' : '' }}">
            <a href="{{ url('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Master Data</span></li>
        <!-- Layouts -->
        <li class="menu-item menu-item-submenu {{ ($title === "Data Anggota") ?  'open' : '' }} {{ ($title === "Data Anggota") ?  'active' : '' }} {{ ($title === "Data Pengguna") ?  'active' : '' }}  {{ ($title === "Data Pengguna") ?  'open' : '' }} {{ ($title === "Penyumbang Buku") ?  'active' : '' }} {{ ($title === "Penyumbang Buku") ?  'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Pengolahan Data</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ ($title === "Data Anggota") ?  'active' : '' }}">
                    <a href="{{ url('anggota') }}" class="menu-link">
                        <div data-i18n="Without menu">Data Anggota</div>
                    </a>
                </li>
                <li class="menu-item {{ ($title === "Data Pengguna") ?  'active' : '' }}">
                    <a href="{{ url('pengguna') }}" class="menu-link">
                        <div data-i18n="Without menu">Data Administrator</div>
                    </a>
                </li>
                <li class="menu-item {{ ($title === "Penyumbang Buku") ?  'active' : '' }}">
                    <a href="/donatur" class="menu-link">
                        <div data-i18n="Without menu">Data Penyumbang Buku</div>
                    </a>
                </li>


            </ul>
        </li>




        <!-- Forms -->
        <li class="menu-item menu-item-submenu {{ ($title === "Penerbit") ?  'active' : '' }} {{ ($title === "Penerbit") ?  'open' : '' }} {{ ($title === "Data Kategori") ?  'active' : '' }} {{ ($title === "Data Kategori") ?  'open' : '' }}  {{ ($title === "Data Rak") ?  'active' : '' }}  {{ ($title === "Data Rak") ?  'open' : '' }} {{ ($title === "Data Denda") ?  'active' : '' }} {{ ($title === "Data Denda") ?  'open' : '' }} {{ ($title === "Data Buku") ?  'active' : '' }} {{ ($title === "Data Buku") ?  'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle ">
                <i class='menu-icon tf-icons bx bx-book-bookmark'></i>
                <div data-i18n="Form Elements">Katalog Buku</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ ($title === "Penerbit") ?  'active' : '' }}">
                    <a href="{{ url('penerbit') }}" class="menu-link">
                        <div data-i18n="Basic Inputs">Data Penerbit</div>
                    </a>
                </li>
                <li class="menu-item  {{ ($title === "Data Kategori") ?  'active' : '' }}">
                    <a href="{{ url('kategori') }}" class="menu-link">
                        <div data-i18n="Input groups">Data Kategori Buku</div>
                    </a>
                </li>
                <li class="menu-item {{ ($title === "Data Rak") ?  'active' : '' }}">
                    <a href="{{ url('rak') }}" class="menu-link">
                        <div data-i18n="Input groups">Data Rak</div>
                    </a>
                </li>
                <li class="menu-item {{ ($title === "Data Denda") ?  'active' : '' }}">
                    <a href="{{ url('denda') }}" class="menu-link">
                        <div data-i18n="Input groups">Update Denda</div>
                    </a>
                </li>
                <li class="menu-item {{ ($title === "Data Buku") ?  'active' : '' }}">
                    <a href="{{ url('buku') }}" class="menu-link">
                        <div data-i18n="Input groups">Data Buku</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Transaksi</span></li>
        <li class="menu-item menu-item-submenu {{ ($title === "Transaksi Pinjam") ?  'active' : '' }} {{ ($title === "Transaksi Pinjam") ?  'open' : '' }} {{ ($title === "Data Pengembalian") ?  'active' : '' }} {{ ($title === "Data Pengembalian") ?  'open' : '' }} {{ ($title === "Data Buku Hilang") ?  'active' : '' }} {{ ($title === "Data Buku Hilang") ?  'open' : '' }} {{ ($title === "Riwayat Buku Hilang") ?  'active' : '' }} {{ ($title === "Riwayat Buku Hilang") ?  'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-book-bookmark'></i>
                <div data-i18n="Form Elements">Menu Sirkulasi</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ ($title === "Transaksi Pinjam") ?  'active' : '' }}">
                    <a href="{{ url('peminjaman') }}" class="menu-link">
                        <div data-i18n="Basic Inputs">Data Peminjaman</div>
                    </a>
                </li>
                <li class="menu-item  {{ ($title === "Data Pengembalian") ?  'active' : '' }}">
                    <a href="{{ url('pengembalian') }}" class="menu-link">
                        <div data-i18n="Input groups">Data Pengembalian</div>
                    </a>
                </li>
                <li class="menu-item {{ ($title === "Data Buku Hilang") ?  'active' : '' }}">
                    <a href="{{ url('hilang') }}" class="menu-link">
                        <div data-i18n="Input groups">Data Buku Hilang</div>
                    </a>
                </li>
                <li class="menu-item {{ ($title === "Riwayat Buku Hilang") ?  'active' : '' }}">
                    <a href="{{ url('riwayat') }}" class="menu-link">
                        <div data-i18n="Input groups">Data Riwayat Buku Hilang </div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Information</span></li>
        <!-- Tables -->
        <li class="menu-item {{ ($title === "Kotak Saran") ?  'active' : '' }}">
            <a href="kotaksaran" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-message"></i>
                <div data-i18n="Tables">Kotak Saran</div>
            </a>
        </li>



    </ul>
</aside>
<!-- / Menu -->
<div class="layout-page">
