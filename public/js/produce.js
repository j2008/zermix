$(document).ready(function(){
  $(".fancybox").fancybox();
  $('.produce-list li').on('click',function(){
    $('.produce-list li').removeClass("active");
    var class_name = $(this).attr("class").substring(0,$(this).attr("class").length-7);
    //var class_name = $(this).html().substring(3, $(this).html().length - 4).toLowerCase();
    console.log(class_name);
    $(this).addClass("active");
    $('.produce').css('display','none');
    $( ".produce-detail" ).html('');
    $('.'+class_name+"-produce").fadeIn(500);
  })
})

function loadDetail(id) {
  $( ".produce-detail" ).html('<img class="loading" src="img/loading.gif" >');
  $( ".produce-detail" ).css( 'display','block' );
  $.get( "/produce/"+id, function( data ) {
    $( ".produce-detail" ).html( data );
    $( ".produce-detail" ).css( 'display','block' );
    $('html,body').animate({scrollTop:$( ".produce-detail" ).offset().top-10}, 1000);
  });
}

$('.fancybox').fancybox({
  helpers: {
    overlay: {
      locked: false
    }
  }
});
