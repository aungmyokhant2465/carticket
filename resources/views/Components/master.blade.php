<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Ionicons -->
    <link rel="stylesh
Packagingeet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{URL::to('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
{{--    <link rel="stylesheet" href="{{URL::to('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">--}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::to('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{URL::to('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('fa/css/all.css')}}">
    <link rel="stylesheet" href="{{URL::to('DataTables/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('timepicker.css')}}" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('styleSheet')
</head>
<body class="hold-transition sidebar-mini layout-fixed mt-0 mb-4">
<div class="wrapper">
<!-- Navbar -->
    @include('Components.navbar')
<!-- /.navbar -->
<!-- Main Sidebar Container -->
    @include('Components.sidebar')
<!-- /.main Sidebar Container -->
<!-- Content Wrapper. Contains page content -->
    <div id="app" class="mb-5">
        @yield('content')
    </div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
<!-- /.control-sidebar -->
    @include('Components.footer')
</div>
<!-- ./wrapper -->
<script src="{{URL::to('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{URL::to('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="{{URL::to('plugins/moment/moment.min.js')}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{URL::to('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
{{--<script src="{{URL::to('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>--}}
<!-- overlayScrollbars -->
<script src="{{URL::to('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::to('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{URL::to('dist/js/pages/dashboard.js')}}"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{URL::to('dist/js/demo.js')}}"></script>
<script src="{{URL::to('DataTables/datatables.js')}}"></script>
<script type="text/javascript" src="{{URL::to('timepicker.js')}}"></script>
<script>
    $(function () {
        $(".alert").fadeOut(3000,function () {
            {{Session::forget("info")}}
        });
        $("#userTable").dataTable({
            paging: false,
            "bInfo" : false
        });
        $("#cityTable").dataTable();
        $("#storeTable").dataTable({
            paging: false,
            "bInfo" : false
        });
        $("#drivers").dataTable();
        $("#car_select_table").dataTable();
        $("#travels").dataTable();
        $("#travels_without_time").dataTable();
        $("#carSeat").dataTable();
        $("#all_percales").dataTable();
        $(function() {
            $('.duration').timepicker({
                'minTime': '1:00am',
                'maxTime': '24:00pm',
                'showDuration': true
            });
        });
    })
</script>
@stack('script')
</body>
</html>
