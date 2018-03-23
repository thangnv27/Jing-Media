(function ($) {
$(window).load(function () {
    $('body').find(".nav").css('pointer-events', 'auto');  
    blogimageanimation();   
});

$(window).resize(function () {
    blogimageanimation();
});

function blogimageanimation() {
    var blogimg = $('body').find(".blogimage");
     
    blogimg.each(function () {
        var blogimgheight = $(this).find("img").height();
        var blogimgwidth = $(this).find("img").width();
 
        $(this).find(".mask").css('border-width', blogimgheight / 2);
        $(this).find(".mask").css('width', blogimgwidth); 
        $(this).find(".mask").css('height', blogimgheight);
   });
    
    var lblog = $('body').find(".leftcontainer").height();
    var xblog = $('body').find(".leftcontainer").width();
    var llblog = $('body').find(".rightcontainer").height();
    var xxblog = $('body').find(".rightcontainer").width();
    
    $(".featuredimage").css('height', lblog + 60);
    $(".featuredimage").css('width', xblog + 60);
    $(".featuredimage2").css('height', llblog + 60);
    $(".featuredimage2").css('width', xxblog + 60);
}

/* MAIN MENU */
var ww = document.body.clientWidth;

$(document).ready(function() {
  "use strict";
	$('body').find(".nav li a").each(function() {
		if ($(this).next().length > 0) {
			$(this).addClass("parent");
		}
	});
	
	$('body').find(".toggleMenu").click(function(e) {
		e.preventDefault();
		$(this).toggleClass("active");
		$('body').find(".nav").toggle();
	});
    adjustMenu();
});

$(window).bind('resize orientationchange', function() {
  "use strict";
	ww = document.body.clientWidth;
	adjustMenu();
});

var adjustMenu = function() {
  "use strict";
	if (ww < 900) {
		$('body').find(".toggleMenu").css("display", "inline-block");
		if (!$('body').find(".toggleMenu").hasClass("active")) {
			$('body').find(".nav").hide();
		} else {
			$('body').find(".nav").show();
		}
		$('body').find(".nav li").unbind('mouseenter mouseleave');
		$('body').find(".nav li a.parent").unbind('click').bind('click', function(e) {
			e.preventDefault();
			$(this).parent("li").toggleClass("hover");
		});
	} 
	else if (ww >= 900) {
		$('body').find(".toggleMenu").css("display", "none");
		$('body').find(".nav").show();
		$('body').find(".nav li").removeClass("hover");
		$('body').find(".nav li a").unbind('click');
		$('body').find(".nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
		$(this).toggleClass('hover');
        $(this).toggleClass('activelink');
        $(this).find("ul").toggleClass('animatedfast');
        $(this).find("ul").toggleClass('fadeInDown');
		});
        $('body').find(".nav ul li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
            $(this).toggleClass('hover');
            $(this).find("ul li").toggleClass('animatedfast');
            $(this).find("ul li").toggleClass('fadeInLeft');
		});
	}
};

/* STICKY MENU */
$(document).ready(function() {
    "use strict";
    fixnav();
});

var nav = $('body').find('.nav-container');

function fixnav() {
    "use strict";
    $(window).bind("scroll", function(){
        if ($(this).scrollTop() > 120 && ww >= 900) {
            nav.addClass("f-nav");
        } else {
            nav.removeClass("f-nav");
        }
    });
} 

/* BACK TO TOP BUTTON */

jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    });
});
}(jQuery)); 

/* STICKY FILTER MENU */
jQuery(document).ready(function() {
    "use strict";
    jQuery('#portfolio-layout').find('.dysania-filters').wrap( "<div id='f-filter'></div>" );
    fixfilter();
});

function fixfilter() {
    "use strict";
    var filter = jQuery('body').find('#f-filter');
    var bw = document.body.clientWidth;
    jQuery(window).bind("scroll", function(){
        if (jQuery(this).scrollTop() > 120 && bw >= 900) {
            filter.addClass("f-filter");
        } else {
            filter.removeClass("f-filter");
        }
    });
} 

/////////////////* NOTICES */////////////////////////

jQuery('body').find('.message-close').on("click", function () { 
   jQuery(this).parent().fadeOut();
});