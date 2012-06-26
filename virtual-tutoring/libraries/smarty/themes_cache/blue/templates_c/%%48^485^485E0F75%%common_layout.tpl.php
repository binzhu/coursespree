<?php /* Smarty version 2.6.26, created on 2012-05-15 11:51:07
         compiled from includes/common_layout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'includes/common_layout.tpl', 37, false),array('modifier', 'eF_formatTitlePath', 'includes/common_layout.tpl', 46, false),)), $this); ?>
<?php if (! $_GET['popup'] && ! $this->_tpl_vars['T_POPUP_MODE']): ?>
 <?php if ($_SESSION['s_login']): ?>
 <script>
     // Translations used in the updater script

     translations['lessons'] = '<?php echo @_LESSONS; ?>
';
     translations['servername'] = '<?php echo @G_SERVERNAME; ?>
';
     translations['onlineusers'] = '<?php echo @_ONLINEUSERS; ?>
';
     translations['nousersinroom'] = '<?php echo @_THEREARENOOTHERUSERSRIGHTNOWINTHISROOM; ?>
';
     translations['redirectedtomain']= '<?php echo @_REDIRECTEDTOEFRONTMAIN; ?>
';
     translations['s_type'] = '<?php echo $_SESSION['s_type']; ?>
';
     translations['s_login'] = '<?php echo $_SESSION['s_login']; ?>
';
     translations['clicktochange'] = '<?php echo @_CLICKTOCHANGESTATUS; ?>
';
     translations['userisonline'] = '<?php echo @_USERISONLINE; ?>
';
     translations['and'] = '<?php echo @_AND; ?>
';
     translations['hours'] = '<?php echo @_HOURS; ?>
';
     translations['minutes'] = '<?php echo @_MINUTES; ?>
';
     translations['userjustloggedin']= '<?php echo @_USERJUSTLOGGEDIN; ?>
';
     translations['user'] = '<?php echo @_USER; ?>
';
     translations['sendmessage'] = '<?php echo @_SENDMESSAGE; ?>
';
     translations['web'] = '<?php echo @_WEB; ?>
';
  translations['user_stats'] = '<?php echo @_USERSTATISTICS; ?>
';
  translations['user_settings'] = '<?php echo @_USERPROFILE; ?>
';
  translations['logout_user'] = '<?php echo @_LOGOUTUSER; ?>
';
  translations['_ADMINISTRATOR'] = '<?php echo @_ADMINISTRATOR; ?>
';
  translations['_PROFESSOR'] = '<?php echo @_PROFESSOR; ?>
';
  translations['_STUDENT'] = '<?php echo @_STUDENT; ?>
';
  translations['_IRREVERSIBLEACTIONAREYOUSURE'] = '<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
';

  var startUpdater = true;
  var updaterPeriod = '<?php echo $this->_tpl_vars['T_CONFIGURATION']['updater_period']; ?>
';
 </script>
 <?php endif; ?>
 <table class = "pageLayout <?php if (isset ( $this->_tpl_vars['T_MAXIMIZE_VIEWPORT'] )): ?>centerFull hideBoth<?php else: ?><?php echo $this->_tpl_vars['layoutClass']; ?>
<?php endif; ?>" id = "pageLayout">
  <tr><td style = "vertical-align:top">
   <table style = "width:100%;">
   <?php if (((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)) == 'index.php'): ?>
    <?php if ($this->_tpl_vars['T_THEME_SETTINGS']->options['show_header'] != 0): ?>
     <tr><td class = "header" colspan = "3"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/header_code.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td></tr>
    <?php endif; ?>
   <?php elseif ($this->_tpl_vars['T_THEME_SETTINGS']->options['show_header'] == 2): ?>
    <tr><td id ="horizontalBarRow" class = "<?php if (isset ( $this->_tpl_vars['T_HEADER_CLASS'] )): ?><?php echo $this->_tpl_vars['T_HEADER_CLASS']; ?>
<?php else: ?>header<?php endif; ?>" colspan = "3"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/header_code.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td></tr>
   <?php else: ?>
    <tr><td class = "topTitle defaultRowHeight" colspan = "3">
     <div style = "float:right;"><?php echo $this->_smarty_vars['capture']['t_path_additional_code']; ?>
</div>
     <?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('eF_formatTitlePath', true, $_tmp) : smarty_modifier_eF_formatTitlePath($_tmp)); ?>

    </td></tr>
   <?php endif; ?>
   <tr><td class = "layoutColumn left">
     <?php if (! $this->_tpl_vars['layoutClass'] || strpos ( $this->_tpl_vars['layoutClass'] , 'hideRight' ) !== false): ?><?php echo $this->_smarty_vars['capture']['left_code']; ?>
<?php endif; ?>
    </td>
    <td class = "layoutColumn center">
     <?php echo $this->_smarty_vars['capture']['center_code']; ?>

    </td>
    <td class = "layoutColumn right">
     <?php if (! $this->_tpl_vars['layoutClass'] || strpos ( $this->_tpl_vars['layoutClass'] , 'hideLeft' ) !== false): ?><?php echo $this->_smarty_vars['capture']['right_code']; ?>
<?php endif; ?>
    </td></tr>
   </table>
  </td></tr>
 <?php if ($this->_tpl_vars['T_THEME_SETTINGS']->options['show_footer'] > 0 && ! $_GET['popup'] && ! $this->_tpl_vars['T_POPUP_MODE']): ?>
  <tr><td style = "vertical-align:bottom">
   <table style = "width:100%">
    <tr><td class = "footer <?php if (((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)) == 'index.php'): ?>indexFooter<?php endif; ?>" colspan = "3"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/footer_code.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td></tr>
   </table>
  </td></tr>
 <?php endif; ?>
 </table>
<?php else: ?>
 <?php echo $this->_smarty_vars['capture']['center_code']; ?>

<?php endif; ?>