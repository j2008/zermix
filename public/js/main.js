
$(document).ready(function(){
	$('.mobile-menu').on('click',function(){
		document.getElementById('slider').classList.toggle('closed');
	})

	/*

  	//get lastest setting from cookie
	if ( getCookie("color_mode") == 1 ) {
	  $("#color-switch").prop('checked', true);
	}
	else{
	  $("#color-switch").prop('checked', false);
	}

	//first time apply
	setTimeout(function(){
	  if ($("#color-switch").is(":checked")) {
	    $("html").css("filter","none");
	  } else {
	    $("html").css("filter","grayscale(80%)"); 
	  }
	  if(location.pathname == "/store"){
		$("html").css("filter","none");
		$("#color-switch").prop('checked', true);
	  }
	},200);

	//change mode
	$("#color-switch").on('change', function () {
	  var self = $(this);
	  if (self.is(":checked")) {
	    $("html").css("filter","none");
	    setCookie("color_mode","1",30)
	  } else {
	    $("html").css("filter","grayscale(80%)");
	    setCookie("color_mode","0",30) 
	  }
	});

	//first time check popup
	if(getCookie("popup") != "1" && location.pathname != "/store"){
		$('.popup').fadeIn();
		$('.overlay').fadeIn();
	}

	$('.overlay,.close-popup').on('click',function(){
		$('.popup').fadeOut();
		$('.overlay').fadeOut();
		setCookie("popup","1",365)
	})

	//firefox bug fix
	if (navigator.userAgent.search("Firefox") > -1) {
		var pix_height = $(window).height()/2;
		$('.popup').css("top",pix_height+"px");
	}

	*/
})

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
