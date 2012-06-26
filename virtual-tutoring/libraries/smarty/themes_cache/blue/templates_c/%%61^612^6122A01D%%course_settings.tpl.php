<?php /* Smarty version 2.6.26, created on 2012-05-16 07:17:04
         compiled from includes/course_settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/course_settings.tpl', 12, false),array('function', 'eF_template_html_select_date', 'includes/course_settings.tpl', 53, false),array('function', 'html_select_time', 'includes/course_settings.tpl', 53, false),array('modifier', 'sizeof', 'includes/course_settings.tpl', 126, false),array('modifier', 'addSlashes', 'includes/course_settings.tpl', 145, false),array('modifier', 'cat', 'includes/course_settings.tpl', 158, false),array('modifier', 'eF_truncate', 'includes/course_settings.tpl', 165, false),)), $this); ?>
<?php if ($this->_tpl_vars['T_OP'] == course_info): ?>
 <?php ob_start(); ?>
  <fieldset class = "fieldsetSeparator">
   <legend><?php echo @_COURSEINFORMATION; ?>
</legend>
   <?php echo $this->_tpl_vars['T_COURSE_INFO_HTML']; ?>

  </fieldset>
  <fieldset class = "fieldsetSeparator">
   <legend><?php echo @_COURSEMETADATA; ?>
</legend>
   <?php echo $this->_tpl_vars['T_COURSE_METADATA_HTML']; ?>

  </fieldset>
 <?php $this->_smarty_vars['capture']['t_course_info_code'] = ob_get_contents(); ob_end_clean(); ?>
 <?php echo smarty_function_eF_template_printBlock(array('title' => (@_INFORMATIONFORCOURSE)."<span class = 'innerTableName'>&nbsp;&quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_course_info_code'],'image' => '32x32/information.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'options' => $this->_tpl_vars['T_COURSE_OPTIONS'],'help' => 'Course_actions'), $this);?>

<?php elseif ($this->_tpl_vars['T_OP'] == 'course_certificates'): ?>
 <?php if ($_GET['edit_user']): ?>
  <?php ob_start(); ?>
  <fieldset class = "fieldsetSeparator">
   <legend><?php echo @_LESSONSPROGRESS; ?>
</legend>
   <table>
    <tr>
   <?php $_from = $this->_tpl_vars['T_USER_COURSE_LESSON_STATUS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['lesson']):
        $this->_foreach['lessons_list']['iteration']++;
?>
     <td style = "width:50%;">
     <table>
      <tr><td class = "labelCell"><?php echo @_LESSON; ?>
:&nbsp;</td>
       <td class = "elementCell"><?php echo $this->_tpl_vars['lesson']->lesson['name']; ?>
</td></tr>
      <tr><td class = "labelCell"><?php echo @_COMPLETED; ?>
:&nbsp;</td>
       <td class = "elementCell"><?php if ($this->_tpl_vars['lesson']->lesson['completed']): ?><?php echo @_YES; ?>
<?php else: ?><?php echo @_NO; ?>
<?php endif; ?></td></tr>
     <?php if ($this->_tpl_vars['lesson']->lesson['score']): ?>
      <tr><td class = "labelCell"><?php echo @_SCORE; ?>
:&nbsp;</td>
       <td class = "elementCell"><?php echo $this->_tpl_vars['lesson']->lesson['score']; ?>
&nbsp;%</td></tr>
     <?php endif; ?>
      <tr><td class = "labelCell"><?php echo @_CONTENTDONE; ?>
:&nbsp;</td>
       <td class = "progressCell" style = "vertical-align:top">
        <span class = "progressNumber"><?php if ($this->_tpl_vars['lesson']->lesson['overall_progress']['percentage']): ?><?php echo $this->_tpl_vars['lesson']->lesson['overall_progress']['percentage']; ?>
<?php else: ?>0<?php endif; ?>%</span>
        <span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['lesson']->lesson['overall_progress']['percentage']; ?>
px;">&nbsp;</span>
       </td></tr>
     </table>
     </td>
    </tr><tr>
   <?php endforeach; endif; unset($_from); ?>
    </tr>
   </table>
  </fieldset>
  <fieldset class = "fieldsetSeparator">
   <legend><?php echo @_COMPLETECOURSE; ?>
</legend>
   <?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['javascript']; ?>

   <form <?php echo $this->_tpl_vars['T_COMPLETE_COURSE_FORM']['attributes']; ?>
>
    <?php echo $this->_tpl_vars['T_COMPLETE_COURSE_FORM']['hidden']; ?>

    <table class = "formElements">
     <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COMPLETE_COURSE_FORM']['completed']['label']; ?>
&nbsp;</td><td><?php echo $this->_tpl_vars['T_COMPLETE_COURSE_FORM']['completed']['html']; ?>
</td></tr>

     <tr><td class = "labelCell"><?php echo @_COMPLETEDON; ?>
:&nbsp;</td>
      <td class = "elementCell"><?php if (! $this->_tpl_vars['T_USER_COURSE']->user['completed']): ?>#filter:timestamp_time-<?php echo $this->_tpl_vars['T_USER_COURSE']->user['to_timestamp']; ?>
#<?php endif; ?>
      <?php echo smarty_function_eF_template_html_select_date(array('prefix' => 'completion_','time' => $this->_tpl_vars['T_TO_TIMESTAMP'],'start_year' => "-2",'end_year' => "+2",'field_order' => $this->_tpl_vars['T_DATE_FORMATGENERAL']), $this);?>
 <?php echo @_TIME; ?>
: <?php echo smarty_function_html_select_time(array('prefix' => 'completion_','time' => $this->_tpl_vars['T_TO_TIMESTAMP'],'display_seconds' => false), $this);?>

     </td></tr>

     <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COMPLETE_COURSE_FORM']['score']['label']; ?>
&nbsp;</td><td><?php echo $this->_tpl_vars['T_COMPLETE_COURSE_FORM']['score']['html']; ?>
</td></tr>
     <?php if (! $this->_tpl_vars['T_USER_COURSE']->user['completed']): ?>
     <tr><td></td>
      <td class = "infoCell"><?php echo @_PROPOSEDSCOREISAVERAGELESSONSCORE; ?>
</td></tr>
     <?php endif; ?>
     <?php if ($this->_tpl_vars['T_COMPLETE_COURSE_FORM']['score']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_COMPLETE_COURSE_FORM']['score']['error']; ?>
</td></tr><?php endif; ?>
     <tr><td></td>
      <td><span>
       <img onclick = "toggledInstanceEditor = 'comments';javascript:toggleEditor('comments','simpleEditor');" class = "handle" style="vertical-align:middle" src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
       <a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'comments';javascript:toggleEditor('comments','simpleEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
      </span></td></tr>
     <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COMPLETE_COURSE_FORM']['comments']['label']; ?>
&nbsp;</td><td><?php echo $this->_tpl_vars['T_COMPLETE_COURSE_FORM']['comments']['html']; ?>
</td></tr>
     <?php if ($this->_tpl_vars['T_COMPLETE_COURSE_FORM']['comments']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_COMPLETE_COURSE_FORM']['comments']['error']; ?>
</td></tr><?php endif; ?>
     <tr><td colspan = "100%">&nbsp;</td></tr>
     <tr><td></td><td><?php echo $this->_tpl_vars['T_COMPLETE_COURSE_FORM']['submit_course_complete']['html']; ?>
</td></tr>
    </table>
   </form>
  </fieldset>
  <?php $this->_smarty_vars['capture']['t_course_user_progress'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo smarty_function_eF_template_printBlock(array('title' => ($this->_tpl_vars['T_USER_COURSE']->user['name'])." ".($this->_tpl_vars['T_USER_COURSE']->user['surname'])."&#039s ".(@_PROGRESS),'data' => $this->_smarty_vars['capture']['t_course_user_progress'],'image' => '32x32/users.png','help' => 'Course_actions'), $this);?>

 <?php if ($this->_tpl_vars['T_MESSAGE_TYPE'] == 'success'): ?>
 <script>
  re = /\?/;
  !re.test(parent.location) ? parent.location = parent.location+'?reset_popup=1' : parent.location = parent.location+'&reset_popup=1';
 </script>
 <?php endif; ?>
 <?php elseif ($_GET['issue_certificate']): ?>

 <?php else: ?>
  <?php ob_start(); ?>
   <script>var autocompleteyes = '<?php echo @_AUTOCOMPLETE; ?>
: <?php echo @_YES; ?>
';var autocompleteno = '<?php echo @_AUTOCOMPLETE; ?>
: <?php echo @_NO; ?>
';
     var autocertificateyes = '<?php echo @_AUTOMATICCERTIFICATES; ?>
: <?php echo @_YES; ?>
';var autocertificateno = '<?php echo @_AUTOMATICCERTIFICATES; ?>
: <?php echo @_NO; ?>
';</script>
   <div class = "headerTools">
    <span>
     <img src = "images/16x16/autocomplete.png" title = "<?php echo @_AUTOCOMPLETE; ?>
" alt = "<?php echo @_AUTOCOMPLETE; ?>
"/>
     <a href = "javascript:void(0)" <?php if (! $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] == 'change' || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] == 'change'): ?> onclick = "setAutoComplete(this)" <?php endif; ?>><?php echo @_AUTOCOMPLETE; ?>
: <?php if ($this->_tpl_vars['T_CURRENT_COURSE']->options['auto_complete']): ?><?php echo @_YES; ?>
<?php else: ?><?php echo @_NO; ?>
<?php endif; ?></a>
    </span>
    <span>
     <img src = "images/16x16/success.png" title = "<?php echo @_SETALLUSERSSTATUSCOMPLETED; ?>
" alt = "<?php echo @_SETALLUSERSSTATUSCOMPLETED; ?>
"/>
     <a href = "javascript:void(0)" <?php if (! $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] == 'change' || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] == 'change'): ?> onclick = "setAllUsersStatusCompleted(this)" <?php endif; ?>><?php echo @_SETALLUSERSSTATUSCOMPLETED; ?>
</a>
    </span>
   </div>
   <?php $this->assign('courseUsers_url', ($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=course_certificates&"); ?>
   <?php $this->assign('_change_handles_', false); ?>
   <?php $this->assign('certificate_export_method', $this->_tpl_vars['T_CERTIFICATE_EXPORT_METHOD']); ?>
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/common/course_users_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php $this->_smarty_vars['capture']['t_course_certificates_code'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo smarty_function_eF_template_printBlock(array('title' => (@_COMPLETION)."<span class = 'innerTableName'>&nbsp;&quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_course_certificates_code'],'image' => '32x32/autocomplete.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'options' => $this->_tpl_vars['T_COURSE_OPTIONS'],'help' => 'Course_actions'), $this);?>

 <?php endif; ?>
<?php elseif ($this->_tpl_vars['T_OP'] == 'format_certificate'): ?>
<?php elseif ($this->_tpl_vars['T_OP'] == 'format_certificate_docx'): ?>
<?php elseif ($this->_tpl_vars['T_OP'] == 'add_certificate_template' || $this->_tpl_vars['T_OP'] == 'edit_certificate_template'): ?>
<?php elseif ($this->_tpl_vars['T_OP'] == 'rename_certificate_template'): ?>
<?php elseif ($this->_tpl_vars['T_OP'] == 'clone_certificate_template'): ?>
<?php elseif ($this->_tpl_vars['T_OP'] == 'course_rules'): ?>
  <script>var dependson = '&nbsp;<?php echo @_DEPENDSON; ?>
&nbsp;';var generallyavailable = '&nbsp;<?php echo @_GENERALLYAVAILABLE; ?>
&nbsp;';</script>
  <?php ob_start(); ?>
   <fieldset class = "fieldsetSeparator">
    <legend><?php echo @_COURSELESSONSRULES; ?>
</legend>
      <?php echo $this->_tpl_vars['T_COURSE_RULES_FORM']['javascript']; ?>

      <form <?php echo $this->_tpl_vars['T_COURSE_RULES_FORM']['attributes']; ?>
>
      <?php echo $this->_tpl_vars['T_COURSE_RULES_FORM']['hidden']; ?>

      <table style = "max-width:100%">
    <?php $_from = $this->_tpl_vars['T_COURSE_LESSONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rules_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rules_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['rules_list']['iteration']++;
?>
       <tr class = "defaultRowHeight <?php if (! $this->_tpl_vars['item']['active']): ?>deactivatedTableElement<?php endif; ?>">
        <td id = "first_node_<?php echo $this->_tpl_vars['item']['id']; ?>
" style = "white-space:nowrap"><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
        <td id = "label_<?php echo $this->_tpl_vars['item']['id']; ?>
" style = "white-space:nowrap;">&nbsp;<?php echo @_GENERALLYAVAILABLE; ?>
&nbsp;</td>
        <td id = "insert_node_<?php echo $this->_tpl_vars['item']['id']; ?>
"></td>
        <td id = "last_node_<?php echo $this->_tpl_vars['item']['id']; ?>
" style = "white-space:nowrap;text-align:right;vertical-align:bottom">
         &nbsp;<img src = "images/16x16/error_delete.png" title = "<?php echo @_DELETECONDITION; ?>
" alt = "<?php echo @_DELETECONDITION; ?>
" border = "0" id = "delete_icon_<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick = "eF_js_removeCourseRule(<?php echo $this->_tpl_vars['item']['id']; ?>
)" style = "display:none"/>
         <?php if (sizeof($this->_tpl_vars['T_COURSE_LESSONS']) > 1): ?>&nbsp;<img src = "images/16x16/add.png" title = "<?php echo @_ADDCONDITION; ?>
" alt = "<?php echo @_ADDCONDITION; ?>
" border = "0" id = "add_icon_<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick = "eF_js_addCourseRule(<?php echo $this->_tpl_vars['item']['id']; ?>
)"/><?php endif; ?>
        </td>
       </tr>
    <?php endforeach; endif; unset($_from); ?>
       <tr><td>&nbsp;</td></tr>
       <tr><td></td><td class = "submitCell"><?php if (sizeof($this->_tpl_vars['T_COURSE_LESSONS']) > 1): ?><?php echo $this->_tpl_vars['T_COURSE_RULES_FORM']['submit_rule']['html']; ?>
<?php endif; ?></td></tr>
      </table>
      </form>
            <select name = "condition" id = "conditions" style = "display:none;margin-left:5px;vertical-align:middle">
       <option value = "and"><?php echo @_AND; ?>
</option>
       <option value = "or"><?php echo @_OR; ?>
</option>
      </select>
      <script type = "text/javascript">
       var lessonsIds = new Array();
       var lessonsNames = new Array();
       var calls = new Array();
      <?php $_from = $this->_tpl_vars['T_COURSE_LESSONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['lesson']):
        $this->_foreach['lessons_list']['iteration']++;
?>        lessonsIds.push('<?php echo $this->_tpl_vars['lesson']['id']; ?>
');
       lessonsNames.push('<?php echo addSlashes($this->_tpl_vars['lesson']['name']); ?>
');
      <?php endforeach; endif; unset($_from); ?>
      <?php $_from = $this->_tpl_vars['T_COURSE_RULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['course_rules_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['course_rules_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['rule']):
        $this->_foreach['course_rules_list']['iteration']++;
?>
       <?php $_from = $this->_tpl_vars['rule']['lesson']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lesson_rules'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lesson_rules']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['lesson_id']):
        $this->_foreach['lesson_rules']['iteration']++;
?>
        <?php if (! $this->_tpl_vars['rule']['condition'][$this->_tpl_vars['index']] || $this->_tpl_vars['rule']['condition'][$this->_tpl_vars['index']] == 'and'): ?><?php $this->assign('condition', 0); ?><?php else: ?><?php $this->assign('condition', 1); ?><?php endif; ?>
        calls.push(new Array(<?php echo $this->_tpl_vars['key']; ?>
, <?php echo $this->_tpl_vars['lesson_id']; ?>
, <?php echo $this->_tpl_vars['condition']; ?>
));
       <?php endforeach; endif; unset($_from); ?>
      <?php endforeach; endif; unset($_from); ?>
      </script>
     </fieldset>
    <?php $this->_smarty_vars['capture']['t_course_rules_code'] = ob_get_contents(); ob_end_clean(); ?>
    <?php echo smarty_function_eF_template_printBlock(array('title' => @_COURSERULES,'data' => $this->_smarty_vars['capture']['t_course_rules_code'],'image' => '32x32/rules.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'options' => $this->_tpl_vars['T_COURSE_OPTIONS'],'help' => 'Course_actions'), $this);?>

<?php elseif ($this->_tpl_vars['T_OP'] == 'course_order'): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=courses&course=') : smarty_modifier_cat($_tmp, '?ctg=courses&course=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['course']) : smarty_modifier_cat($_tmp, $_GET['course'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&op=course_order">') : smarty_modifier_cat($_tmp, '&op=course_order">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ORDERFORCOURSE) : smarty_modifier_cat($_tmp, @_ORDERFORCOURSE)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' &quot;') : smarty_modifier_cat($_tmp, ' &quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_COURSE']->course['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_COURSE']->course['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</a>') : smarty_modifier_cat($_tmp, '&quot;</a>'))); ?>
  <?php ob_start(); ?>
   <fieldset class = "fieldsetSeparator">
    <legend><?php echo @_DRAGITEMSTOCHANGELESSONSORDER; ?>
</legend>
    <ul id = "dhtmlgoodies_lessons_tree" class = "dhtmlgoodies_tree">
    <?php $_from = $this->_tpl_vars['T_COURSE_LESSONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['lesson']):
        $this->_foreach['lessons_list']['iteration']++;
?>
     <li id = "dragtree_<?php echo $this->_tpl_vars['lesson']['id']; ?>
" noChildren = "true">
      <a class = "<?php if (! $this->_tpl_vars['lesson']['active']): ?>deactivatedLinkElement<?php endif; ?>" href = "javascript:void(0)">&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['lesson']['name'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 100) : smarty_modifier_eF_truncate($_tmp, 100)); ?>
</a>
     </li>
    <?php endforeach; endif; unset($_from); ?>
    </ul>
   </fieldset>
   <br/>
  <?php if (! $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] == 'change'): ?>
   <input id = "save_button" class = "flatButton" type="button" onclick="saveQuestionTree(this)" value="<?php echo @_SAVECHANGES; ?>
">
  <?php endif; ?>
  <?php $this->_smarty_vars['capture']['t_course_rules_code'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo smarty_function_eF_template_printBlock(array('title' => @_COURSEORDER,'data' => $this->_smarty_vars['capture']['t_course_rules_code'],'image' => '32x32/order.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'options' => $this->_tpl_vars['T_COURSE_OPTIONS'],'help' => 'Course_actions'), $this);?>

<?php elseif ($this->_tpl_vars['T_OP'] == 'course_scheduling'): ?>
  <script>var noscheduleset = '<?php echo @_NOSCHEDULESET; ?>
';</script>
  <?php ob_start(); ?>
   <div class = "headerTools">
   <?php if (( ! $this->_tpl_vars['T_CURRENT_USER']->coreAccess['calendar'] == 'change' || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['calendar'] == 'change' ) && ( ! $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] == 'change' || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] == 'change' )): ?>
    <span>
     <img src = "images/16x16/add.png" title = "<?php echo @_ADDCALENDAR; ?>
" alt = "<?php echo @_ADDCALENDAR; ?>
"/>
     <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=calendar&add=1&course=<?php echo $_GET['course']; ?>
&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_ADDCALENDAR; ?>
', 2)" target = "POPUP_FRAME"><?php echo @_ADDCALENDAR; ?>
</a>
    </span>
   </div>
   <?php endif; ?>
   <fieldset class = "fieldsetSeparator">
   <legend><?php echo @_COURSESCHEDULE; ?>
</legend>
   <table>
    <tr><td><?php echo @_COURSESCHEDULE; ?>
:&nbsp;</td>
     <td>
      <span id = "schedule_dates_0">
      <?php if ($this->_tpl_vars['T_CURRENT_COURSE']->course['start_date']): ?>
       <?php echo @_FROM; ?>
 #filter:timestamp_time_nosec-<?php echo $this->_tpl_vars['T_CURRENT_COURSE']->course['start_date']; ?>
#
       <?php echo @_TO; ?>
 #filter:timestamp_time_nosec-<?php echo $this->_tpl_vars['T_CURRENT_COURSE']->course['end_date']; ?>
#
       <?php $this->assign('start_date', $this->_tpl_vars['T_CURRENT_COURSE']->course['start_date']); ?>
       <?php $this->assign('end_date', $this->_tpl_vars['T_CURRENT_COURSE']->course['end_date']); ?>
      <?php else: ?>
       <span class = "emptyCategory"><?php echo @_NOSCHEDULESET; ?>
</span>
       <?php $this->assign('start_date', "time()"); ?>
       <?php $this->assign('end_date', "time()"); ?>
      <?php endif; ?>&nbsp;
      </span>
      <table id = "schedule_dates_form_0" style = "display:none">
       <tr><td><?php echo @_FROM; ?>
&nbsp;</td><td><?php echo smarty_function_eF_template_html_select_date(array('prefix' => 'from_','time' => $this->_tpl_vars['start_date'],'start_year' => "-2",'end_year' => "+2",'field_order' => $this->_tpl_vars['T_DATE_FORMATGENERAL']), $this);?>
 <?php echo @_TIME; ?>
: <?php echo smarty_function_html_select_time(array('prefix' => 'from_','time' => $this->_tpl_vars['start_date'],'display_seconds' => false), $this);?>
&nbsp;</td></tr>
       <tr><td><?php echo @_TO; ?>
&nbsp;</td><td><?php echo smarty_function_eF_template_html_select_date(array('prefix' => 'to_','time' => $this->_tpl_vars['end_date'],'start_year' => "-2",'end_year' => "+2",'field_order' => $this->_tpl_vars['T_DATE_FORMATGENERAL']), $this);?>
 <?php echo @_TIME; ?>
: <?php echo smarty_function_html_select_time(array('prefix' => 'to_','time' => $this->_tpl_vars['end_date'],'display_seconds' => false), $this);?>
&nbsp;</td></tr>
      </table>
     </td>
     <td>
    <?php if (! $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] == 'change' || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] == 'change'): ?>
      <span id = "add_schedule_link_0">
       <img src = "images/16x16/<?php if ($this->_tpl_vars['T_CURRENT_COURSE']->course['start_date']): ?>edit.png<?php else: ?>add.png<?php endif; ?>" alt = "<?php echo @_ADDSCHEDULE; ?>
" title = "<?php echo @_ADDSCHEDULE; ?>
" class = "handle" onclick = "showEdit(0)"/>
       <img src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETESCHEDULE; ?>
" title = "<?php echo @_DELETESCHEDULE; ?>
" class = "handle" onclick = "deleteSchedule(this, 0)" <?php if (! $this->_tpl_vars['T_CURRENT_COURSE']->course['start_date']): ?>style = "display:none"<?php endif; ?>/>
      </span>&nbsp;
      <img src = "images/16x16/success.png" alt = "<?php echo @_SAVE; ?>
" title = "<?php echo @_SAVE; ?>
" class = "ajaxHandle" id = "set_schedules_link_0" style = "display:none" onclick = "setSchedule(this, 0)"/>&nbsp;
      <img src = "images/16x16/error_delete.png" alt = "<?php echo @_CANCEL; ?>
" title = "<?php echo @_CANCEL; ?>
" class = "ajaxHandle" id = "remove_schedule_link_0" style = "display:none" onclick = "hideEdit(0)" />
    <?php endif; ?>
     </td></tr>
   </table>
   </fieldset>
   <fieldset class = "fieldsetSeparator">
   <legend><?php echo @_LESSONSCHEDULE; ?>
</legend>
   <table>
   <?php $_from = $this->_tpl_vars['T_COURSE_LESSONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['lesson']):
        $this->_foreach['lessons_list']['iteration']++;
?>
    <tr <?php if (! $this->_tpl_vars['lesson']['active']): ?>class = "deactivatedTableElement"<?php endif; ?>><td><?php echo $this->_tpl_vars['lesson']['name']; ?>
:&nbsp;</td>
     <td>
      <span id = "schedule_dates_<?php echo $this->_tpl_vars['id']; ?>
">
      <?php if ($this->_tpl_vars['lesson']['start_date']): ?>
       <?php echo @_FROM; ?>
 #filter:timestamp_time_nosec-<?php echo $this->_tpl_vars['lesson']['start_date']; ?>
#
       <?php echo @_TO; ?>
 #filter:timestamp_time_nosec-<?php echo $this->_tpl_vars['lesson']['end_date']; ?>
#
       <?php $this->assign('start_date', $this->_tpl_vars['lesson']['start_date']); ?>
       <?php $this->assign('end_date', $this->_tpl_vars['lesson']['end_date']); ?>
      <?php else: ?>
       <span class = "emptyCategory"><?php echo @_NOSCHEDULESET; ?>
</span>
       <?php $this->assign('start_date', "time()"); ?>
       <?php $this->assign('end_date', "time()"); ?>
      <?php endif; ?>&nbsp;
      </span>
      <table id = "schedule_dates_form_<?php echo $this->_tpl_vars['id']; ?>
" style = "display:none">
       <tr><td><?php echo @_FROM; ?>
&nbsp;</td><td><?php echo smarty_function_eF_template_html_select_date(array('prefix' => 'from_','time' => $this->_tpl_vars['start_date'],'start_year' => "-2",'end_year' => "+2",'field_order' => $this->_tpl_vars['T_DATE_FORMATGENERAL']), $this);?>
 <?php echo @_TIME; ?>
: <?php echo smarty_function_html_select_time(array('prefix' => 'from_','time' => $this->_tpl_vars['start_date'],'display_seconds' => false), $this);?>
&nbsp;</td></tr>
       <tr><td><?php echo @_TO; ?>
&nbsp;</td><td><?php echo smarty_function_eF_template_html_select_date(array('prefix' => 'to_','time' => $this->_tpl_vars['end_date'],'start_year' => "-2",'end_year' => "+2",'field_order' => $this->_tpl_vars['T_DATE_FORMATGENERAL']), $this);?>
 <?php echo @_TIME; ?>
: <?php echo smarty_function_html_select_time(array('prefix' => 'to_','time' => $this->_tpl_vars['end_date'],'display_seconds' => false), $this);?>
&nbsp;</td></tr>
      </table>
     </td>
     <td>
     <?php if (! $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] == 'change' || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] == 'change'): ?>
      <span id = "add_schedule_link_<?php echo $this->_tpl_vars['id']; ?>
">
       <img src = "images/16x16/<?php if ($this->_tpl_vars['lesson']['start_date']): ?>edit.png<?php else: ?>add.png<?php endif; ?>" alt = "<?php echo @_ADDSCHEDULE; ?>
" title = "<?php echo @_ADDSCHEDULE; ?>
" class = "handle" onclick = "showEdit(<?php echo $this->_tpl_vars['id']; ?>
)"/>
       <img src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETESCHEDULE; ?>
" title = "<?php echo @_DELETESCHEDULE; ?>
" class = "handle" onclick = "deleteSchedule(this, <?php echo $this->_tpl_vars['id']; ?>
)" <?php if (! $this->_tpl_vars['lesson']['start_date']): ?>style = "display:none"<?php endif; ?>/>
      </span>&nbsp;
      <img src = "images/16x16/success.png" alt = "<?php echo @_SAVE; ?>
" title = "<?php echo @_SAVE; ?>
" class = "ajaxHandle" id = "set_schedules_link_<?php echo $this->_tpl_vars['id']; ?>
" style = "display:none" onclick = "setSchedule(this, <?php echo $this->_tpl_vars['id']; ?>
)"/>&nbsp;
      <img src = "images/16x16/error_delete.png" alt = "<?php echo @_CANCEL; ?>
" title = "<?php echo @_CANCEL; ?>
" class = "ajaxHandle" id = "remove_schedule_link_<?php echo $this->_tpl_vars['id']; ?>
" style = "display:none" onclick = "hideEdit(<?php echo $this->_tpl_vars['id']; ?>
)" />
     <?php endif; ?>
     </td></tr>
   <?php endforeach; endif; unset($_from); ?>
   </table>
   </fieldset>
  <?php $this->_smarty_vars['capture']['t_course_scheduling_code'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo smarty_function_eF_template_printBlock(array('title' => @_COURSESCHEDULE,'data' => $this->_smarty_vars['capture']['t_course_scheduling_code'],'image' => '32x32/calendar.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'options' => $this->_tpl_vars['T_COURSE_OPTIONS'],'help' => 'Course_actions'), $this);?>

<?php elseif ($this->_tpl_vars['T_OP'] == 'export_course'): ?>
 <?php ob_start(); ?>
  <fieldset class = "fieldsetSeparator">
  <legend><?php echo @_EXPORTCOURSE; ?>
</legend>
  <?php echo $this->_tpl_vars['T_EXPORT_COURSE_FORM']['javascript']; ?>

  <form <?php echo $this->_tpl_vars['T_EXPORT_COURSE_FORM']['attributes']; ?>
>
   <?php echo $this->_tpl_vars['T_EXPORT_COURSE_FORM']['hidden']; ?>

   <table class = "formElements" style = "margin-left:0px"> <?php if ($this->_tpl_vars['T_NEW_EXPORTED_FILE']): ?>
    <tr><td colspan = "2"><?php echo @_DOWNLOADEXPORTEDCOURSE; ?>
:&nbsp; <a href = "view_file.php?file=<?php echo $this->_tpl_vars['T_NEW_EXPORTED_FILE']['id']; ?>
&action=download"><?php echo $this->_tpl_vars['T_NEW_EXPORTED_FILE']['name']; ?>
</a> (<?php echo $this->_tpl_vars['T_NEW_EXPORTED_FILE']['size']; ?>
 <?php echo @KB; ?>
, #filter:timestamp-<?php echo $this->_tpl_vars['T_NEW_EXPORTED_FILE']['timestamp']; ?>
#)</td></tr>
  <?php elseif ($this->_tpl_vars['T_EXPORTED_FILE']): ?>
    <tr><td colspan = "2"><?php echo @_EXISTINGFILE; ?>
:&nbsp;<a href = "view_file.php?file=<?php echo $this->_tpl_vars['T_EXPORTED_FILE']['id']; ?>
&action=download"><?php echo $this->_tpl_vars['T_EXPORTED_FILE']['name']; ?>
</a> (<?php echo $this->_tpl_vars['T_EXPORTED_FILE']['size']; ?>
 <?php echo @KB; ?>
, #filter:timestamp-<?php echo $this->_tpl_vars['T_EXPORTED_FILE']['timestamp']; ?>
#)</td></tr>
  <?php endif; ?>
    <tr><td class = "labelCell"><?php echo @_CLICKTOEXPORTCOURSE; ?>
:&nbsp;</td>
     <td class = "elementCell"><?php echo $this->_tpl_vars['T_EXPORT_COURSE_FORM']['submit_export_course']['html']; ?>
</td></tr>
   </table>
  </form>
  </fieldset>
 <?php $this->_smarty_vars['capture']['t_export_course_code'] = ob_get_contents(); ob_end_clean(); ?>
 <?php echo smarty_function_eF_template_printBlock(array('title' => (@_EXPORTCOURSE)."<span class = 'innerTableName'>&nbsp;&quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_export_course_code'],'image' => '32x32/export.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'options' => $this->_tpl_vars['T_COURSE_OPTIONS'],'help' => 'Course_actions'), $this);?>

<?php elseif ($this->_tpl_vars['T_OP'] == 'import_course'): ?>
  <?php ob_start(); ?>
   <fieldset class = "fieldsetSeparator">
   <legend><?php echo @_IMPORTCOURSE; ?>
</legend>
   <?php echo $this->_tpl_vars['T_IMPORT_COURSE_FORM']['javascript']; ?>

   <form <?php echo $this->_tpl_vars['T_IMPORT_COURSE_FORM']['attributes']; ?>
>
    <?php echo $this->_tpl_vars['T_IMPORT_COURSE_FORM']['hidden']; ?>

    <table class = "formElements">
     <tr><td colspan = "2"><?php echo @_COURSEIMPORTNOTICE; ?>
</td></tr>
     <tr><td class = "labelCell"><?php echo @_COURSEDATAFILE; ?>
:&nbsp;</td>
      <td><?php echo $this->_tpl_vars['T_IMPORT_COURSE_FORM']['file_upload']['html']; ?>
</td></tr>
     <tr><td></td><td class = "infoCell"><?php echo @_EACHFILESIZEMUSTBESMALLERTHAN; ?>
 <b><?php echo $this->_tpl_vars['T_MAX_FILESIZE']; ?>
</b> <?php echo @_KB; ?>
</td></tr>
     <tr><td colspan = "100%">&nbsp;</td></tr>
     <tr><td></td><td><?php echo $this->_tpl_vars['T_IMPORT_COURSE_FORM']['submit_import_course']['html']; ?>
</td></tr>
    </table>
   </form>
   </fieldset>
  <?php $this->_smarty_vars['capture']['t_import_course_code'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo smarty_function_eF_template_printBlock(array('title' => @_IMPORTCOURSE,'data' => $this->_smarty_vars['capture']['t_import_course_code'],'image' => '32x32/import.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'options' => $this->_tpl_vars['T_COURSE_OPTIONS'],'help' => 'Course_actions'), $this);?>

<?php elseif ($this->_tpl_vars['T_MODULE_TABPAGE']): ?>
        <?php ob_start(); ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['T_MODULE_TABPAGE']['file'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php $this->_smarty_vars['capture']['module_tab_page'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['T_MODULE_TABPAGE']['title'],'data' => $this->_smarty_vars['capture']['module_tab_page'],'image' => $this->_tpl_vars['T_MODULE_TABPAGE']['image'],'main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'options' => $this->_tpl_vars['T_COURSE_OPTIONS1']), $this);?>

<?php endif; ?>