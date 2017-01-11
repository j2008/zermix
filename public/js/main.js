$(document).ready(function(){
  $('.mobile-menu').on('click',function(){
    document.getElementById('slider').classList.toggle('closed');
    /*
    if( $('.mobile-list').css('display') == 'none' ) {
      $('.mobile-list').css('display','block');
    }
    else $('.mobile-list').css('display','none');
    */
  })
})
