<?php /* Smarty version 2.6.26, created on 2012-05-16 00:38:50
         compiled from includes/categories.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'includes/categories.tpl', 34, false),array('function', 'eF_template_printBlock', 'includes/categories.tpl', 88, false),)), $this); ?>
<?php ob_start(); ?>
 <tr><td class = "moduleCell">

 <?php if ($_GET['add_direction'] || $_GET['edit_direction']): ?>

  <?php ob_start(); ?>
   <?php echo $this->_tpl_vars['T_DIRECTIONS_FORM']['javascript']; ?>

   <form <?php echo $this->_tpl_vars['T_DIRECTIONS_FORM']['attributes']; ?>
>
    <?php echo $this->_tpl_vars['T_DIRECTIONS_FORM']['hidden']; ?>

    <table class = "formElements">
     <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_DIRECTIONS_FORM']['name']['label']; ?>
:&nbsp;</td>
      <td><?php echo $this->_tpl_vars['T_DIRECTIONS_FORM']['name']['html']; ?>
</td></tr>
     <?php if ($this->_tpl_vars['T_DIRECTIONS_FORM']['name']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_DIRECTIONS_FORM']['name']['error']; ?>
</td></tr><?php endif; ?>
      <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_DIRECTIONS_FORM']['parent_direction_ID']['label']; ?>
:&nbsp;</td>
      <td><?php echo $this->_tpl_vars['T_DIRECTIONS_FORM']['parent_direction_ID']['html']; ?>
</td></tr>
     <?php if ($this->_tpl_vars['T_DIRECTIONS_FORM']['parent_direction_ID']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_DIRECTIONS_FORM']['parent_direction_ID']['error']; ?>
</td></tr><?php endif; ?>
     <tr><td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_DIRECTIONS_FORM']['submit_direction']['html']; ?>
</td></tr>
    </table>
   </form>
  <?php $this->_smarty_vars['capture']['t_direction_settings_code'] = ob_get_contents(); ob_end_clean(); ?>

  <?php if ($_GET['edit_direction']): ?>
   <script>var editCategory = '<?php echo $_GET['edit_direction']; ?>
';</script>

   <?php ob_start(); ?>
<!--ajax:lessonsTable-->
    <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_LESSONS_SIZE']; ?>
" sortBy = "0" useAjax = "1" id = "lessonsTable" rowsPerPage = "20" url = "administrator.php?ctg=directions&edit_direction=<?php echo $_GET['edit_direction']; ?>
&">
     <tr class = "topTitle">
      <td class = "topTitle" name = "name"><?php echo @_NAME; ?>
 </td>
      <td class = "topTitle" name = "languages_NAME"><?php echo @_LANGUAGE; ?>
</td>
      <td class = "topTitle centerAlign" ><?php echo @_SELECT; ?>
</td>
     </tr>
    <?php $_from = $this->_tpl_vars['T_LESSONS_DATA']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lessons_list2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lessons_list2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['lesson']):
        $this->_foreach['lessons_list2']['iteration']++;
?>
     <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['lesson']['active']): ?>deactivatedTableElement<?php endif; ?>">
      <td><?php echo $this->_tpl_vars['lesson']['name']; ?>
</td>
      <td><?php echo $this->_tpl_vars['lesson']['languages_NAME']; ?>
</td>
      <td class = "centerAlign">
     <?php if ($this->_tpl_vars['_change_']): ?>
       <select name = "directions" id = "lesson_<?php echo $this->_tpl_vars['lesson']['id']; ?>
" onchange = "ajaxPost('lesson_<?php echo $this->_tpl_vars['lesson']['id']; ?>
', this, 'lessonsTable');">
      <?php $_from = $this->_tpl_vars['T_DIRECTIONS_PATHS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['directions_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['directions_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['directions_list']['iteration']++;
?>
        <option value = "<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['lesson']['directions_ID'] == $this->_tpl_vars['key']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
       </select>
     <?php else: ?>
          <?php echo $this->_tpl_vars['T_DIRECTIONS_PATHS'][$this->_tpl_vars['lesson']['directions_ID']]; ?>

     <?php endif; ?>
      </td>
    <?php endforeach; else: ?>
     <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
    <?php endif; unset($_from); ?>
    </table>
<!--/ajax:lessonsTable-->
   <?php $this->_smarty_vars['capture']['t_lessons_to_directions_code'] = ob_get_contents(); ob_end_clean(); ?>

   <?php ob_start(); ?>
<!--ajax:coursesTable-->
    <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_COURSES_SIZE']; ?>
" sortBy = "0" useAjax = "1" id = "coursesTable" rowsPerPage = "20" url = "administrator.php?ctg=directions&edit_direction=<?php echo $_GET['edit_direction']; ?>
&">
     <tr class = "topTitle">
      <td class = "topTitle" name = "name"><?php echo @_NAME; ?>
 </td>
      <td class = "topTitle" name = "languages_NAME"><?php echo @_LANGUAGE; ?>
</td>
      <td class = "topTitle centerAlign" ><?php echo @_SELECT; ?>
</td>
     </tr>
    <?php $_from = $this->_tpl_vars['T_COURSES_DATA']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['courses_list2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['courses_list2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['course']):
        $this->_foreach['courses_list2']['iteration']++;
?>
     <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['course']['active']): ?>deactivatedTableElement<?php endif; ?>">
      <td><?php echo $this->_tpl_vars['course']['name']; ?>
</td>
      <td><?php echo $this->_tpl_vars['course']['languages_NAME']; ?>
</td>
      <td class = "centerAlign">
     <?php if ($this->_tpl_vars['_change_']): ?>
       <select name = "directions" id = "course_<?php echo $this->_tpl_vars['course']['id']; ?>
" onchange = "ajaxPost('course_<?php echo $this->_tpl_vars['course']['id']; ?>
', this, 'coursesTable');">
      <?php $_from = $this->_tpl_vars['T_DIRECTIONS_PATHS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['directions_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['directions_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['directions_list']['iteration']++;
?>
        <option value = "<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['course']['directions_ID'] == $this->_tpl_vars['key']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
       </select>
     <?php else: ?>
       <?php echo $this->_tpl_vars['T_DIRECTIONS_PATHS'][$this->_tpl_vars['course']['directions_ID']]; ?>

     <?php endif; ?>
      </td>
    <?php endforeach; else: ?>
     <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
    <?php endif; unset($_from); ?>
    </table>
<!--/ajax:coursesTable-->
   <?php $this->_smarty_vars['capture']['t_courses_to_directions_code'] = ob_get_contents(); ob_end_clean(); ?>
  <?php endif; ?>

  <?php ob_start(); ?>
   <div class = "tabber">
    <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'settings','title' => (@_CATEGORYSETTINGS),'data' => $this->_smarty_vars['capture']['t_direction_settings_code'],'image' => '32x32/categories.png'), $this);?>

   <?php if ($_GET['edit_direction']): ?>
    <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'lessons','title' => (@_EDITLESSONSDIRECTION),'data' => $this->_smarty_vars['capture']['t_lessons_to_directions_code'],'image' => '32x32/lessons.png'), $this);?>

    <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'courses','title' => (@_EDITCOURSESDIRECTION),'data' => $this->_smarty_vars['capture']['t_courses_to_directions_code'],'image' => '32x32/courses.png'), $this);?>

   <?php endif; ?>
   </div>
  <?php $this->_smarty_vars['capture']['t_direction_code'] = ob_get_contents(); ob_end_clean(); ?>

  <?php if ($_GET['add_direction']): ?>
   <?php echo smarty_function_eF_template_printBlock(array('title' => @_NEWDIRECTIONOPTIONS,'data' => $this->_smarty_vars['capture']['t_direction_code'],'image' => '32x32/categories.png'), $this);?>

  <?php else: ?>
   <?php echo smarty_function_eF_template_printBlock(array('title' => (@_DIRECTIONOPTIONSFOR)." <span class = 'innerTableName'>&quot;".($this->_tpl_vars['T_DIRECTIONS_FORM']['name']['value'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_direction_code'],'image' => '32x32/categories.png'), $this);?>

  <?php endif; ?>

 <?php else: ?>
  <?php ob_start(); ?>
   <?php if ($this->_tpl_vars['_change_']): ?>
    <div class = "headerTools">
     <span>
      <img src = "images/16x16/add.png" title = "<?php echo @_NEWDIRECTION; ?>
" alt = "<?php echo @_NEWDIRECTION; ?>
">
      <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=directions&add_direction=1" title = "<?php echo @_NEWDIRECTION; ?>
" ><?php echo @_NEWDIRECTION; ?>
</a>
     </span>
    </div>
   <?php endif; ?>
    <table border = "0" width = "100%" class = "sortedTable" sortBy = "0">
     <tr class = "topTitle">
      <td class = "topTitle" name = "name"><?php echo @_NAME; ?>
</td>
      <td class = "topTitle" name = "pathString"><?php echo @_PARENTDIRECTIONS; ?>
</td>
      <td class = "topTitle centerAlign" name = "lessons"><?php echo @_LESSONS; ?>
</td>
      <td class = "topTitle centerAlign" name = "lessons"><?php echo @_COURSES; ?>
</td>
      <td class = "topTitle centerAlign"><?php echo @_ACTIVE2; ?>
</td>
     <?php if ($this->_tpl_vars['_change_']): ?>
      <td class = "topTitle centerAlign"><?php echo @_OPERATIONS; ?>
</td>
     <?php endif; ?>
     </tr>
   <?php $_from = $this->_tpl_vars['T_DIRECTIONS_DATA']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['directions_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['directions_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['direction']):
        $this->_foreach['directions_list']['iteration']++;
?>
     <tr id="row_<?php echo $this->_tpl_vars['direction']['id']; ?>
" class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['direction']['active']): ?>deactivatedTableElement<?php endif; ?>">
      <td><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=directions&edit_direction=<?php echo $this->_tpl_vars['direction']['id']; ?>
" class = "editLink"><span id="column_<?php echo $this->_tpl_vars['direction']['id']; ?>
" <?php if (! $this->_tpl_vars['direction']['active']): ?>style="color:red"<?php endif; ?>><?php echo $this->_tpl_vars['direction']['name']; ?>
</span></a></td>
      <td><?php echo $this->_tpl_vars['direction']['pathString']; ?>
</td>
      <td class = "centerAlign"><?php echo $this->_tpl_vars['direction']['lessons']; ?>
</td>
      <td class = "centerAlign"><?php echo $this->_tpl_vars['direction']['courses']; ?>
</td>
      <td class = "centerAlign">
     <?php if ($this->_tpl_vars['direction']['active'] == 1): ?>
      <?php if ($this->_tpl_vars['direction']['lessons'] > 0 || $this->_tpl_vars['direction']['courses'] > 0): ?>
       <img class = "ajaxHandle inactiveImage" src = "images/16x16/trafficlight_green.png" alt = "<?php echo @_YOUCANNOTDEACTIVATEANONEMPTYDIRECTION; ?>
" title = "<?php echo @_YOUCANNOTDEACTIVATEANONEMPTYDIRECTION; ?>
">
      <?php else: ?>
       <img class = "ajaxHandle" src = "images/16x16/trafficlight_green.png" alt = "<?php echo @_DEACTIVATE; ?>
" title = "<?php echo @_DEACTIVATE; ?>
" <?php if ($this->_tpl_vars['_change_']): ?>onclick = "activateCategory(this, '<?php echo $this->_tpl_vars['direction']['id']; ?>
')"<?php endif; ?>>
      <?php endif; ?>
     <?php else: ?>
       <img class = "ajaxHandle" src = "images/16x16/trafficlight_red.png" alt = "<?php echo @_ACTIVATE; ?>
" title = "<?php echo @_ACTIVATE; ?>
" <?php if ($this->_tpl_vars['_change_']): ?>onclick = "activateCategory(this, '<?php echo $this->_tpl_vars['direction']['id']; ?>
')"<?php endif; ?>>
     <?php endif; ?>
      </td>
     <?php if ($this->_tpl_vars['_change_']): ?>
      <td class = "centerAlign">
       <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=directions&edit_direction=<?php echo $this->_tpl_vars['direction']['id']; ?>
" class = "editLink"><img border = "0" src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" alt = "<?php echo @_EDIT; ?>
" /></a>
      <?php if ($this->_tpl_vars['direction']['lessons'] > 0 || $this->_tpl_vars['direction']['courses'] > 0): ?>
       <img class = "ajaxHandle inactiveImage" src = "images/16x16/error_delete.png" title = "<?php echo @_YOUCANNOTDELETEANONEMPTYDIRECTION; ?>
" alt = "<?php echo @_YOUCANNOTDELETEANONEMPTYDIRECTION; ?>
" onclick = "alert('<?php echo @_YOUCANNOTDELETEANONEMPTYDIRECTION; ?>
')"/>
      <?php else: ?>
       <img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_AREYOUSUREYOUWANTTODELETEDIRECTION; ?>
')) deleteCategory(this, '<?php echo $this->_tpl_vars['direction']['id']; ?>
')"/>
      <?php endif; ?>
      </td>
     <?php endif; ?>
     </tr>
   <?php endforeach; else: ?>
     <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
   <?php endif; unset($_from); ?>
    </table>
  <?php $this->_smarty_vars['capture']['t_directions_code'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo smarty_function_eF_template_printBlock(array('title' => @_UPDATEDIRECTIONS,'data' => $this->_smarty_vars['capture']['t_directions_code'],'image' => '32x32/categories.png','help' => 'Categories'), $this);?>

 <?php endif; ?>


 </td></tr>
<?php $this->_smarty_vars['capture']['moduleDirections'] = ob_get_contents(); ob_end_clean(); ?>