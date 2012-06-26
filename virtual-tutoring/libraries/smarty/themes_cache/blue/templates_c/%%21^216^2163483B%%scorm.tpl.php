<?php /* Smarty version 2.6.26, created on 2012-05-16 00:52:11
         compiled from includes/scorm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'includes/scorm.tpl', 28, false),array('function', 'eF_template_printBlock', 'includes/scorm.tpl', 49, false),array('modifier', 'eF_truncate', 'includes/scorm.tpl', 30, false),array('modifier', 'cat', 'includes/scorm.tpl', 49, false),array('modifier', 'urlencode', 'includes/scorm.tpl', 90, false),)), $this); ?>


                <?php ob_start(); ?>
                                <tr><td class = "moduleCell">
                        <?php if ($_GET['scorm_review']): ?>
                            <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=scorm&scorm_review=1'>".(@_SCORMREVIEW)."</a>"); ?>
                            <?php ob_start(); ?>
<!--ajax:scormUsersTable-->
                                            <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_USERS_SIZE']; ?>
" sortBy = "0" id = "scormUsersTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "professor.php?ctg=scorm&scorm_review=1&">
                                                <tr class = "defaultRowHeight">
                                                    <td class = "topTitle" name = "users_LOGIN"><?php echo @_USERCAPITAL; ?>
</td>
                                                    <td class = "topTitle" name = "content_name"><?php echo @_UNIT; ?>
</td>
                                                    <td class = "topTitle" name = "timestamp"><?php echo @_DATE; ?>
</td>
                                                    <td class = "topTitle" name = "entry"><?php echo @_ENTRY; ?>
</td>
                                                    <td class = "topTitle" name = "lesson_status"><?php echo @_STATUS; ?>
</td>
                                                    <td class = "topTitle centerAlign" name = "total_time"><?php echo @_TOTALTIME; ?>
</td>
                                                    <td class = "topTitle centerAlign" name = "minscore"><?php echo @_MINSCORE; ?>
</td>
                                                    <td class = "topTitle centerAlign" name = "maxscore"><?php echo @_MAXSCORE; ?>
</td>
                                                    <td class = "topTitle centerAlign" name = "masteryscore"><?php echo @_MASTERYSCORE; ?>
</td>
                                                    <td class = "topTitle centerAlign" name = "score"><?php echo @_SCORE; ?>
</td>
                                                <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] == 'change'): ?>
                                                    <td class = "topTitle centerAlign noSort"><?php echo @_FUNCTIONS; ?>
</td>
                                                <?php endif; ?>
                                                </tr>

                                        <?php $_from = $this->_tpl_vars['T_SCORM_DATA']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['scorm_data'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['scorm_data']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['scorm_data']['iteration']++;
?>
                                            <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 defaultRowHeight">
                                                <td>#filter:login-<?php echo $this->_tpl_vars['item']['users_LOGIN']; ?>
#</td>
                                                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['content_name'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 30) : smarty_modifier_eF_truncate($_tmp, 30)); ?>
</td>
                                                <td style = "white-space:nowrap">#filter:timestamp_time-<?php echo $this->_tpl_vars['item']['timestamp']; ?>
#</td>
                                                <td><?php echo $this->_tpl_vars['item']['entry']; ?>
</td>
                                                <td><?php echo $this->_tpl_vars['item']['lesson_status']; ?>
</td>
                                                <td class = "centerAlign"><?php echo $this->_tpl_vars['item']['total_time']; ?>
</td>
                                                <td class = "centerAlign"><?php if (isset ( $this->_tpl_vars['item']['minscore'] )): ?> #filter:score-<?php echo $this->_tpl_vars['item']['minscore']; ?>
#%<?php endif; ?></td>
                                                <td class = "centerAlign">#filter:score-<?php echo $this->_tpl_vars['item']['maxscore']; ?>
#%</td>
                                                <td class = "centerAlign"><?php if ($this->_tpl_vars['item']['masteryscore']): ?> #filter:score-<?php echo $this->_tpl_vars['item']['masteryscore']; ?>
#%<?php endif; ?></td>
                                                <td class = "centerAlign">#filter:score-<?php echo $this->_tpl_vars['item']['score']; ?>
#%</td>
                                            <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] == 'change'): ?>
                                                <td class = "centerAlign"><img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETEDATA; ?>
" title = "<?php echo @_DELETEDATA; ?>
" onclick = "deleteData(this, <?php echo $this->_tpl_vars['item']['id']; ?>
)"></td>
                                            <?php endif; ?>
                                            </tr>
                                        <?php endforeach; else: ?>
                                            <tr class = "oddRowColor defaultRowHeight"><td colspan = "100%" class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</td></tr>
                                        <?php endif; unset($_from); ?>
                                            </table>
<!--/ajax:scormUsersTable-->
                            <?php $this->_smarty_vars['capture']['scorm_review_code'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php echo smarty_function_eF_template_printBlock(array('title' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@_REVIEWSCORMDATAFOR)) ? $this->_run_mod_handler('cat', true, $_tmp, ' &quot;') : smarty_modifier_cat($_tmp, ' &quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;') : smarty_modifier_cat($_tmp, '&quot;')),'data' => $this->_smarty_vars['capture']['scorm_review_code'],'image' => '32x32/scorm.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'SCORM_/_IMS'), $this);?>


                        <?php elseif ($_GET['scorm_import']): ?>
                            <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=scorm&scorm_import=1'>".(@_SCORMIMPORT)."</a>"); ?>

                            <?php ob_start(); ?>
                                <?php echo $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['javascript']; ?>

                                <form <?php echo $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['attributes']; ?>
>
                                    <?php echo $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['hidden']; ?>

                                    <table style = "margin-top:15px;">
          <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['scorm_file'][0]['label']; ?>
:&nbsp;</td>
           <td class = "elementCell"><?php echo $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['scorm_file'][0]['html']; ?>
 <img src = "images/16x16/add.png" alt = "<?php echo @_ADDBOX; ?>
" title = "<?php echo @_ADDBOX; ?>
" onclick = "Element.extend(this);this.up().up().next().show();this.hide();"></td></tr>
         <?php $_from = $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['scorm_file']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['file_upload_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['file_upload_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['file_upload_list']['iteration']++;
?>
          <?php if ($this->_tpl_vars['key'] > 0): ?>
          <tr style = "display:none"><td class = "labelCell"></td>
           <td class = "elementCell"><?php echo $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['scorm_file'][$this->_tpl_vars['key']]['html']; ?>
 <img src = "images/16x16/add.png" alt = "<?php echo @_ADDBOX; ?>
" title = "<?php echo @_ADDBOX; ?>
" onclick = "Element.extend(this);this.up().up().next().show();this.hide();"></td></tr>
          <?php endif; ?>
         <?php endforeach; endif; unset($_from); ?>
                                        <tr><td></td>
                                            <td class = "infoCell"><?php echo @_EACHFILESIZEMUSTBESMALLERTHAN; ?>
 <b><?php echo $this->_tpl_vars['T_MAX_FILE_SIZE']; ?>
</b> <?php echo @_KB; ?>
</td></tr>
                                        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['url_upload']['label']; ?>
:
                                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['url_upload']['html']; ?>
</td></tr>
                                        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['embed_type']['label']; ?>
:
                                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['embed_type']['html']; ?>
</td></tr>
                                        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['popup_parameters']['label']; ?>
:
                                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['popup_parameters']['html']; ?>
</td></tr>
                                        <tr><td class = "labelCell"></td>
                                            <td class = "submitCell"><?php echo $this->_tpl_vars['T_UPLOAD_SCORM_FORM']['submit_upload_scorm']['html']; ?>
</td></tr>
                                    </table>
                                </form>
                            <?php $this->_smarty_vars['capture']['scorm_import_code'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php echo smarty_function_eF_template_printBlock(array('title' => @_SCORMIMPORT,'data' => $this->_smarty_vars['capture']['scorm_import_code'],'image' => '32x32/scorm.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'SCORM_/_IMS'), $this);?>


                        <?php elseif ($_GET['scorm_export']): ?>
                            <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=scorm&scorm_export=1'>".(@_SCORMEXPORT)."</a>"); ?>

                            <?php ob_start(); ?>
                            <?php if (( isset ( $this->_tpl_vars['T_SCORM_EXPORT_FILE'] ) )): ?>
                                <table style = "margin-top:15px;">
                                    <tr>
                                        <td><span style = "vertical-align:middle"><?php echo @_DOWNLOADSCORMEXPORTEDFILE; ?>
:&nbsp;</span>
                                            <a href = "view_file.php?file=<?php echo ((is_array($_tmp=$this->_tpl_vars['T_SCORM_EXPORT_FILE']['path'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&action=download" target = "POPUP_FRAME" style = "vertical-align:middle"><?php echo $this->_tpl_vars['T_SCORM_EXPORT_FILE']['name']; ?>
</a>
                                            <img src = "images/16x16/import.png" alt = "<?php echo @_DOWNLOADFILE; ?>
" title = "<?php echo @_DOWNLOADFILE; ?>
" border = "0" style = "vertical-align:middle">
                                        </td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                                    <?php echo $this->_tpl_vars['T_EXPORT_SCORM_FORM']['javascript']; ?>

                                    <form <?php echo $this->_tpl_vars['T_EXPORT_SCORM_FORM']['attributes']; ?>
>
                                        <?php echo $this->_tpl_vars['T_EXPORT_SCORM_FORM']['hidden']; ?>

                                        <table style = "margin-top:15px;">
                                            <tr>
                                                <td class = "labelCell"><?php echo @_SCORMEXPORT; ?>
:&nbsp;</td>
                                                <td class = "elementCell"><?php echo $this->_tpl_vars['T_EXPORT_SCORM_FORM']['submit_export_scorm']['html']; ?>
</td>
                                                </tr>
                                        </table>
                                    </form>
                            <?php $this->_smarty_vars['capture']['scorm_export_code'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php echo smarty_function_eF_template_printBlock(array('title' => @_SCORMEXPORT,'data' => $this->_smarty_vars['capture']['scorm_export_code'],'image' => '32x32/scorm.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'SCORM_/_IMS'), $this);?>


                        <?php else: ?>
                            <?php ob_start(); ?>
                                <table>
                                    <tr><td>
                                        <?php echo $this->_tpl_vars['T_SCORM_TREE']; ?>

                                    </td></tr>
                                </table>

                            <?php $this->_smarty_vars['capture']['t_scorm_tree_code'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php echo smarty_function_eF_template_printBlock(array('title' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@_SCORMOPTIONSFOR)) ? $this->_run_mod_handler('cat', true, $_tmp, ' &quot;') : smarty_modifier_cat($_tmp, ' &quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;') : smarty_modifier_cat($_tmp, '&quot;')),'data' => $this->_smarty_vars['capture']['t_scorm_tree_code'],'image' => '32x32/scorm.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'SCORM_/_IMS'), $this);?>

                        <?php endif; ?>
                                </td></tr>
        <?php $this->_smarty_vars['capture']['moduleScormOptions'] = ob_get_contents(); ob_end_clean(); ?>