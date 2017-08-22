<?php /* Smarty version 2.6.13, created on 2016-12-20 11:54:51
         compiled from application/web/apps/drivingluxury.html */ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/flipster/jquery.flipster.css" />
 <script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/flipster/jquery.flipster.min.js"></script>
 <?php echo '
 <script type="text/javascript">
 $(document).ready(function(){
		$("#6").addClass("hides");
		$("#7").addClass("hides");
		$("#5").addClass("hides");
       $("#slidecarousel").flipster({
          style: \'flat\',
          spacing: -0.3,
          loop:true,
          nav: true,
          buttons: true,
          scrollwheel: false,
      });
  		$( ".loadmore" ).click(function() {
        var targetid = $(this).attr("href");
		console.log(targetid);
        $(this).addClass("hides");
  		$(targetid).addClass("shows");
		$("#6").removeClass("hides");
		$("#7").removeClass("hides");
		$("#5").removeClass("hides");
  			return false;
  		});

      $("#playbutton3").click(function(){
        var targetid = $(this).attr("href");
        $(targetid).addClass("shows");
      	player = new YT.Player(\'player-playervideo7series\', {
      		quality: \'hd720\',
      		videoId : \'i4NxsKnnS4s\',
      		playerVars: { \'autoplay\': 1,\'rel\': 0, \'vq\':\'hd720\'  },
      		events : {
      			\'onReady\' : onPlayerReady,
      			\'onStateChange\' : onPlayerStateChange
      		}
      	});
        $(\'#video7series iframe\').each(function(){
            var url = $(this).attr("src");
            $(this).attr("src",url+"?wmode=transparent");
        });
  			return false;
      });

      $("#playbuttonslide1").click(function(){
        var targetid = $(this).attr("href");
        $(targetid).addClass("shows");
        $(this).addClass("hides");
        player = new YT.Player(\'player-slide1\', {
          width : \'1100\',
          height : \'600\',
          quality: \'hd720\',
          videoId : \'m6kJX8Kjnqk\',
          playerVars: { \'autoplay\': 1,\'rel\': 0, \'vq\':\'hd720\'  },
          events : {
            \'onReady\' : onPlayerReady,
            \'onStateChange\' : onPlayerStateChange
          }
        });
        $(\'#videoslide1 iframe\').each(function(){
            var url = $(this).attr("src");
            $(this).attr("src",url+"?wmode=transparent");
        });
        return false;
      });

      $("#playbuttonslide4").click(function(){
        var targetid = $(this).attr("href");
        $(targetid).addClass("shows");
        $(this).addClass("hides");
      	player = new YT.Player(\'player-slide4\', {
      		width : \'1100\',
      		height : \'600\',
      		quality: \'hd720\',
      		videoId : \'-O945oDGXlw\',
      		playerVars: { \'autoplay\': 1,\'rel\': 0, \'vq\':\'hd720\'  },
      		events : {
      			\'onReady\' : onPlayerReady,
      			\'onStateChange\' : onPlayerStateChange
      		}
      	});
        $(\'#videoslide4 iframe\').each(function(){
            var url = $(this).attr("src");
            $(this).attr("src",url+"?wmode=transparent");
        });
  			return false;
      });

      $("#playbuttonslide2").click(function(){
        var targetid = $(this).attr("href");
        $(targetid).addClass("shows");
        $(this).addClass("hides");
      	player = new YT.Player(\'player-slide2\', {
      		width : \'1100\',
      		height : \'600\',
      		quality: \'hd720\',
      		videoId : \'pg_wpvYj1dE\',
      		playerVars: { \'autoplay\': 1,\'rel\': 0, \'vq\':\'hd720\'  },
      		events : {
      			\'onReady\' : onPlayerReady,
      			\'onStateChange\' : onPlayerStateChange
      		}
      	});
        $(\'#videoslide2 iframe\').each(function(){
            var url = $(this).attr("src");
            $(this).attr("src",url+"?wmode=transparent");
        });
  			return false;
      });

      $("#playbuttonslide3").click(function(){
        var targetid = $(this).attr("href");
        $(targetid).addClass("shows");
        $(this).addClass("hides");
      	player = new YT.Player(\'player-slide3\', {
      		width : \'1100\',
      		height : \'600\',
      		quality: \'hd720\',
      		videoId : \'To_oxb0jEfc\',
      		playerVars: { \'autoplay\': 1,\'rel\': 0, \'vq\':\'hd720\'  },
      		events : {
      			\'onReady\' : onPlayerReady,
      			\'onStateChange\' : onPlayerStateChange
      		}
      	});
        $(\'#videoslide3 iframe\').each(function(){
            var url = $(this).attr("src");
            $(this).attr("src",url+"?wmode=transparent");
        });
  			return false;
      });
      var tag = document.createElement(\'script\');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName(\'script\')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      var player;
      function onPlayerReady(event) {
      	//event.target.playVideo();
      }
      function onPlayerStateChange(event) {
      	if(event.data == YT.PlayerState.ENDED) {
      		player.destroy();
      	}
      }

   });
 </script>
 '; ?>

<?php echo $this->_tpl_vars['navigation']; ?>

<div id="drivingluxury">
      <div class="bgart">
        <div class="heading">
              <div class="container">
                  <div class="row">
                      <div class="promocontent">
                          <h2>INSPIRE A WORLD OF DRIVING LUXURY.</h2>
                          <p>
                            At BMW, we truly believe that the best way to predict the future is to create it.
    With that in mind, we sat down with prominent Indonesian leaders
    who share the same vision and have them reveal their inspiring views
    and insights toward success, encapsulated  by the all-new BMW 7 Series.
                          </p>
                      </div><!-- end .col-md-6 -->
                  </div><!-- end .row -->
              </div><!-- end .container -->
        </div>
          <div id="slidecarousel">
              <ul class="flip-items">
                  <li>
                    <div class="vidcontent">
                      <div id="videoslide2" class="videoPlayer click-to-play-video inactive-state">
                          <div id="player-slide2" class="player"></div>
                      </div><!-- end #containervideo -->
                      <div class="videoimg">
                            <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/vid1.jpg" alt="" />
                      </div>
                      <a href="#videoslide2" id="playbuttonslide2" class="plyvid">
                        <div class="heading">
                          <div class="promocontent">
                              <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/play1.png" alt="" />
                          </div>
                        </div>
                      </a>
                    </div>
                  </li>
                  <li>
                    <div class="vidcontent">
                      <div id="videoslide4" class="videoPlayer click-to-play-video inactive-state">
                          <div id="player-slide4" class="player"></div>
                      </div><!-- end #containervideo -->
                      <div class="videoimg">
                            <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/vid4.png" alt="" />
                      </div>
                      <a href="#videoslide4" id="playbuttonslide4" class="plyvid">
                        <div class="heading">
                          <div class="promocontent">
                              <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/vid4_play.png" alt="" />
                          </div>
                        </div>
                      </a>
                    </div>
                  </li>
                  <li>
                    <div class="vidcontent">
                      <div id="videoslide1" class="videoPlayer click-to-play-video inactive-state">
                          <div id="player-slide1" class="player"></div>
                      </div><!-- end #containervideo -->
                      <div class="videoimg">
                            <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/vid_iwan_sunito.jpg" alt="Iwan Sunito" />
                      </div>
                      <a href="#videoslide1" id="playbuttonslide1" class="plyvid">
                        <div class="heading">
                          <div class="promocontent">
                              <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/vid_play_iwan_sunito.png" alt="Play Video Iwan Sunito" />
                          </div>
                        </div>
                      </a>
                    </div>
                  </li>
                  
                  
                  <li>
                    <div class="vidcontent">
                      <div id="videoslide3" class="videoPlayer click-to-play-video inactive-state">
                          <div id="player-slide3" class="player"></div>
                      </div><!-- end #containervideo -->
                      <div class="videoimg">
                            <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/vid3.jpg" alt="" />
                      </div>
                      <a href="#videoslide3" id="playbuttonslide3" class="plyvid">
                        <div class="heading">
                          <div class="promocontent">
                              <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/vid3_play.png" alt="" />
                          </div>
                        </div>
                      </a>
                    </div>
                  </li>
              </ul>
          </div>
      </div>
    <section id="drivingluxurycontent" class="section">
        <div class="thecontents">
              <div class="heading">
                    <div class="container">
                        <div class="row">
                          <div class="col-md-12">
                              <div class="promocontent">
                                  <h2>SHARE #DRIVINGLUXURY WITH THE WORLD. </h2>
                                  <p>
                                    Find your favorite piece of inspiration <br>and share them to the world .
                                  </p>
                              </div><!-- end .promocontent -->
                          </div>
                        </div><!-- end .row -->
                    </div><!-- end .container -->
              </div>
            <div class="container">
                <div class="row">
                    <div class="luxuryimg row">
							 <div class="col-md-6" id="8">
                              <div class="luxbox w3">
                                <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/9.jpg" alt="" />
                                <div class="sharebox">
                                  <a class="fbshare" href="javascript:void(0)" onclick="shareFB('Inspire a world of #DrivingLuxury.','https://goo.gl/vGT6lP','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/9.jpg','','Share inspiration from the creators of #DrivingLuxury  from @BMW_indonesia https://goo.gl/vGT6lP')"><i class="icon-facebook">&nbsp;</i></a>
                                	<a class="twtshare" href="https://twitter.com/share?url=https://goo.gl/GiatqU&via=BMW_indonesia&hashtags=DrivingLuxury&text=Share inspiration from the creators of #DrivingLuxury. Visit https://goo.gl/GiatqU"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
                                	<a class="downloadshare" download="luxury.jpg" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/9.jpg"  target="_blank"><i class="icon-download">&nbsp;</i></a>
                                </div><!-- end .sharebox -->
                              </div><!-- end .luxbox -->
                            </div>
                            <div class="col-md-6" id="9">
                                <div class="luxbox w3">
                                  <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/10.jpg" alt="" />
                                  <div class="sharebox">
                                    <a class="fbshare" href="javascript:void(0)" onclick="shareFB('Inspire a world of #DrivingLuxury.','https://goo.gl/vGT6lP','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/10.jpg','','Share inspiration from the creators of #DrivingLuxury  from @BMW_indonesia https://goo.gl/vGT6lP')"><i class="icon-facebook">&nbsp;</i></a>
                                  	<a class="twtshare" href="https://twitter.com/share?url=https://goo.gl/GiatqU&via=BMW_indonesia&hashtags=DrivingLuxury&text=Share inspiration from the creators of #DrivingLuxury. Visit https://goo.gl/GiatqU"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
                                  	<a class="downloadshare" download="luxury.jpg" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/10.jpg"  target="_blank"><i class="icon-download">&nbsp;</i></a>
                                  </div><!-- end .sharebox -->
                                </div><!-- end .luxbox -->
                            </div>
							<div class="col-md-4" id="10">
                              <div class="luxbox w1">
                                <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/11.jpg" alt="" />
                                <div class="sharebox">
                                  <a class="fbshare" href="javascript:void(0)" onclick="shareFB('Inspire a world of #DrivingLuxury.','https://goo.gl/vGT6lP','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/11.jpg','','Share inspiration from the creators of #DrivingLuxury  from @BMW_indonesia https://goo.gl/vGT6lP')"><i class="icon-facebook">&nbsp;</i></a>
                                	<a class="twtshare" href="https://twitter.com/share?url=https://goo.gl/GiatqU&via=BMW_indonesia&hashtags=DrivingLuxury&text=Share inspiration from the creators of #DrivingLuxury. Visit https://goo.gl/GiatqU"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
                                	<a class="downloadshare" download="luxury.jpg" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/11.jpg"  target="_blank"><i class="icon-download">&nbsp;</i></a>
                                </div><!-- end .sharebox -->
                              </div><!-- end .luxbox -->
                            </div>
                            <div class="col-md-4" id="11">
                              <div class="luxbox w1">
                                <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/12.jpg" alt="" />
                                <div class="sharebox">
                                  <a class="fbshare" href="javascript:void(0)" onclick="shareFB('Inspire a world of #DrivingLuxury.','https://goo.gl/vGT6lP','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/12.jpg','','Share inspiration from the creators of #DrivingLuxury  from @BMW_indonesia https://goo.gl/vGT6lP')"><i class="icon-facebook">&nbsp;</i></a>
                                	<a class="twtshare" href="https://twitter.com/share?url=https://goo.gl/GiatqU&via=BMW_indonesia&hashtags=DrivingLuxury&text=Share inspiration from the creators of #DrivingLuxury. Visit https://goo.gl/GiatqU"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
                                	<a class="downloadshare" download="luxury.jpg" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/12.jpg"  target="_blank"><i class="icon-download">&nbsp;</i></a>
                                </div><!-- end .sharebox -->
                              </div><!-- end .luxbox -->
                            </div>

                            <div class="col-md-4" id="1">
                              <div class="luxbox w1">
                                <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/3.jpg" alt="" />
                                <div class="sharebox">
                                  <a class="fbshare" href="javascript:void(0)" onclick="shareFB('Inspire a world of #DrivingLuxury.','https://goo.gl/vGT6lP','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/3.jpg','','Share inspiration from the creators of #DrivingLuxury  from @BMW_indonesia https://goo.gl/vGT6lP')"><i class="icon-facebook">&nbsp;</i></a>
                                	<a class="twtshare" href="https://twitter.com/share?url=https://goo.gl/GiatqU&via=BMW_indonesia&hashtags=DrivingLuxury&text=Share inspiration from the creators of #DrivingLuxury. Visit https://goo.gl/GiatqU"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
                                	<a class="downloadshare" download="luxury.jpg" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/3.jpg"  target="_blank"><i class="icon-download">&nbsp;</i></a>
                                </div><!-- end .sharebox -->
                              </div><!-- end .luxbox -->
                            </div>
                            <div class="col-md-4" id="2">
                              <div class="luxbox w1">
                                <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/4.jpg" alt="" />
                                <div class="sharebox">
                                  <a class="fbshare" href="javascript:void(0)" onclick="shareFB('Inspire a world of #DrivingLuxury.','https://goo.gl/vGT6lP','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/4.jpg','','Share inspiration from the creators of #DrivingLuxury  from @BMW_indonesia https://goo.gl/vGT6lP')"><i class="icon-facebook">&nbsp;</i></a>
                                	<a class="twtshare" href="https://twitter.com/share?url=https://goo.gl/GiatqU&via=BMW_indonesia&hashtags=DrivingLuxury&text=Share inspiration from the creators of #DrivingLuxury. Visit https://goo.gl/GiatqU"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
                                	<a class="downloadshare" download="luxury.jpg" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/4.jpg"  target="_blank"><i class="icon-download">&nbsp;</i></a>
                                </div><!-- end .sharebox -->
                              </div><!-- end .luxbox -->
                            </div>
                            <div class="col-md-4" id="3">
                              <div class="luxbox w1">
                                <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/5.jpg" alt="" />
                                <div class="sharebox">
                                  <a class="fbshare" href="javascript:void(0)" onclick="shareFB('Inspire a world of #DrivingLuxury.','https://goo.gl/vGT6lP','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/5.jpg','','Share inspiration from the creators of #DrivingLuxury  from @BMW_indonesia https://goo.gl/vGT6lP')"><i class="icon-facebook">&nbsp;</i></a>
                                	<a class="twtshare" href="https://twitter.com/share?url=https://goo.gl/GiatqU&via=BMW_indonesia&hashtags=DrivingLuxury&text=Share inspiration from the creators of #DrivingLuxury. Visit https://goo.gl/GiatqU"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
                                	<a class="downloadshare" download="luxury.jpg" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/5.jpg"  target="_blank"><i class="icon-download">&nbsp;</i></a>
                                </div><!-- end .sharebox -->
                              </div><!-- end .luxbox -->
                            </div>
                            <div class="col-md-4" id="4">
                              <div class="luxbox w1">
                                <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/1.jpg" alt="" />
                                <div class="sharebox">
                                  <a class="fbshare" href="javascript:void(0)" onclick="shareFB('Inspire a world of #DrivingLuxury.','https://goo.gl/vGT6lP','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/1.jpg','','Share inspiration from the creators of #DrivingLuxury  from @BMW_indonesia https://goo.gl/vGT6lP')"><i class="icon-facebook">&nbsp;</i></a>
                                	<a class="twtshare" href="https://twitter.com/share?url=https://goo.gl/GiatqU&via=BMW_indonesia&hashtags=DrivingLuxury&text=Share inspiration from the creators of #DrivingLuxury. Visit https://goo.gl/GiatqU"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
                                	<a class="downloadshare" download="luxury.jpg" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/1.jpg"  target="_blank"><i class="icon-download">&nbsp;</i></a>
                                </div><!-- end .sharebox -->
                              </div><!-- end .luxbox -->
                            </div>
                            <div class="col-md-6" id="6">
                              <div class="luxbox w3">
                                <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/shareable_quote.jpg" alt="" />
                                <div class="sharebox">
                                  <a class="fbshare" href="javascript:void(0)" onclick="shareFB('Inspire a world of #DrivingLuxury.','https://goo.gl/vGT6lP','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/6.jpg','','Share inspiration from the creators of #DrivingLuxury  from @BMW_indonesia https://goo.gl/vGT6lP')"><i class="icon-facebook">&nbsp;</i></a>
                                	<a class="twtshare" href="https://twitter.com/share?url=https://goo.gl/GiatqU&via=BMW_indonesia&hashtags=DrivingLuxury&text=Share inspiration from the creators of #DrivingLuxury. Visit https://goo.gl/GiatqU"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
                                	<a class="downloadshare" download="luxury.jpg" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/shareable_quote.jpg"  target="_blank"><i class="icon-download">&nbsp;</i></a>
                                </div><!-- end .sharebox -->
                              </div><!-- end .luxbox -->
                            </div>
                            <div class="col-md-6" id="7">
                                <div class="luxbox w3">
                                  <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/7.jpg" alt="" />
                                  <div class="sharebox">
                                    <a class="fbshare" href="javascript:void(0)" onclick="shareFB('Inspire a world of #DrivingLuxury.','https://goo.gl/vGT6lP','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/7.jpg','','Share inspiration from the creators of #DrivingLuxury  from @BMW_indonesia https://goo.gl/vGT6lP')"><i class="icon-facebook">&nbsp;</i></a>
                                  	<a class="twtshare" href="https://twitter.com/share?url=https://goo.gl/GiatqU&via=BMW_indonesia&hashtags=DrivingLuxury&text=Share inspiration from the creators of #DrivingLuxury. Visit https://goo.gl/GiatqU"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
                                  	<a class="downloadshare" download="luxury.jpg" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/7.jpg"  target="_blank"><i class="icon-download">&nbsp;</i></a>
                                  </div><!-- end .sharebox -->
                                </div><!-- end .luxbox -->
                            </div>
							 <div class="col-md-8" id="5">
                              <div class="luxbox w2">
                                <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/2.jpg" alt="" />
								<div class="sharebox">
									<a class="fbshare" href="javascript:void(0)" onclick="shareFB('Inspire a world of #DrivingLuxury.','https://goo.gl/vGT6lP','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/2.jpg','','Share inspiration from the creators of #DrivingLuxury  from @BMW_indonesia https://goo.gl/vGT6lP')"><i class="icon-facebook">&nbsp;</i></a>
                                	<a class="twtshare" href="https://twitter.com/share?url=https://goo.gl/GiatqU&via=BMW_indonesia&hashtags=DrivingLuxury&text=Share inspiration from the creators of #DrivingLuxury. Visit https://goo.gl/GiatqU"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
                                	<a class="downloadshare" download="luxury.jpg" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/2.jpg"  target="_blank"><i class="icon-download">&nbsp;</i></a>
                                </div><!-- end .sharebox -->
                              </div><!-- end .luxbox -->
                            </div>
                    </div><!-- end .luxuryimg -->
                     <a href="#moreluxuryimg" class="loadmore"><span>Load More</span></a>
                </div><!-- end .row -->
            </div><!-- end .container -->
        </div><!-- end .thecontent -->
    </section>
    <div class="luxurybottom">
      <div class="bgart">
          <div class="heading">
                <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                            <div class="promocontent">
                                <h2>DISCOVER SHEER DRIVING LUXURY.</h2>
                                <p>
                                Be among the select few to embrace the future of luxury
      with the all-new BMW 7 Series. Encounter a unique combination
      of state-of-the-art comfort, dynamic agility and elegant styling.
      The all-new BMW 7 Series is built to re-set the standard of luxurious travel.
                                </p>
                            </div><!-- end .promocontent -->
                      </div>
                    </div><!-- end .row -->
                </div><!-- end .container -->
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                  <div class="bannerbox">
                    <div class="videobot">
                        <div id="video7series" class="videoPlayer click-to-play-video inactive-state">
                            <div id="player-playervideo7series" class="player"></div>
                        </div><!-- end #containervideo -->
                        <a href="#video7series" id="playbutton3">
                         <img id="thumbvid" class='thumbvideo' src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/vid.jpg"/></a>
                    </div>
                  </div>
              </div><!-- end .col-md-6 -->
              <div class="col-md-6">
                  <div class="bannerbox">
                    <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/8.jpg" alt="" />
                    <div class="buttonbox">
                      <a href="http://www.bmw.co.id/en/all-models/7-series/sedan/2015/at-a-glance.html" target="_blank" class="button btnblue">LEARN MORE</a>
                      <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
download" target="_blank" class="button btnblue">E-BROCHURE</a>
                      <a href="http://www.bmw.co.id/en/integration/testdrive.html" target="_blank" class="button btnblue">TEST DRIVE</a>
                    </div>
                  </div>
              </div><!-- end .col-md-6 -->
            </div><!-- end .row -->
          </div><!-- end .container -->
      </div>
    </div>
</div>
<div class="social">
<!--     <a class="facebookshare"  target="_blank" href="http://www.facebook.com/sharer.php?s=100&p[title]=THE BMW X1&p[url]=<?php echo $this->_tpl_vars['basedomain']; ?>
programs/BMWX1&p[summary]=THE BMW X1. NOW STARTING FROM IDR 599 MILLION ON THE ROAD. More info on <?php echo $this->_tpl_vars['basedomain']; ?>
programs/BMWX1&p[images][0]=<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/THEBMWX1.jpg" data-url="<?php echo $this->_tpl_vars['basedomain']; ?>
programs/BMWX1"> <i class="icon-facebook">&nbsp;</i></a> -->
	<a class="facebookshare" href="javascript:void(0)" onclick="shareFB('Inspire a world of #DrivingLuxury.','<?php echo $this->_tpl_vars['basedomain']; ?>
drivingluxury','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/2.jpg','','Share inspiration from the creators of #DrivingLuxury. Visit <?php echo $this->_tpl_vars['basedomain']; ?>
drivingluxury')"><i class="icon-facebook">&nbsp;</i></a>
	<a class="twittershare" href="https://twitter.com/share?url=https://mybmw.co.id/drivingluxury&via=BMW_indonesia&hashtags=BMW7Series&text=Share inspiration from the creators of #DrivingLuxury. Visit mybmw.co.id/drivingluxury"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
</div>
<footer id="footer">
<?php echo $this->_tpl_vars['footer']; ?>

</footer>

<script>
<?php echo '
$(document).ready(function(){
			$(".twittershare").on("click", function(){
			var  typenya = 2;

				$.ajax({
                        \'type\': \'POST\',
                        \'url\': basedomain+\'tracking\',
                        \'data\': {typenya:typenya},
						\'dataType\':\'json\'

					})
				});
			});
'; ?>

</script>
<script>
<?php echo '

	function shareFB(fb_name,fb_link,fb_img,fb_user,fb_post){
			$("#bg-popup").fadeOut();
			$(".popup,.popup2").fadeOut();
			FB.init();
			FB.ui({
				method: \'feed\',
				name: fb_name,
				link: fb_link,
				picture: fb_img,
				caption: fb_user,
				description: fb_post


			});

		}
'; ?>

</script>