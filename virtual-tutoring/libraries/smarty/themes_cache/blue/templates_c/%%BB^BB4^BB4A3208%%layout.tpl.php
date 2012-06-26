<?php /* Smarty version 2.6.26, created on 2012-05-15 11:51:07
         compiled from includes/layout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/layout.tpl', 155, false),)), $this); ?>
<?php if ($this->_tpl_vars['T_ADD_BLOCK_FORM'] && $this->_tpl_vars['_change_']): ?>
    <?php echo $this->_tpl_vars['T_ADD_BLOCK_FORM']['javascript']; ?>

    <form <?php echo $this->_tpl_vars['T_ADD_BLOCK_FORM']['attributes']; ?>
>
        <?php echo $this->_tpl_vars['T_ADD_BLOCK_FORM']['hidden']; ?>

        <table style = "width:100%">
         <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ADD_BLOCK_FORM']['title']['label']; ?>
:&nbsp;</td>
          <td class = "elementCell"><?php echo $this->_tpl_vars['T_ADD_BLOCK_FORM']['title']['html']; ?>
</td></tr>
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
      <img onclick = "toggledInstanceEditor = 'editor_data';javascript:toggleEditor('editor_data', 'mceEditor');" class = "ajaxHandle" src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
      <a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'editor_data';javascript:toggleEditor('editor_data','mceEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
     </span>
    </div>
    </td></tr>
            <tr><td></td><td id = "filemanager_cell"></td></tr>
         <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ADD_BLOCK_FORM']['content']['label']; ?>
:&nbsp;</td>
          <td class = "elementCell"><?php echo $this->_tpl_vars['T_ADD_BLOCK_FORM']['content']['html']; ?>
</td></tr>
   <?php if ($_GET['edit_footer'] || $_GET['edit_header']): ?>
   <tr><td></td>
    <td class = "elementCell"><img src = "images/16x16/rules.png" alt = "<?php echo @_RESET; ?>
" title = "<?php echo @_RESET; ?>
" onclick = "if (confirm('<?php echo @_DELETECUSTOMHEADERAREYOUSURE; ?>
')) resetHeader(this);" style = "cursor:pointer"></td></tr>
   <tr><td class = "labelCell"><?php echo @_SYSTEMENTITIES; ?>
:&nbsp;</td>
    <td class = "elementCell">
     <?php $_from = $this->_tpl_vars['T_SYSTEM_ENTITIES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['entities_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['entities_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['entities_loop']['iteration']++;
?>
      <?php echo $this->_tpl_vars['item']; ?>
<?php if (! ($this->_foreach['entities_loop']['iteration'] == $this->_foreach['entities_loop']['total'])): ?>,<?php endif; ?>
     <?php endforeach; endif; unset($_from); ?>
    </td></tr>
   <?php endif; ?>
         <tr><td></td>
          <td class = "submitCell"><input type = "button" value = "<?php echo @_CANCEL; ?>
" onclick = "location = '<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=themes'" class = "flatButton"/> <?php echo $this->_tpl_vars['T_ADD_BLOCK_FORM']['submit_block']['html']; ?>
</td></tr>
        </table>
    </form>
 <div id = "fmInitial"><div id = "filemanager_div" style = "display:none;"><?php echo $this->_tpl_vars['T_FILE_MANAGER']; ?>
</div></div>
<?php else: ?>

    <?php ob_start(); ?>
     <?php ob_start(); ?>
     <table class = "layout preview">
      <tr><td class = "header" colspan = "3"></td></tr>
      <tr><td class = "layoutLeft">
           <div class = "layoutBlock">&nbsp;</div>
           <div class = "layoutBlock">&nbsp;</div>
           <div class = "layoutBlock">&nbsp;</div>
          </td><td class = "layoutCenter">
                 <div class = "layoutBlock">&nbsp;</div>
                 <div class = "layoutBlock">&nbsp;</div>
          </td><td class = "layoutRight">
           <div class = "layoutBlock">&nbsp;</div>
           <div class = "layoutBlock">&nbsp;</div>
           <div class = "layoutBlock">&nbsp;</div>
          </td></tr>
      <tr><td class = "footer" colspan = "3"></td></tr>
     </table>
     <?php $this->_smarty_vars['capture']['layoutPreview'] = ob_get_contents(); ob_end_clean(); ?>

     <?php ob_start(); ?>
     <table class = "layout edit" id = "editLayout">
      <tr><td class = "header <?php if ($this->_tpl_vars['T_LAYOUT_SETTINGS']->options['show_header'] == 0): ?>collapse<?php endif; ?>" colspan = "3">&nbsp;
       </td></tr>
      <tr><td class = "layoutLeft"><ul class = "sortable" id = "leftList"></ul></td>
       <td class = "layoutCenter"><ul class = "sortable" id = "centerList"></ul></td>
       <td class = "layoutRight"><ul class = "sortable" id = "rightList"></ul></td></tr>
      <tr><td class = "footer <?php if ($this->_tpl_vars['T_LAYOUT_SETTINGS']->options['show_footer'] != 1): ?>collapse<?php endif; ?>" colspan = "3">&nbsp;
       </td></tr>
     </table>
     <?php $this->_smarty_vars['capture']['layoutEdit'] = ob_get_contents(); ob_end_clean(); ?>
<?php if ($this->_tpl_vars['_change_']): ?>
    <div class = "headerTools">
     <span>
      <img src = "images/16x16/layout.png" alt = "<?php echo @_CHANGELAYOUTFORTHEME; ?>
" title = "<?php echo @_CHANGELAYOUTFORTHEME; ?>
" />
      <label for = "layout_for_theme"><?php echo @_CHANGELAYOUTFORTHEME; ?>
:&nbsp;</label>
      <select name = "layout_for_theme" id = "layout_for_theme" onchange = "location = '<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=themes&theme_layout='+this.options[this.options.selectedIndex].value">
      <?php $_from = $this->_tpl_vars['T_THEMES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['themes_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['themes_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['theme']):
        $this->_foreach['themes_list']['iteration']++;
?>
       <option value = "<?php echo $this->_tpl_vars['id']; ?>
" <?php if ($_GET['theme_layout'] == $this->_tpl_vars['id']): ?>selected<?php elseif (! $_GET['theme_layout'] && $this->_tpl_vars['T_LAYOUT_THEME']->themes['id'] == $this->_tpl_vars['id']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['theme']['name']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
      </select>
     </span>
     <span class = "headerTools">
      <img src = "images/16x16/import.png" alt = "<?php echo @_IMPORT; ?>
" title = "<?php echo @_IMPORTSETTINGS; ?>
" />
      <a href = "javascript:void(0);" onclick = "eF_js_showDivPopup('<?php echo @_IMPORTSETTINGS; ?>
', 0, 'import_settings')"><?php echo @_IMPORTSETTINGS; ?>
</a>
     </span>
     <span class = "headerTools">
      <img src = "images/16x16/export.png" alt = "<?php echo @_EXPORT; ?>
" title = "<?php echo @_EXPORTSETTINGS; ?>
" />
      <a href = "javascript:void(0);" onclick = "exportLayout(this)"><?php echo @_EXPORTSETTINGS; ?>
</a>
     </span>
    </div>
    <div id = "import_settings" style = "display:none">

        <?php echo $this->_tpl_vars['T_IMPORT_SETTINGS_FORM']['javascript']; ?>

        <form <?php echo $this->_tpl_vars['T_IMPORT_SETTINGS_FORM']['attributes']; ?>
>
            <?php echo $this->_tpl_vars['T_IMPORT_SETTINGS_FORM']['hidden']; ?>

            <table class = "formElements">
                <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_IMPORT_SETTINGS_FORM']['file_upload']['label']; ?>
:&nbsp;</td>
                    <td><?php echo $this->_tpl_vars['T_IMPORT_SETTINGS_FORM']['file_upload']['html']; ?>
</td></tr>
                <tr><td></td><td class = "infoCell"><?php echo @_EACHFILESIZEMUSTBESMALLERTHAN; ?>
 <b><?php echo $this->_tpl_vars['T_MAX_FILESIZE']; ?>
</b> <?php echo @_KB; ?>
</td></tr>
                <tr><td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_IMPORT_SETTINGS_FORM']['submit_import']['html']; ?>
</td></tr>
            </table>
        </form>
    </div>
<?php endif; ?>
    <table id = "layoutMenu">
     <tr>
      <td id = "left">
             <div class = "layoutLabel mediumHeader"><?php echo @_SELECTLAYOUT; ?>
</div>
             <div id = "layout_simple" class = "layout hideBoth" onclick = "setSelected(this);"><?php echo $this->_smarty_vars['capture']['layoutPreview']; ?>
</div>
             <div class = "layoutLabel"><?php echo @_SIMPLE; ?>
</div>
             <div id = "layout_left" class = "layout hideRight" onclick = "setSelected(this);"><?php echo $this->_smarty_vars['capture']['layoutPreview']; ?>
</div>
             <div class = "layoutLabel"><?php echo @_TWOCOLUMNSLEFT; ?>
</div>
             <div id = "layout_three" class = "layout" onclick = "setSelected(this);"><?php echo $this->_smarty_vars['capture']['layoutPreview']; ?>
</div>
             <div class = "layoutLabel"><?php echo @_THREECOLUMNS; ?>
 (<?php echo @_DEFAULT; ?>
)</div>
             <div id = "layout_right" class = "layout hideLeft" onclick = "setSelected(this);"><?php echo $this->_smarty_vars['capture']['layoutPreview']; ?>
</div>
             <div class = "layoutLabel"><?php echo @_TWOCOLUMNSRIGHT; ?>
</div>
            </td>
            <td id = "center">
             <div class = "layoutLabel mediumHeader"><?php echo @_CURRENTLAYOUT; ?>
 <a href = "<?php echo @G_SERVERNAME; ?>
" target = "_NEW" ><img src = "images/16x16/search.png" alt = "<?php echo @_PREVIEWSAVEDLAYOUT; ?>
" title = "<?php echo @_PREVIEWSAVEDLAYOUT; ?>
"></a></div>
             <div class = "layout"><?php echo $this->_smarty_vars['capture']['layoutEdit']; ?>
</div>
            </td>
            <td id = "right">
             <div class = "layoutLabel mediumHeader"><?php echo @_AVAILABLEBLOCKS; ?>
</div>
             <div class = "layoutBlock"><img src = "images/32x32/add.png" alt = "<?php echo @_ADDBLOCK; ?>
" title = "<?php echo @_ADDBLOCK; ?>
" onclick = "location = location + '&tab=layout&add_block=1'" class = "handle"></div>
       <ul class = "sortable" id = "toolsList"></ul>
            </td>
        </tr>
<?php if ($this->_tpl_vars['_change_']): ?>
        <tr><td colspan = "3" id = "buttons">
          <div>
           <span>
            <img class = "ajaxHandle" src = "images/32x32/generic.png" alt = "<?php echo @_RESTOREDEFAULTLAYOUT; ?>
" title = "<?php echo @_RESTOREDEFAULTLAYOUT; ?>
" onclick = "if (confirm('<?php echo @_THISWILLDELETECUSTOMBLOCKS; ?>
')) updateLayoutPositions(this, true)" />
            <br/><?php echo @_RESTOREDEFAULTLAYOUT; ?>

           </span>
           <span>
            <img class = "ajaxHandle" src = "images/32x32/go_back.png" alt = "<?php echo @_UNDOALLCHANGES; ?>
" title = "<?php echo @_UNDOALLCHANGES; ?>
" onclick = "location=location+'&tab=layout'" />
            <br/><?php echo @_UNDOALLCHANGES; ?>

           </span>
           <span>
            <img class = "ajaxHandle" src = "images/32x32/success.png" alt = "<?php echo @_SAVELAYOUT; ?>
" title = "<?php echo @_SAVELAYOUT; ?>
" onclick = "updateLayoutPositions(this)">
            <br/><?php echo @_SAVELAYOUT; ?>

           </span>
          </div>
        </td></tr>
<?php endif; ?>
    </table>
    <?php $this->_smarty_vars['capture']['t_layout_code'] = ob_get_contents(); ob_end_clean(); ?>

    <?php echo smarty_function_eF_template_printBlock(array('title' => (@_LAYOUTFORTHEME)."<span class = 'innerTableName'>&nbsp;&quot;".($this->_tpl_vars['T_LAYOUT_THEME']->themes['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_layout_code'],'image' => '32x32/layout.png'), $this);?>


    <script type="text/javascript">
     var edittag = '<?php echo @_EDIT; ?>
';var deletetag = '<?php echo @_DELETE; ?>
';var irreversible = '<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
';var toggletag='<?php echo @_TOGGLEACCESSASSEPARATEPAGE; ?>
';
     var positions = '<?php echo $this->_tpl_vars['T_POSITIONS']; ?>
';
     var blocks = '<?php echo $this->_tpl_vars['T_BLOCKS']; ?>
';
     var currentLayout = '';
    </script>
<?php endif; ?>