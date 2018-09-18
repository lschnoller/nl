<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="background:url(<?=base_url();?>../design/fondo2.jpg) #b9b496">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" /> 
<meta name="keywords" content="" /> 
<title><?=$title?></title>

<link type="text/css"  rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/yui/2.8.0r4/build/reset-fonts-grids/reset-fonts-grids.css" />
<link type="text/css"  rel="stylesheet" href="<?=base_url();?>../css/frontend.css" />
<link type="text/css"  rel="stylesheet" href="<?=base_url();?>../css/jquery-ui-1.8.9.custom.css" />
<script type="text/javascript" src="<?=base_url();?>../js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>../js/jquery-ui-1.8.9.custom.min.js"></script>

<script type="text/javascript" src="<?=base_url();?>../js/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?=base_url();?>../js/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>../css/jquery.fancybox-1.3.4.css" media="screen" />
	
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27149262-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</head>
<body>
<div id="doc2">					
	<div id="hd"> 
   	<div style="height:147px;">
   	<div id="logo">
		  
         <h1 class="main-title"><img src="<?=base_url();?>../design/logo-big-trans-high.png" title="NORA LATORRE" width="380" style="margin-top:.3em" /></h1>
         <h2 class="main-subtitle">John Brookes School of Garden Design</h2>
         <div style="border-bottom: 1px solid rgb(127, 1, 4); position: relative; right: 238px; top: -39px; width: 100%; margin-bottom:-1em;">&nbsp;</div>
         	<div style="position:relative; width:100px; float:right">
          <div class="nav2" style="text-align:right">
               <!--<div style="float:left; width:330px; margin-bottom:.7em">&nbsp;</div><div style="color:#fff; margin-right:5em">CATEGORIAS</div>-->
               <ul>
						<?php 
                  if(!isset($current))
                  	$current = 'home';
                  $otherLangURL = current_url();
                  $otherLangURL = str_replace('/index.php/'.$this->lang->line('current-lang-sort'), '/'.$this->lang->line('other-lang-sort'), $otherLangURL);
                  ?>
                  <li><a href="<?=base_url()?>portfolio" <?=($current == 'portfolio') ? 'class="selected"' : '';?>><?=$this->lang->line('portfolio');?></a></li>
                  <li><a href="<?=base_url()?>about_me" <?=($current == 'about_me') ? 'class="selected"' : '';?>><?=$this->lang->line('about_me');?></a></li>
                  <li><a href="<?=base_url()?>contact" <?=($current == 'contact') ? 'class="selected"' : '';?>><?=$this->lang->line('contact');?></a></li>
                  <li><a href="<?=base_url()?>references" <?=($current == 'references') ? 'class="selected"' : '';?>><?=$this->lang->line('references');?></a></li>	  
               </ul>
               <div style="text-align: right;"><a class="lang" href="<?=$otherLangURL;?>"><?=$this->lang->line('other-lang');?></a></div>
            </div><!-- nav2 --></div>
         
       </div><!-- logo -->
       
      </div><!-- margin -->
	</div><!-- hd -->