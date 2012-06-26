<?php /* Smarty version 2.6.26, created on 2012-05-15 12:00:18
         compiled from includes/maintenance.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'eF_truncate', 'includes/maintenance.tpl', 33, false),array('modifier', 'replace', 'includes/maintenance.tpl', 140, false),array('function', 'eF_template_printBlock', 'includes/maintenance.tpl', 56, false),array('function', 'eF_template_html_select_date', 'includes/maintenance.tpl', 88, false),array('function', 'cycle', 'includes/maintenance.tpl', 264, false),)), $this); ?>
<?php ob_start(); ?>
 <tr><td class = "moduleCell">

 <?php ob_start(); ?>
     <table>
         <tr><td class = "labelCell"><?php echo @_ORPHANUSERFOLDERSCHECK; ?>
:&nbsp;</td>
             <td class = "elementCell">
             <?php if ($this->_tpl_vars['T_ORPHAN_USER_FOLDERS']): ?>
                 <img src = "images/16x16/warning.png" title = "<?php echo @_PROBLEM; ?>
" alt = "<?php echo @_PROBLEM; ?>
"/>&nbsp;
                 <img src = "images/16x16/help.png" title = "<?php echo @_INFO; ?>
" alt = "<?php echo @_INFO; ?>
" onclick = "eF_js_showDivPopup('<?php echo @_ORPHANUSERFOLDERSCHECK; ?>
', 0, 'orphan_user_folders')"/>&nbsp;
                 <img src = "images/16x16/error_delete.png" title = "<?php echo @_CLEANUP; ?>
" alt = "<?php echo @_CLEANUP; ?>
" onclick = "if (confirm('<?php echo @_PEMANENTLYDELETEFOLLOWINGFOLDERS; ?>
:\n\n<?php echo $this->_tpl_vars['T_ORPHAN_USER_FOLDERS']; ?>
\n\n<?php echo @_AREYOUSURE; ?>
')) location = '<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=maintenance&tab=tasks&cleanup=orphan_user_folders'"/>
             <?php else: ?>
                 <img src = "images/16x16/success.png" title = "<?php echo @_OK; ?>
" alt = "<?php echo @_OK; ?>
"/>
             <?php endif; ?>
             </td></tr>
         <tr><td class = "labelCell"><?php echo @_USERSWITHOUTFOLDERSCHECK; ?>
:&nbsp;</td>
             <td class = "elementCell">
             <?php if ($this->_tpl_vars['T_ORPHAN_USERS']): ?>
                 <img src = "images/16x16/warning.png" title = "<?php echo @_PROBLEM; ?>
" alt = "<?php echo @_PROBLEM; ?>
"/>&nbsp;
                 <img src = "images/16x16/help.png" title = "<?php echo @_INFO; ?>
" alt = "<?php echo @_INFO; ?>
" onclick = "eF_js_showDivPopup('<?php echo @_USERSWITHOUTFOLDERSCHECK; ?>
', 0, 'users_without_folders')"/>&nbsp;
                 <img src = "images/16x16/error_delete.png" title = "<?php echo @_CLEANUP; ?>
" alt = "<?php echo @_CLEANUP; ?>
" onclick = "if (confirm('<?php echo @_PEMANENTLYDELETEFOLLOWINGUSERS; ?>
:\n\n<?php echo $this->_tpl_vars['T_ORPHAN_USERS']; ?>
\n\n<?php echo @_AREYOUSURE; ?>
')) location = '<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=maintenance&tab=tasks&cleanup=users_without_folders'"/>&nbsp;
                 <img src = "images/16x16/folders.png" title = "<?php echo @_CREATEFOLDER; ?>
" alt = "<?php echo @_CREATEFOLDER; ?>
" onclick = "if (confirm('<?php echo @_CREATEFOLLOWINGUSERFOLDERS; ?>
:\n\n<?php echo $this->_tpl_vars['T_ORPHAN_USERS']; ?>
\n\n<?php echo @_AREYOUSURE; ?>
')) location = '<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=maintenance&tab=tasks&create=user_folders'"/>
             <?php else: ?>
                 <img src = "images/16x16/success.png" title = "<?php echo @_OK; ?>
" alt = "<?php echo @_OK; ?>
"/>
             <?php endif; ?>
             </td></tr>
         <tr><td class = "labelCell"><?php echo @_ORPHANLESSONFOLDERSCHECK; ?>
:&nbsp;</td>
             <td class = "elementCell">
             <?php if ($this->_tpl_vars['T_ORPHAN_LESSON_FOLDERS']): ?>
                 <img src = "images/16x16/warning.png" title = "<?php echo @_PROBLEM; ?>
" alt = "<?php echo @_PROBLEM; ?>
"/>&nbsp;
                 <img src = "images/16x16/help.png" title = "<?php echo @_INFO; ?>
" alt = "<?php echo @_INFO; ?>
" onclick = "eF_js_showDivPopup('<?php echo @_ORPHANLESSONFOLDERSCHECK; ?>
', 0, 'orphan_lesson_folders')"/>&nbsp;
                 <img src = "images/16x16/error_delete.png" title = "<?php echo @_CLEANUP; ?>
" alt = "<?php echo @_CLEANUP; ?>
" onclick = "if (confirm('<?php echo @_PEMANENTLYDELETEFOLLOWINGFOLDERS; ?>
:<?php echo smarty_modifier_eF_truncate($this->_tpl_vars['T_ORPHAN_LESSON_FOLDERS'], 30); ?>
<?php echo @_AREYOUSURE; ?>
')) location = '<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=maintenance&tab=tasks&cleanup=orphan_lesson_folders'"/>
             <?php else: ?>
                 <img src = "images/16x16/success.png" title = "<?php echo @_OK; ?>
" alt = "<?php echo @_OK; ?>
"/>
             <?php endif; ?>
         </td></tr>
         <tr><td class = "labelCell"><?php echo @_LESSONSWITHOUTFOLDERSCHECK; ?>
:&nbsp;</td>
             <td class = "elementCell">
             <?php if ($this->_tpl_vars['T_ORPHAN_LESSONS']): ?>
                 <img src = "images/16x16/warning.png" title = "<?php echo @_PROBLEM; ?>
" alt = "<?php echo @_PROBLEM; ?>
"/>&nbsp;
                 <img src = "images/16x16/help.png" title = "<?php echo @_INFO; ?>
" alt = "<?php echo @_INFO; ?>
" onclick = "eF_js_showDivPopup('<?php echo @_LESSONSWITHOUTFOLDERSCHECK; ?>
', 0, 'lessons_without_folders')"/>&nbsp;
                 <img src = "images/16x16/error_delete.png" title = "<?php echo @_CLEANUP; ?>
" alt = "<?php echo @_CLEANUP; ?>
" onclick = "if (confirm('<?php echo @_PEMANENTLYDELETEFOLLOWINGLESSONS; ?>
:\n\n<?php echo $this->_tpl_vars['T_ORPHAN_LESSONS']; ?>
\n\n<?php echo @_AREYOUSURE; ?>
')) location = '<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=maintenance&tab=tasks&cleanup=lessons_without_folders'"/>&nbsp;
                 <img src = "images/16x16/folders.png" title = "<?php echo @_CREATEFOLDER; ?>
" alt = "<?php echo @_CREATEFOLDER; ?>
" onclick = "if (confirm('<?php echo @_CREATEFOLLOWINGLESSONFOLDERS; ?>
:\n\n<?php echo $this->_tpl_vars['T_ORPHAN_LESSONS']; ?>
\n\n<?php echo @_AREYOUSURE; ?>
')) location = '<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=maintenance&tab=tasks&create=lesson_folders'"/>
             <?php else: ?>
                 <img src = "images/16x16/success.png" title = "<?php echo @_OK; ?>
" alt = "<?php echo @_OK; ?>
"/>
             <?php endif; ?>
         </td></tr>
         <tr><td></td>
          <td class = "submitCell"><input class = "flatButton" type = "button" value = "<?php echo @_CHECKAGAIN; ?>
" onclick = "location = '<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=maintenance&tab=tasks'"></td></tr>
     </table>
     <div id = "orphan_user_folders" style = "display:none;">
     <?php ob_start(); ?>
         <?php echo $this->_tpl_vars['T_ORPHAN_USER_FOLDERS']; ?>

     <?php $this->_smarty_vars['capture']['t_orphan_user_folders_code'] = ob_get_contents(); ob_end_clean(); ?>
     <?php echo smarty_function_eF_template_printBlock(array('title' => @_FOLDERSWITHOUTAUSERASSOCIATED,'data' => $this->_smarty_vars['capture']['t_orphan_user_folders_code'],'image' => '32x32/cleanup.png'), $this);?>

     </div>
     <div id = "users_without_folders" style = "display:none;">
     <?php ob_start(); ?>
         <?php echo $this->_tpl_vars['T_ORPHAN_USERS']; ?>

     <?php $this->_smarty_vars['capture']['t_orphan_users_code'] = ob_get_contents(); ob_end_clean(); ?>
     <?php echo smarty_function_eF_template_printBlock(array('title' => @_USERSWITHOUTAFOLDER,'data' => $this->_smarty_vars['capture']['t_orphan_users_code'],'image' => '32x32/cleanup.png'), $this);?>

     </div>
     <div id = "orphan_lesson_folders" style = "display:none;">
     <?php ob_start(); ?>
         <?php echo $this->_tpl_vars['T_ORPHAN_LESSON_FOLDERS']; ?>

     <?php $this->_smarty_vars['capture']['t_orphan_lesson_folders_code'] = ob_get_contents(); ob_end_clean(); ?>
     <?php echo smarty_function_eF_template_printBlock(array('title' => @_FOLDERSWITHOUTALESSONASSOCIATED,'data' => $this->_smarty_vars['capture']['t_orphan_lesson_folders_code'],'image' => '32x32/cleanup.png'), $this);?>

     </div>
     <div id = "lessons_without_folders" style = "display:none;">
     <?php ob_start(); ?>
         <?php echo $this->_tpl_vars['T_ORPHAN_LESSONS']; ?>

     <?php $this->_smarty_vars['capture']['t_lessons_without_folders_code'] = ob_get_contents(); ob_end_clean(); ?>
     <?php echo smarty_function_eF_template_printBlock(array('title' => @_LESSONSWITHOUTAFOLDER,'data' => $this->_smarty_vars['capture']['t_lessons_without_folders_code'],'image' => '32x32/cleanup.png'), $this);?>

     </div>

  <?php echo $this->_tpl_vars['T_CLEANUP_FORM']['javascript']; ?>

  <form <?php echo $this->_tpl_vars['T_CLEANUP_FORM']['attributes']; ?>
>
   <?php echo $this->_tpl_vars['T_CLEANUP_FORM']['hidden']; ?>

   <fieldset class = "fieldsetSeparator">
    <legend><?php echo @_PURGELOGS; ?>
</legend>
   <table>
    <tr><td class="labelCell"><?php echo @_LOGSSIZE; ?>
:&nbsp;</td>
     <td class="elementCell"><?php echo $this->_tpl_vars['T_LOG_SIZE']; ?>
 <?php echo @_ENTRIES; ?>
</td></tr>
    <tr><td class="labelCell"><?php echo @_OLDESTLOG; ?>
:&nbsp;</td>
     <td class="elementCell">#filter:timestamp-<?php echo $this->_tpl_vars['T_LAST_LOG_ENTRY']; ?>
#</td></tr>
          <tr><td class = "labelCell"><?php echo @_PURGELOGSOLDERTHAN; ?>
:&nbsp;</td>
              <td class = "elementCell"><?php echo smarty_function_eF_template_html_select_date(array('prefix' => 'purge_','time' => $this->_tpl_vars['T_LAST_LOG_ENTRY'],'start_year' => "-5",'end_year' => "+0",'field_order' => $this->_tpl_vars['T_DATE_FORMATGENERAL']), $this);?>
</td></tr>
    <tr><td></td>
     <td class = "submitCell"><?php echo $this->_tpl_vars['T_CLEANUP_FORM']['submit']['html']; ?>
</td></tr>
   </table>
   </fieldset>
  </form>

  <?php echo $this->_tpl_vars['T_CLEANUP_NOTIFICATIONS_FORM']['javascript']; ?>

  <form <?php echo $this->_tpl_vars['T_CLEANUP_NOTIFICATIONS_FORM']['attributes']; ?>
>
   <?php echo $this->_tpl_vars['T_CLEANUP_NOTIFICATIONS_FORM']['hidden']; ?>

   <fieldset class = "fieldsetSeparator">
    <legend><?php echo @_PURGENOTIFICATIONS; ?>
</legend>
   <table>
    <tr><td class="labelCell"><?php echo @_NOTIFICATIONSSIZE; ?>
:&nbsp;</td>
     <td class="elementCell"><?php echo $this->_tpl_vars['T_NOTIFICATIONS_SIZE']; ?>
 <?php echo @_ENTRIES; ?>
</td></tr>
    <tr><td class="labelCell"><?php echo @_OLDESTNOTIFICATION; ?>
:&nbsp;</td>
     <td class="elementCell">#filter:timestamp-<?php echo $this->_tpl_vars['T_LAST_NOTIFICATIONS_ENTRY']; ?>
#</td></tr>
          <tr><td class = "labelCell"><?php echo @_PURGENOTIFICATIONSOLDERTHAN; ?>
:&nbsp;</td>
              <td class = "elementCell"><?php echo smarty_function_eF_template_html_select_date(array('prefix' => 'purge_','time' => $this->_tpl_vars['T_LAST_NOTIFICATIONS_ENTRY'],'start_year' => "-5",'end_year' => "+0",'field_order' => $this->_tpl_vars['T_DATE_FORMATGENERAL']), $this);?>
</td></tr>
    <tr><td></td>
     <td class = "submitCell"><?php echo $this->_tpl_vars['T_CLEANUP_NOTIFICATIONS_FORM']['submit']['html']; ?>
</td></tr>
   </table>
   </fieldset>
  </form>

  <?php echo $this->_tpl_vars['T_CLEANUP_EVENTS_FORM']['javascript']; ?>

  <form <?php echo $this->_tpl_vars['T_CLEANUP_EVENTS_FORM']['attributes']; ?>
>
   <?php echo $this->_tpl_vars['T_CLEANUP_EVENTS_FORM']['hidden']; ?>

   <fieldset class = "fieldsetSeparator">
    <legend><?php echo @_PURGEEVENTS; ?>
</legend>
   <table>
    <tr><td class="labelCell"><?php echo @_EVENTSSIZE; ?>
:&nbsp;</td>
     <td class="elementCell"><?php echo $this->_tpl_vars['T_EVENTS_SIZE']; ?>
 <?php echo @_ENTRIES; ?>
</td></tr>
    <tr><td class="labelCell"><?php echo @_OLDESTEVENT; ?>
:&nbsp;</td>
     <td class="elementCell">#filter:timestamp-<?php echo $this->_tpl_vars['T_LAST_EVENTS_ENTRY']; ?>
#</td></tr>
          <tr><td class = "labelCell"><?php echo @_PURGEEVENTSOLDERTHAN; ?>
:&nbsp;</td>
              <td class = "elementCell"><?php echo smarty_function_eF_template_html_select_date(array('prefix' => 'purge_','time' => $this->_tpl_vars['T_LAST_EVENTS_ENTRY'],'start_year' => "-5",'end_year' => "+0",'field_order' => $this->_tpl_vars['T_DATE_FORMATGENERAL']), $this);?>
</td></tr>
    <tr><td></td>
     <td class = "submitCell"><?php echo $this->_tpl_vars['T_CLEANUP_EVENTS_FORM']['submit']['html']; ?>
</td></tr>
   </table>
   </fieldset>
  </form>

 <?php $this->_smarty_vars['capture']['t_cleanup_code'] = ob_get_contents(); ob_end_clean(); ?>
 <?php ob_start(); ?>
 <table class = "formElements">
  <tr><td class = "labelCell"><?php echo @_VERSION; ?>
:&nbsp;</td>
   <td class = "elementCell"><?php echo @G_VERSION_NUM; ?>
 <?php echo $this->_tpl_vars['T_VERSION_TYPES'][@G_VERSIONTYPE_CODEBASE]; ?>
</td></tr>
  <tr><td class = "labelCell"><?php echo @_DATABASEVERSION; ?>
:&nbsp;</td>
   <td class = "elementCell"><?php echo $this->_tpl_vars['T_CONFIGURATION']['database_version']; ?>
 <?php echo $this->_tpl_vars['T_VERSION_TYPES'][$this->_tpl_vars['T_CONFIGURATION']['version_type']]; ?>
</td></tr>
  <?php if ($this->_tpl_vars['T_DIFFERENT_VERSIONS']): ?>
  <tr><td></td>
   <td class = "infoCell" style = "vertical-align:middle"><img src = "images/16x16/warning.png" class = "ajaxHandle" title = "<?php echo @_WARNING; ?>
" alt = "<?php echo @_WARNING; ?>
"/><span style = "vertical-align:middle"> <?php echo ((is_array($_tmp=@_DIFFERENTVERSIONSUPGRADENEEDED)) ? $this->_run_mod_handler('replace', true, $_tmp, "%link", "<a href = 'install/install.php?step=1&upgrade=1' style = 'vertical-align:middle'>".(@_UPGRADE)."</a>") : smarty_modifier_replace($_tmp, "%link", "<a href = 'install/install.php?step=1&upgrade=1' style = 'vertical-align:middle'>".(@_UPGRADE)."</a>")); ?>
</span></td></tr>
  <?php endif; ?>
  <tr><td class = "labelCell"><?php echo @_BUILD; ?>
:&nbsp;</td>
   <td class = "elementCell"><?php echo @G_BUILD; ?>
</td></tr>
 </table>
 <div class = "tabber">
     <div class = "tabbertab">
         <h3><?php echo @_ENVIRONMENTALCHECK; ?>
</h3>
         <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'includes/check_status.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
     </div>
  <div class = "tabbertab <?php if ($_GET['tab'] == 'phpinfo'): ?>tabbertabdefault<?php endif; ?>" title = "<?php echo @_PHPINFO; ?>
">
    <?php ob_start(); ?>
  <div class = "phpinfodisplay"><?php echo $this->_tpl_vars['T_PHPINFO']; ?>
</div>
 <?php $this->_smarty_vars['capture']['t_php_info_code'] = ob_get_contents(); ob_end_clean(); ?>
 <?php echo smarty_function_eF_template_printBlock(array('title' => @_PHPINFO,'data' => $this->_smarty_vars['capture']['t_php_info_code'],'image' => '32x32/php.png'), $this);?>

 </div>

    <div class = "tabbertab <?php if ($_GET['tab'] == 'lock_down'): ?>tabbertabdefault<?php endif; ?>">
        <h3><?php echo @_LOCKDOWN; ?>
</h3>
  <?php ob_start(); ?>
         <?php echo $this->_tpl_vars['T_LOCKDOWN_FORM']['javascript']; ?>

         <form <?php echo $this->_tpl_vars['T_LOCKDOWN_FORM']['attributes']; ?>
>
       <?php echo $this->_tpl_vars['T_LOCKDOWN_FORM']['hidden']; ?>

       <table class = "formElements">
           <?php if ($this->_tpl_vars['T_CONFIGURATION']['lock_down']): ?>
           <tr><td class = "labelCell severeWarning"><?php echo @_THESYSTEMISCURRENTLYLOCKED; ?>
&nbsp;</td>
               <td class = "elementCell"><?php echo $this->_tpl_vars['T_LOCKDOWN_FORM']['submit_unlock']['html']; ?>
</td></tr>
           <?php else: ?>
           <tr><td class = "labelCell"><?php echo @_LOCKDOWNMESSAGE; ?>
:&nbsp;</td>
               <td class = "elementCell"><?php echo $this->_tpl_vars['T_LOCKDOWN_FORM']['lock_message']['html']; ?>
</td>
           <tr><td class = "labelCell"><?php echo @_LOGOUTUSERS; ?>
:&nbsp;</td>
               <td class = "elementCell"><?php echo $this->_tpl_vars['T_LOCKDOWN_FORM']['logout_users']['html']; ?>
</td>
           <tr><td colspan = "2">&nbsp;</td></tr>
           <tr><td class = "labelCell"></td>
               <td class = "elementCell"><?php echo $this->_tpl_vars['T_LOCKDOWN_FORM']['submit_lockdown']['html']; ?>
</td></tr>
           <?php endif; ?>
          </table>
         </form>
  <?php $this->_smarty_vars['capture']['t_lock_down_code'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo smarty_function_eF_template_printBlock(array('title' => @_LOCKDOWN,'data' => $this->_smarty_vars['capture']['t_lock_down_code'],'image' => '32x32/key.png'), $this);?>

    </div>

    <?php ob_start(); ?>
        <table>
      <tr><td class = "labelCell"><?php echo @_CLICKHERETOCHECKPERMISSIONS; ?>
:&nbsp;</td>
          <td class = "submitCell"><input type = "button" class = "flatButton" value = "<?php echo @_CHECKPERMISSIONS; ?>
" onclick = "setPermissions(this, 'check')"/></td></tr>
   <tr><td></td>
          <td class = "infoCell"><?php echo @_CHECKPERMISSIONSINSTRUCTIONS; ?>
</td></tr>
      <tr><td class = "labelCell"><?php echo @_CLICKHERETOSETPERMISSIONS; ?>
:&nbsp;</td>
          <td class = "submitCell"><input type = "button" class = "flatButton" value = "<?php echo @_SETPERMISSIONS; ?>
" onclick = "setPermissions(this, 'set')"/></td></tr>
   <tr><td></td>
          <td class = "infoCell"><?php echo @_SETPERMISSIONSINSTRUCTIONS; ?>
</td></tr>
      <tr><td class = "labelCell"><?php echo @_CLICKHERETOUNSETPERMISSIONS; ?>
:&nbsp;</td>
          <td class = "submitCell"><input type = "button" class = "flatButton" value = "<?php echo @_UNSETPERMISSIONS; ?>
" onclick = "setPermissions(this, 'unset')"/></td></tr>
   <tr><td></td>
          <td class = "infoCell"><?php echo @_UNSETPERMISSIONSINSTRUCTIONS; ?>
</td></tr>
      <tr><td class = "labelCell"><?php echo @_OPERATIONOUTCOME; ?>
:&nbsp;</td>
       <td class = "elementCell" id = "failed_permissions"><?php echo @_NOOPERATIONPERFORMEDYET; ?>
</td></tr>
        </table>

    <?php $this->_smarty_vars['capture']['t_permissions_code'] = ob_get_contents(); ob_end_clean(); ?>
    <?php ob_start(); ?>
        <table>
      <tr><td class = "labelCell"><?php echo @_CLICKHERETOREINDEX; ?>
:&nbsp;</td>
          <td class = "submitCell"><input type = "button" class = "flatButton" value = "<?php echo @_RECREATE; ?>
" onclick = "reIndex(this)"/></td></tr>
      <tr><td class = "labelCell"><?php echo @_CLICKHERETOCOMPRESSTESTS; ?>
:&nbsp;</td>
          <td class = "submitCell"><input type = "button" class = "flatButton" value = "<?php echo @_COMPRESS; ?>
" onclick = "compressTests(this)"/></td></tr>
      <tr><td class = "labelCell"><?php echo @_CLICKHERETOUNCOMPRESSTESTS; ?>
:&nbsp;</td>
          <td class = "submitCell"><input type = "button" class = "flatButton" value = "<?php echo @_UNCOMPRESS; ?>
" onclick = "uncompressTests(this)"/></td></tr>
      <tr><td class = ""></td>
          <td class = "infoCell"><?php echo @_PLEASEBACKUPBEFORECOMPRESSING; ?>
</td></tr>
      <tr><td class = "labelCell"><?php echo @_CLICKHERETOREDELETEOLDTOKENS; ?>
:&nbsp;</td>
          <td class = "submitCell"><input type = "button" class = "flatButton" value = "<?php echo @_DELETE; ?>
" onclick = "deleteTokens(this)"/></td></tr>






        </table>
    <?php $this->_smarty_vars['capture']['t_reindex_code'] = ob_get_contents(); ob_end_clean(); ?>
    <?php ob_start(); ?>
        <table>
      <tr><td class = "labelCell"><?php echo @_CLEARTEMPLATESCACHE; ?>
:&nbsp;</td>
          <td class = "submitCell"><input class = "flatButton" type = "button" value = "<?php echo @_CLEAR; ?>
" onclick = "clearCache(this, 'templates')"/></td></tr>
      <tr><td class = "labelCell"><?php echo @_CLEARTESTSCACHE; ?>
:&nbsp;</td>
          <td class = "submitCell"><input class = "flatButton" type = "button" value = "<?php echo @_CLEAR; ?>
" onclick = "clearCache(this, 'tests')"/></td></tr>
      <tr><td class = "labelCell"><?php echo @_CLEARQUERYCACHE; ?>
:&nbsp;</td>
          <td class = "submitCell"><input class = "flatButton" type = "button" value = "<?php echo @_CLEAR; ?>
" onclick = "clearCache(this, 'query')"/></td></tr>
      <?php if ($this->_tpl_vars['T_APC']): ?>
      <tr><td class = "labelCell"><?php echo @_CLEAROPCODECACHE; ?>
:&nbsp;</td>
          <td class = "submitCell"><input class = "flatButton" type = "button" value = "<?php echo @_CLEAR; ?>
" onclick = "clearCache(this, 'apc')"/></td></tr>
      <?php endif; ?>
        </table>
 <?php $this->_smarty_vars['capture']['t_clear_cache_code'] = ob_get_contents(); ob_end_clean(); ?>

 <?php ob_start(); ?>
  <div class = "tabber">
  <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['configuration'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['configuration'] == 'change'): ?>
          <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'tasks','title' => @_CLEANUP,'data' => $this->_smarty_vars['capture']['t_cleanup_code'],'image' => '32x32/cleanup.png'), $this);?>

          <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'reindex','title' => @_DATABASETASKS,'data' => $this->_smarty_vars['capture']['t_reindex_code'],'image' => '32x32/import_export.png'), $this);?>

          <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'permissions','title' => @_PERMISSIONS,'data' => $this->_smarty_vars['capture']['t_permissions_code'],'image' => '32x32/generic.png'), $this);?>

  <?php endif; ?>
          <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'clear_cache','title' => @_CLEARCACHE,'data' => $this->_smarty_vars['capture']['t_clear_cache_code'],'image' => '32x32/error_delete.png'), $this);?>

  </div>
 <?php $this->_smarty_vars['capture']['t_cleanup_div_code'] = ob_get_contents(); ob_end_clean(); ?>

  <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'tasks','title' => @_MAINTENANCETASKS,'data' => $this->_smarty_vars['capture']['t_cleanup_div_code'],'image' => '32x32/cleanup.png'), $this);?>

  <div class = "tabbertab <?php if ($_GET['tab'] == 'auto_login'): ?>tabbertabdefault<?php endif; ?>">
   <h3><?php echo @_AUTOLOGIN; ?>
</h3>
   <?php ob_start(); ?>
   <img src = "images/16x16/help.png" title = "<?php echo @_INFO; ?>
" alt = "<?php echo @_INFO; ?>
" style="vertical-align:middle"/>&nbsp;<?php echo @_AUTOLOGINITHLINK; ?>
:&nbsp;<?php echo @G_SERVERNAME; ?>
index.php?autologin=&lt;<?php echo @_ACCESSLINK; ?>
&gt;
   <br /><br />
<!--ajax:usersTable-->
            <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_USERS_SIZE']; ?>
" sortBy = "0" id = "usersTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=maintenance&autologin=1&">
                <tr class = "topTitle">
                    <td class = "topTitle" name = "login"><?php echo @_LOGIN; ?>
</td>
                    <td class = "topTitle" name = "name"><?php echo @_FIRSTNAME; ?>
</td>
                    <td class = "topTitle" name = "surname"><?php echo @_LASTNAME; ?>
</td>
     <td class = "topTitle centerAlign" name = "access_link"><?php echo @_ACCESSLINK; ?>
</td>
                    <td class = "topTitle centerAlign" name = "autologin"><?php echo @_CHECK; ?>
</td>

                </tr>
                <?php $_from = $this->_tpl_vars['T_ALL_USERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['autologin_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['autologin_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['autologin_list']['iteration']++;
?>
                <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['user']['active']): ?>deactivatedTableElement<?php endif; ?>">
                    <td>#filter:login-<?php echo $this->_tpl_vars['user']['login']; ?>
#</td>
                    <td><?php echo $this->_tpl_vars['user']['name']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['user']['surname']; ?>
</td>
     <td class = "centerAlign"><span id="link_<?php echo $this->_tpl_vars['user']['login']; ?>
"><?php echo $this->_tpl_vars['user']['autologin']; ?>
</span></td>
                    <td class = "centerAlign">
                        <input class = "inputCheckbox" type = "checkbox" name = "checked_<?php echo $this->_tpl_vars['user']['login']; ?>
" id = "checked_<?php echo $this->_tpl_vars['user']['login']; ?>
" onclick = "ajaxPost('<?php echo $this->_tpl_vars['user']['login']; ?>
', this);" <?php if ($this->_tpl_vars['user']['autologin'] != ""): ?>checked = "checked"<?php endif; ?> /><?php if ($this->_tpl_vars['user']['autologin'] != ""): ?><span style = "display:none">checked</span><?php endif; ?>                     </td>
                </tr>
                <?php endforeach; else: ?>
                <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
                <?php endif; unset($_from); ?>
            </table>
<!--/ajax:usersTable-->
   <?php $this->_smarty_vars['capture']['t_auto_login_code'] = ob_get_contents(); ob_end_clean(); ?>
   <?php echo smarty_function_eF_template_printBlock(array('title' => @_AUTOLOGIN,'data' => $this->_smarty_vars['capture']['t_auto_login_code'],'image' => '32x32/keys.png'), $this);?>

  </div>


 </div>
 <?php $this->_smarty_vars['capture']['t_maintenance_code'] = ob_get_contents(); ob_end_clean(); ?>
 <?php echo smarty_function_eF_template_printBlock(array('title' => @_MAINTENANCE,'data' => $this->_smarty_vars['capture']['t_maintenance_code'],'image' => '32x32/maintenance.png','help' => 'Maintenance'), $this);?>


</td></tr>
<?php $this->_smarty_vars['capture']['moduleCleanup'] = ob_get_contents(); ob_end_clean(); ?>