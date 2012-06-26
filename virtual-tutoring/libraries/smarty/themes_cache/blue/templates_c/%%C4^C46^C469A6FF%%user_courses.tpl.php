<?php /* Smarty version 2.6.26, created on 2012-05-16 00:42:29
         compiled from includes/personal/user_courses.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'includes/personal/user_courses.tpl', 8, false),array('function', 'eF_template_printBlock', 'includes/personal/user_courses.tpl', 151, false),array('modifier', 'sizeof', 'includes/personal/user_courses.tpl', 28, false),)), $this); ?>
<?php ob_start(); ?>
     <tr class = "topTitle">
   <td class = "topTitle" name = "name" style = "width:84%"><?php echo @_LESSON; ?>
</td>
   <td class = "topTitle centerAlign" name = "completed" style = "width:8%"><?php echo @_COMPLETED; ?>
</td>
   <td class = "topTitle centerAlign" name = "score" style = "width:8%"><?php echo @_SCORE; ?>
</td>
     </tr>
  <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['lesson']):
        $this->_foreach['users_to_lessons_list']['iteration']++;
?>
  <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['lesson']['active']): ?>deactivatedTableElement<?php endif; ?>">
   <td>
    <?php if ($this->_tpl_vars['_change_courses_'] && ! $this->_tpl_vars['T_IS_SUPERVISOR']): ?>
    <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lessons&edit_lesson=<?php echo $this->_tpl_vars['lesson']['id']; ?>
" class = "editLink" title = "<?php echo @_EDIT; ?>
"><?php echo $this->_tpl_vars['lesson']['name']; ?>
</a>
    <?php else: ?>
    <span><?php echo $this->_tpl_vars['lesson']['name']; ?>
</span>
    <?php endif; ?>
   </td>
   <td class = "centerAlign">
   <?php if (( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['lesson']['user_type']] == 'student' )): ?>
    <?php if ($this->_tpl_vars['lesson']['completed']): ?><img src = "images/16x16/success.png" alt = "<?php echo @_YES; ?>
" title = "<?php echo @_YES; ?>
"/><?php else: ?><img src = "images/16x16/forbidden.png" alt = "<?php echo @_NO; ?>
" title = "<?php echo @_NO; ?>
"/><?php endif; ?>
   <?php endif; ?>
   </td>
   <td class = "centerAlign">
   <?php if (( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['lesson']['user_type']] == 'student' )): ?>
    <?php if ($this->_tpl_vars['lesson']['completed']): ?>#filter:score-<?php echo $this->_tpl_vars['lesson']['score']; ?>
#%<?php else: ?>-<?php endif; ?>
   <?php endif; ?>
   </td>
  </tr>
  <?php endforeach; else: ?>
     <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "<?php echo sizeof($this->_tpl_vars['T_DATASOURCE_COLUMNS']); ?>
"><?php echo @_NODATAFOUND; ?>
</td></tr>
  <?php endif; unset($_from); ?>
<?php $this->_smarty_vars['capture']['lessons_list'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
    <tr class = "topTitle">
  <td class = "topTitle" name = "name" style = "width:30%"><?php echo @_NAME; ?>
</td>



  <td class = "topTitle" name = "directions_ID" style = "width:15%"><?php echo @_PARENTDIRECTIONS; ?>
</td>
  <td class = "topTitle centerAlign" name = "active_in_course" style = "width:8%"><?php echo @_ENABLED; ?>
</td>
  <td class = "topTitle" name = "user_type" style = "width:8%"><?php echo @_USERTYPE; ?>
</td>
  <td class = "topTitle centerAlign" name = "completed" style = "width:8%"><?php echo @_COMPLETED; ?>
</td>
  <td class = "topTitle centerAlign" name = "score" style = "width:8%"><?php echo @_SCORE; ?>
</td>
  <td class = "topTitle centerAlign" name = "has_course" style = "width:8%"><?php echo @_STATUS; ?>
</td>
    </tr>
  <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_courses_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_courses_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['course']):
        $this->_foreach['users_to_courses_list']['iteration']++;
?>
  <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['course']['active']): ?>deactivatedTableElement<?php endif; ?>">
         <td>
          <?php if ($this->_tpl_vars['course']['has_instances'] && $this->_tpl_vars['T_SORTED_TABLE'] == 'coursesTable'): ?>
     <img src = "images/16x16/plus.png" class = "ajaxHandle" alt = "<?php echo @_COURSEINSTANCES; ?>
" title = "<?php echo @_COURSEINSTANCES; ?>
" onclick = "toggleSubSection(this, '<?php echo $this->_tpl_vars['course']['id']; ?>
', 'instancesTable')"/>
    <?php elseif ($this->_tpl_vars['course']['num_lessons'] && $this->_tpl_vars['T_SHOW_COURSE_LESSONS']): ?>
     <img src = "images/16x16/plus2.png" class = "ajaxHandle" alt = "<?php echo @_COURSELESSONS; ?>
" title = "<?php echo @_COURSELESSONS; ?>
" onclick = "toggleSubSection(this, '<?php echo $this->_tpl_vars['course']['id']; ?>
', 'courseLessonsTable')"/>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['_change_courses_'] && ! $this->_tpl_vars['T_IS_SUPERVISOR']): ?>
    <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=courses&edit_course=<?php echo $this->_tpl_vars['course']['id']; ?>
" class = "editLink" title = "<?php echo @_EDIT; ?>
"><?php echo $this->_tpl_vars['course']['name']; ?>
</a>
    <?php else: ?>
    <span><?php echo $this->_tpl_vars['course']['name']; ?>
</span>
    <?php endif; ?>
   </td>



         <td><?php echo $this->_tpl_vars['T_DIRECTION_PATHS'][$this->_tpl_vars['course']['directions_ID']]; ?>
</td>
         <td class = "centerAlign">
    <?php if (! $this->_tpl_vars['course']['active_in_course'] && $this->_tpl_vars['course']['has_course']): ?>
              <img src = "images/16x16/warning.png" title = "<?php echo @_APPLICATIONPENDING; ?>
" alt = "<?php echo @_APPLICATIONPENDING; ?>
" <?php if ($this->_tpl_vars['course']['has_instances'] && $this->_tpl_vars['T_SORTED_TABLE'] != 'instancesTable'): ?>class = "inactiveImage" <?php else: ?><?php if ($this->_tpl_vars['_change_courses_']): ?>class = "ajaxHandle" onclick = "toggleUserAccess(this, '<?php echo $this->_tpl_vars['course']['id']; ?>
', 'course')"<?php endif; ?><?php endif; ?>/>
             <?php elseif ($this->_tpl_vars['course']['has_course']): ?>
              <img src = "images/16x16/success.png" title = "<?php echo @_USERACCESSGRANTED; ?>
" alt = "<?php echo @_USERACCESSGRANTED; ?>
" <?php if ($this->_tpl_vars['course']['has_instances'] && $this->_tpl_vars['T_SORTED_TABLE'] != 'instancesTable'): ?>class = "inactiveImage" <?php else: ?><?php if ($this->_tpl_vars['_change_courses_']): ?>class = "ajaxHandle" onclick = "toggleUserAccess(this, '<?php echo $this->_tpl_vars['course']['id']; ?>
', 'course')"<?php endif; ?><?php endif; ?>/>
             <?php endif; ?>
         </td>
         <td>
       <?php if ($this->_tpl_vars['_change_courses_']): ?>
        <?php if (( ( $this->_tpl_vars['course']['has_course'] && $this->_tpl_vars['course']['has_instances'] ) ) && $this->_tpl_vars['T_SORTED_TABLE'] != 'instancesTable'): ?>
         <?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['course']['user_type']]; ?>

        <?php elseif ($this->_tpl_vars['T_SORTED_TABLE'] == 'instancesTable' || ! $this->_tpl_vars['course']['has_instances']): ?>
         <span style = "display:none"><?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['course']['user_type']]; ?>
</span>
               <select name = "course_type_<?php echo $this->_tpl_vars['course']['id']; ?>
" id = "course_type_<?php echo $this->_tpl_vars['course']['id']; ?>
" onchange = "$('course_<?php echo $this->_tpl_vars['course']['id']; ?>
').checked = true;ajaxPost('<?php echo $this->_tpl_vars['course']['id']; ?>
', this, 'coursesTable');">
             <?php $_from = $this->_tpl_vars['T_ROLES_ARRAY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['roles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['roles_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['role_key'] => $this->_tpl_vars['role_item']):
        $this->_foreach['roles_list']['iteration']++;
?>
                   <option value = "<?php echo $this->_tpl_vars['role_key']; ?>
" <?php if (! $this->_tpl_vars['course']['user_type']): ?><?php if (( $this->_tpl_vars['T_EDITED_USER_TYPE'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?><?php else: ?><?php if (( $this->_tpl_vars['course']['user_type'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['role_item']; ?>
</option>
             <?php endforeach; endif; unset($_from); ?>
               </select>
           <?php endif; ?>
       <?php else: ?>
           <?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['course']['user_type']]; ?>

       <?php endif; ?>
         </td>
         <td class = "centerAlign">
   <?php if ($this->_tpl_vars['course']['has_course'] && ( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['course']['user_type']] == 'student' )): ?>
    <?php if ($this->_tpl_vars['course']['completed']): ?>
     <img src = "images/16x16/success.png" alt = "#filter:timestamp_time-<?php echo $this->_tpl_vars['course']['to_timestamp']; ?>
#" title = "#filter:timestamp_time-<?php echo $this->_tpl_vars['course']['to_timestamp']; ?>
#">
    <?php else: ?>
     <img src = "images/16x16/forbidden.png" alt = "<?php echo @_NO; ?>
" title = "<?php echo @_NO; ?>
">
    <?php endif; ?>
   <?php endif; ?>
   </td>
         <td class = "centerAlign"><?php if ($this->_tpl_vars['course']['has_course'] && ( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['course']['user_type']] == 'student' )): ?><?php if ($this->_tpl_vars['course']['completed']): ?>#filter:score-<?php echo $this->_tpl_vars['course']['score']; ?>
#%<?php else: ?>-<?php endif; ?><?php endif; ?></td>
         <td class = "centerAlign">
       <?php if ($this->_tpl_vars['_change_courses_']): ?>
        <?php if (( ( $this->_tpl_vars['course']['has_course'] && $this->_tpl_vars['course']['has_instances'] ) ) && $this->_tpl_vars['T_SORTED_TABLE'] != 'instancesTable'): ?>
        <input class = "inputCheckBox" type="checkbox" name="<?php echo $this->_tpl_vars['course']['id']; ?>
" checked disabled>
        <?php elseif ($this->_tpl_vars['T_SORTED_TABLE'] == 'instancesTable' || ! $this->_tpl_vars['course']['has_instances']): ?>
              <input class = "inputCheckBox" type="checkbox" id="course_<?php echo $this->_tpl_vars['course']['id']; ?>
" name="<?php echo $this->_tpl_vars['course']['id']; ?>
" <?php if ($this->_tpl_vars['course']['has_course'] == 1): ?>checked<?php endif; ?> onclick ="ajaxPost('<?php echo $this->_tpl_vars['course']['id']; ?>
', this, 'coursesTable');">
              <?php endif; ?>
       <?php elseif ($this->_tpl_vars['course']['has_course'] == 1): ?>
        <?php if (( ( $this->_tpl_vars['course']['has_course'] && $this->_tpl_vars['course']['has_instances'] ) ) && $this->_tpl_vars['T_SORTED_TABLE'] != 'instancesTable'): ?>
        <img src = "images/16x16/success.png" class = "inactiveImage" alt = "<?php echo @_COURSEUSER; ?>
" title = "<?php echo @_COURSEUSER; ?>
">
        <?php elseif ($this->_tpl_vars['T_SORTED_TABLE'] == 'instancesTable' || ! $this->_tpl_vars['course']['has_instances']): ?>
        <img src = "images/16x16/success.png" alt = "<?php echo @_COURSEUSER; ?>
" title = "<?php echo @_COURSEUSER; ?>
">
              <?php endif; ?>
       <?php endif; ?>

         </td>
     </tr>
  <?php endforeach; else: ?>
     <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "<?php echo sizeof($this->_tpl_vars['T_DATASOURCE_COLUMNS']); ?>
"><?php echo @_NODATAFOUND; ?>
</td></tr>
  <?php endif; unset($_from); ?>
<?php $this->_smarty_vars['capture']['courses_list'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
 <script>
  translationsToJS['_USERACCESSGRANTED'] = '<?php echo @_USERACCESSGRANTED; ?>
';
  translationsToJS['_APPLICATIONPENDING'] = '<?php echo @_APPLICATIONPENDING; ?>
';
 </script>

 <?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'coursesTable'): ?>
<!--ajax:coursesTable-->
  <table style = "width:100%" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "<?php echo $this->_tpl_vars['T_DATASOURCE_SORT_BY']; ?>
" order = "<?php echo $this->_tpl_vars['T_DATASOURCE_SORT_ORDER']; ?>
" activeFilter = "1" id = "coursesTable" class = "sortedTable" useAjax = "1" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $_GET['user']; ?>
&op=user_courses&">
   <?php echo $this->_smarty_vars['capture']['courses_list']; ?>

  </table>
<!--/ajax:coursesTable-->
 <?php endif; ?>
 <?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'instancesTable'): ?>
 <div id = "filemanager_div" style = "display:none;">
<!--ajax:instancesTable-->
  <table style = "width:100%" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "<?php echo $this->_tpl_vars['T_DATASOURCE_SORT_BY']; ?>
" order = "<?php echo $this->_tpl_vars['T_DATASOURCE_SORT_ORDER']; ?>
" activeFilter = "1" id = "instancesTable" class = "sortedTable subSection" no_auto = "1" useAjax = "1" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $_GET['user']; ?>
&op=user_courses&">
   <?php echo $this->_smarty_vars['capture']['courses_list']; ?>

  </table>
<!--/ajax:instancesTable-->
 </div>
 <?php endif; ?>
 <?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'courseLessonsTable'): ?>
 <div id = "filemanager_div" style = "display:none;">
<!--ajax:courseLessonsTable-->
  <table style = "width:100%" id = "courseLessonsTable" sortBy = "<?php echo $this->_tpl_vars['T_DATASOURCE_SORT_BY']; ?>
" no_auto = "1" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" class = "sortedTable subSection" useAjax = "1" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $_GET['user']; ?>
&op=user_courses&">
   <?php echo $this->_smarty_vars['capture']['lessons_list']; ?>

  </table>
<!--/ajax:courseLessonsTable-->
 </div>
 <?php endif; ?>
<?php $this->_smarty_vars['capture']['t_courses_list_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'courses','title' => @_COURSES,'data' => $this->_smarty_vars['capture']['t_courses_list_code'],'image' => '32x32/courses.png'), $this);?>
