<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medex - @yield("title")</title>
    <link rel="stylesheet" href="{{asset('front/assetku/fontawesome-free/css/all.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/css/sb-admin-2.min.css')}}">
    <link href="{{asset('front/assetku/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>
<body id="page-top">

<div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="sidebarKu">

        <!-- Sidebar - Brand -->
        <div style="background-color: #ffffff; margin-bottom:10px">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('produk')}}">
                <div class="sidebar-brand-text mx-3" style="color: #1c038a; font-size: 105%">TOKO TANI ADMIN</div>
            </a>
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider" style="margin-bottom: 5px">

        <li class="nav-item" id="bukti">
            <a class="nav-link" href="">
                <table>
                    <tr>
                        <th><i class="fas fa-fw fa-edit"></i></th>
                        <th style="font-weight: normal; padding-left: 5px">
                            <span>Produk di Tawarkan</span></th>
                    </tr>
                </table>
            </a>
        </li>

        {{--Divider--}}
        <hr class="sidebar-divider">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>


    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <li class="nav-item dropdown no-arrow">
                        @if(Auth::user())
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <i class="fas fa-user-edit"></i>
                            </a>
                    @endif
                    <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">

                            <form action="{{route("logout")}}" method="POST">
                                @csrf
                                <button class="dropdown-item">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sign Out
                                </button>
                            </form>

                        </div>
                    </li>
                </ul>
            </nav>

            {{--Page Content--}}

            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">@yield("judulHalaman")</h1>
                </div>
                @yield("isiHalaman")
            </div>

        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="{{asset('front/assetku/jquery/jquery.min.js')}}"></script>
<script src="{{asset('front/assetku/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('front/assetku/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('front/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('front/assetku/chart.js/Chart.min.js')}}"></script>

<script src="{{asset('front/assetku/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('front/assetku/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('front/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('front/js/demo/chart-pie-demo.js')}}"></script>
@yield("script_tabel")
</body>
</html>
