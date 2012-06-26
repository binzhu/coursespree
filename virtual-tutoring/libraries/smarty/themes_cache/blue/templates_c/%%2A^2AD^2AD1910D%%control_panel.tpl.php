<?php /* Smarty version 2.6.26, created on 2012-05-15 11:53:30
         compiled from includes/control_panel.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'includes/control_panel.tpl', 12, false),array('modifier', 'sizeof', 'includes/control_panel.tpl', 29, false),array('modifier', 'eF_truncate', 'includes/control_panel.tpl', 162, false),array('modifier', 'replace', 'includes/control_panel.tpl', 251, false),array('function', 'counter', 'includes/control_panel.tpl', 24, false),array('function', 'eF_template_printBlock', 'includes/control_panel.tpl', 34, false),array('function', 'eF_template_printCalendar', 'includes/control_panel.tpl', 64, false),array('function', 'eF_template_printProjects', 'includes/control_panel.tpl', 106, false),array('function', 'eF_template_printForumMessages', 'includes/control_panel.tpl', 119, false),array('function', 'eF_template_printPersonalMessages', 'includes/control_panel.tpl', 132, false),array('function', 'eF_template_printComments', 'includes/control_panel.tpl', 145, false),array('function', 'cycle', 'includes/control_panel.tpl', 188, false),)), $this); ?>
<?php if ($this->_tpl_vars['T_OP'] == 'search'): ?>
        <?php ob_start(); ?>
  <tr><td class = "moduleCell">
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/module_search.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </td></tr>
    <?php $this->_smarty_vars['capture']['moduleSearchResults'] = ob_get_contents(); ob_end_clean(); ?>

<?php elseif (isset ( $this->_tpl_vars['T_OP_MODULE'] )): ?>
     <?php ob_start(); ?>
     <tr><td class = "moduleCell">
         <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=@G_MODULESPATH)) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_OP']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_OP'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '/module.tpl') : smarty_modifier_cat($_tmp, '/module.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
     </td></tr>
    <?php $this->_smarty_vars['capture']['importedModule'] = ob_get_contents(); ob_end_clean(); ?>

<?php else: ?>

  <?php if ($this->_tpl_vars['T_INACTIVE_USERS']): ?>
  <?php ob_start(); ?>
      <tr><td class = "moduleCell">
          <?php ob_start(); ?>
              <?php unset($this->_sections['inactive_users_list']);
$this->_sections['inactive_users_list']['name'] = 'inactive_users_list';
$this->_sections['inactive_users_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_INACTIVE_USERS']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['inactive_users_list']['show'] = true;
$this->_sections['inactive_users_list']['max'] = $this->_sections['inactive_users_list']['loop'];
$this->_sections['inactive_users_list']['step'] = 1;
$this->_sections['inactive_users_list']['start'] = $this->_sections['inactive_users_list']['step'] > 0 ? 0 : $this->_sections['inactive_users_list']['loop']-1;
if ($this->_sections['inactive_users_list']['show']) {
    $this->_sections['inactive_users_list']['total'] = $this->_sections['inactive_users_list']['loop'];
    if ($this->_sections['inactive_users_list']['total'] == 0)
        $this->_sections['inactive_users_list']['show'] = false;
} else
    $this->_sections['inactive_users_list']['total'] = 0;
if ($this->_sections['inactive_users_list']['show']):

            for ($this->_sections['inactive_users_list']['index'] = $this->_sections['inactive_users_list']['start'], $this->_sections['inactive_users_list']['iteration'] = 1;
                 $this->_sections['inactive_users_list']['iteration'] <= $this->_sections['inactive_users_list']['total'];
                 $this->_sections['inactive_users_list']['index'] += $this->_sections['inactive_users_list']['step'], $this->_sections['inactive_users_list']['iteration']++):
$this->_sections['inactive_users_list']['rownum'] = $this->_sections['inactive_users_list']['iteration'];
$this->_sections['inactive_users_list']['index_prev'] = $this->_sections['inactive_users_list']['index'] - $this->_sections['inactive_users_list']['step'];
$this->_sections['inactive_users_list']['index_next'] = $this->_sections['inactive_users_list']['index'] + $this->_sections['inactive_users_list']['step'];
$this->_sections['inactive_users_list']['first']      = ($this->_sections['inactive_users_list']['iteration'] == 1);
$this->_sections['inactive_users_list']['last']       = ($this->_sections['inactive_users_list']['iteration'] == $this->_sections['inactive_users_list']['total']);
?>
         <div <?php if ($this->_sections['inactive_users_list']['iteration'] > 10): ?>class = "hidden_user_registrations" style="display:none"<?php endif; ?>><?php echo smarty_function_counter(array('name' => 'users'), $this);?>
. <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $this->_tpl_vars['T_INACTIVE_USERS'][$this->_sections['inactive_users_list']['index']]['login']; ?>
&op=profile">#filter:login-<?php echo $this->_tpl_vars['T_INACTIVE_USERS'][$this->_sections['inactive_users_list']['index']]['login']; ?>
#</a></div>
              <?php endfor; else: ?>
         <span class = "emptyCategory"><?php echo @_NONEWAPPLICATIONS; ?>
</span>
              <?php endif; ?>
                 <?php if (sizeof ( $this->_tpl_vars['T_INACTIVE_USERS'] ) > 10): ?>
                  <div><a href = "javascript:void(0)" onclick = "$$('div.hidden_user_registrations').each(function (s) {s.show()});Element.extend(this).up().hide();"><?php $this->assign('total', sizeof($this->_tpl_vars['T_INACTIVE_USERS'])); ?><?php echo $this->_tpl_vars['total']-10; ?>
 <?php echo @_MORE; ?>
</a></div>
                  <div class = "hidden_user_registrations" style = "display:none"><a href = "javascript:void(0)" onclick = "$$('div.hidden_user_registrations').each(function (s) {s.hide()});Element.extend(this).up().previous().show();"><?php echo sizeof($this->_tpl_vars['T_INACTIVE_USERS']); ?>
 <?php echo @_LESS; ?>
</a></div>
     <?php endif; ?>
          <?php $this->_smarty_vars['capture']['t_inactive_users_code'] = ob_get_contents(); ob_end_clean(); ?>

          <?php echo smarty_function_eF_template_printBlock(array('title' => @_NEWUSERS,'data' => $this->_smarty_vars['capture']['t_inactive_users_code'],'image' => '32x32/users.png','array' => $this->_tpl_vars['T_INACTIVE_USERS'],'link' => $this->_tpl_vars['T_INACTIVE_USERS_LINK']), $this);?>

      </td></tr>
  <?php $this->_smarty_vars['capture']['moduleNewUsersApplications'] = ob_get_contents(); ob_end_clean(); ?>
 <?php endif; ?>

  <?php if ($this->_tpl_vars['T_CONFIGURATION']['disable_news'] != 1 && $this->_tpl_vars['T_CURRENT_USER']->coreAccess['news'] != 'hidden' && ( $this->_tpl_vars['_admin_'] || $this->_tpl_vars['T_CURRENT_LESSON']->options['news'] )): ?>
        <?php ob_start(); ?>
   <tr><td class = "moduleCell">
          <?php ob_start(); ?>
           <table class = "cpanelTable">
           <?php $_from = $this->_tpl_vars['T_NEWS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['news_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['news_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['news_list']['iteration']++;
?>
            <tr><td><?php echo $this->_foreach['news_list']['iteration']; ?>
. <a title = "<?php echo $this->_tpl_vars['item']['title']; ?>
" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=news&view=<?php echo $this->_tpl_vars['item']['id']; ?>
&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup('<?php echo @_ANNOUNCEMENT; ?>
', 1);"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></td>
             <td class = "cpanelTime">#filter:user_login-<?php echo $this->_tpl_vars['item']['users_LOGIN']; ?>
#, <span title = "#filter:timestamp_time-<?php echo $this->_tpl_vars['item']['timestamp']; ?>
#"><?php echo $this->_tpl_vars['item']['time_since']; ?>
</span></td></tr>
           <?php endforeach; else: ?>
            <tr><td class = "emptyCategory"><?php echo @_NOANNOUNCEMENTSPOSTED; ?>
</td></tr>
           <?php endif; unset($_from); ?>
           </table>
          <?php $this->_smarty_vars['capture']['t_news_code'] = ob_get_contents(); ob_end_clean(); ?>

          <?php echo smarty_function_eF_template_printBlock(array('title' => @_ANNOUNCEMENTS,'content' => $this->_smarty_vars['capture']['t_news_code'],'image' => '32x32/announcements.png','options' => $this->_tpl_vars['T_NEWS_OPTIONS'],'link' => $this->_tpl_vars['T_NEWS_LINK'],'expand' => $this->_tpl_vars['T_POSITIONS_VISIBILITY']['moduleNewsList']), $this);?>

   </td></tr>
        <?php $this->_smarty_vars['capture']['moduleNewsList'] = ob_get_contents(); ob_end_clean(); ?>
 <?php endif; ?>

        <?php if ($this->_tpl_vars['T_CONFIGURATION']['disable_calendar'] != 1 && $this->_tpl_vars['T_CURRENT_USER']->coreAccess['calendar'] != 'hidden' && ( $this->_tpl_vars['_admin_'] || $this->_tpl_vars['T_CURRENT_LESSON']->options['calendar'] )): ?>
     <?php ob_start(); ?>
            <tr><td class = "moduleCell">
                <?php ob_start(); ?>
                    <?php echo smarty_function_eF_template_printCalendar(array('events' => $this->_tpl_vars['T_CALENDAR_EVENTS'],'timestamp' => $this->_tpl_vars['T_VIEW_CALENDAR']), $this);?>

                <?php $this->_smarty_vars['capture']['t_calendar_code'] = ob_get_contents(); ob_end_clean(); ?>
                <?php $this->assign('calendar_title', (@_CALENDAR)." (#filter:timestamp-".($this->_tpl_vars['T_VIEW_CALENDAR'])."#)"); ?>
                <?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['calendar_title'],'data' => $this->_smarty_vars['capture']['t_calendar_code'],'image' => '32x32/calendar.png','options' => $this->_tpl_vars['T_CALENDAR_OPTIONS'],'link' => $this->_tpl_vars['T_CALENDAR_LINK'],'expand' => $this->_tpl_vars['T_POSITIONS_VISIBILITY']['moduleCalendar']), $this);?>

            </td></tr>
     <?php $this->_smarty_vars['capture']['moduleCalendar'] = ob_get_contents(); ob_end_clean(); ?>
    <?php endif; ?>

     <?php if ($this->_tpl_vars['T_NEW_LESSONS'] || $this->_tpl_vars['T_NEW_COURSES']): ?>
       <?php ob_start(); ?>
         <tr><td class = "moduleCell">
             <?php ob_start(); ?>
              <?php if ($this->_tpl_vars['T_NEW_COURSES'] && $this->_tpl_vars['T_NEW_LESSONS']): ?><?php echo @_LESSONSREGISTRATIONS; ?>
:<?php endif; ?>
                 <?php unset($this->_sections['new_lessons_list']);
$this->_sections['new_lessons_list']['name'] = 'new_lessons_list';
$this->_sections['new_lessons_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_NEW_LESSONS']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['new_lessons_list']['show'] = true;
$this->_sections['new_lessons_list']['max'] = $this->_sections['new_lessons_list']['loop'];
$this->_sections['new_lessons_list']['step'] = 1;
$this->_sections['new_lessons_list']['start'] = $this->_sections['new_lessons_list']['step'] > 0 ? 0 : $this->_sections['new_lessons_list']['loop']-1;
if ($this->_sections['new_lessons_list']['show']) {
    $this->_sections['new_lessons_list']['total'] = $this->_sections['new_lessons_list']['loop'];
    if ($this->_sections['new_lessons_list']['total'] == 0)
        $this->_sections['new_lessons_list']['show'] = false;
} else
    $this->_sections['new_lessons_list']['total'] = 0;
if ($this->_sections['new_lessons_list']['show']):

            for ($this->_sections['new_lessons_list']['index'] = $this->_sections['new_lessons_list']['start'], $this->_sections['new_lessons_list']['iteration'] = 1;
                 $this->_sections['new_lessons_list']['iteration'] <= $this->_sections['new_lessons_list']['total'];
                 $this->_sections['new_lessons_list']['index'] += $this->_sections['new_lessons_list']['step'], $this->_sections['new_lessons_list']['iteration']++):
$this->_sections['new_lessons_list']['rownum'] = $this->_sections['new_lessons_list']['iteration'];
$this->_sections['new_lessons_list']['index_prev'] = $this->_sections['new_lessons_list']['index'] - $this->_sections['new_lessons_list']['step'];
$this->_sections['new_lessons_list']['index_next'] = $this->_sections['new_lessons_list']['index'] + $this->_sections['new_lessons_list']['step'];
$this->_sections['new_lessons_list']['first']      = ($this->_sections['new_lessons_list']['iteration'] == 1);
$this->_sections['new_lessons_list']['last']       = ($this->_sections['new_lessons_list']['iteration'] == $this->_sections['new_lessons_list']['total']);
?>
                     <div <?php if ($this->_sections['new_lessons_list']['iteration'] > 10): ?>class = "hidden_lesson_registrations" style="display:none"<?php endif; ?>><?php echo smarty_function_counter(array('name' => 'lessons'), $this);?>
. <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $this->_tpl_vars['T_NEW_LESSONS'][$this->_sections['new_lessons_list']['index']]['users_LOGIN']; ?>
&op=user_courses">#filter:login-<?php echo $this->_tpl_vars['T_NEW_LESSONS'][$this->_sections['new_lessons_list']['index']]['users_LOGIN']; ?>
# (<?php echo $this->_tpl_vars['T_NEW_LESSONS'][$this->_sections['new_lessons_list']['index']]['count']; ?>
 <?php if ($this->_tpl_vars['T_NEW_LESSONS'][$this->_sections['new_lessons_list']['index']]['count'] == 1): ?><?php echo @_LESSON; ?>
<?php else: ?><?php echo @_LESSONS; ?>
<?php endif; ?>)</a></div>
                 <?php endfor; endif; ?>
                 <?php if (sizeof ( $this->_tpl_vars['T_NEW_LESSONS'] ) > 10): ?>
                  <div><a href = "javascript:void(0)" onclick = "$$('div.hidden_lesson_registrations').each(function (s) {s.show()});Element.extend(this).up().hide();"><?php $this->assign('total', sizeof($this->_tpl_vars['T_NEW_LESSONS'])); ?><?php echo $this->_tpl_vars['total']-10; ?>
 <?php echo @_MORE; ?>
</a></div>
                  <div class = "hidden_lesson_registrations" style = "display:none"><a href = "javascript:void(0)" onclick = "$$('div.hidden_lesson_registrations').each(function (s) {s.hide()});Element.extend(this).up().previous().show();"><?php echo sizeof($this->_tpl_vars['T_NEW_LESSONS']); ?>
 <?php echo @_LESS; ?>
</a></div>
     <?php endif; ?>
     <?php if ($this->_tpl_vars['T_NEW_COURSES'] && $this->_tpl_vars['T_NEW_LESSONS']): ?><br/><?php echo @_COURSESREGISTRATIONS; ?>
:<?php endif; ?>
                 <?php unset($this->_sections['new_courses_list']);
$this->_sections['new_courses_list']['name'] = 'new_courses_list';
$this->_sections['new_courses_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_NEW_COURSES']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['new_courses_list']['show'] = true;
$this->_sections['new_courses_list']['max'] = $this->_sections['new_courses_list']['loop'];
$this->_sections['new_courses_list']['step'] = 1;
$this->_sections['new_courses_list']['start'] = $this->_sections['new_courses_list']['step'] > 0 ? 0 : $this->_sections['new_courses_list']['loop']-1;
if ($this->_sections['new_courses_list']['show']) {
    $this->_sections['new_courses_list']['total'] = $this->_sections['new_courses_list']['loop'];
    if ($this->_sections['new_courses_list']['total'] == 0)
        $this->_sections['new_courses_list']['show'] = false;
} else
    $this->_sections['new_courses_list']['total'] = 0;
if ($this->_sections['new_courses_list']['show']):

            for ($this->_sections['new_courses_list']['index'] = $this->_sections['new_courses_list']['start'], $this->_sections['new_courses_list']['iteration'] = 1;
                 $this->_sections['new_courses_list']['iteration'] <= $this->_sections['new_courses_list']['total'];
                 $this->_sections['new_courses_list']['index'] += $this->_sections['new_courses_list']['step'], $this->_sections['new_courses_list']['iteration']++):
$this->_sections['new_courses_list']['rownum'] = $this->_sections['new_courses_list']['iteration'];
$this->_sections['new_courses_list']['index_prev'] = $this->_sections['new_courses_list']['index'] - $this->_sections['new_courses_list']['step'];
$this->_sections['new_courses_list']['index_next'] = $this->_sections['new_courses_list']['index'] + $this->_sections['new_courses_list']['step'];
$this->_sections['new_courses_list']['first']      = ($this->_sections['new_courses_list']['iteration'] == 1);
$this->_sections['new_courses_list']['last']       = ($this->_sections['new_courses_list']['iteration'] == $this->_sections['new_courses_list']['total']);
?>
                  <div <?php if ($this->_sections['new_courses_list']['iteration'] > 10): ?>class = "hidden_course_registrations" style="display:none"<?php endif; ?>><?php echo smarty_function_counter(array('name' => 'courses'), $this);?>
. <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $this->_tpl_vars['T_NEW_COURSES'][$this->_sections['new_courses_list']['index']]['users_LOGIN']; ?>
&op=user_courses">#filter:login-<?php echo $this->_tpl_vars['T_NEW_COURSES'][$this->_sections['new_courses_list']['index']]['users_LOGIN']; ?>
# (<?php echo $this->_tpl_vars['T_NEW_COURSES'][$this->_sections['new_courses_list']['index']]['name']; ?>
<?php if ($this->_tpl_vars['T_NEW_COURSES'][$this->_sections['new_courses_list']['index']]['supervisor_LOGIN']): ?> - <?php echo @_SUPERVISORAPPROVAL; ?>
<?php endif; ?>)</a></div>
                 <?php endfor; endif; ?>
                 <?php if (sizeof ( $this->_tpl_vars['T_NEW_COURSES'] ) > 10): ?>
                  <div><a href = "javascript:void(0)" onclick = "$$('div.hidden_course_registrations').each(function (s) {s.show()});Element.extend(this).up().hide();"><?php $this->assign('total', sizeof($this->_tpl_vars['T_NEW_COURSES'])); ?><?php echo $this->_tpl_vars['total']-10; ?>
 <?php echo @_MORE; ?>
</a></div>
                  <div class = "hidden_course_registrations" style = "display:none"><a href = "javascript:void(0)" onclick = "$$('div.hidden_course_registrations').each(function (s) {s.hide()});Element.extend(this).up().previous().show();"><?php echo sizeof($this->_tpl_vars['T_NEW_COURSES']); ?>
 <?php echo @_LESS; ?>
</a></div>
     <?php endif; ?>
             <?php $this->_smarty_vars['capture']['t_new_lessons_code'] = ob_get_contents(); ob_end_clean(); ?>

             <?php echo smarty_function_eF_template_printBlock(array('title' => @_INACTIVEREGISTRATIONS,'data' => $this->_smarty_vars['capture']['t_new_lessons_code'],'image' => '32x32/lessons.png','array' => $this->_tpl_vars['T_NEW_LESSONS'],'link' => 'administrator.php?ctg=lessons'), $this);?>

         </td></tr>
        <?php $this->_smarty_vars['capture']['moduleNewLessonsApplications'] = ob_get_contents(); ob_end_clean(); ?>
    <?php endif; ?>


     <?php if ($this->_tpl_vars['T_PROJECTS']): ?>
        <?php ob_start(); ?>
   <tr><td class = "moduleCell">
          <?php ob_start(); ?>
              <?php echo smarty_function_eF_template_printProjects(array('data' => $this->_tpl_vars['T_PROJECTS'],'limit' => 5), $this);?>

          <?php $this->_smarty_vars['capture']['t_projects_code'] = ob_get_contents(); ob_end_clean(); ?>

          <?php echo smarty_function_eF_template_printBlock(array('title' => @_PROJECTS,'data' => $this->_smarty_vars['capture']['t_projects_code'],'image' => '32x32/projects.png','options' => $this->_tpl_vars['T_PROJECTS_OPTIONS'],'link' => $this->_tpl_vars['T_PROJECTS_LINK'],'expand' => $this->_tpl_vars['T_POSITIONS_VISIBILITY']['moduleProjectsList']), $this);?>

   </td></tr>
        <?php $this->_smarty_vars['capture']['moduleProjectsList'] = ob_get_contents(); ob_end_clean(); ?>
    <?php endif; ?>

        <?php if (( $this->_tpl_vars['T_CURRENT_LESSON']->options['forum'] ) && $this->_tpl_vars['T_FORUM_MESSAGES']): ?>
        <?php ob_start(); ?>
   <tr><td class = "moduleCell">
          <?php ob_start(); ?>
              <?php echo smarty_function_eF_template_printForumMessages(array('data' => $this->_tpl_vars['T_FORUM_MESSAGES'],'forum_lessons_ID' => $this->_tpl_vars['T_FORUM_LESSONS_ID'],'limit' => 3), $this);?>

          <?php $this->_smarty_vars['capture']['t_forum_messages_code'] = ob_get_contents(); ob_end_clean(); ?>

          <?php echo smarty_function_eF_template_printBlock(array('title' => @_RECENTMESSAGESATFORUM,'data' => $this->_smarty_vars['capture']['t_forum_messages_code'],'image' => '32x32/forum.png','options' => $this->_tpl_vars['T_FORUM_OPTIONS'],'link' => $this->_tpl_vars['T_FORUM_LINK'],'expand' => $this->_tpl_vars['T_POSITIONS_VISIBILITY']['moduleForumList']), $this);?>

   </td></tr>
        <?php $this->_smarty_vars['capture']['moduleForumList'] = ob_get_contents(); ob_end_clean(); ?>
    <?php endif; ?>

        <?php if ($this->_tpl_vars['T_PERSONAL_MESSAGES']): ?>
        <?php ob_start(); ?>
   <tr><td class = "moduleCell">
          <?php ob_start(); ?>
              <?php echo smarty_function_eF_template_printPersonalMessages(array('data' => $this->_tpl_vars['T_PERSONAL_MESSAGES']), $this);?>

          <?php $this->_smarty_vars['capture']['t_personal_messages_code'] = ob_get_contents(); ob_end_clean(); ?>

          <?php echo smarty_function_eF_template_printBlock(array('title' => @_RECENTUNREADPERSONALMESSAGES,'data' => $this->_smarty_vars['capture']['t_personal_messages_code'],'image' => '32x32/mail.png','options' => $this->_tpl_vars['T_PERSONAL_MESSAGES_OPTIONS'],'link' => $this->_tpl_vars['T_PERSONAL_MESSAGES_LINK'],'expand' => $this->_tpl_vars['T_POSITIONS_VISIBILITY']['modulePersonalMessagesList']), $this);?>

   </td></tr>
        <?php $this->_smarty_vars['capture']['modulePersonalMessagesList'] = ob_get_contents(); ob_end_clean(); ?>
    <?php endif; ?>

        <?php if (( $this->_tpl_vars['T_CURRENT_LESSON']->options['comments'] ) && $this->_tpl_vars['T_COMMENTS'] && $this->_tpl_vars['T_CONFIGURATION']['disable_comments'] != 1): ?>
        <?php ob_start(); ?>
   <tr><td class = "moduleCell">
                <?php ob_start(); ?>
                    <?php echo smarty_function_eF_template_printComments(array('data' => $this->_tpl_vars['T_COMMENTS']), $this);?>

                <?php $this->_smarty_vars['capture']['t_comments_code'] = ob_get_contents(); ob_end_clean(); ?>

                <?php echo smarty_function_eF_template_printBlock(array('title' => @_RECENTCOMMENTS,'data' => $this->_smarty_vars['capture']['t_comments_code'],'image' => '32x32/note.png','link' => $this->_tpl_vars['T_COMMENTS_LINK'],'expand' => $this->_tpl_vars['T_POSITIONS_VISIBILITY']['moduleCommentsList']), $this);?>

   </td></tr>
        <?php $this->_smarty_vars['capture']['moduleCommentsList'] = ob_get_contents(); ob_end_clean(); ?>
    <?php endif; ?>

        <?php if ($this->_tpl_vars['T_COMPLETED_TESTS']): ?>
        <?php ob_start(); ?>
   <tr><td class = "moduleCell">
          <?php ob_start(); ?>
              <table border = "0" width = "100%">
              <?php unset($this->_sections['completed_test']);
$this->_sections['completed_test']['name'] = 'completed_test';
$this->_sections['completed_test']['loop'] = is_array($_loop=$this->_tpl_vars['T_COMPLETED_TESTS']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['completed_test']['max'] = (int)10;
$this->_sections['completed_test']['show'] = true;
if ($this->_sections['completed_test']['max'] < 0)
    $this->_sections['completed_test']['max'] = $this->_sections['completed_test']['loop'];
$this->_sections['completed_test']['step'] = 1;
$this->_sections['completed_test']['start'] = $this->_sections['completed_test']['step'] > 0 ? 0 : $this->_sections['completed_test']['loop']-1;
if ($this->_sections['completed_test']['show']) {
    $this->_sections['completed_test']['total'] = min(ceil(($this->_sections['completed_test']['step'] > 0 ? $this->_sections['completed_test']['loop'] - $this->_sections['completed_test']['start'] : $this->_sections['completed_test']['start']+1)/abs($this->_sections['completed_test']['step'])), $this->_sections['completed_test']['max']);
    if ($this->_sections['completed_test']['total'] == 0)
        $this->_sections['completed_test']['show'] = false;
} else
    $this->_sections['completed_test']['total'] = 0;
if ($this->_sections['completed_test']['show']):

            for ($this->_sections['completed_test']['index'] = $this->_sections['completed_test']['start'], $this->_sections['completed_test']['iteration'] = 1;
                 $this->_sections['completed_test']['iteration'] <= $this->_sections['completed_test']['total'];
                 $this->_sections['completed_test']['index'] += $this->_sections['completed_test']['step'], $this->_sections['completed_test']['iteration']++):
$this->_sections['completed_test']['rownum'] = $this->_sections['completed_test']['iteration'];
$this->_sections['completed_test']['index_prev'] = $this->_sections['completed_test']['index'] - $this->_sections['completed_test']['step'];
$this->_sections['completed_test']['index_next'] = $this->_sections['completed_test']['index'] + $this->_sections['completed_test']['step'];
$this->_sections['completed_test']['first']      = ($this->_sections['completed_test']['iteration'] == 1);
$this->_sections['completed_test']['last']       = ($this->_sections['completed_test']['iteration'] == $this->_sections['completed_test']['total']);
?>
                  <tr><td>
                    <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_solved_test=<?php echo $this->_tpl_vars['T_COMPLETED_TESTS'][$this->_sections['completed_test']['index']]['id']; ?>
" style = "float:left">
         <?php echo ((is_array($_tmp=$this->_tpl_vars['T_COMPLETED_TESTS'][$this->_sections['completed_test']['index']]['name'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 50) : smarty_modifier_eF_truncate($_tmp, 50)); ?>
</a>
        <span style = "float:right">#filter:user_login-<?php echo $this->_tpl_vars['T_COMPLETED_TESTS'][$this->_sections['completed_test']['index']]['users_LOGIN']; ?>
#, #filter:timestamp_interval-<?php echo $this->_tpl_vars['T_COMPLETED_TESTS'][$this->_sections['completed_test']['index']]['timestamp']; ?>
# <?php echo @_AGO; ?>
</span>
       </td></tr>
              <?php endfor; endif; ?>
              </table>
          <?php $this->_smarty_vars['capture']['t_done_tests_code'] = ob_get_contents(); ob_end_clean(); ?>

          <?php echo smarty_function_eF_template_printBlock(array('title' => @_PENDINGTESTS,'data' => $this->_smarty_vars['capture']['t_done_tests_code'],'image' => '32x32/tests.png','options' => $this->_tpl_vars['T_DONE_QUESTIONS_OPTIONS'],'link' => $this->_tpl_vars['T_DONE_QUESTIONS_LINK']), $this);?>

   </td></tr>
        <?php $this->_smarty_vars['capture']['moduleDoneTests'] = ob_get_contents(); ob_end_clean(); ?>
    <?php endif; ?>

        <?php if (( $this->_tpl_vars['T_CURRENT_LESSON']->options['lessons_timeline'] ) && isset ( $this->_tpl_vars['T_TIMELINE_EVENTS'] )): ?>
  <?php ob_start(); ?>
         <tr><td class = "moduleCell">
             <?php ob_start(); ?>
<!--ajax:lessonTimelineTable-->
                <table class = "sortedTable" style = "width:100%" noFooter = "true" size = "<?php echo $this->_tpl_vars['T_TIMELINE_EVENTS_SIZE']; ?>
" sortBy = "0" id = "lessonTimelineTable" useAjax = "1" rowsPerPage = "10" limit="10" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=social&op=timeline&lessons_ID=<?php echo $_SESSION['s_lessons_ID']; ?>
<?php if (isset ( $_GET['topics_ID'] )): ?>&topics_ID=<?php echo $_GET['topics_ID']; ?>
<?php endif; ?>&">
                    <tr style="display:none" class = "topTitle">
                        <td class = "topTitle noSort" name="description"><?php echo @_SKILL; ?>
</td>
                        <td class = "topTitle noSort" name="surname" ><?php echo @_SPECIFICATION; ?>
</td>
                        <td class = "topTitle noSort" name="timestamp" ><?php echo @_TIMESTAMP; ?>
</td>
                    </tr>
            <?php if (isset ( $this->_tpl_vars['T_TIMELINE_EVENTS'] )): ?>
                <?php $_from = $this->_tpl_vars['T_TIMELINE_EVENTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['events_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['events_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['event']):
        $this->_foreach['events_list']['iteration']++;
?>
                    <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
">
                        <td class = "elementCell">
       <img src = "view_file.php?file=<?php echo $this->_tpl_vars['event']['avatar']; ?>
" title="<?php echo @_CURRENTAVATAR; ?>
" alt="<?php echo @_CURRENTAVATAR; ?>
" width = "<?php echo $this->_tpl_vars['event']['avatar_width']; ?>
" height = "<?php echo $this->_tpl_vars['event']['avatar_height']; ?>
" style="vertical-align:middle" />
                        </td>
                        <td width="1px">&nbsp;</td>
                        <td width="100%"><?php echo $this->_tpl_vars['event']['message']; ?>
 <span class="timeago"><?php echo $this->_tpl_vars['event']['time']; ?>
</span> <br/>
                    </tr>
                <?php endforeach; endif; unset($_from); ?>
                </table>
<!--/ajax:lessonTimelineTable-->
            <?php else: ?>
                <tr><td colspan = 3>
                    <table width = "100%">
                        <tr><td class = "emptyCategory"><?php echo @_NORELATEDPEOPLEFOUND; ?>
</td></tr>
                    </table>
                    </td>
                </tr>
                </table>
<!--/ajax:lessonTimelineTable-->
            <?php endif; ?>
    <?php $this->_smarty_vars['capture']['t_timeline_code'] = ob_get_contents(); ob_end_clean(); ?>

          <?php echo smarty_function_eF_template_printBlock(array('title' => @_TIMELINE,'data' => $this->_smarty_vars['capture']['t_timeline_code'],'image' => '32x32/user_timeline.png','options' => $this->_tpl_vars['T_TIMELINE_OPTIONS'],'link' => $this->_tpl_vars['T_TIMELINE_LINK']), $this);?>

      </td></tr>
  <?php $this->_smarty_vars['capture']['moduleTimeline'] = ob_get_contents(); ob_end_clean(); ?>
 <?php endif; ?>

        <?php if ($this->_tpl_vars['_student_'] && $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] != 'hidden' && $this->_tpl_vars['T_CURRENT_LESSON']->options['content_tree']): ?>
        <?php ob_start(); ?>
         <tr><td class = "moduleCell">
             <?php ob_start(); ?>
                 <?php echo $this->_tpl_vars['T_CONTENT_TREE']; ?>

             <?php $this->_smarty_vars['capture']['t_content_tree'] = ob_get_contents(); ob_end_clean(); ?>
             <?php echo smarty_function_eF_template_printBlock(array('title' => @_CURRENTCONTENT,'data' => $this->_smarty_vars['capture']['t_content_tree'],'image' => "32x32/content.png",'alt' => ((is_array($_tmp=((is_array($_tmp='<span class = "emptyCategory">')) ? $this->_run_mod_handler('cat', true, $_tmp, @_NOCONTENTFOUND) : smarty_modifier_cat($_tmp, @_NOCONTENTFOUND)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</span>') : smarty_modifier_cat($_tmp, '</span>')),'options' => $this->_tpl_vars['T_TREE_OPTIONS'],'expand' => $this->_tpl_vars['T_POSITIONS_VISIBILITY']['moduleContentTree']), $this);?>

         </td></tr>
        <?php $this->_smarty_vars['capture']['moduleContentTree'] = ob_get_contents(); ob_end_clean(); ?>
    <?php endif; ?>

     <?php if ($this->_tpl_vars['T_FILE_MANAGER'] && $this->_tpl_vars['T_CURRENT_LESSON']->options['digital_library']): ?>
        <?php ob_start(); ?>
         <tr><td class = "moduleCell">
             <?php ob_start(); ?>
                 <?php echo $this->_tpl_vars['T_FILE_MANAGER']; ?>

             <?php $this->_smarty_vars['capture']['t_digital_library'] = ob_get_contents(); ob_end_clean(); ?>

             <?php echo smarty_function_eF_template_printBlock(array('title' => @_SHAREDFILES,'data' => $this->_smarty_vars['capture']['t_digital_library'],'image' => "32x32/file_explorer.png",'link' => $this->_tpl_vars['T_FILE_LIST_LINK'],'options' => $this->_tpl_vars['T_FILES_LIST_OPTIONS'],'expand' => $this->_tpl_vars['T_POSITIONS_VISIBILITY']['moduleDigitalLibrary']), $this);?>

         </td></tr>
        <?php $this->_smarty_vars['capture']['moduleDigitalLibrary'] = ob_get_contents(); ob_end_clean(); ?>
    <?php endif; ?>

        <?php if ($this->_tpl_vars['T_CURRENT_USER']->coreAccess['control_panel'] != 'hidden' && ( ! $this->_tpl_vars['_student_'] || ( $this->_tpl_vars['T_CURRENT_LESSON'] && $this->_tpl_vars['T_CURRENT_LESSON']->options['show_student_cpanel'] ) )): ?>
        <?php ob_start(); ?>
     <tr><td class = "moduleCell">
         <?php echo smarty_function_eF_template_printBlock(array('title' => @_OPTIONS,'columns' => 4,'links' => $this->_tpl_vars['T_CONTROL_PANEL_OPTIONS'],'image' => '32x32/options.png','expand' => $this->_tpl_vars['T_POSITIONS_VISIBILITY']['moduleIconFunctions'],'groups' => $this->_tpl_vars['T_CONTROL_PANEL_GROUPS']), $this);?>

        </td></tr>
        <?php $this->_smarty_vars['capture']['moduleIconFunctions'] = ob_get_contents(); ob_end_clean(); ?>
 <?php endif; ?>

        <?php $_from = $this->_tpl_vars['T_INNERTABLE_MODULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['module_inner_tables_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['module_inner_tables_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['moduleItem']):
        $this->_foreach['module_inner_tables_list']['iteration']++;
?>
        <?php ob_start(); ?>             <tr><td class = "moduleCell">
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

<?php endif; ?>

<?php ob_start(); ?>
 <?php if ($this->_tpl_vars['_student_'] || $this->_tpl_vars['_professor_']): ?>
  <tr><td class = "moduleCell">
    <table class = "horizontalBlock">
                 <tr><td>
                  <a class = "rightOption" href="javascript:void(0);" onclick="location='<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lessons';<?php if ($this->_tpl_vars['T_NO_HORIZONTAL_MENU']): ?>top.sideframe.hideAllLessonSpecific();<?php endif; ?>"><img src = "images/32x32/go_back.png" alt = "<?php echo @_CHANGELESSON; ?>
" title = "<?php echo @_CHANGELESSON; ?>
" class = "handle"></a>
                        <span class = "leftOption"><?php echo $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name']; ?>
</span>
                        <?php $_from = $this->_tpl_vars['T_HEADER_OPTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['header_options_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['header_options_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['header_options_list']['iteration']++;
?>
                         <a class = "leftOption" href = "<?php echo $this->_tpl_vars['item']['href']; ?>
" target = "<?php echo $this->_tpl_vars['item']['target']; ?>
"><img src = "images/<?php echo $this->_tpl_vars['item']['image']; ?>
" alt = "<?php echo $this->_tpl_vars['item']['text']; ?>
" title = "<?php echo $this->_tpl_vars['item']['text']; ?>
" onclick = "<?php echo $this->_tpl_vars['item']['onClick']; ?>
" class = "handle"></a>
                        <?php endforeach; endif; unset($_from); ?>
                    </td></tr>
    </table>
  </td></tr>
 <?php endif; ?>
 <tr>
     <td class = "moduleCell">
         <div id="sortableList">
             <div style="float: <?php if ($this->_tpl_vars['T_RTL']): ?>left<?php else: ?>right<?php endif; ?>; width:49.5%;height: 100%;">
                 <ul class="sortable" id="secondlist" style="width:100%;">
 <?php $_from = $this->_tpl_vars['T_POSITIONS_SECOND']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['positions_first'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['positions_first']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['module']):
        $this->_foreach['positions_first']['iteration']++;
?>
                     <li id="secondlist_<?php echo $this->_tpl_vars['module']; ?>
">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['module']]; ?>

                         </table>
                     </li>
 <?php endforeach; endif; unset($_from); ?>
 <?php if (! in_array ( 'modulePersonalMessages' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['modulePersonalMessages']): ?>
                     <li id="secondlist_modulePersonalMessages">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['modulePersonalMessages']; ?>

                         </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleNewDirection' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleNewDirection']): ?>
                     <li id="secondlist_moduleNewDirection">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['moduleNewDirection']; ?>

                         </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleNewUsersApplications' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleNewUsersApplications']): ?>
                     <li id="secondlist_moduleNewUsersApplications">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['moduleNewUsersApplications']; ?>

                         </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleNewLessonsApplications' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleNewLessonsApplications']): ?>
                     <li id="secondlist_moduleNewLessonsApplications">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['moduleNewLessonsApplications']; ?>

                         </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleNewLesson' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleNewLesson']): ?>
                     <li id="secondlist_moduleNewLesson">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['moduleNewLesson']; ?>

                         </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleNewsList' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleNewsList']): ?>
                     <li id="secondlist_moduleNewsList">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['moduleNewsList']; ?>

                         </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleCalendar' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleCalendar'] && $this->_tpl_vars['T_CONFIGURATION']['disable_calendar'] != 1): ?>
                     <li id="secondlist_moduleCalendar">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['moduleCalendar']; ?>

                         </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleForumList' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleForumList']): ?>
                     <li id="secondlist_moduleForumList">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['moduleForumList']; ?>

                         </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'modulePersonalMessagesList' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['modulePersonalMessagesList']): ?>
                     <li id="secondlist_modulePersonalMessagesList">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['modulePersonalMessagesList']; ?>

                         </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleDoneTests' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleDoneTests']): ?>
                     <li id="secondlist_moduleDoneTests">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['moduleDoneTests']; ?>

                         </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleCommentsList' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleCommentsList'] && $this->_tpl_vars['T_CONFIGURATION']['disable_comments'] != 1): ?>
                     <li id="secondlist_moduleCommentsList">
                         <table class = "singleColumnData">
                          <?php echo $this->_smarty_vars['capture']['moduleCommentsList']; ?>

                      </table>
                     </li>
 <?php endif; ?>

 <?php if (! in_array ( 'moduleTimeline' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleTimeline']): ?>
                     <li id="secondlist_moduleTimeline">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['moduleTimeline']; ?>

                         </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleProjectsList' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleProjectsList'] && $this->_tpl_vars['T_CONFIGURATION']['disable_projects'] != 1): ?>
                     <li id="firstlist_moduleProjectsList">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['moduleProjectsList']; ?>

                         </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleDigitalLibrary' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleDigitalLibrary']): ?>
                     <li id="secondlist_moduleDigitalLibrary">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['moduleDigitalLibrary']; ?>

                         </table>
                     </li>
 <?php endif; ?>

 <?php $_from = $this->_tpl_vars['T_INNERTABLE_MODULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['module_inner_tables_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['module_inner_tables_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['module']):
        $this->_foreach['module_inner_tables_list']['iteration']++;
?>
        <?php $this->assign('module_name', ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', "") : smarty_modifier_replace($_tmp, '_', ""))); ?>
        <?php if (! in_array ( $this->_tpl_vars['module_name'] , $this->_tpl_vars['T_POSITIONS'] )): ?>
                        <li id="secondlist_<?php echo $this->_tpl_vars['module_name']; ?>
">
                            <table class = "singleColumnData">
                                <?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['module_name']]; ?>

                            </table>
                        </li>
     <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
      <li id = "second_empty" style = "display:none;"></li>
     </ul>
                </div>
                <div style="width:50%; height:100%;">
                    <ul class="sortable" id="firstlist" style="width:100%;">
    <?php $_from = $this->_tpl_vars['T_POSITIONS_FIRST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['positions_first'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['positions_first']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['module']):
        $this->_foreach['positions_first']['iteration']++;
?>
                        <li id="firstlist_<?php echo $this->_tpl_vars['module']; ?>
">
                            <table class = "singleColumnData">
                                <?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['module']]; ?>

                            </table>
                        </li>
    <?php endforeach; endif; unset($_from); ?>
    <?php if (! in_array ( 'moduleIconFunctions' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleIconFunctions']): ?>
                        <li id="firstlist_moduleIconFunctions">
                            <table class = "singleColumnData">
                                <?php echo $this->_smarty_vars['capture']['moduleIconFunctions']; ?>

                            </table>
                        </li>
    <?php endif; ?>
 <?php if (! in_array ( 'moduleContentTree' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleContentTree']): ?>
                     <li id="firstlist_moduleContentTree">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['moduleContentTree']; ?>

                         </table>
                     </li>
 <?php endif; ?>
    <?php if (! in_array ( 'moduleLessonSettings' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleLessonSettings']): ?>
                        <li id="firstlist_moduleLessonSettings">
                            <table class = "singleColumnData">
                                <?php echo $this->_smarty_vars['capture']['moduleLessonSettings']; ?>

                            </table>
                        </li>
    <?php endif; ?>

                        <li id = "first_empty" style = "display:none;"></li>
                    </ul>
                </div>
   </div>
       </td>
   </tr>

<?php $this->_smarty_vars['capture']['moduleControlPanel'] = ob_get_contents(); ob_end_clean(); ?>