<?php /* Smarty version 2.6.26, created on 2012-05-16 07:12:53
         compiled from includes/professor_lessons.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/professor_lessons.tpl', 44, false),array('function', 'cycle', 'includes/professor_lessons.tpl', 62, false),)), $this); ?>
<?php if ($_GET['add_lesson'] || $_GET['edit_lesson']): ?>
 <?php ob_start(); ?>
 <tr><td class = "moduleCell">
  <?php ob_start(); ?>
  <script>var editLesson = '<?php echo $_GET['edit_lesson']; ?>
';</script>
   <?php ob_start(); ?>
   <table width = "100%">
    <tr><td class = "topAlign" width = "50%">
     <?php echo $this->_tpl_vars['T_LESSON_FORM']['javascript']; ?>

     <form <?php echo $this->_tpl_vars['T_LESSON_FORM']['attributes']; ?>
>
     <?php echo $this->_tpl_vars['T_LESSON_FORM']['hidden']; ?>

     <table class = "formElements">
      <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_LESSON_FORM']['name']['label']; ?>
:&nbsp;</td>
       <td><?php echo $this->_tpl_vars['T_LESSON_FORM']['name']['html']; ?>
</td></tr>
      <?php if (isset ( $this->_tpl_vars['T_LESSON_FORM']['languages_NAME']['label'] )): ?>
      <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_LESSON_FORM']['languages_NAME']['label']; ?>
:&nbsp;</td>
       <td><?php echo $this->_tpl_vars['T_LESSON_FORM']['languages_NAME']['html']; ?>
</td></tr>
      <?php endif; ?>
      <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_LESSON_FORM']['directions_ID']['label']; ?>
:&nbsp;</td>
       <td><?php echo $this->_tpl_vars['T_LESSON_FORM']['directions_ID']['html']; ?>
</td></tr>
      <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_LESSON_FORM']['course_only']['1']['label']; ?>
:&nbsp;</td>
       <td><?php echo $this->_tpl_vars['T_LESSON_FORM']['course_only']['1']['html']; ?>
</td></tr>
    <?php if ($this->_tpl_vars['T_CONFIGURATION']['lesson_enroll'] || ( isset ( $_GET['edit_lesson'] ) && ! $this->_tpl_vars['T_EDIT_LESSON']->lesson['course_only'] )): ?>
      <tr><td class = "labelCell"></td>
       <td><?php echo $this->_tpl_vars['T_LESSON_FORM']['course_only']['0']['html']; ?>
</td></tr>
    <?php endif; ?>
      <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_LESSON_FORM']['active']['label']; ?>
:&nbsp;</td>
       <td class = "elementCell"><?php echo $this->_tpl_vars['T_LESSON_FORM']['active']['html']; ?>
</td></tr>
      <tr class = "only_lesson" <?php if (! $this->_tpl_vars['T_EDIT_LESSON'] || $this->_tpl_vars['T_EDIT_LESSON']->lesson['course_only']): ?>style = "display:none"<?php endif; ?>><td class = "labelCell"><?php echo $this->_tpl_vars['T_LESSON_FORM']['show_catalog']['label']; ?>
:&nbsp;</td>
       <td class = "elementCell"><?php echo $this->_tpl_vars['T_LESSON_FORM']['show_catalog']['html']; ?>
</td></tr>
    <?php if ($this->_tpl_vars['T_CONFIGURATION']['disable_payments'] != 1): ?>
      <tr id = "price_row" class = "only_lesson" <?php if (! $this->_tpl_vars['T_EDIT_LESSON'] || $this->_tpl_vars['T_EDIT_LESSON']->lesson['course_only']): ?>style = "display:none"<?php endif; ?>><td class = "labelCell"><?php echo $this->_tpl_vars['T_LESSON_FORM']['price']['label']; ?>
:&nbsp;</td>
       <td><?php echo $this->_tpl_vars['T_LESSON_FORM']['price']['html']; ?>
 <?php echo $this->_tpl_vars['T_CURRENCYSYMBOLS'][$this->_tpl_vars['T_CONFIGURATION']['currency']]; ?>
</td></tr>
    <?php endif; ?>
      <tr><td></td>
       <td class = "submitCell"><?php echo $this->_tpl_vars['T_LESSON_FORM']['submit_lesson']['html']; ?>
</td></tr>
     </table>
     </form>
    </td></tr>
   </table>
   <?php $this->_smarty_vars['capture']['t_edit_lesson_code'] = ob_get_contents(); ob_end_clean(); ?>
  <div class = "tabber">
   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'lessons','title' => (@_EDITLESSON),'data' => $this->_smarty_vars['capture']['t_edit_lesson_code'],'image' => '32x32/lessons.png'), $this);?>

   <?php ob_start(); ?>
   <div class = "headerTools">
    <span>
     <img src = "images/16x16/success.png" title = "<?php echo @_SETALLUSERSSTATUSCOMPLETED; ?>
" alt = "<?php echo @_SETALLUSERSSTATUSCOMPLETED; ?>
"/>
     <a href = "javascript:void(0)" <?php if (! $this->_tpl_vars['T_CURRENT_USER']->coreAccess['lessons'] == 'change' || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['lessons'] == 'change'): ?> onclick = "setAllUsersStatusCompleted(this)" <?php endif; ?>><?php echo @_SETALLUSERSSTATUSCOMPLETED; ?>
</a>
    </span>
   </div>
<!--ajax:usersTable-->
   <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_USERS_SIZE']; ?>
" sortBy = "4" id = "usersTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" <?php if (isset ( $this->_tpl_vars['T_BRANCHES_FILTER'] )): ?>branchFilter="<?php echo $this->_tpl_vars['T_BRANCHES_FILTER']; ?>
"<?php endif; ?> <?php if (isset ( $this->_tpl_vars['T_JOBS_FILTER'] )): ?>jobFilter="<?php echo $this->_tpl_vars['T_JOBS_FILTER']; ?>
"<?php endif; ?> url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=professor_lessons&edit_lesson=<?php echo $_GET['edit_lesson']; ?>
&">
    <tr class = "topTitle">
     <td class = "topTitle" name = "login"><?php echo @_LOGIN; ?>
</td>
     <td class = "topTitle" name = "role"><?php echo @_USERROLEINLESSON; ?>
</td>
     <td class = "topTitle centerAlign" name = "completed"><?php echo @_COMPLETED; ?>
</td>
     <td class = "topTitle noSort centerAlign"><?php echo @_OPERATIONS; ?>
</td>
     <td class = "topTitle centerAlign" name = "partof"><?php echo @_CHECK; ?>
</td>
    </tr>
    <?php $_from = $this->_tpl_vars['T_ALL_USERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users_to_lessons_list']['iteration']++;
?>
    <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['user']['active']): ?>deactivatedTableElement<?php endif; ?>">
     <td>#filter:login-<?php echo $this->_tpl_vars['user']['login']; ?>
#</td>
     <td>
    <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['lessons'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['lessons'] == 'change'): ?>
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
" <?php if (( $this->_tpl_vars['user']['role'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?> <?php if ($this->_tpl_vars['user']['basic_user_type'] == $this->_tpl_vars['role_key']): ?>style = "font-weight:bold"<?php endif; ?>><?php echo $this->_tpl_vars['role_item']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>
      </select>
    <?php else: ?>
      <?php echo $this->_tpl_vars['T_ROLES'][$this->_tpl_vars['user']['role']]; ?>

    <?php endif; ?>
     </td>
     <td class = "centerAlign"><?php if ($this->_tpl_vars['user']['partof']): ?><?php if ($this->_tpl_vars['user']['completed']): ?><img src = "images/16x16/success.png" alt = "<?php echo @_COMPLETEDON; ?>
 #filter:timestamp-<?php echo $this->_tpl_vars['user']['timestamp_completed']; ?>
#" title = "<?php echo @_COMPLETEDON; ?>
 #filter:timestamp-<?php echo $this->_tpl_vars['user']['timestamp_completed']; ?>
#"/><?php else: ?><img src = "images/16x16/forbidden.png" alt = "<?php echo @_NOTCOMPLETED; ?>
" title = "<?php echo @_NOTCOMPLETED; ?>
"/><?php endif; ?><?php endif; ?></td>
     <td class = "centerAlign">
    <?php if ($this->_tpl_vars['user']['basic_user_type'] == 'student' && in_array ( $this->_tpl_vars['user']['login'] , $this->_tpl_vars['T_LESSON_USERS'] )): ?>
       <img class = "ajaxHandle" src="images/16x16/refresh.png" title="<?php echo @_RESETPROGRESSDATA; ?>
" alt="<?php echo @_RESETPROGRESSDATA; ?>
" onclick = "if (confirm(translations['_IRREVERSIBLEACTIONAREYOUSURE'])) resetProgress(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
');">
    <?php endif; ?>
     </td>
     <td class = "centerAlign">
    <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['lessons'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['lessons'] == 'change'): ?>
      <input class = "inputCheckbox" type = "checkbox" name = "checked_<?php echo $this->_tpl_vars['user']['login']; ?>
" id = "checked_<?php echo $this->_tpl_vars['user']['login']; ?>
" onclick = "ajaxPost('<?php echo $this->_tpl_vars['user']['login']; ?>
', this);" <?php if (in_array ( $this->_tpl_vars['user']['login'] , $this->_tpl_vars['T_LESSON_USERS'] )): ?>checked = "checked"<?php endif; ?> /><?php if (in_array ( $this->_tpl_vars['user']['login'] , $this->_tpl_vars['T_LESSON_USERS'] )): ?><span style = "display:none">checked</span><?php endif; ?>     <?php else: ?>
      <?php if (in_array ( $this->_tpl_vars['user']['login'] , $this->_tpl_vars['T_LESSON_USERS'] )): ?><img src = "images/16x16/success.png" alt = "<?php echo @_LESSONUSER; ?>
" title = "<?php echo @_LESSONUSER; ?>
"><span style = "display:none">checked</span><?php endif; ?>
    <?php endif; ?>
     </td>
    </tr>
    <?php endforeach; else: ?>
    <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
    <?php endif; unset($_from); ?>
   </table>
<!--/ajax:usersTable-->
  <?php $this->_smarty_vars['capture']['t_users_to_lessons_code'] = ob_get_contents(); ob_end_clean(); ?>
        <?php if ($_GET['edit_lesson'] && ! $this->_tpl_vars['T_EDIT_LESSON']->lesson['course_only']): ?>
        <div class="tabbertab <?php if ($_GET['tab'] == 'users'): ?>tabbertabdefault<?php endif; ?>">
         <h3><?php echo @_EDITUSERSLESSON; ?>
</h3>
         <?php echo smarty_function_eF_template_printBlock(array('title' => @_UPDATEUSERSTOLESSONS,'data' => $this->_smarty_vars['capture']['t_users_to_lessons_code'],'image' => '32x32/users.png'), $this);?>

        </div>
        <?php endif; ?>
          </div>
       <?php $this->_smarty_vars['capture']['t_lesson_code'] = ob_get_contents(); ob_end_clean(); ?>
   <?php if ($_GET['add_lesson']): ?>
     <?php echo smarty_function_eF_template_printBlock(array('title' => @_NEWLESSONOPTIONS,'data' => $this->_smarty_vars['capture']['t_lesson_code'],'image' => '32x32/lessons.png'), $this);?>

   <?php else: ?>
     <?php echo smarty_function_eF_template_printBlock(array('title' => (@_LESSONOPTIONSFOR)." <span class = 'innerTableName'>&quot;".($this->_tpl_vars['T_LESSON_FORM']['name']['value'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_lesson_code'],'image' => '32x32/lessons.png','options' => $this->_tpl_vars['T_LESSON_OPTIONS']), $this);?>

   <?php endif; ?>
       </td></tr>
 <?php $this->_smarty_vars['capture']['moduleNewLessonDirection'] = ob_get_contents(); ob_end_clean(); ?>
 <?php else: ?>
   <?php ob_start(); ?>
     <?php if ($_GET['lesson_info']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/lesson_information.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php echo $this->_smarty_vars['capture']['moduleLessonInformation']; ?>

     <?php elseif ($_GET['lesson_settings']): ?>
       <tr><td class = "moduleCell">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/lesson_settings.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          </td></tr>
     <?php else: ?>
       <tr><td class = "moduleCell">
       <script>var activate = '<?php echo @_ACTIVATE; ?>
';var deactivate = '<?php echo @_DEACTIVATE; ?>
';var courseonly = '<?php echo @_COURSEONLY; ?>
';var directly = '<?php echo @_DIRECTLY; ?>
';</script>
      <?php ob_start(); ?>
       <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['lessons'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['lessons'] == 'change'): ?>
        <div class = "headerTools">
         <span>
          <img src = "images/16x16/add.png" title = "<?php echo @_NEWLESSON; ?>
" alt = "<?php echo @_NEWLESSON; ?>
">
          <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=professor_lessons&add_lesson=1" title = "<?php echo @_NEWLESSON; ?>
" ><?php echo @_NEWLESSON; ?>
</a>
         </span>
         <span>
          <img src = "images/16x16/import.png" title = "<?php echo @_IMPORTLESSON; ?>
" alt = "<?php echo @_IMPORTLESSON; ?>
">
          <a href = "javascript:void(0)" title = "<?php echo @_IMPORTLESSON; ?>
" onclick = "eF_js_showDivPopup('', 0, 'import_lesson_popup')"><?php echo @_IMPORTLESSON; ?>
</a></a>
         </span>
        </div>
        <div id = "import_lesson_popup" style = "display:none">
         <?php ob_start(); ?>
          <?php echo $this->_tpl_vars['T_IMPORT_LESSON_FORM']['javascript']; ?>

          <form <?php echo $this->_tpl_vars['T_IMPORT_LESSON_FORM']['attributes']; ?>
>
          <?php echo $this->_tpl_vars['T_IMPORT_LESSON_FORM']['hidden']; ?>

          <table class = "formElements">
           <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_IMPORT_LESSON_FORM']['import_content']['label']; ?>
:&nbsp;</td>
            <td class = "elementCell"><?php echo $this->_tpl_vars['T_IMPORT_LESSON_FORM']['import_content']['html']; ?>
</td></tr>
           <tr><td></td>
            <td class = "infoCell"><?php echo @_FILESIZEMUSTBESMALLERTHAN; ?>
 <b><?php echo $this->_tpl_vars['T_MAX_FILE_SIZE']; ?>
</b> <?php echo @_KB; ?>
</td></tr>
           <tr><td></td>
            <td class = "submitCell"><?php echo $this->_tpl_vars['T_IMPORT_LESSON_FORM']['submit_lesson']['html']; ?>
</td></tr>
          </table>
          </form>
         <?php $this->_smarty_vars['capture']['t_import_lesson_code'] = ob_get_contents(); ob_end_clean(); ?>
         <?php echo smarty_function_eF_template_printBlock(array('title' => @_IMPORTLESSON,'data' => $this->_smarty_vars['capture']['t_import_lesson_code'],'image' => '32x32/import.png'), $this);?>

        </div>
        <?php $this->assign('change_lessons', 1); ?>
       <?php endif; ?>
<!--ajax:lessonsTable-->
        <table style = "width:100%" class = "sortedTable" activeFilter = 1 size = "<?php echo $this->_tpl_vars['T_LESSONS_SIZE']; ?>
" sortBy = "0" useAjax = "1" id = "lessonsTable" rowsPerPage = "20" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=professor_lessons&">
         <tr class = "topTitle">
          <td class = "topTitle" name = "name"><?php echo @_NAME; ?>
 </td>
          <td class = "topTitle" name = "direction_name"><?php echo @_CATEGORY; ?>
</td>
          <td class = "topTitle centerAlign" name = "students"><?php echo @_PARTICIPATION; ?>
</td>
          <td class = "topTitle centerAlign" name = "course_only"><?php echo @_AVAILABLE; ?>
</td>
         <?php if ($this->_tpl_vars['T_CONFIGURATION']['disable_payments'] != 1): ?>
          <td class = "topTitle centerAlign" name = "price"><?php echo @_PRICE; ?>
</td>
         <?php endif; ?>
          <td class = "topTitle" name = "created"><?php echo @_CREATED; ?>
</td>
          <td class = "topTitle centerAlign" name = "active"><?php echo @_ACTIVE2; ?>
</td>
          <td class = "topTitle noSort centerAlign"><?php echo @_OPERATIONS; ?>
</td>
         </tr>
     <?php $_from = $this->_tpl_vars['T_LESSONS_DATA']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lessons_list2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lessons_list2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['lesson']):
        $this->_foreach['lessons_list2']['iteration']++;
?>
         <tr id = "row_<?php echo $this->_tpl_vars['lesson']['id']; ?>
" class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['lesson']['active']): ?>deactivatedTableElement<?php endif; ?>">
          <td id = "column_<?php echo $this->_tpl_vars['lesson']['id']; ?>
" class = "editLink">
           <a class="editLink <?php if (! $this->_tpl_vars['T_CONFIGURATION']['disable_tooltip']): ?>info<?php endif; ?>" url = "ask_information.php?lessons_ID=<?php echo $this->_tpl_vars['lesson']['id']; ?>
&type=lesson" href= "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=professor_lessons&edit_lesson=<?php echo $this->_tpl_vars['lesson']['id']; ?>
">
            <?php echo $this->_tpl_vars['lesson']['name']; ?>

           </a>
          <td><?php echo $this->_tpl_vars['lesson']['direction_name']; ?>
</td>
          <td class = "centerAlign"><?php if (! $this->_tpl_vars['lesson']['course_only']): ?><?php if ($this->_tpl_vars['lesson']['max_users']): ?><?php echo $this->_tpl_vars['lesson']['students']; ?>
/<?php echo $this->_tpl_vars['lesson']['max_users']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lesson']['students']; ?>
<?php endif; ?><?php else: ?>-<?php endif; ?></td>
          <td class = "centerAlign">
         <?php if ($this->_tpl_vars['lesson']['course_only']): ?>
           <img class = "ajaxHandle" src = "images/16x16/courses.png" alt = "<?php echo @_COURSEONLY; ?>
" title = "<?php echo @_COURSEONLY; ?>
" <?php if ($this->_tpl_vars['change_lessons']): ?>onclick = "setLessonAccess(this, '<?php echo $this->_tpl_vars['lesson']['id']; ?>
')"<?php endif; ?>>
         <?php else: ?>
           <img class = "ajaxHandle" src = "images/16x16/lessons.png" alt = "<?php echo @_DIRECTLY; ?>
" title = "<?php echo @_DIRECTLY; ?>
" <?php if ($this->_tpl_vars['change_lessons']): ?>onclick = "setLessonAccess(this, '<?php echo $this->_tpl_vars['lesson']['id']; ?>
')"<?php endif; ?>>
         <?php endif; ?>
          </td>
         <?php if ($this->_tpl_vars['T_CONFIGURATION']['disable_payments'] != 1): ?>
          <td class = "centerAlign"><?php if (! $this->_tpl_vars['lesson']['course_only']): ?><?php if ($this->_tpl_vars['lesson']['price'] == 0): ?>-<?php else: ?><?php echo $this->_tpl_vars['lesson']['price_string']; ?>
<?php endif; ?><?php else: ?>-<?php endif; ?></td>
         <?php endif; ?>
          <td>#filter:timestamp-<?php echo $this->_tpl_vars['lesson']['created']; ?>
#</td>
          <td class = "centerAlign">
         <?php if ($this->_tpl_vars['lesson']['active'] == 1): ?>
           <img class = "ajaxHandle" src = "images/16x16/trafficlight_green.png" alt = "<?php echo @_DEACTIVATE; ?>
" title = "<?php echo @_DEACTIVATE; ?>
" <?php if ($this->_tpl_vars['change_lessons']): ?>onclick = "activateLesson(this, '<?php echo $this->_tpl_vars['lesson']['id']; ?>
');"<?php endif; ?>>
         <?php else: ?>
           <img class = "ajaxHandle" src = "images/16x16/trafficlight_red.png" alt = "<?php echo @_ACTIVATE; ?>
" title = "<?php echo @_ACTIVATE; ?>
" <?php if ($this->_tpl_vars['change_lessons']): ?>onclick = "activateLesson(this, '<?php echo $this->_tpl_vars['lesson']['id']; ?>
')"<?php endif; ?>>
         <?php endif; ?>
          </td>
          <td class = "centerAlign" style = "white-space:nowrap">
         <?php if ($this->_tpl_vars['change_lessons']): ?>
           <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=professor_lessons&edit_lesson=<?php echo $this->_tpl_vars['lesson']['id']; ?>
"><img border = "0" src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" alt = "<?php echo @_EDIT; ?>
" /></a>
            <img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_AREYOUSUREYOUWANTTODELETELESSON; ?>
')) deleteLesson(this, '<?php echo $this->_tpl_vars['lesson']['id']; ?>
')"/>
         <?php endif; ?>
          </td>
         </tr>
     <?php endforeach; else: ?>
        <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
     <?php endif; unset($_from); ?>
        </table>
<!--/ajax:lessonsTable-->
         <?php $this->_smarty_vars['capture']['t_lessons_code'] = ob_get_contents(); ob_end_clean(); ?>
         <?php echo smarty_function_eF_template_printBlock(array('title' => @_UPDATELESSONS,'data' => $this->_smarty_vars['capture']['t_lessons_code'],'image' => '32x32/lessons.png','help' => 'Lessons'), $this);?>

          </td></tr>
   <?php endif; ?>
  <?php $this->_smarty_vars['capture']['moduleLessons'] = ob_get_contents(); ob_end_clean(); ?>
 <?php endif; ?>