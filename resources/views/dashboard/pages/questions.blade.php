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

                    <div class="col-12">
                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">اضافة سؤال</button>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="card-content">
                                        <div class="card-body">

                                            <form class="form form-vertical" action="{{route('Questions.store')}}" method="post">

                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-vertical">السؤال</label>
                                                                <input type="text" class="form-control" name="question" id="account-name" placeholder="" >
                                                                @error('question')
                                                                <span class=" text-danger">{{$message}}</span>
                                                                @enderror

                                                            </div>


                                                            <div class="form-group">
                                                                <label for="first-name-vertical">الاجابة</label>
                                                                <textarea class="form-control" id="editor1"  name="answer" cols="30" rows="10"></textarea>

                                                                <script>


                                                                    CKEDITOR.replace( 'answer' ,{
                                                                        language: 'ar',

                                                                    });

                                                                </script>
                                                                @error('answer')
                                                                <span class=" text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">اضافة</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                @include('dashboard.layouts.includes.alerts.success')
                @include('dashboard.layouts.includes.alerts.errors')
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">

                                @isset($questions)
                                <div id="accordion-payment" class="accordion">
                                    @error('question')
                                    <span class=" text-danger">{{$message}}</span>
                                    @enderror
                                    @error('answer')
                                    <span class=" text-danger">{{$message}}</span>
                                    @enderror
                                @foreach($questions as $question)
                                    <div class="card " style="padding:initial" >
                                        <div class="card-header" id="quest{{$question->id}}" style="margin-bottom: 20px;margin-left: 50px ">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#quest_content{{$question->id}}" aria-expanded="false" >
                                                    <span style="font-weight: 400; font-size: 1.2rem;color: black" class="page-title"> {{$question->question}} </span>

                                                </button>
                                            </h5>
                                        </div>
                                        <div id="quest_content{{$question->id}}" class="collapse"  data-parent="#accordion-payment"  >
                                            <div class="card-body">
                                                <form class="form form-vertical" action="{{route('Questions.update',$question->id)}}" method="post">

                                                    @csrf
                                                <div class="form-group">
                                                    <label for="question{{$question->id}}">السؤال</label>
                                                    <input type="text" name="question" id="question{{$question->id}}" value="{{$question->question}}"   class="form-control">

                                                </div>
                                                <div class="form-group">
                                                    <label for="answer{{$question->id}}">الاجابة</label>
                                                    <textarea class="form-control" id="answer{{$question->id}}"  name="answer" cols="30" rows="10"> {{$question->answer}}</textarea>
                                                    <script>


                                                        CKEDITOR.replace( 'answer{{$question->id}}' ,{
                                                            language: 'ar',

                                                        });

                                                    </script>

                                                </div>
                                                    <div class="col-12" style="text-align: center;padding: 20px" >
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">تعديل</button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endisset
                            </div>
                        </div>

                </section>


                                </div>

        </div>

    </div>
</div>

                </div>

            </div>
        </div>

@endsection
