<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>



<meta name="alexaVerifyID" content="MX9ITGFupmT0Th2-p-hbTyOGSPk" />

<meta name="google-site-verification" content="m77J3jrUjF39b7psDutRVRvjYQoDlW5crgd8Tf8hYlM" />

<meta name="msvalidate.01" content="C8DA66BFD4D0DDEF713C1BDABDDD8190" />

<meta charset="<?php bloginfo('charset'); ?>">

<?php if(of_get_option('enable_responsive') == '1') { ?>
<!-- Mobile View -->
<meta name="viewport" content="width=device-width">
<?php } ?>

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
<link rel="Shortcut Icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-mobile.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/organic-shortcodes.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/pretty-photo.css">
<?php get_template_part( 'style', 'options' ); ?>

<!-- Icon Styles -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style-icons.css">

<!--[if lt IE 8]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome-ie7.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/organic-shortcodes-ie8.css">
<![endif]-->

<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<!-- Social Buttons -->
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>

<link href='http://fonts.googleapis.com/css?family=Antic+Didone';;
rel='stylesheet' type='text/css'>

<link rel="icon" href="<?php bloginfo('siteurl'); ?>/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php bloginfo('siteurl'); ?>/favicon.ico" type="image/x-icon" />


</head>

<body <?php body_class(); ?>>

<!-- BEGIN #wrap -->
<div id="wrap">
	
	<!-- BEGIN #header -->
	<div id="header">
	
		<!-- BEGIN .row -->
		<div class="row">
		
			<?php if (is_home() || is_front_page() ) { ?>
				<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?>
					<h1 id="custom-header"><a href="<?php echo get_option('home'); ?>/" title="Home"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" /><?php bloginfo( 'name' ); ?></a></h1>
				<?php } else { ?>
					<div id="masthead">
						<h1 class="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					</div>
				<?php } ?>
			<?php } else { ?>
				<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?>
					<p id="custom-header"><a href="<?php echo get_option('home'); ?>/" title="Home"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" /><?php bloginfo( 'name' ); ?></a></p>
				<?php } else { ?>
					<div id="masthead">
						<h4 class="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h4>
						<h5 class="site-description"><?php bloginfo( 'description' ); ?></h5>
					</div>
				<?php } ?>
			<?php } ?>
		
		<!-- END .row -->
		</div>
		
		<!-- BEGIN .row -->
		<div class="row">
		
			<div id="navigation">
				<?php if ( function_exists('ot_register_menu') ) {
					wp_nav_menu( array( 
						'theme_location' => 'header-menu', 
						'title_li' => '', 
						'depth' => 4, 
						'container_class' => 'menu' 
					)); 
				} ?>
			</div>
			
		<!-- END .row -->
		</div>
	
	<!-- END #header -->
	</div>