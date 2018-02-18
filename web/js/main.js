
/*Reserva Display*/

/*Turista*/
$(document).ready(function(){
   $('#mostrarTurista').on('click',function(){
     $('#turista').show();
     $("#mostrarVoluntario").removeClass("active");
     $("#mostrarTurista").addClass("active");
     $('#voluntario').hide();
     $("#principalbundle_reserva_tipo").val("turista");
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
      $("#principalbundle_reserva_tipo").val("voluntario");
   });

});


/*Seleccionar actividad*/
$(document).ready(function(){
   $('.safari').on('click',function(){
      $(".safari").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.buceo').on('click',function(){
      $(".buceo").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.escalada').on('click',function(){
      $(".escalada").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.cascada').on('click',function(){
      $(".cascada").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.museo').on('click',function(){
      $(".museo").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.rafting').on('click',function(){
      $(".rafting").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.golf').on('click',function(){
      $(".golf").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.barca').on('click',function(){
      $(".barca").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.basura').on('click',function(){
      $(".basura").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.campo').on('click',function(){
      $(".campo").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.colegio').on('click',function(){
      $(".colegio").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.ganado').on('click',function(){
      $(".ganado").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.nadar').on('click',function(){
      $(".nadar").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.cocina').on('click',function(){
      $(".cocina").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.guia').on('click',function(){
      $(".guia").toggleClass("seleccionado");
      rellenarActividades();
   });
});

$(document).ready(function(){
   $('.construccion').on('click',function(){
      $(".construccion").toggleClass("seleccionado");
      rellenarActividades();
   });
});

/*Rellenar actividades en un input invisible del formulario*/
function rellenarActividades(){
  var actividades = "";
  var filas = $(".slick-track").children();
  for(let i=0;i<filas.length;i++){
    if(filas.eq(i).hasClass("seleccionado")){
      for(let j=0;j<filas.eq(i).children().length;j++){
        if(filas.eq(i).children().eq(j).prop("tagName")=="DIV"){
          actividades += filas.eq(i).children().eq(j).html().replace(/\s/g, '')+", ";
        }
      }
    }
  }
  $("#principalbundle_reserva_actividades").val(actividades);
};




/*Slider Reservas*/
$('.responsive').slick({
  dots: true,
	prevArrow: false,
	nextArrow: false,
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
	prevArrow: false,
	nextArrow: false,
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
