<?php /* Smarty version 2.6.26, created on 2012-05-15 11:52:07
         compiled from includes/blocks/links.tpl */ ?>
<?php $_from = $this->_tpl_vars['T_CUSTOM_BLOCKS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['custom_block_links_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['custom_block_links_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['custom_block_links_list']['iteration']++;
?>
 <?php if ($this->_tpl_vars['T_POSITIONS']['enabled'][$this->_tpl_vars['key']] == 1): ?>
  <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a><br/>
 <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>