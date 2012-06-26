<?php /* Smarty version 2.6.26, created on 2012-05-15 11:55:43
         compiled from includes/modules.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'includes/modules.tpl', 26, false),array('function', 'eF_template_printBlock', 'includes/modules.tpl', 61, false),)), $this); ?>
        <?php ob_start(); ?>
                    <tr><td class="moduleCell">
                        <?php ob_start(); ?>
                        <script>var activate = '<?php echo @_ACTIVATE; ?>
';var deactivate = '<?php echo @_DEACTIVATE; ?>
';</script>
                        <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['modules'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['modules'] == 'change'): ?>
                                <div class = "headerTools">
                                    <span>
                                        <img src = "images/16x16/add.png" title = "<?php echo @_INSTALLMODULE; ?>
" alt = "<?php echo @_INSTALLMODULE; ?>
">
                                        <a href = "javascript:void(0)" onclick = "document.getElementById('upload_file_form').action = '<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=modules'; eF_js_showDivPopup('<?php echo @_INSTALLMODULE; ?>
', 0, 'upload_file_table');$('overwrite_checkbox').show()" title = "<?php echo @_INSTALLMODULE; ?>
"><?php echo @_INSTALLMODULE; ?>
</a>
                                    </span>
                                </div>

                                <?php $this->assign('change_modules', 1); ?>
                        <?php endif; ?>

                            <table style = "width:100%" class = "sortedTable">
                                <tr class = "defaultRowHeight">
                                    <td class = "topTitle"><?php echo @_NAME; ?>
</td>
                                    <td class = "topTitle"><?php echo @_TITLE; ?>
</td>
                                    <td class = "topTitle"><?php echo @_AUTHOR; ?>
</td>
                                    <td class = "topTitle centerAlign"><?php echo @_VERSION; ?>
</td>
                                    <td class = "topTitle centerAlign"><?php echo @_STATUS; ?>
</td>
                                    <td class = "topTitle centerAlign noSort"><?php echo @_FUNCTIONS; ?>
</td>
                                </tr>
                            <?php unset($this->_sections['modules_list']);
$this->_sections['modules_list']['name'] = 'modules_list';
$this->_sections['modules_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_MODULES']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['modules_list']['show'] = true;
$this->_sections['modules_list']['max'] = $this->_sections['modules_list']['loop'];
$this->_sections['modules_list']['step'] = 1;
$this->_sections['modules_list']['start'] = $this->_sections['modules_list']['step'] > 0 ? 0 : $this->_sections['modules_list']['loop']-1;
if ($this->_sections['modules_list']['show']) {
    $this->_sections['modules_list']['total'] = $this->_sections['modules_list']['loop'];
    if ($this->_sections['modules_list']['total'] == 0)
        $this->_sections['modules_list']['show'] = false;
} else
    $this->_sections['modules_list']['total'] = 0;
if ($this->_sections['modules_list']['show']):

            for ($this->_sections['modules_list']['index'] = $this->_sections['modules_list']['start'], $this->_sections['modules_list']['iteration'] = 1;
                 $this->_sections['modules_list']['iteration'] <= $this->_sections['modules_list']['total'];
                 $this->_sections['modules_list']['index'] += $this->_sections['modules_list']['step'], $this->_sections['modules_list']['iteration']++):
$this->_sections['modules_list']['rownum'] = $this->_sections['modules_list']['iteration'];
$this->_sections['modules_list']['index_prev'] = $this->_sections['modules_list']['index'] - $this->_sections['modules_list']['step'];
$this->_sections['modules_list']['index_next'] = $this->_sections['modules_list']['index'] + $this->_sections['modules_list']['step'];
$this->_sections['modules_list']['first']      = ($this->_sections['modules_list']['iteration'] == 1);
$this->_sections['modules_list']['last']       = ($this->_sections['modules_list']['iteration'] == $this->_sections['modules_list']['total']);
?>
                                <tr id="row_<?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['className']; ?>
" class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['active']): ?>deactivatedTableElement<?php endif; ?>">
                                    <td><?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['className']; ?>
</td>
                                    <td><?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['title']; ?>
</td>
                                    <td><?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['author']; ?>
</td>
                                    <td class = "centerAlign"><?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['version']; ?>
</td>
                                    <td class = "centerAlign">
                                <?php if (! $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['errors']): ?>
                                 <span style = "display:none"><?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['active']; ?>
</span>
                                    <?php if ($this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['active']): ?>
                                        <img class = "ajaxHandle" id="module_status_img" src = "images/16x16/trafficlight_green.png" alt = "<?php echo @_DEACTIVATE; ?>
" title = "<?php echo @_DEACTIVATE; ?>
" <?php if ($this->_tpl_vars['change_modules']): ?>onclick = "activateModule(this, '<?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['className']; ?>
')"<?php endif; ?>>
                                    <?php else: ?>
                                        <img class = "ajaxHandle" id="module_status_img" src = "images/16x16/trafficlight_red.png" alt = "<?php echo @_ACTIVATE; ?>
" title = "<?php echo @_ACTIVATE; ?>
" <?php if ($this->_tpl_vars['change_modules']): ?>onclick = "activateModule(this, '<?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['className']; ?>
')"<?php endif; ?>>
                                    <?php endif; ?>
                                <?php else: ?>
                                 <span style = "display:none">-1</span>
                                        <img src = "images/16x16/close.png" alt = "<?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['errors']; ?>
" title = "<?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['errors']; ?>
">
                                <?php endif; ?>
                                    </td>
                                    <td class = "centerAlign">
                                <?php if (! $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['not_installed']): ?>
                                        <img class = "ajaxHandle" src = "images/16x16/information.png" alt = "<?php echo @_DESCRIPTION; ?>
" title = "<?php echo @_DESCRIPTION; ?>
" onclick = "eF_js_showDivPopup('<?php echo @_MODULEINFORMATION; ?>
', 1, 'module_info_table_<?php echo $this->_sections['modules_list']['iteration']; ?>
')"/>
                                    <?php if ($this->_tpl_vars['change_modules']): ?>
                                        <img class = "ajaxHandle" src = "images/16x16/generic.png" title="<?php echo @_UPGRADEMODULE; ?>
" alt="<?php echo @_UPGRADEMODULE; ?>
" onclick = "document.getElementById('upload_file_form').action = '<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=modules&upgrade=<?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['className']; ?>
'; eF_js_showDivPopup('<?php echo @_UPGRADEMODULE; ?>
 <?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['className']; ?>
', 0, 'upload_file_table');$('overwrite_checkbox').hide()"/>
                                        <img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if (confirm ('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteModule(this, '<?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['className']; ?>
')"/>
                                    <?php endif; ?>
                                        <div id = "module_info_table_<?php echo $this->_sections['modules_list']['iteration']; ?>
" style = "display:none">
          <?php ob_start(); ?>
                                            <table style = "text-align:left">
                                                <tr style = "border-bottom:1px dotted gray"><td><?php echo @_TITLE; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['title']; ?>
</td></tr>
                                                <tr style = "border-bottom:1px dotted gray"><td><?php echo @_AUTHOR; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['author']; ?>
</td></tr>
                                                <tr style = "border-bottom:1px dotted gray"><td><?php echo @_VERSION; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['version']; ?>
</td></tr>
                                                <tr style = "border-bottom:1px dotted gray"><td><?php echo @_DESCRIPTION; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['description']; ?>
</td></tr>
                                                <tr style = "border-bottom:1px dotted gray"><td><?php echo @_VALIDFOR; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['permissions']; ?>
</td></tr>
                                            </table>
          <?php $this->_smarty_vars['capture']['t_module_info_code'] = ob_get_contents(); ob_end_clean(); ?>
          <?php echo smarty_function_eF_template_printBlock(array('title' => @_MODULEINFORMATION,'data' => $this->_smarty_vars['capture']['t_module_info_code'],'image' => '32x32/addons.png'), $this);?>

                                        </div>
                                <?php else: ?>
                                    <?php if ($this->_tpl_vars['change_modules']): ?>
                                     <img class = "ajaxHandle" src = "images/16x16/add.png" title="<?php echo @_INSTALLMODULE; ?>
" alt="<?php echo @_INSTALLMODULE; ?>
" onclick = "installModule(this, '<?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['className']; ?>
')"/>
                                     <img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if (confirm ('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteModule(this, '<?php echo $this->_tpl_vars['T_MODULES'][$this->_sections['modules_list']['index']]['className']; ?>
')"/>

         <?php endif; ?>
                                <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endfor; else: ?>
                                <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "6"><?php echo @_NODATAFOUND; ?>
</td></tr>
                            <?php endif; ?>
                            </table>

                            <div id = "upload_file_table" style = "display:none">
       <?php ob_start(); ?>
                                <?php echo $this->_tpl_vars['T_UPLOAD_FILE_FORM']['javascript']; ?>

                                <form <?php echo $this->_tpl_vars['T_UPLOAD_FILE_FORM']['attributes']; ?>
>
                                    <?php echo $this->_tpl_vars['T_UPLOAD_FILE_FORM']['hidden']; ?>

                                    <table class = "formElements uploadBox">
                                        <tr><td class = "labelCell"><?php echo @_FILENAME; ?>
:&nbsp;</td>
                                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_UPLOAD_FILE_FORM']['file_upload']['0']['html']; ?>
</td></tr>
                                        <tr><td></td><td class = "infoCell"><?php echo @_EACHFILESIZEMUSTBESMALLERTHAN; ?>
 <b><?php echo $this->_tpl_vars['T_MAX_FILE_SIZE']; ?>
</b> <?php echo @_KB; ?>
</td></tr>
                                        <?php if ($this->_tpl_vars['T_UPLOAD_FILE_FORM']['file_upload']['0']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_UPLOAD_FILE_FORM']['file_upload']['0']['error']; ?>
</td></tr><?php $this->assign('div_error', 'upload_file_table'); ?><?php endif; ?>
                                        <tr id = "overwrite_checkbox"><td class = "labelCell"><?php echo $this->_tpl_vars['T_UPLOAD_FILE_FORM']['overwrite']['label']; ?>
:&nbsp;</td>
                                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_UPLOAD_FILE_FORM']['overwrite']['html']; ?>
</td></tr>
                                        <tr><td></td><td >&nbsp;</td></tr>
                                        <tr><td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_UPLOAD_FILE_FORM']['submit_upload_file']['html']; ?>
</td></tr>
                                    </table>
                                </form>
       <?php $this->_smarty_vars['capture']['t_upload_module_code'] = ob_get_contents(); ob_end_clean(); ?>
       <?php echo smarty_function_eF_template_printBlock(array('title' => @_INSTALLMODULE,'data' => $this->_smarty_vars['capture']['t_upload_module_code'],'image' => '32x32/addons.png'), $this);?>

                            </div>
                        <?php $this->_smarty_vars['capture']['t_modules_code'] = ob_get_contents(); ob_end_clean(); ?>

                        <?php echo smarty_function_eF_template_printBlock(array('title' => @_MODULES,'data' => $this->_smarty_vars['capture']['t_modules_code'],'image' => '32x32/addons.png','help' => 'Modules'), $this);?>

    </td></tr>
<?php $this->_smarty_vars['capture']['moduleModules'] = ob_get_contents(); ob_end_clean(); ?>