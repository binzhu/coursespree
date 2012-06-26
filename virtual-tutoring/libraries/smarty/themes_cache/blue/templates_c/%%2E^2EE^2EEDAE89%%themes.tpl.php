<?php /* Smarty version 2.6.26, created on 2012-05-15 11:51:07
         compiled from includes/themes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/themes.tpl', 28, false),array('function', 'cycle', 'includes/themes.tpl', 94, false),)), $this); ?>
<?php if ($_GET['add'] || $_GET['edit']): ?>
 <?php if (! $this->_tpl_vars['_student_'] && ( $_GET['add'] || $_GET['edit'] )): ?>
  <?php if ($this->_tpl_vars['T_MESSAGE_TYPE'] == 'success'): ?>
     <script>
         //re = /\?/;
         parent.location = parent.location+'&tab=set_theme';
     </script>
  <?php endif; ?>
 <?php endif; ?>
 <?php ob_start(); ?>
  <?php echo $this->_tpl_vars['T_ENTITY_FORM']['javascript']; ?>

  <form <?php echo $this->_tpl_vars['T_ENTITY_FORM']['attributes']; ?>
>
      <?php echo $this->_tpl_vars['T_ENTITY_FORM']['hidden']; ?>

      <table>
          <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['theme_file']['label']; ?>
:</td>
              <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['theme_file']['html']; ?>
</td></tr>
          <tr><td></td>
              <td class = "infoCell"><?php echo @_EACHFILESIZEMUSTBESMALLERTHAN; ?>
 <b><?php echo $this->_tpl_vars['T_MAX_FILESIZE']; ?>
</b> <?php echo @_KB; ?>
</td></tr>
          <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['remote_theme']['label']; ?>
:</td>
              <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['remote_theme']['html']; ?>
</td></tr>
          <tr><td></td>
              <td class = "infoCell"><?php echo @_REMOTETHEMEXMLFILE; ?>
</td></tr>
          <tr><td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['submit_theme']['html']; ?>
</td></tr>
   </table>
  </form>
 <?php $this->_smarty_vars['capture']['t_add_theme_code'] = ob_get_contents(); ob_end_clean(); ?>
 <?php if ($_GET['edit']): ?><?php $this->assign('block_title', @_UPDATETHEME); ?><?php else: ?><?php $this->assign('block_title', @_INSTALLTHEME); ?><?php endif; ?>
 <?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['block_title'],'data' => $this->_smarty_vars['capture']['t_add_theme_code'],'image' => '32x32/themes.png'), $this);?>

<?php else: ?>
 <?php ob_start(); ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/layout.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <?php $this->_smarty_vars['capture']['t_layout_tab'] = ob_get_contents(); ob_end_clean(); ?>

 <?php if (! $this->_tpl_vars['T_REMOTE_THEME']): ?>
  <?php ob_start(); ?>
   <?php if ($_GET['file_manager']): ?>
       <?php echo $this->_tpl_vars['T_FILE_MANAGER']; ?>

   <?php elseif ($_GET['add_page'] || $_GET['edit_page']): ?>
       <?php ob_start(); ?>
     <script>var tinyMCEmode = true;</script>
              <?php echo $this->_tpl_vars['T_CMS_FORM']['javascript']; ?>

              <form <?php echo $this->_tpl_vars['T_CMS_FORM']['attributes']; ?>
>
              <?php echo $this->_tpl_vars['T_CMS_FORM']['hidden']; ?>

              <table class = "formElements" style = "width:100%">
                  <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_CMS_FORM']['name']['label']; ?>
:&nbsp;</td>
                      <td class = "elementCell"><?php echo $this->_tpl_vars['T_CMS_FORM']['name']['html']; ?>
</td></tr>
                  <?php if ($this->_tpl_vars['T_CMS_FORM']['name']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_CMS_FORM']['name']['error']; ?>
</td></tr><?php endif; ?>
      <tr><td></td><td id = "toggleeditor_cell1">
       <div class = "headerTools">
        <span>
         <img onclick = "toggleFileManager(Element.extend(this).next());" class = "ajaxHandle" id = "arrow_down" src = "images/16x16/navigate_down.png" alt = "<?php echo @_OPENCLOSEFILEMANAGER; ?>
" title = "<?php echo @_OPENCLOSEFILEMANAGER; ?>
"/>&nbsp;
         <a href = "javascript:void(0)" onclick = "toggleFileManager(this);"><?php echo @_TOGGLEFILEMANAGER; ?>
</a>
        </span>
        <span>
         <img onclick = "javascript:toggleEditor('editor_cms_data', 'mceEditor');" class = "ajaxHandle" src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
         <a href = "javascript:toggleEditor('editor_cms_data', 'mceEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
        </span>
       </div>
       </td></tr>
               <tr><td></td><td id = "filemanager_cell"></td></tr>
                  <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_CMS_FORM']['page']['label']; ?>
:&nbsp;</td>
                      <td class = "elementCell"><?php echo $this->_tpl_vars['T_CMS_FORM']['page']['html']; ?>
</td>
                  </tr>
                  <tr><td></td><td class = "infoCell"><?php echo @_YOUMUSTPROVIDELOGINLINK; ?>
</td></tr>
                  <?php if ($this->_tpl_vars['T_CMS_FORM']['page']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_CMS_FORM']['page']['error']; ?>
</td></tr><?php endif; ?>
                  <tr><td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_CMS_FORM']['submit_cms']['html']; ?>
</td></tr>
              </table>
              </form>
     <div id = "fmInitial"><div id = "filemanager_div" style = "display:none;"><?php echo $this->_tpl_vars['T_FILE_MANAGER']; ?>
</div></div>
       <?php $this->_smarty_vars['capture']['t_new_page_code'] = ob_get_contents(); ob_end_clean(); ?>

       <?php if ($_GET['edit_page'] != ""): ?>
           <?php echo smarty_function_eF_template_printBlock(array('title' => (@_UPDATEPAGE)." <span class = 'innerTableName'>&quot;".($_GET['edit_page'])." &quot;</span>",'data' => $this->_smarty_vars['capture']['t_new_page_code'],'image' => '32x32/unit.png'), $this);?>

       <?php else: ?>
           <?php echo smarty_function_eF_template_printBlock(array('title' => @_NEWPAGE,'data' => $this->_smarty_vars['capture']['t_new_page_code'],'image' => '32x32/unit.png'), $this);?>

       <?php endif; ?>
   <?php else: ?>
       <?php ob_start(); ?>
           <?php if ($this->_tpl_vars['_change_']): ?>
              <div class = "headerTools">
                  <span>
                      <img src = "images/16x16/add.png" alt = "<?php echo @_NEWPAGE; ?>
" title = "<?php echo @_NEWPAGE; ?>
">
                      <a href = "administrator.php?ctg=themes&tab=external&add_page=1"><?php echo @_NEWPAGE; ?>
</a>
                  </span>
              </div>
           <?php endif; ?>
              <table class = "sortedTable" width = "100%" id = 'cms_table'>
                  <tr class = "topTitle">
                      <td class = "topTitle"><?php echo @_NAME; ?>
</td>
                      <td class = "topTitle centerAlign"><?php echo @_DEFAULTPAGE; ?>
</td>
                      <td class = "topTitle centerAlign"><?php echo @_OPERATIONS; ?>
</td>
                  </tr>
           <?php $_from = $this->_tpl_vars['T_CMS_PAGES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pages_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pages_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['page']):
        $this->_foreach['pages_list']['iteration']++;
?>
                  <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
">
                      <td>
               <?php if ($this->_tpl_vars['_change_']): ?>
                      <a href = "administrator.php?ctg=themes&tab=external&edit_page=<?php echo $this->_tpl_vars['page']; ?>
" class = "editLink"><?php echo $this->_tpl_vars['page']; ?>
</a>
               <?php else: ?>
                   <?php echo $this->_tpl_vars['page']; ?>

               <?php endif; ?>
                   </td>
                   <td class = "centerAlign">
                       <?php if (( $this->_tpl_vars['page'] == $this->_tpl_vars['T_DEFAULT_PAGE'] )): ?>
                           <img class = "ajaxHandle" src = "images/16x16/pin_green.png" alt = "<?php echo @_USENONE; ?>
" title = "<?php echo @_USENONE; ?>
" <?php if ($this->_tpl_vars['_change_']): ?>onclick = "usePage(this, '<?php echo $this->_tpl_vars['page']; ?>
')"<?php endif; ?>>
                       <?php else: ?>
                           <img class = "ajaxHandle" src = "images/16x16/pin_red.png" alt = "<?php echo @_USETHIS; ?>
" title = "<?php echo @_USETHIS; ?>
" <?php if ($this->_tpl_vars['_change_']): ?>onclick = "usePage(this, '<?php echo $this->_tpl_vars['page']; ?>
')"<?php endif; ?>/>
                       <?php endif; ?>
                   </td>
                   <td class = "centerAlign">
                       <a href = "<?php echo @G_SERVERNAME; ?>
<?php echo @G_CURRENTTHEMEURL; ?>
external/<?php echo $this->_tpl_vars['page']; ?>
.php" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup('<?php echo @_PREVIEW; ?>
', 2)"><img src = "images/16x16/search.png" title = "<?php echo @_PREVIEW; ?>
" alt = "<?php echo @_PREVIEW; ?>
" /></a>
                   <?php if ($this->_tpl_vars['_change_']): ?>
                       <a href = "administrator.php?ctg=themes&tab=external&edit_page=<?php echo $this->_tpl_vars['page']; ?>
"><img src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" alt = "<?php echo @_EDIT; ?>
" /></a>
                       <img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_AREYOUSUREYOUWANTTODELETEPAGE; ?>
')) deleteEntity(this, '<?php echo $this->_tpl_vars['page']; ?>
');"/>
                   <?php endif; ?>
                </td>
               </tr>
           <?php endforeach; else: ?>
            <tr class = "defaultRowHeight oddRowColor"><td colspan = "3" class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</td></tr>
           <?php endif; unset($_from); ?>
           </table>
       <?php $this->_smarty_vars['capture']['t_cms_code'] = ob_get_contents(); ob_end_clean(); ?>

       <?php echo smarty_function_eF_template_printBlock(array('title' => @_UPDATEPAGES,'data' => $this->_smarty_vars['capture']['t_cms_code'],'image' => '32x32/unit.png'), $this);?>

   <?php endif; ?>
  <?php $this->_smarty_vars['capture']['t_theme_external_tab'] = ob_get_contents(); ob_end_clean(); ?>
 <?php endif; ?>

 <?php ob_start(); ?>
  <?php ob_start(); ?>
  <script>var activetheme = '<?php echo @_ACTIVETHEME; ?>
';var usetheme = '<?php echo @_USETHEME; ?>
';</script>
  <?php if ($this->_tpl_vars['_change_']): ?>
  <div class = "headerTools">
   <span>
    <img src = "images/16x16/add.png" title = "<?php echo @_INSTALLTHEME; ?>
" alt = "<?php echo @_INSTALLTHEME; ?>
"/>
    <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=themes&add=1&popup=1" onclick = "eF_js_showDivPopup('<?php echo @_INSTALLTHEME; ?>
', 2)" title = "<?php echo @_INSTALLTHEME; ?>
" target = "POPUP_FRAME"><?php echo @_INSTALLTHEME; ?>
</a>
   </span>
  </div>
  <?php endif; ?>
  <table style="width: 100%" class="sortedTable" id = "themesTable">
   <tr class="defaultRowHeight">
    <td class = "topTitle"><?php echo @_NAME; ?>
</td>
    <td class = "topTitle"><?php echo @_AUTHOR; ?>
</td>
    <td class = "topTitle"><?php echo @_VERSION; ?>
</td>
    <td class = "topTitle centerAlign noSort"><?php echo @_ACTIVETHEME; ?>
</td>
   <?php $_from = $this->_tpl_vars['T_BROWSERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['browsers_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['browsers_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['browser']):
        $this->_foreach['browsers_list']['iteration']++;
?>
    <td class = "topTitle centerAlign noSort"><img src = "images/file_types/<?php echo $this->_tpl_vars['key']; ?>
.png" alt = "<?php echo $this->_tpl_vars['browser']; ?>
" title = "<?php echo $this->_tpl_vars['browser']; ?>
"></td>
   <?php endforeach; endif; unset($_from); ?>
    <td class = "topTitle centerAlign"><?php echo @_OPERATIONS; ?>
</td>
   </tr>
   <?php $_from = $this->_tpl_vars['T_THEMES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['theme']):
        $this->_foreach['users_list']['iteration']++;
?>
   <tr class="<?php echo smarty_function_cycle(array('name' => 'themes','values' => "oddRowColor, evenRowColor"), $this);?>
">
    <td><?php echo $this->_tpl_vars['theme']['name']; ?>
</td>
    <td><?php echo $this->_tpl_vars['theme']['author']; ?>
</td>
    <td><?php echo $this->_tpl_vars['theme']['version']; ?>
</td>
    <td class = "centerAlign currentTheme">
   <?php if ($this->_tpl_vars['_change_']): ?>
    <?php if ($this->_tpl_vars['theme']['id'] == $this->_tpl_vars['T_CURRENT_THEME']->themes['id']): ?>
     <img class = "ajaxHandle" src = "images/16x16/pin_green.png" alt = "<?php echo @_ACTIVETHEME; ?>
" title = "<?php echo @_ACTIVETHEME; ?>
" onclick = "useTheme(this, '<?php echo $this->_tpl_vars['theme']['id']; ?>
')">
    <?php else: ?>
     <img class = "ajaxHandle" src = "images/16x16/pin_red.png" alt = "<?php echo @_USETHEME; ?>
" title = "<?php echo @_USETHEME; ?>
" onclick = "useTheme(this, '<?php echo $this->_tpl_vars['theme']['id']; ?>
')">
    <?php endif; ?>
   <?php else: ?>
    <?php if ($this->_tpl_vars['theme']['id'] == $this->_tpl_vars['T_CURRENT_THEME']->themes['id']): ?>
     <img class = "ajaxHandle" src = "images/16x16/success.png" alt = "<?php echo @_ACTIVETHEME; ?>
" title = "<?php echo @_ACTIVETHEME; ?>
">
    <?php endif; ?>
   <?php endif; ?>
    </td>
   <?php $_from = $this->_tpl_vars['T_BROWSERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['browsers_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['browsers_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['browser']):
        $this->_foreach['browsers_list']['iteration']++;
?>
    <td class = "centerAlign <?php echo $this->_tpl_vars['key']; ?>
">
   <?php if ($this->_tpl_vars['_change_']): ?>
    <?php if ($this->_tpl_vars['theme']['options']['browsers'][$this->_tpl_vars['key']]): ?>
     <img class = "ajaxHandle browser_<?php echo $this->_tpl_vars['key']; ?>
" src = "images/16x16/pin_green.png" alt = "<?php echo @_ACTIVETHEMEBROWSER; ?>
" title = "<?php echo @_ACTIVETHEMEBROWSER; ?>
" onclick = "setBrowser(this, '<?php echo $this->_tpl_vars['theme']['id']; ?>
', '<?php echo $this->_tpl_vars['key']; ?>
')"/>
    <?php else: ?>
     <img class = "ajaxHandle browser_<?php echo $this->_tpl_vars['key']; ?>
" src = "images/16x16/pin_red.png" alt = "<?php echo @_USETHEMEBROWSER; ?>
" title = "<?php echo @_USETHEMEBROWSER; ?>
" onclick = "setBrowser(this, '<?php echo $this->_tpl_vars['theme']['id']; ?>
', '<?php echo $this->_tpl_vars['key']; ?>
')"/>
    <?php endif; ?>
   <?php else: ?>
    <?php if ($this->_tpl_vars['theme']['options']['browsers'][$this->_tpl_vars['key']]): ?>
     <img class = "ajaxHandle" src = "images/16x16/success.png" alt = "<?php echo @_ACTIVETHEMEBROWSER; ?>
" title = "<?php echo @_ACTIVETHEMEBROWSER; ?>
" />
    <?php endif; ?>
   <?php endif; ?>
    </td>
   <?php endforeach; endif; unset($_from); ?>
    <td class = "centerAlign">
     <div style = "display:none" id = "theme_settings_<?php echo $this->_tpl_vars['theme']['name']; ?>
"><?php $_from = $this->_tpl_vars['theme']['settings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['setting']):
?><?php echo $this->_tpl_vars['name']; ?>
:&nbsp;<?php echo $this->_tpl_vars['setting']; ?>
<br/><?php endforeach; endif; unset($_from); ?></div>
     <img class = "ajaxHandle" src = "images/16x16/search.png" title = "<?php echo @_PREVIEW; ?>
" alt = "<?php echo @_PREVIEW; ?>
" onclick = "window.open('index.php?preview_theme=<?php echo $this->_tpl_vars['theme']['id']; ?>
', 'preview_theme')" />
   <?php if ($this->_tpl_vars['_change_']): ?>
    <?php if (! $this->_tpl_vars['theme']['remote'] && ! $this->_tpl_vars['theme']['options']['locked']): ?>
     <img class = "ajaxHandle" src = "images/16x16/export.png" alt = "<?php echo @_EXPORTTHEME; ?>
" title = "<?php echo @_EXPORTTHEME; ?>
" onclick = "exportTheme(this, '<?php echo $this->_tpl_vars['theme']['id']; ?>
')">
    <?php endif; ?>
    <?php if ($this->_tpl_vars['theme']['name'] == @G_CURRENTTHEME): ?>
     <img class = "ajaxHandle" src = "images/16x16/undo.png" title = "<?php echo @_RESETTHEME; ?>
" alt = "<?php echo @_RESETTHEME; ?>
" onclick = "resetTheme(this, '<?php echo $this->_tpl_vars['theme']['id']; ?>
')" />
    <?php endif; ?>
    <?php if ($this->_tpl_vars['theme']['name'] != 'default' && $this->_tpl_vars['theme']['name'] != @G_CURRENTTHEME): ?><img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if (confirm ('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteEntity(this, '<?php echo $this->_tpl_vars['theme']['id']; ?>
')" /><?php endif; ?>
   <?php endif; ?>
    </td>
   </tr>
   <?php endforeach; endif; unset($_from); ?>
  </table>
  <?php $this->_smarty_vars['capture']['t_themes_code'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo smarty_function_eF_template_printBlock(array('title' => @_THEMESELECTION,'data' => $this->_smarty_vars['capture']['t_themes_code'],'image' => '32x32/themes.png'), $this);?>

 <?php $this->_smarty_vars['capture']['t_change_theme_tab'] = ob_get_contents(); ob_end_clean(); ?>
 <?php ob_start(); ?>
 <div class = "tabber">
        <div class="tabbertab <?php if (( isset ( $_GET['tab'] ) && $_GET['tab'] == 'layout' )): ?> tabbertabdefault<?php endif; ?>" title = "<?php echo @_LAYOUT; ?>
"><?php echo $this->_smarty_vars['capture']['t_layout_tab']; ?>
</div>
        <div class="tabbertab <?php if (( isset ( $_GET['tab'] ) && $_GET['tab'] == 'set_theme' )): ?> tabbertabdefault<?php endif; ?>" title = "<?php echo @_CHANGETHEME; ?>
"><?php echo $this->_smarty_vars['capture']['t_change_theme_tab']; ?>
</div>
 </div>
 <?php $this->_smarty_vars['capture']['t_theme_divs_code'] = ob_get_contents(); ob_end_clean(); ?>
 <?php echo smarty_function_eF_template_printBlock(array('title' => @_THEMES,'data' => $this->_smarty_vars['capture']['t_theme_divs_code'],'image' => '32x32/themes.png','help' => 'Themes','options' => $this->_tpl_vars['T_APPEARANCE_LINK']), $this);?>

<?php endif; ?>