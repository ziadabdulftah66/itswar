
@extends('dashboard.layouts.app')
@section('style')
    <style>
        .dataTables_wrapper .dataTables_filter{
            text-align: right !important;
            width: 50% !important;
            display: inline !important;
        }
        .dataTables_wrapper .dataTables_length{
            text-align: left !important;

        }

        .dataTables_wrapper .dataTables_filter input {
            width: 250px ;
            margin-right:10px;
            height: 30px;
            margin-bottom: 12px;
        }

    </style>
@endsection
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

                                <h4 class="card-title">التقييم</h4>

                                <table id="myTable"  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>

                                        <th scope="col">الفيديو</th>
                                        <th scope="col">تعديل</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($videos as $video)
                                        <tr>
                                            <td>{{$i}}</td>
                                                <?php $i++; ?>
                                            <td>
                                                @php
                                                    $url = getYoutubeId($video->url_video);
                                                @endphp

                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$url}}"  allowfullscreen></iframe>
                                            </td>


                                            <td>
                                                <a href="{{route('videos.edit', $video->id)}}"
                                                   class="btn btn-secondary btn-sm edit" title="Edit"> <i class="fas fa-pencil-alt"></i> </a>

                                            </td>






                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->





    </div>
    <div class="rightbar-overlay"></div>
@endsection






