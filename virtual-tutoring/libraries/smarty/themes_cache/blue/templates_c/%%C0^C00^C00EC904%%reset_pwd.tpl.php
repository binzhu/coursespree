<?php /* Smarty version 2.6.26, created on 2012-05-17 14:18:49
         compiled from includes/blocks/reset_pwd.tpl */ ?>
        <?php echo $this->_tpl_vars['T_RESET_PASSWORD_FORM']['javascript']; ?>

        <form <?php echo $this->_tpl_vars['T_RESET_PASSWORD_FORM']['attributes']; ?>
>
            <?php echo $this->_tpl_vars['T_RESET_PASSWORD_FORM']['hidden']; ?>

    		<div class = "formRow">
        		<div class = "formLabel">			
                    <div class = "header"><?php echo $this->_tpl_vars['T_RESET_PASSWORD_FORM']['login_or_pwd']['label']; ?>
</div>
                                	</div>
        		<div class = "formElement">
                	<div class = "field"><?php echo $this->_tpl_vars['T_RESET_PASSWORD_FORM']['login_or_pwd']['html']; ?>
</div>
            		<?php if ($this->_tpl_vars['T_RESET_PASSWORD_FORM']['login_or_pwd']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_RESET_PASSWORD_FORM']['login_or_pwd']['error']; ?>
</div><?php endif; ?>
        	    </div>
        	</div>
    		<div class = "formRow">	    
            	<div class = "formLabel">			
                    <div class = "header">&nbsp;</div>
                    <div class = "explanation"></div>
            	</div>
        		<div class = "formElement">
                	<div class = "field"><?php echo $this->_tpl_vars['T_RESET_PASSWORD_FORM']['submit_reset_password']['html']; ?>
</div>
        	    </div>      		
        	</div>		
    	</form>