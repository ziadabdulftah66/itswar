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



                                <form class="form form-vertical" action="{{route('terms.update',$terms->{1})}}" method="post">
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">عنوان الصفحة</label>
                                                    <input type="text" class="form-control" name="terms_title" id="account-name" placeholder="" value="{{$terms->terms_title}}">
                                                    @error('terms_title')
                                                    <span class=" text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>


                                                <div class="form-group" style="margin-top: 30px">
                                                    <label for="first-name-vertical">محتوى صفحة الشروط والأحكام</label>
                                                    <textarea class="form-control" id="editor"  name="terms_desc" cols="35" rows="20">{{$terms->terms_desc}}</textarea>


                                                    <script>


                                                        CKEDITOR.replace( 'terms_desc' ,{
                                                            language: 'ar',

                                                        });

                                                    </script>
                                                    @error('terms_desc')
                                                    <span class=" text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-12">
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

