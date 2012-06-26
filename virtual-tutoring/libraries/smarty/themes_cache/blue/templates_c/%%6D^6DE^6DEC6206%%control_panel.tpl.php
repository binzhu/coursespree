<?php /* Smarty version 2.6.26, created on 2012-05-16 00:38:40
         compiled from /home/content/87/9232987/html/virtual-tutoring/www/modules/module_chat/control_panel.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_chat/control_panel.tpl', 80, false),array('modifier', 'cat', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_chat/control_panel.tpl', 80, false),)), $this); ?>



<link href="<?php echo $this->_tpl_vars['T_CHAT_MODULE_BASELINK']; ?>
css/control_panel.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
 var modulechatbaselink = '<?php echo $this->_tpl_vars['T_CHAT_MODULE_BASELINK']; ?>
';
 var modulechatbasedir = '<?php echo $this->_tpl_vars['T_CHAT_MODULE_BASEDIR']; ?>
';
 var modulechatbaseurl = '<?php echo $this->_tpl_vars['T_CHAT_MODULE_BASEURL']; ?>
';
</script>



<?php ob_start(); ?>
<?php echo $this->_tpl_vars['T_CHAT_CHANGE_CHATHEARTBEAT_FORM']['javascript']; ?>

<form <?php echo $this->_tpl_vars['T_CHAT_CHANGE_CHATHEARTBEAT_FORM']['attributes']; ?>
>
        <table class="formElements">
  <tr>
   <td class="labelCell"><?php echo @_CHAT_ENGINE_RATE; ?>
:&nbsp;</td>
   <td class="elementCell"><?php echo $this->_tpl_vars['T_CHAT_CHANGE_CHATHEARTBEAT_FORM']['rate']['html']; ?>

    <span class = "formError">*<?php if ($this->_tpl_vars['T_CHAT_ERROR_RATE']): ?><?php echo $this->_tpl_vars['T_CHAT_ERROR_RATE']; ?>
<?php endif; ?></span>
   </td>
  </tr>
  <tr>
   <td class="labelCell"><?php echo @_CHAT_USERLIST_REFRESH_RATE; ?>
:&nbsp;</td>
   <td class="elementCell"><?php echo $this->_tpl_vars['T_CHAT_CHANGE_CHATHEARTBEAT_FORM']['rate2']['html']; ?>

    <span class = "formError">*<?php if ($this->_tpl_vars['T_CHAT_ERROR2_RATE']): ?><?php echo $this->_tpl_vars['T_CHAT_ERROR2_RATE']; ?>
<?php endif; ?></span>
   </td>
  </tr>
  <tr>
   <td></td>
   <td class="submitCell"><?php echo $this->_tpl_vars['T_CHAT_CHANGE_CHATHEARTBEAT_FORM']['submit1']['html']; ?>
</td>
  </tr>
 </table>
</form>
<?php $this->_smarty_vars['capture']['t_set_chatheartbeat'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start(); ?>
<?php echo $this->_tpl_vars['T_CHAT_CREATE_LOG_FORM']['javascript']; ?>

<form <?php echo $this->_tpl_vars['T_CHAT_CREATE_LOG_FORM']['attributes']; ?>
>
 <table class="formElements">
 <tr>
  <td class="labelCell"><?php echo @_CHAT_LESSON_TITLE; ?>
:&nbsp;</td>
  <td class="elementCell"><?php echo $this->_tpl_vars['T_CHAT_CREATE_LOG_FORM']['lessontitle']['html']; ?>
&nbsp;<span class = "formError">*</span>

  <img id = "busy" src = "<?php echo $this->_tpl_vars['T_CHAT_MODULE_BASELINK']; ?>
img/loading.gif" width="15px" height="15px" style="display:none;" alt = "loading" title = "loading"/>
  <div id = "autocomplete_lessons" class = "autocomplete"></div>
  </td>
 </tr>
 <tr>
  <td class="labelCell"><?php echo @_CHAT_FROM_DATE; ?>
:&nbsp;</td>
  <td class="elementCell"><?php echo $this->_tpl_vars['T_CHAT_CREATE_LOG_FORM']['from']['html']; ?>
</td>
 </tr>
 <tr>
  <td class="labelCell"><?php echo @_CHAT_UNTIL_DATE; ?>
:&nbsp;</td>
  <td class="elementCell"><?php echo $this->_tpl_vars['T_CHAT_CREATE_LOG_FORM']['until']['html']; ?>
</td>
 </tr>
 <tr>
  <td></td>
  <td class="submitCell"><?php echo $this->_tpl_vars['T_CHAT_CREATE_LOG_FORM']['submit']['html']; ?>
<span class="caution"></span></td>
 </tr>
 </table>
 <?php echo $this->_tpl_vars['T_LOG']; ?>

</form>


<?php $this->_smarty_vars['capture']['t_create_log'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start(); ?>


 <?php echo @_CHAT_CLEAR_HISTORY_DESCR; ?>
<br />
 <input type="checkbox" id="clearLessonLogs" style="border:none;outline:none;"/> <?php echo @_CHAT_CLEAR_ALSO_LESSON_HISTORY_DESCR; ?>
<br /><br />
 <input type="button" class="flatButton" value="Clear Logs" onclick="javascript:clearU2ULogs(); return false;" />
<?php $this->_smarty_vars['capture']['t_clear_logs'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start(); ?>
<div class="tabber">


<?php if ($_GET['createLog'] == 1): ?>
  <div class="tabbertab">
  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'chat_engine_rate','title' => @_CHAT_MODULE_RATES,'data' => $this->_smarty_vars['capture']['t_set_chatheartbeat'],'image' => ((is_array($_tmp=$this->_tpl_vars['T_CHAT_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'img/chat.png') : smarty_modifier_cat($_tmp, 'img/chat.png')),'absoluteImagePath' => 1), $this);?>

  </div>
  <div class="tabbertab tabbertabdefault">
  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'create_log','title' => @_CHAT_CREATE_LOG,'data' => $this->_smarty_vars['capture']['t_create_log'],'image' => ((is_array($_tmp=$this->_tpl_vars['T_CHAT_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'img/chat.png') : smarty_modifier_cat($_tmp, 'img/chat.png')),'absoluteImagePath' => 1), $this);?>

  </div>
  <div class="tabbertab">
  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'clear_logs','title' => @_CHAT_CLEAR_HISTORY,'data' => $this->_smarty_vars['capture']['t_clear_logs'],'image' => ((is_array($_tmp=$this->_tpl_vars['T_CHAT_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'img/chat.png') : smarty_modifier_cat($_tmp, 'img/chat.png')),'absoluteImagePath' => 1), $this);?>

  </div>
<?php else: ?>
  <div class="tabbertab">
  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'chat_engine_rate','title' => @_CHAT_MODULE_RATES,'data' => $this->_smarty_vars['capture']['t_set_chatheartbeat'],'image' => ((is_array($_tmp=$this->_tpl_vars['T_CHAT_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'img/chat.png') : smarty_modifier_cat($_tmp, 'img/chat.png')),'absoluteImagePath' => 1), $this);?>

  </div>
  <div class="tabbertab">
  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'create_log','title' => @_CHAT_CREATE_LOG,'data' => $this->_smarty_vars['capture']['t_create_log'],'image' => ((is_array($_tmp=$this->_tpl_vars['T_CHAT_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'img/chat.png') : smarty_modifier_cat($_tmp, 'img/chat.png')),'absoluteImagePath' => 1), $this);?>

  </div>
  <div class="tabbertab">
  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'clear_logs','title' => @_CHAT_CLEAR_HISTORY,'data' => $this->_smarty_vars['capture']['t_clear_logs'],'image' => ((is_array($_tmp=$this->_tpl_vars['T_CHAT_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'img/chat.png') : smarty_modifier_cat($_tmp, 'img/chat.png')),'absoluteImagePath' => 1), $this);?>

  </div>
<?php endif; ?>

</div>

<?php $this->_smarty_vars['capture']['t_chat_tab_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo smarty_function_eF_template_printBlock(array('title' => @_CHAT_CHAT,'data' => $this->_smarty_vars['capture']['t_chat_tab_code'],'help' => 'Chat'), $this);?>
