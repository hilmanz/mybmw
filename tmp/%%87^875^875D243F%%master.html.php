<?php /* Smarty version 2.6.13, created on 2016-12-28 10:20:45
         compiled from application/web//master.html */ ?>
<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js the-<?php echo $this->_tpl_vars['pages']; ?>
" lang="en"><!--<![endif]-->
<?php echo $this->_tpl_vars['meta']; ?>

 <body id="home" class="the-<?php echo $this->_tpl_vars['pages']; ?>
">
   <?php echo $this->_tpl_vars['mainContent']; ?>

		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/wow-animate/wow.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/countdown/jquery.plugin.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/countdown/jquery.countdown.js"></script>
        <script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/imagesloaded.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/enquire.min.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/skrollr-master/dist/skrollr.min.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/superfish/js/hoverIntent.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/superfish/js/superclick.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/superfish/js/supersubs.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/validation/lib/jquery.mockjax.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/validation/lib/jquery.form.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/validation/dist/jquery.validate.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/jquery.bxslider/jquery.bxslider.min.js"></script>
        <?php if ($this->_tpl_vars['pages'] == 'bromo' || $this->_tpl_vars['pages'] == 'namibia' || $this->_tpl_vars['pages'] == 'discover'): ?>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/fullPage/jquery.fullPage.js"></script>
        <?php endif; ?>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/checkbox/jspatch.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/custom.js"></script>
       <?php if ($this->_tpl_vars['pages'] == 'bromo' || $this->_tpl_vars['pages'] == 'namibia' || $this->_tpl_vars['pages'] == 'discover'): ?>
            <?php echo '
            <script type="text/javascript">
                $(document).ready(function() {
                    $(\'#fullpage\').fullpage({
						verticalCentered: false,
						css3:false,
       					 autoScrolling: false,
                    });
                });
            </script>
            '; ?>

        <?php endif; ?>
        <?php echo '
		<script>
        jQuery(function() {
            $.mockjax({
                url: "save.action",
                response: function(settings) {
                	var email = settings.data.match(/email=(.+?)($|&)/)[1];
                	var status = settings.data.match(/subcribe=(.+?)($|&)/)[1];
                	var url = basedomain+"inform/subcribe";
                	$.ajax({
                		type:"POST",
                		url:url,
                		data:"email="+email+"&subcribe="+status
                	});
                	this.responseText = "Thank you for  your interest in BMW!";
                },
                responseStatus: 200,
                responseTime: 500
            });

            // LOADING
            var loader = jQuery(\'<div id="loader">LOADING...</div>\')
                .css({
                    position: "relative",
                    top: "1em",
                    left: "25em",
                    display: "inline"
                })
                .appendTo("#subscribeForm")
                .hide();
            jQuery().ajaxStart(function() {
                loader.show();
            }).ajaxStop(function() {
                loader.hide();
            }).ajaxError(function(a, b, e) {
                throw e;
            });

            var v = jQuery("#subscribe").validate({
                submitHandler: function(form) {
					$( "#subscribeField" ).hide( );
                    jQuery(form).ajaxSubmit({
                        target: "#result"
                    });
                }
            });

        });
        </script>
        '; ?>

        <!--[if lt IE 9]>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/skrollr-master/skrollr-ie/dist/skrollr.ie.min.js"></script>
        <![endif]-->

        <script type="text/javascript">
		<?php echo '

		$.getScript(\'//connect.facebook.net/en_US/all.js\', function(){
			FB.init({
			  appId: \'608698679274486\',
			});
		 });


		window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));

		'; ?>

        </script>
        <?php echo '

		<script>
  			(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
  			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  			})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

  			ga(\'create\', \'UA-867847-64\', \'auto\');
  			ga(\'send\', \'pageview\');
		</script>

        '; ?>

        <?php echo '
        <script src="//tt.mbww.com/tt-8f08fb89c225a58e92455fae25d3df22bda90a094bfc8e0240b8a9bd94318159.js" async>
        </script>
        <!-- Google Code for Remarketing Tag -->
        <!--------------------------------------------------
        Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
        --------------------------------------------------->
        <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 948820800;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
        </script>
        <noscript>
        <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/948820800/?value=0&amp;guid=ON&amp;script=0"/>
        </div>
        </noscript>
        '; ?>



</body>
</html>