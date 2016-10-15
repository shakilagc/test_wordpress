<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!--[if lt IE 9]>
<script>
document.createElement('header');
document.createElement('nav');
document.createElement('section');
document.createElement('article');
document.createElement('aside');
document.createElement('footer');
document.createElement('hgroup');
</script>
<![endif]-->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!--=================================== Mobile Specific Meta	===================================-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<!-- Favicons ==================================================
================================================== -->
<?php if(get_theme_mod('anariel_favicon')) : ?>
<link rel="shortcut icon" href="<?php echo get_theme_mod( 'anariel_favicon' ); ?>">
<?php endif; ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Menu and Header Image ==================================================
================================================== -->
<div class="toppart">
	<div class="container header">
		<header id="toppart">
			<nav id="mainnav" class="clearfix">
				<h3 class="menu-toggle">
					<?php _e( 'Menu', 'tuned-balloon' ); ?>
				</h3>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav>
			<!-- end mainnav -->

			<?php if ( get_theme_mod( 'anariel_logo' ) ) : ?>
			<div class="site-logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'anariel_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a> </div>
			<?php else : ?>
			<div id="site-title">
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
					</a></h1>
				<h2 id="site-description">
					<?php bloginfo( 'description' ); ?>
				</h2>
			</div>
			<?php endif; ?>
		</header>
		<!-- end header -->
	</div>
	<!-- end container -->
</div>
<div class="lines"> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> </div>
<?php $header_image = get_header_image();
if ( ! empty( $header_image ) ) { ?>
<img class="headerimage" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
<?php } ?>
<div class="clear"></div>