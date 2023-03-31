<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @if (auth()->user()->role === 'admin')
            <li class="nav-item menu-open">
                <a class="nav-link" data-toggle="collapse" href="#datamaster" aria-expanded="false" aria-controls="datamaster">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Data Master</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="datamaster">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('pengaduan.index') }}">Pengaduan</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item menu-open">
                <a class="nav-link" data-toggle="collapse" href="#datatransaksi" aria-expanded="false" aria-controls="datatransaksi">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Data Transaksi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="datatransaksi">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('tanggapan.index') }}">Tanggapan</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item menu-open">
                <a class="nav-link" data-toggle="collapse" href="#data-user" aria-expanded="false"
                    aria-controls="data-user">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Data User</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id='data-user'>
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('petugas.index') }}">Petugas</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('masyarakat.index') }}">Masyarakat</a>
                        </li>
                    </ul>
                </div>
            </li>
        @else
            <li class="nav-item menu-open">
                <a class="nav-link" data-toggle="collapse" href="#data" aria-expanded="false" aria-controls="data">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Data Master</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="data">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('pengaduan.index') }}">Pengaduan</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item menu-open">
                <a class="nav-link" data-toggle="collapse" href="#datat" aria-expanded="false" aria-controls="datat">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Data Transaksi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="datat">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('tanggapan.index') }}">Tanggapan</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif

         <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="ti-home menu-icon"></i>
                <span class="menu-title">Home</span>
            </a>
        </li>

    </ul>
</nav>
