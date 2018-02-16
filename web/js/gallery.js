


filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}


function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}



$(document).ready(function(){
   $('.todo').on('click',function(){
      $(".habitat1").removeClass("activo1");
      $(".vida1").removeClass("activo1");
      $(".habitaciones1").removeClass("activo1");
      $(".todo").addClass("activo1");
   });
});

$(document).ready(function(){
   $('.habitat1').on('click',function(){
      $(".todo").removeClass("activo1");
      $(".vida1").removeClass("activo1");
      $(".habitaciones1").removeClass("activo1");
      $(".habitat1").addClass("activo1");
   });
});

$(document).ready(function(){
   $('.vida1').on('click',function(){
      $(".habitat1").removeClass("activo1");
      $(".todo").removeClass("activo1");
      $(".habitaciones1").removeClass("activo1");
      $(".vida1").addClass("activo1");
   });
});

$(document).ready(function(){
   $('.habitaciones1').on('click',function(){
      $(".habitat1").removeClass("activo1");
      $(".vida1").removeClass("activo1");
      $(".todo").removeClass("activo1");
      $(".habitaciones1").addClass("activo1");
   });
});
