<?php /* Smarty version 2.6.13, created on 2016-12-20 11:56:04
         compiled from application/web/apps/NationalPromo.html */ ?>

<?php echo $this->_tpl_vars['navigation']; ?>

<section id="NationalPromo">
    <div class="container">
        <div class="row">
            <div class="col-md-8">                      
                <h1>DRIVING PLEASURE<br>COMES EARLIER.</h1>
                <h3>BUY NOW. PAY NEXT YEAR.</h3>
             	<p>Program berlaku hanya untuk BMW Active Tourer, BMW Gran Tourer dan BMW 3 Series.<br>
                    Untuk pertanyaan lebih lanjut hubungi kami di BMW Call Center (021) 2927 9677,<br>
                    Sen - Jum, 09.00 - 17.00 atau email ke contact.us@bmw.co.id</p>
                <p>*Cicilan dibayarkan mulai tahun 2017.<br>
                Syarat dan Ketentuan berlaku.</p>
            </div>
            <div class="col-md-4">
                <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/logo_nationalProgram.png" class="nationalProgramLogo" /><br><br>
                <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/BMWIndonesia_FinancingScheme_GIIAS2016.pdf" class="button btnblue" style="margin-bottom:20px">
                    <i class="fa fa-download fa-lg"></i> Download
                </a>
            </div><!-- end .col-md-4 -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</section>
<div class="social">
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