<?php /* Smarty version 2.6.26, created on 2012-05-15 11:52:07
         compiled from includes/blocks/news.tpl */ ?>
<?php echo ''; ?><?php $_from = $this->_tpl_vars['T_NEWS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['news_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['news_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['news_list']['iteration']++;
?><?php echo '<div class = "newsTitle"><div>#filter:timestamp-'; ?><?php echo $this->_tpl_vars['item']['timestamp']; ?><?php echo '#</div>'; ?><?php echo $this->_tpl_vars['item']['title']; ?><?php echo '</div><div class = "newsContent">'; ?><?php echo $this->_tpl_vars['item']['data']; ?><?php echo '</div>'; ?><?php endforeach; else: ?><?php echo ''; ?><?php if ($this->_tpl_vars['T_CONFIGURATION']['display_empty_blocks']): ?><?php echo '<span class = "small emptyCategory">'; ?><?php echo @_NOSYSTEMANNOUNCEMENTS; ?><?php echo '</span>'; ?><?php endif; ?><?php echo ''; ?><?php endif; unset($_from); ?><?php echo ''; ?>