$(document).ready(function(){
  $('.produce-list li').on('click',function(){
    $('.produce-list li').removeClass("active");
    var class_name = $(this).html().substring(3, $(this).html().length - 4).toLowerCase();
    console.log(class_name);
    $(this).addClass("active");
    $('.produce').css('display','none');
    $('.'+class_name+"-produce").css('display','block');
  })
})
