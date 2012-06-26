<?php /* Smarty version 2.6.26, created on 2012-05-15 12:01:22
         compiled from includes/backup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'includes/backup.tpl', 3, false),array('function', 'eF_template_printBlock', 'includes/backup.tpl', 35, false),)), $this); ?>
            <?php ob_start(); ?>
                <tr><td class = "moduleCell">
                <?php if ($this->_tpl_vars['T_DEFAULT_URI']): ?> <?php $this->assign('query_string', ((is_array($_tmp=((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_DEFAULT_URI']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_DEFAULT_URI'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&') : smarty_modifier_cat($_tmp, '&'))); ?>
                <?php else: ?> <?php $this->assign('query_string', ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('cat', true, $_tmp, '?') : smarty_modifier_cat($_tmp, '?'))); ?>
                <?php endif; ?>
                <?php ob_start(); ?>
                    <script>
                    <?php echo '
                    function restore(el, id) {
                        if (confirm(\''; ?>
<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
<?php echo '\')) {
                            location = \''; ?>
<?php echo $_SERVER['PHP_SELF']; ?>
<?php echo '?ctg=backup&restore=\'+id;
                        }
                    }
                    '; ?>

                    </script>

                   <?php echo $this->_tpl_vars['T_FILE_MANAGER']; ?>

                   <div id = "backup_table" style = "display:none;" class = "filemanagerBlock">
                               <?php echo $this->_tpl_vars['T_BACKUP_FORM']['javascript']; ?>

                               <form <?php echo $this->_tpl_vars['T_BACKUP_FORM']['attributes']; ?>
>
                                   <?php echo $this->_tpl_vars['T_BACKUP_FORM']['hidden']; ?>

                                   <table class = "uploadBox formElements">
                                       <tr><td class = "labelCell"><?php echo @_FILENAME; ?>
:&nbsp;</td>
                                           <td class = "elementCell"><?php echo $this->_tpl_vars['T_BACKUP_FORM']['backupname']['html']; ?>
</td></tr>
                                       <tr><td class = "labelCell"><?php echo @_TYPE; ?>
:&nbsp;</td>
                                           <td class = "elementCell"><?php echo $this->_tpl_vars['T_BACKUP_FORM']['backuptype']['html']; ?>
</td></tr>
                                       <tr><td colspan = "2">&nbsp;</td></tr>
                                       <tr><td></td><td class = "elementCell"><?php echo $this->_tpl_vars['T_BACKUP_FORM']['submit_backup']['html']; ?>
</td></tr>
                                   </table>
                               </form>
                               <img src = "images/others/progress_big.gif" id = "backup_image" title = "<?php echo @_UPLOADING; ?>
" alt = "<?php echo @_UPLOADING; ?>
" style = "display:none;margin-top:30px;vertical-align:middle;"/>
                   </div>
                <?php $this->_smarty_vars['capture']['t_backup_code'] = ob_get_contents(); ob_end_clean(); ?>

                <?php echo smarty_function_eF_template_printBlock(array('title' => ((is_array($_tmp=((is_array($_tmp=@_BACKUP)) ? $this->_run_mod_handler('cat', true, $_tmp, ' - ') : smarty_modifier_cat($_tmp, ' - ')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_RESTORE) : smarty_modifier_cat($_tmp, @_RESTORE)),'data' => $this->_smarty_vars['capture']['t_backup_code'],'image' => '32x32/backup_restore.png','help' => 'Backup-restore'), $this);?>

            </td></tr>
        <?php $this->_smarty_vars['capture']['moduleBackup'] = ob_get_contents(); ob_end_clean(); ?>