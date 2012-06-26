<?php /* Smarty version 2.6.26, created on 2012-05-16 07:13:15
         compiled from includes/personal/user_groups.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'includes/personal/user_groups.tpl', 11, false),array('function', 'eF_template_printBlock', 'includes/personal/user_groups.tpl', 36, false),)), $this); ?>
<?php ob_start(); ?>
<!--ajax:groupsTable-->
 <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "0" id = "groupsTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['REQUEST_URI']; ?>
&">
  <tr class = "topTitle">
   <td class = "topTitle" name = "name"><?php echo @_NAME; ?>
</td>
   <td class = "topTitle" name = "description"><?php echo @_DESCRIPTION; ?>
</td>
   <td class = "topTitle centerAlign" name = "partof"><?php echo @_CHECK; ?>
</td>
  </tr>
 <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_groups_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_groups_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['group']):
        $this->_foreach['users_to_groups_list']['iteration']++;
?>
  <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['group']['active']): ?>deactivatedTableElement<?php endif; ?>">
   <td>
    <?php if ($this->_tpl_vars['_change_groups_']): ?>
     <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=user_groups&edit_user_group=<?php echo $this->_tpl_vars['group']['id']; ?>
" class = "editLink"><?php echo $this->_tpl_vars['group']['name']; ?>
</a>
    <?php else: ?>
     <?php echo $this->_tpl_vars['group']['name']; ?>

    <?php endif; ?>
   </td>
   <td><?php echo $this->_tpl_vars['group']['description']; ?>
</td>
   <td class = "centerAlign">
   <?php if (! $this->_tpl_vars['_change_groups_'] && ! ( $this->_tpl_vars['_self_groups_'] && $this->_tpl_vars['group']['self_enroll'] )): ?>
    <?php if ($this->_tpl_vars['group']['partof'] == 1): ?>
     <img src = "images/16x16/success.png" alt = "<?php echo @_PARTOFTHISGROUP; ?>
" title = "<?php echo @_PARTOFTHISGROUP; ?>
" />
    <?php endif; ?>
   <?php else: ?>
    <input class = "inputCheckBox" type = "checkbox" id = "group_<?php echo $this->_tpl_vars['group']['id']; ?>
" name = "<?php echo $this->_tpl_vars['group']['id']; ?>
" onclick ="ajaxUserGroupPost('<?php echo $this->_tpl_vars['group']['id']; ?>
', this, 'groupsTable');" <?php if ($this->_tpl_vars['group']['partof'] == 1): ?>checked<?php endif; ?>>
   <?php endif; ?>
   </td>
  </tr>
 <?php endforeach; else: ?>
  <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "3"><?php echo @_NODATAFOUND; ?>
</td></tr>
 <?php endif; unset($_from); ?>
 </table>
<!--/ajax:groupsTable-->
<?php $this->_smarty_vars['capture']['t_users_to_groups_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo smarty_function_eF_template_printBlock(array('title' => @_GROUPS,'data' => $this->_smarty_vars['capture']['t_users_to_groups_code'],'image' => '32x32/users.png'), $this);?>
