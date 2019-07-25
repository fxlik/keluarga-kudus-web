<!DOCTYPE html>
@inject('tampilan','App\Http\Controllers\ClientBerandaController')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Felik">
    <meta name="description" content="{{$tampilan->tampilan()->site_desc}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title -->
    <title>{{$tampilan->tampilan()->site_title}}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('client/img/core-img')}}/{{$tampilan->tampilan()->favicon}}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('client/style.css')}}">

    <!-- Page level plugin CSS-->
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
</head>
<body>
    <!-- ##### Preloader ##### -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <!-- Line -->
        <div class="line-preloader"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex flex-wrap align-items-center justify-content-between">
                            <!-- Top Header Meta -->
                            <div class="top-header-meta d-flex flex-wrap">
                                <!-- <a href="#" class="open" data-toggle="tooltip" data-placement="bottom" title="10 Am to 6 PM"><i class="fa fa-clock-o" aria-hidden="true"></i> <span>Opening Hours - 10 Am to 6 PM</span></a> -->
                                <!-- Social Info -->
                                <div class="top-social-info">
                                    <a target="_blank" href="{{$tampilan->tampilan()->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a target="_blank" href="{{$tampilan->tampilan()->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a target="_blank" href="{{$tampilan->tampilan()->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Top Header Meta -->
                            <div class="top-header-meta">
                                <a href="mailto:felik@untan.ac.id" class="email-address"><i class="fa fa-envelope" aria-hidden="true"></i> <span>{{$tampilan->tampilan()->email}}</span></a>
                                <a href="#" class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <span>{{$tampilan->tampilan()->no_hp}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Top Header Area ***** -->

        <!-- ***** Navbar Area ***** -->
        <div class="crose-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    @include('client._partial.navbar')
                </div>
            </div>

            <!-- ***** Search Form Area ***** -->
            <div class="search-form-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="searchForm">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Enter keywords &amp; hit enter...">
                                    <button type="submit" class="d-none"></button>
                                </form>
                                <div class="close-icon" id="searchCloseIcon"><i class="fa fa-close" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Navbar Area ***** -->
    </header>
    <!-- ##### Header Area End ##### -->
    @yield('breadcrump')

    <div>
        @yield('content')
    </div>
    @include('client._partial.footer')

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('client/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('client/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('client/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('client/js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('client/js/active.js')}}"></script>
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
    @yield('script')
</body>
</html>