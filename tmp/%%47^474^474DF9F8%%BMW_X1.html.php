<?php /* Smarty version 2.6.13, created on 2016-08-02 15:18:46
         compiled from application/web/apps/BMW_X1.html */ ?>

<?php echo $this->_tpl_vars['navigation']; ?>

<div id="promotionDetail">
    <section id="THEBMWX1" class="section">
        <div class="thecontent" style="padding:70px 0 70px;">
            <div class="container">
                <div class="row">
                    <div class="promocontent">
                        <h2>IRRESISTIBLE IN MORE WAYS THAN ONE.</h2>
						<h3 style="margin:0 0 20px 0;">ENJOY 0% INTEREST FOR 2 YEARS ON THE BMW GRAN TOURER AND BMW ACTIVE TOURER.</h3>
                     				<p><a href="http://www.bmw.co.id/en/all-models/2-series/activetourer/2014/at-a-glance.html" target="_blank">BMW Active Tourer</a>, the new breed BMW that combines flexibility
with space and style. Having numerous clever storage solutions,
space goes without saying - not to mention reserving you a lot of
room for Driving Pleasure.</p>
<p>
<a href="http://www.bmw.co.id/en/all-models/2-series/grantourer/2015/at-a-glance.html" target="_blank">BMW Gran Tourer</a>, the 7 seats with a spacious boot, and still enough
room for exhilarating driving. Optional flexibility and maximal functionality.
Once you're behind the wheel, you'll see what you get out
this arrangement: the best of everything.
</p>
                         <p>Write to <a href="mailto:contact.us@bmw.co.id">contact.us@bmw.co.id</a> to find out more details on
product specification and your financing scheme, or</p>
                            <a href="http://www.bmw.co.id/en/integration/testdrive.html" target="_blank" class="button btnblue test_drive">Request a test drive</a><br />
                        <div class="bottomtexts"><br />
                        <p>
					 <span class="small"><i>*Terms and conditions apply.</i></span></p>
                     	<p>More information: <br />
                     		BMW Call Center<br />
                        	021 2927 9677<br />
                            Mon-Fri, 09.00-17.00</p>

<p id="BMWFSLogos"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/BMWFSLogo.png" width="300" /></p>
                        </div>
                    </div><!-- end .col-md-6 -->
                </div><!-- end .row -->
            </div><!-- end .container -->
        </div><!-- end .thecontent -->
    </section>
</div>
<div class="social">
<!--     <a class="facebookshare"  target="_blank" href="http://www.facebook.com/sharer.php?s=100&p[title]=THE BMW X1&p[url]=<?php echo $this->_tpl_vars['basedomain']; ?>
programs/BMWX1&p[summary]=THE BMW X1. NOW STARTING FROM IDR 599 MILLION ON THE ROAD. More info on <?php echo $this->_tpl_vars['basedomain']; ?>
programs/BMWX1&p[images][0]=<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/THEBMWX1.jpg" data-url="<?php echo $this->_tpl_vars['basedomain']; ?>
programs/BMWX1"> <i class="icon-facebook">&nbsp;</i></a> -->
	<a class="facebookshare" href="javascript:void(0)" onclick="shareFB('MyBMW','<?php echo $this->_tpl_vars['basedomain']; ?>
programs/BMWX1','<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/THEBMWX1.jpg','','THE BMW X1. NOW STARTING FROM IDR 599 MILLION ON THE ROAD. More info on <?php echo $this->_tpl_vars['basedomain']; ?>
programs/BMWX1')"><i class="icon-facebook">&nbsp;</i></a>
	<a class="twittershare" href="http://twitter.com/share?text=THE BMW X1. NOW STARTING FROM IDR 599 MILLION ON THE ROAD. More info on &url=<?php echo $this->_tpl_vars['basedomain']; ?>
programs/BMWX1"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
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