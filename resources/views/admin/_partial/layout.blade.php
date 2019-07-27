<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Admin Page">
  <meta name="author" content="Felik">

  <title>Admin</title>

  <link href="{{asset('client/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Custom fonts for this template-->
  <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('admin/css/sb-admin.css')}}" rel="stylesheet">
  
  {{-- summernote editor css --}}
  <link href="{{asset('admin/editor/summernote.css')}}" rel="stylesheet">

  {{-- datepicker --}}
  {{-- <link href="{{asset('admin/datepicker/bootstrap-datetimepicker.min.css')}}" type="text/css" media="screen">   --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
</head>

<body id="page-top">
    @include('admin._partial.navbar')
    <div id="wrapper">
        @include('admin._partial.sidebar-duplicate')
        <div id="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <div>
                    @yield('breadcrumb')
                    @yield('content')
                </div>
            </div>

            <!-- Sticky Footer -->
            @include('admin._partial.footer')
        </div>
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('admin/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
  {{-- datepicker js --}}
  {{-- <script src="{{asset('admin/datepicker/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin/js/sb-admin.min.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
  {{-- <script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script> --}}

  <!-- include summernote js -->
  <script src="{{asset('admin/editor/summernote.min.js')}}"></script>

  

  @yield('script')
</body>

</html>
