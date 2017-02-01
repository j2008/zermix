$(document).ready(function(){
  $('.type-choice li').on('click',function(){
    var class_name = $(this).attr("class").substring(0,$(this).attr("class").length-5);
    //var class_name = $(this).html().substring(3, $(this).html().length - 4).toLowerCase();
    console.log(class_name);
    $('.selected-type').html('<p><b>'+class_name+' news</b></p>');
    $( ".lists" ).css('display','none');
    $('.'+class_name+"-content").fadeIn(500);
  })
})


jssor_1_slider_init = function() {

    var jssor_1_SlideoTransitions = [
      [{b:0,d:600,x:800,e:{x:27}}],
      [{b:200,d:600,x:780,e:{x:27}}],
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
