var n = 0;
var max_n = 0;

$(document).ready(function(){
  $("body").on("click",".close-button",function(){
    $('.finding').fadeOut(500);
  })
  $("body").on("click",".background",function(){
    $('.finding').fadeOut(500);
  })
  $("body").on("click",".open-button",function(){
    $('.finding').fadeIn(500);
  })
  $("body").on("keyup",".keyword",throttle(function(e){
    var key = e.which;
    if(key != 13){
      n = 0;
      $(".keyword").css("background-color","white");
      $(".hightlight").removeClass( "hightlight" );
      try {
          $('html,body').animate({scrollTop:$(":contains('"+$(".keyword").val()+"'):not(:has(*)):eq(0)").offset().top-20}, 500);
          $(":contains('"+$(".keyword").val()+"'):not(:has(*)):eq(0)").addClass( "hightlight" );
          max_n = $(":contains('"+$(".keyword").val()+"'):not(:has(*))").length
          if($(".keyword").val() == "") {
            $(".current_n").html(0);
            $(".total_n").html(0);
          }
          else{
            $(".current_n").html(n+1);
            $(".total_n").html(max_n);
          }
      }
      catch(err) {
          $(".keyword").css("background-color","#f1d5d5");
          max_n = 0;
          console.log(err);
      }
    }
  }))
  $("body").on("keypress",".keyword",function(e){
    var key = e.which;
    if(key == 13){
      find("next");
    }
  })
})

function find(direction){
  if($(".keyword").val() != "" && max_n != 0){
    if(direction == "next" && n < max_n-1) n++;
    else if(direction == "prev" && n > 0) n--;
    try {
        $('html,body').animate({scrollTop:$(":contains('"+$(".keyword").val()+"'):not(:has(*)):eq("+n+")").offset().top-20}, 500);
        $(":contains('"+$(".keyword").val()+"'):not(:has(*)):eq("+n+")").addClass( "hightlight" );
        $(".current_n").html(n+1);
        console.log(n);
    }
    catch(err) {
        $(".keyword").css("background-color","#f1d5d5");
        console.log(err);
    }
  }
}

var first = true;

function openMap(id) {
  if (first) {
    $( ".map img" ).addClass( "slide-out" );
    first = false;
  }
  $( ".map img" ).attr('src','img/map-'+id+".png");
  $( ".store-detail" ).css( 'display','inline-block' );
  $( ".store-detail" ).html('<img class="loading" src="img/loading.gif" >');
  $.get( "/store/"+id, function( data ) {
    $( ".store-detail" ).html( data );
    $( ".store-detail" ).css( 'display','inline-block' );
    $('html,body').animate({scrollTop:$( ".store-detail" ).offset().top-10}, 500);
  });
}

function region_select(id) {
  $('html,body').animate({scrollTop:$( ".map-"+id ).offset().top-10}, 500);
}

function loadContent() {
  $.each([ 'bangkok', 'center' , 'east' ,'north-east' , 'south', 'west', 'north' ], function( index, value ) {
    $.get( "/store/"+value, function( data ) {
      $( ".map-"+value ).append( data );
      $( ".map-"+value ).css( 'display','inline-block' );
    });
  });
}

function throttle(f, delay){
    var timer = null;
    return function(){
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = window.setTimeout(function(){
            f.apply(context, args);
        },
        delay || 500);
    };
}

loadContent();
