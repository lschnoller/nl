<html>
	<head>
		
	</head>
	<body>
		<div>
			<p>	
			<?php 
				if(is_array($list))
				{
					foreach ($list as $key => $val)
					{
						echo '<a rel="group'.$id.'" href="'.base_url().'../images/'.$val['image'].'" title="<h1>'.$val['title'].'</h1><p>'.$val['desci'].'</p>"><img class="img-thumb" alt="'.$val['title'].'" src="'.base_url().'../images/'.$val['image'].'" /></a>';
					}
				}
			
			?>
		</p>
	</div>
	<script type="text/javascript">
				jQuery(document).ready(function(){
					$("a[rel=group<?=$id?>]").fancybox({
						'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'titlePosition' 	: 'over',
						'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
							return '<span id="fancybox-title-over"> ' + title + '</span>';
						}
					});
				});
		</script> 
	</body>
</html>