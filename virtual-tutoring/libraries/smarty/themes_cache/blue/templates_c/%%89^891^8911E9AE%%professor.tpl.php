<?php /* Smarty version 2.6.26, created on 2012-05-15 11:52:56
         compiled from professor.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'professor.tpl', 8, false),array('modifier', 'cat', 'professor.tpl', 15, false),array('modifier', 'formatLogin', 'professor.tpl', 234, false),array('modifier', 'eF_truncate', 'professor.tpl', 285, false),array('function', 'eF_template_printBlock', 'professor.tpl', 818, false),array('function', 'eF_template_printMessageBlock', 'professor.tpl', 822, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($_SESSION['s_lessons_ID']): ?>
 <?php $this->assign('lessonName', $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name']); ?>
 <?php if ($this->_tpl_vars['T_NO_HORIZONTAL_MENU']): ?><?php $this->assign('title_onclick', "top.sideframe.hideAllLessonSpecific();"); ?><?php endif; ?>
  <?php $this->assign('title', "<a class = 'titleLink' title = '".(@_CHANGELESSON)."' href = '".($_SERVER['PHP_SELF'])."?ctg=lessons' onclick = '".($this->_tpl_vars['title_onclick'])."'>".(@_MYCOURSES)."</a>"); ?>
  <?php if (isset ( $this->_tpl_vars['T_CURRENT_COURSE_NAME'] )): ?>
     <?php $this->assign('titleCourse', ((is_array($_tmp=$this->_tpl_vars['T_CURRENT_COURSE_NAME'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&nbsp;&raquo;&nbsp;", "&nbsp;&rarr;&nbsp;") : smarty_modifier_replace($_tmp, "&nbsp;&raquo;&nbsp;", "&nbsp;&rarr;&nbsp;"))); ?>
   <?php $this->assign('title', ($this->_tpl_vars['title'])."<span>&nbsp;&raquo;&nbsp;</span><a class = 'titleLink' title = '".($this->_tpl_vars['titleCourse'])."' href ='".($_SERVER['PHP_SELF'])."?ctg=lessons&course=".($this->_tpl_vars['T_CURRENT_COURSE_ID'])."&op=course_info'>".($this->_tpl_vars['T_CURRENT_COURSE_NAME'])."</a>"); ?>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['T_CURRENT_LESSON']): ?>
   <?php $this->assign('title', ($this->_tpl_vars['title'])."<span>&nbsp;&raquo;&nbsp;</span><a class = 'titleLink' title = '".($this->_tpl_vars['T_CURRENT_CATEGORY_PATH'])."&nbsp;&rarr;&nbsp;".($this->_tpl_vars['titleCourse'])."&nbsp;&rarr;&nbsp;".($this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])."' href ='".($_SERVER['PHP_SELF'])."?ctg=control_panel'>".($this->_tpl_vars['lessonName'])."</a>"); ?>
  <?php endif; ?>
<?php else: ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a class = "titleLink" title = "')) ? $this->_run_mod_handler('cat', true, $_tmp, @_HOME) : smarty_modifier_cat($_tmp, @_HOME)))) ? $this->_run_mod_handler('cat', true, $_tmp, '" href ="') : smarty_modifier_cat($_tmp, '" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=control_panel">') : smarty_modifier_cat($_tmp, '?ctg=control_panel">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_HOME) : smarty_modifier_cat($_tmp, @_HOME)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
<?php endif; ?>

<script>
<?php if (( ! isset ( $this->_tpl_vars['T_THEME_SETTINGS']->options['sidebar_interface'] ) || $this->_tpl_vars['T_THEME_SETTINGS']->options['sidebar_interface'] == 0 )): ?>
 <?php if (( isset ( $this->_tpl_vars['T_CHANGE_LESSON'] ) || isset ( $this->_tpl_vars['T_REFRESH_SIDE'] ) )): ?>
  <?php if (isset ( $this->_tpl_vars['T_PERSONAL_CTG'] )): ?>
   <?php if (isset ( $_SESSION['s_lessons_ID'] )): ?>
    top.sideframe.location = "new_sidebar.php?sbctg=personal&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
   <?php else: ?>
    top.sideframe.location = "new_sidebar.php?sbctg=personal";
   <?php endif; ?>
  <?php else: ?>
   <?php if ($this->_tpl_vars['T_OP'] == 'import_lesson'): ?>
    top.sideframe.location = "new_sidebar.php?ctg=lessons&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
&sbctg=settings";
   <?php else: ?>
    <?php if (isset ( $this->_tpl_vars['T_SPECIFIC_LESSON_CTG'] )): ?>
     top.sideframe.location = "new_sidebar.php?ctg=lessons&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
&sbctg=<?php echo $this->_tpl_vars['T_SPECIFIC_LESSON_CTG']; ?>
";
       <?php else: ?>
        top.sideframe.location = "new_sidebar.php?ctg=lessons&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
       <?php endif; ?>
   <?php endif; ?>
  <?php endif; ?>
 <?php endif; ?>

  <?php if ($this->_tpl_vars['T_SHOW_LOADED_LESSON_OPTIONS']): ?>
 if (top.sideframe)
  top.sideframe.hideAllLessonGeneral();
 <?php endif; ?>
<?php endif; ?>

</script>



<script type="text/javascript">






<?php echo '
if (top.sideframe && top.sideframe.document.getElementById(\'hasLoaded\')) {
'; ?>

   <?php if (! $this->_tpl_vars['T_POPUP_MODE'] && ! $_GET['popup']): ?>
    if (top.sideframe)
    <?php if ($this->_tpl_vars['T_CTG'] == 'personal' && isset ( $_GET['tab'] ) && $_GET['tab'] == 'file_record'): ?>
     top.sideframe.changeTDcolor('file_manager');
    <?php elseif ($this->_tpl_vars['T_CTG'] == 'control_panel'): ?>
     top.sideframe.changeTDcolor('lesson_main');
    <?php elseif ($this->_tpl_vars['T_CTG'] == 'content' && isset ( $_GET['type'] ) && $_GET['type'] == 'theory'): ?>
     top.sideframe.changeTDcolor('theory');
    <?php elseif ($this->_tpl_vars['T_CTG'] == 'tests'): ?>
     top.sideframe.changeTDcolor('tests');
    <?php elseif ($this->_tpl_vars['T_CTG'] == 'projects'): ?>
     top.sideframe.changeTDcolor('exercises');
    <?php elseif ($this->_tpl_vars['T_CTG'] == 'glossary'): ?>
     top.sideframe.changeTDcolor('glossary');
    <?php elseif ($this->_tpl_vars['T_CTG'] == 'content' && $this->_tpl_vars['T_OP'] == 'file_manager'): ?>
     top.sideframe.changeTDcolor('file_manager');
    <?php elseif ($this->_tpl_vars['T_CTG'] == 'users' && $_SESSION['employee_type'] == @_SUPERVISOR): ?>
     top.sideframe.changeTDcolor('employees');
    <?php elseif (( $this->_tpl_vars['T_CTG'] == 'module_hcd' )): ?>
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
 <?php endif; ?>
<?php echo '
} else {
'; ?>

 <?php if (! $this->_tpl_vars['T_POPUP_MODE'] && ! $_GET['popup']): ?>
  if (top.sideframe)
  <?php if ($this->_tpl_vars['T_CTG'] == 'personal' && isset ( $_GET['tab'] ) && $_GET['tab'] == 'file_record'): ?>
   top.sideframe.location = "new_sidebar.php?sbctg=file_manager&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
  <?php elseif ($this->_tpl_vars['T_CTG'] == 'control_panel' && isset ( $_GET['lessons_ID'] )): ?>
   top.sideframe.location = "new_sidebar.php?sbctg=lesson_main&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
  <?php elseif ($this->_tpl_vars['T_CTG'] == 'content' && isset ( $_GET['type'] ) && $_GET['type'] == 'theory'): ?>
   top.sideframe.location = "new_sidebar.php?sbctg=theory&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
  <?php elseif ($this->_tpl_vars['T_CTG'] == 'tests'): ?>
   top.sideframe.location = "new_sidebar.php?sbctg=tests&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
  <?php elseif ($this->_tpl_vars['T_CTG'] == 'projects'): ?>
   top.sideframe.location = "new_sidebar.php?sbctg=exercises&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
  <?php elseif ($this->_tpl_vars['T_CTG'] == 'glossary'): ?>
   top.sideframe.location = "new_sidebar.php?sbctg=glossary&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
    <?php elseif ($this->_tpl_vars['T_CTG'] == 'content' && $this->_tpl_vars['T_OP'] == 'file_manager'): ?>
   top.sideframe.location = "new_sidebar.php?sbctg=file_manager&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
  <?php elseif ($this->_tpl_vars['T_CTG'] == 'users' && $_SESSION['employee_type'] == @_SUPERVISOR): ?>
   top.sideframe.location = "new_sidebar.php?sbctg=employees&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";

  <?php elseif (( $this->_tpl_vars['T_CTG'] == 'module_hcd' )): ?>
   <?php if (( $this->_tpl_vars['T_OP'] == 'reports' )): ?>
    top.sideframe.location = "new_sidebar.php?sbctg=reports&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
   <?php elseif (isset ( $this->_tpl_vars['T_OP'] ) && $this->_tpl_vars['T_OP'] != ''): ?>
    top.sideframe.location = "new_sidebar.php?sbctg=placements<?php echo $this->_tpl_vars['T_OP']; ?>
&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
   <?php else: ?>
    top.sideframe.location = "new_sidebar.php?sbctg=hcd_control_panel&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
   <?php endif; ?>

    <?php elseif ($this->_tpl_vars['T_CTG'] == 'social'): ?>
   <?php if ($this->_tpl_vars['T_OP'] == 'people'): ?>
    top.sideframe.location = "new_sidebar.php?sbctg=people&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
   <?php elseif ($this->_tpl_vars['T_OP'] == 'timeline'): ?>
    <?php if (isset ( $_GET['lessons_ID'] )): ?>
     top.sideframe.location = "new_sidebar.php?sbctg=timeline&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
    <?php else: ?>
     top.sideframe.location = "new_sidebar.php?sbctg=system_timeline&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
    <?php endif; ?>
   <?php endif; ?>
  <?php elseif ($this->_tpl_vars['T_CTG'] == 'module'): ?>
   top.sideframe.location = "new_sidebar.php?sbctg=<?php echo $this->_tpl_vars['T_MODULE_HIGHLIGHT']; ?>
&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
  <?php else: ?>
   top.sideframe.location = "new_sidebar.php?sbctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&new_lesson_id=<?php echo $_SESSION['s_lessons_ID']; ?>
";
  <?php endif; ?>
 <?php endif; ?>
<?php echo '
}
'; ?>



</script>



<script>var point2 = new Date().getTime();</script>
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
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'landing_page' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=landing_page">') : smarty_modifier_cat($_tmp, '?ctg=landing_page">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_LANDINGPAGE) : smarty_modifier_cat($_tmp, @_LANDINGPAGE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/landing_page.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'import' )): ?>
 <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=import'>".(@_IMPORT)."</a>"); ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/import.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'scorm' )): ?>
 <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=scorm'>".(@_SCORMOPTIONS)."</a>"); ?>
 <?php if ($_GET['scorm_review']): ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=scorm&scorm_review=1'>".(@_SCORMREVIEW)."</a>"); ?>
 <?php elseif ($_GET['scorm_import']): ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=scorm&scorm_import=1'>".(@_SCORMIMPORT)."</a>"); ?>
 <?php elseif ($_GET['scorm_export']): ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=scorm&scorm_export=1'>".(@_SCORMEXPORT)."</a>"); ?>
 <?php endif; ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/scorm.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'ims' )): ?>
 <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=ims'>".(@_IMSOPTIONS)."</a>"); ?>
 <?php if ($_GET['scorm_review']): ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=ims&scorm_review=1'>".(@_SCORMREVIEW)."</a>"); ?>
 <?php elseif ($_GET['scorm_import']): ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=ims&scorm_import=1'>".(@_SCORMIMPORT)."</a>"); ?>
 <?php elseif ($_GET['scorm_export']): ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=ims&scorm_export=1'>".(@_SCORMEXPORT)."</a>"); ?>
 <?php endif; ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/ims.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'lesson_information' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=lesson_information">') : smarty_modifier_cat($_tmp, '?ctg=lesson_information">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_LESSONINFORMATION) : smarty_modifier_cat($_tmp, @_LESSONINFORMATION)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php if ($_GET['edit_info']): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=lesson_information&edit_info=1">') : smarty_modifier_cat($_tmp, '?ctg=lesson_information&edit_info=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITLESSONINFORMATION) : smarty_modifier_cat($_tmp, @_EDITLESSONINFORMATION)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php endif; ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/lesson_information.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'progress' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=progress">') : smarty_modifier_cat($_tmp, '?ctg=progress">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_PROGRESS) : smarty_modifier_cat($_tmp, @_PROGRESS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php if ($_GET['edit_user']): ?>
  <?php $this->assign('formatted_login', ((is_array($_tmp=$this->_tpl_vars['T_USER_LESSONS_INFO']['users_LOGIN'])) ? $this->_run_mod_handler('formatLogin', true, $_tmp) : formatLogin($_tmp))); ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=progress&edit_user=".($_GET['edit_user'])."'>".(@_PROGRESSFORUSER).": ".($this->_tpl_vars['formatted_login'])."</a>"); ?>
 <?php endif; ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/progress.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'news' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=news">') : smarty_modifier_cat($_tmp, '?ctg=news">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ANNOUNCEMENTS) : smarty_modifier_cat($_tmp, @_ANNOUNCEMENTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>

   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/news.tpl", 'smarty_include_vars' => array()));
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
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'comments' )): ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/comments.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'content' )): ?>
 <?php if ($_GET['add']): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=content&add=1">') : smarty_modifier_cat($_tmp, '?ctg=content&add=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ADDCONTENT) : smarty_modifier_cat($_tmp, @_ADDCONTENT)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['edit']): ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=content&view_unit=".($_GET['edit'])."'>".($this->_tpl_vars['T_ENTITY_FORM']['name']['value'])."</a>"); ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=content&edit=') : smarty_modifier_cat($_tmp, '?ctg=content&edit=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit']) : smarty_modifier_cat($_tmp, $_GET['edit'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITCONTENT) : smarty_modifier_cat($_tmp, @_EDITCONTENT)))) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;<span class="innerTableName">&quot;') : smarty_modifier_cat($_tmp, '&nbsp;<span class="innerTableName">&quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_ENTITY_FORM']['name']['value']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_ENTITY_FORM']['name']['value'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</span></a>') : smarty_modifier_cat($_tmp, '&quot;</span></a>'))); ?>
 <?php elseif ($_GET['type'] == 'theory'): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, ' &raquo; <a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, ' &raquo; <a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=content&type=theory">') : smarty_modifier_cat($_tmp, '?ctg=content&type=theory">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_THEORY) : smarty_modifier_cat($_tmp, @_THEORY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['type'] == 'examples'): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, ' &raquo; <a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, ' &raquo; <a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=content&type=examples">') : smarty_modifier_cat($_tmp, '?ctg=content&type=examples">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EXAMPLES) : smarty_modifier_cat($_tmp, @_EXAMPLES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['type'] == 'tests'): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, ' &raquo; <a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, ' &raquo; <a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=content&type=tests">') : smarty_modifier_cat($_tmp, '?ctg=content&type=tests">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_TESTS) : smarty_modifier_cat($_tmp, @_TESTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif (! $this->_tpl_vars['T_UNIT']): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, ' &raquo; <a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, ' &raquo; <a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=content">') : smarty_modifier_cat($_tmp, '?ctg=content">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_CONTENT) : smarty_modifier_cat($_tmp, @_CONTENT)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php else: ?>
  <?php unset($this->_sections['parents_list']);
$this->_sections['parents_list']['name'] = 'parents_list';
$this->_sections['parents_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_PARENT_LIST']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['parents_list']['step'] = ((int)"-1") == 0 ? 1 : (int)"-1";
$this->_sections['parents_list']['show'] = true;
$this->_sections['parents_list']['max'] = $this->_sections['parents_list']['loop'];
$this->_sections['parents_list']['start'] = $this->_sections['parents_list']['step'] > 0 ? 0 : $this->_sections['parents_list']['loop']-1;
if ($this->_sections['parents_list']['show']) {
    $this->_sections['parents_list']['total'] = min(ceil(($this->_sections['parents_list']['step'] > 0 ? $this->_sections['parents_list']['loop'] - $this->_sections['parents_list']['start'] : $this->_sections['parents_list']['start']+1)/abs($this->_sections['parents_list']['step'])), $this->_sections['parents_list']['max']);
    if ($this->_sections['parents_list']['total'] == 0)
        $this->_sections['parents_list']['show'] = false;
} else
    $this->_sections['parents_list']['total'] = 0;
if ($this->_sections['parents_list']['show']):

            for ($this->_sections['parents_list']['index'] = $this->_sections['parents_list']['start'], $this->_sections['parents_list']['iteration'] = 1;
                 $this->_sections['parents_list']['iteration'] <= $this->_sections['parents_list']['total'];
                 $this->_sections['parents_list']['index'] += $this->_sections['parents_list']['step'], $this->_sections['parents_list']['iteration']++):
$this->_sections['parents_list']['rownum'] = $this->_sections['parents_list']['iteration'];
$this->_sections['parents_list']['index_prev'] = $this->_sections['parents_list']['index'] - $this->_sections['parents_list']['step'];
$this->_sections['parents_list']['index_next'] = $this->_sections['parents_list']['index'] + $this->_sections['parents_list']['step'];
$this->_sections['parents_list']['first']      = ($this->_sections['parents_list']['iteration'] == 1);
$this->_sections['parents_list']['last']       = ($this->_sections['parents_list']['iteration'] == $this->_sections['parents_list']['total']);
?>
   <?php $this->assign('truncated_name', ((is_array($_tmp=$this->_tpl_vars['T_PARENT_LIST'][$this->_sections['parents_list']['index']]['name'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 40) : smarty_modifier_eF_truncate($_tmp, 40))); ?>
   <?php if ($this->_tpl_vars['T_PARENT_LIST'][$this->_sections['parents_list']['index']]['data'] != '' || $this->_tpl_vars['T_PARENT_LIST'][$this->_sections['parents_list']['index']]['ctg_type'] == 'tests'): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = \"titleLink\" href = \"".($_SERVER['PHP_SELF'])."?ctg=content&view_unit=".($this->_tpl_vars['T_PARENT_LIST'][$this->_sections['parents_list']['index']]['id'])."\" title = \"".($this->_tpl_vars['T_PARENT_LIST'][$this->_sections['parents_list']['index']]['name'])."\">".($this->_tpl_vars['truncated_name'])."</a>"); ?>
   <?php elseif ($this->_tpl_vars['T_SCORM_2004_TITLE']): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = \"inactiveLink\" href = \"javascript:void(0)\" title = \"".($this->_tpl_vars['T_PARENT_LIST'][$this->_sections['parents_list']['index']]['name'])."\">".($this->_tpl_vars['truncated_name'])."</a>"); ?>
   <?php else: ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = \"inactiveLink\" href = \"javascript:void(0)\" title = \"".($this->_tpl_vars['T_PARENT_LIST'][$this->_sections['parents_list']['index']]['name'])." (".(@_EMPTYUNIT).")\">".($this->_tpl_vars['truncated_name'])."</a>"); ?>
   <?php endif; ?>
  <?php endfor; endif; ?>
 <?php endif; ?>

 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/common_content.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'metadata' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=content&view_unit=') : smarty_modifier_cat($_tmp, '?ctg=content&view_unit=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['view_unit']) : smarty_modifier_cat($_tmp, $_GET['view_unit'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_UNIT']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_UNIT']['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=content&op=metadata&view_unit=') : smarty_modifier_cat($_tmp, '?ctg=content&op=metadata&view_unit=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['view_unit']) : smarty_modifier_cat($_tmp, $_GET['view_unit'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_CONTENTMETADATA) : smarty_modifier_cat($_tmp, @_CONTENTMETADATA)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/metadata.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'copy' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=copy">') : smarty_modifier_cat($_tmp, '?ctg=copy">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_COPYFROMANOTHERLESSON) : smarty_modifier_cat($_tmp, @_COPYFROMANOTHERLESSON)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/copy.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'order' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=order">') : smarty_modifier_cat($_tmp, '?ctg=order">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_LINEARCONTENT) : smarty_modifier_cat($_tmp, @_LINEARCONTENT)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/order.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'file_manager' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=file_manager">') : smarty_modifier_cat($_tmp, '?ctg=file_manager">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_FILES) : smarty_modifier_cat($_tmp, @_FILES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/file_manager.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'scheduling' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=scheduling">') : smarty_modifier_cat($_tmp, '?ctg=scheduling">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SCHEDULING) : smarty_modifier_cat($_tmp, @_SCHEDULING)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/scheduling.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'projects' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=projects">') : smarty_modifier_cat($_tmp, '?ctg=projects">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_PROJECTS) : smarty_modifier_cat($_tmp, @_PROJECTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php if ($_GET['add_project']): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=projects&add_project=1">') : smarty_modifier_cat($_tmp, '?ctg=projects&add_project=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ADDPROJECT) : smarty_modifier_cat($_tmp, @_ADDPROJECT)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['edit_project']): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=projects&edit_project=') : smarty_modifier_cat($_tmp, '?ctg=projects&edit_project=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_project']) : smarty_modifier_cat($_tmp, $_GET['edit_project'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITPROJECT) : smarty_modifier_cat($_tmp, @_EDITPROJECT)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' <span class= "innerTableName">&quot;') : smarty_modifier_cat($_tmp, ' <span class= "innerTableName">&quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_PROJECT']->project['title']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_PROJECT']->project['title'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</span></a>') : smarty_modifier_cat($_tmp, '&quot;</span></a>'))); ?>
 <?php elseif ($_GET['project_results']): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=projects&project_results=') : smarty_modifier_cat($_tmp, '?ctg=projects&project_results=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['project_results']) : smarty_modifier_cat($_tmp, $_GET['project_results'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_RESULTSFORPROJECT) : smarty_modifier_cat($_tmp, @_RESULTSFORPROJECT)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' &quot;') : smarty_modifier_cat($_tmp, ' &quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_PROJECT']->project['title']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_PROJECT']->project['title'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</a>') : smarty_modifier_cat($_tmp, '&quot;</a>'))); ?>
 <?php elseif ($_GET['view_project']): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=projects&view_project=') : smarty_modifier_cat($_tmp, '?ctg=projects&view_project=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['view_project']) : smarty_modifier_cat($_tmp, $_GET['view_project'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_VIEWPROJECT) : smarty_modifier_cat($_tmp, @_VIEWPROJECT)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' &quot;') : smarty_modifier_cat($_tmp, ' &quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_PROJECT']->project['title']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_PROJECT']->project['title'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</a>') : smarty_modifier_cat($_tmp, '&quot;</a>'))); ?>
 <?php endif; ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/projects.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'rules' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=rules">') : smarty_modifier_cat($_tmp, '?ctg=rules">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_LESSONRULES) : smarty_modifier_cat($_tmp, @_LESSONRULES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php if ($_GET['add_rule']): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=rules&add_rule=1" >') : smarty_modifier_cat($_tmp, '?ctg=rules&add_rule=1" >')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ADDRULE) : smarty_modifier_cat($_tmp, @_ADDRULE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['edit_rule']): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=rules&edit_rule=') : smarty_modifier_cat($_tmp, '?ctg=rules&edit_rule=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_rule']) : smarty_modifier_cat($_tmp, $_GET['edit_rule'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '" >') : smarty_modifier_cat($_tmp, '" >')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_RULEPROPERTIES) : smarty_modifier_cat($_tmp, @_RULEPROPERTIES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['add_condition']): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=rules&tab=conditions&add_condition=1">') : smarty_modifier_cat($_tmp, '?ctg=rules&tab=conditions&add_condition=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ADDCONDITION) : smarty_modifier_cat($_tmp, @_ADDCONDITION)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['edit_condition']): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=rules&tab=conditions&edit_condition=') : smarty_modifier_cat($_tmp, '?ctg=rules&tab=conditions&edit_condition=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_condition']) : smarty_modifier_cat($_tmp, $_GET['edit_condition'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITCONDITION) : smarty_modifier_cat($_tmp, @_EDITCONDITION)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php endif; ?>

 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/rules.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'glossary' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=glossary">') : smarty_modifier_cat($_tmp, '?ctg=glossary">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_GLOSSARY) : smarty_modifier_cat($_tmp, @_GLOSSARY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/glossary.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'lessons' )): ?>

 <?php if ($this->_tpl_vars['title'] == ""): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a class = "titleLink" href ="')) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=lessons">') : smarty_modifier_cat($_tmp, '?ctg=lessons">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_MYCOURSES) : smarty_modifier_cat($_tmp, @_MYCOURSES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php endif; ?>
 <?php if ($this->_tpl_vars['T_OP'] == 'tests'): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=lessons&op=tests">') : smarty_modifier_cat($_tmp, '?ctg=lessons&op=tests">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SKILLGAPTESTS) : smarty_modifier_cat($_tmp, @_SKILLGAPTESTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php if (isset ( $_GET['solve_test'] )): ?>
   <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=lessons&op=tests&solve_test=') : smarty_modifier_cat($_tmp, '?ctg=lessons&op=tests&solve_test=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['solve_test']) : smarty_modifier_cat($_tmp, $_GET['solve_test'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_TEST_DATA']->test['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_TEST_DATA']->test['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
   <?php if ($_GET['test_analysis']): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=content&view_unit=".($_GET['view_unit'])."&test_analysis=1'>".(@_TESTANALYSISFORTEST)." &quot;".($this->_tpl_vars['T_TEST_DATA']->test['name'])."&quot;</a>"); ?>
   <?php endif; ?>
  <?php endif; ?>
 <?php else: ?>

  <?php if ($_GET['course']): ?>
   <?php $this->assign('title', "<a class = 'titleLink' title = '".(@_CHANGELESSON)."' href = '".($_SERVER['PHP_SELF'])."?ctg=lessons' onclick = '".($this->_tpl_vars['title_onclick'])."'>".(@_MYCOURSES)."</a><span>&nbsp;&raquo;&nbsp;</span>"); ?>
   <?php if ($this->_tpl_vars['T_OP'] == course_info): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=course_info'>".(@_INFORMATIONFORCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
   <?php elseif ($this->_tpl_vars['T_OP'] == course_certificates): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=course_certificates'>".(@_COMPLETION)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
   <?php elseif ($this->_tpl_vars['T_OP'] == format_certificate): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=format_certificate'>".(@_FORMATCERTIFICATEFORCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
   <?php elseif ($this->_tpl_vars['T_OP'] == format_certificate_docx): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=format_certificate_docx'>".(@_FORMATCERTIFICATEFORCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
   <?php elseif ($this->_tpl_vars['T_OP'] == course_rules): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=course_rules'>".(@_RULESFORCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
   <?php elseif ($this->_tpl_vars['T_OP'] == course_order): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=course_order'>".(@_ORDERFORCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
   <?php elseif ($this->_tpl_vars['T_OP'] == course_scheduling): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=course_scheduling'>".(@_SCHEDULINGFORCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
   <?php elseif ($this->_tpl_vars['T_OP'] == export_course): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=export_course'>".(@_EXPORTCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
   <?php elseif ($this->_tpl_vars['T_OP'] == import_course): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=import_course'>".(@_IMPORTCOURSE)." &quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</a>"); ?>
   <?php elseif ($this->_tpl_vars['T_MODULE_TABPAGE']): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?".($this->_tpl_vars['T_BASE_URL'])."&op=".($this->_tpl_vars['T_MODULE_TABPAGE']['tab_page'])."'>".($this->_tpl_vars['T_MODULE_TABPAGE']['title'])."</a>"); ?>
   <?php endif; ?>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['T_OP'] == 'search'): ?>
   <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="javascript:void(0)">') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="javascript:void(0)">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SEARCHRESULTS) : smarty_modifier_cat($_tmp, @_SEARCHRESULTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php endif; ?>
 <?php endif; ?>
 <?php if ($_GET['catalog']): ?>
  <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=lessons&catalog=1'>".(@_COURSECATALOG)."</a>"); ?>
  <?php if ($_GET['checkout']): ?>
   <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=lessons&catalog=1&checkout=1'>".(@_REVIEWANDCHECKOUT)."</a>"); ?>
  <?php endif; ?>
 <?php endif; ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/lessons_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'survey' )): ?>

  <?php if (( ! isset ( $_GET['screen_survey'] ) && ! isset ( $_GET['action'] ) && $_GET['screen_survey'] != '2' )): ?>
   <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEYS) : smarty_modifier_cat($_tmp, @_SURVEYS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
   <?php if (( isset ( $_GET['t_enter_create'] ) && $_GET['t_enter_create'] == '1' )): ?>
    <?php $this->assign('T_MESSAGE', @_SURVEYADDEDSUCCESSFULLY); ?>
    <?php $this->assign('T_MESSAGE_TYPE', 'success'); ?>
   <?php elseif (( isset ( $this->_tpl_vars['T_ENTER_CREATE'] ) && $this->_tpl_vars['T_ENTER_CREATE'] == '-1' )): ?>
    <?php $this->assign('T_MESSAGE', @_FAILEDTOADDSURVEY); ?>
   <?php endif; ?>

   <?php if (( isset ( $_GET['t_enter_delete'] ) && $_GET['t_enter_delete'] == '1' )): ?>
    <?php $this->assign('T_MESSAGE', @_SURVEYDELETEDSUCCESSFULLY); ?>
    <?php $this->assign('T_MESSAGE_TYPE', 'success'); ?>
   <?php elseif (( isset ( $_GET['t_enter_delete'] ) && $_GET['t_enter_delete'] == '-1' )): ?>
    <?php $this->assign('T_MESSAGE', @_SURVEYFAILEDTOBEDELETED); ?>
   <?php else: ?>
   <?php endif; ?>
   <?php if (( isset ( $_GET['t_enter_update'] ) && $_GET['t_enter_update'] == '1' )): ?>
       <?php $this->assign('T_MESSAGE', @_SURVEYDATAUPDATEDSUCCESSFULLY); ?>
       <?php $this->assign('T_MESSAGE_TYPE', 'success'); ?>
   <?php elseif (( isset ( $_GET['t_enter_update'] ) && $_GET['t_enter_update'] == '-1' )): ?>
    <?php $this->assign('T_MESSAGE', @_SURVEYDATAFAILEDTOBEUPDATED); ?>
   <?php else: ?>
   <?php endif; ?>
   <?php if (( isset ( $_GET['published'] ) && $_GET['published'] == '1' )): ?>
    <?php $this->assign('T_MESSAGE', @_SURVEYPUBLISHEDSUCCESSFULLY); ?>
    <?php $this->assign('T_MESSAGE_TYPE', 'success'); ?>
   <?php elseif (( isset ( $_GET['published'] ) && $_GET['published'] == '-1' )): ?>
    <?php $this->assign('T_MESSAGE', @_SURVEYFAILEDTOBEPUBLISHED); ?>
   <?php else: ?>
   <?php endif; ?>
   <?php if (( isset ( $_GET['t_activate'] ) && $_GET['t_activate'] == '-1' )): ?>
    <?php $this->assign('T_MESSAGE', @_SURVEYDISABLEDSUCCESSFULLY); ?>
    <?php $this->assign('T_MESSAGE_TYPE', 'success'); ?>
   <?php elseif (( isset ( $_GET['t_activate'] ) && $_GET['t_activate'] == '1' )): ?>
    <?php $this->assign('T_MESSAGE', @_SURVEYENABLEDSUCCESSFULLY); ?>
    <?php $this->assign('T_MESSAGE_TYPE', 'success'); ?>
   <?php else: ?>
   <?php endif; ?>
   <?php if (( $_GET['survey_user'] == 'false' )): ?>
    <?php $this->assign('T_MESSAGE', @_AUSERISALREADYATTHESURVEY); ?>
   <?php endif; ?>
  <?php endif; ?>

 <?php if (( isset ( $_GET['screen_survey'] ) && ! isset ( $_GET['action'] ) && $_GET['screen_survey'] == '2' )): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2">') : smarty_modifier_cat($_tmp, '&screen_survey=2">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_QUESTIONS) : smarty_modifier_cat($_tmp, @_QUESTIONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php if (( isset ( $_GET['t_question_added'] ) && $_GET['t_question_added'] == '1' )): ?>
     <?php $this->assign('T_MESSAGE', @_QUESTIONADDEDSUCCESSFULLY); ?>
     <?php $this->assign('T_MESSAGE_TYPE', 'success'); ?>
  <?php elseif (( isset ( $_GET['t_question_added'] ) && $_GET['t_question_added'] == '-1' )): ?>
   <?php $this->assign('T_MESSAGE', @_QUESTIONFAILEDTOBEADDED); ?>
  <?php else: ?>
  <?php endif; ?>
  <?php if (( isset ( $_GET['question_added'] ) && $_GET['question_added'] == '1' )): ?>
   <?php $this->assign('T_MESSAGE', @_QUESTIONADDEDSUCCESSFULLY); ?>
   <?php $this->assign('T_MESSAGE_TYPE', 'success'); ?>
  <?php elseif (( isset ( $_GET['question_added'] ) && $_GET['question_added'] == '-1' )): ?>
   <?php $this->assign('T_MESSAGE', @_QUESTIONFAILEDTOBEADDED); ?>
  <?php else: ?>
  <?php endif; ?>
  <?php if (( isset ( $_GET['question_deleted'] ) && $_GET['question_deleted'] == '1' )): ?>
   <?php $this->assign('T_MESSAGE', @_QUESTIONDELETEDSUCCESSFULLY); ?>
   <?php $this->assign('T_MESSAGE_TYPE', 'success'); ?>
  <?php elseif (( isset ( $_GET['question_deleted'] ) && $_GET['question_deleted'] == '-1' )): ?>
   <?php $this->assign('T_MESSAGE', @_QUESTIONFAILEDTOBEDELETED); ?>
  <?php else: ?>
  <?php endif; ?>
  <?php if (( isset ( $_GET['question_swap'] ) && $_GET['question_swap'] == '1' )): ?>
   <?php $this->assign('T_MESSAGE', @_THEQUESTIONWASSUCCESSFULLYMOVED); ?>
   <?php $this->assign('T_MESSAGE_TYPE', 'success'); ?>
  <?php elseif (( isset ( $_GET['question_swap'] ) && $_GET['question_swap'] == '-1' )): ?>
   <?php $this->assign('T_MESSAGE', @_THEQUESTIONFAILEDTOBEMOVED); ?>
  <?php elseif (( isset ( $_GET['question_swap'] ) && $_GET['question_swap'] == '-2' )): ?>
   <?php $this->assign('T_MESSAGE', @_NOSUCHOPERATION); ?>
  <?php else: ?>
  <?php endif; ?>
  <?php if (( isset ( $_GET['question_updated'] ) && $_GET['question_updated'] == '1' )): ?>
   <?php $this->assign('T_MESSAGE', @_QUESTIONUPDATEDSUCCESSFULLY); ?>
   <?php $this->assign('T_MESSAGE_TYPE', 'success'); ?>
  <?php elseif (( isset ( $_GET['question_updated'] ) && $_GET['question_updated'] == '-1' )): ?>
   <?php $this->assign('T_MESSAGE', @_QUESTIONFAILEDTOBEUPDATED); ?>
  <?php else: ?>
  <?php endif; ?>
 <?php endif; ?>

  <?php if (( $_GET['action'] == 'question_create' )): ?>
   <?php if (( isset ( $_GET['question_type'] ) && $_GET['question_type'] == '-' )): ?>
    <?php $this->assign('T_MESSAGE', @_PLEASESELECTAVALIDTYPEOFQUESTION); ?>
   <?php else: ?>
    <?php if (( $_GET['question_type'] == 'dropdown' )): ?>
     <?php if (( $_GET['question_action'] == 'update_question' )): ?>
      <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a  class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a  class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2">') : smarty_modifier_cat($_tmp, '&screen_survey=2">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_QUESTIONS) : smarty_modifier_cat($_tmp, @_QUESTIONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['REQUEST_URI']) : smarty_modifier_cat($_tmp, $_SERVER['REQUEST_URI'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_DROPDOWN) : smarty_modifier_cat($_tmp, @_DROPDOWN)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
     <?php else: ?>
      <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2">') : smarty_modifier_cat($_tmp, '&screen_survey=2">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_QUESTIONS) : smarty_modifier_cat($_tmp, @_QUESTIONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2&question_type=dropdown&action=question_create">') : smarty_modifier_cat($_tmp, '&screen_survey=2&question_type=dropdown&action=question_create">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_DROPDOWN) : smarty_modifier_cat($_tmp, @_DROPDOWN)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
     <?php endif; ?>
    <?php endif; ?>
    <?php if (( $_GET['question_type'] == 'development' )): ?>
     <?php if (( $_GET['question_action'] == 'update_question' )): ?>
      <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a  class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a  class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2">') : smarty_modifier_cat($_tmp, '&screen_survey=2">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_QUESTIONS) : smarty_modifier_cat($_tmp, @_QUESTIONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['REQUEST_URI']) : smarty_modifier_cat($_tmp, $_SERVER['REQUEST_URI'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_DEVELOPMENT) : smarty_modifier_cat($_tmp, @_DEVELOPMENT)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
     <?php else: ?>
      <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2">') : smarty_modifier_cat($_tmp, '&screen_survey=2">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_QUESTIONS) : smarty_modifier_cat($_tmp, @_QUESTIONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2&question_type=development&action=question_create">') : smarty_modifier_cat($_tmp, '&screen_survey=2&question_type=development&action=question_create">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_DEVELOPMENT) : smarty_modifier_cat($_tmp, @_DEVELOPMENT)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
     <?php endif; ?>
      <?php endif; ?>
      <?php if (( $_GET['question_type'] == 'yes_no' )): ?>
     <?php if (( $_GET['question_action'] == 'update_question' )): ?>
      <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a  class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a  class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2">') : smarty_modifier_cat($_tmp, '&screen_survey=2">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_QUESTIONS) : smarty_modifier_cat($_tmp, @_QUESTIONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['REQUEST_URI']) : smarty_modifier_cat($_tmp, $_SERVER['REQUEST_URI'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_YES_NO) : smarty_modifier_cat($_tmp, @_YES_NO)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
     <?php else: ?>
      <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2">') : smarty_modifier_cat($_tmp, '&screen_survey=2">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_QUESTIONS) : smarty_modifier_cat($_tmp, @_QUESTIONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2&question_type=yes_no&action=question_create">') : smarty_modifier_cat($_tmp, '&screen_survey=2&question_type=yes_no&action=question_create">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_YES_NO) : smarty_modifier_cat($_tmp, @_YES_NO)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
     <?php endif; ?>
      <?php endif; ?>
      <?php if (( $_GET['question_type'] == 'multiple_one' )): ?>
     <?php if (( $_GET['question_action'] == 'update_question' )): ?>
      <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a  class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a  class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2">') : smarty_modifier_cat($_tmp, '&screen_survey=2">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_QUESTIONS) : smarty_modifier_cat($_tmp, @_QUESTIONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['REQUEST_URI']) : smarty_modifier_cat($_tmp, $_SERVER['REQUEST_URI'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEYQUESTIONMULTIPLEONE) : smarty_modifier_cat($_tmp, @_SURVEYQUESTIONMULTIPLEONE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
     <?php else: ?>
      <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2">') : smarty_modifier_cat($_tmp, '&screen_survey=2">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_QUESTIONS) : smarty_modifier_cat($_tmp, @_QUESTIONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2&question_type=multiple_one&action=question_create">') : smarty_modifier_cat($_tmp, '&screen_survey=2&question_type=multiple_one&action=question_create">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEYQUESTIONMULTIPLEONE) : smarty_modifier_cat($_tmp, @_SURVEYQUESTIONMULTIPLEONE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
     <?php endif; ?>
      <?php endif; ?>
      <?php if (( $_GET['question_type'] == 'multiple_many' )): ?>
     <?php if (( $_GET['question_action'] == 'update_question' )): ?>
      <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a  class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a  class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2">') : smarty_modifier_cat($_tmp, '&screen_survey=2">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_QUESTIONS) : smarty_modifier_cat($_tmp, @_QUESTIONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['REQUEST_URI']) : smarty_modifier_cat($_tmp, $_SERVER['REQUEST_URI'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEYQUESTIONMULTIPLEMANY) : smarty_modifier_cat($_tmp, @_SURVEYQUESTIONMULTIPLEMANY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
     <?php else: ?>
      <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a  class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a  class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2">') : smarty_modifier_cat($_tmp, '&screen_survey=2">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_QUESTIONS) : smarty_modifier_cat($_tmp, @_QUESTIONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&screen_survey=2&question_type=multiple_many&action=question_create">') : smarty_modifier_cat($_tmp, '&screen_survey=2&question_type=multiple_many&action=question_create">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEYQUESTIONMULTIPLEMANY) : smarty_modifier_cat($_tmp, @_SURVEYQUESTIONMULTIPLEMANY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
     <?php endif; ?>
      <?php endif; ?>
   <?php endif; ?>
  <?php endif; ?>

  <?php if (( $_GET['action'] == 'create_survey' && $_GET['screen'] == '1' )): ?>
   <?php if (( $_GET['survey_action'] == 'create' )): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=create&screen=1&lessons_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=create&screen=1&lessons_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['lessons_ID']) : smarty_modifier_cat($_tmp, $_GET['lessons_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_CREATESURVEY) : smarty_modifier_cat($_tmp, @_CREATESURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
   <?php endif; ?>
   <?php if (( $_GET['survey_action'] == 'update' )): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a  class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITSURVEY) : smarty_modifier_cat($_tmp, @_EDITSURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
   <?php endif; ?>
  <?php endif; ?>

  <?php if (( $_GET['action'] == 'preview' )): ?>
   <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['REQUEST_URI']) : smarty_modifier_cat($_tmp, $_SERVER['REQUEST_URI'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_PREVIEW) : smarty_modifier_cat($_tmp, @_PREVIEW)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php endif; ?>

  <?php if (( isset ( $_GET['action'] ) && $_GET['action'] == 'view_users' )): ?>
   <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['REQUEST_URI']) : smarty_modifier_cat($_tmp, $_SERVER['REQUEST_URI'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_DONESURVEYUSERS) : smarty_modifier_cat($_tmp, @_DONESURVEYUSERS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php endif; ?>

  <?php if (( isset ( $_GET['action'] ) && $_GET['action'] == 'survey_preview' )): ?>
   <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['REQUEST_URI']) : smarty_modifier_cat($_tmp, $_SERVER['REQUEST_URI'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEYPREVIEWFORUSER) : smarty_modifier_cat($_tmp, @_SURVEYPREVIEWFORUSER)))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['user']) : smarty_modifier_cat($_tmp, $_GET['user'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php endif; ?>

  <?php if (( isset ( $_GET['action'] ) && $_GET['action'] == 'statistics' )): ?>
   <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['REQUEST_URI']) : smarty_modifier_cat($_tmp, $_SERVER['REQUEST_URI'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_STATISTICS) : smarty_modifier_cat($_tmp, @_STATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php endif; ?>
  <?php if (( isset ( $_GET['action'] ) && $_GET['action'] == 'publish' )): ?>
   <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey">') : smarty_modifier_cat($_tmp, '?ctg=survey">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SURVEY) : smarty_modifier_cat($_tmp, @_SURVEY)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&action=create_survey&survey_action=update&screen=1&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SURVEYNAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SURVEYNAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=survey&surveys_ID=') : smarty_modifier_cat($_tmp, '?ctg=survey&surveys_ID=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['surveys_ID']) : smarty_modifier_cat($_tmp, $_GET['surveys_ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&action=publish">') : smarty_modifier_cat($_tmp, '&action=publish">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_PUBLISH) : smarty_modifier_cat($_tmp, @_PUBLISH)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php endif; ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "professor/survey.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php endif; ?>

<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'tests' )): ?>       <?php ob_start(); ?>
       <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=tests">') : smarty_modifier_cat($_tmp, '?ctg=tests">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_TESTS) : smarty_modifier_cat($_tmp, @_TESTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
       <?php if ($_GET['edit_test']): ?>
        <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&edit_test=".($_GET['edit_test'])."'>".(@_EDITTEST)." <span class='innerTableName'>&quot;".($this->_tpl_vars['T_CURRENT_TEST']->test['name'])."&quot;</span></a>"); ?>
       <?php elseif ($_GET['add_test']): ?>
        <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&add_test=1'>".(@_ADDTEST)."</a>"); ?>
       <?php elseif ($_GET['edit_question']): ?>
        <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&edit_question=".($_GET['edit_question'])."&question_type=".($_GET['question_type'])."'>".(@_EDITQUESTION)."</a>"); ?>
       <?php elseif ($_GET['add_question']): ?>
        <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&add_question=1&question_type=".($_GET['question_type'])."'>".(@_ADDQUESTION)."</a>"); ?>
       <?php elseif ($_GET['test_results']): ?>
        <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&test_results=".($_GET['test_results'])."'>&quot;".($this->_tpl_vars['T_TEST']->test['name'])."&quot; ".(@_RESULTS)."</a>"); ?>
       <?php elseif ($_GET['view_unit']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?view_unit=') : smarty_modifier_cat($_tmp, '?view_unit=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['view_unit']) : smarty_modifier_cat($_tmp, $_GET['view_unit'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_PREVIEW) : smarty_modifier_cat($_tmp, @_PREVIEW)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
       <?php elseif ($_GET['show_solved_test']): ?>
        <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&test_results=".($this->_tpl_vars['T_TEST_DATA']->completedTest['testsId'])."'>".(@_TESTRESULTS)."</a>"); ?>
        <?php if (! $_GET['test_analysis']): ?>
         <?php $this->assign('formatted_login', ((is_array($_tmp=$this->_tpl_vars['T_TEST_DATA']->completedTest['login'])) ? $this->_run_mod_handler('formatLogin', true, $_tmp) : formatLogin($_tmp))); ?>
         <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&show_solved_test=".($this->_tpl_vars['T_TEST_DATA']->completedTest['id'])."'>".(@_VIEWSOLVEDTEST).": &quot;".($this->_tpl_vars['T_TEST_DATA']->test['name'])."&quot; ".(@_BYUSER).": ".($this->_tpl_vars['formatted_login'])."</a>"); ?>
        <?php else: ?>
         <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=tests&show_solved_test=') : smarty_modifier_cat($_tmp, '?ctg=tests&show_solved_test=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['show_solved_test']) : smarty_modifier_cat($_tmp, $_GET['show_solved_test'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&test_analysis=') : smarty_modifier_cat($_tmp, '&test_analysis=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['test_analysis']) : smarty_modifier_cat($_tmp, $_GET['test_analysis'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&user=') : smarty_modifier_cat($_tmp, '&user=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['user']) : smarty_modifier_cat($_tmp, $_GET['user'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_USERRESULTS) : smarty_modifier_cat($_tmp, @_USERRESULTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php endif; ?>
       <?php endif; ?>
       <tr><td class = "moduleCell">

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/module_tests.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
       </td></tr>
      <?php $this->_smarty_vars['capture']['moduleTests'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'feedback' )): ?>       <?php ob_start(); ?>
       <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=feedback">') : smarty_modifier_cat($_tmp, '?ctg=feedback">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_FEEDBACK) : smarty_modifier_cat($_tmp, @_FEEDBACK)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
       <?php if ($_GET['edit_test']): ?>
        <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=feedback&edit_test=".($_GET['edit_test'])."'>".(@_EDITFEEDBACK)." <span class='innerTableName'>&quot;".($this->_tpl_vars['T_CURRENT_TEST']->test['name'])."&quot;</span></a>"); ?>
       <?php elseif ($_GET['add_test']): ?>
        <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=feedback&add_test=1'>".(@_ADDFEEDBACSFEEDBACK)."</a>"); ?>
       <?php elseif ($_GET['edit_question']): ?>
        <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=feedback&edit_question=".($_GET['edit_question'])."&question_type=".($_GET['question_type'])."'>".(@_EDITQUESTION)."</a>"); ?>
       <?php elseif ($_GET['add_question']): ?>
        <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=feedback&add_question=1&question_type=".($_GET['question_type'])."'>".(@_ADDQUESTION)."</a>"); ?>
       <?php elseif ($_GET['test_results']): ?>
        <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=feedback&test_results=".($_GET['test_results'])."'>&quot;".($this->_tpl_vars['T_TEST']->test['name'])."&quot; ".(@_RESULTS)."</a>"); ?>
       <?php elseif ($_GET['view_unit']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?view_unit=') : smarty_modifier_cat($_tmp, '?view_unit=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['view_unit']) : smarty_modifier_cat($_tmp, $_GET['view_unit'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_PREVIEW) : smarty_modifier_cat($_tmp, @_PREVIEW)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
       <?php elseif ($_GET['show_solved_test']): ?>
        <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=feedback&test_results=".($this->_tpl_vars['T_TEST_DATA']->completedTest['testsId'])."'>".(@_FEEDBACKRESULTS)."</a>"); ?>
        <?php if (! $_GET['test_analysis']): ?>
         <?php $this->assign('formatted_login', ((is_array($_tmp=$this->_tpl_vars['T_TEST_DATA']->completedTest['login'])) ? $this->_run_mod_handler('formatLogin', true, $_tmp) : formatLogin($_tmp))); ?>
         <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=feedback&show_solved_test=".($this->_tpl_vars['T_TEST_DATA']->completedTest['id'])."'>".(@_VIEWFEEDBACK).": &quot;".($this->_tpl_vars['T_TEST_DATA']->test['name'])."&quot; ".(@_BYUSER).": ".($this->_tpl_vars['formatted_login'])."</a>"); ?>
        <?php else: ?>
         <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=feedback&show_solved_test=') : smarty_modifier_cat($_tmp, '?ctg=feedback&show_solved_test=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['show_solved_test']) : smarty_modifier_cat($_tmp, $_GET['show_solved_test'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&test_analysis=') : smarty_modifier_cat($_tmp, '&test_analysis=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['test_analysis']) : smarty_modifier_cat($_tmp, $_GET['test_analysis'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&user=') : smarty_modifier_cat($_tmp, '&user=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['user']) : smarty_modifier_cat($_tmp, $_GET['user'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_USERRESULTS) : smarty_modifier_cat($_tmp, @_USERRESULTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php endif; ?>
       <?php endif; ?>
       <tr><td class = "moduleCell">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/module_tests.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
       </td></tr>
      <?php $this->_smarty_vars['capture']['moduleFeedback'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'calendar' )): ?>
 <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=calendar">') : smarty_modifier_cat($_tmp, '?ctg=calendar">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_CALENDAR) : smarty_modifier_cat($_tmp, @_CALENDAR)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/calendar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'settings' )): ?>
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

 <?php ob_start(); ?>
 <tr><td class = "moduleCell">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/lesson_settings.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 </td></tr>
 <?php $this->_smarty_vars['capture']['moduleLessonSettings'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'courses' )): ?>
 <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=courses'>".(@_COURSES)."</a>"); ?>
 <?php if ($_GET['edit_course']): ?>
     <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=courses&edit_course=') : smarty_modifier_cat($_tmp, '?ctg=courses&edit_course=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_course']) : smarty_modifier_cat($_tmp, $_GET['edit_course'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITCOURSE) : smarty_modifier_cat($_tmp, @_EDITCOURSE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;<span class="innerTableName">&quot;') : smarty_modifier_cat($_tmp, '&nbsp;<span class="innerTableName">&quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_COURSE_FORM']['name']['value']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_COURSE_FORM']['name']['value'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</span></a>') : smarty_modifier_cat($_tmp, '&quot;</span></a>'))); ?>
 <?php elseif ($_GET['add_course']): ?>
     <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=courses&add_course=1">') : smarty_modifier_cat($_tmp, '?ctg=courses&add_course=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_NEWCOURSE) : smarty_modifier_cat($_tmp, @_NEWCOURSE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php endif; ?>
 <tr><td class = "moduleCell">
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/professor_courses.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 </td></tr>
<?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'professor_lessons' )): ?>
    <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=professor_lessons">') : smarty_modifier_cat($_tmp, '?ctg=professor_lessons">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_LESSONS) : smarty_modifier_cat($_tmp, @_LESSONS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
    <?php if ($_GET['edit_lesson']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=professor_lessons&edit_lesson=') : smarty_modifier_cat($_tmp, '?ctg=professor_lessons&edit_lesson=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['edit_lesson']) : smarty_modifier_cat($_tmp, $_GET['edit_lesson'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_EDITLESSON) : smarty_modifier_cat($_tmp, @_EDITLESSON)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' <span class = "innerTableName">&quot;') : smarty_modifier_cat($_tmp, ' <span class = "innerTableName">&quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_LESSON_FORM']['name']['value']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_LESSON_FORM']['name']['value'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</span></a>') : smarty_modifier_cat($_tmp, '&quot;</span></a>'))); ?>
    <?php elseif ($_GET['lesson_info']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=professor_lessons&lesson_info=') : smarty_modifier_cat($_tmp, '?ctg=professor_lessons&lesson_info=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['lesson_info']) : smarty_modifier_cat($_tmp, $_GET['lesson_info'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_INFORMATIONFORLESSON) : smarty_modifier_cat($_tmp, @_INFORMATIONFORLESSON)))) ? $this->_run_mod_handler('cat', true, $_tmp, ' &quot;') : smarty_modifier_cat($_tmp, ' &quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;</a>') : smarty_modifier_cat($_tmp, '&quot;</a>'))); ?>
  <?php if ($_GET['edit_info']): ?>
   <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=professor_lessons&lesson_info=".($_GET['lesson_info'])."&edit_info=1'>".(@_EDITLESSONINFORMATION)."</a>"); ?>
  <?php endif; ?>
    <?php elseif ($_GET['add_lesson']): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=professor_lessons&add_lesson=1">') : smarty_modifier_cat($_tmp, '?ctg=professor_lessons&add_lesson=1">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_NEWLESSON) : smarty_modifier_cat($_tmp, @_NEWLESSON)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
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

 <tr><td class = "moduleCell">
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/professor_lessons.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 </td></tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['T_CTG'] == 'personal'): ?>
 <?php ob_start(); ?>
  <?php if ($_GET['user'] != $_SESSION['s_login']): ?>
   <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=users'>".(@_USERS)."</a>"); ?>
  <?php endif; ?>
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
<?php if (( $this->_tpl_vars['T_CTG'] == 'statistics' )): ?>
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
 <?php elseif ($_GET['option'] == 'branches'): ?>






 <?php elseif ($_GET['option'] == 'course'): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=course">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=course">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_COURSESTATISTICS) : smarty_modifier_cat($_tmp, @_COURSESTATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php if (isset ( $_GET['sel_course'] )): ?>
   <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=course&sel_course=') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=course&sel_course=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['sel_course']) : smarty_modifier_cat($_tmp, $_GET['sel_course'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_COURSE']->course['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_COURSE']->course['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php endif; ?>
 <?php elseif ($_GET['option'] == 'advanced_user_reports'): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=advanced_user_reports">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=advanced_user_reports">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ADVANCEDUSERREPORTS) : smarty_modifier_cat($_tmp, @_ADVANCEDUSERREPORTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['option'] == 'system'): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=system">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=system">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SYSTEMSTATISTICS) : smarty_modifier_cat($_tmp, @_SYSTEMSTATISTICS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($_GET['option'] == 'queries'): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href = "')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=statistics&option=queries">') : smarty_modifier_cat($_tmp, '?ctg=statistics&option=queries">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_GENERICQUERIES) : smarty_modifier_cat($_tmp, @_GENERICQUERIES)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
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
<?php if (( isset ( $this->_tpl_vars['T_CTG'] ) && $this->_tpl_vars['T_CTG'] == 'social' )): ?>


 <?php if ($this->_tpl_vars['T_OP'] == 'dashboard'): ?>
  <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a class="titleLink" href ="')) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=control_panel">') : smarty_modifier_cat($_tmp, '?ctg=control_panel">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_HOME) : smarty_modifier_cat($_tmp, @_HOME)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=social&op=dashboard">') : smarty_modifier_cat($_tmp, '?ctg=social&op=dashboard">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_DASHBOARD) : smarty_modifier_cat($_tmp, @_DASHBOARD)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
 <?php elseif ($this->_tpl_vars['T_OP'] == 'people'): ?>

  <?php if ($_SESSION['s_lessons_ID'] != ""): ?>
   <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=social&op=people&display=2'>".(@_PEOPLE)."</a>"); ?>
  <?php else: ?>
   <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a class="titleLink" href ="')) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=control_panel">') : smarty_modifier_cat($_tmp, '?ctg=control_panel">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_HOME) : smarty_modifier_cat($_tmp, @_HOME)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=social&op=people">') : smarty_modifier_cat($_tmp, '?ctg=social&op=people">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_PEOPLE) : smarty_modifier_cat($_tmp, @_PEOPLE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php endif; ?>

 <?php elseif ($this->_tpl_vars['T_OP'] == 'timeline'): ?>
  <?php if (isset ( $_GET['lessons_ID'] )): ?>
    <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href ='".($_SERVER['PHP_SELF'])."?ctg=social&op=timeline&lessons_ID=".($_SESSION['s_lessons_ID'])."&all=1'>".(@_TIMELINE)."</a>"); ?>
  <?php else: ?>
   <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a class="titleLink" href ="')) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=control_panel">') : smarty_modifier_cat($_tmp, '?ctg=control_panel">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_HOME) : smarty_modifier_cat($_tmp, @_HOME)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href ="') : smarty_modifier_cat($_tmp, '</a>&nbsp;&raquo;&nbsp;<a class="titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=social&op=timeline">') : smarty_modifier_cat($_tmp, '?ctg=social&op=timeline">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_TIMELINE) : smarty_modifier_cat($_tmp, @_TIMELINE)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
  <?php endif; ?>
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
<script>var point3 = new Date().getTime();</script>
<div id = "bookmarks_div_code" style = "display:none">
<?php ob_start(); ?>
 <div id = "bookmarks_div"></div>
<?php $this->_smarty_vars['capture']['t_bookmarks_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo smarty_function_eF_template_printBlock(array('title' => @_SHOWBOOKMARKS,'data' => $this->_smarty_vars['capture']['t_bookmarks_code'],'image' => "32x32/bookmark.png"), $this);?>

</div>
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
  <?php echo $this->_smarty_vars['capture']['moduleControlPanel']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleCalendarPage']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleLessonsList']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleInsertContent']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleCompleteLesson']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleComments']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleUnitOrder']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleContentMetadata']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleFileManager']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleCopyContent']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleRules']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleShowUnit']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleTests']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleFeedback']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleAddQuestion']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleAddTest']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleProjects']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleAddEditExercise']; ?>

  <?php echo $this->_smarty_vars['capture']['modulePersonal']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleSearchResults']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleNewsPage']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleProgress']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleScormOptions']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleIMSOptions']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleLessonInformation']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleGlossary']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleStatistics']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleLessonsManagement']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleUsersManagement']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleNewLesson']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleRepairTree']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleInsertPeriod']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleLessonSettings']; ?>

  <?php echo $this->_smarty_vars['capture']['importedModule']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleHCD']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleNewUser']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleEmail']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleUsers']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleEvaluations']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleSocial']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleSpecificContent']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleImport']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleSurvey']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleMessagesPage']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleForum']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleTopics']; ?>

  <?php echo $this->_smarty_vars['capture']['modulePoll']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleLandingPage']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleCourses']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleLessons']; ?>

  <?php echo $this->_smarty_vars['capture']['moduleNewLessonDirection']; ?>

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
<?php ob_start(); ?>
 <span id = "tab_handles" class = "headerText">
 <?php if ($_SESSION['s_lessons_ID'] != '' && ! $this->_tpl_vars['T_CONFIGURATION']['disable_bookmarks']): ?>
  <img class = "ajaxHandle" src = "images/16x16/bookmark.png" alt = "<?php echo @_SHOWBOOKMARKS; ?>
" title = "<?php echo @_SHOWBOOKMARKS; ?>
" onclick = "getBookmarks(this);"/>
 <?php endif; ?>
 <?php if ($this->_tpl_vars['T_CTG'] == 'content'): ?>
  <img class = "ajaxHandle" src = "images/16x16/navigate_<?php if ($_COOKIE['rightSideBar'] == 'hidden'): ?>left<?php else: ?>right<?php endif; ?>.png" alt = "<?php echo @_TOGGLESIDEBAR; ?>
" title = "<?php echo @_TOGGLESIDEBAR; ?>
" onclick = "toggleRightSidebar(this, true)"/>
  <?php if ($this->_tpl_vars['T_HORIZONTAL_BAR'] == 1): ?>
   <img class = "ajaxHandle" src = "images/16x16/navigate_<?php if ($_COOKIE['horizontalSideBar'] == 'hidden'): ?>down<?php else: ?>up<?php endif; ?>.png" alt = "<?php echo @_TOGGLESIDEBAR; ?>
" title = "<?php echo @_TOGGLESIDEBAR; ?>
" onclick = "toggleHorizontalSidebar(this, true)"/>
  <?php endif; ?>
 <?php endif; ?>
 </span>
<?php $this->_smarty_vars['capture']['t_path_additional_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/common_layout.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script>var point4 = new Date().getTime();</script>
<script type="text/javascript">
<?php echo '
 var contentCell = document.getElementById(\'contentCell\'); //Get the table cell that contains the Unit content
 if (contentCell && contentCell.offsetHeight > 300) { //If this cell is bigger than 300 pixel...
  document.getElementById(\'navigationDownTable\').style.display = \'\'; //...Then make visible the table that contains the navigation handles below the unit
 }
'; ?>

</script>
<script>var point4_3 = new Date().getTime();</script>
<script>var point5 = new Date().getTime();</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/closing.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>