<?php /* Smarty version 2.6.13, created on 2016-08-03 14:05:26
         compiled from application/web/apps/promotion.html */ ?>
<div id="promotionDetail">
    <section id="promo" class="section autoheight" data-0="top:0px" data-100="top:-105px;">
        <div class="thecontent">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 promocontent">
                        <h2>8.8 MIO/MONTH for<br />
                         THE BMW 5 SERIES IS SURELY HARD TO RESIST.</h2>
						<h3>Run More Efficiently at 24km/l<br /> with The BMW 520<span style="text-transform:lowercase;">d</span> <br />
							New Twinpower turbo diesel engine.</h3><br /> 
                        <p>Experience the versatile, sporty, yet elegant BMW 5 Series <br />for 3 years monthly installment with balloon payment.<br />
                        </p>
                         <p>Write to <a href="mailto:contact.us@bmw.co.id">contact.us@bmw.co.id</a> to find out more details on
    your financing scheme, or</p>
                            <a href="http://bmw.co.id/id/en/general/testdrive/testdrive.html" target="_blank" class="button btnblue test_drive">Request a test drive</a><br />
                        <div class="bottomtexts"><br />
                        <p>
					 <span class="small"><i>*Fuel consumption is determined in accordance with the ECE driving cycle
made up of approximately one-third urban traffic and two-thirds extra-urban driving.</i><br />
<i>**This program is only applicable for NIK 2014 vehicles only.</i></span></p>
                        </div>
                    </div><!-- end .col-md-6 -->
                </div><!-- end .row -->
            </div><!-- end .container -->
        </div><!-- end .thecontent -->
    </section>
</div>
<div class="social">
	<a class="facebookshare" href="javascript:void(0)" onclick="shareFB('MyBMW','<?php echo $this->_tpl_vars['basedomain']; ?>
promotion','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/1.jpg','','8,8 mio/month on the BMW 5 Series. More info on <?php echo $this->_tpl_vars['basedomain']; ?>
programs/BMW_5_Series')"><i class="icon-facebook">&nbsp;</i></a>
	<a class="twittershare" href="http://twitter.com/share?text=8,8 mio/month on the BMW 5 Series. More info on &url=<?php echo $this->_tpl_vars['basedomain']; ?>
programs/BMW_5_Series"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
</div>
<?php echo $this->_tpl_vars['navigation']; ?>

<footer id="footer" data-0="bottom:-105px" data-100="bottom:0px;">
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