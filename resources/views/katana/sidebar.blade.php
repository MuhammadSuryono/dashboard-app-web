<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none" style="background: #fff">
        <img src="https://i.ibb.co/0Z96F9g/Whats-App-Image-2020-11-03-at-09-41-24-removebg-preview.png"" class="c-sidebar-brand-full" width="180" height="46" alt="CoreUI Logo">
        <img src="https://i.ibb.co/0Z96F9g/Whats-App-Image-2020-11-03-at-09-41-24-removebg-preview.png"" class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
    </div>
    <ul class="c-sidebar-nav" style="background: #00557a">
        <li class="c-sidebar-nav-title">Beranda</li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('/') }}">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{ asset('coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-home') }}"></use>
            </svg> Beranda</a>
        </li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('transaction') }}">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{ asset('coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-history') }}"></use>
            </svg> Histori Transaksi</a>
        </li>
        <li class="c-sidebar-nav-title">Administrasi  </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <i class="fas fa-shopping-cart text-white c-sidebar-nav-icon"></i> Kelola Toko</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('toko/outlet') }}">Outlet</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('#n') }}">Pembayaran</a></li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{ asset('coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-burger') }}"></use>
            </svg> Kelola Produk</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('item') }}">Daftar Produk</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('category') }}">Ketegori</a></li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-burger') }}"></use>
                </svg> PPOB</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('category') }}">Group Price</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('ppob/product') }}">Daftar Produk</a></li>
            </ul>
        </li>
        @desktop
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{ asset('coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-wallet') }}"></use>
            </svg> Kelola Laporan</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('report/ringkasan') }}">Ringkasan</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('report/penjualan') }}">Penjualan Produk</a></li>
            </ul>
        </li>
        @enddesktop
        @mobile
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('/') }}">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{ asset('coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-wallet') }}"></use>
            </svg> Kelola Laporan</a>
        </li>
        @endmobile
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('setting/account') }}">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{ asset('coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-settings') }}"></use>
            </svg> Kelola Akun</a>
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" style="background: #00557a" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>