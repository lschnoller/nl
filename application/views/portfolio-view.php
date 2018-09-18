	<style type="text/css">
		#fancybox-title-over h1 {
			color:transparent;
		}
		 #fancybox-title-over p {	 	
			color:#fff;
			text-shadow: 0px 0px 3px #000;
			font-size:16px;
			background-image: url('http://www.noralatorre.com/design/fancybox/fancy_title_over.png');
			padding: 5px;
		}
   </style>
   
   <div id="bd"> 
		<!-- Preset Templates control the width and alignment of the two blocks (div.yui-b). --> 
		<!-- The wide column is wrapped in div#yui-main --> 
		<div id="yui-main"> 
			<div class="yui-b">
				<script type="text/javascript">
				
				/*jQuery(document).ready(function(){
					$('#projects .head').click(function() {
						$(this).next().toggle();
						if($(this).parent().hasClass('active'))
						{
							$(this).parent().removeClass('active');
						}
						else
						{
							$(this).parent().addClass('active');
						}
						var id = $(this).attr("id");
						$(this).next().load('< ?=base_ajax()?>default_page/get_single/'+id);
						return false;
					}).next().hide();
					$("#projects .portfolio-item").hover(
							  function () {
							    $(this).addClass('hover');
							  }, 
							  function () {
								  $(this).removeClass('hover');
							  }
							);
				});*/
				function loadImages(el) {
						$(el).prev().slideToggle('fast');
						if($(el).parent().hasClass('active')) {
							$(el).parent().removeClass('active');
							$(el).children('#close-images').hide();
							$(el).children('#open-images').show();
						}
						else {
							$(el).parent().addClass('active');
							$(el).children('#open-images').hide();
							$(el).children('#close-images').show();
						}
						
						var id = $(el).attr("id");
						$(el).prev().load('<?=base_ajax()?>default_page/get_single/'+id);
						
					//}).next().hide();
				}
				/*jQuery(document).ready(function(){	
					$("#projects .portfolio-item").hover(
						  function () {
						    $(this).addClass('hover');
						  }, 
						  function () {
							  $(this).removeClass('hover');
						  }
					);
				});*/
				</script> 
				
				</div>
            	<div id="projects">               	
            		<?php 
            		if(is_array($list))
            		{
            			foreach ($list as $key => $val) 
            			{            				
            				echo '<div class="portfolio-item">
									<div class="head">            						
											<img class="main-img" src="'.base_url().'../images/'.$val['image'].'" title="'.$val['image_title'].'" alt="'.$val['image_title'].'" width="160" height="123" style="vertical-align:bottom" />
										
											<h2>'.$val['name'].'</h2>
											<p>'.$val['desci'].'</p>
										
									</div>
									<div class="content">
										<img style="margin-left:1em" src="'.base_url().'../design/loading.gif" width="32" height="32" />										
									</div>
									<div align="center" style="clear:both; text-align:right; padding-right:1em; padding-bottom:.5em; cursor:pointer" id="'.$key.'" onclick="loadImages(this)">
										<span class="item-images-btn" id="open-images" style="display:inline">'.$this->lang->line("open_portfolio_images").'</span><span class="item-images-btn" id="close-images" style="display:none">'.$this->lang->line("close_portfolio_images").'</span> <img src="'.base_url().'../design/arbolito-small.png" width="32" height="43" style="cursor:pointer; vertical-align:sub" />
									</div>
								</div><!--portfolio-item-->
								';
								
            			}
            		}
            		?>
				</div>
			</div> 
		</div> 

	</div>