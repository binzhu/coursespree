<?php /* Smarty version 2.6.26, created on 2012-05-15 11:52:56
         compiled from includes/lessons_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'includes/lessons_list.tpl', 6, false),array('modifier', 'replace', 'includes/lessons_list.tpl', 163, false),array('function', 'eF_template_printBlock', 'includes/lessons_list.tpl', 37, false),)), $this); ?>
<script>
translations['_YOUHAVEBEENSUCCESSFULLYADDEDTOTHEGROUP'] = '<?php echo @_YOUHAVEBEENSUCCESSFULLYADDEDTOTHEGROUP; ?>
';
</script>

<?php if ($this->_tpl_vars['T_OP'] == 'tests'): ?>
        <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=lessons&op=tests">') : smarty_modifier_cat($_tmp, '?ctg=lessons&op=tests">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SKILLGAPTESTS) : smarty_modifier_cat($_tmp, @_SKILLGAPTESTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
        <?php ob_start(); ?>
 <tr><td class = "moduleCell">
  <?php if (isset ( $_GET['solve_test'] )): ?>
         <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;<a class = "titleLink" href ="')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['PHP_SELF']) : smarty_modifier_cat($_tmp, $_SERVER['PHP_SELF'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '?ctg=lessons&op=tests&solve_test=') : smarty_modifier_cat($_tmp, '?ctg=lessons&op=tests&solve_test=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['solve_test']) : smarty_modifier_cat($_tmp, $_GET['solve_test'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">') : smarty_modifier_cat($_tmp, '">')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_TEST_DATA']->test['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_TEST_DATA']->test['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>

   <?php if ($this->_tpl_vars['T_SHOW_CONFIRMATION']): ?>
    <?php ob_start(); ?>
                            <table class = "testHeader">
                                <tr><td id = "testName"><?php echo $this->_tpl_vars['T_TEST_DATA']->test['name']; ?>
</td></tr>
                                <tr><td id = "testDescription"><?php echo $this->_tpl_vars['T_TEST_DATA']->test['description']; ?>
</td></tr>
                                <tr><td>
                                        <table class = "testInfo">
                                            <tr><td rowspan = "3" id = "testInfoImage"><img src = "images/32x32/tests.png" alt = "<?php echo $this->_tpl_vars['T_TEST_DATA']->test['name']; ?>
" title = "<?php echo $this->_tpl_vars['T_TEST_DATA']->test['name']; ?>
"/></td>
                                                <td id = "testInfoLabels"></td>
                                                <td></td></tr>
                                            <tr><td><?php echo @_NUMOFQUESTIONS; ?>
:&nbsp;</td>
                                                <td><?php echo $this->_tpl_vars['T_TEST_QUESTIONS_NUM']; ?>
</td></tr>
                                            <tr><td><?php echo @_QUESTIONSARESHOWN; ?>
:&nbsp;</td>
                                                <td><?php if ($this->_tpl_vars['T_TEST_DATA']->options['onebyone']): ?><?php echo @_ONEBYONEQUESTIONS; ?>
<?php else: ?><?php echo @_ALLTOGETHER; ?>
<?php endif; ?></td></tr>
                                        </table>
                                    </td>
                                <tr><td id = "testProceed">
                                <?php if ($this->_tpl_vars['T_TEST_STATUS']['status'] == 'incomplete' && $this->_tpl_vars['T_TEST_DATA']->time['pause']): ?>
                                    <input class = "flatButton" type = "button" name = "submit_sure" value = "<?php echo @_RESUMETEST; ?>
&nbsp;&raquo;" onclick = "javascript:location=location+'&resume=1'" />
                                <?php else: ?>
                                    <input class = "flatButton" type = "button" name = "submit_sure" value = "<?php echo @_PROCEEDTOTEST; ?>
&nbsp;&raquo;" onclick = "javascript:location=location+'&confirm=1'" />
                                <?php endif; ?>
                                </td></tr>
                            </table>
    <?php $this->_smarty_vars['capture']['t_unsolved_skill_gap_code'] = ob_get_contents(); ob_end_clean(); ?>
    <?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['T_TEST_DATA']->test['name'],'data' => $this->_smarty_vars['capture']['t_unsolved_skill_gap_code'],'image' => '32x32/skill_gap.png'), $this);?>


            <?php elseif ($_GET['test_analysis']): ?>
                        <?php ob_start(); ?>
                            <div class = "headerTools">
                                <img src = "images/16x16/arrow_left.png" alt = "<?php echo @_VIEWSOLVEDTEST; ?>
" title = "<?php echo @_VIEWSOLVEDTEST; ?>
">
                                <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_solved_test=<?php echo $_GET['show_solved_test']; ?>
"><?php echo @_VIEWSOLVEDTEST; ?>
</a>
                            </div>
                            <table style = "width:100%">
                                <tr><td style = "vertical-align:top"><?php echo $this->_tpl_vars['T_CONTENT_ANALYSIS']; ?>
</td></tr>
                                <tr><td style = "vertical-align:top"><iframe width = "100%" height = "300px" frameborder = "no" src = "student.php?ctg=content&view_unit=<?php echo $_GET['view_unit']; ?>
&display_chart=1&test_analysis=1"></iframe></td></tr>
                            </table>
                        <?php $this->_smarty_vars['capture']['t_test_analysis_code'] = ob_get_contents(); ob_end_clean(); ?>

                        <?php echo smarty_function_eF_template_printBlock(array('title' => "\"".(@_TESTANALYSIS)." ".(@_FORTEST)." <span class = \"innerTableName\">&quot;".($this->_tpl_vars['T_TEST_DATA']->test['name'])."&quot;</span> ".(@_ANDUSER)." <span class = \"innerTableName\">&quot;#filter:login-".($this->_tpl_vars['T_TEST_DATA']->completedTest['login'])."#&quot;</span>\"",'data' => $this->_smarty_vars['capture']['t_test_analysis_code'],'image' => '32x32/tests.png'), $this);?>

            <?php else: ?>
    <?php ob_start(); ?>
                    <?php if ($this->_tpl_vars['T_TEST_STATUS']['status'] == '' || $this->_tpl_vars['T_TEST_STATUS']['status'] == 'incomplete'): ?>
                        <?php ob_start(); ?>
                        <table class = "formElements" style = "width:100%">
                            <tr><td colspan = "2">&nbsp;</td></tr>
                            <tr><td colspan = "2" class = "submitCell" style = "text-align:center"><?php echo $this->_tpl_vars['T_TEST_FORM']['submit_test']['html']; ?>
&nbsp;<?php echo $this->_tpl_vars['T_TEST_FORM']['pause_test']['html']; ?>
</td></tr>
                        </table>
                        <?php $this->_smarty_vars['capture']['test_footer'] = ob_get_contents(); ob_end_clean(); ?>
                    <?php endif; ?>
                    <?php if (! $this->_tpl_vars['T_NO_TEST']): ?>
                        <?php echo $this->_tpl_vars['T_TEST_FORM']['javascript']; ?>

                        <form <?php echo $this->_tpl_vars['T_TEST_FORM']['attributes']; ?>
>
                            <?php echo $this->_tpl_vars['T_TEST_FORM']['hidden']; ?>

                            <?php echo $this->_tpl_vars['T_TEST']; ?>

                            <?php echo $this->_smarty_vars['capture']['test_footer']; ?>

                        </form>
                 <?php endif; ?>
    <?php $this->_smarty_vars['capture']['t_skill_gap_test_code'] = ob_get_contents(); ob_end_clean(); ?>
    <?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['T_TEST_DATA']->test['name'],'data' => $this->_smarty_vars['capture']['t_skill_gap_test_code'],'image' => '32x32/skill_gap.png'), $this);?>

            <?php endif; ?>
         <?php else: ?>

            <?php if ($this->_tpl_vars['T_TESTS']): ?>
             <?php echo smarty_function_eF_template_printBlock(array('title' => @_SKILLGAPTESTSTOBECOMPLETED,'columns' => 3,'links' => $this->_tpl_vars['T_TESTS'],'image' => '32x32/skill_gap.png'), $this);?>

            <?php else: ?>
    <?php ob_start(); ?>
                 <table width = "100%">
                     <tr><td class = "emptyCategory"><?php echo @_NOSKILLGAPTESTSASSIGNEDTOYOU; ?>
</td></tr>
                 </table>
    <?php $this->_smarty_vars['capture']['t_no_skill_gap_test_code'] = ob_get_contents(); ob_end_clean(); ?>
    <?php echo smarty_function_eF_template_printBlock(array('title' => @_NOSKILLGAPTESTSASSIGNEDTOYOU,'data' => $this->_smarty_vars['capture']['t_no_skill_gap_test_code'],'image' => '32x32/skill_gap.png'), $this);?>

            <?php endif; ?>
         <?php endif; ?>

 </td></tr>
        <?php $this->_smarty_vars['capture']['moduleLessonsList'] = ob_get_contents(); ob_end_clean(); ?>
<?php else: ?>

 <?php ob_start(); ?>
 <tr><td class = "moduleCell">
  <?php if ($_GET['course']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/course_settings.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php else: ?>
   <?php ob_start(); ?>
    <table>
           <tr><td colspan = "2">&nbsp;</td></tr>
           <tr><td class = "labelCell"><?php echo @_UNIQUEGROUPKEY; ?>
:&nbsp;</td>
               <td class = "elementCell"><input class = "inputText" type = "text" id = "group_key" /></td></tr>
           <tr><td colspan = "2">&nbsp;</td></tr>
           <tr><td></td>
            <td class = "submitCell"><input class = "flatButton" type = "button" onclick = "addGroupKey(this)" value="<?php echo @_SUBMIT; ?>
" /></td></tr>
           <tr><td colspan = "2"><span id = "resultReport"></span><img id = "progressImg" src = "images/others/progress_big.gif" style = "display:none"/></td></tr>
           <tr><td colspan = "2">&nbsp;</td></tr>
           <tr><td colspan = "2" class = "horizontalSeparatorAbove"><?php echo @_ENTERGROUPKEYINFO; ?>
</td></tr>
       </table>
   <?php $this->_smarty_vars['capture']['t_group_key_code'] = ob_get_contents(); ob_end_clean(); ?>
   <div id = 'group_key_enter' style = "display:none;">
     <?php echo smarty_function_eF_template_printBlock(array('title' => @_ENTERGROUPKEY,'data' => $this->_smarty_vars['capture']['t_group_key_code'],'image' => '32x32/key.png'), $this);?>

   </div>


       <?php if ($_GET['catalog']): ?>
    <?php if ($_GET['checkout']): ?>
     <?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/blocks/cart.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('cart', ob_get_contents()); ob_end_clean();
 ?>
     <?php echo smarty_function_eF_template_printBlock(array('title' => @_SELECTEDLESSONS,'data' => $this->_tpl_vars['cart'],'image' => '32x32/catalog.png'), $this);?>

    <?php else: ?>
     <?php if ($_GET['info_lesson'] || $_GET['info_course']): ?>
         <?php ob_start(); ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/blocks/lessons_info.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
         <?php $this->_smarty_vars['capture']['t_lesson_info_code'] = ob_get_contents(); ob_end_clean(); ?>
         <?php if ($this->_tpl_vars['T_LESSON_INFO']): ?>
       <?php $this->assign('title', ($this->_tpl_vars['title'])."<span>&nbsp;&raquo;&nbsp;</span><a href = '".($_SERVER['PHP_SELF'])."?ctg=lessons'>".(@_LESSONS)."</a><span>&nbsp;&raquo;&nbsp;</span><a href = '".($_SERVER['PHP_SELF'])."?ctg=lesson_info&lessons_ID=".($_GET['lessons_ID'])."&course=".($_GET['course'])."'>".(@_INFOFORLESSON).": &quot;".($this->_tpl_vars['T_LESSON']->lesson['name'])."&quot;</a>"); ?>
       <?php $this->assign('lesson_title', (@_INFORMATIONFORLESSON)." <span class = 'innerTableName'>&quot;".($this->_tpl_vars['T_LESSON']->lesson['name'])."&quot;</span>"); ?>
      <?php elseif ($this->_tpl_vars['T_COURSE_INFO']): ?>
       <?php $this->assign('title', ($this->_tpl_vars['title'])."<span>&nbsp;&raquo;&nbsp;</span><a href = '".($_SERVER['PHP_SELF'])."?ctg=lessons'>".(@_LESSONS)."</a><span>&nbsp;&raquo;&nbsp;</span><a href = '".($_SERVER['PHP_SELF'])."?ctg=lesson_info&courses_ID=".($_GET['courses_ID'])."'>".(@_INFOFORCOURSE).": &quot;".($this->_tpl_vars['T_COURSE']->course['name'])."&quot;</a>"); ?>
       <?php $this->assign('lesson_title', (@_INFORMATIONFORCOURSE)." <span class = 'innerTableName'>&quot;".($this->_tpl_vars['T_COURSE']->course['name'])."&quot;</span>"); ?>
      <?php endif; ?>
         <?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['lesson_title'],'data' => $this->_smarty_vars['capture']['t_lesson_info_code'],'image' => "32x32/information.png"), $this);?>

     <?php else: ?>
            <?php echo smarty_function_eF_template_printBlock(array('title' => @_COURSECATALOG,'data' => $this->_tpl_vars['T_DIRECTIONS_TREE'],'image' => '32x32/catalog.png'), $this);?>

     <?php endif; ?>

     <?php ob_start(); ?>
      <table class = "formElements">
       <tr><td class = "labelCell"><?php echo @_BALANCE; ?>
:</td>
        <td class = "elementCell"><input type = "text" id = "buy_credit_value"/></td></tr>
       <tr><td class = "labelCell"></td>
        <td class = "submitCell"><input class = "flatButton" type = "submit" value = "<?php echo @_ADDTOCART; ?>
" onclick = "addToCart(this, $('buy_credit_value').value, 'credit')"></td></tr>
      </table>
     <?php $this->_smarty_vars['capture']['t_buy_balance_code'] = ob_get_contents(); ob_end_clean(); ?>
     <?php ob_start(); ?>
      <tr><td>
      <?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/blocks/cart.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('cart', ob_get_contents()); ob_end_clean();
 ?>
        <?php if ($this->_tpl_vars['T_CONFIGURATION']['paypalbusiness'] && $this->_tpl_vars['T_CONFIGURATION']['enable_balance']): ?>
         <?php echo smarty_function_eF_template_printBlock(array('title' => @_BUYBALANCE,'content' => $this->_smarty_vars['capture']['t_buy_balance_code'],'image' => "32x32/shopping_basket.png"), $this);?>

        <?php endif; ?>
         <?php echo smarty_function_eF_template_printBlock(array('title' => @_SELECTEDLESSONS,'content' => $this->_tpl_vars['cart'],'image' => "32x32/shopping_basket.png"), $this);?>

         </td></tr>
     <?php $this->_smarty_vars['capture']['moduleSideOperations'] = ob_get_contents(); ob_end_clean(); ?>
    <?php endif; ?>
       <?php elseif ($this->_tpl_vars['T_DIRECTIONS_TREE']): ?>

               <?php $_from = $this->_tpl_vars['T_INNERTABLE_MODULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['module_inner_tables_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['module_inner_tables_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['moduleItem']):
        $this->_foreach['module_inner_tables_list']['iteration']++;
?>
           <?php ob_start(); ?>                <tr><td class = "moduleCell">
                   <?php if ($this->_tpl_vars['moduleItem']['smarty_file']): ?>
                       <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['moduleItem']['smarty_file'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                   <?php else: ?>
                       <?php echo $this->_tpl_vars['moduleItem']['html_code']; ?>

                   <?php endif; ?>
               </td></tr>
           <?php $this->_smarty_vars['capture'][((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', "") : smarty_modifier_replace($_tmp, '_', ""))] = ob_get_contents(); ob_end_clean(); ?>
       <?php endforeach; endif; unset($_from); ?>

        <?php ob_start(); ?>
        <?php echo $this->_tpl_vars['T_DIRECTIONS_TREE']; ?>

    <?php $this->_smarty_vars['capture']['t_directions_tree_code'] = ob_get_contents(); ob_end_clean(); ?>
        <?php $_from = $this->_tpl_vars['T_INNERTABLE_MODULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['module_inner_tables_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['module_inner_tables_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['module']):
        $this->_foreach['module_inner_tables_list']['iteration']++;
?>
           <?php $this->assign('module_name', ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', "") : smarty_modifier_replace($_tmp, '_', ""))); ?>
                            <table class = "singleColumnData">
                                <?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['module_name']]; ?>

                            </table>




       <?php endforeach; endif; unset($_from); ?>
       <?php ob_start(); ?>
    <tr>
     <td id = "sideColumn">
         <?php echo smarty_function_eF_template_printBlock(array('title' => @_TOOLS,'columns' => 2,'links' => $this->_tpl_vars['T_COURSES_LIST_OPTIONS'],'image' => '32x32/options.png'), $this);?>

        </td>
       </tr>
       <?php $this->_smarty_vars['capture']['moduleSideOperations'] = ob_get_contents(); ob_end_clean(); ?>
    <?php echo smarty_function_eF_template_printBlock(array('title' => @_MYCOURSES,'data' => $this->_smarty_vars['capture']['t_directions_tree_code'],'image' => '32x32/theory.png'), $this);?>


   <?php elseif ($this->_tpl_vars['T_OP'] == 'search'): ?>
           <?php $this->assign('title', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;&raquo;&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;&raquo;&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<a class = "titleLink" href ="javascript:void(0)" onclick = "location.reload()">') : smarty_modifier_cat($_tmp, '<a class = "titleLink" href ="javascript:void(0)" onclick = "location.reload()">')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_SEARCHRESULTS) : smarty_modifier_cat($_tmp, @_SEARCHRESULTS)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</a>') : smarty_modifier_cat($_tmp, '</a>'))); ?>
                          <?php ob_start(); ?>
                <tr><td class = "moduleCell">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/module_search.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </td></tr>
               <?php $this->_smarty_vars['capture']['moduleSearchResults'] = ob_get_contents(); ob_end_clean(); ?>

   <?php else: ?>
       <?php ob_start(); ?>
    <tr>
     <td id = "sideColumn">
         <?php echo smarty_function_eF_template_printBlock(array('title' => @_TOOLS,'columns' => 2,'links' => $this->_tpl_vars['T_COURSES_LIST_OPTIONS'],'image' => '32x32/options.png'), $this);?>

        </td>
       </tr>
       <?php $this->_smarty_vars['capture']['moduleSideOperations'] = ob_get_contents(); ob_end_clean(); ?>

    <?php ob_start(); ?>
     <table class = "emptyLessonsList">
         <tr><td class = "mediumHeader"><?php echo @_YOUDONTHAVEANYLESSONS; ?>
</td></tr>

     <?php if ($this->_tpl_vars['T_CONFIGURATION']['lessons_directory']): ?>
               <tr><td class = "lessonListOption">
                   <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lessons&catalog=1" title = "<?php echo @_LESSONSDIRECTORY; ?>
"><img class = "handle" src = "images/32x32/catalog.png" title = "<?php echo @_LESSONSDIRECTORY; ?>
" alt = "<?php echo @_LESSONSDIRECTORY; ?>
"></a>
                   <div><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lessons&catalog=1"><?php echo @_LESSONSDIRECTORY; ?>
</a></div>
               </td></tr>
           <?php endif; ?>
        </table>
       <?php $this->_smarty_vars['capture']['t_empty_lessons_list_code'] = ob_get_contents(); ob_end_clean(); ?>
       <?php echo smarty_function_eF_template_printBlock(array('title' => @_MYCOURSES,'data' => $this->_smarty_vars['capture']['t_empty_lessons_list_code'],'image' => '32x32/catalog.png'), $this);?>

   <?php endif; ?>
     <?php if ($this->_tpl_vars['T_SUPERVISOR_APPROVALS']): ?>
               <div id = "supervisor_approvals_list" style = "display:none">
                <?php ob_start(); ?>
                <table style = "width:100%">
               <?php $_from = $this->_tpl_vars['T_SUPERVISOR_APPROVALS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['supervisor_approval_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['supervisor_approval_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['supervisor_approval_list']['iteration']++;
?>
                 <tr><td><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
                  <td>#filter:login-<?php echo $this->_tpl_vars['item']['users_LOGIN']; ?>
#</td>
                  <td><img src = "images/16x16/success.png" class = "ajaxHandle" alt = "<?php echo @_APPROVE; ?>
" title = "<?php echo @_APPROVE; ?>
" onclick = "approveCourseAssignment(this, '<?php echo $this->_tpl_vars['item']['id']; ?>
', '<?php echo $this->_tpl_vars['item']['users_LOGIN']; ?>
')" /></td>
                  <td><img src = "images/16x16/forbidden.png" class = "ajaxHandle" alt = "<?php echo @_CANCEL; ?>
" title = "<?php echo @_CANCEL; ?>
" onclick = "cancelCourseAssignment(this, '<?php echo $this->_tpl_vars['item']['id']; ?>
', '<?php echo $this->_tpl_vars['item']['users_LOGIN']; ?>
')" /></td></tr>
               <?php endforeach; endif; unset($_from); ?>
                </table>
                <?php $this->_smarty_vars['capture']['t_supervisor_approvals_code'] = ob_get_contents(); ob_end_clean(); ?>
                <?php echo smarty_function_eF_template_printBlock(array('title' => @_SUPERVISORAPPROVAL,'data' => $this->_smarty_vars['capture']['t_supervisor_approvals_code'],'image' => '32x32/success.png'), $this);?>

               </div>
     <?php endif; ?>

  <?php endif; ?>
 </td></tr>
 <?php $this->_smarty_vars['capture']['moduleLessonsList'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>