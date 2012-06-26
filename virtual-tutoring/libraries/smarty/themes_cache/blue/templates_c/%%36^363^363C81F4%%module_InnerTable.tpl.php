<?php /* Smarty version 2.6.26, created on 2012-05-16 00:52:58
         compiled from /home/content/87/9232987/html/virtual-tutoring/www/modules/module_bbb/module_InnerTable.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_bbb/module_InnerTable.tpl', 13, false),array('function', 'eF_template_printBlock', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_bbb/module_InnerTable.tpl', 47, false),array('modifier', 'cat', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_bbb/module_InnerTable.tpl', 47, false),)), $this); ?>
<?php ob_start(); ?>
    <table border = "0" width = "100%">
        <tr class = "topTitle">
            <td class = "topTitle"><?php echo @_BBB_NAME; ?>
</td>
            <td class = "topTitle" width="20%"><?php echo @_BBB_DATE; ?>
</td>
            <td class = "topTitle" width="10%"><?php echo @_BBBDURATION; ?>
</td>
            <td class = "topTitle"><?php echo @_BBB_STATUS; ?>
</td>
            <td class = "topTitle" align="center"><?php echo @_OPERATIONS; ?>
</td>
        </tr>

        <?php $_from = $this->_tpl_vars['T_BBB_INNERTABLE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['BBB'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['BBB']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['meeting']):
        $this->_foreach['BBB']['iteration']++;
?>
        <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
">
            <td><?php if ($this->_tpl_vars['T_BBB_CURRENTLESSONTYPE'] != 'student'): ?><a href = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASEURL']; ?>
&edit_BBB=<?php echo $this->_tpl_vars['meeting']['id']; ?>
" class = "editLink"><?php echo $this->_tpl_vars['meeting']['name']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['meeting']['name']; ?>
<?php endif; ?></td>
            <td><span title = " #filter:timestamp_time-<?php echo $this->_tpl_vars['meeting']['timestamp']; ?>
#"><?php echo $this->_tpl_vars['meeting']['time_remaining']; ?>
</span></td>
            <td><?php echo $this->_tpl_vars['meeting']['durationHours']; ?>
:<?php if ($this->_tpl_vars['meeting']['durationMinutes'] == 0): ?>00<?php else: ?><?php echo $this->_tpl_vars['meeting']['durationMinutes']; ?>
<?php endif; ?></td>
            <td><?php if ($this->_tpl_vars['meeting']['status'] == '0'): ?><?php echo @_BBBNOTSTARTED; ?>
<?php elseif ($this->_tpl_vars['meeting']['status'] == '1'): ?><?php echo @_BBBSTARTED; ?>
<?php else: ?><?php echo @_BBBFINISHED; ?>
<?php endif; ?></td>
            <td align = "center">

            <?php if ($this->_tpl_vars['meeting']['status'] == 2): ?>
                <img border = "0" src = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASELINK']; ?>
images/server_client_exchange.png" class = "inactiveImage" title = "<?php echo @_BBBFINISHED; ?>
" alt = "<?php echo @_BBBFINISHED; ?>
" />
            <?php else: ?>
                <?php if ($this->_tpl_vars['T_BBB_CURRENTLESSONTYPE'] == 'student'): ?>
                    <?php if ($this->_tpl_vars['meeting']['status'] == '0'): ?>
                    	<img border = "0" src = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASELINK']; ?>
images/server_client_exchange.png" class = "inactiveImage" title = "<?php echo @_BBBJOINMEETING; ?>
" alt = "<?php echo @_BBBJOINMEETING; ?>
" />
                    <?php elseif ($this->_tpl_vars['meeting']['status'] == '1'): ?>  
                    	<a href = "<?php echo $this->_tpl_vars['meeting']['joiningUrl']; ?>
" class = "editLink"><img border = "0" src = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASELINK']; ?>
images/server_client_exchange.png" title = "<?php echo @_BBBJOINMEETING; ?>
" alt = "<?php echo @_BBBJOINMEETING; ?>
" /></a>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if ($this->_tpl_vars['meeting']['status'] == '0' && ! $this->_tpl_vars['meeting']['mayStart']): ?>
                    	<img border = "0" src = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASELINK']; ?>
images/server_client_exchange.png" class = "inactiveImage" title = "<?php echo @_BBBJOINMEETING; ?>
" alt = "<?php echo @_BBBJOINMEETING; ?>
" />
                    <?php elseif ($this->_tpl_vars['meeting']['mayStart']): ?>
                    	<a href = "<?php echo $this->_tpl_vars['T_BBB_CREATEMEETINGURL']; ?>
" class = "editLink" onClick="return confirm('<?php echo @_BBB_AREYOUSUREYOUWANTTOSTARTTHECONFERENCE; ?>
')"><img border = "0" src = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASELINK']; ?>
images/server_client_exchange.png" title = "<?php echo @_BBBSTARTMEETING; ?>
" alt = "<?php echo @_BBBSTARTMEETING; ?>
" /></a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
            </td>

        </tr>
        <?php endforeach; else: ?>
        <tr><td colspan="5" class = "emptyCategory"><?php echo @_BBBNOMEETINGSCHEDULED; ?>
</td></tr>
        <?php endif; unset($_from); ?>
    </table>
<?php $this->_smarty_vars['capture']['t_BBB_list_code'] = ob_get_contents(); ob_end_clean(); ?>


<?php echo smarty_function_eF_template_printBlock(array('title' => @_BBB_BBBLIST,'data' => $this->_smarty_vars['capture']['t_BBB_list_code'],'absoluteImagePath' => 1,'image' => ((is_array($_tmp=$this->_tpl_vars['T_BBB_MODULE_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'images/BBB32.png') : smarty_modifier_cat($_tmp, 'images/BBB32.png')),'options' => $this->_tpl_vars['T_MODULE_BBB_INNERTABLE_OPTIONS']), $this);?>
