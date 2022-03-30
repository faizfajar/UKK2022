<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"/>
        <title>Peduli Diri</title>

        <!-- ========== All CSS files linkup ========= -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/lineicons.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/materialdesignicons.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/fullcalendar.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"/>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    </head>
    <body>
        <!-- ======== sidebar-nav start =========== -->
        @include('layouts.sidebar')
        <!-- ======== sidebar-nav end =========== -->

        <!-- ======== main-wrapper start =========== -->
        <main class="main-wrapper">
            <!-- ========== header start ========== -->
        @include('layouts.sidebar')
            <!-- ========== header end ========== -->

            <!-- ========== table components start ========== -->
            <section class="table-components">
                <div class="container-fluid">
                    <!-- ========== title-wrapper start ========== -->
                    <div class="title-wrapper pt-30">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="title mb-30">
                                    <h2>Isi Catatan Perjalanan</h2>
                                </div>

                            </div>
                            <!-- end col -->
                            <div class="col-md-6">
                                <div class="breadcrumb-wrapper mb-30">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" style="margin:-2%; padding:2% " >
                                    Peduli Diri
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    </form>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                Catatan Perjalanan
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- ========== title-wrapper end ========== -->

                    <!-- ========== tables-wrapper start ========== -->
                <div class="tables-wrapper">
                    @yield('content')
                    <!-- ========== tables-wrapper end ========== -->
                </div>
                <!-- end container -->
            </section>
            <!-- ========== table components end ========== -->

            <!-- ========== footer end =========== -->
        </main>
        {{-- <script type="text/javascript">
            $(document).ready(function(){
                $('#tableshow').DataTables();
            });
        </script> --}}

        <!-- ======== main-wrapper end =========== -->
        <!-- ========= All Javascript files linkup ======== -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/Chart.min.js')}}"></script>
        <script src="{{asset('assets/js/dynamic-pie-chart.js')}}"></script>
        <script src="{{asset('assets/js/moment.min.js')}}"></script>
        <script src="{{asset('assets/js/fullcalendar.js')}}"></script>
        <script src="{{asset('assets/js/jvectormap.min.js')}}"></script>
        <script src="{{asset('assets/js/world-merc.js')}}"></script>
        <script src="{{asset('assets/js/polyfill.js')}}"></script>
        {{-- <script src="{{asset('assets/js/main.js')}}"></script> --}}


        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        @yield('script')
    </body>
</html>
