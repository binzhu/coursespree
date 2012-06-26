<?php /* Smarty version 2.6.26, created on 2012-05-15 11:57:38
         compiled from /home/content/87/9232987/html/virtual-tutoring/www/modules/module_bbb/module.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_bbb/module.tpl', 23, false),array('function', 'cycle', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_bbb/module.tpl', 103, false),array('modifier', 'cat', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_bbb/module.tpl', 23, false),)), $this); ?>

<?php if ($_SESSION['s_type'] == 'administrator'): ?>
    <?php ob_start(); ?>
                <?php echo $this->_tpl_vars['T_BBB_FORM']['javascript']; ?>

                <form <?php echo $this->_tpl_vars['T_BBB_FORM']['attributes']; ?>
>
                    <?php echo $this->_tpl_vars['T_BBB_FORM']['hidden']; ?>

                    <table class = "formElements">
                        <tr><td class = "labelCell"><?php echo @_BBB_BBBSERVERNAME; ?>
:&nbsp;</td>
                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_BBB_FORM']['server']['html']; ?>
</td>
                            <td class = "elementCell" align="left" width="100%">&nbsp;<a href="javascript:void(0)" onClick="document.getElementById('server_input').value = ''" ><img src="images/16x16/go_into.png" title="<?php echo @_BBB_RESETDEFAULTSERVER; ?>
" alt="<?php echo @_BBB_RESETDEFAULTSERVER; ?>
" border =0 style="vertical-align:middle"/></a> </td>
							<td class = "formError"><?php echo $this->_tpl_vars['T_BBB_FORM']['server']['error']; ?>
</td></tr>
							<td class = "labelCell"><?php echo @_BBB_SECURITYSALT; ?>
:&nbsp;</td>
							<td class = "elementCell"><?php echo $this->_tpl_vars['T_BBB_FORM']['salt']['html']; ?>
</td></tr>
							<td class = "labelCell"><?php echo @_BBB_BBBSERVERVERSION; ?>
:&nbsp;</td>
							<td class = "elementCell"><?php echo $this->_tpl_vars['T_BBB_FORM']['serverVersion']['html']; ?>
</td>
							<tr><td></td><td >&nbsp;</td></tr>
                        <tr><td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_BBB_FORM']['submit_BBB_server']['html']; ?>
</td></tr>
                    </table>
                </form>
    <?php $this->_smarty_vars['capture']['t_BBB_server'] = ob_get_contents(); ob_end_clean(); ?>

    <?php echo smarty_function_eF_template_printBlock(array('title' => @_BBB_BBBSERVER,'data' => $this->_smarty_vars['capture']['t_BBB_server'],'absoluteImagePath' => 1,'image' => ((is_array($_tmp=$this->_tpl_vars['T_BBB_MODULE_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'images/BBB32.png') : smarty_modifier_cat($_tmp, 'images/BBB32.png'))), $this);?>


<?php else: ?>
    <?php if ($_GET['add_BBB'] || $_GET['edit_BBB']): ?>
        <?php ob_start(); ?>
                    <?php echo $this->_tpl_vars['T_BBB_FORM']['javascript']; ?>

                    <form <?php echo $this->_tpl_vars['T_BBB_FORM']['attributes']; ?>
>
                        <?php echo $this->_tpl_vars['T_BBB_FORM']['hidden']; ?>

                        <table class = "formElements">
                            <tr><td class = "labelCell"><?php echo @_BBB_NAME; ?>
:&nbsp;</td>
                                <td class = "elementCell"><?php echo $this->_tpl_vars['T_BBB_FORM']['name']['html']; ?>
</td>
                                <td class = "formError"><?php echo $this->_tpl_vars['T_BBB_FORM']['name']['error']; ?>
</td></tr>
                            <tr><td class = "labelCell"><?php echo @_BBB_DATE; ?>
:&nbsp;</td>
                                <td class = "elementCell"><table><tr><td><?php echo $this->_tpl_vars['T_BBB_FORM']['day']['html']; ?>
</td>
                                                                     <td><?php echo $this->_tpl_vars['T_BBB_FORM']['month']['html']; ?>
</td>
                                                                     <td><?php echo $this->_tpl_vars['T_BBB_FORM']['year']['html']; ?>
</td>
                                                                     </tr></table>
                            <tr><td class = "labelCell"><?php echo @_BBB_TIME; ?>
:&nbsp;</td>
                                <td class = "elementCell"><table><tr><td><?php echo $this->_tpl_vars['T_BBB_FORM']['hour']['html']; ?>
</td>
                                                                     <td><?php echo $this->_tpl_vars['T_BBB_FORM']['minute']['html']; ?>
</td>
                                                                     </tr></table>
                            <tr><td class = "labelCell"><?php echo @_BBBDURATION; ?>
:&nbsp;</td>
                                <td class = "elementCell"><table><tr><td><?php echo $this->_tpl_vars['T_BBB_FORM']['duration_hours']['html']; ?>
</td>
                                                                     <td><?php echo $this->_tpl_vars['T_BBB_FORM']['duration_minutes']['html']; ?>
</td>
                                                                     </tr></table>
                            <tr><td></td><td >&nbsp;</td></tr>

                            <tr><td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_BBB_FORM']['submit_BBB']['html']; ?>
</td></tr>
                        </table>
                    </form>

        <?php $this->_smarty_vars['capture']['t_insert_BBB_code'] = ob_get_contents(); ob_end_clean(); ?>

        <?php ob_start(); ?>
                            <?php echo '
                            <script>
                            function ajaxSendMails() {
                                var url =  \''; ?>
<?php echo $this->_tpl_vars['T_BBB_MODULE_BASEURL']; ?>
&edit_BBB=<?php echo $_GET['edit_BBB']; ?>
&mail_users=1<?php echo '&postAjaxRequest=1\';
                                if ($(\'BBBUsersTable_currentFilter\')) {
			                		url = url+\'&filter=\'+$(\'BBBUsersTable_currentFilter\').innerHTML;
			             		}
                                $(\'mail_image\').writeAttribute(\'src\', \'images/others/progress1.gif\').show();
                                new Ajax.Request(url, {
                                    method:\'get\',
                                    asynchronous:true,
                                    onSuccess: function (transport) {

                                    alert(transport.responseText + " '; ?>
<?php echo @_BBB_EMAILSENTSUCCESFFULLY; ?>
<?php echo '");
                                    if (transport.responseText == "0") {
                                        $(\'mail_image\').hide().setAttribute(\'src\', \'images/16x16/error_delete\');
                                    } else {
                                        $(\'mail_image\').hide().setAttribute(\'src\', \'images/16x16/success.png\');
                                    }
                                    new Effect.Appear($(\'mail_image\'));
                                    window.setTimeout(\'Effect.Fade("mail_image")\', 2500);
                                    window.setTimeout("$(\'mail_image\').writeAttribute(\'src\', \'images/16x16/mail_forward.png\')", 3500);
                                    window.setTimeout("new Effect.Appear($(\'mail_image\'))", 3500);

                                    }
                                });
                            }
                            </script>
                            '; ?>


                    <table style = "width:100%">
                    <tr><td width="2%"><a href="javascript:void(0);" onClick="ajaxSendMails()"><img src= "images/16x16/mail_forward.png" id="mail_image" border = 0 /></a></td>
                        <td align="left"><?php echo @_BBB_NOTIFYUSERSVIAEMAIL; ?>
</td>
                    </tr>
                    </table>
<!--ajax:BBBUsersTable-->
                    <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_USERS_SIZE']; ?>
" sortBy = "0" id = "BBBUsersTable" useAjax = "1" rowsPerPage = "20"  url = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASEURL']; ?>
&edit_BBB=<?php echo $_GET['edit_BBB']; ?>
&">
                        <tr class = "topTitle">
                            <td class = "topTitle" name="login"><?php echo @_LOGIN; ?>
</td>
                            <td class = "topTitle" name="name"><?php echo @_NAME; ?>
</td>
                            <td class = "topTitle" name="surname"><?php echo @_SURNAME; ?>
</td>
                            <td class = "topTitle" name="email"><?php echo @_EMAIL; ?>
</td>
                            <td class = "topTitle noSort" name="login" align="center"><?php echo @_CHECK; ?>
</td>
                        </tr>

                        <?php $_from = $this->_tpl_vars['T_USERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users_list']['iteration']++;
?>
                            <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
">
                                <td>
                                <?php if (( $this->_tpl_vars['user']['pending'] == 1 )): ?>
                                    <span style="color:red;"><?php echo $this->_tpl_vars['user']['login']; ?>
</span>
                                <?php else: ?>
                                    <?php echo $this->_tpl_vars['user']['login']; ?>

                                <?php endif; ?>
                                </td>

                                <td><?php echo $this->_tpl_vars['user']['name']; ?>
</td>
                                <td><?php echo $this->_tpl_vars['user']['surname']; ?>
</td>
                                <td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
                                <td align = "center">
                                    <span style="display:none" id="check_row<?php echo $this->_tpl_vars['user']['login']; ?>
"><?php if ($this->_tpl_vars['user']['meeting_ID'] == $_GET['edit_BBB']): ?>1<?php else: ?>0<?php endif; ?></span>
                                    <input class = "inputCheckBox" type = "checkbox" onclick="javascript:ajaxPostBBB('<?php echo $this->_tpl_vars['user']['login']; ?>
', this);" name = "check_<?php echo $this->_tpl_vars['user']['login']; ?>
" id = "check_row<?php echo $this->_tpl_vars['user']['login']; ?>
"
                                    <?php if ($this->_tpl_vars['user']['meeting_ID'] == $_GET['edit_BBB']): ?>
                                     checked
                                    <?php endif; ?>
                                    >
                                </td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan="5" class = "emptyCategory"><?php echo @_NOUSERSFOUND; ?>
</td></tr>
                        <?php endif; unset($_from); ?>
                        </table>
<!--/ajax:BBBUsersTable-->
                    </form>
                                <?php echo '
                <script>
                // Wrapper function for any of the 2-3 points where Ajax is used in the module personal
                function ajaxPostBBB(id, el, table_id) {
                     Element.extend(el);

                     var baseUrl =  \''; ?>
<?php echo $this->_tpl_vars['T_BBB_MODULE_BASEURL']; ?>
<?php echo '&edit_BBB='; ?>
<?php echo $_GET['edit_BBB']; ?>
<?php echo '&postAjaxRequest=1\';

                     if (id) {
                         var url = baseUrl + \'&user=\' + id + \'&insert=\'+el.checked;
                         var img_id   = \'img_\'+ id;
						if ($(table_id+\'_currentFilter\')) {
			                url = url+\'&filter=\'+$(table_id+\'_currentFilter\').innerHTML;
			            }                         
                     } else if (table_id && table_id == \'BBBUsersTable\') {
                         el.checked ? url = baseUrl + \'&addAll=1\' : url = baseUrl + \'&removeAll=1\';
                         var img_id   = \'img_selectAll\';
                         if ($(table_id+\'_currentFilter\')) {
			                url = url+\'&filter=\'+$(table_id+\'_currentFilter\').innerHTML;
			             }
                     }

                     var position = eF_js_findPos(el);
                     var img      = document.createElement("img");

                     img.style.position = \'absolute\';
                     img.style.top      = Element.positionedOffset(Element.extend(el)).top  + \'px\';
                     img.style.left     = Element.positionedOffset(Element.extend(el)).left + 6 + Element.getDimensions(Element.extend(el)).width + \'px\';

                     img.setAttribute("id", img_id);
                     img.setAttribute(\'src\', \'images/others/progress1.gif\');

                     el.parentNode.appendChild(img);

                       new Ajax.Request(url, {
                                 method:\'get\',
                                 asynchronous:true,
                                 onSuccess: function (transport) {
                                     // Update all form tables
                                     /*
                                     var tables = sortedTables.size();
                                     var i;
                                     for (i = 0; i < tables; i++) {
                                         if (sortedTables[i].id == \'BBBUsersTable\') {
                                             eF_js_rebuildTable(i, 0, \'null\', \'desc\');
                                         }
                                     }
                                     */

                                     img.style.display = \'none\';
                                     img.setAttribute(\'src\', \'images/16x16/success.png\');
                                     new Effect.Appear(img_id);
                                     window.setTimeout(\'Effect.Fade("\'+img_id+\'")\', 2500);

                                     }
                            });
                }
                </script>
                '; ?>



        <?php $this->_smarty_vars['capture']['t_BBB_users'] = ob_get_contents(); ob_end_clean(); ?>

        <?php ob_start(); ?>
            <div class="tabber" >
               <div class="tabbertab">
                    <h3><?php echo @_BBB_SCHEDULEMEETING; ?>
</h3>
                    <?php echo smarty_function_eF_template_printBlock(array('title' => @_BBB_SCHEDULEMEETING,'data' => $this->_smarty_vars['capture']['t_insert_BBB_code'],'image' => '32x32/calendar.png'), $this);?>

                </div>
                <?php if (isset ( $_GET['edit_BBB'] )): ?>
                    <div class="tabbertab<?php if ($_GET['tab'] == 'users'): ?> tabbertabdefault <?php endif; ?>">
                        <h3><?php echo @_BBB_MEETINGATTENDANTS; ?>
</h3>
                        <?php echo smarty_function_eF_template_printBlock(array('title' => @_BBB_MEETINGATTENDANTS,'data' => $this->_smarty_vars['capture']['t_BBB_users'],'image' => '32x32/users.png'), $this);?>

                    </div>
                <?php endif; ?>
            </div>
        <?php $this->_smarty_vars['capture']['t_BBB_tabber'] = ob_get_contents(); ob_end_clean(); ?>

        <?php echo smarty_function_eF_template_printBlock(array('title' => @_BBB_BBBMEETINGDATA,'data' => $this->_smarty_vars['capture']['t_BBB_tabber'],'absoluteImagePath' => 1,'image' => ((is_array($_tmp=$this->_tpl_vars['T_BBB_MODULE_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'images/BBB32.png') : smarty_modifier_cat($_tmp, 'images/BBB32.png'))), $this);?>


    <?php else: ?>
        <?php ob_start(); ?>
            <?php if ($this->_tpl_vars['T_BBB_CURRENTLESSONTYPE'] == 'professor'): ?>
            <table>
                <tr><td>
                    <a href = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASEURL']; ?>
&add_BBB=1"><img src = "images/16x16/add.png" alt = "<?php echo @_BBB_ADDBBB; ?>
" title = "<?php echo @_BBB_ADDBBB; ?>
" border = "0" /></a>
                </td><td>
                    <a href = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASEURL']; ?>
&add_BBB=1" title = "<?php echo @_BBB_ADDBBB; ?>
"><?php echo @_BBB_ADDBBB; ?>
</a>
                </td></tr>
            </table>
            <?php endif; ?>

            <table class="sortedTable" id = "module_BBB_sortedTable" border = "0" width = "100%" sortBy = "0">
                <tr class = "topTitle">
                    <td class = "topTitle"><?php echo @_BBB_NAME; ?>
</td>
                    <td class = "topTitle" width="20%"><?php echo @_BBB_DATE; ?>
</td>
                    <td class = "topTitle" width="20%"><?php echo @_BBBDURATION; ?>
</td>
                    <td class = "topTitle" width="20%"><?php echo @_BBB_STATUS; ?>
</td>
                    <td class = "topTitle" align="center"><?php echo @_OPERATIONS; ?>
</td>
                </tr>

                <?php $_from = $this->_tpl_vars['T_BBB']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['BBB'] = array('total' => count($_from), 'iteration' => 0);
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
                    <td>#filter:timestamp_time-<?php echo $this->_tpl_vars['meeting']['timestamp']; ?>
#</td>
                    <td><?php echo $this->_tpl_vars['meeting']['durationHours']; ?>
:<?php if ($this->_tpl_vars['meeting']['durationMinutes'] == 0): ?>00<?php else: ?><?php echo $this->_tpl_vars['meeting']['durationMinutes']; ?>
<?php endif; ?></td>
                    <td ><?php if ($this->_tpl_vars['meeting']['status'] == '0'): ?><?php echo @_BBBNOTSTARTED; ?>
<?php elseif ($this->_tpl_vars['meeting']['status'] == '1'): ?><?php echo @_BBBSTARTED; ?>
<?php else: ?><?php echo @_BBBFINISHED; ?>
<?php endif; ?></td>
                    <td align = "center">
                        <?php if ($this->_tpl_vars['T_BBB_CURRENTLESSONTYPE'] == 'professor'): ?>
	                        <table>
	                            <tr>
	                            <?php if ($this->_tpl_vars['meeting']['status'] != '2'): ?>
	                            <td width="30%">
	                                <a href = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASEURL']; ?>
&edit_BBB=<?php echo $this->_tpl_vars['meeting']['id']; ?>
" class = "editLink"><img border = "0" src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" alt = "<?php echo @_EDIT; ?>
" /></a>
	                            </td>
	                            <td width="30%">
	                                <?php if ($this->_tpl_vars['meeting']['status'] == '0' && ! $this->_tpl_vars['meeting']['mayStart']): ?><img border = "0" src = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASELINK']; ?>
images/server_client_exchange.png" class = "inactiveImage" title = "<?php echo @_BBBJOINMEETING; ?>
" alt = "<?php echo @_BBBJOINMEETING; ?>
" /><?php elseif ($this->_tpl_vars['meeting']['mayStart']): ?><a href = "<?php echo $this->_tpl_vars['T_BBB_CREATEMEETINGURL']; ?>
" onClick="return confirm('<?php echo @_BBB_AREYOUSUREYOUWANTTOSTARTTHECONFERENCE; ?>
')" class = "editLink"><img border = "0" src = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASELINK']; ?>
images/server_client_exchange.png" title = "<?php echo @_BBBSTARTMEETING; ?>
" alt = "<?php echo @_BBBSTARTMEETING; ?>
" /></a><?php endif; ?>
	                            </td>
	                            <td width="30%">
	                            <?php else: ?>
	                            <td align="center">
	                            <?php endif; ?>
	                                <a href = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASEURL']; ?>
&delete_BBB=<?php echo $this->_tpl_vars['meeting']['id']; ?>
" onclick = "return confirm('<?php echo @_BBBAREYOUSUREYOUWANTTODELETEEVENT; ?>
')" class = "deleteLink"><img border = "0" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" /></a>
	                            </td>
	                            </tr>
	                         </table>
                         <?php else: ?>
                            <?php if ($this->_tpl_vars['meeting']['status'] == '0'): ?>
                            	<img border = "0" src = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASELINK']; ?>
images/server_client_exchange.png" class = "inactiveImage" title = "<?php echo @_BBBJOINMEETING; ?>
" alt = "<?php echo @_BBBJOINMEETING; ?>
" />
                            <?php elseif ($this->_tpl_vars['meeting']['status'] == '1'): ?>
                            	<a href = "<?php echo $this->_tpl_vars['meeting']['joiningUrl']; ?>
"  class = "editLink"><img border = "0" src = "<?php echo $this->_tpl_vars['T_BBB_MODULE_BASELINK']; ?>
images/server_client_exchange.png" title = "<?php echo @_BBBJOINMEETING; ?>
" alt = "<?php echo @_BBBJOINMEETING; ?>
" /></a>
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


        <?php echo smarty_function_eF_template_printBlock(array('title' => @_BBB_BBBLIST,'data' => $this->_smarty_vars['capture']['t_BBB_list_code'],'absoluteImagePath' => 1,'image' => ((is_array($_tmp=$this->_tpl_vars['T_BBB_MODULE_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'images/BBB32.png') : smarty_modifier_cat($_tmp, 'images/BBB32.png'))), $this);?>

    <?php endif; ?>
<?php endif; ?>
