<?php
if(isset($edit)){
	$edit = 'default-tab';
	$listing='';
}else{
	$listing = 'default-tab';
	$edit='';
}

$me = 'portfolio_items';
?>
	<div id="main-content"> <!-- Main Content Section with everything -->
			<!-- Page Head -->			
			<div class="clear"></div> <!-- End .clear -->
			<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Portfolio</h3>				
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
								<?php 
								echo list_head('admin_'.$me,'Item Name','','Default Image','','Images');
								?>
							</thead>
						 
							<tbody>
								<?php
								if(is_array($list)) {
									foreach ($list as $key=>$val)
									{
										$image = '---';
										if($val['image'] != '')
											$image = '<a href="'.base_url().'images/'.$val['image'].'" rel="facebox" title="Prev">' . $val['image_title'] .'</a>';
										echo list_item($val['status'],$key,'admin_'.$me,$val['name'],$image,'<a href="'.base_url().'admin_images/index/'.$key.'">Images</a>');
									}
								}
								?>							
							</tbody>
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
								echo form_input(true,'Nombre EN','name_en',set_value('name_en',$values['name_en']));
								echo form_input(true,'Nombre ES','name_es',set_value('name_es',$values['name_es']));
								echo form_textarea(true,'Descripcion EN','description_en',set_value('description_en',$values['description_en']));
								echo form_textarea(true,'Descripcion ES','description_es',set_value('description_es',$values['description_es']));
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