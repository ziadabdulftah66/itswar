$(function () {
  "use strict";

  $(window).scroll(function () {
    if ($(window).scrollTop() >= 50) {
      $(".main-header").addClass("fixed-header");
    } else {
      $(".main-header").removeClass("fixed-header");
    }
  });

  /* Toggle Navbar Menu - Small Screen */

  var clicked = false;
  var $header = $(".main-header"),
    $mobileMenu = $("#m-menu");
  $header.find(".toggle-nav").click(function () {
    var $this = $(this);
    $this.toggleClass("active");
    if (!clicked) {
      clicked = true;
      $mobileMenu.toggleClass("active");
      setTimeout(function () {
        clicked = false;
      });
    }
  });

  var clicked = false;
  var $mobileMenuu = $("#m-menu");
  $mobileMenuu.find(".toggle-nav").click(function () {
    var $this = $(this);
    $this.addClass("active");
    if (!clicked) {
      clicked = true;
      $mobileMenuu.toggleClass("active");
      setTimeout(function () {
        clicked = false;
      });
    }
  });

  $("#m-menu .nav-items li a").on("click", function () {
    $("#m-menu").removeClass("active");
  });

  // Steps Form

  // var current_fs, next_fs, previous_fs, input_fs, select_fs;
  // var left, opacity, scale;
  // var animating;


  // $(".next").click(function () {

  //   select_fs = $('select').find(':selected').val();

  //   if (!select_fs) {
  //     alert('الرجاء الإختيار من القائمة');
  //     return;
  //   }


  //   if (animating) return false;
  //   animating = true;

  //   current_fs = $(this).closest('fieldset');
  //   next_fs = $(this).closest('fieldset').next();

  //   $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  //   next_fs.show();
  //   current_fs.animate(
  //     { opacity: 0 },
  //     {
  //       step: function (now, mx) {
  //         scale = 1 - (1 - now) * 0.2;
  //         left = now * 50 + "%";
  //         opacity = 1 - now;
  //         current_fs.css({
  //           transform: "",
  //           position: "relative",
  //           width: "100%"
  //         });
  //         next_fs.css({ left: left, opacity: opacity });
  //       },
  //       duration: 600,
  //       complete: function () {
  //         current_fs.hide();
  //         animating = false;
  //       },
  //       easing: "easeInOutBack"
  //     }
  //   );
  // });

  // $(".previous").click(function () {
  //   if (animating) return false;
  //   animating = true;

  //   current_fs = $(this).closest('fieldset');
  //   previous_fs = $(this).closest('fieldset').prev();
  //   $("#progressbar li")
  //     .eq($("fieldset").index(current_fs))
  //     .removeClass("active");

  //   previous_fs.show();
  //   current_fs.animate(
  //     { opacity: 0 },
  //     {
  //       step: function (now, mx) {
  //         scale = 0.8 + (1 - now) * 0.2;
  //         left = (1 - now) * 50 + "%";
  //         opacity = 1 - now;
  //         current_fs.css({ left: left });
  //         previous_fs.css({
  //           position: "relative",
  //           width: "100%",
  //           opacity: opacity
  //         });
  //       },
  //       duration: 600,
  //       complete: function () {
  //         current_fs.hide();
  //         animating = false;
  //       },
  //       easing: "easeInOutBack"
  //     }
  //   );
  // });

  // $(".submit").click(function () {
  //   return false;
  // });


  // $('select').niceSelect();

  // $(".dropify").dropify({
  //   messages: {
  //     default: "التقط صورة من الكاميرا او ارفعها من جهازك"
  //     , replace: "اسحب واسقط الملف هنا للاستبدال"
  //     , remove: "حذف"
  //     , error: "حدث خطأ"
  //   }
  //   , error: {
  //     fileSize: "حجم الملف اكبر من 10 M"
  //   }
  // });




});


// Dark Mode

const buttonDarkLightMode = document.querySelector(".toggle-theme");
const btnMob = document.querySelector(".toggle-theme-mob");

var btnIcon = document.querySelector(".toggle-theme i");
var btnIconMob = document.querySelector(".toggle-theme-mob i");
var logoImage = document.querySelectorAll(".logo-image");
const currentTheme = localStorage.getItem("theme");
if (currentTheme == "dark") {
  document.body.classList.add("dark-theme");
  buttonDarkLightMode.classList.add('dark-btn');
  btnIcon.classList.toggle("fi-rr-opacity");

  btnMob.classList.add('dark-btn');
  btnIconMob.classList.toggle("fi-rr-opacity");
}

buttonDarkLightMode.addEventListener("click", function () {
  document.body.classList.toggle("dark-theme");
  buttonDarkLightMode.classList.toggle('dark-btn');
  btnIcon.classList.toggle("fi-rr-opacity");

  let theme = "light";
  if (document.body.classList.contains("dark-theme")) {
    theme = "dark";

  }
  localStorage.setItem("theme", theme);
});

btnMob.addEventListener("click", function () {
  document.body.classList.toggle("dark-theme");
  btnMob.classList.toggle('dark-btn');
  btnIconMob.classList.toggle("fi-rr-opacity");

  let theme = "light";
  if (document.body.classList.contains("dark-theme")) {
    theme = "dark";
  }
  
  localStorage.setItem("theme", theme);
});

// const sr = ScrollReveal({
//     origin:'top',
//     distance:'30px',
//     duration: 1500,
//     delay: 300,
//     reset: false
// })

// sr.reveal('.home_contnet');
// sr.reveal('.section_title');
// sr.reveal('.work-steps', {delay: 300,origin: 'bottom'});
// sr.reveal('.shoot-example', {delay: 300,origin: 'left'});
// sr.reveal('.doc-example-item', {delay: 300,origin: 'bottom'});
// sr.reveal('.next-matches .swiper-container, .players .swiper-container,.ittihad-youtube .swiper-container, .ittihad-store .swiper-container, .old-players .swiper-container, .partners .swiper-container', {delay: 500});
// sr.reveal('.footer', {delay: 500});
// sr.reveal('.app-screen', {origin: 'left'});
// sr.reveal('.shoot-instructions', {origin: 'right'});

// sr.reveal('.club-awards .awards-wrapper', {origin: 'bottom', delay: 500});

function isInputNumber(evt, value) {

  var ch = String.fromCharCode(evt.which);

  if (!(/[0-9]/.test(ch))) {
    evt.preventDefault();
  }
}