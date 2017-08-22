/*
Theme Name: BMW
Author: Acit Jazz  2015
Version: 1.0
Tags:
*/

//HOVER EFFECT
$('.viewport').mouseenter(function(e) {
	$(this).children('a').children('img').animate({ height: '299', left: '0', top: '0', width: '450'}, 100);
	$(this).children('a').children('span').fadeIn(200);
}).mouseleave(function(e) {
	$(this).children('a').children('img').animate({ height: '332', left: '-20', top: '-20', width: '500'}, 100);
	$(this).children('a').children('span').fadeOut(200);
});


$(function(){
  $('.autoheight').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });

  $(window).resize(function(){
	$('.autoheight').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });
  });
});

//BANNER ACTION
$(document).ready(function() {   
			$('#navbar a').popover('show'); 
			$("#navbar  a[href^='#']").on('over', function(e) {
			// prevent default anchor click behavior
			e.preventDefault();
			// store hash
			var hash = this.hash;
			// animate
			$('html, body').animate({
			scrollTop: $(hash).offset().top
			}, 800, function(){
			// when done, add hash to url
			// (default click behaviour)
			window.location.hash = hash;
			});
	
	});
	$(function() {
	$( ".play" ).click(function() {
		$( "#headercontainer" ).toggleClass( "hide" );
		$( "body" ).toggleClass( "video-play" );
		return false;
	});
	});
	wow = new WOW({
	  boxClass:     'wow',      // default
	  animateClass: 'animated', // default
	  offset:       0,          // default
	  mobile:       true,       // default
	  live:         true        // default
	})
	wow.init();
});		
$(window).scroll(function() {    
	var scroll = $(window).scrollTop();

	if (scroll >= 100) {
		$( "#headercontainer" ).removeClass( "hide" );
		$( "body" ).removeClass( "video-play" );
		 $('#player').remove();
		 $( "#containervideo" ).append( '<div id="player" class="home-player autoheight"></div>' );
	}else{
		//da
	}
});

//YOUTUBE PLAYER BANNER
$("#playbutton").click(function(){
	player = new YT.Player('player', {
		width : '320',
		height : '180',
		videoId : 'pzomHAMUVBc',
		playerVars: { 'autoplay': 1,'rel': 0 },
		events : {
			'onReady' : onPlayerReady,
			'onStateChange' : onPlayerStateChange
		}
	});
	$(function(){
	  $('.autoheight').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });
	});
});
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function onPlayerReady(event) {
	//event.target.playVideo();
}
function onPlayerStateChange(event) {
	if(event.data == YT.PlayerState.ENDED) {
		player.destroy();
		$( "#headercontainer" ).removeClass( "hide" );
		$( "body" ).removeClass( "video-play" );
	}
}
//PARALLAX

	$(function(){
		$.stellar({
			horizontalScrolling: false,
			verticalOffset: 40
		});
	});
