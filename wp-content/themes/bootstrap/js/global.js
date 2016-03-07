;
(function ($) {

	// Scripts which runs after DOM load

	$(document).ready(function () {

		// Add fancybox to images
		var $img;
		if ($img = $('img[class*="wp-image"]')) {
			$img.parent('a[href$="jpg"], a[href$="png"], a[href$="gif"]').fancybox({
				openEffect: 'none',
				closeEffect: 'none',
				helpers: {
					overlay: {
						locked: false
					}
				}
			});
		}

		$('a[rel*="album"]').fancybox({
			helpers: {
				overlay: {
					locked: false
				}
			}
		});

		$('.apl-healthcare-counter span').counterUp({
		    delay: 10,
		    time: 1500
		});
		$('.apl-life-counter span').counterUp({
		    delay: 10,
		    time: 1500
		});
		
	});

	// Scripts which runs after all elements load

	$(window).load(function () {
		//SMOOTH SCROLLER
		function filterPath(string) {
		  return string
		    .replace(/^\//,'')
		    .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
		    .replace(/\/$/,'');
		  }
		  var locationPath = filterPath(location.pathname);
		  var scrollElem = scrollableElement('html', 'body');
		 
		  $('a[href*=#]').each(function() {
		    var thisPath = filterPath(this.pathname) || locationPath;
		    if (  locationPath == thisPath
		    && (location.hostname == this.hostname || !this.hostname)
		    && this.hash.replace(/#/,'') ) {
		      var $target = $(this.hash), target = this.hash;
		      if (target) {
		        var targetOffset = $target.offset().top;
		        $(this).click(function(event) {
		          event.preventDefault();
		          $(scrollElem).animate({scrollTop: targetOffset}, 400, function() {
		            location.hash = target;
		          });
		        });
		      }
		    }
		  });
		 
		  // use the first element that is "scrollable"
		  function scrollableElement(els) {
		    for (var i = 0, argLength = arguments.length; i <argLength; i++) {
		      var el = arguments[i],
		          $scrollElement = $(el);
		      if ($scrollElement.scrollTop()> 0) {
		        return el;
		      } else {
		        $scrollElement.scrollTop(1);
		        var isScrollable = $scrollElement.scrollTop()> 0;
		        $scrollElement.scrollTop(0);
		        if (isScrollable) {
		          return el;
		        }
		      }
		    }
		    return [];
		  }

	$(".apl-menu-btn").click(function(){
        $(".apl-hidden-menu").fadeIn();
    });
    $(".apl-hidden-menu").click(function(){
        $(".apl-hidden-menu").fadeOut();
    });
    $(".apl-about .apl-about-btn").click(function(){
        $(".apl-about .apl-grdnt").fadeOut();
        $(".apl-about .apl-about-btn").hide();
        $(".apl-about-hidden").fadeIn();
        $(".apl-about .apl-about-text").css("height","auto");
    });
    $(".apl-ceo .apl-about-btn").click(function(){
        $(".apl-ceo .apl-grdnt").fadeOut();
        $(".apl-ceo .apl-about-btn").hide();
        $(".apl-ceo-hidden").fadeIn();
        $(".apl-ceo-text").css("height","auto");
        var width = $( window ).width();
        if ( width > 767 ) {
            var height = $("#ceo-left").css("height");
            var height_ceo = parseFloat(height) - 100;
            $("#ceo-right").css( "height", height_ceo);
		    $('.apl-ceo-photo').stickyfloat( {duration: 400} );
		  }
    });
    $(".apl-quality .col-md-3:nth-of-type(1) img").click(function(){
        $(".apl-quality-hidden-element:nth-of-type(1)").fadeIn();
        $(".apl-quality-hidden-element:nth-of-type(2)").hide();
        $(".apl-quality-hidden-element:nth-of-type(3)").hide();
        $(".apl-quality-hidden-element:nth-of-type(4)").hide();
    });
    $(".apl-quality .col-md-3:nth-of-type(2) img").click(function(){
        $(".apl-quality-hidden-element:nth-of-type(2)").fadeIn();
        $(".apl-quality-hidden-element:nth-of-type(1)").hide();
        $(".apl-quality-hidden-element:nth-of-type(3)").hide();
        $(".apl-quality-hidden-element:nth-of-type(4)").hide();
    });
    $(".apl-quality .col-md-3:nth-of-type(3) img").click(function(){
        $(".apl-quality-hidden-element:nth-of-type(3)").fadeIn();
        $(".apl-quality-hidden-element:nth-of-type(2)").hide();
        $(".apl-quality-hidden-element:nth-of-type(1)").hide();
        $(".apl-quality-hidden-element:nth-of-type(4)").hide();
    });
    $(".apl-quality .col-md-3:nth-of-type(4) img").click(function(){
        $(".apl-quality-hidden-element:nth-of-type(4)").fadeIn();
        $(".apl-quality-hidden-element:nth-of-type(2)").hide();
        $(".apl-quality-hidden-element:nth-of-type(3)").hide();
        $(".apl-quality-hidden-element:nth-of-type(1)").hide();
    });
    $("#btn1").click(function(){
        $("#hidden1").fadeIn();
        $("#hidden2").hide();
        $("#hidden3").hide();
        $("#hidden4").hide();
        $("#hidden5").hide();
    });
    $("#btn2").click(function(){
        $("#hidden2").fadeIn();
        $("#hidden1").hide();
        $("#hidden3").hide();
        $("#hidden4").hide();
        $("#hidden5").hide();
    });
    $("#btn3").click(function(){
        $("#hidden3").fadeIn();
        $("#hidden2").hide();
        $("#hidden1").hide();
        $("#hidden4").hide();
        $("#hidden5").hide();
    });
    $("#btn4").click(function(){
        $("#hidden4").fadeIn();
        $("#hidden2").hide();
        $("#hidden3").hide();
        $("#hidden1").hide();
        $("#hidden5").hide();
    });
    $("#btn5").click(function(){
        $("#hidden5").fadeIn();
        $("#hidden2").hide();
        $("#hidden3").hide();
        $("#hidden4").hide();
        $("#hidden1").hide();
    });
    $("#fin-btn").click(function(){
        $(".nonfinancial_chart").addClass('hidden_chart');
        $(".financial_chart").removeClass('hidden_chart');
        $("#nonfin-btn").removeClass('active');
        $(this).addClass('active');
    });
    $("#nonfin-btn").click(function(){
        $(".financial_chart").addClass('hidden_chart');
        $(".nonfinancial_chart").removeClass('hidden_chart');
        $("#fin-btn").removeClass('active');
        $(this).addClass('active');
    });
   
		//jQuery code goes here

	});

	// Scripts which runs at window resize

	$(window).resize(function () {

	});

}(jQuery));
