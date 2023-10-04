var form = $("#multistepsform");
form.validate({
    // errorPlacement: function errorPlacement(error, element) { element.before(error); },
    ignore: [],
    rules: {
        type_doc: {
            required: true,
        },
        image: {
            required: true,
        },
    },
    messages: {
        type_doc: {
            required: "هذا الحقل مطلوب",
        },
        image: {
            required: "يجب إرفاق صورة",
        },
    },
    errorPlacement: function (error, element) {
        if (element.attr("name") == "type_doc") {
            //     $("#mySelect2-error").text(error);
            // error.appendTo( element.parent("div").next() );
            error.insertAfter(element.parent().find(".select2"));
        } else {
            error.insertAfter(element);
        }
    },
    // rules: {
    //     confirm: {
    //         equalTo: "#password"
    //     }
    // }
});

// $('#typeSelect').on('change', function() {
//     $(this).valid();
// })

// Activate NiceSelect (Validate doesn't work)

form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex) {
        if (currentIndex > newIndex) {
            return true;
        } else {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        }
    },
    onFinishing: function (event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex) {
        // alert("Submitted!");
    },
    labels: {
        cancel: "الغاء",
        current: "الخطوة الحالية :",
        pagination: "Pagination",
        finish: "ادفع الآن",
        next: "التالي",
        previous: "السابق",
        loading: "تحميل ...",
    },
});


// $("select").on("select2:close", function (e) {  
//     $(this).valid(); 
// });

  
// Custom Select Box

$(function () {
    $(".typeSelect").select2({
        placeholder: "اختر من القائمة",
        minimumResultsForSearch: -1,
        language: {
            noResults: function () {
                return "لا توجد نتائح";
            },
        },
        escapeMarkup: function (markup) {
            return markup;
        },
    });
});

$('select').select2({}).on("change", function (e) {
    $(this).valid()
});


$("#image-input").on("change", function (e) {
    $(this).valid();
});



$(function() {
    $('#image-dropdown-wrapper').on('click', function() {
        $(this).addClass('active');
    });
})
