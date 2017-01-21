$(document).ready(function(){
  $(".fancybox").fancybox();
  $('.product-list li').on('click',function(){
    $('.product-list li').removeClass("active");
    var class_name = $(this).attr("class").substring(0,$(this).attr("class").length-7);
    //var class_name = $(this).html().substring(3, $(this).html().length - 4).toLowerCase();
    console.log(class_name);
    $(this).addClass("active");
    $('.product').css('display','none');
    $( ".product-detail" ).html('');
    $( ".product-detail" ).css('display','none');
    $('.'+class_name+"-product").fadeIn(500);
  })
})

function loadDetail(id) {
  $( ".product-detail" ).html('<img class="loading" src="img/loading.gif" >');
  $( ".product-detail" ).css( 'display','block' );
  $.get( "/product/"+id, function( data ) {
    $( ".product-detail" ).html( data );
    $( ".product-detail" ).css( 'display','block' );
    $('html,body').animate({scrollTop:$( ".product-detail" ).offset().top-10}, 1000);
  });
}

$('.fancybox').fancybox({
  helpers: {
    overlay: {
      locked: false
    }
  }
});
