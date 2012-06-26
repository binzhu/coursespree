<?php /* Smarty version 2.6.26, created on 2012-05-15 11:51:07
         compiled from includes/footer_code.tpl */ ?>
<?php if ($this->_tpl_vars['T_THEME_SETTINGS']->options['show_footer'] && $this->_tpl_vars['T_CONFIGURATION']['show_footer']): ?>
 <?php if ($this->_tpl_vars['T_CONFIGURATION']['additional_footer']): ?>
  <?php echo $this->_tpl_vars['T_CONFIGURATION']['additional_footer']; ?>

 <?php else: ?>
  <div><a href = "<?php echo @_EFRONTURL; ?>
"><?php echo @_EFRONTNAME; ?>
</a> (version <?php echo @G_VERSION_NUM; ?>
) &bull; <?php echo $this->_tpl_vars['T_VERSION_TYPE']; ?>
 Edition &bull; <a href = "index.php?ctg=contact"><?php echo @_CONTACTUS; ?>
</a></div>
 <?php endif; ?>
<?php endif; ?>