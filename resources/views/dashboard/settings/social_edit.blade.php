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



                                <form class="form form-vertical" action="{{ route('SocialSettings.update',$setting->id) }}"
                                      method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">فيسبوك</label>
                                                    <input value="{{$setting->facebook}}" type="text" id="first-name-vertical" class="form-control" name="facebook" >
                                                    @error('facebook')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-6 ">
                                                <div class="form-group">
                                                    <label for="first-name-vertical"> تويتر</label>
                                                    <input value="{{$setting->twitter}}" type="text" id="first-name-vertical" class="form-control" name="twitter" >
                                                    @error('twitter')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical"> لينكد ان</label>
                                                    <input value="{{$setting->linkedin}}" type="text" id="first-name-vertical" class="form-control" name="linkedin" >
                                                    @error('linkedin')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical"> واتساب</label>
                                                    <input value="{{$setting->whatsap}}" type="text" id="first-name-vertical" class="form-control" name="whatsap" >
                                                    @error('whatsap')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical"> انستجرام</label>
                                                    <input value="{{$setting->instagram}}" type="text" id="first-name-vertical" class="form-control" name="instagram" >
                                                    @error('instagram')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>


                                        </div>







                                    </div>
                                    <div class="row mb-3">
{{--                                    @can('social_settings_edit')--}}
                                        <div style="text-align: center"  class="col-12" >
                                            <button  type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">حفظ</button>

                                        </div>
                                        </div>
{{--                                @endcan--}}
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
