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
          $current = $(":contains('"+$(".keyword").val()+"'):not(:has(*)):eq(0)").closest("p");
          $('html,body').animate({scrollTop:$current.offset().top-30}, 500);
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
          var $prev = $(":contains('"+$(".keyword").val()+"'):not(:has(*)):eq(0)").closest("p").prev("p");
          var $next = $(":contains('"+$(".keyword").val()+"'):not(:has(*)):eq(0)").closest("p").next("p");
          console.log("prev : "+$prev.children().length+" strong : "+$prev.children('strong').length);
          console.log("next : "+$next.children().length+" strong : "+$next.children('strong').length);

          if(!$current.children('strong').length > 0){
            if($prev.children().length > 1 && $prev.children('strong').length > 0){
              $prev.addClass( "hightlight" );
            }
            if($next.children().length > 1 && $next.children('strong').length > 0){
              $next.addClass( "hightlight" );
            }
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

  var _originalSize = $(window).height()
  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $(window).resize(function(){
      if(_originalSize - $(window).height() > _originalSize*0.25 ){
        console.log("keyboard show up");
        $(".search-bar").addClass("keyboard");
      }else{
        console.log("keyboard closed");
        $(".search-bar").removeClass("keyboard");
      }
    });
  }
})

function find(direction){
  if($(".keyword").val() != "" && max_n != 0){
    if(direction == "next" && n < max_n-1) n++;
    else if(direction == "prev" && n > 0) n--;
    try {
        $current = $(":contains('"+$(".keyword").val()+"'):not(:has(*)):eq("+n+")").closest("p");
        $('html,body').animate({scrollTop:$current.offset().top-30}, 500);
        $(":contains('"+$(".keyword").val()+"'):not(:has(*)):eq("+n+")").addClass( "hightlight" );
        $(".current_n").html(n+1);
        console.log(n);
        var $prev = $(":contains('"+$(".keyword").val()+"'):not(:has(*)):eq("+n+")").closest("p").prev("p");
        var $next = $(":contains('"+$(".keyword").val()+"'):not(:has(*)):eq("+n+")").closest("p").next("p");
        console.log("prev : "+$prev.children().length+" strong : "+$prev.children('strong').length);
        console.log("next : "+$next.children().length+" strong : "+$next.children('strong').length);
        console.log("prev : "+$prev.html());
        console.log("next : "+$next.html());
        console.log("current : "+$current.children('strong').length)

        if(!$current.children('strong').length > 0){
          if($prev.children().length > 1 && $prev.children('strong').length > 0){
            $prev.addClass( "hightlight" );
          }
          if($next.children().length > 1 && $next.children('strong').length > 0){
            $next.addClass( "hightlight" );
          }
        }
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
