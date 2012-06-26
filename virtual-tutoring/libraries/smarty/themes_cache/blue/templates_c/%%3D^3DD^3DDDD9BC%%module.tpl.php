<?php /* Smarty version 2.6.26, created on 2012-05-16 00:44:41
         compiled from /home/content/87/9232987/html/virtual-tutoring/www/modules/module_administrator_tools/module.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_administrator_tools/module.tpl', 23, false),array('function', 'eF_template_printForm', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_administrator_tools/module.tpl', 27, false),array('function', 'cycle', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_administrator_tools/module.tpl', 57, false),array('modifier', 'cat', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_administrator_tools/module.tpl', 307, false),)), $this); ?>

<?php if ($_GET['do'] == 'learning'): ?>
 <?php ob_start(); ?>
  <fieldset class = "fieldsetSeparator">
   <legend><?php echo @_MODULE_ADMINISTRATOR_TOOLS_BLOCKSORDER; ?>
</legend>


       <table class = "statisticsTools statisticsSelectList">
                <tr><td class = "labelCell"><?php echo @_MODULE_ADMINISTRATOR_TOOLS_COPYBLOCKSORDERFROMLESSON; ?>
:</td>
                    <td class = "elementCell" colspan = "4">
                        <input type = "text" id = "autocomplete_blockorder" class = "autoCompleteTextBox"/>
                        <img id = "busy" src = "images/16x16/clock.png" style="display:none;" alt = "<?php echo @_LOADING; ?>
" title = "<?php echo @_LOADING; ?>
"/>
                        <div id = "module_administrator_tools_autocomplete_lessons_blockorder" class = "autocomplete"></div>&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr><td></td>
                 <td class = "infoCell" colspan = "4"><?php echo @_STARTTYPINGFORRELEVENTMATCHES; ?>
</td></tr>
         </table>



  </fieldset>
  <?php echo smarty_function_eF_template_printBlock(array('title' => @_MODULE_ADMINISTRATOR_TOOLS_GLOBALLESSONSETTINGS,'columns' => 4,'links' => $this->_tpl_vars['T_LESSON_SETTINGS'],'image' => '32x32/lessons.png','groups' => $this->_tpl_vars['T_LESSON_SETTINGS_GROUPS']), $this);?>

 <?php $this->_smarty_vars['capture']['t_global_settings_code'] = ob_get_contents(); ob_end_clean(); ?>

 <?php ob_start(); ?>
  <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_SYNC_COURSE_LESSONS_FORM']), $this);?>

 <?php $this->_smarty_vars['capture']['t_sync_course_lessons_code'] = ob_get_contents(); ob_end_clean(); ?>

 <?php ob_start(); ?>
            <table class = "statisticsTools statisticsSelectList" style = "margin-bottom:50px">
                <tr><td class = "labelCell"><?php echo @_CHOOSELESSON; ?>
:</td>
                    <td class = "elementCell" colspan = "4">
                        <input type = "text" id = "autocomplete" class = "autoCompleteTextBox" value = "<?php echo $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name']; ?>
"/>
                        <img id = "busy" src = "images/16x16/clock.png" style="display:none;" alt = "<?php echo @_LOADING; ?>
" title = "<?php echo @_LOADING; ?>
"/>
                        <div id = "module_administrator_tools_autocomplete_lessons_div" class = "autocomplete"></div>&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr><td></td>
                 <td class = "infoCell" colspan = "4"><?php echo @_STARTTYPINGFORRELEVENTMATCHES; ?>
</td></tr>
         </table>
 <?php if ($_GET['lessons_ID']): ?>

<!--ajax:usersTable-->

     <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "0" id = "usersTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $this->_tpl_vars['T_MODULE_ADMINISTRATOR_TOOLS_BASEURL']; ?>
&lessons_ID=<?php echo $_GET['lessons_ID']; ?>
&do=learning&">
      <tr class = "topTitle">
       <td class = "topTitle" name = "login"><?php echo @_LOGIN; ?>
</td>
       <td class = "topTitle" name = "name"><?php echo @_FIRSTNAME; ?>
</td>
       <td class = "topTitle" name = "surname"><?php echo @_LASTNAME; ?>
</td>
       <td class = "topTitle" name = "user_type"><?php echo @_USERTYPE; ?>
</td>
       <td class = "topTitle" name = "role"><?php echo @_USERROLEINLESSON; ?>
</td>
       <td class = "topTitle centerAlign noSort"><?php echo @_OPERATIONS; ?>
</td>
       <td class = "topTitle centerAlign" name = "has_lesson"><?php echo @_STATUS; ?>
</td>
      </tr>
 <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users_to_lessons_list']['iteration']++;
?>
      <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['user']['active']): ?>deactivatedTableElement<?php endif; ?>">
       <td>#filter:login-<?php echo $this->_tpl_vars['user']['login']; ?>
#</td>
       <td><?php echo $this->_tpl_vars['user']['name']; ?>
</td>
       <td><?php echo $this->_tpl_vars['user']['surname']; ?>
</td>
       <td><?php echo $this->_tpl_vars['T_ROLES'][$this->_tpl_vars['user']['basic_user_type']]; ?>
</td>
       <td>
  <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] == 'change'): ?>
        <select name="type_<?php echo $this->_tpl_vars['user']['login']; ?>
" id = "type_<?php echo $this->_tpl_vars['user']['login']; ?>
" onchange = "$('checked_<?php echo $this->_tpl_vars['user']['login']; ?>
').checked=true;ajaxPost('<?php echo $this->_tpl_vars['user']['login']; ?>
', this);">
   <?php $_from = $this->_tpl_vars['T_ROLES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['roles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['roles_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['role_key'] => $this->_tpl_vars['role_item']):
        $this->_foreach['roles_list']['iteration']++;
?>
         <option value="<?php echo $this->_tpl_vars['role_key']; ?>
" <?php if (! $this->_tpl_vars['user']['role']): ?><?php if ($this->_tpl_vars['user']['user_types_ID'] && $this->_tpl_vars['user']['user_types_ID'] == $this->_tpl_vars['role_key']): ?>selected<?php elseif (! $this->_tpl_vars['user']['user_types_ID'] && $this->_tpl_vars['user']['user_type'] == $this->_tpl_vars['role_key']): ?>selected<?php endif; ?><?php elseif (( $this->_tpl_vars['user']['role'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?> <?php if ($this->_tpl_vars['user']['user_types_ID'] == $this->_tpl_vars['role_key'] || $this->_tpl_vars['user']['user_type'] == $this->_tpl_vars['role_key']): ?>style = "font-weight:bold"<?php endif; ?>><?php echo $this->_tpl_vars['role_item']; ?>
</option>
   <?php endforeach; endif; unset($_from); ?>
        </select>
  <?php else: ?>
        <?php echo $this->_tpl_vars['T_ROLES'][$this->_tpl_vars['user']['role']]; ?>

  <?php endif; ?>
       </td>
       <td class = "centerAlign">
       <?php if ($this->_tpl_vars['user']['basic_user_type'] == 'student'): ?>
         <img class = "ajaxHandle" src="images/16x16/refresh.png" title="<?php echo @_RESETPROGRESSDATA; ?>
" alt="<?php echo @_RESETPROGRESSDATA; ?>
" onclick = "resetProgress(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
');">
       <?php endif; ?>
       </td>
       <td class = "centerAlign">
  <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] == 'change'): ?>
        <input class = "inputCheckbox" type = "checkbox" name = "checked_<?php echo $this->_tpl_vars['user']['login']; ?>
" id = "checked_<?php echo $this->_tpl_vars['user']['login']; ?>
" onclick = "ajaxPost('<?php echo $this->_tpl_vars['user']['login']; ?>
', this);" <?php if ($this->_tpl_vars['user']['has_lesson']): ?>checked = "checked"<?php endif; ?> />
  <?php else: ?>
         <?php if ($this->_tpl_vars['user']['has_lesson']): ?><img src = "images/16x16/success.png" title = "<?php echo @_LESSONUSER; ?>
" alt = "<?php echo @_LESSONUSER; ?>
" ><?php endif; ?>
  <?php endif; ?>
       </td>
     </tr>
 <?php endforeach; else: ?>
     <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
 <?php endif; unset($_from); ?>
    </table>

<!--/ajax:usersTable-->

 <?php endif; ?>
 <?php $this->_smarty_vars['capture']['t_set_course_users_code'] = ob_get_contents(); ob_end_clean(); ?>


<?php elseif ($_GET['do'] == 'system'): ?>
 <?php ob_start(); ?>
 <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_SQL_FORM']), $this);?>

 <div id = "sql_output_area" style = "width:100%;border:1px dotted black;height:400px">
 <?php if (isset ( $this->_tpl_vars['T_SQL_RESULT'] )): ?>
 <table>
 <?php $_from = $this->_tpl_vars['T_SQL_RESULT']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sql_results_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sql_results_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['row']):
        $this->_foreach['sql_results_loop']['iteration']++;
?>
  <?php if (($this->_foreach['sql_results_loop']['iteration'] <= 1)): ?>
  <tr class = "topTitle" style = "border-top:0px">
  <?php else: ?>
  <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
">
  <?php endif; ?>
   <?php $_from = $this->_tpl_vars['row']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['foo'] => $this->_tpl_vars['column']):
        $this->_foreach['row_loop']['iteration']++;
?>
    <td style = "padding:0px 3px 0px 3px"><?php echo $this->_tpl_vars['column']; ?>
</td>
   <?php endforeach; endif; unset($_from); ?>
  </tr>
  <?php if (($this->_foreach['sql_results_loop']['iteration'] == $this->_foreach['sql_results_loop']['total'])): ?>
  <tr><td colspan = "100%"><?php echo $this->_foreach['sql_results_loop']['total']; ?>
 <?php echo @_MODULE_ADMINISTRATOR_TOOLS_ROWSINSET; ?>
</td></tr>
  <?php endif; ?>
 <?php endforeach; else: ?>
   <?php if (isset ( $this->_tpl_vars['T_SQL_AFFECTED_ROWS'] )): ?>
    <?php echo @_MODULE_ADMINISTRATOR_TOOLS_QUERYOK; ?>
, <?php echo $this->_tpl_vars['T_SQL_AFFECTED_ROWS']; ?>
 <?php echo @_MODULE_ADMINISTRATOR_TOOLS_ROWSAFFECTED; ?>

   <?php else: ?>
    <?php echo @_MODULE_ADMINISTRATOR_TOOLS_EMPTYSET; ?>

   <?php endif; ?>
 <?php endif; unset($_from); ?>
 </table>
 <?php endif; ?>
 </div>
 <?php $this->_smarty_vars['capture']['t_sql_code'] = ob_get_contents(); ob_end_clean(); ?>



 <?php ob_start(); ?>
  <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_FILE_ENCODINGS_FORM']), $this);?>

 <?php $this->_smarty_vars['capture']['t_change_files_encoding_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php elseif ($_GET['do'] == 'enterprise'): ?>
 <?php ob_start(); ?>
 <table class = "formElements">
  <tr><td class = "labelCell"><?php echo @_MODULE_ADMINISTRATOR_TOOLS_ENTITYTYPE; ?>
:&nbsp;</td>
   <td class = "elementCell">
    <select onchange = "window.location='<?php echo $this->_tpl_vars['T_MODULE_ADMINISTRATOR_TOOLS_BASEURL']; ?>
&do=enterprise&tab=unenroll_courses&type='+this.options[this.options.selectedIndex].value">
     <option value = "0"><?php echo @_MODULE_ADMINISTRATOR_TOOLS_SELECTASSIGNMENTTYPE; ?>
</option>
     <option value = "group" <?php if ($_GET['type'] == 'group'): ?>selected<?php endif; ?>><?php echo @_GROUP; ?>
</option>
     <option value = "branch" <?php if ($_GET['type'] == 'branch'): ?>selected<?php endif; ?>><?php echo @_BRANCH; ?>
</option>
     <option value = "job" <?php if ($_GET['type'] == 'job'): ?>selected<?php endif; ?>><?php echo @_JOBDESCRIPTIONS; ?>
</option>
    </select>
   </td></tr>
  <?php if ($this->_tpl_vars['T_ENTITIES_LIST']): ?>
  <tr><td class = "labelCell"><?php echo @_MODULE_ADMINISTRATOR_TOOLS_ENTITYENTRY; ?>
:&nbsp;</td>
   <td class = "elementCell">
    <select onchange = "window.location='<?php echo $this->_tpl_vars['T_MODULE_ADMINISTRATOR_TOOLS_BASEURL']; ?>
&do=enterprise&tab=unenroll_courses&type=<?php echo $_GET['type']; ?>
&entry='+this.options[this.options.selectedIndex].value">
     <option value = "0"><?php echo @_MODULE_ADMINISTRATOR_TOOLS_SELECTANENTRY; ?>
</option>
    <?php $_from = $this->_tpl_vars['T_ENTITIES_LIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['jobs_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['jobs_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['jobs_list']['iteration']++;
?>
     <option value = "<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($_GET['entry'] == $this->_tpl_vars['key']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>
    </select>
   </td></tr>
   <?php if ($_GET['entry']): ?>
   <tr><td></td>
    <td class = "submitCell"><input type = "submit" class = "flatButton" onclick = "if (confirm('<?php echo @_MODULE_ADMINISTRATOR_TOOLS_AREYOUSUREYOUWANTTOREMOVEENTITYUSERSFROMENTITYCOURSES; ?>
')) removeUsersFromEntity(this)" value = "<?php echo @_MODULE_ADMINISTRATOR_TOOLS_REMOVECOURSESFROMUSERS; ?>
"/>
    </td></tr>
   <?php endif; ?>
  <?php endif; ?>
 </table>
 <?php $this->_smarty_vars['capture']['t_unenroll_courses_code'] = ob_get_contents(); ob_end_clean(); ?>

 <?php ob_start(); ?>
  <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_CATEGORY_FORM']), $this);?>

  <?php if ($this->_tpl_vars['T_SHOW_TABLE']): ?>
   <?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'categoryUsersTable'): ?>
<!--ajax:categoryUsersTable-->
  <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "0" order="desc" id = "categoryUsersTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $this->_tpl_vars['T_MODULE_ADMINISTRATOR_TOOLS_BASEURL']; ?>
&do=enterprise&">
   <tr><td class="topTitle" name = "course"><?php echo @_COURSE; ?>
</td>
    <td class="topTitle" name = "category"><?php echo @_CATEGORY; ?>
</td>
    <td class="topTitle" name = "login"><?php echo @_USER; ?>
</td>
        <td class="topTitle centerAlign" name = "to_timestamp"><?php echo @_COMPLETED; ?>
</td>
    <td class="topTitle centerAlign" name = "score"><?php echo @_SCORE; ?>
</td>
    <td class="topTitle" name = "supervisor"><?php echo @_SUPERVISOR; ?>
</td>
    <td class="topTitle" name = "branch"><?php echo @_BRANCH; ?>
</td>
    <td class="topTitle centerAlign" name = "historic"><?php echo @_MODULE_ADMINISTRATOR_TOOLS_HISTORICENTRY; ?>
</td>
    </tr>
   <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['course_users_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['course_users_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['course_users_list']['iteration']++;
?>
   <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['item']['active']): ?>deactivatedTableElement<?php endif; ?>">
    <td ><a style = "<?php if (! $this->_tpl_vars['item']['course_active']): ?>color:red<?php endif; ?>" class = "editLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=courses&edit_course=<?php echo $this->_tpl_vars['item']['course_id']; ?>
"><?php echo $this->_tpl_vars['item']['course']; ?>
</a></td>
    <td><a class = "editLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=directions&edit_direction=<?php echo $this->_tpl_vars['item']['directions_ID']; ?>
"><?php echo $this->_tpl_vars['item']['category']; ?>
</a></td>
    <td><a class = "editLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $this->_tpl_vars['item']['login']; ?>
&op=profile">#filter:login-<?php echo $this->_tpl_vars['item']['login']; ?>
#</a></td>
        <td class = "centerAlign">#filter:timestamp-<?php echo $this->_tpl_vars['item']['to_timestamp']; ?>
#</td>
    <td class = "centerAlign"><?php if (! $this->_tpl_vars['item']['historic']): ?>#filter:score-<?php echo $this->_tpl_vars['item']['score']; ?>
#%<?php endif; ?></td>
    <td><a class = "editLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $this->_tpl_vars['item']['supervisor']; ?>
&op=profile">#filter:login-<?php echo $this->_tpl_vars['item']['supervisor']; ?>
#</a></td>
    <td><a class = "editLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=module_hcd&op=branches&edit_branch=<?php echo $this->_tpl_vars['item']['branch_ID']; ?>
"><?php echo $this->_tpl_vars['item']['branch']; ?>
</a></td>
    <td class = "centerAlign"><?php if ($this->_tpl_vars['item']['historic']): ?><?php echo @_YES; ?>
<?php else: ?><?php echo @_NO; ?>
<?php endif; ?></td>
   </tr>
   <?php endforeach; else: ?>
   <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
   <?php endif; unset($_from); ?>
  </table>
<!--/ajax:categoryUsersTable-->
   <?php endif; ?>
  <div class = ""><span><?php echo @_OPERATIONS; ?>
:</span>
   <img class = "ajaxHandle" src = "images/file_types/xls.png" alt = "<?php echo @_EXPORTTOXLS; ?>
" title = "<?php echo @_EXPORTTOXLS; ?>
" onclick = "exportUsersToXls(this);"/>
  </div>
  <?php endif; ?>
 <?php $this->_smarty_vars['capture']['t_category_reports_code'] = ob_get_contents(); ob_end_clean(); ?>

 <?php ob_start(); ?>
  <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_JOB_COURSES_FORM']), $this);?>

 <?php $this->_smarty_vars['capture']['t_job_courses_code'] = ob_get_contents(); ob_end_clean(); ?>

 <?php ob_start(); ?>
   <?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'multiplePlacementsTable'): ?>
<!--ajax:multiplePlacementsTable-->
  <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "1" order="asc" id = "multiplePlacementsTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $this->_tpl_vars['T_MODULE_ADMINISTRATOR_TOOLS_BASEURL']; ?>
&do=enterprise&">
   <tr><td class="topTitle" name = "users_login"><?php echo @_USER; ?>
</td>
    <td class="topTitle centerAlign" name = "placements"><?php echo @_PLACEMENTS; ?>
</td>
    </tr>
   <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['users_list']['iteration']++;
?>
   <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['item']['active']): ?>deactivatedTableElement<?php endif; ?>">
    <td><a class = "editLink <?php if (! $this->_tpl_vars['T_CONFIGURATION']['disable_tooltip']): ?>info<?php endif; ?>" url = "ask_information.php?users_LOGIN=<?php echo $this->_tpl_vars['item']['users_login']; ?>
&type=user" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $this->_tpl_vars['item']['users_login']; ?>
&op=placements">#filter:login-<?php echo $this->_tpl_vars['item']['users_login']; ?>
#</a></td>
    <td class = "centerAlign"><?php echo $this->_tpl_vars['item']['placements']; ?>
</td>
   </tr>
   <?php endforeach; else: ?>
   <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
   <?php endif; unset($_from); ?>
  </table>
<!--/ajax:multiplePlacementsTable-->
   <?php endif; ?>
 <?php $this->_smarty_vars['capture']['t_multiple_placements_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php else: ?>

 <?php ob_start(); ?>
  <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_CHANGE_USER_TYPE_FORM']), $this);?>

 <?php $this->_smarty_vars['capture']['t_change_user_type_code'] = ob_get_contents(); ob_end_clean(); ?>



 <?php ob_start(); ?>
  <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_IDLE_USER_FORM']), $this);?>

<!--ajax:idleUsersTable-->
      <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "0" id = "idleUsersTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $this->_tpl_vars['T_MODULE_ADMINISTRATOR_TOOLS_BASEURL']; ?>
&">
       <tr class = "topTitle">
        <td class = "topTitle" name = "login"><?php echo @_USER; ?>
</td>
        <td class = "topTitle" name = "last_action"><?php echo @_MODULE_ADMINISTRATOR_TOOLS_LASTACTION; ?>
</td>
        <td class = "topTitle centerAlign" name = "active"><?php echo @_STATUS; ?>
</td>
        <td class = "topTitle centerAlign noSort"><?php echo @_OPERATIONS; ?>
</td>
       </tr>
  <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users_to_lessons_list']['iteration']++;
?>
       <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['user']['active']): ?>deactivatedTableElement<?php endif; ?>">
        <td><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $this->_tpl_vars['item']['login']; ?>
&op=profile" class = "editLink">#filter:login-<?php echo $this->_tpl_vars['user']['login']; ?>
#</a></td>
        <td><?php if ($this->_tpl_vars['user']['last_action']): ?>#filter:timestamp_time-<?php echo $this->_tpl_vars['user']['last_action']; ?>
#<?php else: ?><?php echo @_NEVER; ?>
<?php endif; ?></td>
        <td class = "centerAlign">
         <img class = "ajaxHandle" src="images/16x16/trafficlight_<?php if ($this->_tpl_vars['user']['active']): ?>green<?php else: ?>red<?php endif; ?>.png" title="<?php echo @_MODULE_ADMINISTRATOR_TOOLS_TOGGLESTATUS; ?>
" alt="<?php echo @_MODULE_ADMINISTRATOR_TOOLS_TOGGLESTATUS; ?>
" onclick = "toggleUser(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
');">
        </td>
        <td class = "centerAlign">
        <?php if ($this->_tpl_vars['user']['login'] != $_SESSION['s_login']): ?>
         <img class = "ajaxHandle" src="images/16x16/error_delete.png" title="<?php echo @_ARCHIVE; ?>
" alt="<?php echo @_ARCHIVE; ?>
" onclick = "archiveUser(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
');">
        <?php endif; ?>
        </td>
      </tr>
  <?php endforeach; else: ?>
      <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
  <?php endif; unset($_from); ?>
     </table>
<!--/ajax:idleUsersTable-->
     <div class = ""><span><?php echo @_OPERATIONS; ?>
:</span>
      <img class = "ajaxHandle" src = "images/16x16/trafficlight_red.png" alt = "<?php echo @_MODULE_ADMINISTRATOR_TOOLS_DEACTIVATEALLUSERS; ?>
" title = "<?php echo @_MODULE_ADMINISTRATOR_TOOLS_DEACTIVATEALLUSERS; ?>
" onclick = "if (confirm('<?php echo @_MODULE_ADMINISTRATOR_TOOLS_THISWILLDEACTIVATEALLUSERSAREYOUSURE; ?>
')) deactivateAllIdleUsers(this)"/>
      <img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_MODULE_ADMINISTRATOR_TOOLS_ARCHIVEALLUSERS; ?>
" title = "<?php echo @_MODULE_ADMINISTRATOR_TOOLS_ARCHIVEALLUSERS; ?>
" onclick = "if (confirm('<?php echo @_MODULE_ADMINISTRATOR_TOOLS_THISWILLARCHIVEALLUSERSAREYOUSURE; ?>
')) archiveAllIdleUsers(this)"/>
     </div>
 <?php $this->_smarty_vars['capture']['t_idle_users_code'] = ob_get_contents(); ob_end_clean(); ?>

 <?php ob_start(); ?>
   <form name = "impersonate_user_form" action = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=module&op=module_administrator_tools&tab=impersonate" method = "post">
       <table class = "statisticsTools statisticsSelectList">
                 <tr><td class = "labelCell"><?php echo @_MODULE_ADMINISTRATOR_TOOLS_IMPERSONATE; ?>
:</td>
                     <td class = "elementCell" colspan = "4">
                         <input type = "text" id = "autocomplete_impersonate" class = "autoCompleteTextBox"/>
                         <input type = "hidden" id = "autocomplete_impersonate_user" name = "autocomplete_impersonate_user"/>
                         <img id = "busy" src = "images/16x16/clock.png" style="display:none;" alt = "<?php echo @_LOADING; ?>
" title = "<?php echo @_LOADING; ?>
"/>
                         <div id = "module_administrator_tools_autocomplete_impersonate" class = "autocomplete"></div>&nbsp;&nbsp;&nbsp;
                     </td>
                 </tr>
                 <tr><td></td>
                 <td class = "infoCell" colspan = "4"><?php echo @_STARTTYPINGFORRELEVENTMATCHES; ?>
</td></tr>
                 <tr><td></td>
                  <td class = "submitCell"><input type = "submit" name = "submit_impersonate" class = "flatButton"/></td></tr>
         </table>
   </form>
 <?php $this->_smarty_vars['capture']['t_impersonate_code'] = ob_get_contents(); ob_end_clean(); ?>


 <?php ob_start(); ?>
  <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_TOOLS_FORM']), $this);?>

  <div id = "module_administrator_tools_autocomplete_users_div" class = "autocomplete"></div>
  <fieldset class = "fieldsetSeparator">
   <legend><?php echo @_MODULE_ADMINISTRATOR_TOOLS_OTHEROPTIONS; ?>
</legend>
   <input type = "submit" onclick = "fixCase(this)" value = "<?php echo @_MODULE_ADMINISTRATOR_TOOLS_SYNCHRONIZECASE; ?>
" class = "flatButton">
  </fieldset>
 <?php $this->_smarty_vars['capture']['t_change_login_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php endif; ?>



<?php ob_start(); ?>
 <div class = "tabber">
 <?php if ($_GET['do'] == 'learning'): ?>
  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'global_settings','title' => @_MODULE_ADMINISTRATOR_TOOLS_GLOBALLESSONSETTINGS,'data' => $this->_smarty_vars['capture']['t_global_settings_code'],'absoluteImagePath' => 1,'image' => ((is_array($_tmp=$this->_tpl_vars['T_MODULE_ADMINISTRATOR_TOOLS_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'images/tools.png') : smarty_modifier_cat($_tmp, 'images/tools.png'))), $this);?>

  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'set_course_lesson_users','title' => @_MODULE_ADMINISTRATOR_TOOLS_SETCOURSELESSONUSERSCODE,'data' => $this->_smarty_vars['capture']['t_set_course_users_code'],'image' => '32x32/users.png'), $this);?>

  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'sync_course_lessons','title' => @_MODULE_ADMINISTRATOR_TOOLS_SYNCHRONIZECOURSELESSONS,'data' => $this->_smarty_vars['capture']['t_sync_course_lessons_code'],'image' => '32x32/courses.png'), $this);?>

 <?php elseif ($_GET['do'] == 'system'): ?>
  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'sql','title' => @_MODULE_ADMINISTRATOR_TOOLS_SQLINTERFACE,'data' => $this->_smarty_vars['capture']['t_sql_code'],'image' => '32x32/generic.png'), $this);?>

  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'files_encoding','title' => @_MODULE_ADMINISTRATOR_TOOLS_CHANGEFILESENCODING,'data' => $this->_smarty_vars['capture']['t_change_files_encoding_code'],'image' => '32x32/folders.png'), $this);?>

 <?php elseif ($_GET['do'] == 'enterprise'): ?>






 <?php else: ?>
  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'change_login','title' => @_MODULE_ADMINISTRATOR_TOOLS_CHANGELOGIN,'data' => $this->_smarty_vars['capture']['t_change_login_code'],'absoluteImagePath' => 1,'image' => ((is_array($_tmp=$this->_tpl_vars['T_MODULE_ADMINISTRATOR_TOOLS_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'images/tools.png') : smarty_modifier_cat($_tmp, 'images/tools.png'))), $this);?>

  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'impersonate','title' => @_MODULE_ADMINISTRATOR_TOOLS_IMPERSONATE,'data' => $this->_smarty_vars['capture']['t_impersonate_code'],'absoluteImagePath' => 1,'image' => ((is_array($_tmp=$this->_tpl_vars['T_MODULE_ADMINISTRATOR_TOOLS_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'images/tools.png') : smarty_modifier_cat($_tmp, 'images/tools.png'))), $this);?>

  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'change_user_type','title' => @_MODULE_ADMINISTRATOR_TOOLS_CHANGEUSERTYPES,'data' => $this->_smarty_vars['capture']['t_change_user_type_code'],'image' => '32x32/users.png'), $this);?>






 <?php endif; ?>
 </div>
<?php $this->_smarty_vars['capture']['t_administrator_tools_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo smarty_function_eF_template_printBlock(array('title' => @_MODULE_ADMINISTRATOR_TOOLS,'data' => $this->_smarty_vars['capture']['t_administrator_tools_code'],'absoluteImagePath' => 1,'columns' => 4,'main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'image' => ((is_array($_tmp=$this->_tpl_vars['T_MODULE_ADMINISTRATOR_TOOLS_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'images/tools.png') : smarty_modifier_cat($_tmp, 'images/tools.png')),'help' => 'Administrator_tools'), $this);?>
