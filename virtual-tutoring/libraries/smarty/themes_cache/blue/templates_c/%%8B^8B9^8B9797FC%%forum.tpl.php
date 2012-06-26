<?php /* Smarty version 2.6.26, created on 2012-05-15 11:57:04
         compiled from includes/forum.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/forum.tpl', 45, false),array('function', 'cycle', 'includes/forum.tpl', 215, false),array('modifier', 'eF_truncate', 'includes/forum.tpl', 406, false),)), $this); ?>
<?php $this->assign('current_forum', $_GET['forum']); ?>

<?php if (! $this->_tpl_vars['T_CURRENT_USER']->coreAccess['forum'] || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['forum'] == 'change'): ?>
 <?php $this->assign('_change_', 1); ?>
<?php endif; ?>
 <?php ob_start(); ?>
     <tr><td class = "moduleCell">

<?php if ($_GET['type'] == 'forum' && ( $_GET['add'] || $_GET['edit'] )): ?>
 <?php ob_start(); ?>
     <?php echo $this->_tpl_vars['T_ENTITY_FORM']['javascript']; ?>

     <form <?php echo $this->_tpl_vars['T_ENTITY_FORM']['attributes']; ?>
>
     <?php echo $this->_tpl_vars['T_ENTITY_FORM']['hidden']; ?>

         <table class = "formElements">
             <tr><td class = "labelCell"><?php echo @_TITLE; ?>
:&nbsp;</td>
                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['title']['html']; ?>
</td></tr>
                 <?php if ($this->_tpl_vars['T_ENTITY_FORM']['title']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['title']['error']; ?>
</td></tr><?php endif; ?>
     <?php if (! $_GET['forum_id']): ?>
             <tr><td class = "labelCell"><?php echo @_ACCESSIBLEBYUSERSOFLESSON; ?>
:&nbsp;</td>
                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['lessons_ID']['html']; ?>
</td></tr>
                 <?php if ($this->_tpl_vars['T_ENTITY_FORM']['lessons_ID']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['lessons_ID']['error']; ?>
</td></tr><?php endif; ?>
     <?php endif; ?>
  <?php if ($_SESSION['s_type'] != 'student'): ?>
             <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['status']['label']; ?>
:&nbsp;</td>
                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['status']['html']; ?>
</td></tr>
                 <?php if ($this->_tpl_vars['T_ENTITY_FORM']['status']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['status']['error']; ?>
</td></tr><?php endif; ?>
     <?php endif; ?>
    <tr><td></td><td>
    <span>
     <img onclick = "toggledInstanceEditor = 'comments';javascript:toggleEditor('comments','simpleEditor');" class = "handle" style="vertical-align:middle" src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
     <a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'comments';javascript:toggleEditor('comments','simpleEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
    </span>
    </td></tr>
             <tr><td class = "labelCell"><?php echo @_COMMENTS; ?>
:&nbsp;</td>
                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['comments']['html']; ?>
</td></tr>
                 <?php if ($this->_tpl_vars['T_ENTITY_FORM']['comments']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['comments']['error']; ?>
</td></tr><?php endif; ?>
             <tr><td colspan = "2">&nbsp;</td></tr>
             <tr><td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['submit_add_forum']['html']; ?>
</td></tr>
         </table>
     </form>
 <?php if ($this->_tpl_vars['T_MESSAGE_TYPE'] == 'success'): ?>
     <script>parent.location = parent.location;</script>
 <?php endif; ?>
 <?php $this->_smarty_vars['capture']['t_add_forum_code'] = ob_get_contents(); ob_end_clean(); ?>
 <?php echo smarty_function_eF_template_printBlock(array('title' => @_FORUMPROPERTIES,'data' => $this->_smarty_vars['capture']['t_add_forum_code'],'image' => '32x32/forum.png','help' => 'Forum'), $this);?>

<?php elseif ($_GET['type'] == 'topic' && ( $_GET['add'] || $_GET['edit'] )): ?>
 <?php ob_start(); ?>
     <?php echo $this->_tpl_vars['T_ENTITY_FORM']['javascript']; ?>

     <form <?php echo $this->_tpl_vars['T_ENTITY_FORM']['attributes']; ?>
>
     <?php echo $this->_tpl_vars['T_ENTITY_FORM']['hidden']; ?>

         <table class = "formElements" >
             <tr><td class = "labelCell"><?php echo @_TITLE; ?>
:&nbsp;</td>
                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['title']['html']; ?>
</td></tr>
                 <?php if ($this->_tpl_vars['T_ENTITY_FORM']['title']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['title']['error']; ?>
</td></tr><?php endif; ?>
         <?php if (! $this->_tpl_vars['_student_']): ?>
             <tr><td class = "labelCell"><?php echo @_STATUS; ?>
:&nbsp;</td>
                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['status']['html']; ?>
</td></tr>
                 <?php if ($this->_tpl_vars['T_ENTITY_FORM']['status']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['status']['error']; ?>
</td></tr><?php endif; ?>
         <?php endif; ?>
 <?php if (! $_GET['edit']): ?>
    <tr><td></td><td>
    <span>
     <img onclick = "toggledInstanceEditor = 'message';javascript:toggleEditor('message','simpleEditor');" class = "handle" style="vertical-align:middle" src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
     <a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'message';javascript:toggleEditor('message','simpleEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
    </span>
    </td></tr>
             <tr><td class = "labelCell"><?php echo @_MESSAGE; ?>
:&nbsp;</td>
                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['message']['html']; ?>
</td></tr>
                 <?php if ($this->_tpl_vars['T_ENTITY_FORM']['message']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['message']['error']; ?>
</td></tr><?php endif; ?>
 <?php endif; ?>
             <tr><td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['submit_add_topic']['html']; ?>
</td></tr>
         </table>
     </form>
 <?php if ($this->_tpl_vars['T_MESSAGE_TYPE'] == 'success'): ?>
     <script>parent.location = parent.location;</script>
 <?php endif; ?>
 <?php $this->_smarty_vars['capture']['t_add_topic_code'] = ob_get_contents(); ob_end_clean(); ?>
 <?php echo smarty_function_eF_template_printBlock(array('title' => @_TOPICPROPERTIES,'data' => $this->_smarty_vars['capture']['t_add_topic_code'],'image' => '32x32/forum.png','help' => 'Forum'), $this);?>

<?php elseif ($_GET['type'] == 'poll' && ( $_GET['add'] || $_GET['edit'] )): ?>
 <?php ob_start(); ?>
  <script>var twooptionsminimum = '<?php echo @_TWOOPTIONSATMINIMUMREQUIRED; ?>
'; var removechoice= '<?php echo @_REMOVECHOICE; ?>
';</script>
     <?php echo $this->_tpl_vars['T_ENTITY_FORM']['javascript']; ?>

     <form <?php echo $this->_tpl_vars['T_ENTITY_FORM']['attributes']; ?>
>
     <?php echo $this->_tpl_vars['T_ENTITY_FORM']['hidden']; ?>

         <table class = "formElements">
             <tr><td class = "labelCell"><?php echo @_TITLE; ?>
:&nbsp;</td>
                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['poll_subject']['html']; ?>
</td></tr>
                 <?php if ($this->_tpl_vars['T_ENTITY_FORM']['poll_subject']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['poll_subject']['error']; ?>
</td></tr><?php endif; ?>
             <tr><td></td><td>
    <span>
     <img style="vertical-align:middle" onclick = "toggledInstanceEditor = 'poll_text';javascript:toggleEditor('poll_text','simpleEditor');" class = "handle" src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
     <a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'poll_text';javascript:toggleEditor('poll_text','simpleEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
    </span>
    </td></tr>

             <tr><td class = "labelCell"><?php echo @_BODY; ?>
:&nbsp;</td>
                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['poll_text']['html']; ?>
</td></tr>
                 <?php if ($this->_tpl_vars['T_ENTITY_FORM']['poll_text']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['poll_text']['error']; ?>
</td></tr><?php endif; ?>
             <tr><td class = "labelCell"><?php echo @_AVAILABLEFROM; ?>
:&nbsp;</td>
                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['from']['html']; ?>
</td></tr>
                 <?php if ($this->_tpl_vars['T_ENTITY_FORM']['from']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['from']['error']; ?>
</td></tr><?php endif; ?>
             <tr><td class = "labelCell"><?php echo @_TO; ?>
:&nbsp;</td>
                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['to']['html']; ?>
</td></tr>
                 <?php if ($this->_tpl_vars['T_ENTITY_FORM']['to']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['to']['error']; ?>
</td></tr><?php endif; ?>
             <tr><td class = "labelCell"><?php echo @_INSERTMULTIPLEQUESTIONS; ?>
:</td>
                 <td><table>
     <?php $_from = $this->_tpl_vars['T_ENTITY_FORM']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['multiple_one_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['multiple_one_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['multiple_one_list']['iteration']++;
?>
                         <tr><td><?php echo $this->_tpl_vars['item']['html']; ?>
</td>
         <?php if ($this->_foreach['multiple_one_list']['iteration'] > 2): ?>                              <td><a href = "javascript:void(0)" onclick = "removeImgNode(this, 'options')">
                                     <img src = "images/16x16/error_delete.png" border = "no" alt = "<?php echo @_REMOVECHOICE; ?>
" title = "<?php echo @_REMOVECHOICE; ?>
" />
                                 </a></td>
         <?php endif; ?>
                         </tr>
     <?php endforeach; endif; unset($_from); ?>
                         <tr id = "last_node"></tr>
                     </table>
                 </td></tr>
             <tr><td class = "labelCell">
                     <a href = "javascript:void(0)" onclick = "addAdditionalChoice()"><img src = "images/16x16/add.png" alt = "<?php echo @_ADDQUESTION; ?>
" title = "<?php echo @_ADDQUESTION; ?>
" border = "0"/></a>
                 </td><td>
                     <a href = "javascript:void(0)" onclick = "addAdditionalChoice()"><?php echo @_ADDOPTION; ?>
</a>
                 </td></tr>
             <tr><td colspan = "2">&nbsp;</td></tr>
             <tr><td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['submit_add_poll']['html']; ?>
</td></tr>
         </table>
     </form>
 <?php if ($this->_tpl_vars['T_MESSAGE_TYPE'] == 'success'): ?>
     <script>parent.location = parent.location;</script>
 <?php endif; ?>
 <?php $this->_smarty_vars['capture']['t_add_poll_code'] = ob_get_contents(); ob_end_clean(); ?>
 <?php echo smarty_function_eF_template_printBlock(array('title' => @_POLLPROPERTIES,'data' => $this->_smarty_vars['capture']['t_add_poll_code'],'image' => '32x32/forum.png','help' => 'Forum'), $this);?>

<?php elseif ($_GET['type'] == 'message' && ( $_GET['add'] || $_GET['edit'] )): ?>
 <?php ob_start(); ?>
     <?php echo $this->_tpl_vars['T_ENTITY_FORM']['javascript']; ?>

     <form <?php echo $this->_tpl_vars['T_ENTITY_FORM']['attributes']; ?>
>
     <?php echo $this->_tpl_vars['T_ENTITY_FORM']['hidden']; ?>

         <table class = "formElements" style = "width:99%">
             <tr><td class = "labelCell"><?php echo @_TITLE; ?>
:&nbsp;</td>
                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['title']['html']; ?>
</td></tr>
                 <?php if ($this->_tpl_vars['T_ENTITY_FORM']['title']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['title']['error']; ?>
</td></tr><?php endif; ?>

     <tr><td></td><td>
      <span>
       <img onclick = "toggledInstanceEditor = 'editor_message_data';javascript:toggleEditor('editor_message_data','simpleEditor');" class = "handle" style="vertical-align:middle" src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
       <a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'editor_message_data';javascript:toggleEditor('editor_message_data','simpleEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
      </span>
     </td></tr>

             <tr><td class = "labelCell"><?php echo @_BODY; ?>
:&nbsp;</td>
                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['body']['html']; ?>
</td></tr>
                 <?php if ($this->_tpl_vars['T_ENTITY_FORM']['body']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['body']['error']; ?>
</td></tr><?php endif; ?>
             <tr><td colspan = "2">&nbsp;</td></tr>
             <tr><td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['submit_add_message']['html']; ?>
</td></tr>
         </table>
     </form>
 <?php if ($this->_tpl_vars['T_MESSAGE_TYPE'] == 'success'): ?>
     <script>parent.location = parent.location;</script>
 <?php endif; ?>
 <?php $this->_smarty_vars['capture']['t_add_message_code'] = ob_get_contents(); ob_end_clean(); ?>
 <?php echo smarty_function_eF_template_printBlock(array('title' => @_MESSAGEPROPERTIES,'data' => $this->_smarty_vars['capture']['t_add_message_code'],'image' => '32x32/forum.png','help' => 'Forum'), $this);?>

<?php elseif ($_GET['config']): ?>
<?php ob_start(); ?>
 <?php echo $this->_tpl_vars['T_CONFIGURATION_FORM']['javascript']; ?>

 <form <?php echo $this->_tpl_vars['T_CONFIGURATION_FORM']['attributes']; ?>
>
 <?php echo $this->_tpl_vars['T_CONFIGURATION_FORM']['hidden']; ?>

     <table class = "formElements">
         <tr><td class = "labelCell"><?php echo @_ALLOWHTMLFPM; ?>
:&nbsp;</td>
             <td class = "elementCell"><?php echo $this->_tpl_vars['T_CONFIGURATION_FORM']['allow_html']['html']; ?>
</td></tr>
             <?php if ($this->_tpl_vars['T_CONFIGURATION_FORM']['allow_html']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_CONFIGURATION_FORM']['allow_html']['error']; ?>
</td></tr><?php endif; ?>
         <tr><td class = "labelCell"><?php echo @_ACTIVATEPOLLS; ?>
:&nbsp;</td>
             <td class = "elementCell"><?php echo $this->_tpl_vars['T_CONFIGURATION_FORM']['polls']['html']; ?>
</td></tr>
             <?php if ($this->_tpl_vars['T_CONFIGURATION_FORM']['polls']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_CONFIGURATION_FORM']['polls']['error']; ?>
</td></tr><?php endif; ?>
          <tr><td class = "labelCell"><?php echo @_USERSMAYADDFORUMS; ?>
:&nbsp;</td>
             <td class = "elementCell"><?php echo $this->_tpl_vars['T_CONFIGURATION_FORM']['students_add_forums']['html']; ?>
</td></tr>
             <?php if ($this->_tpl_vars['T_CONFIGURATION_FORM']['students_add_forums']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_CONFIGURATION_FORM']['students_add_forums']['error']; ?>
</td></tr><?php endif; ?>
    <tr><td colspan = "2">&nbsp;</td></tr>
             <td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_CONFIGURATION_FORM']['submit_settings']['html']; ?>
</td></tr>
     </table>
 </form>
<?php $this->_smarty_vars['capture']['t_configuration_panel_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo smarty_function_eF_template_printBlock(array('title' => @_FORUMCONFIGURATIONPANEL,'data' => $this->_smarty_vars['capture']['t_configuration_panel_code'],'image' => '32x32/edit.png','help' => 'Forum'), $this);?>


<?php else: ?>
  <?php if ($_GET['topic']): ?>
         <?php ob_start(); ?>
                <?php if ($this->_tpl_vars['_change_']): ?>
                <div class = "headerTools">
                 <span>
                  <img src = "images/16x16/add.png" alt = "<?php echo @_NEWMESSAGE; ?>
" title = "<?php echo @_NEWMESSAGE; ?>
"/>
                    <?php if ($this->_tpl_vars['T_TOPIC']['status'] == '2'): ?>
                  <a href = "javascript:void(0)" onclick = "alert('<?php echo @_NONEWMESSAGELOCKED; ?>
')" class = "inactiveLink" ><?php echo @_NEWMESSAGE; ?>
</a>
                    <?php else: ?>
                  <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&add=1&type=message&topic_id=<?php echo $_GET['topic']; ?>
&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_NEWMESSAGE; ?>
', 1)" target = "POPUP_FRAME" ><?php echo @_NEWMESSAGE; ?>
</a>
                    <?php endif; ?>
     </span>
    </div>
                <?php endif; ?>
    <table class = "forumMessageTable" style = "width:100%">
                <?php unset($this->_sections['messages_list']);
$this->_sections['messages_list']['name'] = 'messages_list';
$this->_sections['messages_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_POSTS']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['messages_list']['show'] = true;
$this->_sections['messages_list']['max'] = $this->_sections['messages_list']['loop'];
$this->_sections['messages_list']['step'] = 1;
$this->_sections['messages_list']['start'] = $this->_sections['messages_list']['step'] > 0 ? 0 : $this->_sections['messages_list']['loop']-1;
if ($this->_sections['messages_list']['show']) {
    $this->_sections['messages_list']['total'] = $this->_sections['messages_list']['loop'];
    if ($this->_sections['messages_list']['total'] == 0)
        $this->_sections['messages_list']['show'] = false;
} else
    $this->_sections['messages_list']['total'] = 0;
if ($this->_sections['messages_list']['show']):

            for ($this->_sections['messages_list']['index'] = $this->_sections['messages_list']['start'], $this->_sections['messages_list']['iteration'] = 1;
                 $this->_sections['messages_list']['iteration'] <= $this->_sections['messages_list']['total'];
                 $this->_sections['messages_list']['index'] += $this->_sections['messages_list']['step'], $this->_sections['messages_list']['iteration']++):
$this->_sections['messages_list']['rownum'] = $this->_sections['messages_list']['iteration'];
$this->_sections['messages_list']['index_prev'] = $this->_sections['messages_list']['index'] - $this->_sections['messages_list']['step'];
$this->_sections['messages_list']['index_next'] = $this->_sections['messages_list']['index'] + $this->_sections['messages_list']['step'];
$this->_sections['messages_list']['first']      = ($this->_sections['messages_list']['iteration'] == 1);
$this->_sections['messages_list']['last']       = ($this->_sections['messages_list']['iteration'] == $this->_sections['messages_list']['total']);
?>
                    <?php $this->assign('message_user', $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['users_LOGIN']); ?>
     <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColorNoHover, evenRowColorNoHover"), $this);?>
">
                     <td>
                      <div class = "blockHeader"><?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['title']; ?>
</div>
                      <div class = "forumMessageInfo"><?php echo @_POSTEDBY; ?>
<span> #filter:user_loginNoIcon-<?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['users_LOGIN']; ?>
# </span><?php echo @_ON; ?>
 #filter:timestamp_time-<?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['timestamp']; ?>
# <?php if ($this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['replyto']): ?><?php echo @_INREPLYTO; ?>
: <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&topic=<?php echo $_GET['topic']; ?>
&view_message=<?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['replyto']; ?>
#<?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['replyto']; ?>
"><?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['reply_title']; ?>
</a><?php endif; ?></div>
                      <p><?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['body']; ?>
</p>
                  <?php if ($this->_tpl_vars['_change_']): ?>
                      <div class = "forumMessageTools">
                <?php if ($this->_tpl_vars['T_TOPIC']['status'] != '2'): ?>
                          <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&add=1&type=message&topic_id=<?php echo $_GET['topic']; ?>
&replyto=<?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['id']; ?>
&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup('<?php echo @_REPLY; ?>
', 2)"><img class = "handle" src = "images/16x16/message.png" title = "<?php echo @_REPLY; ?>
" alt = "<?php echo @_REPLY; ?>
"/></a>
                          <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&add=1&type=message&topic_id=<?php echo $_GET['topic']; ?>
&replyto=<?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['id']; ?>
&quote=1&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup('<?php echo @_REPLYWITHQUOTE; ?>
', 2)"><img class = "handle" src = "images/16x16/forums.png" title = "<?php echo @_REPLYWITHQUOTE; ?>
" alt = "<?php echo @_REPLYWITHQUOTE; ?>
"/></a>
                   <?php endif; ?>
                   <?php if ($_SESSION['s_type'] == 'administrator' || $_SESSION['s_login'] == $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['users_LOGIN']): ?>
                          <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&edit=<?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['id']; ?>
&type=message&topic_id=<?php echo $_GET['topic']; ?>
&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup('<?php echo @_EDIT; ?>
', 2)" class = "editLink"><img class = "handle" src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" /></a>
                          <img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_AREYOUSUREYOUWNATTODELETEMESSAGE; ?>
 <?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['title']; ?>
')) deleteForumMessage(this, '<?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['id']; ?>
', 'message')"/>
                   <?php endif; ?>
                      </div>
                  <?php endif; ?>
                     </td>
                     <td class = "forumMessageCreator">
                      <div><img src = "view_file.php?file=<?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['avatar']; ?>
" title="<?php echo @_CURRENTAVATAR; ?>
" alt="<?php echo @_CURRENTAVATAR; ?>
" width = "<?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['avatar_width']; ?>
" height = "<?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['avatar_height']; ?>
" /></div>
                         <div>#filter:user_loginNoIcon-<?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['users_LOGIN']; ?>
#</div>
       <?php $this->assign('current_userrole', $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['user_type']); ?>
                         <div><?php echo @_POSITION; ?>
: <?php echo $this->_tpl_vars['T_USERROLES'][$this->_tpl_vars['current_userrole']]; ?>
</div>
                         <div><?php echo @_JOINED; ?>
: #filter:timestamp-<?php echo $this->_tpl_vars['T_POSTS'][$this->_sections['messages_list']['index']]['timestamp']; ?>
#</div>
                         <div><?php echo @_POSTS; ?>
: <?php echo $this->_tpl_vars['T_USER_POSTS'][$this->_tpl_vars['message_user']]; ?>
</div>
                     </td></tr>
    <?php endfor; else: ?>
                 <tr><td colspan = "8" class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
"><?php echo @_NOMESSAGESFOUNDINTHISTOPIC; ?>
</td></tr>
             <?php endif; ?>
          </table>
   <?php $this->_smarty_vars['capture']['t_topic_code'] = ob_get_contents(); ob_end_clean(); ?>
         <?php echo smarty_function_eF_template_printBlock(array('title' => @_TOPICS,'data' => $this->_smarty_vars['capture']['t_topic_code'],'image' => '32x32/forum.png','help' => 'Forum'), $this);?>

  <?php elseif ($_GET['poll']): ?>
   <?php ob_start(); ?>
       <?php if ($this->_tpl_vars['T_ACTION'] == 'view' || ! $this->_tpl_vars['T_POLL']['isopen']): ?>
           <table>
               <tr><td class = "blockHeader" colspan = "100%"><?php echo $this->_tpl_vars['T_POLL']['title']; ?>
</td></tr>
               <tr><td>&nbsp;</td></tr>
               <tr><td style = "text-align:left" colspan = "100%"><b><?php echo $this->_tpl_vars['T_POLL']['question']; ?>
</b></td></tr>
               <tr><td>&nbsp;</td></tr>
               <?php unset($this->_sections['votes_list']);
$this->_sections['votes_list']['name'] = 'votes_list';
$this->_sections['votes_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_POLL_VOTES']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['votes_list']['show'] = true;
$this->_sections['votes_list']['max'] = $this->_sections['votes_list']['loop'];
$this->_sections['votes_list']['step'] = 1;
$this->_sections['votes_list']['start'] = $this->_sections['votes_list']['step'] > 0 ? 0 : $this->_sections['votes_list']['loop']-1;
if ($this->_sections['votes_list']['show']) {
    $this->_sections['votes_list']['total'] = $this->_sections['votes_list']['loop'];
    if ($this->_sections['votes_list']['total'] == 0)
        $this->_sections['votes_list']['show'] = false;
} else
    $this->_sections['votes_list']['total'] = 0;
if ($this->_sections['votes_list']['show']):

            for ($this->_sections['votes_list']['index'] = $this->_sections['votes_list']['start'], $this->_sections['votes_list']['iteration'] = 1;
                 $this->_sections['votes_list']['iteration'] <= $this->_sections['votes_list']['total'];
                 $this->_sections['votes_list']['index'] += $this->_sections['votes_list']['step'], $this->_sections['votes_list']['iteration']++):
$this->_sections['votes_list']['rownum'] = $this->_sections['votes_list']['iteration'];
$this->_sections['votes_list']['index_prev'] = $this->_sections['votes_list']['index'] - $this->_sections['votes_list']['step'];
$this->_sections['votes_list']['index_next'] = $this->_sections['votes_list']['index'] + $this->_sections['votes_list']['step'];
$this->_sections['votes_list']['first']      = ($this->_sections['votes_list']['iteration'] == 1);
$this->_sections['votes_list']['last']       = ($this->_sections['votes_list']['iteration'] == $this->_sections['votes_list']['total']);
?>
                   <tr><td style = "text-align:left" width="20%"><?php echo $this->_tpl_vars['T_POLL_VOTES'][$this->_sections['votes_list']['index']]['text']; ?>
</td>
                   <td style="text-align=left" width="30%">
                       <img src="images/others/bar.jpg" width="<?php echo $this->_tpl_vars['T_POLL_VOTES'][$this->_sections['votes_list']['index']]['width']; ?>
" height="15"/>
                   </td>
                   <td style="text-align=left"><?php echo $this->_tpl_vars['T_POLL_VOTES'][$this->_sections['votes_list']['index']]['perc']*100; ?>
% </td>
                   </tr>
               <?php endfor; endif; ?>
           </table>
       <?php else: ?>
           <?php echo $this->_tpl_vars['T_POLL_FORM']['javascript']; ?>

           <form <?php echo $this->_tpl_vars['T_POLL_FORM']['attributes']; ?>
>
           <?php echo $this->_tpl_vars['T_POLL_FORM']['hidden']; ?>

           <table class = "formElements" style = "width:100%">
               <tr><td class = "blockHeader" ><?php echo $this->_tpl_vars['T_POLL']['title']; ?>
</td></tr>
               <tr><td class = ""><?php echo $this->_tpl_vars['T_POLL']['question']; ?>
</td></tr>
               <tr><td class = "elementCell"><?php echo $this->_tpl_vars['T_POLL_FORM']['options']['html']; ?>
</td></tr>
               <tr><td class = "submitCell"><?php echo $this->_tpl_vars['T_POLL_FORM']['submit_poll']['html']; ?>
</td></tr>
               <tr><td><?php echo @_TOTALVOTES; ?>
: <?php echo $this->_tpl_vars['T_POLL_TOTALVOTES']; ?>
</td></tr>
               <tr><td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&poll=<?php echo $_GET['poll']; ?>
&action=view"><?php echo @_VIEWRESULTS; ?>
</a></td></tr>
           </table>
           </form>
       <?php endif; ?>
   <?php $this->_smarty_vars['capture']['t_poll_code'] = ob_get_contents(); ob_end_clean(); ?>
   <?php echo smarty_function_eF_template_printBlock(array('title' => @_POLL,'data' => $this->_smarty_vars['capture']['t_poll_code'],'image' => '32x32/polls.png','help' => 'Forum'), $this);?>

 <?php else: ?>
  <?php ob_start(); ?>
      <?php $this->assign('current_forum', $_GET['forum']); ?>
   <table>
       <tr><td class = "blockHeader"><?php echo $this->_tpl_vars['T_FORUMS'][$this->_tpl_vars['current_forum']]['title']; ?>
</td></tr>
       <?php if ($this->_tpl_vars['T_FORUMS'][$this->_tpl_vars['current_forum']]['comments']): ?><tr><td class = "infoCell" style = "padding-bottom:5px"><?php echo $this->_tpl_vars['T_FORUMS'][$this->_tpl_vars['current_forum']]['comments']; ?>
</td></tr><?php endif; ?>
   </table>
   <?php if ($this->_tpl_vars['_change_']): ?>
    <div class = "headerTools">
     <span>
             <?php if ($_GET['forum']): ?>
     <?php if ($this->_tpl_vars['T_FORUMS'][$this->_tpl_vars['current_forum']]['status'] != '1'): ?>
      <img src = "images/16x16/add.png" alt = "<?php echo @_NEWTOPIC; ?>
" title = "<?php echo @_NEWTOPIC; ?>
"/>
      <a href = "javascript:void(0)" onclick = "alert('<?php echo @_NONEWMESSAGELOCKED; ?>
')" class = "inactiveLink" ><?php echo @_NEWTOPIC; ?>
</a>
                 <?php else: ?>
      <img src = "images/16x16/add.png" alt = "<?php echo @_NEWTOPIC; ?>
" title = "<?php echo @_NEWTOPIC; ?>
"/>
      <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&add=1&type=topic&forum_id=<?php echo $this->_tpl_vars['T_PARENT_FORUM']; ?>
&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_NEWTOPIC; ?>
', 2)" target = "POPUP_FRAME"><?php echo @_NEWTOPIC; ?>
</a>
     <?php endif; ?>
     </span>
     <?php if (! isset ( $this->_tpl_vars['T_FORUM_CONFIG']['polls'] ) || $this->_tpl_vars['T_FORUM_CONFIG']['polls']): ?>
     <span>
      <?php if ($this->_tpl_vars['T_FORUMS'][$this->_tpl_vars['current_forum']]['status'] != '1'): ?>
      <img src = "images/16x16/add.png" alt = "<?php echo @_NEWPOLL; ?>
" title = "<?php echo @_NEWPOLL; ?>
"/>
            <a href = "javascript:void(0)" onclick = "alert('<?php echo @_NONEWPOLLLOCKED; ?>
')" class = "inactiveLink" ><?php echo @_NEWPOLL; ?>
</a>
      <?php else: ?>
      <img src = "images/16x16/add.png" alt = "<?php echo @_NEWPOLL; ?>
" title = "<?php echo @_NEWPOLL; ?>
"/>
            <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&add=1&type=poll&forum_id=<?php echo $this->_tpl_vars['T_PARENT_FORUM']; ?>
&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_NEWPOLL; ?>
', 3)" target = "POPUP_FRAME"><?php echo @_NEWPOLL; ?>
</a>
      <?php endif; ?>
     </span>
     <?php endif; ?>
             <?php endif; ?>
           <?php if ($_SESSION['s_type'] == 'administrator'): ?>
                    <span>
                        <img src = "images/16x16/edit.png" title = "<?php echo @_FORUMCONFIGURATIONPANEL; ?>
" alt = "<?php echo @_FORUMCONFIGURATIONPANEL; ?>
"/ >
                        <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&config=1&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_FORUMCONFIGURATIONPANEL; ?>
', 1)" target = "POPUP_FRAME"><?php echo @_FORUMCONFIGURATIONPANEL; ?>
</a>
                    </span>
            <?php endif; ?>

          </div>
   <?php endif; ?>

   <?php if ($_GET['forum']): ?>
          <?php ob_start(); ?>
              <?php $_from = $this->_tpl_vars['T_FORUMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['subforums_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['subforums_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['subforum']):
        $this->_foreach['subforums_list']['iteration']++;
?>
                  <?php if ($this->_tpl_vars['subforum']['parent_id'] == $this->_tpl_vars['T_FORUMS'][$this->_tpl_vars['current_forum']]['id'] && $this->_tpl_vars['subforum']['status'] != '3'): ?>
                      <?php $this->assign('has_subforums', true); ?>
                                         <tr class = "<?php echo smarty_function_cycle(array('name' => $this->_tpl_vars['key'],'values' => "oddRowColor,evenRowColor"), $this);?>
">
                                             <td>
             <img class = "forumIcon" src = "images/32x32/forum.png" alt = "<?php echo @_FORUM; ?>
" title = "<?php echo @_FORUM; ?>
"/>
                                                 <div>
                                                  <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&forum=<?php echo $this->_tpl_vars['subforum']['id']; ?>
" ><?php echo $this->_tpl_vars['subforum']['title']; ?>
</a>
                                                  <p><?php echo $this->_tpl_vars['subforum']['comments']; ?>
</p>
                                                 </div>
                                             </td>
            <td><?php echo $this->_tpl_vars['subforum']['topics']; ?>
 <?php echo @_TOPICS; ?>
, <?php echo $this->_tpl_vars['subforum']['messages']; ?>
 <?php echo @_MESSAGES; ?>
<?php if ($this->_tpl_vars['subforum']['polls'] != 0): ?>, <?php echo $this->_tpl_vars['subforum']['polls']; ?>
 <?php echo @_POLLS; ?>
<?php endif; ?></td>
            <td>
                             <?php if ($this->_tpl_vars['subforum']['last_post']): ?>
                                             #filter:timestamp_time-<?php echo $this->_tpl_vars['subforum']['last_post']['timestamp']; ?>
#
                                             <br/> <?php echo @_BY; ?>
 #filter:user_loginNoIcon-<?php echo $this->_tpl_vars['subforum']['last_post']['users_LOGIN']; ?>
#
                                             <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&topic=<?php echo $this->_tpl_vars['subforum']['last_post']['f_topics_ID']; ?>
&view_message=<?php echo $this->_tpl_vars['subforum']['last_post']['id']; ?>
">&raquo;</a>
                             <?php else: ?>
                                             <span class = "emptyCategory"><?php echo @_NEVER; ?>
</span>
        <?php endif; ?>
                                             </td>
            <td class = "centerAlign">
                             <?php if ($this->_tpl_vars['subforum']['status'] == '2'): ?>
                <img src = "images/16x16/lock.png" alt = "<?php echo @_LOCKED; ?>
" title = "<?php echo @_LOCKED; ?>
"/><span style = "display:none"><?php echo @_LOCKED; ?>
</span>                              <?php elseif ($this->_tpl_vars['subforum']['status'] == '3'): ?>
                <img src = "images/16x16/error_delete.png" alt = "<?php echo @_INVISIBLE; ?>
" title = "<?php echo @_INVISIBLE; ?>
"/><span style = "display:none"><?php echo @_INVISIBLE; ?>
</span>
                             <?php else: ?>
                <img src = "images/16x16/unlocked.png" alt = "<?php echo @_PUBLIC; ?>
" title = "<?php echo @_PUBLIC; ?>
"/><span style = "display:none"><?php echo @_PUBLIC; ?>
</span>
                             <?php endif; ?>
                                             </td>
      <?php if (( $this->_tpl_vars['_change_'] ) && ! $this->_tpl_vars['_student_']): ?>
            <td class = "centerAlign">
                         <?php if ($this->_tpl_vars['_admin_'] || ( $this->_tpl_vars['_professor_'] && $_SESSION['s_login'] == $this->_tpl_vars['subforum']['users_LOGIN'] )): ?>
                               <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&edit=<?php echo $this->_tpl_vars['subforum']['id']; ?>
&type=forum&parent_forum_id=<?php echo $this->_tpl_vars['T_PARENT_FORUM']; ?>
&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_EDIT; ?>
', 1)" target = "POPUP_FRAME"><img class = "handle" src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" alt = "<?php echo @_EDIT; ?>
" /></a>
                                  <img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "deleteForumEntity(this, '<?php echo $this->_tpl_vars['subforum']['id']; ?>
', 'forum');"/>
                         <?php endif; ?>
                                             </td>
                     <?php endif; ?>
                                         </tr>
                         <?php endif; ?>
                     <?php endforeach; else: ?>
                                         <tr class = "oddRowColor defaultRowHeight"><td colspan = "4" class = "emptyCategory"><?php echo @_NOSUBFORUMSFOUND; ?>
</td></tr>
                     <?php endif; unset($_from); ?>
                 <?php $this->_smarty_vars['capture']['subforums_list_code'] = ob_get_contents(); ob_end_clean(); ?>
                 <?php if ($this->_tpl_vars['has_subforums']): ?>
                                     <table class = "forumTable">
                                         <tr>
                                             <td class = "topTitle" style = "width:50%"><?php echo @_SUBFORUMS; ?>
</td>
                                             <td class = "topTitle" style = "width:20%"><?php echo @_ACTIVITY; ?>
</td>
                                             <td class = "topTitle" style = "width:20%"><?php echo @_LASTPOST; ?>
</td>

           <?php if ($_SESSION['s_type'] != 'student'): ?>
            <td class = "topTitle centerAlign" style = "width:5%"><?php echo @_STATUS; ?>
</td>
                                         <?php else: ?>
            <td class = "topTitle centerAlign" style = "width:5%"><?php echo @_STATUS; ?>
</td>
           <?php endif; ?>
           <td class = "topTitle centerAlign noSort" style = "width:5%"><?php if (! $this->_tpl_vars['_student_']): ?><?php echo @_OPERATIONS; ?>
<?php endif; ?></td>
                                         </tr>
                                         <?php echo $this->_smarty_vars['capture']['subforums_list_code']; ?>

                                     </table>
                                     <br/>
                 <?php endif; ?>
                 <?php if ($this->_tpl_vars['T_FORUM_POLLS']): ?>
                                     
                                     <table class = "forumTable">
                                         <tr>
                                             <td class = "topTitle firstColumn"><?php echo @_POLLS; ?>
</td>
                                             <td class = "topTitle secondColumn"><?php echo @_AUTHOR; ?>
</td>
                                             <td class = "topTitle thirdColumn" ><?php echo @_ISVALID; ?>
</td>
                                             <td class = "topTitle toolsColumn" ><?php echo @_VOTES; ?>
</td>
                                          <td class = "topTitle toolsColumn noSort">
                                         <?php if ($this->_tpl_vars['_change_']): ?>
                                          <?php echo @_OPERATIONS; ?>

                                         <?php endif; ?>
                                          </td>
                                         </tr>
                     <?php $_from = $this->_tpl_vars['T_FORUM_POLLS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['polls_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['polls_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['poll']):
        $this->_foreach['polls_list']['iteration']++;
?>
                                         <tr class = "<?php echo smarty_function_cycle(array('name' => 'polls','values' => "oddRowColor,evenRowColor"), $this);?>
">
                                             <td>
                                              <img class = "forumIcon" src = "images/32x32/polls.png" alt = "<?php echo @_POLL; ?>
" title = "<?php echo @_POLL; ?>
"/>
                                                 <div>
                                                  <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&poll=<?php echo $this->_tpl_vars['poll']['id']; ?>
" class = "smallHeader" style = "white-space:normal"><?php echo $this->_tpl_vars['poll']['title']; ?>
</a>
                                                  <p><?php echo ((is_array($_tmp=$this->_tpl_vars['poll']['question'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 50) : smarty_modifier_eF_truncate($_tmp, 50)); ?>
</p>
                                                 </div>
                                             </td>
                                             <td>#filter:user_loginNoIcon-<?php echo $this->_tpl_vars['poll']['users_LOGIN']; ?>
#</td>
                                             <td><?php echo @_FROM; ?>
 <b>#filter:timestamp_time-<?php echo $this->_tpl_vars['poll']['timestamp_start']; ?>
#</b> <br/><?php echo @_TO; ?>
 <b>#filter:timestamp_time-<?php echo $this->_tpl_vars['poll']['timestamp_end']; ?>
#</b></td>
                                             <td class = "centerAlign"><?php echo $this->_tpl_vars['poll']['votes']; ?>
</td>
      <?php if ($this->_tpl_vars['_change_']): ?>
                                             <td class = "centerAlign">
                         <?php if ($_SESSION['s_type'] == 'administrator' || $_SESSION['s_login'] == $this->_tpl_vars['poll']['users_LOGIN']): ?>
                         <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&type=poll&edit=<?php echo $this->_tpl_vars['poll']['id']; ?>
&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_EDIT; ?>
', 2)" class = "editLink" target = "POPUP_FRAME"><img class = "handle" src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" alt = "<?php echo @_EDIT; ?>
" /></a>
                         <img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if(confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteForumEntity(this, '<?php echo $this->_tpl_vars['poll']['id']; ?>
', 'poll')"/>
                         <?php endif; ?>
                                             </td>
                     <?php endif; ?>
                                         </tr>
                     <?php endforeach; else: ?>
                                         <tr class = "oddRowColor defaultRowHeight"><td colspan = "100%" class = "emptyCategory"><?php echo @_NOPOLLSSFOUNDINTHISFORUM; ?>
</td></tr>
                     <?php endif; unset($_from); ?>
                                     </table>
                                     <br/>
                 <?php endif; ?>
                 <?php if ($this->_tpl_vars['T_FORUM_TOPICS'] || ( ! $this->_tpl_vars['T_HAS_SUBFORUMS'] && ! $this->_tpl_vars['T_FORUM_POLLS'] )): ?> <!--ajax:topicsTable-->

                                    <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "2" id = "topicsTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&forum=<?php echo $_GET['forum']; ?>
&">

                                         <tr>
                                             <td name = "title" class = "topTitle firstColumn"><?php echo @_TOPICS; ?>
</td>
                                             <td name = "messages" class = "topTitle secondColumn"><?php echo @_MESSAGES; ?>
</td>
                                             <td name = "last_post_timestamp" class = "topTitle thirdColumn"><?php echo @_LASTPOST; ?>
</td>
                                             <td name = "status" class = "centerAlign topTitle toolsColumn"><?php echo @_STATUS; ?>
</td>
                                             <td class = "topTitle centerAlign  toolsColumn noSort"><?php if ($this->_tpl_vars['_change_'] && ! $this->_tpl_vars['_student_']): ?><?php echo @_OPERATIONS; ?>
<?php endif; ?></td>
                                         </tr>
      <?php $this->assign('novisible', 0); ?>
                     <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['topics_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['topics_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['topic']):
        $this->_foreach['topics_list']['iteration']++;
?>
                         <?php if ($_SESSION['s_type'] == 'administrator' || $this->_tpl_vars['topic']['status'] != '3' || $this->_tpl_vars['topic']['users_LOGIN'] == $_SESSION['s_login']): ?>
                                         <tr class = "<?php echo smarty_function_cycle(array('name' => 'topics','values' => "oddRowColor,evenRowColor"), $this);?>
">
                                             <td>
                                              <img class = "forumIcon" src = "images/32x32/message.png" alt = "<?php echo @_TOPIC; ?>
" title = "<?php echo @_TOPIC; ?>
"/>
                                              <div>
                                                  <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&topic=<?php echo $this->_tpl_vars['topic']['id']; ?>
" class = "smallHeader" style = "white-space:normal"><?php echo $this->_tpl_vars['topic']['title']; ?>
</a>
                                                  <p><?php echo ((is_array($_tmp=$this->_tpl_vars['topic']['first_message'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 50) : smarty_modifier_eF_truncate($_tmp, 50)); ?>
</p>
                                                 </div>
                                             </td>
                                             <td><?php echo $this->_tpl_vars['topic']['messages']; ?>
&nbsp;<?php echo @_POSTS; ?>
</td>
                                             <td><?php if ($this->_tpl_vars['topic']['last_post']): ?>
                #filter:timestamp_time-<?php echo $this->_tpl_vars['topic']['last_post']['timestamp']; ?>
#
                <br/> <?php echo @_BY; ?>
 #filter:user_loginNoIcon-<?php echo $this->_tpl_vars['topic']['last_post']['users_LOGIN']; ?>
#
                <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&topic=<?php echo $this->_tpl_vars['topic']['last_post']['id']; ?>
&view_message=<?php echo $this->_tpl_vars['topic']['last_post']['id']; ?>
">&raquo;</a>
                <?php endif; ?>
                                             </td>
                                             <td class = "centerAlign">
                             <?php if ($this->_tpl_vars['topic']['status'] == '2'): ?>
                <img src = "images/16x16/lock.png" alt = "<?php echo @_LOCKED; ?>
" title = "<?php echo @_LOCKED; ?>
"/><span style = "display:none"><?php echo @_LOCKED; ?>
</span>                              <?php elseif ($this->_tpl_vars['topic']['status'] == '3'): ?>
                <img src = "images/16x16/error_delete.png" alt = "<?php echo @_INVISIBLE; ?>
" title = "<?php echo @_INVISIBLE; ?>
"/><span style = "display:none"><?php echo @_INVISIBLE; ?>
</span>
                             <?php else: ?>
                <img src = "images/16x16/unlocked.png" alt = "<?php echo @_PUBLIC; ?>
" title = "<?php echo @_PUBLIC; ?>
"/><span style = "display:none"><?php echo @_PUBLIC; ?>
</span>
                             <?php endif; ?>
                                             </td>
                                             <td class = "centerAlign">
                         <?php if ($this->_tpl_vars['_change_']): ?>
                             <?php if ($_SESSION['s_type'] == 'administrator' || ( $_SESSION['s_login'] == $this->_tpl_vars['topic']['users_LOGIN'] && $this->_tpl_vars['T_FORUMS'][$this->_tpl_vars['current_forum']]['status'] != '2' )): ?>
                <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&type=topic&edit=<?php echo $this->_tpl_vars['topic']['id']; ?>
&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_EDIT; ?>
', 1)" class = "editLink" target = "POPUP_FRAME"><img class = "handle" src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" alt = "<?php echo @_EDIT; ?>
" /></a>
                <img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteForumEntity(this, '<?php echo $this->_tpl_vars['topic']['id']; ?>
', 'topic')"/>
                             <?php endif; ?>
                         <?php endif; ?>
                                             </td>
                                         </tr>
                         <?php else: ?>
         <?php $this->assign('novisible', $this->_tpl_vars['novisible']+1); ?>
       <?php endif; ?>
                     <?php endforeach; else: ?>
                                         <tr class = "oddRowColor defaultRowHeight"><td colspan = "6" class = "emptyCategory"><?php echo @_NOTOPICSFOUNDINTHISFORUM; ?>
</td></tr>
                     <?php endif; unset($_from); ?>
       <?php if ($this->_tpl_vars['novisible'] == $this->_foreach['topics_list']['total'] && $this->_foreach['topics_list']['total'] != 0): ?>
         <tr class = "oddRowColor defaultRowHeight"><td colspan = "5" class = "emptyCategory"><?php echo @_NOVISIBLETOPICSFOUNDINTHISFORUM; ?>
</td></tr>

       <?php endif; ?>
                             </table>
<!--/ajax:topicsTable-->
                 <?php endif; ?>

             <?php else: ?>
<!--ajax:forumsTable-->
                 <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "2" id = "forumsTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&">
                     <tr>
                         <td name = "title" class = "topTitle firstColumn"><?php echo @_FORUMS; ?>
</td>
                         <td name = "activity" class = "topTitle secondColumn"><?php echo @_ACTIVITY; ?>
</td>
                         <td name = "last_post_timestamp" class = "topTitle thirdColumn"><?php echo @_LASTPOST; ?>
</td>
       <td name = "status" class = "centerAlign topTitle toolsColumn"><?php echo @_STATUS; ?>
</td>
       <?php if ($this->_tpl_vars['_change_'] && $this->_tpl_vars['_admin_']): ?>
        <td class = "centerAlign topTitle toolsColumn noSort"><?php echo @_OPERATIONS; ?>
</td>
       <?php endif; ?>
                     </tr>
                    <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['subforums_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['subforums_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['subforum']):
        $this->_foreach['subforums_list']['iteration']++;
?>
                        <?php if ($this->_tpl_vars['subforum']['parent_id'] == 0 && ( $this->_tpl_vars['subforum']['status'] != '3' || $_SESSION['s_type'] == 'administrator' )): ?>
                        <tr class = "<?php echo smarty_function_cycle(array('name' => $this->_tpl_vars['key'],'values' => "oddRowColor,evenRowColor"), $this);?>
">
                            <td>
                             <img class = "forumIcon" src = "images/32x32/forum.png" alt = "<?php echo @_FORUM; ?>
" title = "<?php echo @_FORUM; ?>
" />
                             <div>
                                 <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&forum=<?php echo $this->_tpl_vars['subforum']['id']; ?>
"><?php echo $this->_tpl_vars['subforum']['title']; ?>
</a>
                                 <p><?php echo $this->_tpl_vars['subforum']['comments']; ?>
</p>
                                </div>
                            </td>
                            <td>
        <?php echo $this->_tpl_vars['subforum']['subforums']; ?>
 <?php echo @_SUBFORUMS; ?>
, <?php echo $this->_tpl_vars['subforum']['topics']; ?>
 <?php echo @_TOPICS; ?>
, <?php echo $this->_tpl_vars['subforum']['messages']; ?>
 <?php echo @_MESSAGES; ?>
<?php if ($this->_tpl_vars['subforum']['polls']): ?>,<?php echo $this->_tpl_vars['subforum']['polls']; ?>
 <?php echo @_POLLS; ?>
<?php endif; ?>
       </td>
       <td>
                      <?php if ($this->_tpl_vars['subforum']['last_post']): ?>
                       #filter:timestamp_time-<?php echo $this->_tpl_vars['subforum']['last_post']['timestamp']; ?>
#
                             <br/> <?php echo @_BY; ?>
 #filter:user_loginNoIcon-<?php echo $this->_tpl_vars['subforum']['last_post']['users_LOGIN']; ?>
#
                             <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&topic=<?php echo $this->_tpl_vars['subforum']['last_post']['f_topics_ID']; ?>
&view_message=<?php echo $this->_tpl_vars['subforum']['last_post']['id']; ?>
">&raquo;</a></td>
                      <?php else: ?>
                       <span class = "emptyCategory"><?php echo @_NEVER; ?>
</span>
                      <?php endif; ?>
       </td>
       <td class = "centerAlign">
                      <?php if ($this->_tpl_vars['subforum']['status'] == '2'): ?>
                       <img src = "images/16x16/lock.png" alt = "<?php echo @_LOCKED; ?>
" title = "<?php echo @_LOCKED; ?>
"/><span style = "display:none"><?php echo @_LOCKED; ?>
</span>                       <?php elseif ($this->_tpl_vars['subforum']['status'] == '3'): ?>
                             <img src = "images/16x16/error_delete.png" alt = "<?php echo @_INVISIBLE; ?>
" title = "<?php echo @_INVISIBLE; ?>
"/><span style = "display:none"><?php echo @_INVISIBLE; ?>
</span>
                      <?php else: ?>
                             <img src = "images/16x16/unlocked.png" alt = "<?php echo @_PUBLIC; ?>
" title = "<?php echo @_PUBLIC; ?>
"/><span style = "display:none"><?php echo @_PUBLIC; ?>
</span>
                      <?php endif; ?>
                         </td>
                      <?php if ($this->_tpl_vars['_change_'] && $this->_tpl_vars['_admin_']): ?>
                         <td class = "centerAlign">
                          <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&edit=<?php echo $this->_tpl_vars['subforum']['id']; ?>
&type=forum&parent_forum_id=<?php echo $this->_tpl_vars['T_PARENT_FORUM']; ?>
&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_EDIT; ?>
', 1)" target = "POPUP_FRAME"><img class = "handle" src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" alt = "<?php echo @_EDIT; ?>
" /></a>
                             <img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "deleteForumEntity(this, '<?php echo $this->_tpl_vars['subforum']['id']; ?>
', 'forum');"/>
                         </td>
                         <?php endif; ?>
                     </tr>
                        <?php endif; ?>
                    <?php endforeach; else: ?>
                     <tr class = "oddRowColor defaultRowHeight"><td colspan = "5" class = "emptyCategory"><?php echo @_NOSUBFORUMSFOUND; ?>
</td></tr>
                 <?php endif; unset($_from); ?>
                 </table>
<!--/ajax:forumsTable-->
             <?php endif; ?>
         <?php $this->_smarty_vars['capture']['t_forums_code'] = ob_get_contents(); ob_end_clean(); ?>

         <?php echo smarty_function_eF_template_printBlock(array('title' => @_FORUMS,'data' => $this->_smarty_vars['capture']['t_forums_code'],'image' => '32x32/forum.png','options' => $this->_tpl_vars['T_FORUM_OPTIONS'],'help' => 'Forum'), $this);?>

 <?php endif; ?>

<?php endif; ?>

</td></tr>
     <?php $this->_smarty_vars['capture']['moduleForum'] = ob_get_contents(); ob_end_clean(); ?>