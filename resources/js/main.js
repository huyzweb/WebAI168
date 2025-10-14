/* ======================================
   VN168 / AI168 - MAIN.JS
   Hiệu ứng cuộn, counter, carousel, menu
====================================== */

(function ($) {
  "use strict";

  // ===== WOW Animation Init =====
  new WOW().init();

  // ===== Spinner (Loading) =====
  var spinner = function () {
    setTimeout(function () {
      if ($('#spinner').length > 0) {
        $('#spinner').removeClass('show');
      }
    }, 1);
  };
  spinner();

  // ===== Sticky Navbar =====
  $(window).scroll(function () {
    if ($(this).scrollTop() > 45) {
      $('.navbar').addClass('sticky-top shadow-sm');
    } else {
      $('.navbar').removeClass('sticky-top shadow-sm');
    }
  });

  // ===== Back to Top Button =====
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function () {
    $('html, body').animate({ scrollTop: 0 }, 600, 'easeInOutExpo');
    return false;
  });

  // ===== Counter Up Animation =====
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 1200
  });

  // ===== Owl Carousel (Testimonials) =====
  $(".testimonial-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 900,
    margin: 25,
    dots: true,
    loop: true,
    center: true,
    responsive: {
      0: { items: 1 },
      768: { items: 2 },
      992: { items: 3 }
    }
  });

  // ===== Smooth Scroll for Nav =====
  $(".navbar-nav a").on("click", function (event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $("html, body").animate({
        scrollTop: $(hash).offset().top - 50
      }, 800, "easeInOutExpo");
    }
  });

})(jQuery);
