<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>NORA LATORRE Admin</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="<?php echo base_url();?>../css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?php echo base_url();?>../css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url();?>../css/layout.css" type="text/css" media="screen" />
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
			
		<link rel="stylesheet" href="<?php echo base_url();?>../css/blue.css" type="text/css" media="screen" />
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="<?php echo base_url();?>../css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="<?php echo base_url();?>../css/red.css" type="text/css" media="screen" />  
	 <link rel="stylesheet" href="<?php echo base_url();?>../css/invalid.css" type="text/css" media="screen" />
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="<?php echo base_url();?>../css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="<?php echo base_url();?>../js/jquery-1.3.2.min.js"></script>
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="<?php echo base_url();?>../js/facebox.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="<?php echo base_url();?>../js/simpla.jquery.configuration.js"></script>
		
		
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="<?php echo base_url();?>../js/jquery.wysiwyg.js"></script>
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="<?php echo base_url();?>../js/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title" style="position:static"><a href="#">NORA LATORRE <br />Admin</a></h1>
		  
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				<a href="<?=base_url()?>" target="_blank" title="View the Site">Ver el Sitio</a> | <a href="<?php echo base_url();?>login/logout" title="Sign Out">Salir</a>
			</div>        
			<?php
			if(!isset($current))
				$current = '';
			?>
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				
				<li> 
					<a href="<?=base_url()?>admin_portfolio_items" class="nav-top-item no-submenu <?=($current == 'portfolio_items') ? 'current' : '';?>">
					Portfolio
					</a>
				</li>
				<li> 
					<a href="<?=base_url()?>admin_about_me" class="nav-top-item no-submenu <?=($current == 'about_me') ? 'current' : '';?>"> 
					Curriculum
					</a>
				</li>
				<li> 
					<a href="<?=base_url()?>admin_references" class="nav-top-item no-submenu <?=($current == 'references') ? 'current' : '';?>"> 
					Enlaces
					</a>
				</li>
				      
				
			</ul> <!-- End #main-nav -->
			
			
			
		</div></div> <!-- End #sidebar -->