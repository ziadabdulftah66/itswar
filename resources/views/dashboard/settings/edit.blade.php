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



                                <form class="form form-vertical" action="{{ route('settings.update',$setting->id) }}"
                                      method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"> اسم المنصة</label>
                                            <div class="col-sm-10">
                                                    <input value="{{$setting->site_name}}" type="text" id="first-name-vertical" class="form-control" name="site_name" >
                                                    @error('site_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"> جوال المدير</label>
                                            <div class="col-sm-10">
                                                    <input value="{{$setting->manager_phone}}" type="text" id="first-name-vertical" class="form-control" name="manager_phone" >
                                                    @error('manager_phone')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>



                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"> عنوان المنصة</label>
                                            <div class="col-sm-10">
                                                    <input value="{{$setting->address}}" type="text" id="first-name-vertical" class="form-control" name="address" >
                                                    @error('address')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                                            <div class="col-sm-10">
                                                    <input value="{{$setting->email}}" type="text" id="first-name-vertical" class="form-control" name="email" >
                                                    @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"> نسبة الضريبة  <span style="color: red;margin-right: 10px" >%</span></label>
                                            <div class="col-sm-10">
                                                <input value="{{$setting->tax}}" type="number" id="first-name-vertical" class="form-control" name="tax" >
                                                @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                        </div>

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">الكلمات الافتتاحية</label>
                                        <div class="col-sm-10">
                                                    <textarea  type="text" id="first-name-vertical" class="form-control" name="opening_words" >{{$setting->opening_words}}</textarea>
                                                    @error('opening_words')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"> الكلمات الدليلية</label>
                                            <div class="col-sm-10">
                                                    <textarea  type="text" id="first-name-vertical" class="form-control" name="Tags" >{{$setting->Tags}}</textarea>
                                                    @error('Tags')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>


                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"> الموقع</label>
                                            <div class="col-sm-10">
                                                    <textarea  type="text" id="first-name-vertical" rows="4" class="form-control" name="location" >{{$setting->location}}
                                                            </textarea>
                                                    @error('location')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"> شعار الموقع العلوي</label>
                                            <div class="col-sm-7">
                                                    <input type="file" id="first-name-vertical" class="form-control" name="site_logo_header" >

                                                    @error('site_logo_header')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>
                                            @if($setting->site_logo_header != null )
                                                <div class="col-sm-3" >
                                                    <img  style="object-fit: contain;width: 160px;height: 60px;margin-bottom: 15px" class="imgsit" src="{{$setting->site_logo_header}}" alt="no_sit_logo">
                                                </div>
                                            @else
                                                <div style="padding: 35px" class="col-sm-3">
                                                    <span>لا يوجد صورة </span>
                                                </div>
                                            @endif

                                            </div>


                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">  شعار الموقع السفلي</label>
                                            <div class="col-sm-7">
                                                    <input  type="file" id="first-name-vertical" class="form-control" name="site_logo_footer" >

                                                    @error('site_logo_footer')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>
                                            @if($setting->site_logo_footer != null  )
                                                <div class="col-sm-3"  >
                                                    <img style="object-fit: contain;width: 160px;height: 60px;margin-bottom: 15px"   class="imgsit" src="{{$setting->site_logo_footer}}" alt="no_sit_logo">
                                                </div>
                                            @else
                                                <div style="padding: 35px" class="col-sm-3">
                                                    <span>لا يوجد صورة </span>
                                                </div>
                                            @endif




                                            </div>



                                    <div class="row mb-3">


                                        <label for="example-text-input" class="col-sm-2 col-form-label">الايقونة</label>
                                        <div class="col-sm-7">
                                                    <input type="file" id="first-name-vertical" class="form-control" name="site_logo_icon" >

                                                    @error('site_logo_icon')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>
                                        @if($setting->site_logo_icon != null )

                                            <div class="col-sm-3">
                                                <img  class="imgsit" src="{{$setting->site_logo_icon}}" alt="no_sit_logo">
                                            </div>
                                        @else
                                            <div style="padding: 35px"  class="col-sm-3">
                                                <span >لا يوجد صورة </span>
                                            </div>
                                        @endif

                                            </div>









                                    </div>
                                    <div class="row  mb-3">
                                        <div style="text-align: center" class="col-12">
                                            <button  type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">حفظ</button>

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
