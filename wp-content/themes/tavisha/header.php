<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 ie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8 ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9 ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="main-wrapper">
    
  <header class="header-section container">
    <div class="row">
      <div class="column col8 logo-wrapper">
        <h1 class="logo" role="banner">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        </h1>
        <?php
        $description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<div class="site-description"><?php echo $description; ?></div>
				<?php endif;?>
          
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <a href="#mobile-menu-target" class="btn-nav">
          <span></span>
          <span></span>
          <span></span>
        </a>
        <?php endif;?>

        <a href="#" class="search-button"><i class="fa fa-search"></i></a>
      </div><!-- .logo-wrapper -->


      <div class="column col4 search-wrapper">
        <?php get_search_form(); ?>
      </div><!-- .search-wrapper -->
    </div>
  </header>
  <!-- .header-section -->
  

  <div class="section main-section container">
    <div class="row">