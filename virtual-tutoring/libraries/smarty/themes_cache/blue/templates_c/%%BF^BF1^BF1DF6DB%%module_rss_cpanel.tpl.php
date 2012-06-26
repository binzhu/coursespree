<?php /* Smarty version 2.6.26, created on 2012-05-15 11:53:30
         compiled from /home/content/87/9232987/html/virtual-tutoring/www/modules/module_rss/module_rss_cpanel.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_rss/module_rss_cpanel.tpl', 26, false),array('modifier', 'cat', '/home/content/87/9232987/html/virtual-tutoring/www/modules/module_rss/module_rss_cpanel.tpl', 26, false),)), $this); ?>
<?php if ($this->_tpl_vars['T_RSS_NUM_FEEDS'] > 0): ?>
    <?php ob_start(); ?>
<?php echo '<table style = "width:100%;"><tr><td style = "vertical-align:top;"><ul id = "rss_list" style = "padding-left:0px;margin-left:0px;list-style-type:none;"></ul></td></tr></table><div id = "loading_rss" style = "background-color:#F8F8F8;"><div tyle = "top:50%;left:45%;position:absolute"><img src = "'; ?><?php echo $this->_tpl_vars['T_RSS_MODULE_BASELINK']; ?><?php echo 'images/progress_big.gif" style = "vertical-align:middle"></div></div><script>var rssmodulebaseurl = \''; ?><?php echo $this->_tpl_vars['T_RSS_MODULE_BASEURL']; ?><?php echo '\';var rssmodulebaselink = \''; ?><?php echo $this->_tpl_vars['T_RSS_MODULE_BASELINK']; ?><?php echo '\';</script>'; ?>

    <?php $this->_smarty_vars['capture']['t_rss_code'] = ob_get_contents(); ob_end_clean(); ?>

    <?php echo smarty_function_eF_template_printBlock(array('title' => @_RSS_RSS,'data' => $this->_smarty_vars['capture']['t_rss_code'],'image' => ((is_array($_tmp=$this->_tpl_vars['T_RSS_MODULE_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'images/rss32.png') : smarty_modifier_cat($_tmp, 'images/rss32.png')),'absoluteImagePath' => 1,'options' => $this->_tpl_vars['T_RSS_OPTIONS'],'link' => $this->_tpl_vars['T_RSS_MODULE_BASEURL']), $this);?>

<?php endif; ?>