
<style>
<!--
.about{
	width: 60%;
	margin: auto;
}
.about p{
	color: #fff;
}
.label {
	color:#630103;
	padding-right:.5em;
	font:13px "Lucida Sans", "Lucida Grande", Verdana, Arial, sans-serif;
}
td {
	padding-bottom:5px;
}
.submit {
	cursor:pointer;
	border:none;
	font-size:18px;
    padding: 0.1em;
    width: inherit;
	 border:1px solid #000;
	 -moz-border-radius:5px;
	 -webkit-border-radius:5px;
	 border-radius:5px;
	color:#630103;
}
.submit:hover {
	background-color:#630103;
	color:#fff;
}

.error{
	margin-bottom: 2em;
}
.error p{
	color: red;
}
td.second-line {
	 /*border-left:1px solid #fff; */
	 padding-left:.5em;
}
input {
	border:1px solid #777;
	font:30px Arial, Helvetica, sans-serif;
	color:#000;
}
textarea {
	font:20px Arial, Helvetica, sans-serif;
}
.label {
	font:20px Arial, Helvetica, sans-serif;
}
input, textarea {
	width:500px;
	padding:2px 5px;
	font-size:16px;
}
-->
</style>
	<div id="bd" style="margin-left:1em;"> 
 
		<!-- Preset Templates control the width and alignment of the two blocks (div.yui-b). --> 
		<!-- The wide column is wrapped in div#yui-main --> 
		<div id="yui-main"> 
			<div class="yui-b"> 
				
            <div class="content">            
		        <!--<h1 class="categoryTitle">Contacto</h1>-->
		        <?php 
		        	if(validation_errors())
		        		echo '<div class="error">'.validation_errors().'</div	>';
		        ?>
		        
              
		        	<?php 
		        	if($send)
		        	{
		        		if($this->pcfunc->lang_key == 'es')
		        			echo '<p style="font:30px Arial, Helvetica, sans-serif; margin-bottom:2em;">El mensaje ha sido enviado. <br />Gracias por comunicarte con nosotros.</p>';
		        		else
		        			echo '<p style="font:30px Arial, Helvetica, sans-serif; margin-bottom:2em;">The message has been delivered. <br />Thank you for contacting us.</p>';
		        	}
		        	else
		        	{
					
		        	?>
			        	<form action="?" method="post">
						<fieldset>
						
						<table>
		                  <tr>
		                  	<td><span class="label"><label for="name"><?=$this->lang->line('name');?>:</label></span></td><td class="second-line"><input name="yourname" class="text_input empty" type="text" id="name" size="20" value="<?php echo set_value('yourname'); ?>" />*</td>
		                  </tr>
		                  <tr>
		                 	 <td><span class="label"><label for="email"><?=$this->lang->line('email');?>:</label></span></td><td class="second-line"><input name="email" class="text_input email" type="text" id="email" size="20" value="<?php echo set_value('email'); ?>" />*</td>
		                  </tr>
		                  <tr>
		                 	 <td><span class="label"><label for="subject"><?=$this->lang->line('subject');?>:</label></span></td><td class="second-line"><input name="subject" class="text_input" type="text" id="subject" size="20" value="<?php echo set_value('subject'); ?>" />*</td>
		                  </tr>
		                  <tr>
		                  	<td>&nbsp;</td><td class="second-line">&nbsp;</td>
		                  </tr>
		                  <tr>
		                  	<td valign="top"><span class="label"><label for="message" class="blocklabel"><?=$this->lang->line('message');?>:</label></span></td><td class="second-line"><textarea name="message" class="text_area empty" cols="40" rows="7" id="message" ><?php echo set_value('message'); ?></textarea></td>
		                  </tr>
		                  <tr>
		                  	<td>&nbsp;</td><td class="second-line">&nbsp;</td>
		                  </tr>
		                  <tr>                  
		                  	<td>&nbsp;</td>
		                  	<td align="right"><input name="Send" type="submit" value="<?=$this->lang->line('send');?>" class="submit" id="send" /></td>
		                  </tr>
		                </table>
			
						</fieldset>
						
						</form>
					<?php }?>
            <p style="padding-top:.5em; width: 50%; border-top: 1px solid rgb(34, 34, 34); margin-top: 1em;"><?=$this->lang->line('contact_info');?>:</p>   
		    <p><?=$this->lang->line('phone');?>: ++34 676 164 595</p>
            <p><?=$this->lang->line('cell');?>: ++34 690 657 974</p>
            <p><?=$this->lang->line('email');?>: <a href="mailto:info@noralatorre.com, lschnoller@yahoo.com">info@noralatorre.com</a> </p> 
             </div>
            
            
			</div> 
		</div> 
 
		<!-- the unwrapped div.yui-b takes a fixed width and alignment based on the class of the top-level containing node --> 
		<div class="yui-b" style="">
      	
         
         
     </div> 
		
	</div> 