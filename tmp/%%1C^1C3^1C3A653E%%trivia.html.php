<?php /* Smarty version 2.6.13, created on 2016-03-23 08:35:17
         compiled from application/web/apps/trivia.html */ ?>

<?php echo $this->_tpl_vars['navigation']; ?>

<div id="trivia">
    <section class="section">
        <div class="container trivia">
        	<div class="row">
            	<div class="col-md-12">
                	<div id="contentnya" class="contentnya" >
                    <div id="popupnya" class="banner800x600px2" >
<section class="wrappers">
<section class="block">
    <form name="myform" id="myform" method="GET" onSubmit="return onsubmitform();" >
    <section id="tab1">
    <div class="form2"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/quest1.png" /><br>
        <label><input type="radio" name="ask1" value="AT"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/ans1_a.png" /></label>
        <label><input type="radio" name="ask1" value="GT"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/ans1_b.png" /></label><br>
        <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/quest2.png" /><br>
        <label><input type="radio" name="ask2" value="GT"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/ans2_a.png" /></label>
        <label><input type="radio" name="ask2" value="AT"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/ans2_b.png" /></label><br>
        <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/quest3.png" /><br>
        <label><input type="radio" name="ask3" value="GT"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/ans3_a.png" /></label>
        <label><input type="radio" name="ask3" value="AT"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/ans3_b.png" /></label><br>
        <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/quest4.png" /><br>
        <label><input type="radio" name="ask4" value="AT"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/ans4_a.png" /></label>
        <label><input type="radio" name="ask4" value="GT"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/ans4_b.png" /></label><br>
        <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/quest5.png" /><br>
        <label><input type="radio" name="ask5" value="GT"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/ans5_a.png" /></label>
        <label><input type="radio" name="ask5" value="AT"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase1/ans5_b.png" /></label>        
        <a class="lanjut button btnblue" id="lanjut" onClick="javascript:lanjutBtn()">SELANJUTNYA</a>
    </div>                        
    </section>
    <section id="tab2" style="display:none;">

    <h3 style= "color:#ffffff; font-size: 24px; margin: 0 0 20px 0; text-shadow: 1px 1px 1px #000"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/phase2/title_v2.png" /></h3>
    <div class="form">
        <input name="name" type="text" id="name" placeholder="Name" required><br>
        <input name="email" id="email" type="email" placeholder="Email" required><br>
        <input name="phone" id="phone" type="text" placeholder="Mobile Number" required><br>
        <button class="button btnblue" type="reset">CLEAR</button>
        <button class="button btnblue" id="next" >NEXT</button>
    </div>
    </section>
    </form>
</section>
</section>
</div>
</div><!--end.800x600-->
</div><!--end.collapse-->
<script>
<?php echo '
function onsubmitform(){
    var v1=$(\'input[name=ask1]:checked\', \'#myform\').val();
    var v2=$(\'input[name=ask2]:checked\', \'#myform\').val();
    var v3=$(\'input[name=ask3]:checked\', \'#myform\').val();
    var v4=$(\'input[name=ask4]:checked\', \'#myform\').val();
    var v5=$(\'input[name=ask5]:checked\', \'#myform\').val();
    var name=$("#name").val();
    var email=$("#email").val();
    var phone=$("#phone").val();

    //seting clickTag
    //${CLICK_URL}    
    var CLICK_URL ="";
    var landingPage = CLICK_URL + "http://preview.cpxi-indonesia.com/bmwform/log.php?&v1="+v1+"&v2="+v2+"&v3="+v3+"&v4="+v4+"&v5="+v5+"&name="+name+"&email="+email+"&phone="+phone;

    document.myform.action =landingPage;
    return true;    
}


'; ?>

</script>
                </div>
            </div>
    </section>
</div>
<footer id="footer">
 <?php echo $this->_tpl_vars['footer']; ?>

</footer>