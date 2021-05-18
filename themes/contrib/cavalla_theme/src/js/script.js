jQuery.noConflict();
(function($){
	"use strict";
	var controller = new ScrollMagic.Controller();

	$('.call_to_action_bundle').each(function(i){
		var cta_bundle_scroll=new ScrollMagic.Scene({
			triggerElement:this,
			offset: 100, // offset trigger position by 100px;
			triggerHook: "onCenter",
		})
		cta_bundle_scroll.on('start end', function(){
			$('[data-animate-cta="On"]').eq(i).find('.title-header').addClass('animated fadeIn');
			$('[data-animate-cta="On"]').eq(i).find('.lead').addClass('animated fadeInDown');
			$('[data-animate-cta="On"]').eq(i).find('.btn').addClass('animated fadeInDown');
		}) // add class toggle
		controller.addScene(cta_bundle_scroll);
	});

	/****testimonial Bundle Scroll Animation */
	$('.testimonials_bundle').each(function(i){
		var testimonial_bundle_scroll=new ScrollMagic.Scene({
			triggerElement:this,
			offset: 100, // offset trigger position by 100px;
			triggerHook: "onCenter",
		})
		testimonial_bundle_scroll.on('start end', function(){
			$('[data-animate-testimonial="On"]').eq(i).find('.header_text').addClass('animated fadeIn');
			$('[data-animate-testimonial="On"]').eq(i).find('.text-center .lead').addClass('animated fadeInDown');
			$('[data-animate-testimonial="On"]').eq(i).find('.testimonial_bundle').addClass('animated bounceIn delay-1s');
			$('[data-animate-testimonial="On"]').eq(i).find('.hyperlinks').addClass('animated fadeIn delay-2s');


		}) // add class toggle
		controller.addScene(testimonial_bundle_scroll);
	});

	/****Card Bundle Scroll Animation */
	$('.card_bundle').each(function(i){
		var card_bundle_scroll=new ScrollMagic.Scene({
			triggerElement:this,
			offset: 100, // offset trigger position by 100px;
			triggerHook: "onCenter",
		})
		card_bundle_scroll.on('start end', function(){
			$('[data-animate-card="On"]').eq(i).find('.header_text').addClass('animated fadeIn');
			$('[data-animate-card="On"]').eq(i).find('.lead').addClass('animated fadeInDown');
			$('[data-animate-card="On"]').eq(i).find('.card').addClass('animated bounceIn delay-1s');
			$('[data-animate-card="On"]').eq(i).find('.hyperlinks').addClass('animated fadeIn delay-2s');

		}) // add class toggle
		controller.addScene(card_bundle_scroll);
	});

	/****Featurette Bundle Scroll Animation */
	$('.featurette_bundle').each(function(i){
		var featurette_bundle_scroll=new ScrollMagic.Scene({
			triggerElement:this,
			offset: 100, // offset trigger position by 100px;
			triggerHook: "onCenter",
		})
		featurette_bundle_scroll.on('start end', function(){
			$('[data-animate-featurette="On"]').eq(i).find('.featurette-heading').addClass('animated fadeIn');
			$('[data-animate-featurette="On"]').eq(i).find('.lead').addClass('animated fadeInDown');
			$('[data-animate-featurette="On"]').eq(i).find('.featurettes_image').addClass('animated bounceIn delay-1s');
			$('[data-animate-featurette="On"]').eq(i).find('.hyperlinks').addClass('animated fadeIn delay-2s');
		}) // add class toggle
		controller.addScene(featurette_bundle_scroll);
	});

})(jQuery);

/*** Timeline Carousel Bundle  */
jQuery.noConflict();
(function($){
	"use strict";
	var timelineSwiper = new Swiper ('.timeline_carousel_bundle .swiper-container', {
		direction: 'vertical',
		loop: false,
		speed: 1600,
		pagination: '.swiper-pagination',
		paginationBulletRender: function (swiper, index, className) {
		var year = document.querySelectorAll('.swiper-slide')[index].getAttribute('data-year');
		return '<span class="' + className + '">' + year + '</span>';
		},
		paginationClickable: true,
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		breakpoints: {
		768: {
			direction: 'horizontal',
		}
		}
	});
})(jQuery);

/**Mobile Device detection */
function mobileBrowserDetection() {
"use strict";

	(function (a) { (jQuery.browser = jQuery.browser || {}).mobile = /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|iPad|Android|Tablet|blazer|compal|elaine|PlayBook|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|Silk|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)) })(navigator.userAgent || navigator.vendor || window.opera);
		return jQuery.browser.mobile;
}

jQuery.noConflict();
(function($){
	"use strict";
	if(mobileBrowserDetection()){
		$('html').addClass('mobile_browser');
	}
})(jQuery);


jQuery.noConflict();
(function($){
	"use strict";
	$(".full_background video").prependTo(".full_background");
	$(".full_background article").remove();
})(jQuery);


// var $=jQuery.noConflict();
// $(document).ready(function($){
//    //Play intro on page load


// if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
// 	$("video").ready(function () {
// 		//window.setTimeout(function(){
// 			$("video[autoplay]").each(function(){ this.play(); });
// 		//}, 1000);
// 	});
// }

// else{

// 	if ($("video")){
// 		$("video[autoplay]").each(function(){ this.play(); });
// 		$('video').attr('playsinline', '');
// 		$('video').attr('muted', '');
// 	}

// }

// });


/**** Menu ****/
jQuery.noConflict();
(function($){
	"use strict";

	$('#showMenu').click(function(){
		$('#showMenu .menu').toggleClass('open');
	});

})(jQuery);




/* 	var elmnt = document.querySelector('.call_to_action_bundle .video');
	var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',
		  videoId: elmnt.getAttribute('data-video-id'),
		  playerVars: { 'autoplay': 1, 'controls': 0 },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
		event.target.playVideo();
		event.target.mute();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {


	  }

	  function nextVideo() {
        player.nextVideo(loop);
	  } */
  /*     function stopVideo() {
        player.stopVideo();
	  } */
