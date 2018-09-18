<?php
if(isset($edit)){
	$edit = 'default-tab';
	$listing='';
}else{
	$listing = 'default-tab';
	$edit='';
}

$me = 'images';
?>
	<div id="main-content"> <!-- Main Content Section with everything -->
			<!-- Page Head -->			
			<div class="clear"></div> <!-- End .clear -->
			<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Imagenes</h3>				
					<ul class="content-box-tabs">
						<li><a href="<?php echo base_url()?>admin_<?=$me?>/index/<?=$id?>" id="listing-tab" class="<?=$listing?>">Listar</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="<?php echo base_url()?>admin_<?=$me?>/edit/<?=$id?>/0" id="addedit-tab" class="<?=$edit?>">Agregar Nuevo</a></li>
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
									<th width="60">Imagen Predeterminada</th>
									<th width="60">Acci&oacute;n</th>
								</tr>
							</thead>
						 	<form action="<?=base_url()?>admin_images/index/<?=$id?>" method="post" >
							<fieldset>
							<tbody>
								<?php
								if(is_array($list)) {
									foreach ($list as $key=>$val)
									{
										$checked = '';
										$delete = '<a id="delete'.$key.'" class="delete" title="Borrar" href="#'.base_ajax().'admin_images/del/'.$key.'"><img alt="Borrar" src="'.file_url().'design/icons/cross.png"></a>';
										if($key == $mainImage)
										{
											$checked = 'checked="checked"';
											$delete = '';
										}
										echo '<tr>
												<td>'.$val['title_es'].'</td>
												<td><input type="radio" value="'.$key.'" name="main_image" '.$checked.'></td>
												<td>
													<a id="edit'.$key.'" class="edit" title="Editar" href="'.base_url().'admin_images/edit/'.$id.'/'.$key.'"><img alt="Editar" src="'.file_url().'design/icons/pencil.png"></a>
													<a id="status'.$key.'" class="status" title="Cambiar Estado" href="#'.base_ajax().'admin_images/status/'.$key.'/'.$val['status'].'"><img width="16" height="16" alt="Cambiar Estado" src="'.file_url().'design/icons/status_'.$val['status'].'.png" id="imgstatus'.$val['status'].'"></a>
													'.$delete.'
												</td>
											</tr>';
									}
									echo '<tr><td colspan="3">'.form_hr().form_submit('submit','Seleccionar Imagen Predeterminada').'</td></tr>';
								}
								?>							
							</tbody>
							</fieldset>
							</form>
						</table>
						
					</div> <!-- End #tab1 -->
					<?php }else{?>
					<div class="tab-content <?=$edit?>" id="addedit">
					
						<form action="?" method="post"  enctype="multipart/form-data" >
							<?php 
							if(validation_errors())
								echo msg_error(validation_errors().$uploadErrors);
							?>
							
							<fieldset>
								<?php
								echo form_input(true,'Titulo EN','title_en',set_value('title_en',$values['title_en']));
								echo form_input(true,'Titulo ES','title_es',set_value('title_es',$values['title_es']));
								echo form_textarea(true,'Descripcion EN','description_en',set_value('description_en',$values['description_en']));
								echo form_textarea(true,'Descripcion ES','description_es',set_value('description_es',$values['description_es']));
								
								echo form_upload(true,'Imagen','image_url','','','(800px X 800px) MAX',$values['image_url']);
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