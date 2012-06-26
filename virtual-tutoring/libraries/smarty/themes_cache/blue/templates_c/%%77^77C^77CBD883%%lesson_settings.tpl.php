<?php /* Smarty version 2.6.26, created on 2012-05-16 00:52:17
         compiled from includes/lesson_settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/lesson_settings.tpl', 18, false),array('function', 'cycle', 'includes/lesson_settings.tpl', 79, false),array('modifier', 'replace', 'includes/lesson_settings.tpl', 260, false),array('modifier', 'cat', 'includes/lesson_settings.tpl', 261, false),)), $this); ?>
    <?php if (isset ( $this->_tpl_vars['T_OP'] ) && $this->_tpl_vars['T_OP'] == 'reset_lesson'): ?>
                                    <?php ob_start(); ?>
                                        <?php echo $this->_tpl_vars['T_RESET_LESSON_FORM']['javascript']; ?>

                                        <form <?php echo $this->_tpl_vars['T_RESET_LESSON_FORM']['attributes']; ?>
>
                                            <?php echo $this->_tpl_vars['T_RESET_LESSON_FORM']['hidden']; ?>

                                            <table class = "formElements" style = "margin-left:0px">
                                                <tr><td colspan = "100%"><?php echo @_CHOOSEWHATTODELETE; ?>
</td></tr>
                                                <tr><td colspan = "100%">&nbsp;</td></tr>
           <?php $_from = $this->_tpl_vars['T_RESET_LESSON_FORM']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['reset_lesson_options'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['reset_lesson_options']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['reset_lesson_options']['iteration']++;
?>
                                                <tr><td class = "labelCell"><?php echo $this->_tpl_vars['item']['label']; ?>
:&nbsp;</td>
                                                    <td><?php echo $this->_tpl_vars['item']['html']; ?>
</td></tr>
           <?php endforeach; endif; unset($_from); ?>
                                                <tr><td colspan = "100%">&nbsp;</td></tr>
                                                <tr><td></td><td><?php echo $this->_tpl_vars['T_RESET_LESSON_FORM']['submit_reset_lesson']['html']; ?>
</td></tr>
                                            </table>
                                        </form>
                                    <?php $this->_smarty_vars['capture']['t_reset_lesson_code'] = ob_get_contents(); ob_end_clean(); ?>
                                    <?php echo smarty_function_eF_template_printBlock(array('title' => (@_RESTARTLESSON)."<span class = 'innerTableName'>&nbsp;&quot;".($this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_reset_lesson_code'],'image' => '32x32/lessons.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'Administration'), $this);?>


    <?php elseif (isset ( $this->_tpl_vars['T_OP'] ) && $this->_tpl_vars['T_OP'] == 'import_lesson'): ?>
                                    <?php ob_start(); ?>
                                        <?php echo $this->_tpl_vars['T_IMPORT_LESSON_FORM']['javascript']; ?>

                                        <form <?php echo $this->_tpl_vars['T_IMPORT_LESSON_FORM']['attributes']; ?>
>
                                            <?php echo $this->_tpl_vars['T_IMPORT_LESSON_FORM']['hidden']; ?>

                                            <table class = "formElements">
                                             <tr><td colspan = "2"><?php echo @_RESETLESSONDATA; ?>
:</td></tr>
                                                <tr><td colspan = "100%">&nbsp;</td></tr>
           <?php $_from = $this->_tpl_vars['T_IMPORT_LESSON_FORM']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['reset_lesson_options'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['reset_lesson_options']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['reset_lesson_options']['iteration']++;
?>
                                                <tr><td class = "labelCell"><?php echo $this->_tpl_vars['item']['label']; ?>
:&nbsp;</td>
                                                    <td><?php echo $this->_tpl_vars['item']['html']; ?>
</td></tr>
           <?php endforeach; endif; unset($_from); ?>
                                                <tr><td colspan = "2">&nbsp;</td></tr>
                                                <tr><td class = "labelCell"><?php echo @_LESSONDATAFILE; ?>
:&nbsp;</td>
                                                    <td><?php echo $this->_tpl_vars['T_IMPORT_LESSON_FORM']['file_upload']['html']; ?>
</td></tr>
                                                <tr><td></td><td class = "infoCell"><?php echo @_EACHFILESIZEMUSTBESMALLERTHAN; ?>
 <b><?php echo $this->_tpl_vars['T_MAX_FILESIZE']; ?>
</b> <?php echo @_KB; ?>
</td></tr>
                                                <tr><td colspan = "2">&nbsp;</td></tr>
                                                <tr><td></td><td><?php echo $this->_tpl_vars['T_IMPORT_LESSON_FORM']['submit_import_lesson']['html']; ?>
</td></tr>
                                            </table>
                                        </form>
                                    <?php $this->_smarty_vars['capture']['t_import_lesson_code'] = ob_get_contents(); ob_end_clean(); ?>
                                    <?php echo smarty_function_eF_template_printBlock(array('title' => (@_IMPORTLESSON)."<span class = 'innerTableName'>&nbsp;&quot;".($this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_import_lesson_code'],'image' => '32x32/import.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'Administration'), $this);?>

    <?php elseif (isset ( $this->_tpl_vars['T_OP'] ) && $this->_tpl_vars['T_OP'] == 'export_lesson'): ?>
                                   <?php ob_start(); ?>
                                        <fieldset class = "fieldsetSeparator">
                                        <legend><?php echo @_EXPORTLESSON; ?>
</legend>
                                        <?php echo $this->_tpl_vars['T_EXPORT_LESSON_FORM']['javascript']; ?>

                                        <form <?php echo $this->_tpl_vars['T_EXPORT_LESSON_FORM']['attributes']; ?>
>
                                            <?php echo $this->_tpl_vars['T_EXPORT_LESSON_FORM']['hidden']; ?>

                                            <table class = "formElements" style = "margin-left:0px">
          <?php if ($this->_tpl_vars['T_NEW_EXPORTED_FILE']): ?>
                                                <tr><td colspan = "2"><?php echo @_DOWNLOADEXPORTED; ?>
:&nbsp; <a href = "view_file.php?file=<?php echo $this->_tpl_vars['T_NEW_EXPORTED_FILE']['id']; ?>
&action=download"><?php echo $this->_tpl_vars['T_NEW_EXPORTED_FILE']['name']; ?>
</a> (<?php echo $this->_tpl_vars['T_NEW_EXPORTED_FILE']['size']; ?>
 <?php echo @KB; ?>
, #filter:timestamp-<?php echo $this->_tpl_vars['T_NEW_EXPORTED_FILE']['timestamp']; ?>
#)</td></tr>
                                        <?php elseif ($this->_tpl_vars['T_EXPORTED_FILE']): ?>
                                                <tr><td colspan = "2"><?php echo @_EXISTINGFILE; ?>
:&nbsp;<a href = "view_file.php?file=<?php echo $this->_tpl_vars['T_EXPORTED_FILE']['id']; ?>
&action=download"><?php echo $this->_tpl_vars['T_EXPORTED_FILE']['name']; ?>
</a> (<?php echo $this->_tpl_vars['T_EXPORTED_FILE']['size']; ?>
 <?php echo @KB; ?>
, #filter:timestamp-<?php echo $this->_tpl_vars['T_EXPORTED_FILE']['timestamp']; ?>
#)</td></tr>
                                        <?php endif; ?>
                                                <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_EXPORT_LESSON_FORM']['export_files']['label']; ?>
:&nbsp;</td>
                                                 <td class = "elementCell"><?php echo $this->_tpl_vars['T_EXPORT_LESSON_FORM']['export_files']['html']; ?>
</td></tr>
                                                <tr><td class = "labelCell"><?php echo @_CLICKTOEXPORT; ?>
:&nbsp;</td>
                                                    <td class = "submitCell"><?php echo $this->_tpl_vars['T_EXPORT_LESSON_FORM']['submit_export_lesson']['html']; ?>
</td></tr>
                                            </table>
                                        </form>
                                        </fieldset>
                                    <?php $this->_smarty_vars['capture']['t_export_lesson_code'] = ob_get_contents(); ob_end_clean(); ?>
                                    <?php echo smarty_function_eF_template_printBlock(array('title' => (@_EXPORTLESSON)."<span class = 'innerTableName'>&nbsp;&quot;".($this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_export_lesson_code'],'image' => '32x32/export.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'Administration'), $this);?>

    <?php elseif (isset ( $this->_tpl_vars['T_OP'] ) && $this->_tpl_vars['T_OP'] == 'lesson_users'): ?>

                              <?php ob_start(); ?>
<!--ajax:usersTable-->
                                                    <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_USERS_SIZE']; ?>
" sortBy = "0" id = "usersTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?<?php echo $this->_tpl_vars['T_BASE_URL']; ?>
&op=lesson_users&">
                                                        <tr class = "topTitle">
                                                            <td class = "topTitle" name = "login"><?php echo @_LOGIN; ?>
</td>
                                                            <td class = "topTitle" name = "name"><?php echo @_FIRSTNAME; ?>
</td>
                                                            <td class = "topTitle" name = "surname"><?php echo @_LASTNAME; ?>
</td>
                                                            <td class = "topTitle" name = "user_type"><?php echo @_USERTYPE; ?>
</td>
                                                            <td class = "topTitle" name = "role"><?php echo @_USERROLEINLESSON; ?>
</td>
                                                            <td class = "topTitle centerAlign"><?php echo @_OPERATIONS; ?>
</td>
                                                            <td class = "topTitle centerAlign" name = "in_lesson"><?php echo @_STATUS; ?>
</td>
                                                        </tr>
                                <?php $_from = $this->_tpl_vars['T_ALL_USERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users_to_lessons_list']['iteration']++;
?>
                                                        <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['user']['active']): ?>deactivatedTableElement<?php endif; ?>">
                                                            <td>#filter:login-<?php echo $this->_tpl_vars['user']['login']; ?>
#</td>
                                                            <td><?php echo $this->_tpl_vars['user']['name']; ?>
</td>
                                                            <td><?php echo $this->_tpl_vars['user']['surname']; ?>
</td>
                                                            <td><?php echo $this->_tpl_vars['T_ROLES'][$this->_tpl_vars['user']['basic_user_type']]; ?>
</td>
                                                            <td>
                                    <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] == 'change'): ?>
                                                                <select name="type_<?php echo $this->_tpl_vars['user']['login']; ?>
" id = "type_<?php echo $this->_tpl_vars['user']['login']; ?>
" onchange = "$('checked_<?php echo $this->_tpl_vars['user']['login']; ?>
').checked=true;ajaxPost('<?php echo $this->_tpl_vars['user']['login']; ?>
', this);">
                                        <?php $_from = $this->_tpl_vars['T_ROLES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['roles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['roles_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['role_key'] => $this->_tpl_vars['role_item']):
        $this->_foreach['roles_list']['iteration']++;
?>
                                                                    <option value="<?php echo $this->_tpl_vars['role_key']; ?>
" <?php if (( $this->_tpl_vars['user']['role'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['role_item']; ?>
</option>
                                        <?php endforeach; endif; unset($_from); ?>
                                                                </select>
                                    <?php else: ?>
                                                                <?php echo $this->_tpl_vars['T_ROLES'][$this->_tpl_vars['user']['role']]; ?>

                                    <?php endif; ?>
                                                            </td>
                                                            <td align="center">






                                                            <?php if ($this->_tpl_vars['user']['basic_user_type'] == 'student'): ?>
                                                                    <img class = "ajaxHandle" src="images/16x16/refresh.png" title="<?php echo @_RESETPROGRESSDATA; ?>
" alt="<?php echo @_RESETPROGRESSDATA; ?>
" onclick = "if (confirm(translations['_IRREVERSIBLEACTIONAREYOUSURE'])) resetProgress(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
');">
                                                            <?php endif; ?>
                                                            </td>
                                                            <td align="center">
                                    <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] == 'change'): ?>
                                                                <input class = "inputCheckbox" type = "checkbox" name = "checked_<?php echo $this->_tpl_vars['user']['login']; ?>
" id = "checked_<?php echo $this->_tpl_vars['user']['login']; ?>
" onclick = "ajaxPost('<?php echo $this->_tpl_vars['user']['login']; ?>
', this);" <?php if (in_array ( $this->_tpl_vars['user']['login'] , $this->_tpl_vars['T_LESSON_USERS'] )): ?>checked = "checked"<?php endif; ?> />
                                    <?php else: ?>
                                                                 <?php if (in_array ( $this->_tpl_vars['user']['login'] , $this->_tpl_vars['T_LESSON_USERS'] )): ?><img src = "images/16x16/success.png" title = "<?php echo @_LESSONUSER; ?>
" alt = "<?php echo @_LESSONUSER; ?>
" ><?php endif; ?>
                                    <?php endif; ?>
                                                            </td>
                                                    </tr>
                                <?php endforeach; endif; unset($_from); ?>
                                </table>
<!--/ajax:usersTable-->
        <?php $this->_smarty_vars['capture']['t_users_to_lessons_code'] = ob_get_contents(); ob_end_clean(); ?>
                    <?php echo smarty_function_eF_template_printBlock(array('title' => (@_UPDATEUSERSTOLESSONS)."<span class = 'innerTableName'>&nbsp;&quot;".($this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_users_to_lessons_code'],'image' => '32x32/users.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'Administration'), $this);?>



    <?php elseif (isset ( $this->_tpl_vars['T_OP'] ) && $this->_tpl_vars['T_OP'] == 'lesson_layout'): ?>
         <?php ob_start(); ?>
                    <?php ob_start(); ?>
                        <li id = "layoutfirstlist_moduleIconFunctions">
                            <table class = "innerTable" style = "width:300px">
                                <tr class = "handle">
                                    <th class = "innerTableHeader">
                                        <img class = "iconTableImage" src = "images/32x32/options.png" alt = "<?php echo @_CURRENTCONTENT; ?>
" title = "<?php echo @_CONTROLPANEL; ?>
">
                                        <?php echo @_CONTROLPANEL; ?>

                                    </th>
                                    <td class = "innerTableHeader" style = "text-align:right"><img src = "images/16x16/<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleIconFunctions'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleIconFunctions'] == 0): ?>navigate_down.png<?php else: ?>navigate_up.png<?php endif; ?>" onclick = "toggleVisibility(Element.extend(this).up().up().next().down(), this);"></td></tr>
                                <tr><td colspan = "2" style = "height:60px;text-align:center;vertical-align:top;<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleIconFunctions'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleIconFunctions'] == 0): ?>display:none;<?php endif; ?>"><img src = "images/others/control_panel_thumbnail.png"></td></tr>
                            </table>
                        </li>
                    <?php $this->_smarty_vars['capture']['layout_moduleIconFunctions'] = ob_get_contents(); ob_end_clean(); ?>
                    <?php ob_start(); ?>
                        <li id = "layoutfirstlist_moduleContentTree">
                            <table class = "innerTable" style = "width:300px">
                                <tr class = "handle">
                                    <th class = "innerTableHeader">
                                        <img class = "iconTableImage" src = "images/32x32/content.png" alt = "<?php echo @_CURRENTCONTENT; ?>
" title = "<?php echo @_CURRENTCONTENT; ?>
">
                                        <?php echo @_CURRENTCONTENT; ?>

                                    </th>
                                    <td class = "innerTableHeader" style = "text-align:right"><img src = "images/16x16/<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleContentTree'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleContentTree'] == 0): ?>navigate_down.png<?php else: ?>navigate_up.png<?php endif; ?>" onclick = "toggleVisibility(Element.extend(this).up().up().next().down(), this);"></td></tr>
                                <tr><td colspan = "2" style = "height:60px;text-align:center;vertical-align:top;<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleContentTree'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleContentTree'] == 0): ?>display:none;<?php endif; ?>"><img src = "images/others/content_tree_thumbnail.png"></td></tr>
                            </table>
                        </li>
                    <?php $this->_smarty_vars['capture']['layout_moduleContentTree'] = ob_get_contents(); ob_end_clean(); ?>
     <?php if ($this->_tpl_vars['T_CONFIGURATION']['disable_projects'] != 1): ?>
                    <?php ob_start(); ?>
                        <li id = "layoutfirstlist_moduleProjectsList">
                            <table class = "innerTable" style = "width:300px">
                                <tr class = "handle">
                                    <th class = "innerTableHeader">
                                        <img class = "iconTableImage" src = "images/32x32/projects.png" alt = "<?php echo @_PROJECTS; ?>
" title = "<?php echo @_PROJECTS; ?>
">
                                        <?php echo @_PROJECTS; ?>

                                    </th>
                                    <td class = "innerTableHeader" style = "text-align:right"><img src = "images/16x16/<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleProjectsList'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleProjectsList'] == 0): ?>navigate_down.png<?php else: ?>navigate_up.png<?php endif; ?>" onclick = "toggleVisibility(Element.extend(this).up().up().next().down(), this);"></td></tr>

                                <tr><td colspan = "2" style = "height:60px;text-align:center;vertical-align:top;<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleProjectsList'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleProjectsList'] == 0): ?>display:none;<?php endif; ?>"><img src = "images/others/projects_thumbnail.png"></td></tr>
                            </table>
                        </li>
                    <?php $this->_smarty_vars['capture']['layout_moduleProjectsList'] = ob_get_contents(); ob_end_clean(); ?>
     <?php endif; ?>
                    <?php if ($this->_tpl_vars['T_CONFIGURATION']['disable_news'] != 1): ?>
      <?php ob_start(); ?>
                        <li id = "layoutsecondlist_moduleNewsList">
                            <table class = "innerTable" style = "width:300px">
                                <tr class = "handle">
                                    <th class = "innerTableHeader">
                                        <img class = "iconTableImage" src = "images/32x32/announcements.png" alt = "<?php echo @_ANNOUNCEMENTS; ?>
" title = "<?php echo @_ANNOUNCEMENTS; ?>
">
                                        <?php echo @_ANNOUNCEMENTS; ?>

                                    </th>
                                    <td class = "innerTableHeader" style = "text-align:right"><img src = "images/16x16/<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleNewsList'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleNewsList'] == 0): ?>navigate_down.png<?php else: ?>navigate_up.png<?php endif; ?>" onclick = "toggleVisibility(Element.extend(this).up().up().next().down(), this);"></td></tr>

                                <tr><td colspan = "2" style = "height:60px;text-align:center;vertical-align:top;<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleNewsList'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleNewsList'] == 0): ?>display:none;<?php endif; ?>"><img src = "images/others/news_thumbnail.png"></td></tr>
                            </table>
                        </li>
      <?php $this->_smarty_vars['capture']['layout_moduleNewsList'] = ob_get_contents(); ob_end_clean(); ?>
     <?php endif; ?>
     <?php if ($this->_tpl_vars['T_CONFIGURATION']['disable_messages'] != 1): ?>
                    <?php ob_start(); ?>
                        <li id = "layoutsecondlist_modulePersonalMessagesList">
                            <table class = "innerTable" style = "width:300px">
                                <tr class = "handle">
                                    <th class = "innerTableHeader">
                                        <img class = "iconTableImage" src = "images/32x32/mail.png" alt = "<?php echo @_PERSONALMESSAGES; ?>
" title = "<?php echo @_PERSONALMESSAGES; ?>
">
                                        <?php echo @_PERSONALMESSAGES; ?>

                                    </th>
                                    <td class = "innerTableHeader" style = "text-align:right"><img src = "images/16x16/<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['modulePersonalMessagesList'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['modulePersonalMessagesList'] == 0): ?>navigate_down.png<?php else: ?>navigate_up.png<?php endif; ?>" onclick = "toggleVisibility(Element.extend(this).up().up().next().down(), this);"></td></tr>

                                <tr><td colspan = "2" style = "height:60px;text-align:center;vertical-align:top;<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['modulePersonalMessagesList'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['modulePersonalMessagesList'] == 0): ?>display:none;<?php endif; ?>"><img src = "images/others/personal_messages_thumbnail.png"></td></tr>
                            </table>
                        </li>
                    <?php $this->_smarty_vars['capture']['layout_modulePersonalMessagesList'] = ob_get_contents(); ob_end_clean(); ?>
     <?php endif; ?>
     <?php if ($this->_tpl_vars['T_CONFIGURATION']['disable_forum'] != 1): ?>
                    <?php ob_start(); ?>
                        <li id = "layoutsecondlist_moduleForumList">
                            <table class = "innerTable" style = "width:300px">
                                <tr class = "handle">
                                    <th class = "innerTableHeader">
                                        <img class = "iconTableImage" src = "images/32x32/forum.png" alt = "<?php echo @_RECENTMESSAGESATFORUM; ?>
" title = "<?php echo @_RECENTMESSAGESATFORUM; ?>
">
                                        <?php echo @_RECENTMESSAGESATFORUM; ?>

                                    </th>
                                    <td class = "innerTableHeader" style = "text-align:right"><img src = "images/16x16/<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleForumList'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleForumList'] == 0): ?>navigate_down.png<?php else: ?>navigate_up.png<?php endif; ?>" onclick = "toggleVisibility(Element.extend(this).up().up().next().down(), this);"></td></tr>

                                <tr><td colspan = "2" style = "height:60px;text-align:center;vertical-align:top;<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleForumList'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleForumList'] == 0): ?>display:none;<?php endif; ?>"><img src = "images/others/forum_thumbnail.png"></td></tr>
                            </table>
                        </li>
                    <?php $this->_smarty_vars['capture']['layout_moduleForumList'] = ob_get_contents(); ob_end_clean(); ?>
     <?php endif; ?>
     <?php if ($this->_tpl_vars['T_CONFIGURATION']['disable_comments'] != 1): ?>
                    <?php ob_start(); ?>
                        <li id = "layoutsecondlist_moduleComments">
                            <table class = "innerTable" style = "width:300px">
                                <tr class = "handle">
                                    <th class = "innerTableHeader">
                                        <img class = "iconTableImage" src = "images/32x32/note.png" alt = "<?php echo @_COMMENTS; ?>
" title = "<?php echo @_COMMENTS; ?>
">
                                        <?php echo @_COMMENTS; ?>

                                    </th>
                                    <td class = "innerTableHeader" style = "text-align:right"><img src = "images/16x16/<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleComments'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleComments'] == 0): ?>navigate_down.png<?php else: ?>navigate_up.png<?php endif; ?>" onclick = "toggleVisibility(Element.extend(this).up().up().next().down(), this);"></td></tr>

                                <tr><td colspan = "2" style = "height:60px;text-align:center;vertical-align:top;<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleComments'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleComments'] == 0): ?>display:none;<?php endif; ?>"><img src = "images/others/comments_thumbnail.png"></td></tr>
                            </table>
                        </li>
                    <?php $this->_smarty_vars['capture']['layout_moduleComments'] = ob_get_contents(); ob_end_clean(); ?>
     <?php endif; ?>
     <?php if ($this->_tpl_vars['T_CONFIGURATION']['disable_calendar'] != 1): ?>
                    <?php ob_start(); ?>
                        <li id = "layoutsecondlist_moduleCalendar">
                            <table class = "innerTable" style = "width:300px">
                                <tr class = "handle">
                                    <th class = "innerTableHeader">
                                        <img class = "iconTableImage" src = "images/32x32/calendar.png" alt = "<?php echo @_CALENDAR; ?>
" title = "<?php echo @_CALENDAR; ?>
">
                                        <?php echo @_CALENDAR; ?>

                                    </th>
                                    <td class = "innerTableHeader" style = "text-align:right"><img src = "images/16x16/<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleCalendar'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleCalendar'] == 0): ?>navigate_down.png<?php else: ?>navigate_up.png<?php endif; ?>" onclick = "toggleVisibility(Element.extend(this).up().up().next().down(), this);"></td></tr>

                                <tr><td colspan = "2" style = "height:60px;text-align:center;vertical-align:top;<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleCalendar'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleCalendar'] == 0): ?>display:none;<?php endif; ?>"><img src = "images/others/calendar_thumbnail.png"></td></tr>
                            </table>
                        </li>
                    <?php $this->_smarty_vars['capture']['layout_moduleCalendar'] = ob_get_contents(); ob_end_clean(); ?>
     <?php endif; ?>
                    <?php ob_start(); ?>
                        <li id = "layoutsecondlist_moduleDigitalLibrary">
                            <table class = "innerTable" style = "width:300px">
                                <tr class = "handle">
                                    <th class = "innerTableHeader">
                                        <img class = "iconTableImage" src = "images/32x32/file_explorer.png" alt = "<?php echo @_DIGITALLIBRARY; ?>
" title = "<?php echo @_DIGITALLIBRARY; ?>
">
                                        <?php echo @_DIGITALLIBRARY; ?>

                                    </th>
                                    <td class = "innerTableHeader" style = "text-align:right"><img src = "images/16x16/<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleDigitalLibrary'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleDigitalLibrary'] == 0): ?>navigate_down.png<?php else: ?>navigate_up.png<?php endif; ?>" onclick = "toggleVisibility(Element.extend(this).up().up().next().down(), this);"></td></tr>

                                <tr><td colspan = "2" style = "height:60px;text-align:center;vertical-align:top;<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleDigitalLibrary'] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility']['moduleDigitalLibrary'] == 0): ?>display:none;<?php endif; ?>"><img src = "images/others/digital_library_thumbnail.png"></td></tr>
                            </table>
                        </li>
                    <?php $this->_smarty_vars['capture']['layout_moduleDigitalLibrary'] = ob_get_contents(); ob_end_clean(); ?>
                <?php $_from = $this->_tpl_vars['T_LESSON_MODULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lesson_modules_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lesson_modules_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['class_name'] => $this->_tpl_vars['module']):
        $this->_foreach['lesson_modules_list']['iteration']++;
?>
                    <?php $this->assign('module_name', ((is_array($_tmp=$this->_tpl_vars['class_name'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', "") : smarty_modifier_replace($_tmp, '_', ""))); ?>
                    <?php ob_start(); ?>
                        <li id = "layoutsecondlist_<?php echo ((is_array($_tmp=$this->_tpl_vars['class_name'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', "") : smarty_modifier_replace($_tmp, '_', "")); ?>
">
                            <table class = "innerTable" style = "width:300px">
                                <tr class = "handle">
                                    <th class = "innerTableHeader">
                                        <img class = "iconTableImage" src = "images/32x32/addons.png" alt = "<?php echo $this->_tpl_vars['module']['title']; ?>
" title = "<?php echo $this->_tpl_vars['module']['title']; ?>
">
                                        <?php echo $this->_tpl_vars['module']['title']; ?>

                                    </th>
                                    <td class = "innerTableHeader" style = "text-align:right"><img src = "images/16x16/<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility'][$this->_tpl_vars['module_name']] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility'][$this->_tpl_vars['module_name']] == 0): ?>navigate_down.png<?php else: ?>navigate_up.png<?php endif; ?>" onclick = "toggleVisibility(Element.extend(this).up().up().next().down(), this);"></td></tr>
                                <tr><td colspan = "2" style = "height:60px;text-align:center;vertical-align:middle;<?php if (isset ( $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility'][$this->_tpl_vars['module_name']] ) && $this->_tpl_vars['T_DEFAULT_POSITIONS']['visibility'][$this->_tpl_vars['module_name']] == 0): ?>display:none;<?php endif; ?>"><img src = "images/16x16/layout.png" alt = "<?php echo @_MODULE; ?>
" title = "<?php echo @_MODULE; ?>
"></td></tr>
                            </table>
                        </li>
                    <?php $this->_smarty_vars['capture'][((is_array($_tmp='layout_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['module_name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['module_name']))] = ob_get_contents(); ob_end_clean(); ?>
                <?php endforeach; endif; unset($_from); ?>
            <div id = "sortableList" class = "lessonLayout">
             <table>
              <tr><td>
                      <ul class = "sortable" id = "layoutfirstlist">
                      <?php if (! in_array ( 'moduleIconFunctions' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['first'] ) && ! in_array ( 'moduleIconFunctions' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['second'] ) && ! $this->_tpl_vars['T_INVALID_OPTIONS']['moduleIconFunctions']): ?><?php echo $this->_smarty_vars['capture']['layout_moduleIconFunctions']; ?>
<?php endif; ?>
                      <?php if (! in_array ( 'moduleContentTree' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['first'] ) && ! in_array ( 'moduleContentTree' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['second'] ) && ! $this->_tpl_vars['T_INVALID_OPTIONS']['moduleContentTree']): ?><?php echo $this->_smarty_vars['capture']['layout_moduleContentTree']; ?>
<?php endif; ?>
                      <?php if (! in_array ( 'moduleProjectsList' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['first'] ) && ! in_array ( 'moduleProjectsList' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['second'] ) && ! $this->_tpl_vars['T_INVALID_OPTIONS']['moduleProjectsList']): ?><?php echo $this->_smarty_vars['capture']['layout_moduleProjectsList']; ?>
<?php endif; ?>
                      <?php $_from = $this->_tpl_vars['T_DEFAULT_POSITIONS']['first']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['positions_first'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['positions_first']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['innerTable']):
        $this->_foreach['positions_first']['iteration']++;
?>
                          <?php if (! $this->_tpl_vars['T_INVALID_OPTIONS'][$this->_tpl_vars['innerTable']]): ?>
                              <?php $this->assign('capture_name', ((is_array($_tmp='layout_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['innerTable']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['innerTable']))); ?>
                              <?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['capture_name']]; ?>

                          <?php endif; ?>
                      <?php endforeach; endif; unset($_from); ?>
                      </ul>
                  </td><td>
                      <ul class = "sortable" id = "layoutsecondlist">
                      <?php if (! in_array ( 'moduleNewsList' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['first'] ) && ! in_array ( 'moduleNewsList' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['second'] ) && ! $this->_tpl_vars['T_INVALID_OPTIONS']['moduleNewsList']): ?><?php echo $this->_smarty_vars['capture']['layout_moduleNewsList']; ?>
<?php endif; ?>
                      <?php if (! in_array ( 'modulePersonalMessagesList' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['first'] ) && ! in_array ( 'modulePersonalMessagesList' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['second'] ) && ! $this->_tpl_vars['T_INVALID_OPTIONS']['modulePersonalMessagesList']): ?><?php echo $this->_smarty_vars['capture']['layout_modulePersonalMessagesList']; ?>
<?php endif; ?>
                      <?php if (! in_array ( 'moduleForumList' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['first'] ) && ! in_array ( 'moduleForumList' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['second'] ) && ! $this->_tpl_vars['T_INVALID_OPTIONS']['moduleForumList']): ?><?php echo $this->_smarty_vars['capture']['layout_moduleForumList']; ?>
<?php endif; ?>
       <?php if (! in_array ( 'moduleComments' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['first'] ) && ! in_array ( 'moduleComments' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['second'] ) && ! $this->_tpl_vars['T_INVALID_OPTIONS']['moduleComments']): ?><?php echo $this->_smarty_vars['capture']['layout_moduleComments']; ?>
<?php endif; ?>
       <?php if (! in_array ( 'moduleCalendar' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['first'] ) && ! in_array ( 'moduleCalendar' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['second'] ) && ! $this->_tpl_vars['T_INVALID_OPTIONS']['moduleCalendar']): ?><?php echo $this->_smarty_vars['capture']['layout_moduleCalendar']; ?>
<?php endif; ?>
                      <?php if (! in_array ( 'moduleDigitalLibrary' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['first'] ) && ! in_array ( 'moduleDigitalLibrary' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['second'] ) && ! $this->_tpl_vars['T_INVALID_OPTIONS']['moduleDigitalLibrary']): ?><?php echo $this->_smarty_vars['capture']['layout_moduleDigitalLibrary']; ?>
<?php endif; ?>
                      <?php if (! in_array ( 'moduleTimeline' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['first'] ) && ! in_array ( 'moduleTimeline' , $this->_tpl_vars['T_DEFAULT_POSITIONS']['second'] ) && ! $this->_tpl_vars['T_INVALID_OPTIONS']['moduleTimeline']): ?><?php echo $this->_smarty_vars['capture']['layout_moduleTimeline']; ?>
<?php endif; ?>
                      <?php $_from = $this->_tpl_vars['T_DEFAULT_POSITIONS']['second']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['positions_second'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['positions_second']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['innerTable']):
        $this->_foreach['positions_second']['iteration']++;
?>
        <?php if (! $this->_tpl_vars['T_INVALID_OPTIONS'][$this->_tpl_vars['innerTable']]): ?>
                              <?php $this->assign('capture_name', ((is_array($_tmp='layout_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['innerTable']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['innerTable']))); ?>
                              <?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['capture_name']]; ?>

                          <?php endif; ?>
                      <?php endforeach; endif; unset($_from); ?>
                      <?php $_from = $this->_tpl_vars['T_LESSON_MODULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lesson_modules_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lesson_modules_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['class_name'] => $this->_tpl_vars['module']):
        $this->_foreach['lesson_modules_list']['iteration']++;
?>
                          <?php $this->assign('module_name', ((is_array($_tmp=$this->_tpl_vars['class_name'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', "") : smarty_modifier_replace($_tmp, '_', ""))); ?>
                          <?php $this->assign('layout_name', ((is_array($_tmp='layout_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['module_name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['module_name']))); ?>
                          <?php if (! in_array ( $this->_tpl_vars['module_name'] , $this->_tpl_vars['T_DEFAULT_POSITIONS']['first'] ) && ! in_array ( $this->_tpl_vars['module_name'] , $this->_tpl_vars['T_DEFAULT_POSITIONS']['second'] )): ?><?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['layout_name']]; ?>
<?php endif; ?>
                      <?php endforeach; endif; unset($_from); ?>
                      </ul>
                 </td></tr>
                 <tr><td colspan = "2" id = "submitLayout"><input type = "button" value = "<?php echo @_SAVECHANGES; ?>
" onclick = "updatePositions(this, '<?php echo $this->_tpl_vars['T_LESSON_ID']; ?>
')" class = "flatButton"/></td></tr>
             </table>
            <br/>
            </div>
        <?php $this->_smarty_vars['capture']['t_layout_code'] = ob_get_contents(); ob_end_clean(); ?>
        <?php echo smarty_function_eF_template_printBlock(array('title' => (@_LAYOUTFORLESSON)."<span class = 'innerTableName'>&nbsp;&quot;".($this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_layout_code'],'image' => '32x32/layout.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'Administration'), $this);?>

    <?php else: ?>
                <?php echo smarty_function_eF_template_printBlock(array('title' => (@_OPTIONSFORLESSON)."<span class = 'innerTableName'>&nbsp;&quot;".($this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])."&quot;</span>",'columns' => 4,'links' => $this->_tpl_vars['T_LESSON_SETTINGS'],'image' => '32x32/lessons.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'groups' => $this->_tpl_vars['T_LESSON_SETTINGS_GROUPS'],'help' => 'Administration'), $this);?>

    <?php endif; ?>