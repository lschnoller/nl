<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>Entrar</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="<?php echo base_url();?>../css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?php echo base_url();?>../css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url();?>../css/blue.css" type="text/css" media="screen" />
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="<?php echo base_url();?>../css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		
		
		<link rel="stylesheet" href="<?php echo base_url();?>../css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="<?php echo base_url();?>../css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
	  
		<!-- jQuery -->
		<script type="text/javascript" src="<?php echo base_url();?>../js/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="<?php echo base_url();?>../js/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="<?php echo base_url();?>../js/facebox.js"></script>
		
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
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1 style="top:inherit; position:static">ADMINISTRADOR - Nora Latorre</h1>
				<!-- Logo (221px width) -->
				<!--<img id="logo" src="<?php echo base_url();?>../design/logo.png" alt="Admin" />-->
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<?php 
					echo form_open(base_url().'login/validate_credentials');
				?>
				
					<div class="notification information png_bg">
						<div>
							Ingresar usuario y contrase&ntilde;a y luego hacer click en "Entrar".
						</div>
					</div>
					<?php 
					if(isset($wrongpass))
					{
					?>
					<div class="notification information png_bg">
						<div style="color: red;">
							Usuario o contrase&ntilde;a incorrecta.
						</div>
					</div>
					<?php 
					}
					?>
					<p>
						<label>Nombre de Usuario</label>
						<input class="text-input" type="text" name="username"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Contrase&ntilde;a</label>
						<input class="text-input" type="password" name="password"/>
					</p>
					
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Entrar" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  
</html>

