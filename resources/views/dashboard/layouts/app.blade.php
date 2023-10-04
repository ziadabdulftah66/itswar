<!DOCTYPE html>
<html lang="en" dir="rtl">
<!-- BEGIN: Head-->

<head>

    <meta charset="utf-8">
    <?php //$setting=\App\Models\General_setting::find(1); ?><!-- --><?php //echo $setting->site_name ?><!---->
    <title>  <?php $site_name=\App\Models\General_setting::select('site_name')->first() ?> {{ $site_name->site_name}} </title>
    <!-- Bootstrap font-aweasome css -->
    <link rel="icon" <?php  $site_name=\App\Models\General_setting::select('site_logo_icon','opening_words','Tags')->first() ?> href="{{$site_name->site_logo_icon}}"  type="image/png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->

    <link href="{{asset('public/dashboard/font-awesome/css/all.css')}}" rel="stylesheet">
    <link href="{{asset('public/dashboard/libs/chartist/chartist.min.css')}}" rel="stylesheet">

    <!-- Bootstrap Css -->

    <link href="{{asset('public/dashboard/css/bootstrap-rtl.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('public/dashboard/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('public/dashboard/css/app-rtl.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
    <link href="{{asset('public/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/dashboard/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/dashboard/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/dashboard/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/dashboard/css/plugins/file-uploaders/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/dashboard/vendors/css/extensions/datedropper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/dashboard/vendors/css/extensions/timedropper.min.css')}}">


    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.css"
          integrity="sha512-UoT/Ca6+2kRekuB1IDZgwtDt0ZUfsweWmyNhMqhG4hpnf7sFnhrLrO0zHJr2vFp7eZEvJ3FN58dhVx+YMJMt2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>


    <!-- BEGIN: Custom CSS-->

@yield('style')
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body data-sidebar="dark" data-bs-theme="light" data-topbar="light">
    <!-- BEGIN: Header-->

    @include('dashboard.layouts.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('dashboard.layouts.menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content -->


                <!-- Dashboard Analytics Start -->
                @yield('content')
                <!-- Dashboard Analytics end -->


    <!-- END: Content-->


    <!-- BEGIN: Footer-->
    @include('dashboard.layouts.footer')
    <!-- END: Footer-->

    <div class="rightbar-overlay"></div>
    <!-- BEGIN: Vendor JS-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>


    <script src="{{asset('public/dashboard/vendors/js/vendors.min.js')}}"></script>

    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('public/dashboard/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/js/extensions/tether.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/js/extensions/shepherd.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <!-- JAVASCRIPT -->
    <script src="{{asset('public/dashboard/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/node-waves/waves.min.js')}}"></script>


    <!-- Peity chart-->
    <script src="{{asset('public/dashboard/libs/peity/jquery.peity.min.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('public/dashboard/libs/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js')}}"></script>


    <script src="{{asset('public/dashboard/js/scripts.js')}}"></script>
    <script src="{{asset('public/dashboard/js/scripts/pages/dashboard-analytics.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/js/extensions/dropzone.min.js')}}" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.js"
            integrity="sha512-EmZuy6vd0ns9wP+3l1hETKq/vNGELFRuLfazPnKKBbDpgZL0sZ7qyao5KgVbGJKOWlAFPNn6G9naB/8WnKN43Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Required datatable js -->
    <script src="{{asset('public/dashboard/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('public/dashboard/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('public/dashboard/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/dashboard/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{asset('public/dashboard/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{asset('public/dashboard/js/pages/datatables.init.js')}}"></script>
    <script src="{{asset('public/dashboard/js/pages/dashboard.init.js')}}"></script>

    <script src="{{asset('public/dashboard/js/app.js')}}"></script>










    @yield('scripts')

    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
