<?php /* Smarty version 2.6.26, created on 2012-05-16 07:17:19
         compiled from includes/common/course_users_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'includes/common/course_users_list.tpl', 42, false),array('modifier', 'str_replace', 'includes/common/course_users_list.tpl', 94, false),array('modifier', 'sizeof', 'includes/common/course_users_list.tpl', 157, false),)), $this); ?>
<?php ob_start(); ?>
<style>
<?php echo '
table#courseUsersTable,table#instanceUsersTable {width:100%;}
table#courseUsersTable td.login,table#instanceUsersTable td.login{width:20%;}
table#courseUsersTable td.name,table#instanceUsersTable td.name{width:20%;}
table#coursesTable td.location,table#instanceUsersTable td.location{width:20%;}
table#courseUsersTable td.user_type, table#instanceUsersTable td.user_type{width:25%;}
table#courseUsersTable td.active_in_course,table#instanceUsersTable td.active_in_course{width:5%;text-align:center;}
table#courseUsersTable td.completed,table#instanceUsersTable td.completed{width:5%;text-align:center;}
table#courseUsersTable td.enrolled_on,table#instanceUsersTable td.enrolled_on{width:10%;text-align:center;}
table#courseUsersTable td.to_timestamp,table#instanceUsersTable td.to_timestamp{width:10%;text-align:center;}
table#courseUsersTable td.score,table#instanceUsersTable td.score{width:5%;text-align:center;}
table#courseUsersTable td.issued_certificate,table#instanceUsersTable td.issued_certificate{width:15%;text-align:center;}
table#courseUsersTable td.expire_certificate,table#instanceUsersTable td.expire_certificate{width:5%;text-align:center;}
table#courseUsersTable td.operations,table#instanceUsersTable td.operations{width:5%;text-align:center;white-space:nowrap;}
table#courseUsersTable td.has_course,table#instanceUsersTable td.has_course{width:10%;text-align:center;}
'; ?>

</style>
<script>
if (typeof(currentUserLogin) == 'undefined') var currentUserLogin ='';
</script>
  <tr class = "topTitle">
<?php if (in_array ( 'login' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle login" name = "login"><?php echo @_USER; ?>
</td><?php endif; ?>
<?php if (in_array ( 'name' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle name" name = "name"><?php echo @_NAME; ?>
</td><?php endif; ?>
<?php if (in_array ( 'location' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle location" name = "location"><?php echo @_LOCATION; ?>
</td><?php endif; ?>
<?php if (in_array ( 'user_type' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle user_type" name = "user_type"><?php echo @_USERTYPE; ?>
</td><?php endif; ?>
<?php if (in_array ( 'active_in_course' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?><td class = "topTitle active_in_course" name = "active_in_course"><?php echo @_STATUS; ?>
</td><?php endif; ?>
<?php if (in_array ( 'lesson_percentage' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?><td class = "topTitle lesson_percentage noSort" name = "lesson_percentage"><?php echo @_PERCENTAGE; ?>
</td><?php endif; ?>
<?php if (in_array ( 'completed' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle completed" name = "completed"><?php echo @_COMPLETED; ?>
</td><?php endif; ?>
<?php if (in_array ( 'enrolled_on' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle enrolled_on" name = "enrolled_on"><?php echo @_ENROLLEDON; ?>
</td><?php endif; ?>
<?php if (in_array ( 'to_timestamp' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle to_timestamp" name = "to_timestamp"><?php echo @_COMPLETEDON; ?>
</td><?php endif; ?>
<?php if (in_array ( 'score' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle score" name = "score"><?php echo @_SCORE; ?>
</td><?php endif; ?>




<?php if (in_array ( 'operations' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle operations noSort"><?php echo @_OPERATIONS; ?>
</td><?php endif; ?>
<?php if (in_array ( 'has_course' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle has_course" name = "has_course"><?php echo @_CHECK; ?>
</td><?php endif; ?>
  </tr>
  <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_courses_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_courses_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users_to_courses_list']['iteration']++;
?>
  <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['user']['active']): ?>deactivatedTableElement<?php endif; ?>">
<?php if (in_array ( 'name' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "name">
    <?php if ($this->_tpl_vars['T_CURRENT_COURSE']->course['num_lessons'] && $this->_tpl_vars['T_SHOW_COURSE_LESSONS']): ?>
     <img src = "images/16x16/plus2.png" class = "ajaxHandle" alt = "<?php echo @_COURSELESSONS; ?>
" title = "<?php echo @_COURSELESSONS; ?>
" onclick = "toggleSubSection(this, '<?php echo $this->_tpl_vars['T_CURRENT_COURSE']->course['id']; ?>
', 'courseLessonsUsersTable', 'courseLessonsUsersTable_login='+currentUserLogin);"/>
    <?php endif; ?>
    <?php echo $this->_tpl_vars['user']['name']; ?>

   </td>
<?php endif; ?>
<?php if (in_array ( 'login' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "login">
    <?php if ($this->_tpl_vars['T_COURSE_HAS_INSTANCES'] && $this->_tpl_vars['T_SORTED_TABLE'] == 'courseUsersTable'): ?>
     <img src = "images/16x16/plus.png" class = "ajaxHandle" alt = "<?php echo @_COURSEINSTANCES; ?>
" title = "<?php echo @_COURSEINSTANCES; ?>
" onclick = "currentUserLogin = '<?php echo $this->_tpl_vars['user']['login']; ?>
';toggleSubSection(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
', 'instanceUsersTable')"/>
    <?php endif; ?>
    <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=statistics&option=user&sel_user=<?php echo $this->_tpl_vars['user']['login']; ?>
" class = "editLink" title = "<?php echo @_EDIT; ?>
">#filter:login-<?php echo $this->_tpl_vars['user']['login']; ?>
#</a>
   </td>
<?php endif; ?>
<?php if (in_array ( 'location' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "location" name = "location"><?php if (! $this->_tpl_vars['course']['has_instances'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'instanceUsersTable'): ?><?php echo $this->_tpl_vars['course']['location']; ?>
<?php endif; ?></td>
<?php endif; ?>
<?php if (in_array ( 'user_type' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "user_type">
   <?php if (! $this->_tpl_vars['T_COURSE_HAS_INSTANCES'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'instanceUsersTable'): ?>
    <?php if ($this->_tpl_vars['_change_handles_']): ?>
     <span style = "display:none"><?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['user']['user_type']]; ?>
</span>
     <select name = "user_type_<?php echo $this->_tpl_vars['user']['login']; ?>
" id = "user_type_<?php echo $this->_tpl_vars['user']['login']; ?>
" onchange = "$('user_<?php echo $this->_tpl_vars['user']['login']; ?>
').checked = true;ajaxUserPost('user', '<?php echo $this->_tpl_vars['user']['login']; ?>
', this);">
      <?php $_from = $this->_tpl_vars['T_ROLES_ARRAY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['roles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['roles_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['role_key'] => $this->_tpl_vars['role_item']):
        $this->_foreach['roles_list']['iteration']++;
?>
      <option value = "<?php echo $this->_tpl_vars['role_key']; ?>
" <?php if (! $this->_tpl_vars['user']['user_type']): ?><?php if (( $this->_tpl_vars['T_EDITED_USER_TYPE'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?><?php else: ?><?php if (( $this->_tpl_vars['user']['user_type'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['role_item']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
     </select>
    <?php else: ?>
     <?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['user']['role']]; ?>

    <?php endif; ?>
   <?php endif; ?>
   </td>
<?php endif; ?>
<?php if (in_array ( 'active_in_course' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "active_in_course">
   <?php if (! $this->_tpl_vars['T_COURSE_HAS_INSTANCES'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'instanceUsersTable'): ?>
    <?php if (! $this->_tpl_vars['user']['active_in_course'] && $this->_tpl_vars['user']['has_course']): ?>
     <img src = "images/16x16/warning.png" title = "<?php echo @_APPLICATIONPENDING; ?>
" alt = "<?php echo @_APPLICATIONPENDING; ?>
" <?php if ($this->_tpl_vars['_change_handles_']): ?>class = "ajaxHandle" onclick = "toggleUserAccess(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
', 'user')"<?php endif; ?>/>
    <?php elseif ($this->_tpl_vars['user']['has_course']): ?>
     <img src = "images/16x16/success.png" title = "<?php echo @_USERHASTHECOURSE; ?>
" alt = "<?php echo @_USERHASTHECOURSE; ?>
" <?php if ($this->_tpl_vars['_change_handles_']): ?>class = "ajaxHandle" onclick = "toggleUserAccess(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
', 'user')"<?php endif; ?>/>
    <?php endif; ?>
   <?php endif; ?>
   </td>
<?php endif; ?>
<?php if (in_array ( 'lesson_percentage' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "lesson_percentage">
   <?php if (( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['user']['role']] == 'student' )): ?>
     <span style = "display:none"><?php echo $this->_tpl_vars['user']['lesson_percentage']+1000; ?>
</span>
     <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['user']['lesson_percentage']; ?>
#%</span>
     <span class = "progressBar" style = "width:<?php echo ((is_array($_tmp=",")) ? $this->_run_mod_handler('str_replace', true, $_tmp, ".", $this->_tpl_vars['user']['lesson_percentage']) : str_replace($_tmp, ".", $this->_tpl_vars['user']['lesson_percentage'])); ?>
px;">&nbsp;</span>&nbsp;&nbsp;
   <?php endif; ?>
   </td>
<?php endif; ?>
<?php if (in_array ( 'completed' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "completed">
   <?php if (( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['user']['role']] == 'student' )): ?>
    <?php if ($this->_tpl_vars['user']['has_course']): ?>
     <?php if ($this->_tpl_vars['user']['completed']): ?>
      <img src = "images/16x16/success.png" alt = "#filter:timestamp_time-<?php echo $this->_tpl_vars['user']['to_timestamp']; ?>
#" title = "#filter:timestamp_time-<?php echo $this->_tpl_vars['user']['to_timestamp']; ?>
#">
     <?php else: ?>
      <img src = "images/16x16/forbidden.png" alt = "<?php echo @_NO; ?>
" title = "<?php echo @_NO; ?>
">
     <?php endif; ?>
    <?php endif; ?>
   <?php endif; ?>
   </td>
<?php endif; ?>
<?php if (in_array ( 'enrolled_on' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "enrolled_on"><?php if ($this->_tpl_vars['user']['has_course']): ?>#filter:timestamp-<?php echo $this->_tpl_vars['user']['enrolled_on']; ?>
#<?php endif; ?></td>
<?php endif; ?>
<?php if (in_array ( 'to_timestamp' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "to_timestamp"><?php if ($this->_tpl_vars['user']['has_course']): ?>#filter:timestamp-<?php echo $this->_tpl_vars['user']['to_timestamp']; ?>
#<?php endif; ?></td>
<?php endif; ?>
<?php if (in_array ( 'score' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "score"><?php if ($this->_tpl_vars['user']['has_course'] && ( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['user']['role']] == 'student' )): ?><?php if ($this->_tpl_vars['user']['completed']): ?>#filter:score-<?php echo $this->_tpl_vars['user']['score']; ?>
#%<?php else: ?>-<?php endif; ?><?php endif; ?></td>
<?php endif; ?>
<?php if (in_array ( 'operations' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "operations"><?php echo ''; ?><?php if (! isset ( $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] ) || in_array ( 'statistics' , $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] )): ?><?php echo ''; ?><?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['statistics'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['statistics'] != 'hidden'): ?><?php echo '<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?ctg=statistics&option=user&sel_user='; ?><?php echo $this->_tpl_vars['user']['login']; ?><?php echo '"><img class = "handle" src = "images/16x16/reports.png" title = "'; ?><?php echo @_STATISTICS; ?><?php echo '" alt = "'; ?><?php echo @_STATISTICS; ?><?php echo '" /></a>&nbsp;'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if (! isset ( $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] ) || in_array ( 'certificate' , $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] )): ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if (! isset ( $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] ) || in_array ( 'progress' , $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] )): ?><?php echo ''; ?><?php if (( ! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['course_settings'] == 'change' )): ?><?php echo '<a href = "'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?'; ?><?php echo $this->_tpl_vars['T_BASE_URL']; ?><?php echo '&op=course_certificates&edit_user='; ?><?php echo $this->_tpl_vars['user']['login']; ?><?php echo '&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(\''; ?><?php echo @_PROGRESS; ?><?php echo '\', 2)" title = "'; ?><?php echo @_VIEWUSERLESSONPROGRESS; ?><?php echo '"><img src = "images/16x16/users.png" title = "'; ?><?php echo @_VIEWUSERCOURSEPROGRESS; ?><?php echo '" alt = "'; ?><?php echo @_VIEWUSERCOURSEPROGRESS; ?><?php echo '"/></a>'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
</td>
<?php endif; ?>
<?php if (in_array ( 'has_course' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "has_course">
    <?php if ($this->_tpl_vars['_change_handles_']): ?>
     <?php if (( ( $this->_tpl_vars['user']['has_course'] && $this->_tpl_vars['T_COURSE_HAS_INSTANCES'] ) ) && $this->_tpl_vars['T_SORTED_TABLE'] != 'instanceUsersTable'): ?>
     <input class = "inputCheckBox" type="checkbox" name="<?php echo $this->_tpl_vars['user']['login']; ?>
" checked disabled">
     <?php elseif ($this->_tpl_vars['T_SORTED_TABLE'] == 'instanceUsersTable' || ! $this->_tpl_vars['T_COURSE_HAS_INSTANCES']): ?>
     <input class = "inputCheckBox" type="checkbox" id="user_<?php echo $this->_tpl_vars['user']['login']; ?>
" name="<?php echo $this->_tpl_vars['user']['login']; ?>
" <?php if ($this->_tpl_vars['user']['has_course'] == 1): ?>checked<?php endif; ?> onclick ="ajaxPost('<?php echo $this->_tpl_vars['user']['login']; ?>
', this, 'userUsersTable');">
     <?php endif; ?>
    <?php elseif ($this->_tpl_vars['user']['has_course'] == 1): ?>
     <?php if (( ( $this->_tpl_vars['user']['has_course'] && $this->_tpl_vars['T_COURSE_HAS_INSTANCES'] ) ) && $this->_tpl_vars['T_SORTED_TABLE'] != 'instanceUsersTable'): ?>
     <img src = "images/16x16/success.png" class = "inactiveImage" alt = "<?php echo @_COURSEUSER; ?>
" title = "<?php echo @_COURSEUSER; ?>
">
     <?php elseif ($this->_tpl_vars['T_SORTED_TABLE'] == 'instanceUsersTable' || ! $this->_tpl_vars['T_COURSE_HAS_INSTANCES']): ?>
     <img src = "images/16x16/success.png" alt = "<?php echo @_COURSEUSER; ?>
" title = "<?php echo @_COURSEUSER; ?>
">
     <?php endif; ?>
    <?php endif; ?>
   </td>
<?php endif; ?>
  </tr>
  <?php endforeach; else: ?>
  <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "<?php echo sizeof($this->_tpl_vars['T_DATASOURCE_COLUMNS']); ?>
"><?php echo @_NODATAFOUND; ?>
</td></tr>
  <?php endif; unset($_from); ?>
<?php $this->_smarty_vars['capture']['course_users_list'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start(); ?>
<style>
<?php echo '
table#lessonsTable,table#courseLessonsUsersTable {width:100%;}
table#lessonsTable td.name, table#courseLessons td.name{width:50%;}
table#lessonsTable td.time_in_lesson, table#courseLessons td.time_in_lesson{width:25%;}
table#lessonsTable td.overall_progress,table#courseLessons td.overall_progress{width:5%;text-align:center;}
table#lessonsTable td.test_status, table#courseLessons td.test_status{width:5%;text-align:center;}
table#lessonsTable td.project_status,table#courseLessons td.project_status{width:5%;text-align:center;}
table#lessonsTable td.completed,table#courseLessons td.completed{width:5%;text-align:center;}
table#lessonsTable td.score,table#courseLessons td.score{width:5%;text-align:center;}
'; ?>

</style>
  <tr class = "topTitle">
<?php if (in_array ( 'name' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle name" name = "name"><?php echo @_LESSON; ?>
</td><?php endif; ?>
<?php if (in_array ( 'time_in_lesson' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle time_in_lesson" name = "time_in_lesson"><?php echo @_TIMEINLESSON; ?>
</td><?php endif; ?>
<?php if (in_array ( 'overall_progress' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?><td class = "topTitle overall_progress" name = "overall_progress"><?php echo @_OVERALLPROGRESS; ?>
</td><?php endif; ?>
  <?php if (! $this->_tpl_vars['T_CONFIGURATION']['disable_tests']): ?>
<?php if (in_array ( 'test_status' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle test_status" name = "test_status"><?php echo @_TESTSSCORE; ?>
</td><?php endif; ?>
  <?php endif; ?>
  <?php if (! $this->_tpl_vars['T_CONFIGURATION']['disable_projects']): ?>
<?php if (in_array ( 'project_status' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle project_status" name = "project_status"><?php echo @_PROJECTSSCORE; ?>
</td><?php endif; ?>
  <?php endif; ?>
<?php if (in_array ( 'completed' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle completed" name = "completed"><?php echo @_COMPLETED; ?>
</td><?php endif; ?>
<?php if (in_array ( 'score' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle score" name = "score"><?php echo @_SCORE; ?>
</td><?php endif; ?>
  </tr>
  <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['lesson']):
        $this->_foreach['users_to_lessons_list']['iteration']++;
?>
  <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['lesson']['active']): ?>deactivatedTableElement<?php endif; ?>">
<?php if (in_array ( 'name' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "name"><?php echo $this->_tpl_vars['lesson']['name']; ?>
</td>
<?php endif; ?>
<?php if (in_array ( 'time_in_lesson' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "time_in_lesson"><span style = "display:none"><?php echo $this->_tpl_vars['lesson']['time_in_lesson']['total_seconds']; ?>
&nbsp;</span><?php echo $this->_tpl_vars['lesson']['time_in_lesson']['time_string']; ?>
</td>
<?php endif; ?>
<?php if (in_array ( 'overall_progress' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "progressCell overall_progress">
   <?php if (( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['user']['user_type']] == 'student' )): ?>
    <span style = "display:none"><?php echo $this->_tpl_vars['lesson']['overall_progress']['completed']+1000; ?>
</span>
    <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['lesson']['overall_progress']['percentage']; ?>
#%</span>
    <span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['lesson']['overall_progress']['percentage']; ?>
px;">&nbsp;</span>&nbsp;&nbsp;
   <?php endif; ?>
   </td>
<?php endif; ?>
   <?php if (! $this->_tpl_vars['T_CONFIGURATION']['disable_tests']): ?>
<?php if (in_array ( 'test_status' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "progressCell test_status">
   <?php if (( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['user']['user_type']] == 'student' )): ?>
    <?php if ($this->_tpl_vars['lesson']['test_status']): ?>
     <span style = "display:none"><?php echo $this->_tpl_vars['lesson']['test_status']['mean_score']+1000; ?>
</span>
     <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['lesson']['test_status']['mean_score']; ?>
#% (<?php echo $this->_tpl_vars['lesson']['test_status']['completed']; ?>
/<?php echo $this->_tpl_vars['lesson']['test_status']['total']; ?>
)</span>
     <span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['lesson']['test_status']['mean_score']; ?>
px;">&nbsp;</span>&nbsp;&nbsp;
    <?php else: ?>
     <div class = "centerAlign">-</div>
    <?php endif; ?>
   <?php endif; ?>
   </td>
<?php endif; ?>
   <?php endif; ?>
   <?php if (! $this->_tpl_vars['T_CONFIGURATION']['disable_projects']): ?>
<?php if (in_array ( 'project_status' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "progressCell project_status">
   <?php if (( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['user']['user_type']] == 'student' )): ?>
    <?php if ($this->_tpl_vars['lesson']['project_status']): ?>
     <span style = "display:none"><?php echo $this->_tpl_vars['lesson']['project_status']['mean_score']+1000; ?>
</span>
     <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['lesson']['project_status']['mean_score']; ?>
#% (<?php echo $this->_tpl_vars['lesson']['project_status']['completed']; ?>
/<?php echo $this->_tpl_vars['lesson']['project_status']['total']; ?>
)</span>
     <span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['lesson']['project_status']['mean_score']; ?>
px;">&nbsp;</span>&nbsp;&nbsp;
    <?php else: ?>
     <div class = "centerAlign">-</div>
    <?php endif; ?>
   <?php endif; ?>
   </td>
<?php endif; ?>
   <?php endif; ?>
<?php if (in_array ( 'completed' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "completed">
   <?php if (( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['user']['user_type']] == 'student' )): ?>
    <?php if ($this->_tpl_vars['lesson']['completed']): ?><img src = "images/16x16/success.png" alt = "<?php echo @_YES; ?>
" title = "<?php echo @_YES; ?>
"/><?php else: ?><img src = "images/16x16/forbidden.png" alt = "<?php echo @_NO; ?>
" title = "<?php echo @_NO; ?>
"/><?php endif; ?>
   <?php endif; ?>
   </td>
<?php endif; ?>
<?php if (in_array ( 'score' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
   <td class = "score">
   <?php if (( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['user']['user_type']] == 'student' )): ?>
    <?php if ($this->_tpl_vars['lesson']['completed']): ?>#filter:score-<?php echo $this->_tpl_vars['lesson']['score']; ?>
#%<?php else: ?>-<?php endif; ?>
   <?php endif; ?>
   </td>
<?php endif; ?>
  </tr>
  <?php endforeach; else: ?>
  <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "<?php echo sizeof($this->_tpl_vars['T_DATASOURCE_COLUMNS']); ?>
"><?php echo @_NODATAFOUND; ?>
</td></tr>
  <?php endif; unset($_from); ?>
<?php $this->_smarty_vars['capture']['lessons_list'] = ob_get_contents(); ob_end_clean(); ?>
 <?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'courseUsersTable'): ?>
<!--ajax:courseUsersTable-->
 <table size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "<?php echo $this->_tpl_vars['T_DATASOURCE_SORT_BY']; ?>
" id = "courseUsersTable" class = "sortedTable" useAjax = "1" url = "<?php echo $this->_tpl_vars['courseUsers_url']; ?>
">
  <?php echo $this->_smarty_vars['capture']['course_users_list']; ?>

 </table>
<!--/ajax:courseUsersTable-->
 <?php endif; ?>
 <?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'instanceUsersTable'): ?>
<div id = "filemanager_div" style = "display:none;">
<!--ajax:instanceUsersTable-->
 <table size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "<?php echo $this->_tpl_vars['T_DATASOURCE_SORT_BY']; ?>
" id = "instanceUsersTable" class = "sortedTable subSection" no_auto = "1" useAjax = "1" url = "<?php echo $this->_tpl_vars['courseUsers_url']; ?>
">
  <?php echo $this->_smarty_vars['capture']['course_users_list']; ?>

 </table>
<!--/ajax:instanceUsersTable-->
</div>
 <?php endif; ?>
 <?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'courseLessonsUsersTable'): ?>
<div id = "filemanager_div" style = "display:none;">
<!--ajax:courseLessonsUsersTable-->
  <table id = "courseLessonsUsersTable" no_auto = "1" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" class = "sortedTable subSection" useAjax = "1" url = "<?php echo $this->_tpl_vars['courseUsers_url']; ?>
">
  <?php echo $this->_smarty_vars['capture']['lessons_list']; ?>

  </table>
<!--/ajax:courseLessonsUsersTable-->
</div>
 <?php endif; ?>