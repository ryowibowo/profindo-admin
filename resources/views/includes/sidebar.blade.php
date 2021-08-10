 <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/dashboard"><i class
                            ="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                     <li class="menu-title">Obat</li>
                    <li class="">
                        <a href="{{ route('obat') }}"> <i class="menu-icon fa fa-list"></i>Lihat Obat</a>
                    </li>
                    <li class="">
                        <a href="{{ route('obat/create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Obat</a>
                    </li>

                    <li class="menu-title">Apoteker</li>
                    <li class="">
                        <a href="{{ route('apoteker') }}"> <i class="menu-icon fa fa-list"></i>Lihat Apoteker</a>
                    </li>
                    <li class="">
                        <a href="{{ route('apoteker/create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Apoteker</a>
                    </li>

                    <li class="menu-title">Transaksi</li>
                    <li class="">
                        <a href="{{ route('transaksi') }}"> <i class="menu-icon fa fa-list"></i>Lihat Transaksi</a>

                        <a href="{{ route('transaksi/create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Transaksi</a>
                    </li>

                    {{-- <li class="menu-title">Laporan</li>
                    <li class="">
                        <a href=""> <i class="menu-icon fa fa-list"></i>Lihat Transaksi</a>

                    </li> --}}

                    <li class="">
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->