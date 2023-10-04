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

                                <form class="form form-vertical" action="{{route('videos.update', $video->id)}}" method="post">
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">رابط الفيديو</label>
                                                    <input type="text" id="first-name-vertical" value="{{$video->url_video}}" class="form-control" name="url_video" placeholder="رابط الفيديو">
                                                    @error('url_video')
                                                    <span class=" text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                </div>
                                        </div>
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                    @php
                                                        $url = getYoutubeId($video->url_video);
                                                    @endphp

                                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$url}}"  allowfullscreen></iframe>
                                                </div>
                                            </div>

                                            <div class="col-12 float-left">
                                                <button type="submit" class="btn btn-primary  mr-1 mb-1 waves-effect waves-light">حفظ</button>

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



