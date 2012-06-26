<?php /* Smarty version 2.6.26, created on 2012-05-16 07:12:47
         compiled from social.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'social.tpl', 10, false),array('function', 'eF_template_printCalendar', 'social.tpl', 37, false),array('function', 'eF_template_printForumMessages', 'social.tpl', 73, false),array('function', 'eF_template_printProjects', 'social.tpl', 83, false),array('function', 'eF_template_printComments', 'social.tpl', 110, false),array('function', 'cycle', 'social.tpl', 440, false),array('modifier', 'replace', 'social.tpl', 128, false),)), $this); ?>

<?php if ($this->_tpl_vars['T_OP'] == 'dashboard'): ?>
<script>
translations['clicktochange'] = '<?php echo @_CLICKTOCHANGESTATUS; ?>
';
translations['_YOUHAVEBEENSUCCESSFULLYADDEDTOTHEGROUP'] = '<?php echo @_YOUHAVEBEENSUCCESSFULLYADDEDTOTHEGROUP; ?>
';
</script>
        <?php ob_start(); ?>
                                  <tr><td class = "moduleCell">
                                        <?php echo smarty_function_eF_template_printBlock(array('title' => @_TOOLS,'columns' => 3,'links' => $this->_tpl_vars['T_COURSES_LIST_OPTIONS'],'image' => '32x32/options.png'), $this);?>

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
                                  </td></tr>
                                <?php $this->_smarty_vars['capture']['moduleTools'] = ob_get_contents(); ob_end_clean(); ?>


       <?php if ($this->_tpl_vars['T_CURRENT_USER']->coreAccess['calendar'] != 'hidden' && $this->_tpl_vars['T_CONFIGURATION']['disable_calendar'] != 1): ?>
        <?php ob_start(); ?>
                                   <tr><td class = "moduleCell">
                                           <?php ob_start(); ?>
                                             <?php $this->assign('calendar_ctg', 'personal'); ?>

                                               <?php echo smarty_function_eF_template_printCalendar(array('ctg' => $this->_tpl_vars['calendar_ctg'],'events' => $this->_tpl_vars['T_CALENDAR_EVENTS'],'timestamp' => $this->_tpl_vars['T_VIEW_CALENDAR']), $this);?>


                                           <?php $this->_smarty_vars['capture']['t_calendar_code'] = ob_get_contents(); ob_end_clean(); ?>
                                           <?php $this->assign('calendar_title', (@_CALENDAR)."&nbsp;(#filter:timestamp-".($this->_tpl_vars['T_VIEW_CALENDAR'])."#)"); ?>

                                          <?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['calendar_title'],'data' => $this->_smarty_vars['capture']['t_calendar_code'],'image' => '32x32/calendar.png','options' => $this->_tpl_vars['T_CALENDAR_OPTIONS'],'link' => $this->_tpl_vars['T_CALENDAR_LINK']), $this);?>


                                   </td></tr>
                                <?php $this->_smarty_vars['capture']['moduleCalendar'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php endif; ?>

       <?php if ($this->_tpl_vars['T_FACEBOOK_ENABLED']): ?>
        <?php ob_start(); ?>
                                   <tr><td class = "moduleCell">
                                           <?php ob_start(); ?>
                                              <?php if (isset ( $this->_tpl_vars['T_FB_INFORMATION'] )): ?>
                                              <table>
                                               <tr>
                                                <td><img src="<?php echo $this->_tpl_vars['T_FB_INFORMATION']['pic']; ?>
" /></td>
                                                <td width="10px"></td>
                                                <td><?php echo $this->_tpl_vars['T_FB_INFORMATION']['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['T_FB_INFORMATION']['last_name']; ?>
</td>
                                               </tr>
                                              </table>
                                              <?php else: ?>
                                              <table width="100%"><tr><td class="emptyCategory"><?php echo @_YOUARENOTCONNECTEDTOFACEBOOK; ?>
 <a href="javascript:void(0);" onclick="FB.Connect.requireSession(function()<?php echo ' { top.location=\''; ?>
<?php echo $_SESSION['s_type']; ?>
<?php echo 'page.php?fb_authenticated=1\'; }'; ?>
); return false;"><?php echo @_HERE; ?>
</a></td></tr></table>
                                              <?php endif; ?>
                                           <?php $this->_smarty_vars['capture']['t_facebook_code'] = ob_get_contents(); ob_end_clean(); ?>
                                          <?php echo smarty_function_eF_template_printBlock(array('title' => @_FACEBOOKPROFILE,'data' => $this->_smarty_vars['capture']['t_facebook_code'],'image' => '/32x32/facebook.png','options' => $this->_tpl_vars['T_FB_OPTIONS']), $this);?>

                                   </td></tr>
                                <?php $this->_smarty_vars['capture']['moduleFacebook'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php endif; ?>

       <?php if (isset ( $this->_tpl_vars['T_FORUM_MESSAGES'] ) && $this->_tpl_vars['T_CONFIGURATION']['disable_forum'] != 1): ?>
        <?php ob_start(); ?>
                                   <tr><td class = "moduleCell">
                                           <?php ob_start(); ?>
                                               <?php echo smarty_function_eF_template_printForumMessages(array('data' => $this->_tpl_vars['T_FORUM_MESSAGES'],'forum_lessons_ID' => $this->_tpl_vars['T_FORUM_LESSONS_ID'],'limit' => 5), $this);?>

                                           <?php $this->_smarty_vars['capture']['t_forum_messages_code'] = ob_get_contents(); ob_end_clean(); ?>
                                           <?php echo smarty_function_eF_template_printBlock(array('title' => @_RECENTMESSAGESATFORUM,'data' => $this->_smarty_vars['capture']['t_forum_messages_code'],'image' => '32x32/forum.png','options' => $this->_tpl_vars['T_FORUM_OPTIONS'],'link' => $this->_tpl_vars['T_FORUM_LINK']), $this);?>

                                   </td></tr>
                                <?php $this->_smarty_vars['capture']['moduleForumList'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php endif; ?>
       <?php if (isset ( $this->_tpl_vars['T_ALL_PROJECTS'] ) && $this->_tpl_vars['T_CONFIGURATION']['disable_projects'] != 1): ?>
        <?php ob_start(); ?>
                                   <tr><td class = "moduleCell">
                                           <?php ob_start(); ?>
                                               <?php echo smarty_function_eF_template_printProjects(array('data' => $this->_tpl_vars['T_ALL_PROJECTS'],'limit' => 5), $this);?>

                                           <?php $this->_smarty_vars['capture']['t_projects_code'] = ob_get_contents(); ob_end_clean(); ?>
                                           <?php echo smarty_function_eF_template_printBlock(array('title' => @_PROJECTS,'data' => $this->_smarty_vars['capture']['t_projects_code'],'image' => '32x32/projects.png','options' => $this->_tpl_vars['T_PROJECTS_OPTIONS'],'link' => $this->_tpl_vars['T_PROJECTS_LINK']), $this);?>

                                   </td></tr>
                                <?php $this->_smarty_vars['capture']['moduleProjectsList'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php endif; ?>
                            <?php if ($this->_tpl_vars['T_NEWS'] && $this->_tpl_vars['T_CURRENT_USER']->coreAccess['news'] != 'hidden' && $this->_tpl_vars['T_CONFIGURATION']['disable_news'] != 1): ?>
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
&lessons_ID=all&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup('<?php echo @_ANNOUNCEMENT; ?>
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
                                             <?php echo smarty_function_eF_template_printBlock(array('title' => @_ANNOUNCEMENTS,'data' => $this->_smarty_vars['capture']['t_news_code'],'image' => '32x32/announcements.png','array' => $this->_tpl_vars['T_NEWS'],'options' => $this->_tpl_vars['T_NEWS_OPTIONS'],'link' => $this->_tpl_vars['T_NEWS_LINK']), $this);?>

                                   </td></tr>
                                <?php $this->_smarty_vars['capture']['moduleNewsList'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php endif; ?>
                            <?php if ($this->_tpl_vars['T_LESSON_COMMENTS'] && $this->_tpl_vars['T_CONFIGURATION']['disable_comments'] != 1): ?>
        <?php ob_start(); ?>
                                   <tr><td class = "moduleCell">
                                           <?php ob_start(); ?>
                                               <?php echo smarty_function_eF_template_printComments(array('data' => $this->_tpl_vars['T_LESSON_COMMENTS']), $this);?>

                                           <?php $this->_smarty_vars['capture']['t_lesson_comments_code'] = ob_get_contents(); ob_end_clean(); ?>
                                             <?php echo smarty_function_eF_template_printBlock(array('title' => @_RECENTCOMMENTS,'data' => $this->_smarty_vars['capture']['t_lesson_comments_code'],'image' => '32x32/note.png'), $this);?>

                                   </td></tr>
                                <?php $this->_smarty_vars['capture']['moduleCommentsList'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php endif; ?>
                            <?php if (isset ( $this->_tpl_vars['T_COMMENTS'] )): ?>
        <?php ob_start(); ?>
                                            <tr><td class = "moduleCell">

                                          <?php ob_start(); ?>

                         <table width="100%">
                                <?php $_from = $this->_tpl_vars['T_COMMENTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['comment']):
?>
                                    <tr>
                                     <td class = "elementCell">
                                       <img src = "view_file.php?file=<?php echo $this->_tpl_vars['comment']['avatar']; ?>
" title="<?php echo @_CURRENTAVATAR; ?>
" alt="<?php echo @_CURRENTAVATAR; ?>
" width = "<?php echo $this->_tpl_vars['comment']['avatar_width']; ?>
" height = "<?php echo $this->_tpl_vars['comment']['avatar_height']; ?>
" style="vertical-align:middle" />
                                     </td>
                                     <td width="100%" >&nbsp;<a href = "<?php echo $_SESSION['s_type']; ?>
.php?ctg=social&op=show_profile&user=<?php echo $this->_tpl_vars['comment']['authors_LOGIN']; ?>
&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_USERPROFILE; ?>
', 1)" target = "POPUP_FRAME"><b>#filter:login-<?php echo $this->_tpl_vars['comment']['authors_LOGIN']; ?>
#</b></a>: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['comment']['data'])) ? $this->_run_mod_handler('replace', true, $_tmp, "<p>", "") : smarty_modifier_replace($_tmp, "<p>", "")))) ? $this->_run_mod_handler('replace', true, $_tmp, "</p>", "") : smarty_modifier_replace($_tmp, "</p>", "")); ?>
 <span class="timeago"><?php echo $this->_tpl_vars['comment']['time_ago']; ?>
</span> </td>
                                                                          <td><a href = "<?php echo $_SESSION['s_type']; ?>
.php?ctg=social&op=comments&action=delete&id=<?php echo $this->_tpl_vars['comment']['id']; ?>
" onclick="return confirm('<?php echo @_AREYOUSUREYOUWANTTODELETETHISCOMMENT; ?>
');"><img src="images/16x16/error_delete.png" title="<?php echo @_DELETE; ?>
" alt="<?php echo @_DELETE; ?>
" border = 0 style="vertical-align:middle" /> </a></td>
                                    </tr>
                                <?php endforeach; else: ?>
                                 <tr>
                                     <td class = "emptyCategory"><?php echo @_NOMESSAGESHAVEBEENPOSTEDONYOURWALLYET; ?>
</td>
                                    </tr>
                             <?php endif; unset($_from); ?>
                             </table>
                                          <?php $this->_smarty_vars['capture']['t_my_wall'] = ob_get_contents(); ob_end_clean(); ?>



                                      </td></tr>
                                <?php $this->_smarty_vars['capture']['moduleWall'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php endif; ?>
       <?php if (isset ( $this->_tpl_vars['T_MY_RELATED_USERS'] )): ?>
        <?php ob_start(); ?>
                                         <tr><td class = "moduleCell">
                                          <?php ob_start(); ?>
                                           <table width="100%">
                                              <?php $_from = $this->_tpl_vars['T_MY_RELATED_USERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
?>
                                               <tr>
                                                <td class = "elementCell">
                                                  <img src = "view_file.php?file=<?php echo $this->_tpl_vars['user']['avatar']; ?>
" title="<?php echo @_CURRENTAVATAR; ?>
" alt="<?php echo @_CURRENTAVATAR; ?>
" width = "<?php echo $this->_tpl_vars['user']['avatar_width']; ?>
" height = "<?php echo $this->_tpl_vars['user']['avatar_height']; ?>
" style="vertical-align:middle" />
                                                </td>
                                                <td width="100%" >&nbsp;<a href = "<?php echo $_SESSION['s_type']; ?>
.php?ctg=social&op=show_profile&user=<?php echo $this->_tpl_vars['user']['login']; ?>
&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_USERPROFILE; ?>
', 1)" target = "POPUP_FRAME"><b>#filter:login-<?php echo $this->_tpl_vars['user']['login']; ?>
#</b></a><?php if (isset ( $this->_tpl_vars['user']['status'] ) && $this->_tpl_vars['user']['status'] != ''): ?> <?php echo $this->_tpl_vars['user']['status']; ?>
<?php endif; ?></td>
                                                </tr>
                               <?php endforeach; else: ?>
                                <tr>
                                    <td class = "emptyCategory"><?php echo @_NOUSERSARECURRENTLYRELATEDTOYOU; ?>
</td>
                                   </tr>
                            <?php endif; unset($_from); ?>
                                           </table>
                                          <?php $this->_smarty_vars['capture']['t_relatedPeople'] = ob_get_contents(); ob_end_clean(); ?>







                                         </td></tr>
                                <?php $this->_smarty_vars['capture']['moduleRelatedPeople'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php endif; ?>

       <?php if (isset ( $this->_tpl_vars['T_EVENTS'] )): ?>
        <?php ob_start(); ?>
                                         <tr><td class = "moduleCell">
                                         <?php ob_start(); ?>
                                             <?php $_from = $this->_tpl_vars['T_EVENTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['event']):
?>
                               <?php echo $this->_tpl_vars['event']['message']; ?>
 <span class="timeago"><?php echo $this->_tpl_vars['event']['time']; ?>
</span> <br/>
                           <?php endforeach; endif; unset($_from); ?>
                                         <?php $this->_smarty_vars['capture']['t_timeline'] = ob_get_contents(); ob_end_clean(); ?>





                                         </td></tr>
                                <?php $this->_smarty_vars['capture']['moduleEventsList'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php endif; ?>

                      <?php $_from = $this->_tpl_vars['T_INNERTABLE_MODULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['module_inner_tables_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['module_inner_tables_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['moduleItem']):
        $this->_foreach['module_inner_tables_list']['iteration']++;
?>
              <?php ob_start(); ?>                   <tr><td class = "moduleCell">
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
                                         <tr><td class = "moduleCell">
                                          <?php ob_start(); ?>
<!--ajax:messagesTable-->
                                            <table class = "sortedTable" width = "100%" height="40px" noFooter="true" size = "<?php echo $this->_tpl_vars['T_MESSAGES_SIZE']; ?>
" sortBy = "0" useAjax = "1" id = "messagesTable" rowsPerPage="20" limit="100" url="<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&folder=<?php echo $this->_tpl_vars['T_FOLDER']; ?>
&p_message=<?php echo $this->_tpl_vars['T_VIEWINGMESSAGE']; ?>
&minimal_view=1&" style="white-space:nowrap;">
                                                <tr class = "defaultRowHeight">
                                                 <td class = "topTitle" name="priority" style = "width:7%;text-align:center;"><?php echo @_FLAG; ?>
</td>
                                                    <td class = "topTitle" name="viewed" style = "width:7%;text-align:center;"><?php echo @_STATUS; ?>
</td>
                                                    <td class = "topTitle" name="title" ><?php echo @_SUBJECT; ?>
</td>
                                                    <td class = "topTitle" name="sender" style="width:11%"><?php echo @_FROM; ?>
</td>
                                                    <td class = "topTitle" name="timestamp" style = "width:13%"><?php echo @_DATE; ?>
</td>
                                                    <td class = "topTitle centerAlign noSort" style="width:10%"><?php echo @_OPERATIONS; ?>
</td>
                                                 </tr>
                                            </table>
<!--/ajax:messagesTable-->

                                          <?php $this->_smarty_vars['capture']['t_messages'] = ob_get_contents(); ob_end_clean(); ?>
                                      <?php if ($this->_tpl_vars['T_CONFIGURATION']['disable_messages'] != 1): ?>
            <?php echo smarty_function_eF_template_printBlock(array('title' => @_RECENTINCOMINGMESSAGES,'data' => $this->_smarty_vars['capture']['t_messages'],'image' => "32x32/mail.png",'options' => $this->_tpl_vars['T_MY_INCOMING_MESSAGES_OPTIONS']), $this);?>

                                         <?php endif; ?>
           </td></tr>
                                <?php $this->_smarty_vars['capture']['moduleMessagesList'] = ob_get_contents(); ob_end_clean(); ?>
    <table style = "width:100%">
     <tr><td class = "moduleCell">
                        <div id="sortableList">
                            <div style="float: right; width:49%;height: 100%;">
                                <ul class="sortable" id="secondlist" style="height:100%;width:100%;">
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
 <?php if (! in_array ( 'moduleProjectsList' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleProjectsList'] && $this->_tpl_vars['T_CONFIGURATION']['disable_projects'] != 1): ?>
                     <li id="firstlist_moduleProjectsList">
                         <table class = "singleColumnData">
                             <?php echo $this->_smarty_vars['capture']['moduleProjectsList']; ?>

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
 <?php if (! in_array ( 'moduleCommentsList' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleCommentsList'] && $this->_tpl_vars['T_CONFIGURATION']['disable_comments'] != 1): ?>
                     <li id="secondlist_moduleCommentsList">
                         <table class = "singleColumnData">
                          <?php echo $this->_smarty_vars['capture']['moduleCommentsList']; ?>

                      </table>
                     </li>
 <?php endif; ?>
                                    <li id = "second_empty" style = "display:none;"></li>
                                </ul>
                            </div>

                                                        <div style="width:50%; height:100%;margin-left:1px;">
                                <ul class="sortable" id="firstlist" style="height:100%;width:100%;">
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

 <?php if (! in_array ( 'moduleTools' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleTools']): ?>
                     <li id="secondlist_moduleTools">
                         <table class = "singleColumnData">
                          <?php echo $this->_smarty_vars['capture']['moduleTools']; ?>

                      </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleWall' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleWall']): ?>
                     <li id="secondlist_moduleWall">
                         <table class = "singleColumnData">
                          <?php echo $this->_smarty_vars['capture']['moduleWall']; ?>

                      </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleRelatedPeople' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleRelatedPeople']): ?>
                     <li id="secondlist_moduleRelatedPeople">
                         <table class = "singleColumnData">
                          <?php echo $this->_smarty_vars['capture']['moduleRelatedPeople']; ?>

                      </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleEventsList' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleEventsList']): ?>
                     <li id="secondlist_moduleEventsList">
                         <table class = "singleColumnData">
                          <?php echo $this->_smarty_vars['capture']['moduleEventsList']; ?>

                      </table>
                     </li>
 <?php endif; ?>
 <?php if (! in_array ( 'moduleMessagesList' , $this->_tpl_vars['T_POSITIONS'] ) && $this->_smarty_vars['capture']['moduleMessagesList']): ?>
                     <li id="secondlist_moduleMessagesList">
                         <table class = "singleColumnData">
                          <?php echo $this->_smarty_vars['capture']['moduleMessagesList']; ?>

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

         <li id = "first_empty" style = "display:none;"></li>
                                </ul>
                            </div>


                        </div>
    </td></tr></table>
                    <?php elseif ($this->_tpl_vars['T_OP'] == 'show_profile'): ?>
     <?php ob_start(); ?>
                 <table width="100%">
                  <tr>
                   <td><img src = "view_file.php?file=<?php echo $this->_tpl_vars['T_PROFILE_TO_SHOW']['avatar']; ?>
" title="<?php echo @_CURRENTAVATAR; ?>
" alt="<?php echo @_CURRENTAVATAR; ?>
" border = "0" /></td>
                   <td width= "100%" align="left"> <b>#filter:login-<?php echo $this->_tpl_vars['T_PROFILE_TO_SHOW']['login']; ?>
#</b><?php if ($this->_tpl_vars['T_PROFILE_TO_SHOW']['status'] != ''): ?> <?php echo $this->_tpl_vars['T_PROFILE_TO_SHOW']['status']; ?>
<?php endif; ?></td>
       <?php if ($this->_tpl_vars['T_CONFIGURATION']['disable_messages'] != 1): ?>
        <td valign="top">
         <a class = "inviteLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&add=1&recipient=<?php echo $this->_tpl_vars['T_PROFILE_TO_SHOW']['login']; ?>
">
          <img src= "images/16x16/mail.png" alt="<?php echo @_SENDMESSAGE; ?>
" title="<?php echo @_SENDMESSAGE; ?>
" border="0"/></a>
        </td>
       <?php endif; ?>
       <?php if ($this->_tpl_vars['T_COMMENTS_ENABLED']): ?>
                   <td valign="top">
                       <a href = "<?php echo $_SESSION['s_type']; ?>
.php?ctg=social&op=comments&action=insert&user=<?php echo $this->_tpl_vars['T_PROFILE_TO_SHOW']['login']; ?>
">
                     <img src= "images/16x16/edit.png" alt="<?php echo @_ADDCOMMENT; ?>
" title="<?php echo @_ADDCOMMENT; ?>
" border="0"/></a>
                   </td>
                   <?php endif; ?>
                  </tr>
                  <tr>
                   <td colspan="2"><?php echo $this->_tpl_vars['T_PROFILE_TO_SHOW']['short_description']; ?>
</td>
                  </tr>
                 </table>


       <?php if (isset ( $this->_tpl_vars['T_COMMENTS'] )): ?>
       <br />
       <hr />
                 <table width="100%">
                        <?php $_from = $this->_tpl_vars['T_COMMENTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['comment']):
?>
                            <tr>
                             <td class = "elementCell">
                               <img src = "view_file.php?file=<?php echo $this->_tpl_vars['comment']['avatar']; ?>
" title="<?php echo @_CURRENTAVATAR; ?>
" alt="<?php echo @_CURRENTAVATAR; ?>
" width = "<?php echo $this->_tpl_vars['comment']['avatar_width']; ?>
" height = "<?php echo $this->_tpl_vars['comment']['avatar_height']; ?>
" style="vertical-align:middle" />
                             </td>
                             <td width="100%" >&nbsp;<a href = "<?php echo $_SESSION['s_type']; ?>
.php?ctg=social&op=show_profile&user=<?php echo $this->_tpl_vars['comment']['authors_LOGIN']; ?>
&popup=1" ><b>#filter:login-<?php echo $this->_tpl_vars['comment']['authors_LOGIN']; ?>
#</b></a>: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['comment']['data'])) ? $this->_run_mod_handler('replace', true, $_tmp, "<p>", "") : smarty_modifier_replace($_tmp, "<p>", "")))) ? $this->_run_mod_handler('replace', true, $_tmp, "</p>", "") : smarty_modifier_replace($_tmp, "</p>", "")); ?>
 <span class="timeago"><?php echo $this->_tpl_vars['comment']['time_ago']; ?>
</span> </td>
                            </tr>
                     <?php endforeach; endif; unset($_from); ?>
                     </table>
       <?php endif; ?>
    <?php $this->_smarty_vars['capture']['t_show_profile_code'] = ob_get_contents(); ob_end_clean(); ?>
     <?php echo smarty_function_eF_template_printBlock(array('title' => @_USERPROFILE,'data' => $this->_smarty_vars['capture']['t_show_profile_code'],'image' => '32x32/profile.png'), $this);?>


        <?php elseif ($this->_tpl_vars['T_OP'] == 'comments'): ?>


     <?php ob_start(); ?>
      <?php echo $this->_tpl_vars['T_COMMENTS_FORM']['javascript']; ?>

      <form <?php echo $this->_tpl_vars['T_COMMENTS_FORM']['attributes']; ?>
>
          <?php echo $this->_tpl_vars['T_COMMENTS_FORM']['hidden']; ?>

          <table class = "formElements">
        <tr><td></td>
         <td><span>
          <img onclick = "toggledInstanceEditor = 'data';javascript:toggleEditor('data','simpleEditor');" class="handle" style="vertical-align:middle" src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
          <a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'data';javascript:toggleEditor('data','simpleEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
         </span></td></tr>
              <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COMMENTS_FORM']['data']['label']; ?>
:&nbsp;</td>
               <td class = "elementCell"><?php echo $this->_tpl_vars['T_COMMENTS_FORM']['data']['html']; ?>
</td></tr>
              <?php if ($this->_tpl_vars['T_COMMENTS_FORM']['data']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_COMMENTS_FORM']['data']['error']; ?>
</td></tr><?php endif; ?>
              <tr><td></td>
               <td class = "submitCell"><?php echo $this->_tpl_vars['T_COMMENTS_FORM']['submit_comments']['html']; ?>
</td></tr>
          </table>
       </form>
      <?php if ($this->_tpl_vars['T_MESSAGE_TYPE'] == 'success'): ?>
          <script>parent.location = parent.location;</script>
      <?php endif; ?>
     <?php $this->_smarty_vars['capture']['t_add_user_comment'] = ob_get_contents(); ob_end_clean(); ?>
     <?php echo smarty_function_eF_template_printBlock(array('title' => @_ADDCOMMENT,'data' => $this->_smarty_vars['capture']['t_add_user_comment'],'image' => '32x32/billboard.png'), $this);?>


                    <?php elseif ($this->_tpl_vars['T_OP'] == 'people'): ?>
     <?php ob_start(); ?>

<!--ajax:peopleTable-->
                <table class = "sortedTable" style = "width:100%" size = "<?php echo $this->_tpl_vars['T_MY_RELATED_USERS_SIZE']; ?>
" sortBy = "2" id = "peopleTable" useAjax = "1" rowsPerPage = "10" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=social&op=people<?php if (isset ( $_GET['display'] )): ?>&display=<?php echo $_GET['display']; ?>
<?php endif; ?>&">
                    <tr style="display:none" class = "topTitle">
                        <td class = "topTitle noSort" name="description" width="35%"><?php echo @_SKILL; ?>
</td>
                        <td class = "topTitle" name="surname" width="*"><?php echo @_SPECIFICATION; ?>
</td>
                        <td class = "topTitle" name="timestamp" width="1"><?php echo @_TIMESTAMP; ?>
</td>
                        <td class = "topTitle" name="common_lessons" width="*"><?php echo @_COMMONLESSONS; ?>
</td>
                    </tr>

            <?php if (isset ( $this->_tpl_vars['T_MY_RELATED_USERS'] )): ?>
                <?php $_from = $this->_tpl_vars['T_MY_RELATED_USERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['people_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['people_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['people_list']['iteration']++;
?>
                    <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
">
            <td class = "elementCell">
              <img src = "view_file.php?file=<?php echo $this->_tpl_vars['user']['avatar']; ?>
" title="<?php echo @_CURRENTAVATAR; ?>
" alt="<?php echo @_CURRENTAVATAR; ?>
" width = "<?php echo $this->_tpl_vars['user']['avatar_width']; ?>
" height = "<?php echo $this->_tpl_vars['user']['avatar_height']; ?>
" style="vertical-align:middle" />
            </td>
            <td width="<?php if ($_SESSION['s_type'] == 'administrator'): ?>100%<?php else: ?>80%<?php endif; ?>" >&nbsp;<a href = "<?php echo $_SESSION['s_type']; ?>
.php?ctg=social&op=show_profile&user=<?php echo $this->_tpl_vars['user']['login']; ?>
&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_USERPROFILE; ?>
', 1)" target = "POPUP_FRAME"><b>#filter:login-<?php echo $this->_tpl_vars['user']['login']; ?>
#</b></a>

             <?php if (isset ( $this->_tpl_vars['user']['status'] ) && $this->_tpl_vars['user']['status'] != ''): ?> <?php echo $this->_tpl_vars['user']['status']; ?>
<?php endif; ?> <?php if (isset ( $this->_tpl_vars['user']['time_ago'] )): ?> <span class="timeago"><?php echo $this->_tpl_vars['user']['time_ago']; ?>
</span><?php endif; ?>
            </td>
            <td style="display:none">
             <?php echo $this->_tpl_vars['user']['timestamp']; ?>

            </td>
            <td width="*" align="right" style="white-space:nowrap">
            <div style="position: relative;">
        <div style="position: absolute;display: none;">
           THIS IS THE INFORMATION I WANT
        </div>
      </div>


            <?php if ($_SESSION['s_type'] != 'administrator'): ?><?php echo $this->_tpl_vars['user']['common_lessons']; ?>

             <a href="javascript:void(0)" class="info nonEmptyLesson" url = "ask_information.php?common_lessons=1&user1=<?php echo $_SESSION['s_login']; ?>
&user2=<?php echo $this->_tpl_vars['user']['login']; ?>
" >
             <?php if ($this->_tpl_vars['user']['common_lessons'] > 1): ?><?php echo @_COMMONLESSONS; ?>
<?php else: ?><?php echo @_COMMONLESSON; ?>
<?php endif; ?>
             </a>
            <?php endif; ?>
            </td>
                    </tr>
                <?php endforeach; endif; unset($_from); ?>
                </table>
<!--/ajax:peopleTable-->
            <?php else: ?>
                    <tr><td colspan = 3>
                        <table width = "100%">
                            <tr><td class = "emptyCategory"><?php echo @_NORELATEDPEOPLEFOUND; ?>
</td></tr>
                        </table>
                        </td>
                    </tr>
                </table>
<!--/ajax:peopleTable-->
   <?php endif; ?>

    <?php $this->_smarty_vars['capture']['t_people'] = ob_get_contents(); ob_end_clean(); ?>
             <?php if ($_SESSION['s_type'] == 'administrator'): ?>
     <?php echo smarty_function_eF_template_printBlock(array('title' => @_USERSWITHCOMMONLESSONS,'data' => $this->_smarty_vars['capture']['t_people'],'image' => "32x32/users.png",'main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'Social_extensions'), $this);?>

    <?php else: ?>
     <?php echo smarty_function_eF_template_printBlock(array('title' => @_USERSWITHCOMMONLESSONS,'data' => $this->_smarty_vars['capture']['t_people'],'image' => "32x32/users.png",'main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'Lesson_users'), $this);?>

    <?php endif; ?>
                    <?php elseif ($this->_tpl_vars['T_OP'] == 'timeline'): ?>

          <?php if (isset ( $_GET['lessons_ID'] )): ?>


                  <?php ob_start(); ?>


        <!--ajax:lessonTimelineTable-->
                    <table class = "sortedTable" style = "width:100%" <?php if (! isset ( $_GET['all'] )): ?>noFooter = "true"<?php endif; ?> size = "<?php echo $this->_tpl_vars['T_TIMELINE_EVENTS_SIZE']; ?>
" sortBy = "0" id = "lessonTimelineTable" useAjax = "1" rowsPerPage = "10" limit="10" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=social&op=timeline&lessons_ID=<?php echo $_SESSION['s_lessons_ID']; ?>
&<?php if (isset ( $_GET['all'] )): ?>all=1&<?php endif; ?><?php if (isset ( $_GET['topics_ID'] )): ?>&topics_ID=<?php echo $_GET['topics_ID']; ?>
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
                <td width="100%"><?php if (isset ( $this->_tpl_vars['event']['editlink'] ) || isset ( $this->_tpl_vars['event']['deletelink'] )): ?><table width="100%"><tr><td width="97%"><?php endif; ?><?php echo $this->_tpl_vars['event']['message']; ?>
 <span class="timeago"><?php echo $this->_tpl_vars['event']['time']; ?>
</span><?php if (isset ( $this->_tpl_vars['event']['editlink'] )): ?></td><td><?php echo $this->_tpl_vars['event']['editlink']; ?>
</td><?php endif; ?><?php if (isset ( $this->_tpl_vars['event']['deletelink'] )): ?></td><td><?php echo $this->_tpl_vars['event']['deletelink']; ?>
</td></tr></table><?php endif; ?><?php if (! isset ( $this->_tpl_vars['event']['editlink'] ) && ! isset ( $this->_tpl_vars['event']['deletelink'] )): ?><br/><?php endif; ?></td>

                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                    </table>
<!--/ajax:lessonTimelineTable-->
                <?php else: ?>
                        <tr><td colspan = 3>
                            <table width = "100%">
                                <tr><td class = "emptyCategory"><?php echo @_NORELATEDEVENTSFOUND; ?>
</td></tr>
                            </table>
                            </td>
                        </tr>
                    </table>
<!--/ajax:lessonTimelineTable-->
       <?php endif; ?>



      <?php $this->_smarty_vars['capture']['t_lessons_timeline_code'] = ob_get_contents(); ob_end_clean(); ?>




     <?php else: ?>

      <?php ob_start(); ?>
        <!--ajax:systemTimelineTable-->
                    <table class = "sortedTable" style = "width:100%" size = "<?php echo $this->_tpl_vars['T_TIMELINE_EVENTS_SIZE']; ?>
" sortBy = "0" id = "systemTimelineTable" useAjax = "1" rowsPerPage = "10" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=social&op=timeline&">
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
                <td width="100%"><?php if (isset ( $this->_tpl_vars['event']['editlink'] ) || isset ( $this->_tpl_vars['event']['deletelink'] )): ?><table width="100%"><tr><td width="97%"><?php endif; ?><?php echo $this->_tpl_vars['event']['message']; ?>
 <span class="timeago"><?php echo $this->_tpl_vars['event']['time']; ?>
</span><?php if (isset ( $this->_tpl_vars['event']['editlink'] )): ?></td><td><?php echo $this->_tpl_vars['event']['editlink']; ?>
</td><?php endif; ?><?php if (isset ( $this->_tpl_vars['event']['deletelink'] )): ?></td><td><?php echo $this->_tpl_vars['event']['deletelink']; ?>
</td></tr></table><?php endif; ?><?php if (! isset ( $this->_tpl_vars['event']['editlink'] ) && ! isset ( $this->_tpl_vars['event']['deletelink'] )): ?><br/><?php endif; ?></td>

                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                    </table>
<!--/ajax:systemTimelineTable-->
                <?php else: ?>
                        <tr><td colspan = 3>
                            <table width = "100%">
                                <tr><td class = "emptyCategory"><?php echo @_NORELATEDEVENTSFOUND; ?>
</td></tr>
                            </table>
                            </td>
                        </tr>
                    </table>
<!--/ajax:systemTimelineTable-->
       <?php endif; ?>


      <?php $this->_smarty_vars['capture']['t_system_timeline_code'] = ob_get_contents(); ob_end_clean(); ?>






     <?php endif; ?>



    <?php endif; ?>

<script>
// Translations
var noMessageInFolderConst = "<?php echo @_NOMESSAGESINFOLDER; ?>
";
var phpSelf = "<?php echo $_SERVER['PHP_SELF']; ?>
";
var currentOperation ='<?php echo $this->_tpl_vars['T_OP']; ?>
';
</script>