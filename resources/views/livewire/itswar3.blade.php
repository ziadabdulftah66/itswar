@section('style')

    <link href="{{asset('public/front/css/jquery-ui.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/front/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/front/css/spectrum.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/steps.css?version=6.3')}}">
    <link href="https://goSellJSLib.b-cdn.net/v1.4/css/gosell.css" rel="stylesheet" />
    <link href="{{asset('public/front/css/cropper.css')}}" rel="stylesheet">
@endsection

<div class="itswr-page steps-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="itswr-road">
                    <div class="one" >
                        <div class="pic @if(1 <= $CurrentStep) active_step @endif">
                            <img src="{{asset('public/front/images/icon-1.png')}}" alt="">
                        </div>
                        <h4>{{$CurrentStep}} حدد نوع الوثيقة</h4>
                    </div>
                    <div class="one">
                        <div class="pic @if(2 <= $CurrentStep) active_step @endif">
                            <img src="{{asset('public/front/images/icon-2.png')}}" alt="">
                        </div>
                        <h4>التقط أو ارفع الصورة</h4>
                    </div>
                    <div class="one">
                        <div class="pic @if(3 <= $CurrentStep) active_step @endif">
                            <img src="{{asset('public/front/images/icon-3.png')}}" alt="">
                        </div>
                        <h4>تنسيق و اختيار الخلفية</h4>
                    </div>
                    <input type="hidden" value="{{$CurrentStep}}" id="CurrentStep">
                    <div class="one">
                        <div class="pic @if(4 <= $CurrentStep) active_step @endif">
                            <img src="{{asset('public/front/images/icon-4.png')}}" alt="">
                        </div>
                        <h4>معالجة الصورة</h4>
                    </div>
                    <div class="one">
                        <div class="pic @if(5 <= $CurrentStep) active_step @endif">
                            <img src="{{asset('public/front/images/icon-1.png')}}" alt="">
                        </div>
                        <h4>الدفع واستلام الصورة</h4>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="all-data">
                    <form id="itswrForm" action="">
                        <div class="tab" @if($CurrentStep != 1) style="display: none" @endif >
                            <div class="documentType">
                                <h4>حدد نوع الوثيقة</h4>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="one">
                                        <ul>
                                            @foreach($PhotoTypes as $PhotoType)
                                            <li>
                                                <input type="radio" id="{{$PhotoType->id}}-option" wire:model="PhotoType" value="{{$PhotoType->id}}">
                                                <label for="{{$PhotoType->id}}-option">
                                                    <h4>{{$PhotoType->title}} ({{$PhotoType->width}}*{{$PhotoType->height}})سم </h4>
                                                    <h5> {{$PhotoType->discription}}</h5>
                                                    <button type="button"  data-toggle="modal" data-target="#itswrModal{{$PhotoType->id}}">تفاصيل اكتر</button>
                                                </label>
                                                <div class="check"></div>
                                            </li>
                                                <div class="modal fade" id="itswrModal{{$PhotoType->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4>{{$PhotoType->title}}</h4>
                                                                <p> {{$PhotoType->discription}} </p>
                                                                <h5>ابعاد الصورة</h5>
                                                                <span> ({{$PhotoType->width}}*{{$PhotoType->height}})سم  </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </ul>
                                        @error('PhotoType') <span class="error" style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <a  class="continue"  wire:click="secondStepSubmit">استمرار <i class="fa fa-arrow-left"></i> </a>
                                </div>
                            </div>

                        </div>
                        <div class="tab" @if($CurrentStep != 2) style="display: none" @endif >
                            <div class="upload-pic">
                                <h4>التقط الصورة او ارفع الصور</h4>

                                <div class="col-md-12 col-sm-12 col-xs-12" wire:ignore>
                                    <div class="uploading-2">

                                            <div class="custom-dropfiy">
                                                <div onclick="document.getElementById('image-input').click()" class="image-content"
                                                     id="image-dropdown-wrapper">
                                                    <img src="/assets/img/dropfiy.svg" id="display-image" >

                                                    <p id="image-preview-description">التقط صورة من الكاميرا او ارفعها من جهازك</p>
                                                    <a href="javascript:void(0)" class="removeIcon"><i class="far fa-times"></i></a>
                                                    {{-- <ul class="upload-options">
                                                        <li><a href="javascript:void(0)" id="start-camera" data-bs-toggle="modal"
                                                                data-bs-target="#openCameraModal">اختر الكاميرا</a></li>
                                                        <li><a href="javascript:void(0)"
                                                                onclick="document.getElementById('image-input').click()">اختر صورة من
                                                                جهازك</a></li>
                                                    </ul> --}}
                                                </div>
                                                <input type="file" wire:model="image" name="image" id="image-input" required
                                                       accept="image/png, image/gif, image/jpeg , capture=camera" style="visibility: hidden">

                                                <img id="face-js-preview" src="" style="display: none">

                                                <label id="face-error" class="text-danger"></label>

                                                <div class="contentLoading">
                                                    <!-- Place at bottom of page -->
                                                    <b title="من فضلك الإنتظار">
                                                        <img alt="loading" src="{{asset('public/front/logo/loading-new.gif')}}" width="20" />

                                                        جاري التحميل
                                                    </b>
                                                </div>
                                            </div>



                                    </div>

                                </div>
                                @error('image') <span class="error" style="color: red">{{ $message }}</span> @enderror
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                    <a href="#" class="continue"  wire:click="thirdStepSubmit"> استمرار <i class="fa fa-arrow-left"></i> </a>
                                    <a href="#" class="back"  wire:click="firstStepSubmit"> <i class="fa fa-arrow-right"></i> السابــــق</a>

                                </div>
                            </div>


                        </div>
                        <div class="tab" @if($CurrentStep != 3) style="display: none" @endif >
                            <section class="step-wrap editorWrap" wire:ignore style="position: relative !important;">
                                <div class="custom-dropfiy no-bg">
                                    {{-- <div class="image-content">
                                        <img id="display-image-editor" class="imageUploaded">
                                    </div> --}}
                                    <div>
                                        <div style="width:100%;height:auto;margin: 0 auto;">
                                            <div class="img-container">
                                                <img src="" id="cropper-img" />
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="zoom-wrapper" data-step="3" data-intro="تستطيع تكبير وتصغير الصورة"
                                     data-position='right'>
                                    <div id="zoom-slider"></div>
                                </div>
                                <div class='colorsPlatter' data-step="4" data-intro="تستطيع تغير لون الخلفية المرغوب"
                                     data-position='left'>
                                    <span>لون الخلفية</span>
                                    <div class="colorsItems">
                                        <input onclick="setColor('#ffffff')" type="radio" name="radio" id="radio-white" checked>
                                        <label class="colour-box-white" for="radio-white"></label>

                                        <input onclick="setColor('#0D62FC')" type="radio" name="radio" id="radio-blue">
                                        <label class="colour-box-blue" for="radio-blue"></label>

                                        <input onclick="setColor('#E55936')" type="radio" name="radio" id="radio-brown">
                                        <label class="colour-box-brown" for="radio-brown"></label>

                                        <input onclick="setColor('#13254F')" type="radio" name="radio" id="radio-dark-gray">
                                        <label class="colour-box-dark-gray" for="radio-dark-gray"></label>

                                        <input onclick="setColor('#6F6AF3')" type="radio" name="radio" id="radio-purple">
                                        <label class="colour-box-purple" for="radio-purple"></label>


                                        <input onclick="setColor('#000000')" type="radio" name="radio" id="radio-black">
                                        <label class="colour-box-black" for="radio-black"></label>

                                        <div class="imageColorPickerContainer">
                                            <input id="imageColorPicker" value="">
                                            <i class="fi-rr-plus" id="iconPlatter"></i>
                                        </div>

                                    </div>
                                </div>
                                <div id="copper-loader" class="copper-loader">
                                    <!-- Place at bottom of page -->
                                    <b title="من فضلك الإنتظار" id="loader-modal-content">
                                        <img alt="loading" src="{{ asset('/logo/loading-new.gif') }}" width="20" />
                                        جاري التحميل
                                    </b>
                                </div>
                            </section>
                            <a href="#" class="continue"  id="next" wire:click="fourthStepSubmit"> استمرار <i class="fa fa-arrow-left"></i> </a>
                            <a href="#" class="back"  wire:click="secondStepSubmit"> <i class="fa fa-arrow-right"></i> السابــــق</a>

                        </div>
                        <div class="tab" @if($CurrentStep != 4) style="display: none" @endif >


                            <section class="step-wrap" wire:ignore style="position: relative !important;">
                                <div class="photo-after-proccess picture-completed">
                                    <img id="final-processed-image" class="processed-image" src="" draggable="false">
                                    <div class="process-checked">
                                        <img src="/assets/img/check.svg">
                                        تمت المعالجة بنجاح
                                    </div>
                                </div>
                                <div class="picture-processing">
                                    <div class="picture-proccess-wrap">
                                        <img alt="loading" src="{{asset('public/front/logo/new-loading.gif')}}" width="100"
                                             style="display: block;margin:0 auto;" />
                                        <span>جاري معالجة الصورة </span>

                                        <div class="progress">
                                            <div class="progress-done" data-done="10">
                                                10%
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                                --}}{{-- <div class="contentLoading" style="height: 100%;">--}}
{{--                                    <div style="max-width: 500px;--}}
{{--                                        min-height: 230px;--}}
{{--                                        background: #fff;--}}
{{--                                        -webkit-box-shadow: 0px 16.31px 43.49px rgb(13 98 252 / 10%);--}}
{{--                                        box-shadow: 0px 16.31px 43.49px rgb(13 98 252 / 10%);--}}
{{--                                        top: 25px;--}}
{{--                                        margin: 10px auto;--}}
{{--                                        display: flex;--}}
{{--                                        align-items: center;--}}
{{--                                        justify-content: center;" class="proccessing-inner">--}}
{{--                                        <!-- Place at bottom of page -->--}}
{{--                                        <b title="من فضلك الإنتظار" id="loader-modal-content"--}}
{{--                                            style="box-shadow: none;background: transparent;top:-5px;color: #0e62fc;">--}}
{{--                                            <img alt="loading" src="{{ asset('/logo/new-loading.gif') }}" width="100"--}}
{{--                                                style="display: block;margin:0 auto;" />--}}
{{--                                            جاري معالجة الصورة--}}
{{--                                        </b>--}}
{{--                                    </div>--}}
{{--                                </div> --}}
                            </section>


                        </div>
                        <div class="tab" @if($CurrentStep != 5) style="display: none" @endif >
                            <div class="receiving-photo">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="right-one">
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="pic">
                                                <h2>صورة جواز سفر سعودي</h2>
                                                <img src="images/pic-3.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="info">
                                                <h5>ملخص الطلب</h5>
                                                <ul>
                                                    <li> تكلفة الصورة <span>10 ريال</span></li>
                                                    <li> الضرائب والرسوم   <span>2 ريال</span></li>
                                                    <hr>
                                                    <li>  الاجمالي <span>12 ريال</span></li>


                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="payment">
                                        <h5>التأكيد والدفع  </h5>
                                        <h2>ادخل بيانات كرت الدفع</h2>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>ارقام الكرت</label>
                                            <input type="text" placeholder="4545 4534 3454 3455">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label>تاريخ الانتهاء  </label>
                                            <input type="text" placeholder="4/5" style="width: 90%;">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label>الرقم السري  </label>
                                            <input type="text" placeholder="ccv">
                                        </div>
                                        <button><img src="images/pay.png" alt=""> اتمام عملية الدفع  </button>

                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <a href="#" class="back"  wire:click="fourthStepSubmit"> <i class="fa fa-arrow-right"></i> السابــــق</a>                </div>
                            </div>

                        </div>


                    </form>
                </div>
            </div>



        </div>
    </div>
</div>

@section('scripts')


{{--    <script type="text/javascript" src="{{asset('public/front/js/select2.min.js')}}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>

    <script src="{{asset('public/front/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('public/front/js/spectrum.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript" src="{{asset('public/front/js/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/front/js/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="https://unpkg.com/@vladmandic/face-api/dist/face-api.js"></script>

    <script src="{{asset('public/front/js/axios.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@vladmandic/face-api@1/dist/face-api.js"></script>
    <script type="text/javascript" src="https://goSellJSLib.b-cdn.net/v1.4/js/gosell.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>




<script>

        const image_input = document.querySelector("#image-input");
        const image_preview = document.querySelector("#display-image");
        const image_preview_description = document.querySelector("#image-preview-description");
        const display_image_editor = document.querySelector('#display-image-editor');
        const removeImageBtn = document.querySelector('.removeIcon');
        const face_js_preview = document.querySelector('#face-js-preview');
        const cropper_img = document.querySelector('#cropper-img');
        const photo_src = document.querySelector('#photo_src');
        let next = document.querySelector('#next');
        let CurrentStep = document.querySelector('#CurrentStep');

        const url = "{{ url('/assets/models') }}";

        let width = 1;

        let hight = 1;

        let selectedColor = '#ffffff';

        function setColor(color) {

            selectedColor = color;

        }

        $(window).on('load', function() {
            $('#loader-modal').fadeOut(100);
        });

        loadModels();

        function loadModels() {
            Promise.all([
                faceapi.nets.ssdMobilenetv1.loadFromUri(url)
            ]).then(function() {
                $('#loader-modal').fadeOut(100);
                {{--                @if (!$visitedBefore)--}}
                {{--                setTimeout(function() {--}}
                {{--                    $('#requirmetnsStepsModal').modal('show');--}}
                {{--                }, 100);--}}
                {{--                @endif--}}
            })
        }

        window.addEventListener('change-card', function(event) {
            document.querySelector('#card_name').textContent = event.detail.name;
            document.querySelector('#card_dimensions').textContent =
                `${event.detail.width} * ${event.detail.hight}`;

            width = event.detail.width;
            hight = event.detail.hight;
        });

        image_input.addEventListener('change', function() {

           $('.contentLoading').fadeIn();
            disableButton()


            const imgFile = image_input.files[0];

            if (!imgFile) {
                image_input.value = null;
                image_preview.parentElement.classList.remove('imageUploadedContainer');
                image_preview.classList.remove('imageUploaded');
                image_preview.src = '/assets/img/dropfiy.svg';
                image_preview_description.textContent = 'التقط صورة من الكاميرا او ارفعها من جهازك';
                document.querySelector('#face-error').textContent = 'الصورة المقدمة غير مناسبة ، أعد المحاولة';
                document.querySelector('.image-content').classList.remove('active');
                $('.contentLoading').fadeOut(500);
                enableButtons();
            }

            try {
                if (imgFile.size > 3573833) {
                    image_input.value = null;
                    image_preview.parentElement.classList.remove('imageUploadedContainer');
                    image_preview.classList.remove('imageUploaded');
                    image_preview.src = '/assets/img/dropfiy.svg';
                    image_preview_description.textContent = 'التقط صورة من الكاميرا او ارفعها من جهازك';
                    document.querySelector('#face-error').textContent =
                        'الرجاء اختيار صورة حجمها 3 ميقا بايت على الأكثر للمعالجة';
                    $('.contentLoading').fadeOut(500);
                    enableButtons();
                    return;
                }
            } catch (error) {
                console.error(error);
                enableButtons();
                return;
            }

            setTimeout(() => {
                checkFace(imgFile);
            }, 300);

            document.querySelector('.image-content').classList.remove('active');
        });

        async function checkFace(imgFile) {

            const img = await faceapi.bufferToImage(imgFile)
            face_js_preview.src = img.src

            const results = await faceapi
                .detectAllFaces(face_js_preview);


            if (results.length) {
                const reader = new FileReader();

                reader.addEventListener("load", () => {
                    const uploaded_image = reader.result;

                    image_preview.src = `${uploaded_image}`;
                    cropper_img.src = `${uploaded_image}`;

                    image_preview.classList.add('imageUploaded');
                    image_preview.parentElement.classList.add('imageUploadedContainer');

                    loadCropper();
                    $('.contentLoading').fadeOut(500);

                    enableButtons();
                });
                reader.readAsDataURL(imgFile);
                image_preview_description.textContent = '';
                document.querySelector('#face-error').textContent = '';
            } else {
                image_input.value = null;
                image_preview.parentElement.classList.remove('imageUploadedContainer');
                image_preview.classList.remove('imageUploaded');
                image_preview.src = '/assets/img/dropfiy.svg';
                image_preview_description.textContent = 'التقط صورة من الكاميرا او ارفعها من جهازك';

                document.querySelector('#face-error').textContent =
                    'الصورة المقدمة غير مناسبة ، أعد المحاولة';
                $('.contentLoading').fadeOut(500);
                enableButtons();
            }

        }


        // image_input.addEventListener("change", function() {
        //     $('.contentLoading').fadeIn(500);
        //     let data = new FormData();
        //     data.append("image", image_input.files[0]);
        //     let settings = {
        //         headers: {
        //             "content-type": "multipart/form-data"
        //         }
        //     };
        //     axios
        //         .post("/check-face", data, settings)
        //         .then(() => {
        //             const reader = new FileReader();
        //             reader.addEventListener("load", () => {
        //                 const uploaded_image = reader.result;
        //                 image_preview.src = `${uploaded_image}`;
        //                 image_preview.classList.add('imageUploaded');
        //                 display_image_editor.src = `${uploaded_image}`;
        //                 image_preview.parentElement.classList.add('imageUploadedContainer');
        //             });
        //             reader.readAsDataURL(this.files[0]);
        //             image_preview_description.textContent = '';
        //             document.querySelector('#face-error').textContent = '';
        //             $('.contentLoading').fadeOut(500);

        //         })
        //         .catch((errors) => {
        //             image_input.value = null;
        //             image_preview.parentElement.classList.remove('imageUploadedContainer');
        //             image_preview.classList.remove('imageUploaded');
        //             image_preview.src = '/assets/img/dropfiy.svg';
        //             image_preview_description.textContent = 'التقط صورة من الكاميرا او ارفعها من جهازك';

        //             document.querySelector('#face-error').textContent =
        //                 'يجب ان يوجد وجه في الصورة حتى تتم المعالجة ';


        //             $('.contentLoading').fadeOut(500);
        //         });
        // });

        function removebg(color, base64image = null, hasWaterMark = true) {

            selectedColor = color;


            $('.contentLoading').fadeIn(500);
            disableButton();
            let data = new FormData();
            data.append("image", base64image);

            if (color) {
                data.append("bgcolor", color);
            }

            if (hasWaterMark) {
                data.append("hasWaterMark", hasWaterMark);
            }
            console.log(data);

            let settings = {
                headers: {
                    "content-type": "multipart/form-data"
                },
                onUploadProgress: function(progressEvent) {
                    const bar = document.querySelector('.progress-done');
                    let percentCompleted = Math.round((progressEvent.loaded / progressEvent.total) * 100);
                    if (percentCompleted == 100) {
                        percentCompleted = 99;
                    }
                    bar.style.opacity = 1;
                    bar.setAttribute('data-done', percentCompleted);
                    bar.textContent = `${percentCompleted}%`
                    bar.style.width = bar.getAttribute('data-done') + '%';
                }
            };

            axios
                {{--.post("/removebg/{{ $order->id }}", data, settings).then((res) => {--}}
                .post("/removebg/{{ $order->id }}}", data, settings).then((res) => {

                if (res.data.cropperImage) {
                    loadCropper(res.data.imageUrl);
                }

                document.querySelectorAll('.processed-image').forEach(function(img) {
                    img.src = res.data.imageUrl;
                });
                $('.picture-completed').fadeOut();

                setTimeout(() => {
                    $('.contentLoading').fadeOut(500);
                   enableButtons();
                }, 1500);

            }).catch((res) => {
                $('.contentLoading').fadeOut(500);

                disableButton();
                enableButtons();
                if (res.response.data.reload) {
                window.location.reload();
                }
            });
            return;
        }

        removeImageBtn.addEventListener("click", function() {
            image_input.value = null;
            image_preview.parentElement.classList.remove('imageUploadedContainer');
            image_preview.classList.remove('imageUploaded');
            image_preview.src = '/assets/img/dropfiy.svg';
            image_preview_description.textContent = 'التقط صورة من الكاميرا او ارفعها من جهازك';
            document.querySelector('#face-error').textContent = ' ';
        });
    </script>
    <script>
        let pageNumber = {{$CurrentStep}};



        function enableButtons() {
            $('.picture-processing').fadeOut();
            $('.picture-completed').fadeIn(300);
            // nextButton.removeClass("disabled-custom")._aria("disabled", "false");
            // previousButton.removeClass("disabled-custom")._aria("disabled", "false");
        }

        function disableButton() {
            $('.picture-completed').fadeOut();
            $('.picture-processing').fadeIn(300);
            // nextButton.addClass("disabled-custom")._aria("disabled", "true");
            // previousButton.addClass("disabled-custom")._aria("disabled", "true");
        }

        next.addEventListener('click', function() {
            // pageNumber = pageNumber + 1;
            //
            // if (pageNumber == 2) {
            //     if (!$('.typeSelect').val()) {
            //         pageNumber = pageNumber - 1
            //         return;
            //     }
            // }



                document.querySelector('#final-processed-image').src = '';
                $('.picture-completed').hide();
                // setTimeout(() => {
                //         introJs().start();
                //     function startIntro(){
                //         var intro = introJs();
                //         intro.setOptions({
                //             nextLabel:"التالي",
                //             prevLabel:"السابق",
                //             doneLabel:"فهمت",
                //             skipLabel:"<i class='fi-rr-cross-small'></i>",
                //             hidePrev:true,
                //             exitOnOverlayClick:true,
                //             dontShowAgain:false,
                //             dontShowAgainLabel:"لا تعرض هذا مرة اخري"
                //         });
                //         intro.start();
                //     }
                //
                //     startIntro();
                //
                // }, 500);



           // if (pageNumber == 4) {
                const bar = document.querySelector('.progress-done');
                bar.setAttribute('data-done', 0);
                bar.textContent = `${0}%`
                bar.style.width = bar.getAttribute('data-done') + '%';

                disableButton();
                setTimeout(() => {
                    var croppedimage = cropper.getCroppedCanvas().toDataURL("image/png");


                    removebg(selectedColor, croppedimage, true);
                }, 300);
          //  }
        });


        // previousButton.on('click', function() {
        //     pageNumber = pageNumber - 1;
        // });
    </script>


    {{-- copper image --}}
    <script>
        var isInitialized = false;
        var cropper = '';
        var file = '';
        var _URL = window.URL || window.webkitURL;
        // Initialize Slider

        function loadCropper() {
               // $("#cropper-img").attr('src', src);
            if (isInitialized == true) {
                $('#zoom-slider').val(0);
                cropper.destroy();
            }
            initCropper();
        }

        $(document).ready(function() {
            $("#zoom-slider").slider({
                orientation: "horizontal",
                range: "min",
                max: 1,
                min: 0,
                value: 0,
                step: 0.0001,
                slide: function() {
                    if (isInitialized == true) {
                        var currentValue = $("#zoom-slider").slider("value");
                        var zoomValue = parseFloat(currentValue);
                        cropper.zoomTo(zoomValue.toFixed(4));
                    }
                }
            });
        });

        function initCropper() {
            $('#copper-loader').fadeIn();
            var vEl = document.getElementById('cropper-img');
            cropper = new Cropper(vEl, {
                viewMode: 1,
                dragMode: 'move',
                aspectRatio: width / hight,
                checkOrientation: false,
                cropBoxMovable: false,
                cropBoxResizable: false,
                toggleDragModeOnDblclick: false,
                minCropBoxWidth: width,
                minCropBoxHeight: hight,
                scalable: false,
                zoomOnTouch: true,
                responsive: false,
                zoomOnWheel: false,
                minContainerWidth: 380,
                minContainerHeight: 400,
                guides: false,
                highlight: false,
                ready: function(e) {
                    console.log('cropper done loading');
                    setTimeout(() => {
                        $('#copper-loader').fadeOut(500);
                    }, 200);
                    var cropper = this.cropper;
                    cropper.zoomTo(0);

                    var imageData = cropper.getImageData();
                    console.log("imageData ", imageData);
                    var minSliderZoom = imageData.width / imageData.naturalWidth;

                    $('#min-zoom-val').html(minSliderZoom.toFixed(4));

                    $(".cr-slider-wrap").show();
                    $("#zoom-slider").slider("option", "max", 1);
                    $("#zoom-slider").slider("option", "min", minSliderZoom);
                    $("#zoom-slider").slider("value", minSliderZoom);
                }
            });
            isInitialized = true;


        }
    </script>
    <script>
        $(function() {
            $('#imageColorPicker').spectrum({
                type: "text",
                showInput: true,
                hideAfterPaletteSelect: true,
                showInitial: false,
                preferredFormat: 'hex',
                clickoutFiresChange: true,
                cancelText: 'الغاء',
                chooseText: 'اختر',
                showButtons: false,
            });

            $('#imageColorPicker').on('change', function() {
                $('#iconPlatter').removeClass().addClass('fi-rr-check');
                $('.colorsItems input[name="radio"]').prop("checked", false);
                setColor($('#imageColorPicker').val());
            })

            $('.colorsItems input[name="radio"]').on('change', function() {
                $('#iconPlatter').removeClass().addClass('fi-rr-plus');
                $('.colorsPlatter input:checked+label:before').show();
            })

        })
    </script>

@endsection
