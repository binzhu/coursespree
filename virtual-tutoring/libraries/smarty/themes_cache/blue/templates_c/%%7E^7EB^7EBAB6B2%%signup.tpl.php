<?php /* Smarty version 2.6.26, created on 2012-05-15 11:59:59
         compiled from includes/blocks/signup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'includes/blocks/signup.tpl', 17, false),)), $this); ?>
        <?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['javascript']; ?>

        <form <?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['attributes']; ?>
>
      <?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['hidden']; ?>

      <div class = "formRow">
          <div class = "formLabel">
                    <div class = "header"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['login']['label']; ?>
</div>
                    <div class = "explanation" <?php if ($this->_tpl_vars['T_LDAP_USER']): ?>style = "display:none"<?php endif; ?>><?php echo @_ONLYALLOWEDCHARACTERSLOGIN; ?>
</div>
             </div>
          <div class = "formElement">
                 <div class = "field"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['login']['html']; ?>
</div>
              <?php if ($this->_tpl_vars['T_PERSONAL_INFO_FORM']['login']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['login']['error']; ?>
</div><?php endif; ?>
             </div>
         </div>
      <div class = "formRow" <?php if ($this->_tpl_vars['T_LDAP_USER']): ?>style = "display:none"<?php endif; ?>>
          <div class = "formLabel">
                    <div class = "header"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['password']['label']; ?>
</div>
                    <div class = "explanation"><?php echo ((is_array($_tmp=@_PASSWORDMUSTBE6CHARACTERS)) ? $this->_run_mod_handler('replace', true, $_tmp, "%x", $this->_tpl_vars['T_CONFIGURATION']['password_length']) : smarty_modifier_replace($_tmp, "%x", $this->_tpl_vars['T_CONFIGURATION']['password_length'])); ?>
</div>
             </div>
          <div class = "formElement">
                 <div class = "field"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['password']['html']; ?>
</div>
              <?php if ($this->_tpl_vars['T_PERSONAL_INFO_FORM']['password']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['password']['error']; ?>
</div><?php endif; ?>
             </div>
         </div>
      <div class = "formRow" <?php if ($this->_tpl_vars['T_LDAP_USER']): ?>style = "display:none"<?php endif; ?>>
          <div class = "formLabel">
                    <div class = "header"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['passrepeat']['label']; ?>
</div>
                    <div class = "explanation"></div>
             </div>
          <div class = "formElement">
                 <div class = "field"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['passrepeat']['html']; ?>
</div>
              <?php if ($this->_tpl_vars['T_PERSONAL_INFO_FORM']['passrepeat']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['passrepeat']['error']; ?>
</div><?php endif; ?>
             </div>
         </div>
      <div class = "formRow">
          <div class = "formLabel">
                    <div class = "header"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['email']['label']; ?>
</div>
                    <div class = "explanation"></div>
             </div>
          <div class = "formElement">
                 <div class = "field"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['email']['html']; ?>
</div>
              <?php if ($this->_tpl_vars['T_PERSONAL_INFO_FORM']['email']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['email']['error']; ?>
</div><?php endif; ?>
             </div>
         </div>
      <div class = "formRow">
          <div class = "formLabel">
                    <div class = "header"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['firstName']['label']; ?>
</div>
                    <div class = "explanation"></div>
             </div>
          <div class = "formElement">
                 <div class = "field"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['firstName']['html']; ?>
</div>
              <?php if ($this->_tpl_vars['T_PERSONAL_INFO_FORM']['firstName']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['firstName']['error']; ?>
</div><?php endif; ?>
             </div>
         </div>
      <div class = "formRow">
          <div class = "formLabel">
                    <div class = "header"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['lastName']['label']; ?>
</div>
                    <div class = "explanation"></div>
             </div>
          <div class = "formElement">
                 <div class = "field"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['lastName']['html']; ?>
</div>
              <?php if ($this->_tpl_vars['T_PERSONAL_INFO_FORM']['lastName']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['lastName']['error']; ?>
</div><?php endif; ?>
             </div>
         </div>
        <?php $_from = $this->_tpl_vars['T_USER_PROFILE_FIELDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['profile_fields'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['profile_fields']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['profile_fields']['iteration']++;
?>
      <div class = "formRow">
          <div class = "formLabel">
                    <div class = "header"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM'][$this->_tpl_vars['item']]['label']; ?>
</div>
                    <div class = "explanation"></div>
             </div>
          <div class = "formElement">
                 <div class = "field"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM'][$this->_tpl_vars['item']]['html']; ?>
</div>
              <?php if ($this->_tpl_vars['T_PERSONAL_INFO_FORM'][$this->_tpl_vars['item']]['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM'][$this->_tpl_vars['item']]['error']; ?>
</div><?php endif; ?>
             </div>
         </div>
        <?php endforeach; endif; unset($_from); ?>
      <div class = "formRow">
             <div class = "formLabel">
                    <div class = "header"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['comments']['label']; ?>
</div>
                                 </div>
          <div class = "formElement">
                 <div class = "field"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['comments']['html']; ?>
</div>
              <?php if ($this->_tpl_vars['T_PERSONAL_INFO_FORM']['comments']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['comments']['error']; ?>
</div><?php endif; ?>
             </div>
         </div>
      <div class = "formRow">
             <div class = "formLabel">
                    <div class = "header">&nbsp;</div>
                    <div class = "explanation"></div>
             </div>
          <div class = "formElement">
                 <div class = "field"><?php echo $this->_tpl_vars['T_PERSONAL_INFO_FORM']['submit_register']['html']; ?>
</div>
             </div>
         </div>
        </form>