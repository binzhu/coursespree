<?php /* Smarty version 2.6.26, created on 2012-05-15 11:51:07
         compiled from includes/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'includes/header.tpl', 2, false),array('modifier', 'replace', 'includes/header.tpl', 22, false),array('modifier', 'strip_tags', 'includes/header.tpl', 25, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html <?php if (((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)) == 'browse.php' || ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)) == 'browsecontent.php'): ?>class = "whitebg"<?php endif; ?> <?php if ($_GET['popup'] || $this->_tpl_vars['T_POPUP_MODE']): ?>class = "popup"<?php endif; ?> <?php if ($this->_tpl_vars['T_RTL']): ?>dir = "rtl"<?php endif; ?> <?php if ($this->_tpl_vars['T_OPEN_FACEBOOK_SESSION']): ?>xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml"<?php endif; ?>>
<head>
    <base href = "<?php echo @G_SERVERNAME; ?>
">
    <meta http-equiv = "Content-Language" content = "<?php echo @_HEADERLANGUAGEHTMLTAG; ?>
">
    <meta http-equiv = "keywords" content = "education">
    <meta http-equiv = "description" content = "Collaborative Elearning Platform">
    <meta http-equiv = "Content-Type" content = "text/html; charset = utf-8">
    <link rel="shortcut icon" href="<?php if ($this->_tpl_vars['T_FAVICON']): ?><?php echo $this->_tpl_vars['T_FAVICON']; ?>
<?php else: ?>themes/default/images/favicon.png<?php endif; ?>">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo @G_CURRENTTHEMECSS; ?>
">
    <?php $_from = $this->_tpl_vars['T_MODULE_CSS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['module_css_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['module_css_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['module_css_list']['iteration']++;
?>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo $this->_tpl_vars['item']; ?>
?build=<?php echo @G_BUILD; ?>
" />     <?php endforeach; endif; unset($_from); ?>
    <title><?php if ($this->_tpl_vars['T_CONFIGURATION']['site_name']): ?><?php echo $this->_tpl_vars['T_CONFIGURATION']['site_name']; ?>
<?php else: ?><?php echo @_EFRONTNAME; ?>
<?php endif; ?> | <?php if ($this->_tpl_vars['T_CONFIGURATION']['site_motto']): ?><?php echo $this->_tpl_vars['T_CONFIGURATION']['site_motto']; ?>
<?php else: ?><?php echo @_THENEWFORMOFADDITIVELEARNING; ?>
<?php endif; ?></title>

    <?php if ($this->_tpl_vars['T_OPEN_FACEBOOK_SESSION']): ?>
    <script src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php" type="text/javascript"></script>
    <?php endif; ?>

    <script type = "text/javascript">
        var ajaxObjects = new Array();
        <?php $this->assign('sitename', ((is_array($_tmp=$this->_tpl_vars['T_CONFIGURATION']['site_name'])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '\"') : smarty_modifier_replace($_tmp, '"', '\"'))); ?>
  <?php $this->assign('sitemotto', ((is_array($_tmp=$this->_tpl_vars['T_CONFIGURATION']['site_motto'])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '\"') : smarty_modifier_replace($_tmp, '"', '\"'))); ?>

        top.document.title = "<?php if ($this->_tpl_vars['T_CONFIGURATION']['site_name']): ?><?php echo $this->_tpl_vars['sitename']; ?>
<?php else: ?><?php echo @_EFRONTNAME; ?>
<?php endif; ?> | <?php if ($this->_tpl_vars['T_TITLE_BAR']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['T_TITLE_BAR'])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '\"') : smarty_modifier_replace($_tmp, '"', '\"')); ?>
<?php else: ?><?php if ($this->_tpl_vars['T_CONFIGURATION']['site_motto']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['sitemotto'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
<?php else: ?><?php echo @_THENEWFORMOFADDITIVELEARNING; ?>
<?php endif; ?><?php endif; ?>";
        if (window.name == 'POPUP_FRAME') var popup=1;
        <?php if ($this->_tpl_vars['T_BROWSER'] == 'IE6'): ?>var globalImageExtension = 'gif';<?php else: ?>var globalImageExtension = 'png';<?php endif; ?>

        <?php if ($this->_tpl_vars['T_THEME_SETTINGS']->options['sidebar_interface'] == 0): ?>
        var usingHorizontalInterface = false;
        <?php else: ?>
        var usingHorizontalInterface = true;
        <?php endif; ?>

        var sessionLogin = "<?php echo $_SESSION['s_login']; ?>
";
        var translationsToJS = new Array();
    </script>

<?php if (! $this->_tpl_vars['T_POPUP_MODE'] && ! $_GET['popup'] && isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_THEME_SETTINGS']->options['sidebar_interface'] == 0): ?>
<script>
//ctg, op, tab, type, module_menu)
var category = "<?php echo $this->_tpl_vars['T_CTG']; ?>
&<?php echo $this->_tpl_vars['T_OP']; ?>
&<?php echo $_GET['tab']; ?>
&<?php echo $_GET['type']; ?>
&<?php echo $this->_tpl_vars['T_MODULE_HIGHLIGHT']; ?>
&<?php echo $this->_tpl_vars['T_OPTION']; ?>
";
<?php echo '
if (top.sideframe && top.sideframe.document.getElementById(\'hasLoaded\')) {
'; ?>

   <?php if ($this->_tpl_vars['T_CTG'] == 'personal' && isset ( $_GET['tab'] ) && $_GET['tab'] == 'file_record'): ?>
       top.sideframe.changeTDcolor('file_manager');
   <?php elseif ($this->_tpl_vars['T_CTG'] == 'control_panel' && $_SESSION['s_type'] != 'administrator'): ?>
       top.sideframe.changeTDcolor('lesson_main');
   <?php elseif ($this->_tpl_vars['T_CTG'] == 'content' && isset ( $_GET['type'] ) && $_GET['type'] == 'theory'): ?>
       top.sideframe.changeTDcolor('theory');
   <?php elseif ($this->_tpl_vars['T_CTG'] == 'tests'): ?>
       top.sideframe.changeTDcolor('tests');
   <?php elseif ($this->_tpl_vars['T_CTG'] == 'projects'): ?>
       top.sideframe.changeTDcolor('exercises');
   <?php elseif ($this->_tpl_vars['T_CTG'] == 'system_config' || $this->_tpl_vars['T_CTG'] == 'themes'): ?>
       top.sideframe.changeTDcolor('control_panel');
   <?php elseif ($this->_tpl_vars['T_CTG'] == 'glossary'): ?>
       top.sideframe.changeTDcolor('glossary');
   <?php elseif ($this->_tpl_vars['T_CTG'] == 'content' && $this->_tpl_vars['T_OP'] == 'file_manager'): ?>
       top.sideframe.changeTDcolor('file_manager');
   <?php elseif ($this->_tpl_vars['T_CTG'] == 'users' && $_SESSION['employee_type'] == @_SUPERVISOR): ?>
       top.sideframe.changeTDcolor('employees');
   <?php elseif ($this->_tpl_vars['T_CTG'] == 'statistics'): ?>
       top.sideframe.changeTDcolor('statistics_<?php echo $this->_tpl_vars['T_OPTION']; ?>
');
   <?php elseif (@G_VERSIONTYPE == 'enterprise' && ( $this->_tpl_vars['T_CTG'] == 'module_hcd' )): ?>
        <?php if (( $this->_tpl_vars['T_OP'] == 'reports' )): ?>
            top.sideframe.changeTDcolor('search_employee');
        <?php elseif (isset ( $this->_tpl_vars['T_OP'] ) && $this->_tpl_vars['T_OP'] != ''): ?>
            top.sideframe.changeTDcolor('<?php echo $this->_tpl_vars['T_OP']; ?>
');
        <?php else: ?>
            top.sideframe.changeTDcolor('hcd_control_panel');
        <?php endif; ?>
   <?php elseif ($this->_tpl_vars['T_CTG'] == 'social'): ?>
        <?php if ($this->_tpl_vars['T_OP'] == 'people'): ?>
            top.sideframe.changeTDcolor('people');
        <?php elseif ($this->_tpl_vars['T_OP'] == 'timeline'): ?>
            <?php if (isset ( $_GET['lessons_ID'] )): ?>
                top.sideframe.changeTDcolor('timeline');
            <?php else: ?>
                top.sideframe.changeTDcolor('system_timeline');
            <?php endif; ?>
        <?php endif; ?>
   <?php elseif ($this->_tpl_vars['T_CTG'] == 'module'): ?>
        top.sideframe.changeTDcolor('<?php echo $this->_tpl_vars['T_MODULE_HIGHLIGHT']; ?>
');
   <?php else: ?>
       top.sideframe.changeTDcolor('<?php echo $this->_tpl_vars['T_CTG']; ?>
');
   <?php endif; ?>
<?php echo '
}
'; ?>

var translations = new Array(); //used for passing language tags to js


</script>
<?php endif; ?>
<?php if ($this->_tpl_vars['T_CONFIGURATION']['load_videojs'] == 1): ?>
 <script src="js/videojs/video.js" type="text/javascript" charset="utf-8"></script>
 <link rel="stylesheet" href="js/videojs/video-js.css" type="text/css" media="screen" title="Video JS" charset="utf-8">
<?php endif; ?>

<script>var translations = new Array(); /*used for passing language tags to js*/</script>

</head>
<?php if (basename($_SERVER['PHP_SELF']) != 'new_sidebar.php'): ?>
<body <?php if (isset ( $this->_tpl_vars['T_CURRENT_CTG'] )): ?>id = "body_<?php echo $this->_tpl_vars['T_CURRENT_CTG']; ?>
"<?php endif; ?> onkeypress = "if (window.eF_js_keypress) eF_js_keypress(event);" onbeforeunload = "if (window.periodicUpdater) periodicUpdater(false);">
<?php endif; ?>