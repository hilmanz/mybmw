<?php /* Smarty version 2.6.13, created on 2016-10-14 12:26:49
         compiled from application/web/apps/destination_detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'application/web/apps/destination_detail.html', 72, false),)), $this); ?>
<?php echo '
<style>
		'; ?>

		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dataDestination']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?> 
		#bromo-<?php echo $this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['idPages'];  echo '{'; ?>

			background-image: url(<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/bmwpic/page/<?php echo $this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['baground']; ?>
);
			<?php echo '
		}
		'; ?>

		<?php endfor; endif; ?>
		<?php echo '
@media (max-width: 1100px) {
		'; ?>

		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dataDestination']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?> 
		#bromo-<?php echo $this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['idPages'];  echo '{'; ?>

			background-image: url(<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/bmwpic/page/<?php echo $this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['ipad_land_page']; ?>
);
			<?php echo '
		}
		'; ?>

		<?php endfor; endif; ?>
		<?php echo '
} 
@media only screen and (max-width: 800px) {
		'; ?>

		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dataDestination']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?> 
		#bromo-<?php echo $this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['idPages'];  echo '{'; ?>

			background-image: url(<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/bmwpic/page/<?php echo $this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['ipad_pot_page']; ?>
);
			<?php echo '
		}
		'; ?>

		<?php endfor; endif; ?>
		<?php echo '
}
@media (max-width: 600px) {
		'; ?>

		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dataDestination']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?> 
		#bromo-<?php echo $this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['idPages'];  echo '{'; ?>

			background-image: url(<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/bmwpic/page/<?php echo $this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['mobile_bg']; ?>
);
			<?php echo '
		}
		'; ?>

		<?php endfor; endif; ?>
		<?php echo '
}
</style>
'; ?>



<?php echo $this->_tpl_vars['navigation']; ?>

<div id="namibiaDetail">
    <div id="fullpage">
		<?php if ($this->_tpl_vars['dataDestination']): ?>
					<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dataDestination']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>  
						<section id="bromo-<?php echo $this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['idPages']; ?>
" class="section">
							<?php if ($this->_sections['i']['first'] || $this->_sections['i']['index'] && ! $this->_sections['i']['last']): ?>
							
							<?php $this->assign('running_total', $this->_sections['i']['index']+2); ?>
														<?php endif; ?>
							<?php if ($this->_sections['i']['last']): ?>
							<?php if ($this->_tpl_vars['dataDestination'][0]['gallery'] == 1): ?>
														<?php else: ?>
							<a class="scrolldown" id="scrolldown" href="#bromo-1"><i class="icon-chevron-up">&nbsp;</i></a>
							<?php endif; ?>
							<?php endif; ?>
							
							<!-- <a class="scrolldown" id="scrolldown" href="#bromo-1"><i class="icon-chevron-up">&nbsp;</i></a> -->
							
							<div class="contentbanner <?php if ($this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['potition'] == 'center'):  else: ?>fontblack<?php endif; ?> anim">
								<div class="container">
									<div class="row <?php echo ((is_array($_tmp=$this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['potition'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
										
										<?php if ($this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['potition'] == 'center'): ?>
										<div class="col-md-12">
									    <div class="centercontent">
										<h2 class="quote"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/quote.png" style="width:43px;" /></h2>
										<?php echo $this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['content']; ?>

										</div>
										<?php else: ?>
										<div class="col-md-6  <?php if ($this->_tpl_vars['dataDestination'][0]['id'] == 110): ?> fullwidth <?php endif; ?>">
										<?php echo $this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['content']; ?>

										<?php endif; ?>
										</div><!-- end .col-md-6 -->
									</div><!-- end .row -->
								</div><!-- end .container -->
							</div><!-- end .contentbanner -->

										 <?php if ($this->_tpl_vars['dataDestination'][$this->_sections['i']['index']]['idPages'] == 2): ?>
										 <?php if ($this->_tpl_vars['dataDestination'][0]['id'] == 110): ?>
											<div class="findmore">
												<div class="container">
																				<div class="row">
																					<div class="col-md-6   fullwidth ">
												Find out more:<br><b>BMW Call Center</b> <br>(021) 2927 9677<br>Mon–Fri, 09.00-17.00<br><br>*Travel period and program details is subject to change.<br>&nbsp;&nbsp; Reservation will be on first come first serve basis.
																					</div><!-- end .col-md-6 -->
																				</div><!-- end .row -->
																			</div><!-- end .container -->
											</div>
										<?php endif; ?>
										<?php endif; ?>
						</section>
					 <?php endfor; endif; ?>
		 <?php endif; ?>
		 <?php if ($this->_tpl_vars['dataDestination'][0]['gallery'] == 1): ?>
			 <section id="namibia-5" class="section">
		<div class="contentbanner">
            <div id="bannerpage">
                <div class="bannerpage">
                	<div class="flexslider">
                      <ul class="bxslider2">
                       <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['dataGallery']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>  
									  <li>
											<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/bmwpic/gallery/<?php echo $this->_tpl_vars['dataGallery'][$this->_sections['j']['index']]['file_name']; ?>
"  />
									  </li>
								 <?php endfor; endif; ?>
                      </ul>
                    </div>
                </div>
                <div class="shape"></div>
            </div>
                    </div><!-- end .contentbanner -->
    </section>
		 <?php endif; ?>
    </div>
</div>
 <?php if ($this->_tpl_vars['dataDestination'][0]['share'] == 'yes'): ?>
<div class="social">    
	<a class="facebookshare" href="javascript:void(0)" onclick="shareFB('MyBMW','<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/bmwpic/page/<?php echo $this->_tpl_vars['dataDestination'][0]['baground']; ?>
','','<?php echo $this->_tpl_vars['dataDestination'][0]['fbshare']; ?>
')"><i class="icon-facebook">&nbsp;</i></a>
	<a class="twittershare" href="http://twitter.com/share?text=<?php echo $this->_tpl_vars['dataDestination'][0]['twittershare']; ?>
"  target="_blank"><i class="icon-twitter">&nbsp;</i></a>
</div>
<?php endif; ?>
<footer id="footer">
 <?php echo $this->_tpl_vars['footer']; ?>

</footer>