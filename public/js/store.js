var n = 0;

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
  $("body").on("input",".keyword",function(){
    n = 0;
    $(".keyword").css("background-color","white");
    try {
        $('html,body').animate({scrollTop:$(":contains('"+$(".keyword").val()+"'):not(:has(*)):eq(0)").offset().top-10}, 500);
    }
    catch(err) {
        $(".keyword").css("background-color","#f1d5d5");
    }
  })
})

function next_find(){
  n++;
  console.log("555");
  try {
      $('html,body').animate({scrollTop:$("td:contains('"+$(".keyword").val()+"'):not(:has(*)):eq("+n+")").offset().top-10}, 500);
  }
  catch(err) {
      $(".keyword").css("background-color","#f1d5d5");
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

loadContent();
