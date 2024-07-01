<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
        <div class="sidebar-brand">
            <a href="index.html">
                <img src="{{ asset('assets/logo.png') }}" height="24" class="logo-light-mode" alt="">
                <img src="{{ asset('assets/logo.png') }}" height="24" class="logo-dark-mode" alt="">
                <span class="sidebar-colored d-flex gap-3">
                    <img src="{{ asset('assets/logo.png') }}" height="50" alt="">
                    <p style="margin-top: 15px">Dashboard</p>
                </span>
            </a>
        </div>

        <ul class="sidebar-menu">
            {{-- Admin Menu --}}
            @if (Auth::user()->role == 'admin')
                <li class="sidebar">
                    <a href="javascript:void(0)" style="cursor: default">Menu Utama</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('admin.dashboard') }}"><i class="ti ti-apps me-2"></i>Dashboard</a>
                </li>
                {{-- Sub Menu --}}
                <li class="sidebar">
                    <a href="javascript:void(0)" style="cursor: default">Daftar Data</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('suratMasuk.index') }}"><i class="ti ti-mail me-2"></i>Surat Masuk</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('suratKeluar.index') }}"><i class="ti ti-mail-opened me-2"></i>Surat Keluar</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('disposisi.index') }}"><i class="ti ti-brand-gravatar me-2"></i>Disposisi Surat
                        Masuk</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('jenisSurat.index') }}"><i class="ti ti-file-info me-2"></i>Jenis Surat</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('petugasUser.index') }}"><i class="ti ti-users me-2"></i>Petugas</a>
                </li>
                {{-- Sub Menu --}}
                <li class="sidebar">
                    <a href="javascript:void(0)" style="cursor: default">Laporan Data</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('laporanSuratMasuk.index') }}"><i class="ti ti-file-invoice me-2"></i>Surat
                        Masuk</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('laporanSuratKeluar.index') }}"><i class="ti ti-license me-2"></i>Surat
                        Keluar</a>
                </li>
            @endif

            {{-- Petugas Menu --}}
            @if (Auth::user()->role == 'petugas')
                <li class="sidebar">
                    <a href="javascript:void(0)" style="cursor: default">Menu Utama</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('petugas.dashboard') }}"><i class="ti ti-apps me-2"></i>Dashboard</a>
                </li>
                {{-- Sub Menu --}}
                <li class="sidebar">
                    <a href="javascript:void(0)" style="cursor: default">Daftar Data</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('petugas.suratMasuk.index') }}"><i class="ti ti-mail me-2"></i>Surat Masuk</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('petugas.suratKeluar.index') }}"><i class="ti ti-mail-opened me-2"></i>Surat
                        Keluar</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('petugas.disposisi.index') }}"><i class="ti ti-brand-gravatar me-2"></i>Disposisi
                        Surat
                        Masuk</a>
                </li>
                {{-- Sub Menu --}}
                <li class="sidebar">
                    <a href="javascript:void(0)" style="cursor: default">Laporan Data</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('petugas.laporanSuratMasuk.index') }}"><i
                            class="ti ti-file-invoice me-2"></i>Surat
                        Masuk</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('petugas.laporanSuratKeluar.index') }}"><i class="ti ti-license me-2"></i>Surat
                        Keluar</a>
                </li>
            @endif

            @if (Auth::user()->role == 'user')
                <li class="sidebar">
                    <a href="javascript:void(0)" style="cursor: default">Menu Utama</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('user.dashboard') }}"><i class="ti ti-apps me-2"></i>Dashboard</a>
                </li>
                {{-- Sub Menu --}}
                <li class="sidebar">
                    <a href="javascript:void(0)" style="cursor: default">Daftar Data</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('user.suratMasuk.index') }}"><i class="ti ti-mail me-2"></i>Surat Masuk</a>
                </li>
                <li class="sidebar">
                    <a href="{{ route('user.suratKeluar.index') }}"><i class="ti ti-mail-opened me-2"></i>Surat
                        Keluar</a>
                </li>
            @endif

        </ul>
        <!-- sidebar-menu  -->
    </div>
</nav>
