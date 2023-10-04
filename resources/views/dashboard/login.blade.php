<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->

    <link rel="shortcut icon" href="{{asset('public/dashboard/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('public/dashboard/css/bootstrap-rtl.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('public/dashboard/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('public/dashboard/css/app-rtl.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
    <title>  لوحة التحكم ||  {{$setting->site_name}} </title>


    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body>
    <!-- BEGIN: Content-->

    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">مرحبا بك !</h5>
                                <p class="text-white-50">سجل دخول في مسار التميز.</p>
                                <a href="#" class="logo logo-admin">
                                    <img src="{{asset(header_logo())}}" height="24" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form action="{{ route('admin.login') }}" method="POST">
@csrf

                                    <div class="mb-3" style="text-align: right">
                                        <label class="form-label" for="username">اسم المستخدم</label>
                                        <input name="username" type="text" class="form-control" id="username"  required>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3" style="text-align: right">
                                        <label class="form-label" for="userpassword">كلمة المرور</label>
                                        <input type="password" name="password" class="form-control" id="userpassword"  required>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                             </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3" style="text-align: center">
                                    <button type="submit" class="btn btn-primary  btn-inline">دخول</button>
                                    </div>

                                    @if(Session::has('error'))
                                        <div style="height: 40px;text-align: right" class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            {{Session::get('error')}}

                                        </div>
                                    @endif


                                </form>

                            </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('public/dashboard/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('public/dashboard/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{asset('public/dashboard/js/app.js')}}"></script>

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
