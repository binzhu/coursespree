<?php /* Smarty version 2.6.26, created on 2012-05-16 07:13:15
         compiled from includes/personal/mapped_accounts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/personal/mapped_accounts.tpl', 41, false),)), $this); ?>
<?php ob_start(); ?>
 <div class = "headerTools">
  <span>
   <img src = "images/16x16/add.png" alt = "<?php echo @_ADDACCOUNT; ?>
" title = "<?php echo @_ADDACCOUNT; ?>
">
   <a href = "javascript:void(0)" onclick = "$('add_account').show();"><?php echo @_ADDACCOUNT; ?>
</a>
  </span>
 </div>
 <div id = "add_account" style = "display:none">
  <?php echo @_LOGIN; ?>
: <input type = "text" name = "account_login" id = "account_login">
  <?php echo @_PASSWORD; ?>
: <input type = "password" name = "account_password" id = "account_password">
  <img class = "ajaxHandle" src = "images/16x16/success.png" alt = "<?php echo @_ADD; ?>
" title = "<?php echo @_ADD; ?>
" onclick = "addAccount(this)">
  <img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_CANCEL; ?>
" title = "<?php echo @_CANCEL; ?>
" onclick = "$('add_account').hide();">
 </div>
 <br/>
 <fieldset class = "fieldsetSeparator">
  <legend><?php echo @_ADDITIONALACCOUNTS; ?>
</legend>
  <table id = "additional_accounts">
  <?php $_from = $this->_tpl_vars['T_ADDITIONAL_ACCOUNTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['additional_accounts_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['additional_accounts_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['additional_accounts_list']['iteration']++;
?>
   <tr><td>#filter:login-<?php echo $this->_tpl_vars['item']; ?>
#&nbsp;</td>
    <td><img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETEACCOUNT; ?>
" title = "<?php echo @_DELETEACCOUNT; ?>
" onclick = "deleteAccount(this, '<?php echo $this->_tpl_vars['item']; ?>
')"></td>
  <?php endforeach; else: ?>
   <tr id = "empty_accounts"><td class = "emptyCategory"><?php echo @_YOUHAVENTSETADDITIONALACCOUNTS; ?>
</td></tr>
  <?php endif; unset($_from); ?>
  </table>
 </fieldset>

 <?php if ($this->_tpl_vars['T_FACEBOOK_ENABLED']): ?>
 <fieldset class = "fieldsetSeparator" id = "facebook_accounts">
  <legend><?php echo @_FACEBOOKMAPPEDACCOUNT; ?>
</legend>
  <table id = "additional_accounts">
  <?php if ($this->_tpl_vars['T_FB_ACCOUNT']): ?>
   <tr><td><?php echo $this->_tpl_vars['T_FB_ACCOUNT']['fb_name']; ?>
&nbsp;</td>
    <td><img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETEACCOUNT; ?>
" title = "<?php echo @_DELETEACCOUNT; ?>
" onclick = "deleteFacebookAccount(this, '<?php echo $this->_tpl_vars['T_FB_ACCOUNT']['users_LOGIN']; ?>
')"></td>
  <?php else: ?>
   <tr><td class = "emptyCategory"><?php echo @_YOUHAVENTSETFACEBOOKACCOUNT; ?>
</td></tr>
  <?php endif; ?>
  </table>
 </fieldset>
 <?php endif; ?>
<?php $this->_smarty_vars['capture']['t_additional_accounts_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo smarty_function_eF_template_printBlock(array('title' => @_MAPPEDACCOUNTS,'data' => $this->_smarty_vars['capture']['t_additional_accounts_code'],'image' => '32x32/user_mapping.png'), $this);?>
