@extends('dashboard.layouts.app')

@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="row align-items-center">


                    </div>
                </div>
                <!-- end page title -->



                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">



                                <form class="form form-vertical" action="{{route('who.update')}}" method="post" enctype="multipart/form-data" >
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row mb-3">
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-vertical">عنوان</label>
                                                        <input type="text" class="form-control" name="home_title" id="account-name" placeholder="" value="{{$home->who_title}}">
                                                        @error('home_title')
                                                        <span class=" text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label for="first-name-vertical">وصف</label>
                                                    <textarea class="form-control" id="editor1" name="home_desc" cols="30" rows="10">{{$home->who_desc}}</textarea>
                                                    <script>


                                                        CKEDITOR.replace( 'home_desc' ,{
                                                            language: 'ar',

                                                        });

                                                    </script>
                                                    @error('discription')
                                                    <span class=" text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label for="first-name-vertical"> عنوان فرعى أخر</label>
                                                    <input type="text" class="form-control" name="home_sub_title_other" id="account-name" placeholder="" value="{{$home->who_sub_title_other}}">
                                                    @error('home_sub_title_other')
                                                    <span class=" text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label for="first-name-vertical">عنوان أخر</label>
                                                    <input type="text" class="form-control" name="home_title_other" id="account-name" placeholder="" value="{{$home->who_title_other}}">
                                                    @error('home_title_other')
                                                    <span class=" text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group">
                                                <div class="col-12">

                                                    <label for="first-name-vertical">صورة الأيقونة شمال</label>
                                                    <input type="file" id="first-name-vertical" value="" class="form-control" name="home_image_icon_left">
                                                    @error('home_image_icon_left')
                                                    <span class=" text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" style="background-color: whitesmoke;width: 250px">

                                            <img src="{{$home->who_image_icon_left}}" style="width: 150px" class="image_thumbnail image-preview" alt="">
                                        </div>

                                        <div class="row mb-3">
                                            <div style="text-align: center" class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">تحرير</button>

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

@endsection
@section('scripts')
    <script src="{{asset('public/dashboard/ckeditor/ckeditor.js')}}"></script>
@endsection






