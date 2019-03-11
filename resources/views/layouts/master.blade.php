
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>LaraVue</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/css/app.css">

    <link rel="stylesheet" href="/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/font-awesome/font-awesome.css">




</head>
<body class="hold-transition  sidebar-mini " >
<div class="wrapper"  id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark bg-success border-bottom">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i> </a>
            </li>

        </ul>


        <ul class="navbar-nav">

        </ul>



    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-info elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link bg-success">
            <img src="./img/logo2.png"  alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">السَّلاَمُ عَلَيْكُمْ</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="./img/profile/{{Auth::user()->photo}}"  class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <router-link to="*" class="d-block">{{Auth::user()->name}} <br>
                        <p>{{Auth::user()->type}}</p></router-link>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->


                    @can('isAdmin')
                        <li class="nav-item">
                            <router-link to="/dashboard" class="nav-link">
                                <i class="nav-icon fa fa-home blue"></i>
                                <p>
                                    Dashboard

                                </p>
                            </router-link>
                        </li>

                        <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-cog red"></i>
                            <p>
                                Management
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/users" class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>Pengguna</p>
                                </router-link>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/pegawai" class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>Pegawai Sistem </p>
                                </router-link>
                            </li>
                        </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/all" class="nav-link">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>Data Pegawai Kemenag</p>
                                    </router-link>
                                </li>
                            </ul>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-tasks green"></i>
                                <p>
                                    Management Cuti
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/pengajuancuti" class="nav-link">
                                        <i class="fa fa-envelope nav-icon"></i>
                                        <p>Ajukan cuti</p>
                                    </router-link>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/permohonancuti" class="nav-link">
                                        <i class="fa fa-database nav-icon"></i>
                                        <p>Seluruh Data cuti</p>
                                    </router-link>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/resetcuti" class="nav-link">
                                        <i class="fa fa-expand nav-icon"></i>
                                        <p>Reset Cuti</p>
                                    </router-link>
                                </li>
                            </ul>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-newspaper "></i>
                                <p>
                                    Management Dinas
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/dinas" class="nav-link">
                                        <i class="fa fa-male"></i>
                                        <p>Pengajuan Saya</p>
                                    </router-link>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/datadinas" class="nav-link">
                                        <i class="fa fa-address-book"></i>
                                        <p>Data surat DInas</p>
                                    </router-link>
                                </li>
                            </ul>
                        <li class="nav-item">
                            <router-link to="/profile" class="nav-link">
                                <i class="nav-icon fa fa-user orange"></i>
                                <p>
                                    profile
                                </p>
                            </router-link>
                        </li>


                    @endcan



                    @can('isPegawai')
                        <li class="nav-item">
                            <router-link to="/dasboard2" class="nav-link">
                                <i class="nav-icon fa fa-home blue"></i>
                                <p>
                                    Dashboard
                                </p>
                            </router-link>
                        </li>

                    <li class="nav-item">
                        <router-link to="/pengajuancuti" class="nav-link">
                            <i class="nav-icon fa fa-window-restore yellow"></i>
                            <p>
                                Pengajuan Cuti
                            </p>
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link to="/dinas" class="nav-link">
                            <i class="nav-icon fa fa-address-card red"></i>
                            <p>
                                Pengajuan Surat Dinas
                            </p>
                        </router-link>
                    </li>
                        <li class="nav-item">
                            <router-link to="/profile" class="nav-link">
                                <i class="nav-icon fa fa-user orange"></i>
                                <p>
                                    profile
                                </p>
                            </router-link>
                        </li>
                    @endcan

                    @can('isPimpinan')
                        <li class="nav-item">
                            <router-link to="/dasboard2" class="nav-link">
                                <i class="nav-icon fa fa-tachometer-alt blue"></i>
                                <p>
                                    Dashboard
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-cog red"></i>
                                <p>
                                    Data Pegawai
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/pegawai" class="nav-link">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>Pegawai Pengguna Sistem</p>
                                    </router-link>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/all" class="nav-link">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>Seluruh Pegawai</p>
                                    </router-link>
                                </li>
                            </ul>



                        <li class="nav-item">
                            <router-link to="/permohonancuti" class="nav-link">
                                <i class="nav-icon fa fa-address-card green"></i>
                                <p>
                                    Permohonan Cuti
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/datadinas" class="nav-link">
                                <i class="nav-icon fa fa-address-card red"></i>
                                <p>
                                    data Dinas
                                </p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/profile" class="nav-link">
                                <i class="nav-icon fa fa-user orange"></i>
                                <p>
                                    profile
                                </p>
                            </router-link>
                        </li>


                        @endcan



                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            <i class="nav-icon fa fa-power-off pink"></i>
                            <p>
                            {{ __('Logout') }}
                            </p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>


            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <transition name="fade"
                            mode="out-in">
                    <router-view></router-view>
                </transition>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2018-2019 <a href="https://github.com/andiahmads">AndiahmadS</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script>
@auth
    window.user = @json(auth()->user())
@endauth
</script>

<script src="/js/app.js"></script>

</body>

<style>
    .fade-enter-active,
    .fade-leave-active {
        transition-duration: 0.3s;
        transition-property: opacity;
        transition-timing-function: ease;
    }

    .fade-enter,
    .fade-leave-active {
        opacity: 0
    }
</style>

</html>

