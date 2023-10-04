@extends('dashboard.layouts.app')

@section('content')

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                @include('dashboard.layouts.includes.alerts.success')
                                @include('dashboard.layouts.includes.alerts.errors')

                            </div>
                        </div>
                        <!-- end page title -->



                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                            <form class="form form-vertical" action="{{route('update.profile',$user->id)}}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf


                                                <div class="form-body">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="first-name-vertical"> اسم المستخدم</label>
                                                                <input type="text" id="first-name-vertical" class="form-control" name="username" value="{{$user->username}}" >
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput2"> البريد الالكتروني </label>
                                                                <input type="email" name="email"   class="form-control" value="{{$user->email}}"  >


                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> كلمة المرور الجديدة </label>
                                                                <input type="password" id="name"
                                                                       class="form-control"
                                                                       name="password">
                                                                @error("password")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput2"> تاكيد كلمة المرور </label>
                                                                <input type="password" name="password_confirmation"  class="form-control"  >

                                                                @error('password_confirmation')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="row mb-3" >
                                                <div class="col-12" style="text-align: center" >
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">تعديل</button>

                                                </div>
                                                </div>
                                        </div>

                                    </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->



            </div> <!-- container-fluid -->
            </div>

@endsection
