<?php /* Smarty version 2.6.13, created on 2016-12-28 10:20:44
         compiled from application/web//navigation.html */ ?>
<nav id="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
				<div id="mobnav-btn"><i class="icon-navicon">&nbsp;</i></div>
                <ul class="navmenu sf-menu" id="main-menu">
                    <li <?php if ($this->_tpl_vars['pages'] == 'home'): ?> class="active" <?php endif; ?>><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
home">Home</a></li>
                    <!-- <li <?php if ($this->_tpl_vars['pages'] == 'GIIAS2016'): ?> class="active" <?php endif; ?>><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
GIIAS2016">GIIAS 2016</a></li> -->
                    <li <?php if ($this->_tpl_vars['pages'] == 'drivingluxury'): ?> class="active" <?php endif; ?>><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
drivingluxury">Driving Luxury</a></li>
                    <li class="hasdrop <?php if ($this->_tpl_vars['pages'] == 'bromo' || $this->_tpl_vars['pages'] == 'namibia' || $this->_tpl_vars['pages'] == 'destination' || $this->_tpl_vars['pages'] == 'discover'): ?> active <?php endif; ?>" ><a href="#">Discover</a>
       					<div class="mobnav-subarrow"><i class="icon-chevron-right">&nbsp;</i></div>
                        <ul>
                            <li <?php if ($this->_tpl_vars['pages'] == 'trivia'): ?> class="active" <?php endif; ?>><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
trivia">Personality Quiz</a></li>
                            <li><a href="#">BMW Driving Experience</a>
                                <ul>
									<?php if ($this->_tpl_vars['menugetDestinations']): ?>
										<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['menugetDestinations']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
											 <li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
discover/detail/<?php echo $this->_tpl_vars['menugetDestinations'][$this->_sections['j']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['menugetDestinations'][$this->_sections['j']['index']]['menu']; ?>
</a></li>
										<?php endfor; endif; ?>

									<?php endif; ?>
                                </ul>
                    		</li>
                        </ul>
                    </li>

                    <li  class="hasdrop <?php if ($this->_tpl_vars['pages'] == 'programs'): ?>active <?php endif; ?>"><a href="#TGT">Programs</a>
       					<div class="mobnav-subarrow"><i class="icon-chevron-right">&nbsp;</i></div>
                            <ul class="programmenu">
                                <li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
programs/GIIAS2016">GIIAS 2016</a></li>
                                <!--<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
programs/NationalPromo">National Programs</a></li>
                                <li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
programs/BMWX1">Dealer Programs</a>
                                    <div class="mobnav-subarrow"><i class="icon-chevron-right">&nbsp;</i></div>
                                     <ul class="">
                                       <li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
programs/BMW3SeriesBestindo">320d</a></li>
                                    </ul>
                                </li>-->
                            </ul>
                    </li>
                    <li <?php if ($this->_tpl_vars['pages'] == 'bmwproductgenius'): ?> class="active" <?php endif; ?>><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
bmwproductgenius">BMW Genius &amp; Call Center</a></li>
                    <li><a href="http://www.bmw.co.id/en/integration/testdrive.html" class="test_drive"  target="_blank">Test Drive</a></li>
                </ul>
            </div><!-- end .col-md-9 -->
			<span style="display:none;" class="temptarget"></span>
            <div class="col-md-3">
                <div class="logo-nav">
                    <a class="iconBmwID">&nbsp;</a>
                    <a class="iconBmw">&nbsp;</a>
                </div>
            </div><!-- end .col-md-3 -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</nav><!-- end #navigation -->