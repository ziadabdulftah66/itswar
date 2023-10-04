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



                                <form class="form form-vertical" action="{{route('home.update',$home->{1})}}" method="post" enctype="multipart/form-data" >
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row mb-3">
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-vertical">عنوان</label>
                                                        <input type="text" class="form-control" name="home_title" id="account-name" placeholder="" value="{{$home->home_title}}">
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
                                                    <textarea class="form-control" id="editor1" name="home_desc" cols="30" rows="10">{{$home->home_desc}}</textarea>

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
                                                    <input type="text" class="form-control" name="home_sub_title_other" id="account-name" placeholder="" value="{{$home->home_sub_title_other}}">
                                                    @error('home_sub_title_other')
                                                    <span class=" text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label for="first-name-vertical">وصف اخر</label>
                                                    <textarea class="form-control" id="editor1" name="home_discription_other" cols="30" rows="10">{{$home->home_discription_other}}</textarea>
                                                    @error('home_title_other')
                                                    <span class=" text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                <h5>امثلة الوثائق </h5>
                                        <div class="row mb-3">
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label for="first-name-vertical">وصف </label>
                                                    <textarea class="form-control" id="editor1" name="example_discription" cols="30" rows="10">{{$home->example_discription}}</textarea>
                                                    @error('example_discription')
                                                    <span class=" text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row  mb-3">

                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">العنوان  الاول</label>

                                                    <input value="{{$home->example_one_title}}" type="text" id="first-name-vertical" class="form-control" name="example_one_title">
                                                    @error('example_one_title')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">العنوان  الثاني </label>

                                                    <input value="{{$home->example_two_title}}" type="text" id="first-name-vertical" class="form-control" name="example_two_title" >
                                                    @error('example_two_title')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>

                                        </div>
                                        <div class="row  mb-3">
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">العنوان  الثالث </label>

                                                    <input value="{{$home->example_three_title}}" type="text" id="first-name-vertical" class="form-control" name="example_three_title" >
                                                    @error('example_three_title')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">العنوان  الرابع </label>

                                                    <input value="{{$home->example_four_title}}" type="text" id="first-name-vertical" class="form-control" name="example_four_title">
                                                    @error('example_four_title')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row  mb-3">

                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الوصف  الاول</label>
                                                    <textarea class="form-control" id="editor1" name="example_one_discription" cols="12" rows="5">{{$home->example_one_discription}}</textarea>

                                                    @error('example_one_discription')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الوصف الثاني </label>
                                                    <textarea class="form-control" id="editor1" name="example_two_discription" cols="12" rows="5">{{$home->example_two_discription}}</textarea>

                                                    @error('example_two_discription')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>

                                        </div>
                                        <div class="row  mb-3">
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الوصف الثالث </label>
                                                    <textarea class="form-control" id="editor1" name="example_three_discription" cols="12" rows="5">{{$home->example_three_discription}}</textarea>

                                                    @error('example_three_discription')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الوصف الرابع </label>
                                                    <textarea class="form-control" id="editor1" name="example_four_discription" cols="12" rows="5">{{$home->example_four_discription}}</textarea>

                                                    @error('example_four_discription')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row  mb-3">

                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الصورة  الاولي </label>

                                                    <input  type="file" id="first-name-vertical" class="form-control" name="example_one_photo" >
                                                    @error('example_one_photo')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <br>

                                                    <td><img style="height: 120px;width: 120px;object-fit: contain"   src="{{asset($home->example_one_photo)}}"></td>
                                                </div>

                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الصورة  الثانية </label>

                                                    <input value="{{$home->example_two_photo}}" type="file"id="first-name-vertical" class="form-control" name="example_two_photo" >
                                                    @error('example_two_photo')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <br>
                                                    <td><img style="height: 120px;width: 120px;object-fit: contain"   src="{{asset($home->example_two_photo)}}"></td>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row  mb-3">
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الصورة  الثالثة </label>

                                                    <input value="{{$home->example_three_photo}}" type="file" id="first-name-vertical" class="form-control" name="example_three_photo" >
                                                    @error('example_three_photo')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <br>
                                                    <br>
                                                    <td><img style="height: 120px;width: 120px;object-fit: contain"   src="{{asset($home->example_three_photo)}}"></td>
                                                </div>

                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الصورة  الرابعة </label>

                                                    <input  type="file" id="first-name-vertical" class="form-control" name="example_four_photo" placeholder="Top Title">
                                                    @error('example_four_photo')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <br>
                                                    <br>
                                                    <td><img style="height: 120px;width: 120px;object-fit: contain"   src="{{asset($home->example_four_photo)}}"></td>
                                                </div>

                                            </div>

                                        </div>


                                        <div class="row mb-3">
                                            <div style="text-align: center;padding-top: 15px" class="col-12">
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






