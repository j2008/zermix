window.fbAsyncInit = function() {
  FB.init({
    appId      : '1868948223390373',
    xfbml      : true,
    version    : 'v2.8'
  });
  FB.AppEvents.logPageView();
};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));

$(document).ready(function(){
  $('.type-choice li').on('click',function(){
    var class_name = $(this).attr("class").substring(0,$(this).attr("class").length-5);
    //var class_name = $(this).html().substring(3, $(this).html().length - 4).toLowerCase();
    console.log(class_name);
    $('.selected-type').html('<p><b>'+class_name+' news</b></p>');
    $( ".lists" ).css('display','none');
    $('.'+class_name+"-content").fadeIn(500);
  });

  var url = "https://graph.facebook.com/?id="+document.location.href;
  $.getJSON(url, function(data) {
    if (typeof data['share'] !== 'undefined' && data['share']['share_count'] > 0) {
      share_num = data['share']['share_count'];
      $('.share_num').html(share_num);
    }
    else {
      $('.share_num').html(0);
    }
  });

  document.getElementById('shareBtn').onclick = function() {
    FB.ui({
      method: 'share',
      display: 'popup',
      href: document.location.href,
    }, function(response){});
  }
})

function focusImg (link){
  $('.main_img').attr('src',link);
}

jssor_1_slider_init = function() {

    var jssor_1_SlideoTransitions = [
      [{b:0,d:600,x:800,e:{x:27}}],
      [{b:200,d:600,x:800,e:{x:27}}],
      [{b:0,d:600,x:800,e:{x:27}}]
    ];

    var jssor_1_options = {
      $AutoPlay: true,
      $Idle: 4000,
      $CaptionSliderOptions: {
        $Class: $JssorCaptionSlideo$,
        $Transitions: jssor_1_SlideoTransitions,
        $Breaks: [
          [{d:2000,b:1000}]
        ]
      },
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$
      }
    };

    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

    /*responsive code begin*/
    /*you can remove responsive code if you don't want the slider scales while window resizing*/
    function ScaleSlider() {
        var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
        if (refSize) {
            refSize = Math.min(refSize, 800);
            jssor_1_slider.$ScaleWidth(refSize);
        }
        else {
            window.setTimeout(ScaleSlider, 30);
        }
    }
    ScaleSlider();
    $Jssor$.$AddEvent(window, "load", ScaleSlider);
    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
    /*responsive code end*/
};
