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
  $.each([ 'bangkok', 'center' , 'east' ,'north-east' , 'south', 'west', 'north' ], function( index, value ) {
    $.get( "/store/"+value, function( data ) {
      $( ".map-"+value ).append( data );
      $( ".map-"+value ).css( 'display','inline-block' );
    });
  });
}

loadContent();
