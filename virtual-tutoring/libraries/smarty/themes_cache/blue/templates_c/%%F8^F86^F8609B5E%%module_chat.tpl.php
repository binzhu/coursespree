<?php /* Smarty version 2.6.26, created on 2012-05-15 11:51:07
         compiled from /home/content/87/9232987/html/virtual-tutoring/www/modules/module_chat/module_chat.tpl */ ?>

<?php if ($this->_tpl_vars['T_CHAT_MODULE_STATUS'] == 'ON'): ?>



<script type="text/javascript" >
 var modulechatbaselink = '<?php echo $this->_tpl_vars['T_CHAT_MODULE_BASELINK']; ?>
';
 var modulechatbasedir = '<?php echo $this->_tpl_vars['T_CHAT_MODULE_BASEDIR']; ?>
';
 var modulechatbaseurl = '<?php echo $this->_tpl_vars['T_CHAT_MODULE_BASEURL']; ?>
';
 var ie = 0;
 var flashreload = true;
</script>

<link href="<?php echo $this->_tpl_vars['T_CHAT_MODULE_BASELINK']; ?>
css/screen.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->_tpl_vars['T_CHAT_MODULE_BASELINK']; ?>
css/chat.css" rel="stylesheet" type="text/css">
<!--[if IE ]>
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->_tpl_vars['T_CHAT_MODULE_BASELINK']; ?>
css/screen_ie.css" />
<![endif]-->

<div id="chat_module">
 <div id="windowspace">
  <div id="windows"></div>
 </div>
 <div id="chat_bar" onclick="javascript:toggle_users()">

  <div id="user_list" >
   <div id="content" >
    <!-- Online Users displayed here -->
   </div>
  </div>
  <table width="100%" cellpadding="0" cellspacing="0">
  <tr>
  <td id="first" >
   <span id="status" >

   </span>
  </td>
  <td align="right">
  <a href="javascript:void(0)" onClick="javascript:on_off()"><img id="statusimg" src="<?php echo $this->_tpl_vars['T_CHAT_MODULE_BASELINK']; ?>
img/onoff18.png"/></a>

  </td>
  </tr>
  </table>
 </div>
</div>


<!--[if IE]>
<bgsound id="sound">
<script>var ie=1;</script>
<![endif]-->
<script type="text/javascript">
 var must_disable_selection = true;
</script>
<?php echo '
<script type="text/javascript">
try {
 //document.observe("dom:loaded", fix_flash);
 if ($(\'scormFrameID\')) {
  Event.observe($(\'scormFrameID\').contentWindow, \'load\', applyFlashFrameFix);
 }
} catch (e) {
 //alert(e);
}
</script>

'; ?>


<?php endif; ?>