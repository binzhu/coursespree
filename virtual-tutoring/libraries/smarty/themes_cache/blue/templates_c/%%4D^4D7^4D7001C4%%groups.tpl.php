<?php /* Smarty version 2.6.26, created on 2012-05-16 00:41:37
         compiled from includes/groups.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printForm', 'includes/groups.tpl', 10, false),array('function', 'cycle', 'includes/groups.tpl', 23, false),array('function', 'eF_template_printBlock', 'includes/groups.tpl', 97, false),)), $this); ?>
<?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] == 'change'): ?>
 <?php $this->assign('_change_', true); ?>
<?php endif; ?>

<?php ob_start(); ?>
 <tr><td class = "moduleCell">
 <?php if ($_GET['add_user_group'] || $_GET['edit_user_group']): ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_USERGROUPS_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['t_group_form'] = ob_get_contents(); ob_end_clean(); ?>

  <?php ob_start(); ?>
  <?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'usersTable'): ?>
<!--ajax:usersTable-->
  <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "2" order="desc" id = "usersTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=user_groups&edit_user_group=<?php echo $_GET['edit_user_group']; ?>
&">
   <tr class = "topTitle">
    <td class = "topTitle" name = "login"><?php echo @_USER; ?>
</td>
    <td class = "topTitle" name = "user_type"><?php echo @_USERTYPE; ?>
</td>
    <td class = "topTitle centerAlign" name = "has_group"><?php echo @_CHECK; ?>
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
?ctg=personal&user=<?php echo $this->_tpl_vars['user']['login']; ?>
" class = "editLink" <?php if (( $this->_tpl_vars['user']['pending'] == 1 )): ?>style="color:red;"<?php endif; ?>><span id="column_<?php echo $this->_tpl_vars['user']['login']; ?>
" <?php if (! $this->_tpl_vars['user']['active']): ?>style="color:red;"<?php endif; ?>>#filter:login-<?php echo $this->_tpl_vars['user']['login']; ?>
#</span></a></td>
    <td><?php if ($this->_tpl_vars['user']['user_types_ID']): ?><?php echo $this->_tpl_vars['T_ROLES'][$this->_tpl_vars['user']['user_types_ID']]; ?>
<?php else: ?><?php echo $this->_tpl_vars['T_ROLES'][$this->_tpl_vars['user']['user_type']]; ?>
<?php endif; ?></td>
    <td class = "centerAlign">
   <?php if ($this->_tpl_vars['_change_']): ?>
     <input class = "inputCheckbox" type = "checkbox" id = "checked_<?php echo $this->_tpl_vars['user']['login']; ?>
" name = "checked_<?php echo $this->_tpl_vars['user']['login']; ?>
" onclick = "ajaxPost('<?php echo $this->_tpl_vars['user']['login']; ?>
', this, 'usersTable');" <?php if ($this->_tpl_vars['user']['has_group']): ?>checked = "checked"<?php endif; ?> />
   <?php else: ?>
     <?php if ($this->_tpl_vars['user']['has_group']): ?><img src = "images/16x16/success.png" alt = "<?php echo @_GROUPUSER; ?>
" title = "<?php echo @_GROUPUSER; ?>
"><?php endif; ?>
   <?php endif; ?>
    </td>
   </tr>
  <?php endforeach; endif; unset($_from); ?>
  </table>
<!--/ajax:usersTable-->
  <?php endif; ?>
  <?php $this->_smarty_vars['capture']['t_group_users_code'] = ob_get_contents(); ob_end_clean(); ?>

  <?php ob_start(); ?>
  <div class = "headerTools">
   <span>
    <img src = "images/16x16/users.png" title = "<?php echo @_ASSIGNLESSONSTOGROUPUSERS; ?>
" alt = "<?php echo @_ASSIGNLESSONSTOGROUPUSERS; ?>
">
    <a href = "javascript:void(0)" onclick = "assignToGroupUsers(this, 'lessons')" title = "<?php echo @_ASSIGNLESSONSTOGROUPUSERS; ?>
" ><?php echo @_ASSIGNLESSONSTOGROUPUSERS; ?>
</a>
   </span>
  </div>
<!--ajax:lessonsTable-->
  <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "2" id = "lessonsTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "administrator.php?ctg=user_groups&edit_user_group=<?php echo $_GET['edit_user_group']; ?>
&">
   <tr class = "topTitle">
    <td name = "name" class = "topTitle"><?php echo @_NAME; ?>
</td>
    <td name = "directions_ID" class = "topTitle"><?php echo @_PARENTDIRECTIONS; ?>
</td>

    <td name = "price" class = "topTitle centerAlign"><?php echo @_PRICE; ?>
</td>

  <?php if ($this->_tpl_vars['_change_']): ?>
    <td name = "in_group" class = "topTitle centerAlign"><?php echo @_CHECK; ?>
</td>
  <?php endif; ?>
   </tr>
  <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['lesson']):
        $this->_foreach['users_to_lessons_list']['iteration']++;
?>
   <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['lesson']['active']): ?>deactivatedTableElement<?php endif; ?>">
    <td><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lessons&edit_lesson=<?php echo $this->_tpl_vars['lesson']['id']; ?>
" class = "editLink"><?php echo $this->_tpl_vars['lesson']['name']; ?>
</a></td>
    <td><?php echo $this->_tpl_vars['lesson']['direction_name']; ?>
</td>

    <td class = "centerAlign"><?php if ($this->_tpl_vars['course']['price'] == 0): ?><?php echo @_FREECOURSE; ?>
<?php else: ?><?php echo $this->_tpl_vars['course']['price_string']; ?>
<?php endif; ?></td>

  <?php if (( $this->_tpl_vars['_change_'] )): ?>
    <td class = "centerAlign">
     <input class = "inputCheckBox" type = "checkbox" id = "lesson_<?php echo $this->_tpl_vars['lesson']['id']; ?>
" name = "lesson_<?php echo $this->_tpl_vars['lesson']['id']; ?>
" onclick ="ajaxPost('<?php echo $this->_tpl_vars['lesson']['id']; ?>
', this, 'lessonsTable');" <?php if ($this->_tpl_vars['lesson']['in_group']): ?>checked<?php endif; ?>>
    </td>
  <?php endif; ?>
   </tr>
  <?php endforeach; else: ?>
   <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "6"><?php echo @_NODATAFOUND; ?>
</td></tr>
  <?php endif; unset($_from); ?>
  </table>
<!--/ajax:lessonsTable-->
  <?php $this->_smarty_vars['capture']['t_group_lessons_code'] = ob_get_contents(); ob_end_clean(); ?>



 <?php ob_start(); ?>
  <div class = "headerTools">
   <span>
    <img src = "images/16x16/users.png" title = "<?php echo @_ASSIGNCOURSESTOGROUPUSERS; ?>
" alt = "<?php echo @_ASSIGNCOURSESTOGROUPUSERS; ?>
">
    <a href = "javascript:void(0)" onclick = "assignToGroupUsers(this, 'courses')" title = "<?php echo @_ASSIGNCOURSESTOGROUPUSERS; ?>
" ><?php echo @_ASSIGNCOURSESTOGROUPUSERS; ?>
</a>
   </span>
  </div>

  <?php $this->assign('courses_url', ($_SERVER['PHP_SELF'])."?ctg=user_groups&edit_user_group=".($_GET['edit_user_group'])."&"); ?>
  <?php $this->assign('_change_handles_', $this->_tpl_vars['_change_']); ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/common/courses_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <?php $this->_smarty_vars['capture']['t_group_courses_code'] = ob_get_contents(); ob_end_clean(); ?>


  <?php ob_start(); ?>
   <div class = "tabber">
    <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'groups','title' => @_GROUPOPTIONS,'data' => $this->_smarty_vars['capture']['t_group_form'],'image' => '32x32/generic.png','options' => $this->_tpl_vars['T_STATS_LINK']), $this);?>


   <?php if ($_GET['edit_user_group']): ?>
    <script>var editGroup = '<?php echo $_GET['edit_user_group']; ?>
';</script>
    <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'users','title' => @_GROUPUSERS,'data' => $this->_smarty_vars['capture']['t_group_users_code'],'image' => '32x32/users.png'), $this);?>

    <?php if ($this->_tpl_vars['T_CONFIGURATION']['lesson_enroll']): ?>
    <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'lessons','title' => @_GROUPLESSONS,'data' => $this->_smarty_vars['capture']['t_group_lessons_code'],'image' => '32x32/lessons.png'), $this);?>

    <?php endif; ?>
    <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'courses','title' => @_GROUPCOURSES,'data' => $this->_smarty_vars['capture']['t_group_courses_code'],'image' => '32x32/courses.png'), $this);?>

   <?php endif; ?>
   </div>
  <?php $this->_smarty_vars['capture']['t_new_group_code'] = ob_get_contents(); ob_end_clean(); ?>
  <?php if ($_GET['add_user_group']): ?>
    <?php echo smarty_function_eF_template_printBlock(array('title' => @_NEWGROUP,'data' => $this->_smarty_vars['capture']['t_new_group_code'],'image' => '32x32/users.png'), $this);?>

  <?php else: ?>
    <?php echo smarty_function_eF_template_printBlock(array('title' => (@_OPTIONSFORGROUP)." <span class = 'innerTableName'>&quot;".($this->_tpl_vars['T_CURRENT_GROUP']->group['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_new_group_code'],'image' => '32x32/users.png'), $this);?>

  <?php endif; ?>

 <?php else: ?>
  <?php ob_start(); ?>
  <script>var activate = '<?php echo @_ACTIVATE; ?>
';var deactivate = '<?php echo @_DEACTIVATE; ?>
';</script>
  <?php if ($this->_tpl_vars['_change_']): ?>
   <div class = "headerTools">
    <span>
     <img src = "images/16x16/add.png" title = "<?php echo @_NEWGROUP; ?>
" alt = "<?php echo @_NEWGROUP; ?>
">
     <a href = "administrator.php?ctg=user_groups&add_user_group=1" title = "<?php echo @_NEWGROUP; ?>
" ><?php echo @_NEWGROUP; ?>
</a>
    </span>






   </div>

   <?php $this->assign('change_groups', 1); ?>
  <?php endif; ?>
  <?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'groupsTable'): ?>
<!--ajax:groupsTable-->
   <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "2" order="desc" id = "groupsTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=user_groups&">
    <tr class = "topTitle">
     <td class = "topTitle" name = "name"><?php echo @_NAME; ?>
</td>
     <td class = "topTitle" description = "description"><?php echo @_DESCRIPTION; ?>
</td>
     <td class = "topTitle centerAlign" name = "num_users"><?php echo @_USERS; ?>
</td>
     <td class = "topTitle centerAlign" name = "active"><?php echo @_ACTIVE2; ?>
</td>
    <?php if ($this->_tpl_vars['change_groups']): ?>
     <td class = "topTitle centerAlign noSort"><?php echo @_OPERATIONS; ?>
</td>
    <?php endif; ?>
    </tr>
  <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['group_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['group_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['group']):
        $this->_foreach['group_list']['iteration']++;
?>
    <tr id="row_<?php echo $this->_tpl_vars['group']['id']; ?>
" class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['group']['active']): ?>deactivatedTableElement<?php endif; ?>">
     <td><a href = "administrator.php?ctg=user_groups&edit_user_group=<?php echo $this->_tpl_vars['group']['id']; ?>
" class = "editLink">
      <span id="column_<?php echo $this->_tpl_vars['group']['id']; ?>
" <?php if (! $this->_tpl_vars['group']['active']): ?>style="color:red"<?php endif; ?>>



       <?php echo $this->_tpl_vars['group']['name']; ?>


      </span></a></td>
     <td><?php echo $this->_tpl_vars['group']['description']; ?>
</td>
     <td class = "centerAlign"><?php echo $this->_tpl_vars['group']['num_users']; ?>
</td>
     <td class = "centerAlign">
      <?php if ($this->_tpl_vars['group']['active'] == 1): ?>
       <img class = "ajaxHandle" src = "images/16x16/trafficlight_green.png" alt = "<?php echo @_DEACTIVATE; ?>
" title = "<?php echo @_DEACTIVATE; ?>
" <?php if ($this->_tpl_vars['change_groups']): ?>onclick = "activateGroup(this, '<?php echo $this->_tpl_vars['group']['id']; ?>
')"<?php endif; ?>>
      <?php else: ?>
       <img class = "ajaxHandle" src = "images/16x16/trafficlight_red.png" alt = "<?php echo @_ACTIVATE; ?>
" title = "<?php echo @_ACTIVATE; ?>
" <?php if ($this->_tpl_vars['change_groups']): ?>onclick = "activateGroup(this, '<?php echo $this->_tpl_vars['group']['id']; ?>
')"<?php endif; ?>>
      <?php endif; ?>
     </td>
    <?php if ($this->_tpl_vars['change_groups']): ?>
     <td class = "centerAlign">
       <a href = "administrator.php?ctg=user_groups&edit_user_group=<?php echo $this->_tpl_vars['group']['id']; ?>
" ><img border = "0" src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" alt = "<?php echo @_EDIT; ?>
" /></a>
       <img class = "ajaxHandle" border = "0" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_AREYOUSUREYOUWANTTODELETEGROUP; ?>
')) deleteGroup(this, '<?php echo $this->_tpl_vars['group']['id']; ?>
');"/>
     </td>
    <?php endif; ?>
    </tr>
  <?php endforeach; else: ?>
    <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
  <?php endif; unset($_from); ?>
   </table>
<!--/ajax:groupsTable-->
  <?php endif; ?>
  <?php $this->_smarty_vars['capture']['t_groups_code'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo smarty_function_eF_template_printBlock(array('title' => @_UPDATEGROUPS,'data' => $this->_smarty_vars['capture']['t_groups_code'],'image' => '32x32/users.png','help' => 'User_groups'), $this);?>

 <?php endif; ?>
 </td></tr>
<?php $this->_smarty_vars['capture']['moduleGroups'] = ob_get_contents(); ob_end_clean(); ?>