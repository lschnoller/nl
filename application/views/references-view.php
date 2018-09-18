      <div id="bd"> 
		<!-- Preset Templates control the width and alignment of the two blocks (div.yui-b). --> 
		<!-- The wide column is wrapped in div#yui-main --> 
		<div id="yui-main"> 
			<div class="yui-b">
				</div>
            	<div id="projects">               	
            		<?php 
            		if(is_array($list))
            		{
            			foreach ($list as $key => $val) 
            			{            		
            				if($val['ref_url'] != '')
            					$url = '<p><a href="'.$val['ref_url'].'" target="_blank">'.$val['ref_url'].'</a></p>';		
            				echo '<div class="portfolio-item ref-item">
									<h2>'.$val['title'].'</h2>
									<p>'.$val['desci'].'</p>
									'.$url.'
								</div>
								';
								
            			}
            		}
            		?>
				</div>
			</div> 
		</div> 

	</div>