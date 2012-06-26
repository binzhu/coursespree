<?php /* Smarty version 2.6.26, created on 2012-05-16 07:12:48
         compiled from includes/messages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'includes/messages.tpl', 17, false),array('modifier', 'implode', 'includes/messages.tpl', 163, false),array('modifier', 'sizeof', 'includes/messages.tpl', 170, false),array('modifier', 'eF_truncate', 'includes/messages.tpl', 269, false),array('function', 'math', 'includes/messages.tpl', 22, false),array('function', 'eF_template_printBlock', 'includes/messages.tpl', 51, false),array('function', 'cycle', 'includes/messages.tpl', 251, false),)), $this); ?>

<?php ob_start(); ?>
 <table width="100%">
  <?php $_from = $this->_tpl_vars['T_FOLDERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['folders_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['folders_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['folder']):
        $this->_foreach['folders_loop']['iteration']++;
?>
      <tr id = "div_folder_id_<?php echo $this->_tpl_vars['id']; ?>
">
       <td>
              <span class = "counter"><?php echo $this->_foreach['folders_loop']['iteration']; ?>
.</span>
              <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&folder=<?php echo $this->_tpl_vars['id']; ?>
" <?php if ($this->_tpl_vars['id'] == $this->_tpl_vars['T_FOLDER']): ?>class = "selectedLink"<?php endif; ?>><?php echo $this->_tpl_vars['folder']['name']; ?>
&nbsp;(<?php echo $this->_tpl_vars['folder']['messages_num']; ?>
 <?php if ($this->_tpl_vars['folder']['messages_num'] == 1): ?><?php echo @_MESSAGE; ?>
<?php else: ?><?php echo @_MESSAGES; ?>
<?php endif; ?>, <?php echo $this->_tpl_vars['folder']['filesize']; ?>
<?php echo @_KB; ?>
)</a>
          </td>
          <td>
          <?php if ($this->_foreach['folders_loop']['iteration'] > 3): ?>
     <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&folders=1&edit=<?php echo $this->_tpl_vars['id']; ?>
&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_EDIT; ?>
', 2)" target = "POPUP_FRAME"><img class = "handle" src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" alt = "<?php echo @_EDIT; ?>
" /></a>
     <img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_AREYOUSURETODELETEFOLDER; ?>
&quot;<?php echo $this->_tpl_vars['folder']['name']; ?>
&quot;<?php echo @_ANDALLCONTENTS; ?>
')) deleteFolder(this, '<?php echo $this->_tpl_vars['id']; ?>
');"/>
    <?php endif; ?>
          </td>
      </tr>
      <?php $this->assign('folders_options', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['folders_options'])) ? $this->_run_mod_handler('cat', true, $_tmp, '<option value = "') : smarty_modifier_cat($_tmp, '<option value = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['id'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['folder']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['folder']['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</option>') : smarty_modifier_cat($_tmp, '</option>'))); ?>   <?php endforeach; endif; unset($_from); ?>
  <tr><td colspan = "2">&nbsp;</td></tr>
  <tr><td colspan = "2">
   <?php echo @_TOTAL; ?>
: <?php echo $this->_tpl_vars['T_TOTAL_MESSAGES']; ?>
 <?php if ($this->_tpl_vars['T_TOTAL_MESSAGES'] == 1): ?><?php echo @_MESSAGE; ?>
<?php else: ?><?php echo @_MESSAGES; ?>
<?php endif; ?>, <?php if ($this->_tpl_vars['T_TOTAL_SIZE'] > $this->_tpl_vars['T_CONFIGURATION']['pm_space']*1024 && $this->_tpl_vars['T_CONFIGURATION']['pm_space'] != ''): ?><span class="failure"><?php echo $this->_tpl_vars['T_TOTAL_SIZE']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['T_TOTAL_SIZE']; ?>
<?php endif; ?> <?php echo @_KB; ?>
<br />
   <?php if ($this->_tpl_vars['T_CONFIGURATION']['pm_space'] != ''): ?><?php if ($this->_tpl_vars['T_TOTAL_SIZE'] > $this->_tpl_vars['T_CONFIGURATION']['pm_space']*1024 && $this->_tpl_vars['T_CONFIGURATION']['pm_space'] != ''): ?><span class="failure"><?php else: ?><span class="success"><?php endif; ?><?php echo @_MAXIMUMPMUSAGESPACE; ?>
 : <?php echo smarty_function_math(array('equation' => "x*y",'x' => 1024,'y' => $this->_tpl_vars['T_CONFIGURATION']['pm_space']), $this);?>
 KB</span><?php endif; ?>
  </td></tr>
 </table>
<?php $this->_smarty_vars['capture']['t_folders_code'] = ob_get_contents(); ob_end_clean(); ?>


<?php ob_start(); ?>
 <tr><td class = "moduleCell">
 <?php if ($_GET['folders']): ?>
     <?php ob_start(); ?>
   <?php echo $this->_tpl_vars['T_ENTITY_FORM']['javascript']; ?>

   <form <?php echo $this->_tpl_vars['T_ENTITY_FORM']['attributes']; ?>
>
       <?php echo $this->_tpl_vars['T_ENTITY_FORM']['hidden']; ?>

       <table class = "formElements">
           <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['name']['label']; ?>
:&nbsp;</td>
               <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['name']['html']; ?>
</td></tr>
           <?php if ($this->_tpl_vars['T_ENTITY_FORM']['name']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['name']['error']; ?>
</td></tr><?php endif; ?>
           <tr><td></td>
               <td class = "submitCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['submit']['html']; ?>
</td></tr>
       </table>
   </form>
  <?php if ($this->_tpl_vars['T_MESSAGE_TYPE'] == 'success'): ?>
     <script>
         //re = /\?/;
         parent.location = parent.location//!re.test(parent.location) ? parent.location = parent.location+'?message=<?php echo $this->_tpl_vars['T_MESSAGE']; ?>
&message_type=<?php echo $this->_tpl_vars['T_MESSAGE_TYPE']; ?>
' : parent.location = parent.location+'&message=<?php echo $this->_tpl_vars['T_MESSAGE']; ?>
&message_type=<?php echo $this->_tpl_vars['T_MESSAGE_TYPE']; ?>
';
     </script>
  <?php endif; ?>
  <?php $this->_smarty_vars['capture']['t_add_code'] = ob_get_contents(); ob_end_clean(); ?>

  <?php echo smarty_function_eF_template_printBlock(array('title' => @_NEWFOLDER,'data' => $this->_smarty_vars['capture']['t_add_code'],'image' => '32x32/folders.png'), $this);?>


 <?php elseif ($_GET['add']): ?>
  <?php ob_start(); ?>
         <script>
          var hiderecipients = '<?php echo @_HIDERECIPIENTSCATEGORIES; ?>
';
          var showrecipients = '<?php echo @_SHOWRECIPIENTSCATEGORIES; ?>
';
          var norecipients = '<?php echo @_NORECIPIENTSHAVEBEENSELECTED; ?>
';
          var thefield = '<?php echo @_THEFIELD; ?>
';
          var subject = '<?php echo @_SUBJECT; ?>
';
          var ismandatory = '<?php echo @_ISMANDATORY; ?>
';
          var enterprise = 0;



         </script>
            <table class = "statisticsSelectList">
                <tr><td class = "labelCell"><?php echo @_RECIPIENTS; ?>
:</td>
                    <td class = "elementCell">
                                                <?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['recipient']['html']; ?>

                        <img id = "busy" src = "images/16x16/clock.png" style = "display:none;" alt = "<?php echo @_LOADING; ?>
" title = "<?php echo @_LOADING; ?>
"/>
                        <a href = "javascript:void(0);" onclick = "show_hide_additional_recipients()">
                         <img id = "arrow_down" src = "images/16x16/navigate_down.png" alt = "<?php echo @_SHOWRECIPIENTSCATEGORIES; ?>
" title = "<?php echo @_SHOWRECIPIENTSCATEGORIES; ?>
"/>
                        </a>
                        <div id = "autocomplete_choices" class = "autocomplete"></div>&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
            <tr>
              <td class = "labelCell"><?php echo @_UNDISCLOSEDRECIPIENTS; ?>
:&nbsp;</td>
            <td class = "elementCell"><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['bcc']['html']; ?>
</td>
             </tr>
                <tr><td></td>
                    <td class = "infoCell"><?php echo @_STARTTYPINGFORRELEVENTMATCHES; ?>
. <?php echo @_SEPARATEMULTIPLEUSERS; ?>
</td>
             </tr>
            </table>

            <div id = "additional_recipients_categories" style="display:none;">
                <div>
                    <table>
                                                  <tr style="display:none;"><td><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['recipients']['only_specific_users']['html']; ?>
 </td><td><?php echo @_ONLYRECIPIENTSDEFINEDBELOW; ?>
</td></tr>
                         <tr <?php if ($_SESSION['s_type'] != 'administrator'): ?>style="display:none;"<?php endif; ?>><td><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['recipients']['active_users']['html']; ?>
 </td><td><?php echo @_ALLACTIVESYSTEMUSERS; ?>
</td></tr>
                                <tr <?php if (! $this->_tpl_vars['T_COURSES']): ?>style = "display:none"<?php endif; ?>><td><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['recipients']['specific_course']['html']; ?>
</td><td width="27%"><?php echo @_USERSCONNECTEDTOSPECIFICCOURSE; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['specific_course']['html']; ?>
</td><td><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['specific_course_completed']['html']; ?>
</td><td id="specific_course_completed_label" style="visibility:hidden"><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['specific_course_completed']['label']; ?>
</td></tr>
                         <tr <?php if (! $this->_tpl_vars['T_LESSONS']): ?>style = "display:none"<?php endif; ?>><td><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['recipients']['specific_lesson']['html']; ?>
</td><td><?php echo @_USERSCONNECTEDTOSPECIFICLESSON; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['lesson']['html']; ?>
</td></tr>
                         <tr <?php if (! $this->_tpl_vars['T_LESSONS']): ?>style = "display:none"<?php endif; ?>><td><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['recipients']['specific_lesson_professor']['html']; ?>
</td><td><?php echo @_PROFESSORSOFLESSON; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['professor']['html']; ?>
</td></tr>
                                                  <tr <?php if (! $this->_tpl_vars['T_FULL_ACCESS']): ?>style = "display:none"<?php endif; ?>><td><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['recipients']['specific_type']['html']; ?>
 </td><td><?php echo @_SPECIFICTYPEUSERS; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['user_type']['html']; ?>
</td></tr>
                                                  <tr><td><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['recipients']['specific_group']['html']; ?>
 </td><td><?php echo @_USERSINGROUP; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['group_recipients']['html']; ?>
</td></tr>
                    </table>
                </div>
            </div>
  <?php $this->_smarty_vars['capture']['t_recipients_code'] = ob_get_contents(); ob_end_clean(); ?>
        <?php ob_start(); ?>
            <?php if ($_POST['preview']): ?>
                <table border = "0" cellpadding = "3" width = "100%">
                    <tr height = "30"><td valign = "top" width = "10%"><b><?php echo @_PREVIEW; ?>
</b>:</td>
                        <td class = "previewPane" colspan = "2"><?php echo $this->_tpl_vars['T_BODY_PREVIEW']; ?>
</td></tr>
                    </tr>
                </table>
                <br/>
            <?php endif; ?>
            <table class = "formElements">
                <tr><td class = "labelCell"><?php echo @_SUBJECT; ?>
:&nbsp;</td>
                    <td class = "elementCell"><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['subject']['html']; ?>
&nbsp;<span class="formRequired">*</span></td></tr>
                <tr><td class = "labelCell"><?php echo @_SENDASEMAILALSO; ?>
:&nbsp;</td>
                    <td class = "elementCell"><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['email']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_ADD_MESSAGE_FORM']['email']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['email']['error']; ?>
</td></tr><?php endif; ?>
                <?php if ($_SESSION['s_type'] != 'student'): ?>
                <tr><td></td><td>
      <span>
       <img onclick = "toggledInstanceEditor = 'body';javascript:toggleEditor('body','simpleEditor');" class = "handle" style="vertical-align:middle" src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
       <a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'body';javascript:toggleEditor('body','simpleEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
      </span></td></tr>
    <?php endif; ?>
    <tr><td class = "labelCell"><?php echo @_BODY; ?>
:&nbsp;</td>
                    <td class = "elementCell"><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['body']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_ADD_MESSAGE_FORM']['body']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['body']['error']; ?>
</td></tr><?php endif; ?>
                <tr><td class = "labelCell"><?php echo @_ATTACHMENTS; ?>
:&nbsp;</td>
                    <td class = "elementCell"><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['attachment']['0']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_ADD_MESSAGE_FORM']['attachment']['0']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['attachment']['0']['error']; ?>
</td></tr><?php endif; ?>
    <tr><td></td>
     <td class = "infoCell"><?php echo @_FILESIZEMUSTBESMALLERTHAN; ?>
 <b><?php echo $this->_tpl_vars['T_MAX_FILE_SIZE']; ?>
</b> <?php echo @_KB; ?>
</td></tr>
                <tr><td></td>
                 <td class = "submitCell"><?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['submit_send_message']['html']; ?>
</td></tr>
            </table>
  <?php if ($this->_tpl_vars['T_MESSAGE_TYPE'] == 'success'): ?>
     <script>
         //re = /\?/;
         parent.location = parent.location//!re.test(parent.location) ? parent.location = parent.location+'?message=<?php echo $this->_tpl_vars['T_MESSAGE']; ?>
&message_type=<?php echo $this->_tpl_vars['T_MESSAGE_TYPE']; ?>
' : parent.location = parent.location+'&message=<?php echo $this->_tpl_vars['T_MESSAGE']; ?>
&message_type=<?php echo $this->_tpl_vars['T_MESSAGE_TYPE']; ?>
';
     </script>
  <?php endif; ?>
        <?php $this->_smarty_vars['capture']['t_new_message_code'] = ob_get_contents(); ob_end_clean(); ?>
        <?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['javascript']; ?>

        <form <?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['attributes']; ?>
 onSubmit = "return eF_js_checkRecipients()">
        <?php echo $this->_tpl_vars['T_ADD_MESSAGE_FORM']['hidden']; ?>

            <?php echo smarty_function_eF_template_printBlock(array('title' => @_RECIPIENTSSELECTION,'data' => $this->_smarty_vars['capture']['t_recipients_code'],'image' => '32x32/directory.png','help' => 'Messages'), $this);?>

            <?php echo smarty_function_eF_template_printBlock(array('title' => @_MESSAGEBODY,'data' => $this->_smarty_vars['capture']['t_new_message_code'],'image' => '32x32/mail.png','help' => 'Messages'), $this);?>

        </form>
 <?php elseif ($_GET['view']): ?>
  <?php ob_start(); ?>
   <div class = "messagesTable" >
    <div class = "messageInfo">
     <div><span><?php echo @_SENT; ?>
:</span> #filter:timestamp_time-<?php echo $this->_tpl_vars['T_PERSONALMESSAGE']['timestamp']; ?>
#</div>
     <div><span><?php echo @_SENDER; ?>
:</span> #filter:login-<?php echo $this->_tpl_vars['T_PERSONALMESSAGE']['sender']; ?>
#</div>
     <div>
      <span><?php echo @_RECIPIENT; ?>
:</span>
      <?php if ($this->_tpl_vars['T_PERSONALMESSAGE']['bcc']): ?>
       <?php echo @_UNDISCLOSEDRECIPIENTS; ?>

      <?php elseif (sizeof ( $this->_tpl_vars['T_PERSONALMESSAGE']['recipient'] ) <= 10): ?>
       <?php echo implode($this->_tpl_vars['T_PERSONALMESSAGE']['recipient'], ",&nbsp;"); ?>

      <?php else: ?>
      <?php echo ''; ?><?php $_from = $this->_tpl_vars['T_PERSONALMESSAGE']['recipient']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['recipients_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['recipients_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['recipients_list']['iteration']++;
?><?php echo ''; ?><?php if ($this->_foreach['recipients_list']['iteration'] < 10): ?><?php echo ''; ?><?php echo $this->_tpl_vars['item']; ?><?php echo ',&nbsp;'; ?><?php elseif ($this->_foreach['recipients_list']['iteration'] == 10): ?><?php echo '<a href = "javascript:void(0)" style = "" onclick = "Element.extend(this).hide();$(\'more_recipients\').show()">'; ?><?php echo sizeof($this->_tpl_vars['T_PERSONALMESSAGE']['recipient']); ?><?php echo ' more users</a><span id = "more_recipients" style = "font-weight:inherit;display:none">'; ?><?php echo $this->_tpl_vars['item']; ?><?php echo ''; ?><?php elseif ($this->_foreach['recipients_list']['iteration'] == sizeof($this->_tpl_vars['T_PERSONALMESSAGE']['recipient'])): ?><?php echo '</div>'; ?><?php else: ?><?php echo ',&nbsp;'; ?><?php echo $this->_tpl_vars['item']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>

      <?php endif; ?>
     </div>
    <?php if ($this->_tpl_vars['T_ATTACHMENT']): ?>
     <div><span><?php echo @_ATTACHMENTS; ?>
:</span> <a href = "view_file.php?file=<?php echo $this->_tpl_vars['T_ATTACHMENT']['id']; ?>
&action=download"><?php echo $this->_tpl_vars['T_ATTACHMENT']['name']; ?>
</a></div>
    <?php endif; ?>
    </div>
    <div class = "messageBody">
     <?php echo $this->_tpl_vars['T_PERSONALMESSAGE']['body']; ?>

    </div>
    <div class = "topTitle messageTools">
    <?php if ($this->_tpl_vars['T_NEXT_MESSAGE']): ?>
     <a style = "float:right" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&view=<?php echo $this->_tpl_vars['T_NEXT_MESSAGE']; ?>
" title = "<?php echo @_NEXT; ?>
 &raquo;">
      <img class = "handle" src = "images/16x16/navigate_right.png" title = "<?php echo @_NEXT; ?>
 &raquo;" alt = "<?php echo @_NEXT; ?>
 &raquo;" /></a>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['T_PREVIOUS_MESSAGE']): ?>
     <a style = "float:right" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&view=<?php echo $this->_tpl_vars['T_PREVIOUS_MESSAGE']; ?>
" title = "&laquo; <?php echo @_PREVIOUS; ?>
">
      <img class = "handle" src = "images/16x16/navigate_left.png" title = "&laquo; <?php echo @_PREVIOUS; ?>
" alt = "&laquo; <?php echo @_PREVIOUS; ?>
" /></a>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['_change_']): ?>
     <?php if ($_SESSION['s_type'] != 'student' || $this->_tpl_vars['T_CONFIGURATION']['disable_messages_student'] == 0): ?>
      <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&add=1" title = "<?php echo @_NEWMESSAGE; ?>
">
       <img class = "handle" src = "images/16x16/add.png" title = "<?php echo @_NEWMESSAGE; ?>
" alt = "<?php echo @_NEWMESSAGE; ?>
" /></a>
                     <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&add=1&reply=<?php echo $this->_tpl_vars['T_PERSONALMESSAGE']['id']; ?>
" title = "<?php echo @_REPLY; ?>
">
                      <img class = "handle" src = "images/16x16/mail.png" title = "<?php echo @_REPLY; ?>
" alt = "<?php echo @_REPLY; ?>
" ></a>
                     <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&add=1&forward=<?php echo $this->_tpl_vars['T_PERSONALMESSAGE']['id']; ?>
" title = "<?php echo @_FORWARD; ?>
">
                      <img class = "handle" src = "images/16x16/arrow_right.png" title = "<?php echo @_FORWARD; ?>
" alt = "<?php echo @_FORWARD; ?>
" ></a>
                 <?php endif; ?>
    <?php endif; ?>
                    <img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_AREYOUSURETODELETEMESSAGE; ?>
')) deleteMessage(this, '<?php echo $this->_tpl_vars['T_PERSONALMESSAGE']['id']; ?>
');">
                    <img class = "ajaxHandle" src = "images/16x16/file_explorer.png" title = "<?php echo @_MOVETOFOLDER; ?>
" alt = "<?php echo @_MOVETOFOLDER; ?>
" onclick = "moveMessage(this, '<?php echo $this->_tpl_vars['T_PERSONALMESSAGE']['id']; ?>
')"/>
                    <select id = "target_message_folder"><?php echo $this->_tpl_vars['folders_options']; ?>
</select>
    </div>
   </div>
  <?php $this->_smarty_vars['capture']['t_messagesbody_code'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['T_PERSONALMESSAGE']['title'],'data' => $this->_smarty_vars['capture']['t_messagesbody_code'],'image' => "32x32/mail.png"), $this);?>

  <?php ob_start(); ?>
   <tr>
    <td id = "sideColumn">
    <?php echo smarty_function_eF_template_printBlock(array('title' => @_SPACEUSAGE,'data' => $this->_smarty_vars['capture']['t_volume_code'],'image' => "32x32/status.png"), $this);?>

    <?php echo smarty_function_eF_template_printBlock(array('title' => @_FOLDERS,'data' => $this->_smarty_vars['capture']['t_folders_code'],'image' => "32x32/folders.png",'options' => $this->_tpl_vars['T_FOLDERS_OPTIONS']), $this);?>

    </td>
   </tr>
  <?php $this->_smarty_vars['capture']['moduleSideOperations'] = ob_get_contents(); ob_end_clean(); ?>
 <?php else: ?>
  <?php ob_start(); ?>
   <div class = "headerTools">
    <?php if ($this->_tpl_vars['_change_']): ?>
     <?php if ($_SESSION['s_type'] != 'student' || $this->_tpl_vars['T_CONFIGURATION']['disable_messages_student'] == 0): ?>
     <span>
      <img src = "images/16x16/add.png" title = "<?php echo @_NEWMESSAGE; ?>
" alt = "<?php echo @_NEWMESSAGE; ?>
" />
      <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&add=1" title = "<?php echo @_NEWMESSAGE; ?>
"><?php echo @_NEWMESSAGE; ?>
</a>
     </span>
     <?php endif; ?>
    <?php endif; ?>
   </div>
<!--ajax:messagesTable-->
            <table class = "sortedTable" width = "100%" size = "<?php echo $this->_tpl_vars['T_MESSAGES_SIZE']; ?>
" sortBy = "0" useAjax = "1" id = "messagesTable" url="<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&folder=<?php echo $this->_tpl_vars['T_FOLDER']; ?>
&">
                <tr class = "defaultRowHeight">
                <?php if (! isset ( $_GET['minimal_view'] )): ?>
                    <td class = "topTitle centerAlign" name = "priority" style = "width:10%"><?php echo @_PRIORITY; ?>
</td>
                <?php endif; ?>
                    <td class = "topTitle" name = "title" style = "width:40%"><?php echo @_SUBJECT; ?>
</td>
                <?php if ($this->_tpl_vars['T_SENT_FOLDER'] == $_GET['folder']): ?>
                 <td class = "topTitle" name="recipient" style = "width:20%"><?php echo @_TOFORUM; ?>
</td>
                <?php else: ?>
                    <td class = "topTitle" name = "sender" style = "width:20%"><?php echo @_FROM; ?>
</td>
                <?php endif; ?>
                    <td class = "topTitle" name="timestamp" style = "width:20%"><?php echo @_DATE; ?>
</td>
                <?php if (! isset ( $_GET['minimal_view'] )): ?>
                    <td class = "topTitle centerAlign noSort" style = "width:10%"><?php echo @_OPERATIONS; ?>
</td>
                <?php endif; ?>
                 </tr>
   <?php $_from = $this->_tpl_vars['T_MESSAGES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['messages_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['messages_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['message']):
        $this->_foreach['messages_list']['iteration']++;
?>
                 <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['message']['viewed']): ?>unreadMessage<?php endif; ?>" id="row_of_message_<?php echo $this->_tpl_vars['message']['id']; ?>
">
                                    <?php if (! isset ( $_GET['minimal_view'] )): ?>
                     <td class = "centerAlign"><span style = "display:none"><?php echo $this->_tpl_vars['message']['priority']; ?>
</span>                  <?php if (! $this->_tpl_vars['message']['priority']): ?>
                             <img class = "ajaxHandle" src = "images/16x16/flag_green.png" alt = "<?php echo @_NORMAL; ?>
" title = "<?php echo @_SETHIGHPRIORITY; ?>
" onclick = "flag_unflag(this, '<?php echo $this->_tpl_vars['message']['id']; ?>
')"/>
                 <?php else: ?>
                             <img class = "ajaxHandle" src = "images/16x16/flag_red.png" alt = "<?php echo @_HIGH; ?>
" title = "<?php echo @_SETNORMALPRIORITY; ?>
" onclick = "flag_unflag(this, '<?php echo $this->_tpl_vars['message']['id']; ?>
')"/>
                 <?php endif; ?>
                    </td>
                <?php endif; ?>
                    <td>
                <?php if ($this->_tpl_vars['message']['attachments']): ?>
      <img class = "ajaxHandle" src = "images/16x16/attachment.png" alt = "<?php echo @_ATTACHMENT; ?>
" title = "<?php echo @_ATTACHMENT; ?>
" onclick = "downloadAttachment(this, '<?php echo $this->_tpl_vars['message']['id']; ?>
')"/>
    <?php endif; ?>
                        <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&view=<?php echo $this->_tpl_vars['message']['id']; ?>
"><?php echo $this->_tpl_vars['message']['title']; ?>
</a>
                    </td>
                <?php if ($this->_tpl_vars['T_SENT_FOLDER'] == $_GET['folder']): ?>
                 <td><?php if ($this->_tpl_vars['message']['bcc']): ?><?php echo @_UNDISCLOSEDRECIPIENTS; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['message']['recipient'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 30) : smarty_modifier_eF_truncate($_tmp, 30)); ?>
<?php endif; ?></td>
                <?php else: ?>
                    <td>#filter:login-<?php echo $this->_tpl_vars['message']['sender']; ?>
#</td>
                <?php endif; ?>
                    <td><span style = "display:none"><?php echo $this->_tpl_vars['message']['timestamp']; ?>
</span>#filter:timestamp_time_nosec-<?php echo $this->_tpl_vars['message']['timestamp']; ?>
#</td>
                <?php if (! isset ( $_GET['minimal_view'] )): ?>
                  <td class = "centerAlign" >
      <img class = "ajaxHandle" src = "images/16x16/error_delete.png" onclick = "if (confirm('<?php echo @_AREYOUSURETODELETEMESSAGE; ?>
')) deleteMessage(this, '<?php echo $this->_tpl_vars['message']['id']; ?>
');" alt = "<?php echo @_DELETE; ?>
" title = "<?php echo @_DELETE; ?>
"/>
      <input style = "vertical-align:middle" class = "inputCheckbox" type = "checkbox" id = "check_<?php echo $this->_tpl_vars['message']['id']; ?>
" value = "<?php echo $this->_tpl_vars['message']['id']; ?>
"/>
                    </td>
                <?php endif; ?>
                </tr>
   <?php endforeach; else: ?>
                <tr class = "oddRowColor defaultRowHeight"><td colspan = "6" class = "emptyCategory"><?php echo @_NOMESSAGESINFOLDER; ?>
</td></tr>
   <?php endif; unset($_from); ?>
           </table>
<!--/ajax:messagesTable-->
          <div class = "horizontalSeparatorAbove">
             <span style = "vertical-align:middle"><?php echo @_WITHSELECTED; ?>
:</span>
                <img src = "images/16x16/error_delete.png" title = "<?php echo @_DELETESELECTED; ?>
" alt = "<?php echo @_DELETESELECTED; ?>
" class = "ajaxHandle" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteSelectedMessages(this)">
             </div>
  <?php $this->_smarty_vars['capture']['t_messages_code'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo smarty_function_eF_template_printBlock(array('title' => @_PERSONALMESSAGES,'data' => $this->_smarty_vars['capture']['t_messages_code'],'image' => "32x32/mailbox.png",'help' => 'Messages'), $this);?>

  <?php ob_start(); ?>
   <tr>
    <td id = "sideColumn">
    <?php echo smarty_function_eF_template_printBlock(array('title' => @_SPACEUSAGE,'data' => $this->_smarty_vars['capture']['t_volume_code'],'image' => "32x32/status.png"), $this);?>

    <?php echo smarty_function_eF_template_printBlock(array('title' => @_FOLDERS,'data' => $this->_smarty_vars['capture']['t_folders_code'],'image' => "32x32/folders.png",'options' => $this->_tpl_vars['T_FOLDERS_OPTIONS']), $this);?>

    </td>
   </tr>
  <?php $this->_smarty_vars['capture']['moduleSideOperations'] = ob_get_contents(); ob_end_clean(); ?>
 <?php endif; ?>
 </td></tr>
<?php $this->_smarty_vars['capture']['moduleMessagesPage'] = ob_get_contents(); ob_end_clean(); ?>