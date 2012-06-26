<?php /* Smarty version 2.6.26, created on 2012-05-16 00:41:52
         compiled from includes/personal.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/personal.tpl', 91, false),)), $this); ?>
<?php ob_start(); ?>
 <?php if ($this->_tpl_vars['T_OP'] == 'dashboard'): ?>
  <?php if ($this->_tpl_vars['T_SOCIAL_INTERFACE']): ?>
   <?php ob_start(); ?>
    <table class = "horizontalBlock">
     <tr><td>
    <?php if ($_SESSION['s_type'] == 'administrator'): ?>
       <span class = "rightOption smallHeader">
        <img class = "ajaxHandle" src = "images/32x32/home.png" title = "<?php echo @_HOME; ?>
" alt = "<?php echo @_HOME; ?>
">
        <a class = "titleLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=control_panel" title = "<?php echo @_HOME; ?>
"><?php echo @_HOME; ?>
</a>
       </span>
    <?php endif; ?>
       <span class = "leftOption">#filter:login-<?php echo $this->_tpl_vars['T_CURRENT_USER']->user['login']; ?>
#&nbsp;</span>







      </td>
     </tr>
    </table>
   <?php $this->_smarty_vars['capture']['t_status_change_interface'] = ob_get_contents(); ob_end_clean(); ?>
   <?php echo $this->_smarty_vars['capture']['t_status_change_interface']; ?>

  <?php endif; ?>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "social.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <?php elseif ($this->_tpl_vars['T_OP'] == 'profile' || $this->_tpl_vars['T_OP'] == 'user_groups' || $this->_tpl_vars['T_OP'] == 'mapped_accounts' || $this->_tpl_vars['T_OP'] == 'payments'): ?>
  <div class = "tabber">
  <?php if (in_array ( 'profile' , $this->_tpl_vars['T_ACCOUNT_OPERATIONS'] )): ?>
   <div class = "tabbertab <?php if ($this->_tpl_vars['T_OP'] == 'profile'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_PERSONALDATA; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/profile.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
  <?php endif; ?>
  <?php if (in_array ( 'user_groups' , $this->_tpl_vars['T_ACCOUNT_OPERATIONS'] )): ?>
   <div class = "tabbertab <?php if ($this->_tpl_vars['T_OP'] == 'user_groups'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_GROUPS; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/user_groups.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
  <?php endif; ?>
  <?php if (in_array ( 'mapped_accounts' , $this->_tpl_vars['T_ACCOUNT_OPERATIONS'] )): ?>
   <div class = "tabbertab <?php if ($this->_tpl_vars['T_OP'] == 'mapped_accounts'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_MAPPEDACCOUNTS; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/mapped_accounts.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
  <?php endif; ?>
  <?php if (in_array ( 'payments' , $this->_tpl_vars['T_ACCOUNT_OPERATIONS'] )): ?>
   <div class = "tabbertab <?php if ($this->_tpl_vars['T_OP'] == 'payments'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_PAYMENTS; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/payments.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
  <?php endif; ?>
  </div>
 <?php elseif ($this->_tpl_vars['T_OP'] == 'user_courses' || $this->_tpl_vars['T_OP'] == 'user_lessons' || $this->_tpl_vars['T_OP'] == 'certificates' || $this->_tpl_vars['T_OP'] == 'user_form'): ?>
  <div class = "tabber">
  <?php if (in_array ( 'user_courses' , $this->_tpl_vars['T_LEARNING_OPERATIONS'] )): ?>
   <div class = "tabbertab <?php if ($this->_tpl_vars['T_OP'] == 'user_courses'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_COURSES; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/user_courses.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
  <?php endif; ?>
  <?php if (in_array ( 'user_lessons' , $this->_tpl_vars['T_LEARNING_OPERATIONS'] )): ?>
   <div class = "tabbertab <?php if ($this->_tpl_vars['T_OP'] == 'user_lessons'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_LESSONS; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/user_lessons.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
  <?php endif; ?>
  <?php if (in_array ( 'certificates' , $this->_tpl_vars['T_LEARNING_OPERATIONS'] )): ?>
   <div class = "tabbertab <?php if ($this->_tpl_vars['T_OP'] == 'certificates'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_CERTIFICATES; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/certificates.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
  <?php endif; ?>
  <?php if (in_array ( 'user_form' , $this->_tpl_vars['T_LEARNING_OPERATIONS'] )): ?>
   <div class = "tabbertab <?php if ($this->_tpl_vars['T_OP'] == 'user_form'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_USERFORM; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/user_form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
  <?php endif; ?>
  </div>
 <?php elseif ($this->_tpl_vars['T_OP'] == 'placements' || $this->_tpl_vars['T_OP'] == 'history' || $this->_tpl_vars['T_OP'] == 'skills' || $this->_tpl_vars['T_OP'] == 'evaluations' || $this->_tpl_vars['T_OP'] == 'org_form'): ?>
  <div class = "tabber">
   <div class = "tabbertab <?php if ($this->_tpl_vars['T_OP'] == 'org_form'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_ORGANIZATIONALDATA; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/org_form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
   <div class = "tabbertab <?php if ($this->_tpl_vars['T_OP'] == 'placements'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_PLACEMENTS; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/placements.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
   <div class = "tabbertab <?php if ($this->_tpl_vars['T_OP'] == 'skills'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_SKILLS; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/skills.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
   <div class = "tabbertab <?php if ($this->_tpl_vars['T_OP'] == 'evaluations'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_EVALUATIONS; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/evaluations.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
   <div class = "tabbertab <?php if ($this->_tpl_vars['T_OP'] == 'history'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_HISTORY; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/history.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
  </div>
 <?php elseif ($this->_tpl_vars['T_OP'] == 'files'): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/files.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <?php endif; ?>
<?php $this->_smarty_vars['capture']['t_personal_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php if ($_GET['show_avatars_list']): ?>
 <table width = "100%" >
  <tr>
  <?php $_from = $this->_tpl_vars['T_SYSTEM_AVATARS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['avatars_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['avatars_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['avatars_list']['iteration']++;
?>
   <?php if (($this->_foreach['avatars_list']['iteration'] <= 1)): ?><?php $this->assign('item', "unknown_small.png"); ?><?php endif; ?>
   <td class = "centerAlign ">
    <img src = "<?php echo @G_SYSTEMAVATARSURL; ?>
<?php echo $this->_tpl_vars['item']; ?>
" class = "ajaxHandle" alt = "<?php echo $this->_tpl_vars['item']; ?>
" title = "<?php echo $this->_tpl_vars['item']; ?>
" onclick = "parent.$('select_avatar').selectedIndex = '<?php echo ($this->_foreach['avatars_list']['iteration']-1); ?>
';parent.$('popup_close').onclick();window.close();"/>
    <br/><?php echo $this->_tpl_vars['item']; ?>

   </td>
   <?php if ($this->_foreach['avatars_list']['iteration'] % 4 == 0): ?></tr><tr><?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
  </tr>
 </table>
<?php elseif ($_GET['add_placement'] || $_GET['edit_placement']): ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/placements.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($_GET['add_evaluation'] || $_GET['edit_evaluation']): ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/evaluations.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['T_OP'] == 'user_form' && $_GET['printable']): ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal/user_form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
 <?php echo smarty_function_eF_template_printBlock(array('title' => @_PERSONALDATA,'data' => $this->_smarty_vars['capture']['t_personal_code'],'image' => '32x32/user.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS']), $this);?>

<?php endif; ?>