<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../img/logo/husker.png" rel="icon">
    <title>{{ $title }}</title>
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../css/ruang-admin.min.css" rel="stylesheet">
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../../vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Touchspin -->
    <link href="../../vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet">
    <!-- Bootstrap DatePicker -->
    <link href="../../vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #2196F3;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon">
                    <img src="../../img/logo/husker.png">
                </div>
                <div class="sidebar-brand-text mx-3">{{ Auth::user()->name }} Page</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Content
            </div>
            {{-- penting can sama endcan biar cuman role tertentu yang bisa liat --}}
            @can('role', ['admin'])
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm"
                        aria-expanded="true" aria-controls="collapseForm">
                        <i class="fab fa-fw fa-wpforms"></i>
                        <span>Forms</span>
                    </a>
                    <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Forms</h6>
                            {{-- penting link href nya sesuai sama name yg di web.php --}}
                            <a class="collapse-item" href="{{ route('transaksi.store') }}">Transaksi</a>
                            <a class="collapse-item" href="{{ route('tinta.store') }}">Tinta</a>
                            <a class="collapse-item" href="{{ route('stok_kain.store') }}">Stok Kain</a>
                            <a class="collapse-item" href="{{ route('stok_kertas.store') }}">Stok Kertas</a>
                            <a class="collapse-item" href="{{ route('stok_tinta.store') }}">Stok Tinta</a>
                            {{-- <a class="collapse-item" href="../form/Roll">Roll</a>
            <a class="collapse-item" href="../form/Kain">Kain</a>
            <a class="collapse-item" href="../form/Produksi">Produksi</a>
            <a class="collapse-item" href="../form/Kertas">Kertas</a>
            <a class="collapse-item" href="../form/Berat">Berat</a>
            <a class="collapse-item" href="../form/Volume">Volume</a>
            <a class="collapse-item" href="../form/Warna">Warna</a> --}}
                        </div>
                    </div>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span>
                </a>
                <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tables</h6>
                        <a class="collapse-item" href="{{ route('table.show', ['link' => 'Transaksi']) }}">Transaksi</a>
                        <a class="collapse-item" href="{{ route('table.show', ['link' => 'Riwayat']) }}">Riwayat</a>
                        <a class="collapse-item" href="{{ route('table.show', ['link' => 'Stok_Kain']) }}">Stok Kain</a>
                        <a class="collapse-item" href="{{ route('table.show', ['link' => 'Roll']) }}">Roll</a>
                        <a class="collapse-item" href="{{ route('table.show', ['link' => 'Kain']) }}">Kain</a>
                        <a class="collapse-item" href="{{ route('table.show', ['link' => 'Produksi']) }}">Produksi</a>
                        <a class="collapse-item" href="{{ route('table.show', ['link' => 'Stok_Kertas']) }}">Stok Kertas</a>
                        <a class="collapse-item" href="{{ route('table.show', ['link' => 'Kertas']) }}">Kertas</a>
                        <a class="collapse-item" href="{{ route('table.show', ['link' => 'Berat']) }}">Berat</a>
                        <a class="collapse-item" href="{{ route('table.show', ['link' => 'Tinta']) }}">Tinta</a>
                        <a class="collapse-item" href="{{ route('table.show', ['link' => 'Volume']) }}">Volume</a>
                        <a class="collapse-item" href="{{ route('table.show', ['link' => 'Warna']) }}">Warna</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="dropdown-item">Logout</a>
                                <form action="{{ route('admin.logout') }}" id="logout-form" method="post">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->
                {{-- BATAS AWAL --}}
                @yield('content')
                {{-- BATAS AKHIR --}}
                <!-- Modal Logout -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to logout?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary"
                                    data-dismiss="modal">Cancel</button>
                                <a href="#" class="btn btn-primary">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!---Container Fluid-->
        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </span>
                </div>
            </div>
        </footer>
        <!-- Footer -->
    </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../js/ruang-admin.min.js"></script>
    <!-- Select2 -->
    <script src="../../vendor/select2/dist/js/select2.min.js"></script>
    <!-- Bootstrap Touchspin -->
    <script src="../../vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
    <!-- Bootstrap Datepicker -->
    <script src="../../vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    {{-- CODE JAVASCRIPT PER PAGE  --}}
    @yield('jsCode')
</body>

</html>
