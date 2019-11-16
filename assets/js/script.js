$(function(){
// IPad/IPhone
  var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
  ua = navigator.userAgent,

  gestureStart = function () {viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";},

  scaleFix = function () {
    if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
      viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
      document.addEventListener("gesturestart", gestureStart, false);
    }
  };
  
  scaleFix();
  // Menu Android
  if(window.orientation!=undefined){
  var regM = /ipod|ipad|iphone/gi,
   result = ua.match(regM)
  if(!result) {
   $('.sf-menu li').each(function(){
    if($(">ul", this)[0]){
     $(">a", this).toggle(
      function(){
       return false;
      },
      function(){
       window.location.href = $(this).attr("href");
      }
     );
    } 
   })
  }
 }
});
var ua=navigator.userAgent.toLocaleLowerCase(),
 regV = /ipod|ipad|iphone/gi,
 result = ua.match(regV),
 userScale="";
if(!result){
 userScale=",user-scalable=0"
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0'+userScale+'">')

var currentYear = (new Date).getFullYear();
  $(document).ready(function() {
  $("#copyright-year").text( (new Date).getFullYear() );
  });

  $(function(){
  $('.sf-menu').superfish({autoArrows: true})
})

 $(document).ready(function(){
        jQuery('#camera_wrap').camera({
            loader: false,
            pagination: true ,
            minHeight: '300',
            thumbnails: false,
            height: '30.34188034188034%',
            caption: false,
            navigation: false,
            fx: 'mosaic'
          });
        $().UItoTop({ easingType: 'easeOutQuart' });
        
        jQuery('#camera_wrap1').camera({
            loader: false,
            pagination: true ,
            minHeight: '300',
            thumbnails: false,
            height: '30.34188034188034%',
            caption: false,
            navigation: false,
            fx: 'mosaic'
          });
        $().UItoTop({ easingType: 'mosaicSpiralReverse' });
        
     }); 
	
	 
	 
$(function(){

    /* initiate the plugin for cars */
    $("div.holder").jPages({
      containerID  : "itemContainer",
      perPage      : 3,
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1
    });

  });
  $(function(){

    /* initiate the plugin for bikes */
    $("div.holder1").jPages({
      containerID  : "itemContainer1",
      perPage      : 3,
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1
    });

  });
  $(function(){

    /* initiate the plugin for accessories */
    $("div.holder2").jPages({
      containerID  : "itemContainer2",
      perPage      : 4,
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1
    });

  });
  $(function(){

    /* initiate the plugin for accessories */
    $("div.holder3").jPages({
      containerID  : "itemContainer3",
      perPage      : 3,
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1
    });

  });
    $(function(){

    /* initiate the plugin for accessories */
    $("div.holder4").jPages({
      containerID  : "itemContainer4",
      perPage      : 3,
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1
    });
	

  });
     $(function(){

    /* initiate the plugin for accessories */
    $("div.holder5").jPages({
      containerID  : "itemContainer5",
      perPage      : 4,
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1
    });

  });
   $(function(){

    /* initiate the plugin for accessories */
    $("div.holder6").jPages({
      containerID  : "itemContainer6",
      perPage      : 3,
      first       : true,
      previous    : "span.arrowPrev",
      next        : "span.arrowNext",
      last        : true
    });
	

  });


$(document).ready(function(){

	var dd = $('.visall').easyTicker({
		direction: 'up',
		easing: 'easeInOutBack',
		speed: 'slow',
		interval: 2000,
		height: 'auto',
		visible: 3,
		mousePause: 0,
		controls: {
			up: '.up',
			down: '.down',
			toggle: '.toggle',
			stopText: 'Stop !!!'
		}
	}).data('easyTicker');
	
	cc = 1;
	
	
	$('.visall').click(function(){
		dd.stop();
		dd.options['visible'] = 0 ;
		dd.start();
	});
	
	
	var dd = $('.adv').easyTicker({
		direction: 'left',
		easing: 'easeInOutBack',
		speed: 'slow',
		interval: 3000,
		height: 'auto',
		visible: 1,
		mousePause: 0,
		
	}).data('easyTicker');
	
	cc = 1;
	
	
	$('.adv').click(function(){
		dd.stop();
		dd.options['visible'] = 0 ;
		dd.start();
	});
	
});


$(function() {
			
			var indicator = $('#indicator'),
					indicatorHalfWidth = indicator.width()/2,
					lis = $('#tabs').children('li');

			$("#tabs").tabs("#content section", {
				effect: 'fade',
				fadeOutSpeed: 0,
				fadeInSpeed: 400,
				onBeforeClick: function(event, index) {
					var li = lis.eq(index),
					    newPos = li.position().left + (li.width()/2) - indicatorHalfWidth;
					indicator.stop(true).animate({ left: newPos }, 600, 'easeInOutExpo');
				}
			});	

		});
		
		$(function() {
			
			var indicator = $('#indicator1'),
					indicatorHalfWidth = indicator.width()/2,
					lis = $('#tabs1').children('li');

			$("#tabs1").tabs("#content1 section", {
				effect: 'fade',
				fadeOutSpeed: 0,
				fadeInSpeed: 400,
				onBeforeClick: function(event, index) {
					var li = lis.eq(index),
					    newPos = li.position().left + (li.width()/2) - indicatorHalfWidth;
					indicator.stop(true).animate({ left: newPos }, 600, 'easeInOutExpo');
				}
			});	

		});
		$(function() {
			
			var indicator = $('#indicator2'),
					indicatorHalfWidth = indicator.width()/2,
					lis = $('#tabs2').children('li');

			$("#tabs2").tabs("#content2 section", {
				effect: 'fade',
				fadeOutSpeed: 0,
				fadeInSpeed: 400,
				onBeforeClick: function(event, index) {
					var li = lis.eq(index),
					    newPos = li.position().left + (li.width()/2) - indicatorHalfWidth;
					indicator.stop(true).animate({ left: newPos }, 600, 'easeInOutExpo');
				}
			});	

		});
		$(function() {
			
			var indicator = $('#indicator3'),
					indicatorHalfWidth = indicator.width()/2,
					lis = $('#tabs3').children('li');

			$("#tabs3").tabs("#content3 section", {
				effect: 'fade',
				fadeOutSpeed: 0,
				fadeInSpeed: 400,
				onBeforeClick: function(event, index) {
					var li = lis.eq(index),
					    newPos = li.position().left + (li.width()/2) - indicatorHalfWidth;
					indicator.stop(true).animate({ left: newPos }, 600, 'easeInOutExpo');
				}
			});	

		});
		
		$(function() {
			
			var indicator = $('#indicator4'),
					indicatorHalfWidth = indicator.width()/2,
					lis = $('#tabs4').children('li');

			$("#tabs4").tabs("#content4 section", {
				effect: 'fade',
				fadeOutSpeed: 0,
				fadeInSpeed: 400,
				onBeforeClick: function(event, index) {
					var li = lis.eq(index),
					    newPos = li.position().left + (li.width()/2) - indicatorHalfWidth;
					indicator.stop(true).animate({ left: newPos }, 600, 'easeInOutExpo');
				}
			});	

		});
