<?php /* Smarty version 2.6.13, created on 2016-12-28 10:20:45
         compiled from application/web//meta.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'json_encode', 'application/web//meta.html', 60, false),)), $this); ?>
<head>
	<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MYBMW</title>
        <!--  <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="BMW Adventure, Bromo, Namibia, BMW F45" />
        <meta name="keywords" content="BMW Adventure, Bromo, Namibia, BMW F45" />
        <meta name="author" content="BMW" /> -->
		<meta property="og:site_name" content="Mybmw"/>

		<meta property="og:type" content="article" />
		<meta property="og:url" content="<?php echo $this->_tpl_vars['basedomain']; ?>
home" />
		<meta property="og:title" content="Mybmw" />
		<meta property="og:description" content="BMW Adventure, Bromo, Namibia, BMW F45" />

		<meta property="og:locale" content="en_us" />
		<meta property="og:image" content="https://www.mybmw.co.id/assets/images/sharefb.jpg" />
		<meta property="og:image:width" content="900">
		<meta property="og:image:height" content="900">

		<?php if ($this->_tpl_vars['pages'] == 'drivingluxury'): ?>
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@BMW_indonesia" />
		<meta name="twitter:title" content="Inspire a world of #DrivingLuxury. " />
		<meta name="twitter:description" content="Share inspiration from the creators of #DrivingLuxury. Visit mybmw.co.id/drivingluxury #BMW7Series." />
		<meta name="twitter:image" content="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/luxury/2.jpg" />
		<?php endif; ?>

		<meta property="fb:app_id" content="608698679274486" />
		<link rel="canonical" href="<?php echo $this->_tpl_vars['basedomain']; ?>
home" />
        <link rel="shortcut icon" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/favicon.png">
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/wow-animate/animate.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/bmwfont/bmwfont.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/eufont/eufont.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/superfish/css/superfish.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/jquery.bxslider/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/magnific-popup/magnific-popup.css" />
        <?php if ($this->_tpl_vars['pages'] == 'bromo' || $this->_tpl_vars['pages'] == 'namibia' || $this->_tpl_vars['pages'] == 'destination' || $this->_tpl_vars['pages'] == 'discover'): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/fullPage/jquery.fullPage.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/bootstrap-wysihtml5/wysiwyg-color.css" />
        <?php endif; ?>
	<?php if ($this->_tpl_vars['pages'] == 'bromo'): ?>
		<meta http-equiv="refresh" content="0; url=<?php echo $this->_tpl_vars['basedomain']; ?>
discover/detail/111">
	<?php endif; ?>
	<?php if ($this->_tpl_vars['pages'] == 'namibia'): ?>
                <meta http-equiv="refresh" content="0; url=<?php echo $this->_tpl_vars['basedomain']; ?>
discover/detail/112">
        <?php endif; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/bmw_newlayout.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/banner.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/responsive.css" />
		     <script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/jquery.js"></script>
	<script async type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/jquery-ui.min.js"></script>
	<script>
		var basedomain = "<?php echo $this->_tpl_vars['basedomain']; ?>
" ;
		var basedomainpath = "<?php echo $this->_tpl_vars['basedomainpath']; ?>
" ;
		var pages = "<?php echo $this->_tpl_vars['pages']; ?>
" ;
		var locale = <?php echo json_encode($this->_tpl_vars['locale']); ?>
;
	</script>
		<script async type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/vendor/modernizr.js"></script>
		<script>var basedomain = "<?php echo $this->_tpl_vars['basedomain']; ?>
";</script>
    </head>