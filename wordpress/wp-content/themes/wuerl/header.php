<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title>
			<?php if ( !is_front_page() ) { echo wp_title( ' ', true, 'left' ); echo ' | '; }
			echo bloginfo( 'name' ); echo ' - '; bloginfo( 'description', 'display' );  ?> 
		</title>
				
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- icons & favicons -->
		<!-- For iPhone 4 -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-114x114-precomposed.png">
		<!-- For iPad 1-->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-72x72-precomposed.png">
		<!-- For iPhone 3G, iPod Touch and Android -->
		<link rel="apple-touch-icon-precomposed"  sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-57x57-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-precomposed.png">
		<!-- For Nokia -->
		<link rel="shortcut icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
		<!-- For everything else -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
				
		<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<script type="text/javascript" src="//use.typekit.net/ybv4okk.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		
	</head>
	
	<body <?php body_class('slide'); ?>  data-spy="scroll" data-target=".navbar" data-offset="120">
				
		<header role="banner">
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container-fluid nav-container">
						<nav role="navigation">							
							<a id="menu-button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
							</a>
							<a class="visible-desktop brand" id="logo" title="#home" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
							<div class="nav-collapse collapse">
								<?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>
							</div>
							<a class="visible-desktop" href="tel:+18479913009">847 991 3009</a>
						</nav>
						
					</div>
				</div>
			</div>
		</header> <!-- end header -->
		
		<div class="container-fluid">
