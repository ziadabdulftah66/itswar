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


                @include('dashboard.layouts.includes.alerts.success')
                @include('dashboard.layouts.includes.alerts.errors')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <?php $i=1 ?>
@foreach($steps as $step)
    <h6> الخطوة {{$i}}</h6>
                                <?php $i++ ?>
                                <form class="form form-vertical" action="{{route('steps.update',$step->id)}}" method="post" enctype="multipart/form-data" >
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf
                                    <div class="form-body">



                                        <div class="row  mb-3">

                                            <div class="col-md-3 ">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">العنوان  </label>

                                                    <input value="{{$step->title}}" type="text" id="first-name-vertical" class="form-control" name="title">
                                                    @error('title')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">تعديل الصورة   </label>

                                                    <input  type="file" id="first-name-vertical" class="form-control" name="photo" >
                                                    @error('photo')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <br>


                                                </div>

                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="form-group">


                                                    <label for="first-name-vertical">    </label><br>

                                                    <img style="height: 40px;width: 40px;object-fit: contain"   src="{{asset($step->photo)}}">
                                                </div>

                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">    </label><br>



                                                    <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">تحرير</button>
                                                </div>

                                            </div>

                                        </div>





                                    </div>
                                </form>
                                @endforeach
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






