<?php /* Smarty version 2.6.26, created on 2012-05-15 11:51:07
         compiled from administrator.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'administrator.tpl', 28, false),array('modifier', 'formatLogin', 'administrator.tpl', 122, false),array('function', 'eF_template_printBlock', 'administrator.tpl', 248, false),array('function', 'eF_template_printMessageBlock', 'administrator.tpl', 553, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language = "JavaScript" type = "text/javascript">
<?php if (( isset ( $this->_tpl_vars['T_REFRESH_SIDE'] ) )): ?>
    if (top.sideframe)
        <?php if (isset ( $this->_tpl_vars['T_PERSONAL_CTG'] )): ?>
            top.sideframe.location = "new_sidebar.php?sbctg=personal";
        <?php else: ?>
            top.sideframe.location = "new_sidebar.php?sbctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
";
        <?php endif; ?>
<?php endif; ?>

<?php if (( isset ( $this->_tpl_vars['T_RELOAD_ALL'] ) )): ?>
    top.location = top.location;
<?php endif; ?>





</script>


<?php if (! isset ( $_GET['print_preview'] ) && ! isset ( $_GET['print'] ) && ! isset ( $_GET['pdf'] )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a class = "titleLink" title="')) ? $this->_run_mod_handler('cat', true, $_tmp, @_HOME) : smarty_modifier_cat($_tmp, @_HOME)))) ? $this->_run_mod_handler('cat', true, $_tmp, '" href ="') : smarty_modifier_cat($_tmp, '" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=control_panel">') : smarty_modifier_cat($_tmp, '?ctg=control_panel">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_HOME) : smarty_modifier_cat($_tmp, @_HOME)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
<?php endif; ?>

<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'control_panel' )): ?>
 <?php if ($this->_tpl_vars['T_OP'] == 'search'): ?>
  <?php $this->assign('title', $this->_tpl_vars['title']); ?>
 <?php elseif (isset ( $this->_tpl_vars['T_OP_MODULE'] )): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=control_panel&op=') : smarty_modifier_cat($_tmp, '?ctg=control_panel&op=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_OP']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_OP'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_OP_MODULE']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_OP_MODULE'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php endif; ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/control_panel.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'modules' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=modules">') : smarty_modifier_cat($_tmp, '?ctg=modules">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_MODULES) : smarty_modifier_cat($_tmp, @_MODULES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/modules.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'payments' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=payments">') : smarty_modifier_cat($_tmp, '?ctg=payments">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_PAYMENTS) : smarty_modifier_cat($_tmp, @_PAYMENTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php ob_start(); ?>
  <tr><td class="moduleCell">
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/payments.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </td></tr>
    <?php $this->_smarty_vars['capture']['modulePayments'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'versionkey' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=versionkey">') : smarty_modifier_cat($_tmp, '?ctg=versionkey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_VERSIONKEY) : smarty_modifier_cat($_tmp, @_VERSIONKEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/versionkey.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'maintenance' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=maintenance">') : smarty_modifier_cat($_tmp, '?ctg=maintenance">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_MAINTENANCE) : smarty_modifier_cat($_tmp, @_MAINTENANCE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/maintenance.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'landing_page' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=landing_page">') : smarty_modifier_cat($_tmp, '?ctg=landing_page">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_LANDINGPAGE) : smarty_modifier_cat($_tmp, @_LANDINGPAGE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/landing_page.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'system_config' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=system_config">') : smarty_modifier_cat($_tmp, '?ctg=system_config">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_CONFIGURATIONVARIABLES) : smarty_modifier_cat($_tmp, @_CONFIGURATIONVARIABLES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/system_config.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'import_export' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=import_export">') : smarty_modifier_cat($_tmp, '?ctg=import_export">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EXPORTIMPORTDATA) : smarty_modifier_cat($_tmp, @_EXPORTIMPORTDATA)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/import_export.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'user_profile' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=user_profile">') : smarty_modifier_cat($_tmp, '?ctg=user_profile">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_CUSTOMIZEUSERSPROFILE) : smarty_modifier_cat($_tmp, @_CUSTOMIZEUSERSPROFILE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php if ($_GET['edit_field']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=user_profile&edit_field=') : smarty_modifier_cat($_tmp, '?ctg=user_profile&edit_field=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_field']) : smarty_modifier_cat($_tmp, $_GET['edit_field'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&type=') : smarty_modifier_cat($_tmp, '&type=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['type']) : smarty_modifier_cat($_tmp, $_GET['type'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITFIELD) : smarty_modifier_cat($_tmp, @_EDITFIELD)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php elseif ($_GET['add_field']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=user_profile&add_field=1&type=') : smarty_modifier_cat($_tmp, '?ctg=user_profile&add_field=1&type=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['type']) : smarty_modifier_cat($_tmp, $_GET['type'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ADDFIELD) : smarty_modifier_cat($_tmp, @_ADDFIELD)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php endif; ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/user_profile.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'news' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=news">') : smarty_modifier_cat($_tmp, '?ctg=news">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ANNOUNCEMENTS) : smarty_modifier_cat($_tmp, @_ANNOUNCEMENTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/news.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'backup' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=backup">') : smarty_modifier_cat($_tmp, '?ctg=backup">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_BACKUP) : smarty_modifier_cat($_tmp, @_BACKUP)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' - ') : smarty_modifier_cat($_tmp, ' - ')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_RESTORE) : smarty_modifier_cat($_tmp, @_RESTORE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/backup.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'languages' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=languages">') : smarty_modifier_cat($_tmp, '?ctg=languages">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_LANGUAGES) : smarty_modifier_cat($_tmp, @_LANGUAGES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/languages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'logout_user' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=logout_user">') : smarty_modifier_cat($_tmp, '?ctg=logout_user">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_CONNECTEDUSERS) : smarty_modifier_cat($_tmp, @_CONNECTEDUSERS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/logout_user.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'forum' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=forum">') : smarty_modifier_cat($_tmp, '?ctg=forum">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_FORUMS) : smarty_modifier_cat($_tmp, @_FORUMS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php $_from = $this->_tpl_vars['T_FORUM_PARENTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['title_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['title_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['title_loop']['iteration']++;
?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=forum&forum=') : smarty_modifier_cat($_tmp, '?ctg=forum&forum=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['key'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php endforeach; endif; unset($_from); ?>
 <?php if ($_GET['topic']): ?>
     <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=forum&topic=') : smarty_modifier_cat($_tmp, '?ctg=forum&topic=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['topic']) : smarty_modifier_cat($_tmp, $_GET['topic'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_TOPIC']['title']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_TOPIC']['title'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['poll']): ?>
     <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=forum&poll=') : smarty_modifier_cat($_tmp, '?ctg=forum&poll=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['poll']) : smarty_modifier_cat($_tmp, $_GET['poll'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_POLL']['title']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_POLL']['title'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php endif; ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/forum.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'messages' )): ?>
 <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=messages'>".(@_MESSAGES)."</a>"); ?>
 <?php if ($_GET['view']): ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=messages&view=".($_GET['view'])."'>".($this->_tpl_vars['T_PERSONALMESSAGE']['title'])."</a>"); ?>
 <?php elseif (! $_GET['folders'] && $_GET['add']): ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=messages&add=1'>".(@_NEWMESSAGE)."</a>"); ?>
 <?php endif; ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/messages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'personal'): ?>
 <?php ob_start(); ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=users'>".(@_USERS)."</a>"); ?>
  <?php $this->assign('formatted_login', ((is_array($_tmp=$this->_tpl_vars['T_EDITEDUSER']->user['login'])) ? $this->_run_mod_handler('formatLogin', true, $_tmp) : formatLogin($_tmp))); ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=personal&user=".($this->_tpl_vars['T_EDITEDUSER']->user['login'])."'>".($this->_tpl_vars['formatted_login'])."</a>"); ?>
  <?php if ($this->_tpl_vars['T_OP'] == 'dashboard'): ?>
   <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=personal&user=".($_GET['user'])."&op=dashboard'>".(@_DASHBOARD)."</a>"); ?>
  <?php elseif ($this->_tpl_vars['T_OP'] == 'profile' && $_GET['add_user']): ?>
   <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=personal&user=".($this->_tpl_vars['T_EDITEDUSER']->user['login'])."&op=profile&add_user=1'>".(@_NEWUSER)."</a>"); ?>
  <?php elseif ($this->_tpl_vars['T_OP'] == 'profile' || $this->_tpl_vars['T_OP'] == 'user_groups' || $this->_tpl_vars['T_OP'] == 'mapped_accounts' || $this->_tpl_vars['T_OP'] == 'payments'): ?>
   <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=personal&user=".($_GET['user'])."&op=profile'>".(@_ACCOUNT)."</a>"); ?>
  <?php elseif ($this->_tpl_vars['T_OP'] == 'user_courses' || $this->_tpl_vars['T_OP'] == 'user_lessons' || $this->_tpl_vars['T_OP'] == 'certificates' || $this->_tpl_vars['T_OP'] == 'user_form'): ?>
   <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=personal&user=".($_GET['user'])."&op=user_courses'>".(@_LEARNING)."</a>"); ?>
  <?php elseif ($this->_tpl_vars['T_OP'] == 'placements' || $this->_tpl_vars['T_OP'] == 'history' || $this->_tpl_vars['T_OP'] == 'skills' || $this->_tpl_vars['T_OP'] == 'evaluations' || $this->_tpl_vars['T_OP'] == 'org_form'): ?>
   <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=personal&user=".($_GET['user'])."&op=placements'>".(@_ORGANIZATION)."</a>"); ?>
  <?php elseif ($this->_tpl_vars['T_OP'] == 'files'): ?>
   <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=personal&user=".($_GET['user'])."&op=files'>".(@_FILES)."</a>"); ?>
  <?php endif; ?>
  <tr><td class = "moduleCell">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/personal.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </td></tr>
 <?php $this->_smarty_vars['capture']['modulePersonal'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'users'): ?>
    <?php if (! isset ( $_GET['print_preview'] ) && ! isset ( $_GET['print'] ) && ! $this->_tpl_vars['T_POPUP_MODE']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=users">') : smarty_modifier_cat($_tmp, '?ctg=users">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_USERS) : smarty_modifier_cat($_tmp, @_USERS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php endif; ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/users.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'archive' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=archive">') : smarty_modifier_cat($_tmp, '?ctg=archive">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ARCHIVE) : smarty_modifier_cat($_tmp, @_ARCHIVE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php if ($_GET['type'] == 'users'): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=archive&type=users">') : smarty_modifier_cat($_tmp, '?ctg=archive&type=users">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_USERS) : smarty_modifier_cat($_tmp, @_USERS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['type'] == 'lessons'): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=archive&type=lessons">') : smarty_modifier_cat($_tmp, '?ctg=archive&type=lessons">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_LESSONS) : smarty_modifier_cat($_tmp, @_LESSONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['type'] == 'courses'): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=archive&type=courses">') : smarty_modifier_cat($_tmp, '?ctg=archive&type=courses">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_COURSES) : smarty_modifier_cat($_tmp, @_COURSES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php endif; ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/archive.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'lessons' )): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=lessons">') : smarty_modifier_cat($_tmp, '?ctg=lessons">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_LESSONS) : smarty_modifier_cat($_tmp, @_LESSONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php if ($_GET['edit_lesson']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=lessons&edit_lesson=') : smarty_modifier_cat($_tmp, '?ctg=lessons&edit_lesson=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_lesson']) : smarty_modifier_cat($_tmp, $_GET['edit_lesson'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITLESSON) : smarty_modifier_cat($_tmp, @_EDITLESSON)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' <span class = "innerTableName">&quot;') : smarty_modifier_cat($_tmp, ' <span class = "innerTableName">&quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_LESSON_FORM']['name']['value']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_LESSON_FORM']['name']['value'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</span></a>') : smarty_modifier_cat($_tmp, '&quot;</span></a>'))); ?>
    <?php elseif ($_GET['lesson_info']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=lessons&lesson_info=') : smarty_modifier_cat($_tmp, '?ctg=lessons&lesson_info=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['lesson_info']) : smarty_modifier_cat($_tmp, $_GET['lesson_info'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_INFORMATIONFORLESSON) : smarty_modifier_cat($_tmp, @_INFORMATIONFORLESSON)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' &quot;') : smarty_modifier_cat($_tmp, ' &quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</a>') : smarty_modifier_cat($_tmp, '&quot;</a>'))); ?>
  <?php if ($_GET['edit_info']): ?>
   <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=lessons&lesson_info=".($_GET['lesson_info'])."&edit_info=1'>".(@_EDITLESSONINFORMATION)."</a>"); ?>
  <?php endif; ?>
    <?php elseif ($_GET['add_lesson']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=lessons&add_lesson=1">') : smarty_modifier_cat($_tmp, '?ctg=lessons&add_lesson=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_NEWLESSON) : smarty_modifier_cat($_tmp, @_NEWLESSON)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php elseif ($_GET['lesson_settings']): ?>
            <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."'>".(@_OPTIONSFORLESSON)." &quot;".($this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])."&quot;</a>"); ?>
            <?php if (isset ( $this->_tpl_vars['T_OP'] ) && $this->_tpl_vars['T_OP'] == reset_lesson): ?>
                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=reset_lesson'>".(@_RESTARTLESSON)."</a>"); ?>
            <?php elseif (isset ( $this->_tpl_vars['T_OP'] ) && $this->_tpl_vars['T_OP'] == import_lesson): ?>
                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=import_lesson'>".(@_IMPORTLESSON)."</a>"); ?>
            <?php elseif (isset ( $this->_tpl_vars['T_OP'] ) && $this->_tpl_vars['T_OP'] == export_lesson): ?>
                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=export_lesson'>".(@_EXPORTLESSON)."</a>"); ?>
            <?php elseif (isset ( $this->_tpl_vars['T_OP'] ) && $this->_tpl_vars['T_OP'] == lesson_users): ?>
                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=lesson_users'>".(@_LESSONUSERS)."</a>"); ?>
            <?php elseif (isset ( $this->_tpl_vars['T_OP'] ) && $this->_tpl_vars['T_OP'] == lesson_layout): ?>
                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=lesson_layout'>".(@_LAYOUT)."</a>"); ?>
            <?php endif; ?>
    <?php endif; ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/lessons.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'file_manager' )): ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/file_manager.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'social' )): ?>

    <?php if ($this->_tpl_vars['T_OP'] == 'dashboard'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a class="titleLink" href ="')) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=control_panel">') : smarty_modifier_cat($_tmp, '?ctg=control_panel">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_HOME) : smarty_modifier_cat($_tmp, @_HOME)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=social&op=dashboard">') : smarty_modifier_cat($_tmp, '?ctg=social&op=dashboard">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_DASHBOARD) : smarty_modifier_cat($_tmp, @_DASHBOARD)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php elseif ($this->_tpl_vars['T_OP'] == 'people'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a class="titleLink" href ="')) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=control_panel">') : smarty_modifier_cat($_tmp, '?ctg=control_panel">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_HOME) : smarty_modifier_cat($_tmp, @_HOME)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=social&op=people">') : smarty_modifier_cat($_tmp, '?ctg=social&op=people">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_PEOPLE) : smarty_modifier_cat($_tmp, @_PEOPLE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php elseif ($this->_tpl_vars['T_OP'] == 'timeline'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=control_panel&op=timeline">') : smarty_modifier_cat($_tmp, '?ctg=control_panel&op=timeline">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SYSTEMTIMELINE) : smarty_modifier_cat($_tmp, @_SYSTEMTIMELINE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php endif; ?>
    <?php ob_start(); ?>
            <tr>
                <td class = "moduleCell" id = "singleColumn">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'social.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </td>
            </tr>
    <?php $this->_smarty_vars['capture']['moduleSocial'] = ob_get_contents(); ob_end_clean(); ?>

<?php endif; ?>

<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'digests' )): ?>

    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a class="titleLink" href ="')) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=control_panel">') : smarty_modifier_cat($_tmp, '?ctg=control_panel">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_HOME) : smarty_modifier_cat($_tmp, @_HOME)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=digests">') : smarty_modifier_cat($_tmp, '?ctg=digests">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EMAILDIGESTS) : smarty_modifier_cat($_tmp, @_EMAILDIGESTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php if (isset ( $_GET['add_notification'] )): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=digests&add_notification=1">') : smarty_modifier_cat($_tmp, '?ctg=digests&add_notification=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ADDNOTIFICATION) : smarty_modifier_cat($_tmp, @_ADDNOTIFICATION)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php elseif (isset ( $_GET['edit_notification'] )): ?>
        <?php if (isset ( $_GET['event'] )): ?>
            <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=digests&edit_notification=') : smarty_modifier_cat($_tmp, '?ctg=digests&edit_notification=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_notification']) : smarty_modifier_cat($_tmp, $_GET['edit_notification'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&event=1">') : smarty_modifier_cat($_tmp, '&event=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITNOTIFICATION) : smarty_modifier_cat($_tmp, @_EDITNOTIFICATION)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php else: ?>
            <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=digests&edit_notification=') : smarty_modifier_cat($_tmp, '?ctg=digests&edit_notification=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_notification']) : smarty_modifier_cat($_tmp, $_GET['edit_notification'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITNOTIFICATION) : smarty_modifier_cat($_tmp, @_EDITNOTIFICATION)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php endif; ?>
    <?php endif; ?>
    <?php ob_start(); ?>
            <tr>
                <td class = "singleColumn" id = "singleColumn" colspan = "2">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'includes/digests.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </td>
            </tr>
    <?php $this->_smarty_vars['capture']['moduleDigests'] = ob_get_contents(); ob_end_clean(); ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['T_CTG'] == 'content'): ?>

    <?php if ($this->_tpl_vars['T_OP'] == 'file_manager'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=content&op=file_manager">') : smarty_modifier_cat($_tmp, '?ctg=content&op=file_manager">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_FILES) : smarty_modifier_cat($_tmp, @_FILES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
                <?php ob_start(); ?>
            <?php if ($this->_tpl_vars['T_FILE_METADATA']): ?>
                    <tr><td class = "moduleCell">
                        <?php ob_start(); ?>
                            <fieldset class = "fieldsetSeparator">
                                <legend><?php echo @_FILEMETADATA; ?>
</legend>
                                <?php echo $this->_tpl_vars['T_FILE_METADATA_HTML']; ?>

                            </fieldset>
                        <?php $this->_smarty_vars['capture']['t_file_info_code'] = ob_get_contents(); ob_end_clean(); ?>
                        <?php echo smarty_function_eF_template_printBlock(array('title' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@_INFORMATIONFORFILE)) ? $this->_run_mod_handler('cat', true, $_tmp, ' &quot;') : smarty_modifier_cat($_tmp, ' &quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_FILE_METADATA']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_FILE_METADATA']['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;') : smarty_modifier_cat($_tmp, '&quot;')),'data' => $this->_smarty_vars['capture']['t_file_info_code'],'image' => '32x32/information.png'), $this);?>

                    </td></tr>
            <?php else: ?>
                    <tr><td class = "moduleCell">
                        <?php ob_start(); ?>
                            <?php echo $this->_tpl_vars['T_FILE_MANAGER']; ?>

                        <?php $this->_smarty_vars['capture']['t_file_manager_code'] = ob_get_contents(); ob_end_clean(); ?>
                        <?php echo smarty_function_eF_template_printBlock(array('title' => @_FILEMANAGER,'data' => $this->_smarty_vars['capture']['t_file_manager_code'],'image' => '32x32/file_explorer.png'), $this);?>

                    </td></tr>
            <?php endif; ?>
        <?php $this->_smarty_vars['capture']['moduleFileManager'] = ob_get_contents(); ob_end_clean(); ?>
    <?php endif; ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'curriculums' )): ?>
 <?php ob_start(); ?>
 <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=curriculums'>".(@_CURRICULUM)."</a>"); ?>
 <?php if ($_GET['edit']): ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=curriculums&edit=".($_GET['edit'])."'>".(@_EDITCURRICULUM)."</a>"); ?>
 <?php elseif ($_GET['add']): ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=curriculums&add=1'>".(@_ADDCURRICULUM)."</a>"); ?>
 <?php endif; ?>
  <tr><td class="moduleCell">
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/curriculums.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </td></tr>
 <?php $this->_smarty_vars['capture']['moduleCurriculums'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'tests' )): ?>
                <?php ob_start(); ?>
            <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=tests">') : smarty_modifier_cat($_tmp, '?ctg=tests">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SKILLGAPTESTS) : smarty_modifier_cat($_tmp, @_SKILLGAPTESTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
            <?php if ($_GET['edit_test']): ?>
                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&edit_test=".($_GET['edit_test'])."'>".(@_EDITSKILLGAPTEST)."<span class='innerTableName'>&nbsp;&quot;".($this->_tpl_vars['T_CURRENT_TEST']->test['name'])."&quot;</span></a>"); ?>
            <?php elseif ($_GET['add_test'] && isset ( $_GET['create_quick_test'] )): ?>
                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&add_test=1&create_quick_test=1'>".(@_ADDQUICKSKILLGAP)."</a>"); ?>

            <?php elseif ($_GET['add_test']): ?>
                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&add_test=1'>".(@_ADDSKILLGAPTEST)."</a>"); ?>
            <?php elseif ($_GET['edit_question']): ?>
                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&edit_question=".($_GET['edit_question'])."&question_type=".($_GET['question_type'])."&lessonId=".($_GET['lessonId'])."'>".(@_EDITQUESTION)."</a>"); ?>
            <?php elseif ($_GET['add_question']): ?>
                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&add_question=1&question_type=".($_GET['question_type'])."'>".(@_ADDQUESTION)."</a>"); ?>
            <?php elseif ($_GET['test_results']): ?>
                <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=tests&test_results=') : smarty_modifier_cat($_tmp, '?ctg=tests&test_results=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['test_results']) : smarty_modifier_cat($_tmp, $_GET['test_results'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SKILLGAPTESTRESULTS) : smarty_modifier_cat($_tmp, @_SKILLGAPTESTRESULTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
            <?php elseif ($_GET['show_test']): ?>
                <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=tests&show_test=') : smarty_modifier_cat($_tmp, '?ctg=tests&show_test=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['show_test']) : smarty_modifier_cat($_tmp, $_GET['show_test'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_PREVIEW) : smarty_modifier_cat($_tmp, @_PREVIEW)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
            <?php elseif ($_GET['show_solved_test']): ?>
                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&test_results=".($this->_tpl_vars['T_TEST_DATA']->completedTest['testsId'])."'>".(@_SKILLGAPTESTRESULTS)."</a>"); ?>
                <?php if (! $_GET['test_analysis']): ?>
                <?php $this->assign('formatted_login', ((is_array($_tmp=$this->_tpl_vars['T_TEST_DATA']->completedTest['login'])) ? $this->_run_mod_handler('formatLogin', true, $_tmp) : formatLogin($_tmp))); ?>
                    <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&show_solved_test=".($this->_tpl_vars['T_TEST_DATA']->completedTest['id'])."'>".(@_VIEWSOLVEDTEST).": &quot;".($this->_tpl_vars['T_TEST_DATA']->test['name'])."&quot; ".(@_BYUSER).": ".($this->_tpl_vars['formatted_login'])."</a>"); ?>
                <?php else: ?>
                    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=tests&show_solved_test=') : smarty_modifier_cat($_tmp, '?ctg=tests&show_solved_test=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['show_solved_test']) : smarty_modifier_cat($_tmp, $_GET['show_solved_test'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&test_analysis=') : smarty_modifier_cat($_tmp, '&test_analysis=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['test_analysis']) : smarty_modifier_cat($_tmp, $_GET['test_analysis'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&user=') : smarty_modifier_cat($_tmp, '&user=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['user']) : smarty_modifier_cat($_tmp, $_GET['user'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_USERRESULTS) : smarty_modifier_cat($_tmp, @_USERRESULTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
                <?php endif; ?>
            <?php elseif ($_GET['solved_tests']): ?>
                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&solved_tests=1'>".(@_SHOWALLSOLVEDSKILLGAPTESTS)."</a>"); ?>
            <?php endif; ?>

            <tr><td class = "moduleTests" style = "vertical-align:top">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/module_tests.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            </td></tr>
        <?php $this->_smarty_vars['capture']['moduleTests'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>

<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'directions' )): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=directions">') : smarty_modifier_cat($_tmp, '?ctg=directions">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_CATEGORIES) : smarty_modifier_cat($_tmp, @_CATEGORIES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php if ($_GET['add_direction']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=directions&add_direction=1">') : smarty_modifier_cat($_tmp, '?ctg=directions&add_direction=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_NEWCATEGORY) : smarty_modifier_cat($_tmp, @_NEWCATEGORY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php elseif ($_GET['edit_direction']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=directions&edit_direction=') : smarty_modifier_cat($_tmp, '?ctg=directions&edit_direction=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_direction']) : smarty_modifier_cat($_tmp, $_GET['edit_direction'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITCATEGORY) : smarty_modifier_cat($_tmp, @_EDITCATEGORY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '<span class="innerTableName">&nbsp;&quot;') : smarty_modifier_cat($_tmp, '<span class="innerTableName">&nbsp;&quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_DIRECTIONS_FORM']['name']['value']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_DIRECTIONS_FORM']['name']['value'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</span></a>') : smarty_modifier_cat($_tmp, '&quot;</span></a>'))); ?>
    <?php endif; ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/categories.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'courses' )): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=courses">') : smarty_modifier_cat($_tmp, '?ctg=courses">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_COURSES) : smarty_modifier_cat($_tmp, @_COURSES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>

 <?php if ($_GET['edit_course']): ?>
     <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=courses&edit_course=') : smarty_modifier_cat($_tmp, '?ctg=courses&edit_course=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_course']) : smarty_modifier_cat($_tmp, $_GET['edit_course'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITCOURSE) : smarty_modifier_cat($_tmp, @_EDITCOURSE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;<span class="innerTableName">&quot;') : smarty_modifier_cat($_tmp, '&nbsp;<span class="innerTableName">&quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_COURSE_FORM']['name']['value']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_COURSE_FORM']['name']['value'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</span></a>') : smarty_modifier_cat($_tmp, '&quot;</span></a>'))); ?>
 <?php elseif ($_GET['add_course']): ?>
     <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=courses&add_course=1">') : smarty_modifier_cat($_tmp, '?ctg=courses&add_course=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_NEWCOURSE) : smarty_modifier_cat($_tmp, @_NEWCOURSE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php elseif ($_GET['course']): ?>
     <?php if ($this->_tpl_vars['T_OP'] == course_info): ?>
         <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=course_info'>".(@_INFORMATIONFORCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
     <?php elseif ($this->_tpl_vars['T_OP'] == course_certificates): ?>
         <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=course_certificates'>".(@_COMPLETION)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
     <?php elseif ($this->_tpl_vars['T_OP'] == format_certificate): ?>
         <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=format_certificate'>".(@_FORMATCERTIFICATEFORCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
     <?php elseif ($this->_tpl_vars['T_OP'] == format_certificate_docx): ?>
         <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=format_certificate_docx'>".(@_FORMATCERTIFICATEFORCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
     <?php elseif ($this->_tpl_vars['T_OP'] == course_rules): ?>
         <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=course_rules'>".(@_RULESFORCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
     <?php elseif ($this->_tpl_vars['T_OP'] == course_order): ?>
         <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=course_order'>".(@_ORDERFORCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
     <?php elseif ($this->_tpl_vars['T_OP'] == course_scheduling): ?>
         <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=course_scheduling'>".(@_SCHEDULINGFORCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
     <?php elseif ($this->_tpl_vars['T_OP'] == export_course): ?>
         <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=export_course'>".(@_EXPORTCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
     <?php elseif ($this->_tpl_vars['T_OP'] == import_course): ?>
         <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=import_course'>".(@_IMPORTCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
     <?php elseif ($this->_tpl_vars['T_MODULE_TABPAGE']): ?>
      <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=".($this->_tpl_vars['T_MODULE_TABPAGE']['tab_page'])."'>".($this->_tpl_vars['T_MODULE_TABPAGE']['title'])."</a>"); ?>
     <?php endif; ?>
 <?php endif; ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/courses.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'user_types' )): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=user_types">') : smarty_modifier_cat($_tmp, '?ctg=user_types">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_USERTYPES) : smarty_modifier_cat($_tmp, @_USERTYPES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php if ($_GET['edit_user_type']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=user_types&edit_user_type=') : smarty_modifier_cat($_tmp, '?ctg=user_types&edit_user_type=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_user_type']) : smarty_modifier_cat($_tmp, $_GET['edit_user_type'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITUSERTYPE) : smarty_modifier_cat($_tmp, @_EDITUSERTYPE)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' <span class = "innerTableName">&quot;') : smarty_modifier_cat($_tmp, ' <span class = "innerTableName">&quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_USER_TYPE_NAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_USER_TYPE_NAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</span></a>') : smarty_modifier_cat($_tmp, '&quot;</span></a>'))); ?>
    <?php elseif ($_GET['add_user_type']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=user_types&add_user_type=1">') : smarty_modifier_cat($_tmp, '?ctg=user_types&add_user_type=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_NEWUSERTYPE) : smarty_modifier_cat($_tmp, @_NEWUSERTYPE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php endif; ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/user_types.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'user_groups' )): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=user_groups">') : smarty_modifier_cat($_tmp, '?ctg=user_groups">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_GROUPS) : smarty_modifier_cat($_tmp, @_GROUPS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php if ($_GET['add_user_group']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=user_groups&add_user_group=1">') : smarty_modifier_cat($_tmp, '?ctg=user_groups&add_user_group=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_NEWGROUP) : smarty_modifier_cat($_tmp, @_NEWGROUP)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php elseif ($_GET['edit_user_group']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=user_groups&edit_user_group=') : smarty_modifier_cat($_tmp, '?ctg=user_groups&edit_user_group=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_user_group']) : smarty_modifier_cat($_tmp, $_GET['edit_user_group'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITGROUP) : smarty_modifier_cat($_tmp, @_EDITGROUP)))) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;<span class="innerTableName">&quot;') : smarty_modifier_cat($_tmp, '&nbsp;<span class="innerTableName">&quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_GROUP']->group['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_GROUP']->group['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</span></a>') : smarty_modifier_cat($_tmp, '&quot;</span></a>'))); ?>
    <?php endif; ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/groups.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>


<?php if (( isset ( $this->_tpl_vars['T_CATEGORY'] ) && $this->_tpl_vars['T_CATEGORY'] == 'statistics' )): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics">') : smarty_modifier_cat($_tmp, '?ctg=statistics">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_STATISTICS) : smarty_modifier_cat($_tmp, @_STATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php if ($_GET['option'] == 'user'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=user">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=user">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_USERSTATISTICS) : smarty_modifier_cat($_tmp, @_USERSTATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php if ($_GET['sel_user']): ?>
   <?php $this->assign('formatted_login', ((is_array($_tmp=$_GET['sel_user'])) ? $this->_run_mod_handler('formatLogin', true, $_tmp) : formatLogin($_tmp))); ?>
            <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=user&sel_user=') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=user&sel_user=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['sel_user']) : smarty_modifier_cat($_tmp, $_GET['sel_user'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['formatted_login']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['formatted_login'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php endif; ?>
    <?php elseif ($_GET['option'] == 'lesson'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=lesson">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=lesson">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_LESSONSTATISTICS) : smarty_modifier_cat($_tmp, @_LESSONSTATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php if (isset ( $this->_tpl_vars['T_INFO_LESSON']['name'] )): ?>
            <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=lesson&sel_lesson=') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=lesson&sel_lesson=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['sel_lesson']) : smarty_modifier_cat($_tmp, $_GET['sel_lesson'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_INFO_LESSON']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_INFO_LESSON']['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php endif; ?>
    <?php elseif ($_GET['option'] == 'test'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=test">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=test">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_TESTSTATISTICS) : smarty_modifier_cat($_tmp, @_TESTSTATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php if (isset ( $_GET['sel_test'] )): ?>
            <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=test&sel_test=') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=test&sel_test=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['sel_test']) : smarty_modifier_cat($_tmp, $_GET['sel_test'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_TEST_INFO']['general']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_TEST_INFO']['general']['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php endif; ?>
 <?php elseif ($_GET['option'] == 'feedback'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=feedback">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=feedback">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_FEEDBACKSTATISTICS) : smarty_modifier_cat($_tmp, @_FEEDBACKSTATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php if (isset ( $_GET['sel_test'] )): ?>
            <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=feedback&sel_test=') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=feedback&sel_test=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['sel_test']) : smarty_modifier_cat($_tmp, $_GET['sel_test'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_TEST_INFO']['general']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_TEST_INFO']['general']['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php endif; ?>
  <?php if (isset ( $_GET['question_ID'] )): ?>
            <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=feedback&sel_test=') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=feedback&sel_test=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['sel_test']) : smarty_modifier_cat($_tmp, $_GET['sel_test'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&question_ID=') : smarty_modifier_cat($_tmp, '&question_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['question_ID']) : smarty_modifier_cat($_tmp, $_GET['question_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_TEST_QUESTIONS'][$_GET['question_ID']]->question['text']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_TEST_QUESTIONS'][$_GET['question_ID']]->question['text'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php endif; ?>
    <?php elseif ($_GET['option'] == 'course'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=course">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=course">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_COURSESTATISTICS) : smarty_modifier_cat($_tmp, @_COURSESTATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php if (isset ( $_GET['sel_course'] )): ?>
            <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=course&sel_course=') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=course&sel_course=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['sel_course']) : smarty_modifier_cat($_tmp, $_GET['sel_course'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_COURSE']->course['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_COURSE']->course['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php endif; ?>
    <?php elseif ($_GET['option'] == 'system'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=system">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=system">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SYSTEMSTATISTICS) : smarty_modifier_cat($_tmp, @_SYSTEMSTATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php elseif ($_GET['option'] == 'queries'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=queries">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=queries">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_GENERICQUERIES) : smarty_modifier_cat($_tmp, @_GENERICQUERIES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php elseif ($_GET['option'] == 'custom'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=custom">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=custom">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_CUSTOMSTATISTICS) : smarty_modifier_cat($_tmp, @_CUSTOMSTATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php elseif ($_GET['option'] == 'certificate'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=certificate">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=certificate">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_CERTIFICATESTATISTICS) : smarty_modifier_cat($_tmp, @_CERTIFICATESTATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['option'] == 'events'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=events">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=events">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EVENTSTATISTICS) : smarty_modifier_cat($_tmp, @_EVENTSTATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['option'] == 'groups'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=groups">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=groups">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_GROUPSTATISTICS) : smarty_modifier_cat($_tmp, @_GROUPSTATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php if (isset ( $_GET['sel_group'] )): ?>
   <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=groups&sel_group=') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=groups&sel_group=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['sel_group']) : smarty_modifier_cat($_tmp, $_GET['sel_group'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_GROUP_NAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_GROUP_NAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php endif; ?>
    <?php elseif ($_GET['option'] == 'advanced_user_reports'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=advanced_user_reports">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=advanced_user_reports">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ADVANCEDUSERREPORTS) : smarty_modifier_cat($_tmp, @_ADVANCEDUSERREPORTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php elseif ($_GET['option'] == 'participation'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=participation">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=participation">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_PARTICIPATIONSTATISTICS) : smarty_modifier_cat($_tmp, @_PARTICIPATIONSTATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php endif; ?>
    <?php ob_start(); ?>
            <tr><td class = "moduleCell">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/statistics.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </td></tr>
    <?php $this->_smarty_vars['capture']['moduleStatistics'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php if (( $this->_tpl_vars['T_CTG'] == 'calendar' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=calendar">') : smarty_modifier_cat($_tmp, '?ctg=calendar">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_CALENDAR) : smarty_modifier_cat($_tmp, @_CALENDAR)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/calendar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['T_CTG'] == 'search_courses'): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a class="titleLink" href ="')) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=control_panel">') : smarty_modifier_cat($_tmp, '?ctg=control_panel">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_HOME) : smarty_modifier_cat($_tmp, @_HOME)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=search_courses">') : smarty_modifier_cat($_tmp, '?ctg=search_courses">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SEARCHCOURSEUSERS) : smarty_modifier_cat($_tmp, @_SEARCHCOURSEUSERS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php ob_start(); ?>
                            <tr><td class = "moduleCell">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "search_courses.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                    <?php echo smarty_function_eF_template_printBlock(array('title' => @_FINDEMPLOYEES,'data' => $this->_smarty_vars['capture']['t_search_course_code'],'image' => '32x32/scorm.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS']), $this);?>

                                    <br />
                                    <?php echo smarty_function_eF_template_printBlock(array('title' => @_USERSFULFILLINGCRITERIA,'data' => $this->_smarty_vars['capture']['t_found_employees_code'],'image' => '32x32/user.png','options' => $this->_tpl_vars['T_SENDALLMAIL_LINK']), $this);?>

                            </td></tr>
    <?php $this->_smarty_vars['capture']['moduleSearchCoursesPage'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['T_CTG'] == 'module'): ?>
    <?php $this->assign('title', $this->_tpl_vars['T_MODULE_NAVIGATIONAL_LINKS']); ?>
    <?php ob_start(); ?>
        <tr><td class = "moduleCell">
            <?php if ($this->_tpl_vars['T_MODULE_SMARTY']): ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['T_MODULE_SMARTY'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php else: ?>
                <?php echo $this->_tpl_vars['T_MODULE_PAGE']; ?>

            <?php endif; ?>
                    </td></tr>
    <?php $this->_smarty_vars['capture']['importedModule'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['T_CTG_MODULE']): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a class="titleLink" href ="')) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=') : smarty_modifier_cat($_tmp, '?ctg=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CTG']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CTG'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CTG_MODULE']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CTG_MODULE'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php ob_start(); ?>
                            <tr><td class = "moduleCell">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=@G_MODULESPATH)) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CTG']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CTG'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '/module.tpl') : smarty_modifier_cat($_tmp, '/module.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </td></tr>
    <?php $this->_smarty_vars['capture']['importedModule'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php if (( isset ( $_POST['search_text'] ) )): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="javascript:void(0)">') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="javascript:void(0)">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SEARCHRESULTS) : smarty_modifier_cat($_tmp, @_SEARCHRESULTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php ob_start(); ?>
                            <tr><td class = "moduleCell">
                                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/module_search.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </td></tr>
    <?php $this->_smarty_vars['capture']['moduleSearchResults'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'themes' )): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=themes">') : smarty_modifier_cat($_tmp, '?ctg=themes">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_THEMES) : smarty_modifier_cat($_tmp, @_THEMES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php if ($_GET['edit_page']): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=themes&tab=external&edit_page=') : smarty_modifier_cat($_tmp, '?ctg=themes&tab=external&edit_page=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_page']) : smarty_modifier_cat($_tmp, $_GET['edit_page'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_UPDATEPAGE) : smarty_modifier_cat($_tmp, @_UPDATEPAGE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['add_page']): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=themes&tab=external&add_page=1">') : smarty_modifier_cat($_tmp, '?ctg=themes&tab=external&add_page=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_NEWPAGE) : smarty_modifier_cat($_tmp, @_NEWPAGE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php endif; ?>
 <?php ob_start(); ?>
                            <tr><td class = "moduleCell">
                                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/themes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </td></tr>
    <?php $this->_smarty_vars['capture']['moduleThemes'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'module_hcd' )): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a class="titleLink" href ="')) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=control_panel">') : smarty_modifier_cat($_tmp, '?ctg=control_panel">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_HOME) : smarty_modifier_cat($_tmp, @_HOME)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php if ($_GET['op'] != 'reports' && $_GET['op'] != 'skill_cat'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=module_hcd">') : smarty_modifier_cat($_tmp, '?ctg=module_hcd">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ORGANIZATION) : smarty_modifier_cat($_tmp, @_ORGANIZATION)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php endif; ?>
    <?php if ($_GET['op'] == 'branches'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=module_hcd&op=branches">') : smarty_modifier_cat($_tmp, '?ctg=module_hcd&op=branches">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_BRANCHES) : smarty_modifier_cat($_tmp, @_BRANCHES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php if ($_GET['add_branch'] || $_GET['edit_branch']): ?>
                <?php if ($_GET['edit_branch'] != ""): ?>
                    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=module_hcd&op=branches&edit_branch=') : smarty_modifier_cat($_tmp, '?ctg=module_hcd&op=branches&edit_branch=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_branch']) : smarty_modifier_cat($_tmp, $_GET['edit_branch'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_BRANCHRECORD) : smarty_modifier_cat($_tmp, @_BRANCHRECORD)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
                <?php else: ?>
                    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=module_hcd&op=branches&add_branch=1">') : smarty_modifier_cat($_tmp, '?ctg=module_hcd&op=branches&add_branch=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_BRANCHRECORD) : smarty_modifier_cat($_tmp, @_BRANCHRECORD)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
                <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
    <?php if ($_GET['op'] == 'skills'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=module_hcd&op=skills">') : smarty_modifier_cat($_tmp, '?ctg=module_hcd&op=skills">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SKILLS) : smarty_modifier_cat($_tmp, @_SKILLS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php if ($_GET['add_skill'] || $_GET['edit_skill']): ?>
                <?php if ($_GET['edit_skill'] != ""): ?>
                    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=module_hcd&op=skills&edit_skill=') : smarty_modifier_cat($_tmp, '?ctg=module_hcd&op=skills&edit_skill=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_skill']) : smarty_modifier_cat($_tmp, $_GET['edit_skill'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITSKILL) : smarty_modifier_cat($_tmp, @_EDITSKILL)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' <span class="innerTableName">&quot;') : smarty_modifier_cat($_tmp, ' <span class="innerTableName">&quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SKILL_NAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SKILL_NAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</span></a>') : smarty_modifier_cat($_tmp, '&quot;</span></a>'))); ?>
                <?php else: ?>
                    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=module_hcd&op=skills&add_skill=1">') : smarty_modifier_cat($_tmp, '?ctg=module_hcd&op=skills&add_skill=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_NEWSKILL) : smarty_modifier_cat($_tmp, @_NEWSKILL)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
                <?php endif; ?>
         <?php endif; ?>
    <?php endif; ?>
    <?php if ($_GET['op'] == 'job_descriptions'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=module_hcd&op=job_descriptions">') : smarty_modifier_cat($_tmp, '?ctg=module_hcd&op=job_descriptions">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_JOBDESCRIPTIONS) : smarty_modifier_cat($_tmp, @_JOBDESCRIPTIONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php if ($_GET['add_job_description'] || $_GET['edit_job_description']): ?>
            <?php if ($_GET['edit_job_description'] != ""): ?>
                <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=module_hcd&op=job_descriptions&edit_job_description=') : smarty_modifier_cat($_tmp, '?ctg=module_hcd&op=job_descriptions&edit_job_description=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_job_description']) : smarty_modifier_cat($_tmp, $_GET['edit_job_description'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_JOBDESCRIPTIONDATA) : smarty_modifier_cat($_tmp, @_JOBDESCRIPTIONDATA)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
            <?php else: ?>
                <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=module_hcd&op=job_descriptions&add_job_description=1">') : smarty_modifier_cat($_tmp, '?ctg=module_hcd&op=job_descriptions&add_job_description=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_JOBDESCRIPTIONDATA) : smarty_modifier_cat($_tmp, @_JOBDESCRIPTIONDATA)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
    <?php if ($_GET['op'] == 'reports'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=module_hcd&op=reports">') : smarty_modifier_cat($_tmp, '?ctg=module_hcd&op=reports">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SEARCHFOREMPLOYEE) : smarty_modifier_cat($_tmp, @_SEARCHFOREMPLOYEE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php endif; ?>
    <?php if ($_GET['op'] == 'imp_exp'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=module_hcd&op=imp_exp">') : smarty_modifier_cat($_tmp, '?ctg=module_hcd&op=imp_exp">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_IMPORTEXPORTORGANIZATIONALDATA) : smarty_modifier_cat($_tmp, @_IMPORTEXPORTORGANIZATIONALDATA)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php endif; ?>
    <?php if ($_GET['op'] == 'chart'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=module_hcd&op=chart">') : smarty_modifier_cat($_tmp, '?ctg=module_hcd&op=chart">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ORGANIZATIONCHARTTREE) : smarty_modifier_cat($_tmp, @_ORGANIZATIONCHARTTREE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php endif; ?>
    <?php ob_start(); ?>
                            <tr><td class = "moduleCell">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'module_hcd.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </td></tr>
    <?php $this->_smarty_vars['capture']['moduleHCD'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php if (! $this->_tpl_vars['T_LAYOUT_CLASS']): ?><?php $this->assign('layoutClass', 'centerFull'); ?><?php else: ?><?php $this->assign('layoutClass', $this->_tpl_vars['T_LAYOUT_CLASS']); ?><?php endif; ?>
<?php ob_start(); ?>
 <?php if ($_GET['message']): ?><?php echo smarty_function_eF_template_printMessageBlock(array('content' => $_GET['message'],'type' => $_GET['message_type']), $this);?>
<?php endif; ?>
 <?php if ($this->_tpl_vars['T_MESSAGE']): ?><?php echo smarty_function_eF_template_printMessageBlock(array('content' => $this->_tpl_vars['T_MESSAGE'],'type' => $this->_tpl_vars['T_MESSAGE_TYPE']), $this);?>
<?php endif; ?>
 <?php if ($this->_tpl_vars['T_SEARCH_MESSAGE'] || $_GET['search_message']): ?>
     <?php if ($_GET['search_message']): ?><?php $this->assign('T_SEARCH_MESSAGE', $_GET['search_message']); ?><?php endif; ?>
  <?php echo smarty_function_eF_template_printMessageBlock(array('content' => $this->_tpl_vars['T_SEARCH_MESSAGE'],'type' => $this->_tpl_vars['T_MESSAGE_TYPE']), $this);?>

 <?php endif; ?>
 <table class = "centerTable">
  <?php echo $this->_smarty_vars['capture']['moduleArchive']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleControlPanel']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleUsers']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleNewUser']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleNewLessonDirection']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleLessons']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleNewCourse']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleCourses']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleDirections']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleTests']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleRoles']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleGroups']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleNewsPage']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleCms']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleStatistics']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleBackup']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleLanguages']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleEmail']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleImportExportUsers']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleSearchResults']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleConfig']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleModules']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleFileManager']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleCleanup']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleImportUsers']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleCustomizeUsersProfile']; ?>

  <?php echo $this->_smarty_vars['capture']['importedModule']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleHCD']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleCalendarPage']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleSearchCoursesPage']; ?>

  <?php echo $this->_smarty_vars['capture']['modulePayments']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleLandingPage']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleCurriculums']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleVersionKey']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleSocialAdmin']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleSocial']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleDigests']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleThemes']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleLogoutUser']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleForum']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleMessagesPage']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleShowRoom']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleRoomsList']; ?>

    <?php echo $this->_smarty_vars['capture']['modulePersonal']; ?>

 </table>
<?php $this->_smarty_vars['capture']['center_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start(); ?>
 <table class = "centerTable">
  <?php echo $this->_smarty_vars['capture']['moduleSideOperations']; ?>

 </table>
<?php $this->_smarty_vars['capture']['left_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start(); ?>
 <table class = "centerTable">
  <?php echo $this->_smarty_vars['capture']['moduleSideOperations']; ?>

 </table>
<?php $this->_smarty_vars['capture']['right_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/common_layout.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/closing.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>