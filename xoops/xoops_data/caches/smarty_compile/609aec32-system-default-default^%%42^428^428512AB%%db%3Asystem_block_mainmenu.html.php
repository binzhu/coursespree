<?php /* Smarty version 2.6.26, created on 2012-06-20 00:12:29
         compiled from db:system_block_mainmenu.html */ ?>
<div id="mainmenu">
    <a class="menuTop <?php if (! $this->_tpl_vars['block']['nothome']): ?>maincurrent<?php endif; ?>" href="<?php echo 'http://coursespree.com/xoops/'; ?>" title="<?php echo $this->_tpl_vars['block']['lang_home']; ?>
"><?php echo $this->_tpl_vars['block']['lang_home']; ?>
</a>
    <!-- start module menu loop -->
    <?php $_from = $this->_tpl_vars['block']['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module']):
?>
		<a class="menuMain <?php if ($this->_tpl_vars['module']['highlight']): ?>maincurrent<?php endif; ?>" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['module']['directory']; ?>
/" title="<?php echo $this->_tpl_vars['module']['name']; ?>
"><?php echo $this->_tpl_vars['module']['name']; ?>
</a>
		<?php $_from = $this->_tpl_vars['module']['sublinks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sublink']):
?>
			<a class="menuSub" href="<?php echo $this->_tpl_vars['sublink']['url']; ?>
" title="<?php echo $this->_tpl_vars['sublink']['name']; ?>
"><?php echo $this->_tpl_vars['sublink']['name']; ?>
</a>
		<?php endforeach; endif; unset($_from); ?>
    <?php endforeach; endif; unset($_from); ?>
    <!-- end module menu loop -->
</div>