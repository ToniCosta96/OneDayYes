
/*Reserva Display*/

/*Turista*/
$(document).ready(function(){
   $('#mostrarTurista').on('click',function(){
     $("#mostrarVoluntario").removeClass("active");
     $("#mostrarTurista").addClass("active");
     $('#voluntario').hide();
    $('#turista').show();
   });
});

/*Voluntario*/
$(document).ready(function(){
   $('#mostrarVoluntario').on('click',function(){
      $('#voluntario').removeClass("dontshow");
      $("#mostrarTurista").removeClass("active");
      $("#mostrarVoluntario").addClass("active");
      $('#turista').hide();
      $('#voluntario').show();
   });

});


/*Seleccionar actividad*/
$(document).ready(function(){
   $('.safari').on('click',function(){
      $(".safari").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.buceo').on('click',function(){
      $(".buceo").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.escalada').on('click',function(){
      $(".escalada").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.cascada').on('click',function(){
      $(".cascada").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.museo').on('click',function(){
      $(".museo").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.rafting').on('click',function(){
      $(".rafting").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.golf').on('click',function(){
      $(".golf").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.barca').on('click',function(){
      $(".barca").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.basura').on('click',function(){
      $(".basura").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.campo').on('click',function(){
      $(".campo").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.colegio').on('click',function(){
      $(".colegio").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.ganado').on('click',function(){
      $(".ganado").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.nadar').on('click',function(){
      $(".nadar").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.cocina').on('click',function(){
      $(".cocina").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.guia').on('click',function(){
      $(".guia").toggleClass("seleccionado");
   });
});

$(document).ready(function(){
   $('.construccion').on('click',function(){
      $(".construccion").toggleClass("seleccionado");
   });
});







/*Slider Reservas*/
$('.responsive').slick({
  dots: true,
	prevArrow: $('.prev'),
	nextArrow: $('.next'),
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

/*Slider Reservas*/
$('.responsive1').slick({
  dots: true,
	prevArrow: $('.prev1'),
	nextArrow: $('.next1'),
  infinite: false,
  autoplay: true,
  autoplaySpeed: 100,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: false

      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        autoplay: false
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false
      }
    }
  ]
});

$(document).ready(function(){
$('#mostrarVoluntario').click(function() {
	$('.slider').slick('slickPause');
  });
});
