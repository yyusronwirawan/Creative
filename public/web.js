$(function() {

	$('.menu').click(function(event) {

      $('body').addClass('no-scroll');

      $('.overlay').addClass('active');

      $('.slide-menu').addClass('active');

  });



  $('.box-close').click(function(event) {

      $('body').removeClass('no-scroll');

      $('.overlay').removeClass('active');

      $('.slide-menu').removeClass('active');

  });



  $("html").click(function(a) {

      if (!$(a.target).parents().is(".menu") && !$(a.target).is(".slide-menu") && !$(a.target).parents().is(".slide-menu")) {

          $('body').removeClass('no-scroll');

          $('.overlay').removeClass('active');

          $('.slide-menu').removeClass('active');

      }

  });



  $('.fixed-top a').click(function() {

    $('html, body').animate({scrollTop: 0}, 500);

  });



  $(window).scroll(function() {

      var a = $(window).scrollTop();

      if (a >= 10) {

          $('header').addClass('scroll');

          $('body').addClass('scroll');

      } else {

          $('header').removeClass('scroll');

          $('body').removeClass('scroll');

      }

  });



  $('.click-hubungi').click(function(event) {

      $('html,body').animate({

          scrollTop: $('#hubungi').offset().top -60

      },'slow');

  });



  $('.click-desain').click(function(event) {

      $('html,body').animate({

          scrollTop: $('#desain').offset().top -60

      },'slow');

  });



  var config = {

      reset: true,

      // mobile: false,

  }

  window.sr = ScrollReveal(config);



  for (var index = 1; index < 11; index++) {

    // fade in up

    sr.reveal('.sr-up-td' + index, {

        delay: 400 * index,

        scale: 1,

        duration: 1000,

        distance: '100px',

    });

    // fade in down

    sr.reveal('.sr-down-td' + index, {

        delay: 100 * index,

        scale: 1,

        distance: '-40px',

    });

    // fade in left

    sr.reveal('.sr-left-td' + index, {

        delay: 400 * index,

        scale: 1,

        origin: 'left',

        distance: '100px',

        duration: 1000,

    });

    // fade in right

    sr.reveal('.sr-right-td' + index, {

        delay: 400 * index,

        scale: 1,

        origin: 'right',

        distance: '100px',

        duration: 1000,

    });

  }



  $('nav a').on('click', function() {

      var scrollAnchor = $(this).attr('data-scroll'),

          scrollPoint = $('section[data-anchor="' + scrollAnchor + '"]').offset().top - 28;

      $('body,html').animate({

          scrollTop: scrollPoint

      }, 500);

      $('body').removeClass('no-scroll');

      $('.overlay').removeClass('active');

      $('.slide-menu').removeClass('active');

      return false;

  });





  $(window).scroll(function() {

      var windscroll = $(window).scrollTop();

      if (windscroll >= 1) {

          $('#main section').each(function(i) {

              if ($(this).position().top <= windscroll + 40) {

                  $('nav a.active').removeClass('active');

                  $('nav a').eq(i).addClass('active');

              }

          });



      } else {

          $('nav a.active').removeClass('active');

          $('nav a:first').addClass('active');

      }



  }).scroll();



});