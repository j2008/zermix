$(document).ready(function(){

})

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

function loadContent() {
  $.each([ 'bangkok', 'east' , 'south', 'center' , 'north', 'north-east' , 'west' ], function( index, value ) {
    $.get( "/store/"+value, function( data ) {
      $( ".map" ).append( "<div class='store-detail'>"+data+"</div>" );
      $( ".store-detail" ).css( 'display','inline-block' );
    });
  });
}

loadContent();
