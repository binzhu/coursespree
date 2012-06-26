<?php /* Smarty version 2.6.26, created on 2012-05-15 11:51:07
         compiled from includes/closing.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/closing.tpl', 47, false),array('modifier', 'basename', 'includes/closing.tpl', 156, false),array('modifier', 'replace', 'includes/closing.tpl', 156, false),)), $this); ?>

<script>
<?php if ($this->_tpl_vars['T_RTL']): ?>
var tabberOptions = {'rtl':true};
<?php endif; ?>
<?php if ($this->_tpl_vars['T_UNIT']): ?>var currentUnit = document.getElementById('node<?php echo $this->_tpl_vars['T_UNIT']['id']; ?>
');<?php else: ?>var currentUnit = '';<?php endif; ?>
  var g_servername = '<?php echo @G_SERVERNAME; ?>
';
</script>
<script>var BOOKMARKTRANSLATION = '<?php echo @_BOOKMARKS; ?>
';var NODATAFOUND = '<?php echo @_NODATAFOUND; ?>
';</script>

<script type = "text/javascript" src = "js/scripts.php?build=<?php echo @G_BUILD; ?>
&load=<?php echo $this->_tpl_vars['T_HEADER_MAIN_SCRIPTS']; ?>
"> </script> 
<?php if ($this->_tpl_vars['T_HEADER_EDITOR']): ?>
 <?php if ($this->_tpl_vars['T_CONFIGURATION']['editor_type'] == 'tinymce_new'): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/editor_new.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <?php elseif ($this->_tpl_vars['T_CONFIGURATION']['editor_type'] == 'tinymce'): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/editor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <?php endif; ?>
<?php endif; ?>


<?php if ($this->_tpl_vars['T_HEADER_LOAD_SCRIPTS']): ?><script type = "text/javascript" src = "js/scripts.php?build=<?php echo @G_BUILD; ?>
&load=<?php echo $this->_tpl_vars['T_HEADER_LOAD_SCRIPTS']; ?>
"> </script><?php endif; ?>

<?php $_from = $this->_tpl_vars['T_MODULE_JS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['module_scripts_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['module_scripts_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['module_scripts_list']['iteration']++;
?>
<script type = "text/javascript" src = "<?php echo $this->_tpl_vars['item']; ?>
"> </script> <?php endforeach; endif; unset($_from); ?>

<div id = "user_table" style = "display:none">
<?php ob_start(); ?>
    <table width = "100%">
        <tr><td align = "left" id = "user_box" style = "padding:3px 3px 4px 5px;"></td></tr>
    </table>
<?php $this->_smarty_vars['capture']['t_users_table_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo smarty_function_eF_template_printBlock(array('title' => @_INFO,'data' => $this->_smarty_vars['capture']['t_users_table_code'],'image' => '32x32/user.png'), $this);?>

</div>

<table id = "popup_table" class = "divPopup" style = "display:none;">
    <tr class = "defaultRowHeight">
        <td class = "topTitle" id = "popup_title"></td>
        <td class = "topTitle" id = "popup_close_cell"><img src = "images/16x16/close.png" alt = "<?php echo @_CLOSE; ?>
" name = "" id = "popup_close" title = "<?php echo @_CLOSE; ?>
" onclick = "if (document.getElementById('reloadHidden') && document.getElementById('reloadHidden').value == '1')  {parent.frames[1].location = parent.frames[1].location};eF_js_showDivPopup('', '', this.name);"/>
    </td></tr>
    <tr><td colspan = "2" id = "popup_data" style = ""></td></tr>
    <tr><td colspan = "2" id = "frame_data" style = "display:none;">
   <iframe name = "POPUP_FRAME" id = "popup_frame" src = "javascript:''" >Sorry, but your browser needs to support iframes to see this</iframe>
    </td></tr>
</table>
<div id = "error_details" style = "display:none"><?php echo smarty_function_eF_template_printBlock(array('title' => @_ERRORDETAILS,'data' => "<pre>".($this->_tpl_vars['T_EXCEPTION_TRACE'])."</pre>",'image' => '32x32/error_delete.png'), $this);?>
</div>
<div id = 'showMessageDiv' style = "display:none"></div>
<div id="dimmer" class = "dimmerDiv" style = "display:none;"></div>
<div id = "defaultExceptionHandlerDiv" style = "color:#ffffff;display:none"></div>

<?php $_from = $this->_tpl_vars['T_PAGE_FINISH_MODULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['module_closing_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['module_closing_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['module_close_code']):
        $this->_foreach['module_closing_list']['iteration']++;
?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['module_close_code'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endforeach; endif; unset($_from); ?>


<script>

<?php if ($this->_tpl_vars['T_ADD_ANOTHER']): ?>
 document.getElementById('add_new_event_link').onclick();
 document.getElementById('popup_frame').src ="<?php echo $_SESSION['s_type']; ?>
.php?ctg=calendar&view_calendar=<?php echo $this->_tpl_vars['T_VIEW_CALENDAR']; ?>
<?php if ($_GET['show_interval']): ?>&show_interval=<?php echo $_GET['show_interval']; ?>
<?php endif; ?>&add_calendar=1<?php echo $this->_tpl_vars['T_CALENDAR_TYPE_LINK']; ?>
&message=<?php echo $_GET['pmessage']; ?>
&message_type=<?php echo $_GET['pmessage_type']; ?>
";
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['div_error'] )): ?>
 eF_js_showDivPopup('<?php echo $this->_tpl_vars['div_error']; ?>
');
<?php endif; ?>



<?php if (( $this->_tpl_vars['T_TRIGGER_NEXT_NOTIFICATIONS_SEND'] == 1 )): ?>
    var __shouldTriggerNextNotifications = true;
<?php else: ?>
    var __shouldTriggerNextNotifications = false;
<?php endif; ?>

<?php if ($this->_tpl_vars['T_THEME_SETTINGS']->options['sidebar_interface'] == 1): ?>

 // Code used for appearance fixing of the horizontal menus
 var leftDist;
 <?php $_from = $this->_tpl_vars['T_MENU']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer_menu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer_menu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['menu_key'] => $this->_tpl_vars['menu']):
        $this->_foreach['outer_menu']['iteration']++;
?>
     if (document.getElementById("listmenu<?php echo $this->_tpl_vars['menu_key']; ?>
")) {
   leftDist = document.getElementById("listmenu<?php echo $this->_tpl_vars['menu_key']; ?>
").getStyle("width");
   resArray = leftDist.split("px");
   leftDist = (parseInt(resArray[0])+1) + "px";
   document.getElementById("listmenu<?php echo $this->_tpl_vars['menu_key']; ?>
").setStyle({left: "-"+leftDist}); //= "-" + leftDist; // + "px";
   document.getElementById("listmenu<?php echo $this->_tpl_vars['menu_key']; ?>
").style.display = "none";
  }
 <?php endforeach; endif; unset($_from); ?>
 if (document.getElementById("horizontal_menu"))
  document.getElementById("horizontal_menu").style.display = "none";
<?php endif; ?>

<?php if ($this->_tpl_vars['T_FACEBOOK_ACCOUNT_MERGE_POPUP']): ?>
 <?php if ($this->_tpl_vars['T_FACEBOOK_EXTERNAL_LOGIN']): ?>
 eF_js_showDivPopup('<?php echo @_FACEBOOKMERGEACCOUNT; ?>
', 2, 'facebook_login');
 <?php else: ?>
 eF_js_showDivPopup('<?php echo @_FACEBOOKMERGEACCOUNT; ?>
', 0, 'facebook_login');
 <?php endif; ?>
<?php endif; ?>



<?php if ($this->_tpl_vars['T_FACEBOOK_API_KEY'] != ""): ?>
//If facebook enabled prompt for permissions
 FB.init("<?php echo $this->_tpl_vars['T_FACEBOOK_API_KEY']; ?>
", "facebook/xd_receiver.htm");
 <?php if (isset ( $this->_tpl_vars['T_FACEBOOK_SHOULD_UPDATE_STATUS'] ) && $this->_tpl_vars['T_FACEBOOK_SHOULD_UPDATE_STATUS'] != 1): ?>
  <?php echo '
  function onUpdateDone() {
   top.location=\''; ?>
<?php echo $_SESSION['s_type']; ?>
<?php echo 'page.php?fb_authenticated=1\';
  }
  FB.ensureInit(function() { FB.Connect.showPermissionDialog("status_update", onUpdateDone); });
  '; ?>

 <?php endif; ?>
 <?php if (isset ( $this->_tpl_vars['T_FACEBOOK_LOGOUT'] )): ?>
  <?php echo '
  FB.ensureInit(function() { FB.Connect.logout(); });
  '; ?>


 <?php endif; ?>

<?php endif; ?>

<?php echo '
if (!usingHorizontalInterface) {
 if (top.sideframe && top.sideframe.document.getElementById(\'current_location\')) {
  top.sideframe.document.getElementById(\'current_location\').value = top.mainframe.location.toString();
 }
} else {
 // $(\'current_location\') caused js error in browse.php
 if (document.getElementById(\'current_location\')) {
  document.getElementById(\'current_location\').value = document.location.toString();
 }
}
'; ?>



 translations['_COUPON'] = '<?php echo @_COUPON; ?>
';
 translations['_CLICKTOENTERDISCOUNTCOUPON'] = '<?php echo @_CLICKTOENTERDISCOUNTCOUPON; ?>
';
 <?php if ($_SESSION['s_login']): ?>
  <?php if (((is_array($_tmp=((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, '.php', '') : smarty_modifier_replace($_tmp, '.php', '')) == 'index'): ?>
   redirectLocation ='index.php?ctg=checkout&checkout=1&register_lessons=1';
  <?php else: ?>
   redirectLocation ='<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lessons&catalog=1&checkout=1';
  <?php endif; ?>
 <?php else: ?>
  redirectLocation ='index.php?ctg=login&register_lessons=1';
 <?php endif; ?>

   if (parent.frames[0].document.getElementById('dimmer'))
  parent.frames[0].document.getElementById('dimmer').style.display = 'none';

  if (top.sideframe && top.sideframe.document && top.sideframe.document.getElementById('loading_sidebar'))
     top.sideframe.document.getElementById('loading_sidebar').style.display = 'none'; //no prototype here please

</script>