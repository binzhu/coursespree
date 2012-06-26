<?php /* Smarty version 2.6.26, created on 2012-05-15 11:52:07
         compiled from includes/blocks/online_users.tpl */ ?>
<?php echo ''; ?><?php $_from = $this->_tpl_vars['T_ONLINE_USERS_LIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['online_users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['online_users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['online_users']['iteration']++;
?><?php echo '#filter:login-'; ?><?php echo $this->_tpl_vars['item']['login']; ?><?php echo '#'; ?><?php if (! ($this->_foreach['online_users']['iteration'] == $this->_foreach['online_users']['total'])): ?><?php echo ',&nbsp;'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; else: ?><?php echo ''; ?><?php if ($this->_tpl_vars['T_CONFIGURATION']['display_empty_blocks']): ?><?php echo '<span class = "small emptyCategory">'; ?><?php echo @_NOONELOGGEDIN; ?><?php echo '</span>'; ?><?php endif; ?><?php echo ''; ?><?php endif; unset($_from); ?><?php echo ''; ?>