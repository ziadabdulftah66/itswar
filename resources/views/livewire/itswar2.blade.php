<div>
    <section class="steps-wrapper section">
        <div class="container">
            <form id="multistepsform" action="#">
                <div>
                    <h3><i class="fi-rr-id-badge"></i></h3>
                    <section wire:ignore>
                        <h2 class="fs-title first">حدد نوع الوثيقة</h2>
                        <select class="typeSelect" name="type_doc" required>
                            <option value="">اختر من القائمة</option>
                            @foreach ($cards as $card)
                                <option value="{{ $card->id }}">{{ $card->name }} </option>
                            @endforeach
                        </select>
                    </section>
                    <h3><i class="fi-rr-mode-landscape"></i></h3>
                    <section class="step-wrap" wire:ignore style="position: relative">
                        <div class="custom-dropfiy">
                            <div onclick="document.getElementById('image-input').click()" class="image-content"
                                 id="image-dropdown-wrapper">
                                <img src="/assets/img/dropfiy.svg" id="display-image">
                                <p id="image-preview-description">التقط صورة من الكاميرا او ارفعها من جهازك</p>
                                <a href="javascript:void(0)" class="removeIcon"><i class="fi-rr-cross"></i></a>
                                {{-- <ul class="upload-options">
                                    <li><a href="javascript:void(0)" id="start-camera" data-bs-toggle="modal"
                                            data-bs-target="#openCameraModal">اختر الكاميرا</a></li>
                                    <li><a href="javascript:void(0)"
                                            onclick="document.getElementById('image-input').click()">اختر صورة من
                                            جهازك</a></li>
                                </ul> --}}
                            </div>
                            <input type="file" name="image" id="image-input" required
                                   accept="image/png, image/gif, image/jpeg , capture=camera" style="visibility: hidden">

                            <img id="face-js-preview" src="" style="display: none">

                            <label id="face-error" class="text-danger"></label>

                            <div class="contentLoading">
                                <!-- Place at bottom of page -->
                                <b title="من فضلك الإنتظار">
                                    <img alt="loading" src="{{ asset('/logo/loading-new.gif') }}" width="20" />

                                    جاري التحميل
                                </b>
                            </div>
                        </div>
                    </section>
                    <h3><i class="fi-rr-settings-sliders"></i></h3>
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
                    <h3><i class="fi-rr-magic-wand"></i></h3>
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
                                <img alt="loading" src="{{ asset('/logo/new-loading.gif') }}" width="100"
                                     style="display: block;margin:0 auto;" />
                                <span>جاري معالجة الصورة </span>

                                <div class="progress">
                                    <div class="progress-done" data-done="10">
                                        10%
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="contentLoading" style="height: 100%;">
                            <div style="max-width: 500px;
                                min-height: 230px;
                                background: #fff;
                                -webkit-box-shadow: 0px 16.31px 43.49px rgb(13 98 252 / 10%);
                                box-shadow: 0px 16.31px 43.49px rgb(13 98 252 / 10%);
                                top: 25px;
                                margin: 10px auto;
                                display: flex;
                                align-items: center;
                                justify-content: center;" class="proccessing-inner">
                                <!-- Place at bottom of page -->
                                <b title="من فضلك الإنتظار" id="loader-modal-content"
                                    style="box-shadow: none;background: transparent;top:-5px;color: #0e62fc;">
                                    <img alt="loading" src="{{ asset('/logo/new-loading.gif') }}" width="100"
                                        style="display: block;margin:0 auto;" />
                                    جاري معالجة الصورة
                                </b>
                            </div>
                        </div> --}}
                    </section>
                    <h3><i class="fi-rr-credit-card"></i></h3>
                    <section class="step-wrap" wire:ignore style="position: relative">
                        <div class="row">
                            <div class="col-lg-5" wire:ignore.self>
                                <div class="serviceDetails">
                                    <div class="imageFinal">
                                        <img class="processed-image" src="" draggable="false">
                                    </div>
                                    <div class="imageDetails">
                                        <ul>
                                            <li>
                                                <strong>نوع الصورة :</strong> <span id="card_name"></span>
                                            </li>
                                            <li>
                                                <strong>المقاس :</strong>
                                                <span id="card_dimensions">
                                                </span>
                                            </li>
                                            <li>
                                                <strong>السعر :</strong>
                                                <span class="price">{{ settings('price') }} ريال</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="payCardWrap">
                                    <div>
                                        <div class="text-center payment">
                                            <br>
                                            <div>
                                                <article class="card no-shadow" style="position: relative;top:-25px;width: 100%;padding: 30px 15px 0;
                                                    border-radius: 10px;
                                                    border: 1px solid #E7E8EA;">
                                                    {{-- New Apple Pay Button --}}
                                                    @if (isSafari())
                                                        <div class="applePayCard">
                                                            {{-- <script type="text/javascript"
                                                                src="https://goSellJSLib.b-cdn.net/v1.4.1/js/gosell.js">
                                                            </script> --}}
                                                            <div id="sendOrderButtonDiv" class="col-lg-12">
                                                                <div>
                                                                    <p id="msg" class=" m-0"></p>
                                                                    <div class="sendingOrderBtn applePayOrderBtn">
                                                                        <button id="submit-elements1" type="button"
                                                                                class="btn btn-default btn-block"
                                                                                onclick="applePay();"> ادفع باستخدام
                                                                            <img src="/assets/img/applePayIcon.png"
                                                                                 class="img-responsive" width="45">
                                                                        </button>
                                                                    </div>

                                                                    <div class="line-with-words apple-pay-div">
                                                                        <div class="line mr-2"></div>
                                                                        <div class="text-center title text-primary-green"
                                                                             role="heading" aria-level="3">أو أدخل
                                                                            تفاصيل البطاقة
                                                                        </div>
                                                                        <div class="line ml-2"></div>
                                                                    </div>

                                                                </div>
                                                                <!--                                        </div>-->
                                                            </div>
                                                        </div>
                                                    @endif
                                                    {{-- New Apple Pay Button --}}
                                                    <script
                                                        src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.4/bluebird.min.js">
                                                    </script>
                                                    <div id="root"></div>
                                                    <div class="validation-Messages" id="validation-Messages"></div>
                                                    <p id="msg"></p>
                                                    <button type="button" id="payNowButton" onclick="goSell.submit();"
                                                            style="display:none;">ادفع</button>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>

            </form>

        </div>

    </section>

    <div class="modal fade" id="openCameraModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="take-photo-wrap">
                        <div class="box photoCapture">
                            {{-- <button class="openCamera">افتح الكاميرا</button> --}}
                            <video id="video" width="320" height="240" autoplay></video>

                        </div>
                        <div class="box photoCapturePreview">

                            <canvas id="canvas" width="320" height="240"></canvas>

                        </div>
                    </div>
                    <div class="take-photo-btn">
                        <button id="click-photo">
                            <img src="/assets/img/camera.svg">
                            التقط الصورة</button>

                        <button id="repeat-photo">
                            <img src="/assets/img/refresh.svg">
                            إعادة التصوير</button>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- data-bs-dismiss="modal" --}}
                    <button id="closeCameraModal" type="button" class="btn btn-secondary">حفظ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="requirmetnsStepsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="doc-requirements demoSection2">
                        <div class="container">
                            <div class="section_title">
                                الاخطاء الشائعة في التصوير

                            </div>
                            <div style="position: relative;z-index:22;">
                                <div class="row" style="margin-top: 30px;">
                                    <div class="col-lg-12 rowItem">
                                        <div class="row align-items-center">

                                            <div class="col-md-8">
                                                <div class="demo-content">
                                                    <div class="bg-circle">
                                                        <span><i class="fi-rr-check"></i></span>
                                                    </div>
                                                    <span>
                                                        الإضاءة
                                                        <p>يجب ان تكون الإضاءة واضحة على الوجه حتى تتكمن من رؤية الوجه
                                                            بالشكل الصحيح </p>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <img src="/assets/img/fall-4.png" class="img-fluid imgDemo"
                                                             alt="حتى الإضاءة على جانبي الوجه" loading="lazy">
                                                    </div>
                                                    <div class="col-6">

                                                        <img src="/assets/img/fall-2.png" class="img-fluid imgDemo"
                                                             alt="حتى الإضاءة على جانبي الوجه" loading="lazy">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 rowItem">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <div class="demo-content">
                                                    <div class="bg-circle">
                                                        <span><i class="fi-rr-check"></i></span>
                                                    </div>
                                                    <span>
                                                        الوضعية للأمام مباشرة
                                                        <p>وجّه جسمك الى الكاميرا بالشكل الصحيح و على خط مستقيم
                                                        </p>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <img src="/assets/img/fall-3.png" class="img-fluid imgDemo"
                                                             alt="الوضعية: للأمام مباشرة" loading="lazy">
                                                    </div>
                                                    <div class="col-6">
                                                        <img src="/assets/img/fall-2.png" class="img-fluid imgDemo"
                                                             alt="الوضعية: للأمام مباشرة" loading="lazy">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 rowItem">
                                        <div class="row align-items-center">

                                            <div class="col-lg-8">
                                                <div class="demo-content">
                                                    <div class="bg-circle">
                                                        <span><i class="fi-rr-check"></i></span>
                                                    </div>
                                                    <span>
                                                        المسافة بين الجسم والكاميرا
                                                        <p>
                                                            ضع الجوال بعيداً عن وجهك لكي تستطيع اخذ المساحة الكاملة من
                                                            رأسك
                                                        </p>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <img src="/assets/img/fall-1.png" class="img-fluid imgDemo"
                                                     alt="المسافة بين الجسم والكاميرا" loading="lazy">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">فهمت</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore id="loader-modal" class="loader-modal">

        <!-- Place at bottom of page -->
        <b title="من فضلك الإنتظار" id="loader-modal-content">
            <img alt="loading" src="{{ asset('/logo/loading-new.gif') }}" width="20" />

            جاري التحميل
        </b>
    </div>

    <div wire:ignore id="loader-modal-pay" class="loader-modal-pay">

        <!-- Place at bottom of page -->
        <b title="من فضلك الإنتظار" id="loader-modal-content">
            <img alt="loading" src="{{ asset('/logo/loading-new.gif') }}" width="20" />
            جاري الدفع
        </b>
    </div>
</div>

@push('css')
    <link href="/assets/css/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link rel="stylesheet" href="/assets/css/spectrum.min.css">
    <link rel="stylesheet" href="/assets/css/steps.css?version=6.3">
    <link href="https://goSellJSLib.b-cdn.net/v1.4/css/gosell.css" rel="stylesheet" />
    <link href="/assets/css/cropper.css" rel="stylesheet">
@endpush

@push('js')
    <script src="/assets/js/select2.min.js"></script>
    <script src="/assets/js/jquery.easing.min.js"></script>
    <script src="/assets/js/spectrum.min.js"></script>
    <script src="/assets/js/axios.min.js"></script>

    <script type="text/javascript" src="/assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.ui.touch-punch.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@vladmandic/face-api@1/dist/face-api.js"></script>
    <!--<script src="https://unpkg.com/@vladmandic/face-api/dist/face-api.js"></script>-->
    {{-- New For Steps --}}
    <script src="/assets/js/jquery.validate.js"></script>

    <script src="/assets/js/jquery.steps.js"></script>

    <script src="/assets/js/steps.js?version=1.7"></script>

    <script type="text/javascript" src="https://goSellJSLib.b-cdn.net/v1.4/js/gosell.js"></script>

    <script type="text/javascript" src="/assets/js/cropper.js"></script>

    <script>
        $('select').on('change', function(e) {
        @this.set('card_id', e.target.value);
        });
    </script>

    <script>
        const image_input = document.querySelector("#image-input");
        const image_preview = document.querySelector("#display-image");
        const image_preview_description = document.querySelector("#image-preview-description");
        const display_image_editor = document.querySelector('#display-image-editor');
        const removeImageBtn = document.querySelector('.removeIcon');
        const face_js_preview = document.querySelector('#face-js-preview');
        const cropper_img = document.querySelector('#cropper-img');

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
                @if (!$visitedBefore)
                setTimeout(function() {
                    $('#requirmetnsStepsModal').modal('show');
                }, 100);
                @endif
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
                .post("/removebg/{{ $order->id }}", data, settings).then((res) => {

                if (res.data.cropperImage) {
                    loadCropper(res.data.imageUrl);
                }

                document.querySelectorAll('.processed-image').forEach(function(img) {
                    img.src = res.data.imageUrl;
                });

                setTimeout(() => {
                    $('.contentLoading').fadeOut(500);
                    enableButtons();
                }, 1500);

            }).catch((res) => {
                $('.contentLoading').fadeOut(500);

                disableButton();
                // enableButtons();
                // if (res.response.data.reload) {
                window.location.reload();
                // }
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
    {{-- <script>
        let camera_button = document.querySelector("#start-camera");
            let video = document.querySelector("#video");
            let click_button = document.querySelector("#click-photo");
            let canvas = document.querySelector("#canvas");

            camera_button.addEventListener('click', async function() {
                let stream = await navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: false
                });
                video.srcObject = stream;
            });

            click_button.addEventListener('click', function() {
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                let image_data_url = canvas.toDataURL('image/jpeg');

                // data url of the image
                console.log(image_data_url);
            });
    </script> --}}

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

    {{-- payment --}}
    <script>
        goSell.goSellElements({
            containerID: "root",
            gateway: {
                publicKey: "{{ config('app.keys.tap.pk') }}",
                language: "ar",
                contactInfo: true,
                supportedCurrencies: "all",
                supportedPaymentMethods: "all",
                saveCardOption: false,
                customerCards: true,
                notifications: 'validation-Messages',
                callback: (response) => {
                    $('#loader-modal-pay').addClass('bgDark').fadeIn(500);
                    if (response.error) {
                        $('#loader-modal-pay').removeClass('bgDark').fadeOut(500);
                        return swal({
                            type: 'error',
                            title: response.error.message
                        });
                    } else {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: "POST",
                            url: "{{ route('preper.charge.online', $order) }}",
                            data: {
                                'token': response.id
                            },
                            success: function(data) {
                                if (data.status === 1) {
                                    // $('#loader-modal').removeClass('bgDark').fadeOut(500);
                                    return window.location = data.message;
                                } else {
                                    $('#loader-modal-pay').removeClass('bgDark').fadeOut(500);
                                    console.log(data.message);
                                    return swal({
                                        type: 'error',
                                        title: data.message
                                    });
                                }
                            },
                            error: function(data) {
                                $('#loader-modal-pay').removeClass('bgDark').fadeOut(500);
                                return swal({
                                    type: 'warning',
                                    title: 'عذراً، حدث خلل غير متوقع أثناء عملية الدفع#',
                                });
                            },
                            complete: function() {
                                // $('#loader-modal').removeClass('bgDark').fadeOut(500);
                            }
                        });
                    }
                },
                backgroundImg: {
                    url: "{{ \URL::asset('matajer/img/matajerapp.png') }}",
                    opacity: '0.5'
                },
                labels: {
                    cardNumber: "رقم البطاقة",
                    expirationDate: "MM/YY",
                    cvv: "CVV",
                    cardHolder: "اسم صاحب البطاقة",
                    actionButton: "دفع"
                },
                style: {
                    base: {
                        color: '#535353',
                        lineHeight: '18px',
                        fontFamily: 'SST Arabic',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: 'rgba(0, 0, 0, 0.26)',
                            fontSize: '15px'
                        }
                    },
                    invalid: {
                        color: 'red',
                        iconColor: '#fa755a '
                    }
                }
            },
            order: {
                amount: "{{ settings('price') }}",
                currency: "SRA",
                shipping: null,
                taxes: null
            },
            transaction: {
                mode: 'charge',
                charge: {
                    saveCard: false,
                    threeDSecure: true,
                    metadata: {},
                    receipt: {
                        email: false,
                        sms: true
                    },
                    redirect: "{{ route('order.charge-redirect', $order->uuid) }}",
                    post: location.href,
                }
            }
        });
    </script>
    <script>
        function applePay() {
            $('#loader-modal-pay').addClass('bgDark').fadeIn(500);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('preper.charge.online', $order) }}",
                data: {
                    'token': 'src_apple_pay'
                },
                success: function(data) {
                    if (data.status === 1) {
                        // $('#loader-modal').removeClass('bgDark').fadeOut(500);
                        return window.location = data.message;
                    } else {
                        $('#loader-modal-pay').removeClass('bgDark').fadeOut(500);
                        return swal({
                            type: 'error',
                            title: data.message
                        });
                    }
                },
                error: function(data) {
                    $('#loader-modal-pay').removeClass('bgDark').fadeOut(500);
                    return swal({
                        type: 'warning',
                        title: 'عذراً، حدث خلل غير متوقع أثناء عملية الدفع#',
                    });
                },
                complete: function() {
                    // $('#loader-modal').removeClass('bgDark').fadeOut(500);
                }
            });
        }
    </script>
    <script>
        var payBtnLink = $(document).find(".actions a[href$='#finish']");
        payBtnLink.click(function() {
            $('#payNowButton').trigger('click');
        });
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
    {{-- <script>
        let camera_button = document.querySelector("#start-camera");
            let video = document.querySelector("#video");
            let click_button = document.querySelector("#click-photo");
            let canvas = document.querySelector("#canvas");
            camera_button.addEventListener('click', async function() {
                let stream = await navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: false
                });
                video.srcObject = stream;
            });
            click_button.addEventListener('click', function() {
                document.querySelector('.photoCapture').classList.add('hideBox');
                document.querySelector('.photoCapturePreview').classList.add('showBox');
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                let image_data_url = canvas.toDataURL('image/jpeg');
                image_preview.src = `${image_data_url}`;
                image_preview.classList.add('imageUploaded');
                // display_image_editor.src = `${image_data_url}`;
                image_preview.parentElement.classList.add('imageUploadedContainer');
                removebg(null, image_data_url, false);
                document.querySelector('.image-content').classList.remove('active');
                image_input.setAttribute('type', 'text');
                image_input.value = 'from camera';
                image_preview_description.textContent = '';
                document.querySelector('#face-error').textContent = '';
                $('.contentLoading').fadeOut(500);
            });

            document.querySelector('#closeCameraModal').addEventListener('click', function() {
                $('#openCameraModal').modal('hide');
            });

            document.querySelector('#repeat-photo').addEventListener('click', function() {
                document.querySelector('.photoCapture').classList.remove('hideBox');
                document.querySelector('.photoCapturePreview').classList.remove('showBox');
                document.querySelector('.photoCapturePreview').classList.add('hideBox');
            });
    </script> --}}

    {{-- handle steps --}}
    <script>
        let pageNumber = 1;

        const nextButton = $('a[href="#next"]');
        const previousButton = $('a[href="#previous"]');

        function enableButtons() {
            $('.picture-processing').fadeOut();
            $('.picture-completed').fadeIn(300);
            nextButton.removeClass("disabled-custom")._aria("disabled", "false");
            previousButton.removeClass("disabled-custom")._aria("disabled", "false");
        }

        function disableButton() {
            $('.picture-completed').fadeOut();
            $('.picture-processing').fadeIn(300);
            nextButton.addClass("disabled-custom")._aria("disabled", "true");
            previousButton.addClass("disabled-custom")._aria("disabled", "true");
        }

        nextButton.on('click', function() {
            pageNumber = pageNumber + 1;

            if (pageNumber == 2) {
                if (!$('.typeSelect').val()) {
                    pageNumber = pageNumber - 1
                    return;
                }
            }

            if (pageNumber == 3) {

                if (!$('#image-input').val()) {
                    pageNumber = pageNumber - 1
                    return;
                }

                document.querySelector('#final-processed-image').src = '';
                $('.picture-completed').hide();
                setTimeout(() => {
                    //    introJs().start();
                    function startIntro(){
                        var intro = introJs();
                        intro.setOptions({
                            nextLabel:"التالي",
                            prevLabel:"السابق",
                            doneLabel:"فهمت",
                            skipLabel:"<i class='fi-rr-cross-small'></i>",
                            hidePrev:true,
                            exitOnOverlayClick:true,
                            dontShowAgain:false,
                            dontShowAgainLabel:"لا تعرض هذا مرة اخري"
                        });
                        intro.start();
                    }

                    startIntro();

                }, 500);

            }

            if (pageNumber == 4) {
                const bar = document.querySelector('.progress-done');
                bar.setAttribute('data-done', 0);
                bar.textContent = `${0}%`
                bar.style.width = bar.getAttribute('data-done') + '%';

                disableButton();
                setTimeout(() => {
                    var croppedimage = cropper.getCroppedCanvas().toDataURL("image/png");
                    removebg(selectedColor, croppedimage, true);
                }, 300);
            }
        });


        previousButton.on('click', function() {
            pageNumber = pageNumber - 1;
        });
    </script>
@endpush
@section('title', $title)
