<?php /* Smarty version 2.6.26, created on 2012-05-16 00:42:29
         compiled from includes/personal/user_lessons.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'includes/personal/user_lessons.tpl', 12, false),array('function', 'eF_template_printBlock', 'includes/personal/user_lessons.tpl', 80, false),array('modifier', 'sizeof', 'includes/personal/user_lessons.tpl', 61, false),)), $this); ?>
<?php ob_start(); ?>
     <tr class = "topTitle">
   <td class = "topTitle" name = "name"><?php echo @_LESSON; ?>
</td>
   <td class = "topTitle" name = "directions_ID"><?php echo @_PARENTDIRECTIONS; ?>
</td>
   <td class = "topTitle centerAlign" name = "active_in_lesson"><?php echo @_ENABLED; ?>
</td>
   <td class = "topTitle" name = "user_type"><?php echo @_USERTYPE; ?>
</td>
   <td class = "topTitle centerAlign" name = "completed"><?php echo @_COMPLETED; ?>
</td>
   <td class = "topTitle centerAlign" name = "score"><?php echo @_SCORE; ?>
</td>
   <td class = "topTitle centerAlign" name = "has_lesson"><?php echo @_STATUS; ?>
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
    <?php if ($this->_tpl_vars['_change_lessons_'] && ! $this->_tpl_vars['T_IS_SUPERVISOR']): ?>
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
         <td>
          <?php echo $this->_tpl_vars['T_DIRECTION_PATHS'][$this->_tpl_vars['lesson']['directions_ID']]; ?>

         </td>
   <td class = "centerAlign">
    <?php if (! $this->_tpl_vars['lesson']['active_in_lesson'] && $this->_tpl_vars['lesson']['has_lesson']): ?>
              <img src = "images/16x16/warning.png" title = "<?php echo @_APPLICATIONPENDING; ?>
" alt = "<?php echo @_APPLICATIONPENDING; ?>
" <?php if ($this->_tpl_vars['_change_lessons_']): ?>class = "ajaxHandle" onclick = "toggleUserAccess(this, '<?php echo $this->_tpl_vars['lesson']['id']; ?>
', 'lesson')"<?php endif; ?>/>
             <?php elseif ($this->_tpl_vars['lesson']['has_lesson']): ?>
              <img src = "images/16x16/success.png" title = "<?php echo @_USERACCESSGRANTED; ?>
" alt = "<?php echo @_USERACCESSGRANTED; ?>
" <?php if ($this->_tpl_vars['_change_lessons_']): ?>class = "ajaxHandle" onclick = "toggleUserAccess(this, '<?php echo $this->_tpl_vars['lesson']['id']; ?>
', 'lesson')"<?php endif; ?>/>
             <?php endif; ?>
   </td>
         <td>
         <?php if ($this->_tpl_vars['_change_lessons_']): ?>
          <span style = "display:none"><?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['lesson']['user_type']]; ?>
</span>
                <select name = "lesson_type_<?php echo $this->_tpl_vars['lesson']['id']; ?>
" id = "lesson_type_<?php echo $this->_tpl_vars['lesson']['id']; ?>
" onchange = "$('lesson_<?php echo $this->_tpl_vars['lesson']['id']; ?>
').checked = true;ajaxPost('<?php echo $this->_tpl_vars['lesson']['id']; ?>
', this, 'lessonsTable');">
              <?php $_from = $this->_tpl_vars['T_ROLES_ARRAY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['roles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['roles_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['role_key'] => $this->_tpl_vars['role_item']):
        $this->_foreach['roles_list']['iteration']++;
?>
                    <option value = "<?php echo $this->_tpl_vars['role_key']; ?>
" <?php if (! $this->_tpl_vars['lesson']['user_type']): ?><?php if (( $this->_tpl_vars['T_EDITED_USER_TYPE'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?><?php else: ?><?php if (( $this->_tpl_vars['lesson']['user_type'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['role_item']; ?>
</option>
              <?php endforeach; endif; unset($_from); ?>
                </select>
         <?php else: ?>
             <?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['lesson']['user_type']]; ?>

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
         <td class = "centerAlign">
       <?php if ($this->_tpl_vars['_change_lessons_']): ?>
              <input class = "inputCheckBox" type="checkbox" id="lesson_<?php echo $this->_tpl_vars['lesson']['id']; ?>
" name="<?php echo $this->_tpl_vars['lesson']['id']; ?>
" <?php if ($this->_tpl_vars['lesson']['has_lesson'] == 1): ?>checked<?php endif; ?> onclick ="ajaxPost('<?php echo $this->_tpl_vars['lesson']['id']; ?>
', this, 'lessonsTable');">
       <?php else: ?>
        <img src = "images/16x16/success.png" alt = "<?php echo @_LESSONUSER; ?>
" title = "<?php echo @_LESSONUSER; ?>
">
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
 <script>
  translationsToJS['_USERACCESSGRANTED'] = '<?php echo @_USERACCESSGRANTED; ?>
';
  translationsToJS['_APPLICATIONPENDING'] = '<?php echo @_APPLICATIONPENDING; ?>
';
 </script>
 <?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'lessonsTable'): ?>
<!--ajax:lessonsTable-->
  <table style = "width:100%" id = "lessonsTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" class = "sortedTable" useAjax = "1" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $_GET['user']; ?>
&op=user_lessons&">
  <?php echo $this->_smarty_vars['capture']['lessons_list']; ?>

  </table>
<!--/ajax:lessonsTable-->
 <?php endif; ?>

<?php $this->_smarty_vars['capture']['t_lessons_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php echo smarty_function_eF_template_printBlock(array('title' => @_LESSONS,'data' => $this->_smarty_vars['capture']['t_lessons_code'],'image' => '32x32/lessons.png'), $this);?>
