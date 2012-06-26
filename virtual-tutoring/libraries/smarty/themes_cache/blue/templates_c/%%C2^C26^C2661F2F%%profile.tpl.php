<?php /* Smarty version 2.6.26, created on 2012-05-16 00:41:52
         compiled from includes/personal/profile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printForm', 'includes/personal/profile.tpl', 2, false),array('function', 'eF_template_printBlock', 'includes/personal/profile.tpl', 4, false),)), $this); ?>
<?php ob_start(); ?>
 <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_PROFILE_FORM']), $this);?>

<?php $this->_smarty_vars['capture']['t_personal_form_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo smarty_function_eF_template_printBlock(array('title' => @_PERSONALDATA,'data' => $this->_smarty_vars['capture']['t_personal_form_code'],'image' => '32x32/user.png'), $this);?>
