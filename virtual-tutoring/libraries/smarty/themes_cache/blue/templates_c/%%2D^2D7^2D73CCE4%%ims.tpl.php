<?php /* Smarty version 2.6.26, created on 2012-05-16 00:52:06
         compiled from includes/ims.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/ims.tpl', 34, false),)), $this); ?>
                <?php ob_start(); ?>
       <tr><td class = "moduleCell">
                        <?php if (! $_GET['ims_export']): ?>
                            <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=ims&ims_import=1'>".(@_IMSIMPORT)."</a>"); ?>

                            <?php ob_start(); ?>
                                <?php echo $this->_tpl_vars['T_UPLOAD_IMS_FORM']['javascript']; ?>

                                <form <?php echo $this->_tpl_vars['T_UPLOAD_IMS_FORM']['attributes']; ?>
>
                                    <?php echo $this->_tpl_vars['T_UPLOAD_IMS_FORM']['hidden']; ?>

                                    <table style = "margin-top:15px;">
          <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_UPLOAD_IMS_FORM']['ims_file'][0]['label']; ?>
:&nbsp;</td>
           <td class = "elementCell"><?php echo $this->_tpl_vars['T_UPLOAD_IMS_FORM']['ims_file'][0]['html']; ?>
 <img src = "images/16x16/add.png" alt = "<?php echo @_ADDBOX; ?>
" title = "<?php echo @_ADDBOX; ?>
" onclick = "Element.extend(this);this.up().up().next().show();this.hide();"></td></tr>
         <?php $_from = $this->_tpl_vars['T_UPLOAD_IMS_FORM']['ims_file']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['file_upload_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['file_upload_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['file_upload_list']['iteration']++;
?>
          <?php if ($this->_tpl_vars['key'] > 0): ?>
          <tr style = "display:none"><td class = "labelCell"></td>
           <td class = "elementCell"><?php echo $this->_tpl_vars['T_UPLOAD_IMS_FORM']['ims_file'][$this->_tpl_vars['key']]['html']; ?>
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
                                        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_UPLOAD_IMS_FORM']['url_upload']['label']; ?>
:
                                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_UPLOAD_IMS_FORM']['url_upload']['html']; ?>
</td></tr>
                                        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_UPLOAD_IMS_FORM']['embed_type']['label']; ?>
:
                                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_UPLOAD_IMS_FORM']['embed_type']['html']; ?>
</td></tr>
                                        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_UPLOAD_IMS_FORM']['popup_parameters']['label']; ?>
:
                                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_UPLOAD_IMS_FORM']['popup_parameters']['html']; ?>
</td></tr>
                                        <tr><td class = "labelCell"></td>
                                            <td class = "submitCell"><?php echo $this->_tpl_vars['T_UPLOAD_IMS_FORM']['submit_upload_ims']['html']; ?>
</td></tr>
                                    </table>
                                </form>
                            <?php $this->_smarty_vars['capture']['ims_import_code'] = ob_get_contents(); ob_end_clean(); ?>

                            <?php echo smarty_function_eF_template_printBlock(array('title' => @_IMSIMPORT,'data' => $this->_smarty_vars['capture']['ims_import_code'],'image' => '32x32/autocomplete.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'SCORM_/_IMS'), $this);?>


                        <?php elseif ($_GET['ims_export']): ?>
                            <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink'  href = '".($_SERVER['PHP_SELF'])."?ctg=ims&ims_export=1'>".(@_IMSEXPORT)."</a>"); ?>

                            <?php ob_start(); ?>
                            <?php if (( isset ( $this->_tpl_vars['T_IMS_EXPORT_FILE'] ) )): ?>
                                <table style = "margin-top:15px;">
                                    <tr>
                                        <td><span style = "vertical-align:middle"><?php echo @_DOWNLOADIMSEXPORTEDFILE; ?>
:&nbsp;</span>
                                            <a href = "view_file.php?file=<?php echo $this->_tpl_vars['T_IMS_EXPORT_FILE']['path']; ?>
&action=download" target = "POPUP_FRAME" style = "vertical-align:middle"><?php echo $this->_tpl_vars['T_IMS_EXPORT_FILE']['name']; ?>
</a>
                                            <img src = "images/16x16/import.png" alt = "<?php echo @_DOWNLOADFILE; ?>
" title = "<?php echo @_DOWNLOADFILE; ?>
" border = "0" style = "vertical-align:middle">
                                        </td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                                    <?php echo $this->_tpl_vars['T_EXPORT_IMS_FORM']['javascript']; ?>

                                    <form <?php echo $this->_tpl_vars['T_EXPORT_IMS_FORM']['attributes']; ?>
>
                                        <?php echo $this->_tpl_vars['T_EXPORT_IMS_FORM']['hidden']; ?>

                                        <table style = "margin-top:15px;">
                                            <tr>
                                                <td class = "labelCell"><?php echo @_IMSEXPORT; ?>
:&nbsp;</td>
                                                <td class = "elementCell"><?php echo $this->_tpl_vars['T_EXPORT_IMS_FORM']['submit_export_ims']['html']; ?>
</td>
                                                </tr>
                                        </table>
                                    </form>
                            <?php $this->_smarty_vars['capture']['ims_export_code'] = ob_get_contents(); ob_end_clean(); ?>
                            <?php echo smarty_function_eF_template_printBlock(array('title' => @_IMSEXPORT,'data' => $this->_smarty_vars['capture']['ims_export_code'],'image' => '32x32/autocomplete.png','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'SCORM_/_IMS'), $this);?>

                        <?php endif; ?>
                                </td></tr>
        <?php $this->_smarty_vars['capture']['moduleIMSOptions'] = ob_get_contents(); ob_end_clean(); ?>