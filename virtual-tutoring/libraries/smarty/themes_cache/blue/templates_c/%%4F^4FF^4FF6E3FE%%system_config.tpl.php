<?php /* Smarty version 2.6.26, created on 2012-05-16 00:35:11
         compiled from includes/system_config.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printForm', 'includes/system_config.tpl', 4, false),array('function', 'eF_template_printBlock', 'includes/system_config.tpl', 17, false),)), $this); ?>
<?php ob_start(); ?>
 <?php if (! $_GET['op'] || $_GET['op'] == 'general'): ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_GENERAL_SECURITY_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['general_security'] = ob_get_contents(); ob_end_clean(); ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_GENERAL_LOCALE_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['general_locale'] = ob_get_contents(); ob_end_clean(); ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_GENERAL_SMTP_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['general_smtp'] = ob_get_contents(); ob_end_clean(); ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_GENERAL_PHP_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['external_php'] = ob_get_contents(); ob_end_clean(); ?>

  <div class="tabber">
   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'main','title' => @_GENERALSETTINGS,'data' => $this->_smarty_vars['capture']['general_main'],'image' => '32x32/settings.png','help' => 'System_settings#General_settings'), $this);?>

   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'security','title' => @_SECURITYSETTINGS,'data' => $this->_smarty_vars['capture']['general_security'],'image' => '32x32/generic.png','help' => 'System_settings#Security_settings'), $this);?>

   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'locale','title' => @_LOCALE,'data' => $this->_smarty_vars['capture']['general_locale'],'image' => '32x32/languages.png','help' => 'System_settings#Locale_settings'), $this);?>

   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'smtp','title' => @_EMAILSETTINGS,'data' => $this->_smarty_vars['capture']['general_smtp'],'image' => '32x32/mail.png','help' => 'System_settings#E-mail_settings'), $this);?>

   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'php','title' => @_CONFIGURATION,'data' => $this->_smarty_vars['capture']['external_php'],'image' => '32x32/php.png','help' => 'System_settings#PHP'), $this);?>

  </div>

 <?php elseif ($_GET['op'] == 'user'): ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_USER_MAIN_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['user_main'] = ob_get_contents(); ob_end_clean(); ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_USER_MULTIPLE_LOGINS_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['user_multiple_logins'] = ob_get_contents(); ob_end_clean(); ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_USER_WEBSERVER_AUTHENTICATION_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['user_webserver_authentication'] = ob_get_contents(); ob_end_clean(); ?>

  <div class="tabber">
   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'main','title' => @_USERACTIVATIONSETTINGS,'data' => $this->_smarty_vars['capture']['user_main'],'image' => '32x32/user.png','help' => 'System_settings#User_activation.2Fregistration'), $this);?>

   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'multiple_logins','title' => @_MULTIPLELOGINS,'data' => $this->_smarty_vars['capture']['user_multiple_logins'],'image' => '32x32/users.png','help' => 'System_settings#Multiple_logins'), $this);?>

   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'webserver_authentication','title' => @_WEBSERVERAUTHENTICATION,'data' => $this->_smarty_vars['capture']['user_webserver_authentication'],'image' => '32x32/generic.png','help' => 'System_settings#Web_server_authentication'), $this);?>

  </div>
 <?php elseif ($_GET['op'] == 'appearance'): ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_APPEARANCE_MAIN_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['appearance_main'] = ob_get_contents(); ob_end_clean(); ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_APPEARANCE_LOGO_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['appearance_logo'] = ob_get_contents(); ob_end_clean(); ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_APPEARANCE_FAVICON_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['appearance_favicon'] = ob_get_contents(); ob_end_clean(); ?>

  <div class="tabber">
   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'main','title' => @_APPEARANCE,'data' => $this->_smarty_vars['capture']['appearance_main'],'image' => '32x32/layout.png','help' => 'System_settings#Appearance_2'), $this);?>

   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'logo','title' => @_LOGO,'data' => $this->_smarty_vars['capture']['appearance_logo'],'image' => '32x32/themes.png','help' => 'System_settings#Logo'), $this);?>

   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'favicon','title' => @_FAVICON,'data' => $this->_smarty_vars['capture']['appearance_favicon'],'image' => '32x32/themes.png','help' => 'System_settings#Favicon'), $this);?>

  </div>
 <?php elseif ($_GET['op'] == 'external'): ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_EXTERNAL_MAIN_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['external_main'] = ob_get_contents(); ob_end_clean(); ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_EXTERNAL_MATH_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['external_math'] = ob_get_contents(); ob_end_clean(); ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_EXTERNAL_LIVEDOCX_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['external_livedocx'] = ob_get_contents(); ob_end_clean(); ?>
  <div class="tabber">
   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'options','title' => @_EXTERNALTOOLS,'data' => $this->_smarty_vars['capture']['external_main'],'image' => '32x32/generic.png','help' => 'System_settings#External_tools_2'), $this);?>

   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'math','title' => @_MATHSETTINGS,'data' => $this->_smarty_vars['capture']['external_math'],'image' => '32x32/generic.png','help' => 'System_settings#Math_Settings'), $this);?>

   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'livedocx','title' => @_PHPLIVEDOCX,'data' => $this->_smarty_vars['capture']['external_livedocx'],'image' => '32x32/generic.png','help' => 'System_settings#PHP_Livedocx'), $this);?>

   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'ldap','title' => @_LDAP,'data' => $this->_smarty_vars['capture']['external_ldap'],'image' => '32x32/generic.png','help' => 'System_settings#LDAP'), $this);?>

  </div>
 <?php elseif ($_GET['op'] == 'customization'): ?>
  <?php ob_start(); ?>
   <?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_CUSTOMIZATION_DISABLE_FORM']), $this);?>

  <?php $this->_smarty_vars['capture']['customization_disable'] = ob_get_contents(); ob_end_clean(); ?>
  <div class="tabber">
   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'disable','title' => @_SYSTEMOPTIONS,'data' => $this->_smarty_vars['capture']['customization_disable'],'image' => '32x32/generic.png','help' => 'System_settings#Disable_options'), $this);?>

   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'social','title' => @_SOCIALOPTIONS,'data' => $this->_smarty_vars['capture']['customization_social'],'image' => '32x32/social.png','help' => 'System_settings#Social_options'), $this);?>

   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'enterprise','title' => @_ENTERPRISEOPTIONS,'data' => $this->_smarty_vars['capture']['customization_enterprise'],'image' => '32x32/enterprise.png','help' => 'System_settings#Enterprise_options'), $this);?>

  </div>
 <?php endif; ?>
<?php $this->_smarty_vars['capture']['view_config'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start(); ?>
 <tr><td class="moduleCell">
  <?php echo smarty_function_eF_template_printBlock(array('title' => @_CONFIGURATIONVARIABLES,'data' => $this->_smarty_vars['capture']['view_config'],'image' => '32x32/tools.png','help' => 'System_settings','main_options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'options' => $this->_tpl_vars['T_THEMES_LINK']), $this);?>

    </td></tr>
<?php $this->_smarty_vars['capture']['moduleConfig'] = ob_get_contents(); ob_end_clean(); ?>