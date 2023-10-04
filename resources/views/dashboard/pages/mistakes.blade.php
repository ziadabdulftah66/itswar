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



                                <form class="form form-vertical" action="{{route('mistake.update',$home->{1})}}" method="post" enctype="multipart/form-data" >
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf
                                    <div class="form-body">



                                        <div class="row  mb-3">

                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">العنوان  الاول</label>

                                                    <input value="{{$home->mistake_one_title}}" type="text" id="first-name-vertical" class="form-control" name="mistake_one_title">
                                                    @error('mistake_one_title')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">العنوان  الثاني </label>

                                                    <input value="{{$home->mistake_two_title}}" type="text" id="first-name-vertical" class="form-control" name="mistake_two_title" >
                                                    @error('mistake_two_title')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>

                                        </div>
                                        <div class="row  mb-3">
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">العنوان  الثالث </label>

                                                    <input value="{{$home->mistake_three_title}}" type="text" id="first-name-vertical" class="form-control" name="mistake_three_title" >
                                                    @error('mistake_three_title')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>


                                        </div>

                                        <div class="row  mb-3">

                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الوصف  الاول</label>
                                                    <textarea class="form-control" id="editor1" name="mistake_one_discription" cols="12" rows="5">{{$home->mistake_one_discription}}</textarea>

                                                    @error('mistake_one_discription')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الوصف الثاني </label>
                                                    <textarea class="form-control" id="editor1" name="mistake_two_discription" cols="12" rows="5">{{$home->mistake_two_discription}}</textarea>

                                                    @error('mistake_two_discription')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>

                                        </div>
                                        <div class="row  mb-3">
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الوصف الثالث </label>
                                                    <textarea class="form-control" id="editor1" name="mistake_three_discription" cols="12" rows="5">{{$home->mistake_three_discription}}</textarea>

                                                    @error('mistake_three_discription')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>


                                        </div>

                                        <div class="row  mb-3">

                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الصورة  الاولي </label>

                                                    <input  type="file" id="first-name-vertical" class="form-control" name="mistake_one_photo" >
                                                    @error('mistake_one_photo')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <br>

                                                    <td><img style="height: 120px;width: 120px;object-fit: contain"   src="{{asset($home->mistake_one_photo)}}"></td>
                                                </div>

                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الصورة  الثانية </label>

                                                    <input value="{{$home->mistake_two_photo}}" type="file"id="first-name-vertical" class="form-control" name="mistake_two_photo" >
                                                    @error('mistake_two_photo')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <br>
                                                    <td><img style="height: 120px;width: 120px;object-fit: contain"   src="{{asset($home->mistake_two_photo)}}"></td>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row  mb-3">
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">الصورة  الثالثة </label>

                                                    <input value="{{$home->mistake_three_photo}}" type="file" id="first-name-vertical" class="form-control" name="mistake_three_photo" >
                                                    @error('mistake_three_photo')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <br>
                                                    <br>
                                                    <td><img style="height: 120px;width: 120px;object-fit: contain"   src="{{asset($home->mistake_three_photo)}}"></td>
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






