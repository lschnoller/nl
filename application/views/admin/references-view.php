<?php
if(isset($edit)){
	$edit = 'default-tab';
	$listing='';
}else{
	$listing = 'default-tab';
	$edit='';
}

$me = 'references';
?>
	<div id="main-content"> <!-- Main Content Section with everything -->
			<!-- Page Head -->			
			<div class="clear"></div> <!-- End .clear -->
			<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Enlaces</h3>				
					<ul class="content-box-tabs">
						<li><a href="<?php echo base_url()?>admin_<?=$me?>" id="listing-tab" class="<?=$listing?>">Listar</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="<?php echo base_url()?>admin_<?=$me?>/edit/0" id="addedit-tab" class="<?=$edit?>">Agregar Nuevo</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					<?php if($listing == 'default-tab') {?>
					<div class="tab-content <?=$listing?>" id="listing"> <!-- This is the target div. id must match the href of this div's tab -->	
						<?php if(isset($message)) echo $message;?>
						<table>
							<thead>
								<tr>
									<th>Titulo</th>
									<th width="60">Acci&oacute;n</th>
								</tr>
							</thead>
						 
							<tbody>
								<?php
								if(is_array($list)) {
									foreach ($list as $key=>$val)
									{
										
										echo list_item($val['status'],$key,'admin_'.$me,$val['title']);
									}
								}
								?>
							</tbody>
							<tfoot>
							</tfoot>
							
						</table>
						
					</div> <!-- End #tab1 -->
					<?php }else{?>
					<div class="tab-content <?=$edit?>" id="addedit">
						<form action="?" method="post"  enctype="multipart/form-data" >
							<?php 
							if(validation_errors())
								echo msg_error(validation_errors());
							?>
							<fieldset>
								<?php							
								echo form_input(true,'Titulo','title',set_value('title',$values['title']));
								echo form_input(false,'Ref URL','ref_url',set_value('ref_url',$values['ref_url']));
								echo form_textarea(false,'Texto EN','desci_en',set_value('desci_en',$values['desci_en']), ' id="body_text_en" ');
								echo form_textarea(false,'Texto ES','desci_es',set_value('desci_es',$values['desci_es']),' id ="body_text_es" ');
								echo form_hr();
								echo form_submit('submit','Guardar');
								?>								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->  
					<?php }?>      
				</div> <!-- End .content-box-content -->
			</div> <!-- End .content-box -->			
			<div class="clear"></div>		