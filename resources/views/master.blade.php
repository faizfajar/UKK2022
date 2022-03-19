<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
                                                <a href="#0">Peduli Diri</a>
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

            <!-- ========== footer start =========== -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 order-last order-md-first">
                            <div class="copyright text-center text-md-start">
                                <p class="text-sm">
                                    Designed and Developed by
                                    <a href="https://plainadmin.com" rel="nofollow" target="_blank">
                                        PlainAdmin
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- end col-->
                        <div class="col-md-6">
                            <div
                                class="
                  terms
                  d-flex
                  justify-content-center justify-content-md-end
                ">
                                <a href="#0" class="text-sm">Term & Conditions</a>
                                <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </footer>
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
