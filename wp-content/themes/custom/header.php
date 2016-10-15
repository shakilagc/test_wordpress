<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang='en'>
    <head>
        <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/reset.css" type="text/css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    </head>
    <body class="home blog logged-in admin-bar lsx header-inline gecko linux customize-support has-sidebar">
        <div id="top-bar-tile" class="banner navbar navbar-default">
            <header role="banner" class="banner navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <div class="site-branding">
                            <h1 class="site-title"><a rel="home" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a></h1>
                        </div>      
                    </div>
                    <nav role="navigation" class="primary-navbar navbar-collapse in" style="height: auto;">
                        <?php wp_nav_menu (); ?>
                    </nav>
                </div>
            </header>
            <div id="wrapper">
                <div id="content">