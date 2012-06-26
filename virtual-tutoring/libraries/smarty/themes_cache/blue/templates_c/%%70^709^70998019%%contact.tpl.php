<?php /* Smarty version 2.6.26, created on 2012-05-16 10:51:23
         compiled from includes/blocks/contact.tpl */ ?>
        <?php echo $this->_tpl_vars['T_CONTACT_FORM']['javascript']; ?>

        <form <?php echo $this->_tpl_vars['T_CONTACT_FORM']['attributes']; ?>
>
            <?php echo $this->_tpl_vars['T_CONTACT_FORM']['hidden']; ?>

    		<div class = "formRow">
        		<div class = "formLabel">			
                    <div class = "header"><?php echo $this->_tpl_vars['T_CONTACT_FORM']['email']['label']; ?>
</div>
                                	</div>
        		<div class = "formElement">
                	<div class = "field"><?php echo $this->_tpl_vars['T_CONTACT_FORM']['email']['html']; ?>
</div>
            		<?php if ($this->_tpl_vars['T_CONTACT_FORM']['email']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_CONTACT_FORM']['email']['error']; ?>
</div><?php endif; ?>
        	    </div>
        	</div>
    		<div class = "formRow">
        		<div class = "formLabel">			
                    <div class = "header"><?php echo $this->_tpl_vars['T_CONTACT_FORM']['message_subject']['label']; ?>
</div>
                                	</div>
        		<div class = "formElement">
                	<div class = "field"><?php echo $this->_tpl_vars['T_CONTACT_FORM']['message_subject']['html']; ?>
</div>
            		<?php if ($this->_tpl_vars['T_CONTACT_FORM']['message_subject']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_CONTACT_FORM']['message_subject']['error']; ?>
</div><?php endif; ?>
        	    </div>
        	</div>
    		<div class = "formRow">
        		<div class = "formLabel">			
                    <div class = "header"><?php echo $this->_tpl_vars['T_CONTACT_FORM']['message_body']['label']; ?>
</div>
                                	</div>
        		<div class = "formElement">
                	<div class = "field"><?php echo $this->_tpl_vars['T_CONTACT_FORM']['message_body']['html']; ?>
</div>
            		<?php if ($this->_tpl_vars['T_CONTACT_FORM']['message_body']['error']): ?><div class = "error"><?php echo $this->_tpl_vars['T_CONTACT_FORM']['message_body']['error']; ?>
</div><?php endif; ?>
        	    </div>
        	</div>
    		<div class = "formRow">	    
            	<div class = "formLabel">			
                    <div class = "header">&nbsp;</div>
                                	</div>
        		<div class = "formElement">
                	<div class = "field"><?php echo $this->_tpl_vars['T_CONTACT_FORM']['submit_contact']['html']; ?>
</div>
        	    </div>      		
        	</div>		
        </form>