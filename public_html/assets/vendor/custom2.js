/*
Theme Name: BMW
Author: Acit Jazz  2015
Version: 1.0
Tags:
*/


$(document).ready(function(){
				$(".test_drive").on("click", function(){
				var  typenya = 1;
			
				$.ajax({
                        'type': 'POST',
                        'url': basedomain+'tracking',
                        'data': {typenya:typenya},
						'dataType':'json'

					})
				});
				$(".download").on("click", function(){
				var  typenya = 3;
				$.ajax({
                        'type': 'POST',
                        'url': basedomain+'tracking',
                        'data': {typenya:typenya},
						'dataType':'json',
                        'success': function(result){
					
						if(result.status==true)
												{
												//$('.twittershare').trigger('click');
												//return true;
												}
						
										}
					})
					//return false;
				});
			$(".register").on("click", function(){
			var  typenya = 4;
			
				$.ajax({
                        'type': 'POST',
                        'url': basedomain+'tracking',
                        'data': {typenya:typenya},
						'dataType':'json',
                        'success': function(result){
					
						if(result.status==true)
												{
												//$('.twittershare').trigger('click');
												//return true;
												}
						
										}
					})
					//return false;
				});
			$(".jointhetour").on("click", function(){
			var  typenya = 6;
			
				$.ajax({
                        'type': 'POST',
                        'url': basedomain+'tracking',
                        'data': {typenya:typenya},
						'dataType':'json',
                        'success': function(result){
					
						if(result.status==true)
												{
												//$('.twittershare').trigger('click');
												//return true;
												}
						
										}
					})
					//return false;
				});
			$(".twittershare").on("click", function(){
			var  typenya = 2;
			
				$.ajax({
                        'type': 'POST',
                        'url': basedomain+'tracking',
                        'data': {typenya:typenya},
						'dataType':'json'

					})
				});
			function shareFB(fb_name,fb_link,fb_img,fb_user,fb_post){
						$("#bg-popup").fadeOut();
						$(".popup,.popup2").fadeOut();
						FB.init();
						FB.ui({
							method: 'feed',
							name: fb_name,
							link: fb_link,
							picture: fb_img,
							caption: fb_user,
							description: fb_post
							
							
						});
							 
					};
					
				$("#registration").on("submit", function(){
					var salutation_erorr='.salutation_erorr';
					$(salutation_erorr).html(' ');
					var phone_erorr='.phone_erorr';
					$(phone_erorr).html(' ');
					var firstname_erorr='.firstname_erorr';
					$(firstname_erorr).html(' ');
					var address_erorr='.address_erorr';
					$(address_erorr).html(' ');
					var lastname_erorr='.lastname_erorr';
					$(lastname_erorr).html(' ');
					var city_erorr='.city_erorr';
					$(city_erorr).html(' ');
					var email_erorr='.email_erorr';
					$(email_erorr).html(' ');
					var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,15})+$/; 
					var valid="";
					
					if($('.salutation').val()=='')
					{
						$(salutation_erorr).html('You cannot leave this field empty');
						valid="ada";
					}
					if($('.phone').val()=='')
					{
						$(phone_erorr).html('You cannot leave this field empty');
						valid="ada";
					}
					if($('.firstname').val()=='')
					{
						$(firstname_erorr).html('You cannot leave this field empty');
						valid="ada";
					}
					if($('.address').val()=='')
					{
						$(address_erorr).html('You cannot leave this field empty');
						valid="ada";
					}
					if($('.lastname').val()=='')
					{
						$(lastname_erorr).html('You cannot leave this field empty');
						valid="ada";
					}
					if($('.city').val()=='')
					{
						$(city_erorr).html('You cannot leave this field empty');
						valid="ada";
					}
					if($('.email').val()=='')
					{
						$(email_erorr).html('You cannot leave this field empty');
						valid="ada";
					}
					else if(!$('.email').val().match(mailformat))  
						{  
							$(email_erorr).html(' This email is incorrect format (e.g. example@mybmw.co.id)');
							$(".email").addClass('error');
							valid='ada';
						} 
						
					if(valid)
					{
						return false;
					}
					$('.pesanwite').html('Submiting Your Data ...');
					$.ajax({
                        'type': 'POST',
                        'url': basedomain+'registration',
                        'data': {salutation:$('.salutation').val(),phone:$('.phone').val(),firstname:$('.firstname').val(),address:$('.address').val(),lastname:$('.lastname').val(),city:$('.city').val(),email:$('.email').val(),vehicle:$('.vehicle').val(),btn_submit:1,ajax:1},
						'dataType':'json',
                        'success': function(result){
								$('.pesanwite').html('');
									if(result.status==1)
												{
													$.magnificPopup.open({
														items: {
															src: '#popup-thanks' 
														},
														callbacks: {
															close: function(){
																location.href = basedomain+"home";
															}
														},
														type: 'inline'
														  });
												}
										else
											{
												$('.pesanerorr').html('proses gagal ulangi lagi');
											}
											
								}
					});
					
					return false;
				});
					$('.number').keyup(function () {  
						if(this.value)
						{
							this.value = this.value.replace(/[^0-9]/g,''); 
							
						}
					});
					$('.string').keyup(function () {  
						if(this.value)
						{
							this.value = this.value.replace(/[^a-zA-Z'"]/g,''); 
							
						}
					});	
					


    $('iframe').each(function(){
        var url = $(this).attr("src");
        $(this).attr("src",url+"?wmode=transparent");
    });					   
	$('a.scrolldown,a.keepme').click(function(){
		$('html, body').animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top
		}, 500);
		return false;
	});
	//DROPDOWN
	$('#main-menu').supersubs({
		minWidth:	12,	 // minimum width of submenus in em units
		maxWidth:	27,	 // maximum width of submenus in em units
		extraWidth:	1	 // extra width can ensure lines don't sometimes turn over
						 // due to slight rounding differences and font-family
	}).superfish();		 // call supersubs first, then superfish, so that subs are
						 // not display:none when measuring. Call before initialising
						 // containing tabs for same reason.
		// TRIGGER ACTIVE STATE
		$('#mobnav-btn').click(
		
		function () {
			$('.sf-menu').toggleClass("xactive");
		});
		
		
		
		// TRIGGER DROP DOWN SUBS
		$('.mobnav-subarrow').click(
		
		function () {
			$(this).parent().toggleClass("xpopdrop");
		});
		
	//POPUP
	// Image popups
	
	$('.showPopupImg').magnificPopup({
	  type: 'inline',

	  fixedContentPos: false,
	  fixedBgPos: true,

	  overflowY: 'auto',

	  closeBtnInside: true,
	  preloader: false,
	  
	  midClick: true,
	  removalDelay: 300,
	  mainClass: 'my-mfp-zoom-in'
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
	
	$('.closevideo').click(function(){
		$( "#headercontainer" ).removeClass( "hide" );
		$( "body" ).removeClass( "video-play" );
		 $('#player').remove();
		 $( "#containervideo" ).append( '<div id="player" class="home-player autoheight"></div>' );
	});
});

$(function(){
  $('.autoheight').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });
  $('.autoheights').css({ height: $(window).innerHeight() + 'px' });

  $(window).resize(function(){
	$('.autoheight').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });
  $('.autoheights').css({ height: $(window).innerHeight() + 'px' });
  });
});

//YOUTUBE PLAYER BANNER
$("#playbutton").click(function(){
	player = new YT.Player('player', {
		width : '320',
		height : '180',
		videoId : 'KSMgU16Cg9A',
		playerVars: { 'autoplay': 1,'rel': 0 },
		events : {
			'onReady' : onPlayerReady,
			'onStateChange' : onPlayerStateChange
		}
	});
	$(function(){
	  $('.autoheight').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });
	});
    $('iframe').each(function(){
        var url = $(this).attr("src");
        $(this).attr("src",url+"?wmode=transparent");
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
//SLIDER
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});