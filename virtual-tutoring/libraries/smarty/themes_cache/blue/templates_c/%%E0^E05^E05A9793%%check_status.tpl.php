<?php /* Smarty version 2.6.26, created on 2012-05-15 12:00:18
         compiled from includes/check_status.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'includes/check_status.tpl', 15, false),array('function', 'eF_template_printBlock', 'includes/check_status.tpl', 212, false),)), $this); ?>
<?php ob_start(); ?>
    <table width = "100%">
    <tr><td>
        <table style = "width:100%">
        <tr><td colspan = "100%">&nbsp;</td></tr>
        <tr><td colspan = "100%" class = " blockHeader">Recommended Software</td></tr>
        <tr class = "topTitle defaultRowHeight">
            <td style = "width:30%">Name</td>
            <td style = "width:30%">Installed Version</td>
            <td style = "width:30%">Recommended</td>
            <td style = "width:10%" class = "centerAlign">Status</td>
            <td style = "width:1%"></td></tr>
    <?php $_from = $this->_tpl_vars['T_SOFTWARE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['settings_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['settings_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['settings_list']['iteration']++;
?>
        <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor,evenRowColor"), $this);?>
 defaultRowHeight">
            <td><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
            <td><?php echo $this->_tpl_vars['item']['installed']; ?>
</td>
            <td><?php echo $this->_tpl_vars['item']['recommended']; ?>
</td>
            <td class = "centerAlign">
            <?php if ($this->_tpl_vars['item']['status']): ?>
                <img src = "images/16x16/success.png" alt = "OK" title = "OK" />
            <?php else: ?>
                <img src = "images/16x16/warning.png" alt = "Missing" title = "Missing" />
            <?php endif; ?>&nbsp;
            </td>
            <td><img src = "images/16x16/help.png" alt = "help" title = "help" onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)"><div id = '<?php echo $this->_tpl_vars['key']; ?>
' onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)" class = "popUpInfoDiv" style = "padding:1em 1em 1em 1em;width:300px;position:absolute;display:none"><?php echo $this->_tpl_vars['item']['help']; ?>
</div></td></tr>
    <?php endforeach; endif; unset($_from); ?>
        </table>

<?php if ($this->_tpl_vars['T_MANDATORY']): ?>
        <table style = "width:100%">
        <tr><td colspan = "100%">&nbsp;</td></tr>
        <tr><td colspan = "100%" class = " blockHeader">Mandatory PHP extesions</td></tr>
        <tr class = "topTitle defaultRowHeight">
            <td>Name</td>

            <td style = "width:10%;" class = "centerAlign">Status</td>
            <td style = "width:1%"></td></tr>
    <?php $_from = $this->_tpl_vars['T_MANDATORY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mandatory_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mandatory_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['mandatory_list']['iteration']++;
?>
        <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor,evenRowColor"), $this);?>
 defaultRowHeight">
            <td><?php echo $this->_tpl_vars['item']['name']; ?>
</td>

            <td class = "centerAlign"><?php if ($this->_tpl_vars['item']['enabled']): ?><img src = "images/16x16/success.png" alt = "OK" title = "OK" /><?php else: ?><img src = "images/16x16/forbidden.png" alt = "Missing" title = "Missing" /><?php endif; ?></td>
            <td><img src = "images/16x16/help.png" alt = "help" title = "help" onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)"><div id = '<?php echo $this->_tpl_vars['key']; ?>
' onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)" class = "popUpInfoDiv" style = "padding:1em 1em 1em 1em;width:300px;position:absolute;display:none"><?php echo $this->_tpl_vars['item']['help']; ?>
</div></td></tr>
    <?php endforeach; endif; unset($_from); ?>
        </table>
<?php endif; ?>

<?php if ($this->_tpl_vars['T_OPTIONAL']): ?>
        <table style = "width:100%">
        <tr><td colspan = "100%">&nbsp;</td></tr>
        <tr><td colspan = "100%" class = " blockHeader">Optional PHP extesions</td></tr>
        <tr class = "topTitle defaultRowHeight">
            <td>Name</td>

            <td style = "width:10%;" class = "centerAlign">Status</td>
            <td style = "width:1%"></td></tr>
    <?php $_from = $this->_tpl_vars['T_OPTIONAL']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['optional_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['optional_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['optional_list']['iteration']++;
?>
        <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor,evenRowColor"), $this);?>
 defaultRowHeight">
            <td><?php echo $this->_tpl_vars['item']['name']; ?>
</td>

            <td class = "centerAlign"><?php if ($this->_tpl_vars['item']['enabled']): ?><img src = "images/16x16/success.png" alt = "OK" title = "OK" /><?php else: ?><img src = "images/16x16/warning.png" alt = "Missing" title = "Missing" /><?php endif; ?></td>
            <td><img src = "images/16x16/help.png" alt = "help" title = "help" onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)"><div id = '<?php echo $this->_tpl_vars['key']; ?>
' onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)" class = "popUpInfoDiv" style = "padding:1em 1em 1em 1em;width:300px;position:absolute;display:none"><?php echo $this->_tpl_vars['item']['help']; ?>
</div></td></tr>
    <?php endforeach; endif; unset($_from); ?>
        </table>
<?php endif; ?>
<?php if ($this->_tpl_vars['T_SETTINGS_MANDATORY']): ?>
        <table style = "width:100%">
        <tr><td colspan = "100%">&nbsp;</td></tr>
        <tr><td colspan = "100%" class = " blockHeader">Mandatory PHP Settings</td></tr>
        <tr class = "topTitle defaultRowHeight">
            <td style = "width:30%">Name</td>
            <td style = "width:30%">Value</td>
            <td style = "width:30%">Recommended</td>

            <td style = "width:10%;" class = "centerAlign">Status</td>
            <td style = "width:1%"></td></tr>
    <?php $_from = $this->_tpl_vars['T_SETTINGS_MANDATORY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['settings_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['settings_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['settings_list']['iteration']++;
?>
        <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor,evenRowColor"), $this);?>
 defaultRowHeight">
            <td><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
            <td><?php echo $this->_tpl_vars['item']['value']; ?>
</td>
            <td><?php echo $this->_tpl_vars['item']['recommended']; ?>
</td>

            <td class = "centerAlign"><?php if ($this->_tpl_vars['item']['status']): ?><img src = "images/16x16/success.png" alt = "OK" title = "OK" /><?php else: ?><img src = "images/16x16/forbidden.png" alt = "Missing" title = "Missing" /><?php endif; ?></td>
            <td><img src = "images/16x16/help.png" alt = "help" title = "help" onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)"><div id = '<?php echo $this->_tpl_vars['key']; ?>
' onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)" class = "popUpInfoDiv" style = "padding:1em 1em 1em 1em;width:300px;position:absolute;display:none"><?php echo $this->_tpl_vars['item']['help']; ?>
</div></td></tr>
    <?php endforeach; endif; unset($_from); ?>
        </table>
<?php endif; ?>
<?php if ($this->_tpl_vars['T_SETTINGS']): ?>
        <table style = "width:100%">
        <tr><td colspan = "100%">&nbsp;</td></tr>
        <tr><td colspan = "100%" class = " blockHeader">Recommended PHP Settings</td></tr>
        <tr class = "topTitle defaultRowHeight">
            <td style = "width:30%">Name</td>
            <td style = "width:30%">Value</td>
            <td style = "width:30%">Recommended</td>

            <td style = "width:10%;" class = "centerAlign">Status</td>
            <td style = "width:1%"></td></tr>
    <?php $_from = $this->_tpl_vars['T_SETTINGS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['settings_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['settings_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['settings_list']['iteration']++;
?>
        <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor,evenRowColor"), $this);?>
 defaultRowHeight">
            <td><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
            <td><?php echo $this->_tpl_vars['item']['value']; ?>
</td>
            <td><?php echo $this->_tpl_vars['item']['recommended']; ?>
</td>

            <td class = "centerAlign"><?php if ($this->_tpl_vars['item']['status']): ?><img src = "images/16x16/success.png" alt = "OK" title = "OK" /><?php else: ?><img src = "images/16x16/<?php if ($this->_tpl_vars['item']['name'] == 'memory_limit'): ?>forbidden<?php else: ?>warning<?php endif; ?>.png" alt = "Missing" title = "Missing" /><?php endif; ?></td>
            <td><img src = "images/16x16/help.png" alt = "help" title = "help" onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)"><div id = '<?php echo $this->_tpl_vars['key']; ?>
' onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)" class = "popUpInfoDiv" style = "padding:1em 1em 1em 1em;width:300px;position:absolute;display:none"><?php echo $this->_tpl_vars['item']['help']; ?>
</div></td></tr>
    <?php endforeach; endif; unset($_from); ?>
        </table>
<?php endif; ?>
<?php if ($this->_tpl_vars['T_PERMISSIONS']): ?>
        <table style = "width:100%">
        <tr><td colspan = "100%">&nbsp;</td></tr>
        <tr><td colspan = "100%" class = " blockHeader">Filesystem Permissions</td></tr>
        <tr class = "topTitle defaultRowHeight">
            <td style = "width:30%">Directory</td>
            <td style = "width:60%">Writable</td>

            <td style = "width:10%;" class = "centerAlign">Status</td>
            <td style = "width:1%"></td></tr>
    <?php $_from = $this->_tpl_vars['T_PERMISSIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['settings_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['settings_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['settings_list']['iteration']++;
?>
        <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor,evenRowColor"), $this);?>
 defaultRowHeight">
            <td><?php echo $this->_tpl_vars['key']; ?>
</td>
            <td><?php if ($this->_tpl_vars['item']['writable']): ?>YES<?php else: ?>NO<?php endif; ?></td>

            <td class = "centerAlign"><?php if ($this->_tpl_vars['item']['writable']): ?><img src = "images/16x16/success.png" alt = "OK" title = "OK" /><?php else: ?><img src = "images/16x16/forbidden.png" alt = "Missing" title = "Missing" /><?php endif; ?></td>
            <td><img src = "images/16x16/help.png" alt = "help" title = "help" onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)"><div id = '<?php echo $this->_tpl_vars['key']; ?>
' onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)" class = "popUpInfoDiv" style = "padding:1em 1em 1em 1em;width:300px;position:absolute;display:none"><?php echo $this->_tpl_vars['item']['help']; ?>
</div></td></tr>
    <?php endforeach; endif; unset($_from); ?>
        </table>
<?php endif; ?>
<?php if ($this->_tpl_vars['T_PEAR']): ?>
        <table style = "width:100%">
        <tr><td colspan = "100%">&nbsp;</td></tr>
        <tr><td colspan = "100%" class = " blockHeader">PEAR compatibility</td></tr>
        <tr class = "topTitle defaultRowHeight">
            <td>Package</td>

            <td style = "width:10%;" class = "centerAlign">Status</td>
            <td style = "width:1%"></td></tr>
    <?php $_from = $this->_tpl_vars['T_PEAR']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['settings_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['settings_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['settings_list']['iteration']++;
?>
        <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor,evenRowColor"), $this);?>
 defaultRowHeight">
            <td><?php echo $this->_tpl_vars['key']; ?>
</td>

            <td class = "centerAlign"><?php if ($this->_tpl_vars['item']['exists']): ?><img src = "images/16x16/success.png" alt = "OK" title = "OK" /><?php else: ?><img src = "images/16x16/forbidden.png" alt = "Missing" title = "Missing" /><?php endif; ?></td>
            <td><img src = "images/16x16/help.png" alt = "help" title = "help" onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)"><div id = '<?php echo $this->_tpl_vars['key']; ?>
' onclick = "eF_js_showHideDiv(this, '<?php echo $this->_tpl_vars['key']; ?>
', event)" class = "popUpInfoDiv" style = "padding:1em 1em 1em 1em;width:300px;position:absolute;display:none"><?php echo $this->_tpl_vars['item']['help']; ?>
</div></td></tr>
    <?php endforeach; endif; unset($_from); ?>
        </table>
<?php endif; ?>
    </td><td>
    </td></tr>
        <tr><td>&nbsp;</td></tr>
</table>

<?php $this->_smarty_vars['capture']['t_check_status_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo smarty_function_eF_template_printBlock(array('title' => @_ENVIRONMENTALCHECK,'data' => $this->_smarty_vars['capture']['t_check_status_code'],'image' => '32x32/generic.png'), $this);?>
