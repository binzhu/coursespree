<?php /* Smarty version 2.6.26, created on 2012-05-15 11:52:07
         compiled from includes/blocks/login.tpl */ ?>
    <?php echo $this->_tpl_vars['T_LOGIN_FORM']['javascript']; ?>

    <form <?php echo $this->_tpl_vars['T_LOGIN_FORM']['attributes']; ?>
>
     <?php echo $this->_tpl_vars['T_LOGIN_FORM']['hidden']; ?>

  <div class = "formRow">
      <div class = "formLabel">
                <div class = "header"><?php echo $this->_tpl_vars['T_LOGIN_FORM']['login']['label']; ?>
</div>
                         </div>
      <div class = "formElement">
             <div class = "field"><?php echo $this->_tpl_vars['T_LOGIN_FORM']['login']['html']; ?>
</div>
          <?php if ($this->_tpl_vars['T_LOGIN_FORM']['login']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_LOGIN_FORM']['login']['error']; ?>
</div><?php endif; ?>
         </div>
     </div>
  <div class = "formRow">
      <div class = "formLabel">
                <div class = "header"><?php echo $this->_tpl_vars['T_LOGIN_FORM']['password']['label']; ?>
</div>
                         </div>
      <div class = "formElement">
             <div class = "field"><?php echo $this->_tpl_vars['T_LOGIN_FORM']['password']['html']; ?>
</div>
          <?php if ($this->_tpl_vars['T_LOGIN_FORM']['password']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_LOGIN_FORM']['password']['error']; ?>
</div><?php endif; ?>
         </div>
     </div>
<?php if ($this->_tpl_vars['T_CONFIGURATION']['remember_login']): ?>
  <div class = "formRow">
      <div class = "formElement">
             <div class = "field"><?php echo $this->_tpl_vars['T_LOGIN_FORM']['remember']['html']; ?>
 <?php echo $this->_tpl_vars['T_LOGIN_FORM']['remember']['label']; ?>
</div>
          <?php if ($this->_tpl_vars['T_LOGIN_FORM']['remember']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_LOGIN_FORM']['remember']['error']; ?>
</div><?php endif; ?>
         </div>
     </div>
<?php endif; ?>
  <div class = "formRow">
         <div class = "formLabel">
                <div class = "header">&nbsp;</div>
                <div class = "explanation"></div>
         </div>
      <div class = "formElement">
             <div class = "field"><?php echo $this->_tpl_vars['T_LOGIN_FORM']['submit_login']['html']; ?>
</div>
             <?php if ($this->_tpl_vars['T_CONFIGURATION']['signup'] && ! $this->_tpl_vars['T_CONFIGURATION']['only_ldap']): ?><div class = "small note"><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=signup"><?php echo @_DONTHAVEACCOUNT; ?>
</a></div><?php endif; ?>
             <?php if ($this->_tpl_vars['T_CONFIGURATION']['password_reminder'] && ! $this->_tpl_vars['T_CONFIGURATION']['only_ldap']): ?><div class = "small note"><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=reset_pwd"><?php echo @_FORGOTPASSWORD; ?>
</a></div><?php endif; ?>
             <div class = "small note"><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=contact"><?php echo @_CONTACTUS; ?>
</a></div>
             <?php if ($this->_tpl_vars['T_CONFIGURATION']['lessons_directory'] == 1): ?><div class = "small note"><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lessons"><?php echo @_LESSONSLIST; ?>
</a></div><?php endif; ?>
         </div>

   <?php if ($this->_tpl_vars['T_OPEN_FACEBOOK_SESSION'] && ! $this->_tpl_vars['T_NO_FACEBOOK_LOGIN']): ?>

         <div class = "loginFacebookFormRow">
          <div class = "formLabel">
                 <div class = "facebookHeader"><?php echo @_LOGINWITHYOURFACEBOOKACCOUNT; ?>
</div>
          </div>
          <div class = "formElement">
          <div style="margin-left:9px;margin-top:3px"><fb:login-button onlogin="top.location='index.php';"></fb:login-button></div>
          </div>
         </div>
         <script type="text/javascript">
         FB.init("<?php echo $this->_tpl_vars['T_FACEBOOK_API_KEY']; ?>
", "facebook/xd_receiver.htm");
         </script>

            <?php endif; ?>


     </div>
     </form>