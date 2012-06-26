<?php /* Smarty version 2.6.26, created on 2012-05-15 11:51:07
         compiled from includes/header_code.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'includes/header_code.tpl', 2, false),array('modifier', 'sizeof', 'includes/header_code.tpl', 13, false),array('modifier', 'eF_formatTitlePath', 'includes/header_code.tpl', 74, false),)), $this); ?>
 <div id = "logo">
  <a href = "<?php if ($_SESSION['s_login']): ?><?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)); ?>
<?php else: ?>index.php<?php endif; ?>">
   <img class = "handle" src = "<?php echo $this->_tpl_vars['T_LOGO']; ?>
" title = "<?php echo $this->_tpl_vars['T_CONFIGURATION']['site_name']; ?>
" alt = "<?php echo $this->_tpl_vars['T_CONFIGURATION']['site_name']; ?>
" />
  </a>
 </div>
 <?php if ($_SESSION['s_login']): ?>
 <div id = "logout_link" >
  <?php if ($this->_tpl_vars['T_THEME_SETTINGS']->options['sidebar_interface']): ?>
   <?php if ($this->_tpl_vars['T_ONLINE_USERS_LIST'] && ! $this->_tpl_vars['T_CONFIGURATION']['disable_online_users']): ?>
    <span class = "headerText" >
    <?php echo '<a href = "javascript:void(0)" class = "info">'; ?><?php echo @_ONLINEUSERS; ?><?php echo ':&nbsp;(<span id = "header_connected_users">'; ?><?php echo sizeof($this->_tpl_vars['T_ONLINE_USERS_LIST']); ?><?php echo '</span><span class = "tooltipSpan">'; ?><?php $_from = $this->_tpl_vars['T_ONLINE_USERS_LIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['online_users_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['online_users_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['online_users_list']['iteration']++;
?><?php echo '#filter:login-'; ?><?php echo $this->_tpl_vars['item']['login']; ?><?php echo '#'; ?><?php if (! ($this->_foreach['online_users_list']['iteration'] == $this->_foreach['online_users_list']['total'])): ?><?php echo ',&nbsp;'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo '</span>)</a>'; ?>

    </span>
      <?php endif; ?>
    <a href = "userpage.php?ctg=personal&user=<?php echo $this->_tpl_vars['T_CURRENT_USER']->user['login']; ?>
" class="headerText" id = "personal_options_link">
     #filter:login-<?php echo $_SESSION['s_login']; ?>
#
    </a>
    <div style = "display:none" id = "my_personal_options">
     <ul style = "list-style:none;padding:0px;" class = "headerMenu">
     <?php if ($this->_tpl_vars['T_CURRENT_USER']->coreAccess['dashboard'] != 'hidden'): ?>
      <li onclick = "location='userpage.php?ctg=personal&user=<?php echo $this->_tpl_vars['T_CURRENT_USER']->user['login']; ?>
&op=dashboard'"><?php echo @_DASHBOARD; ?>
</li>
     <?php endif; ?>
      <li onclick = "location='userpage.php?ctg=personal&user=<?php echo $this->_tpl_vars['T_CURRENT_USER']->user['login']; ?>
&op=profile'"><?php echo @_ACCOUNT; ?>
</li>
     <?php if ($_SESSION['s_type'] != 'administrator'): ?>
      <li onclick = "location='userpage.php?ctg=personal&user=<?php echo $this->_tpl_vars['T_CURRENT_USER']->user['login']; ?>
&op=user_courses'"><?php echo @_LEARNING; ?>
</li>
     <?php endif; ?>






     </ul>
    </div>
   <?php if ($this->_tpl_vars['T_CURRENT_USER']->coreAccess['personal_messages'] != 'hidden' && $this->_tpl_vars['T_CONFIGURATION']['disable_messages'] != 1): ?>
    <span class = "headerText">
     <img class = "ajaxHandle" src = "images/16x16/mail.png" alt = "<?php echo @_MESSAGES; ?>
" title = "<?php echo @_MESSAGES; ?>
" onclick = "location='userpage.php?ctg=messages'"/>
     <span id = "header_total_messages"></span>
    </span>
   <?php endif; ?>
   <?php if ($this->_tpl_vars['T_MAPPED_ACCOUNTS'] && $_GET['ctg'] != 'agreement'): ?>
    <?php if (! $this->_tpl_vars['T_CONFIGURATION']['mapped_accounts'] || $this->_tpl_vars['T_CONFIGURATION']['mapped_accounts'] == 1 && $_SESSION['s_type'] != 'student' || $this->_tpl_vars['T_CONFIGURATION']['mapped_accounts'] == 2 && $_SESSION['s_type'] == 'administrator'): ?>
    <span class = "headerText">
    <select class = "inputSelectMed" onchange = "if (this.value) changeAccount(this.value)" >
     <option value="">[<?php echo @_SWITCHACCOUNT; ?>
]</option>
     <?php $_from = $this->_tpl_vars['T_MAPPED_ACCOUNTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['additional_accounts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['additional_accounts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['additional_accounts']['iteration']++;
?>
     <option value="<?php echo $this->_tpl_vars['item']['login']; ?>
">#filter:login-<?php echo $this->_tpl_vars['item']['login']; ?>
#</option>
                 <?php endforeach; endif; unset($_from); ?>
             </select></span>
             <?php endif; ?>
            <?php endif; ?>
      <a class = "headerText" href = "index.php?logout=true"><?php echo @_LOGOUT; ?>
</a>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['T_THEME_SETTINGS']->options['sidebar_interface'] != 0 && $this->_tpl_vars['T_HEADER_CLASS'] == 'header'): ?><?php echo $this->_smarty_vars['capture']['t_path_additional_code']; ?>
<?php endif; ?>
 </div>
 <?php endif; ?>
 <?php if ($this->_tpl_vars['T_CONFIGURATION']['motto_on_header']): ?>
  <div id = "info">
   <div id = "site_name" class= "headerText"><?php echo $this->_tpl_vars['T_CONFIGURATION']['site_name']; ?>
</div>
   <div id = "site_motto" class= "headerText"><?php echo $this->_tpl_vars['T_CONFIGURATION']['site_motto']; ?>
</div>
  </div>
 <?php endif; ?>
 <div id = "path">
  <div id = "path_title"><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('eF_formatTitlePath', true, $_tmp) : smarty_modifier_eF_formatTitlePath($_tmp)); ?>
</div>
  <div id = "tab_handles_div">
   <?php if ($this->_tpl_vars['T_THEME_SETTINGS']->options['sidebar_interface'] == 0 || $this->_tpl_vars['T_HEADER_CLASS'] == 'headerHidden'): ?><?php echo $this->_smarty_vars['capture']['t_path_additional_code']; ?>
<?php endif; ?>
  </div>
  <div id = "path_language">
  <?php if (((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)) != 'index.php' && $this->_tpl_vars['T_THEME_SETTINGS']->options['sidebar_interface'] != 0 && $_SESSION['s_login']): ?>
            <form action = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php if ($_SESSION['s_type'] == 'administrator'): ?>control_panel<?php else: ?>lessons<?php endif; ?>&op=search" method = "post">
    <input type = "text" name = "search_text" value = "<?php echo @_SEARCH; ?>
" onclick="if(this.value=='<?php echo @_SEARCH; ?>
')this.value='';" onblur="if(this.value=='')this.value='<?php echo @_SEARCH; ?>
';" class = "searchBox" style = "background-image:url('images/16x16/search.png');"/>
    <input type = "hidden" name = "current_location" id = "current_location" />
   </form>
  <?php else: ?>
   <?php echo $this->_smarty_vars['capture']['header_language_code']; ?>

  <?php endif; ?>
  </div>
 </div>