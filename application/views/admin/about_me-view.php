<?php
if(isset($edit)){
	$edit = 'default-tab';
	$listing='';
}else{
	$listing = 'default-tab';
	$edit='';
}

$me = 'about_me';
?>
	<div id="main-content"> <!-- Main Content Section with everything -->
			<!-- Page Head -->			
			<div class="clear"></div> <!-- End .clear -->
			<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Curriculum</h3>				
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
									<th width="60">Activo</th>
									<th width="60">Acci&oacute;n</th>
								</tr>
							</thead>
						 
							<tbody>
								<form action="<?=base_url()?>admin_<?=$me?>/activate" method="post" >
								<fieldset> 
								<?php
								if(is_array($list)) 
								{
									foreach ($list as $key=>$val)
									{
										$checked = '';
										$delete = '<a id="delete'.$key.'" class="delete" title="Delete" href="#/admin_about_me/del/'.$key.'"><img alt="Delete" src="'.file_url().'design/icons/cross.png"></a>';
										if($val['status'] == 1)
										{
											$checked = 'checked="checked"';
											$delete = '';
										}
											
										echo '<tr>
												<td>'.$val['title_es'].'</td>
												<td><input type="radio" value="'.$key.'" name="status" '.$checked.'></td>
												<td>
													<a id="edit'.$key.'" class="edit" title="Edit" href="'.file_url().'admin_about_me/edit/'.$key.'"><img alt="Edit" src="'.file_url().'design/icons/pencil.png"></a>
													'.$delete.'
												</td>
											</tr>';
									}
									echo '<tr><td colspan="3">'.form_hr().form_submit('submit','Seleccionar Entrada Activa').'</td></tr>';
								}
								?>		
								</fieldset>					
								</form>
							</tbody>
							<tfoot>
							</tfoot>
							
						</table>
						
					</div> <!-- End #tab1 -->
					<?php }else{?>
					<div class="tab-content <?=$edit?>" id="addedit">
						<script type="text/javascript" src="<?=base_url()?>../inc/ckeditor/ckeditor.js"></script>
						<form action="?" method="post"  enctype="multipart/form-data" >
							<?php 
							if(validation_errors())
								echo msg_error(validation_errors());
							?>
							<fieldset>
								<?php							
								echo form_input(true,'Titulo EN','title_en',set_value('title_en',$values['title_en']));
								echo form_input(true,'Titulo ES','title_es',set_value('title_es',$values['title_es']));
								echo form_textarea(true,'Texto EN','body_text_en',set_value('body_text_en',$values['body_text_en']), ' id="body_text_en" ');
								echo form_textarea(true,'Texto ES','body_text_es',set_value('body_text_es',$values['body_text_es']),' id ="body_text_es" ');
								echo form_hr();
								echo form_submit('submit','Guardar');
								?>								
							</fieldset>
							<script type="text/javascript">
							//<![CDATA[
							$(document).ready(function(){ 
								var body_text_en = CKEDITOR.replace( 'body_text_en');
								var body_text_es = CKEDITOR.replace( 'body_text_es');
							});
							//]]>
							</script>
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->  
					<?php }?>      
				</div> <!-- End .content-box-content -->
			</div> <!-- End .content-box -->			
			<div class="clear"></div>		