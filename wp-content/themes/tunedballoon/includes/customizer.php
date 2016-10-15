<?php
/**
 * Adds the individual sections for custom logo
 */
 function anariel_theme_customizer( $wp_customize ) {
   $wp_customize->add_section( 'anariel_logo_section' , array(
    'title'       => __( 'Logo', 'anariel' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );
$wp_customize->add_setting( 'anariel_logo', array(
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'anariel_logo', array(
    'label'    => __( 'Logo', 'anariel' ),
    'section'  => 'anariel_logo_section',
    'settings' => 'anariel_logo',
) ) );
}
add_action('customize_register', 'anariel_theme_customizer');
/**
 * Adds the individual sections for custom favicon
 */
 function anariel_favicon_customizer( $wp_customize ) {
   $wp_customize->add_section( 'anariel_favicon_section' , array(
    'title'       => __( 'Favicon', 'anariel' ),
    'priority'    => 30,
    'description' => 'Upload a favicon',
) );
$wp_customize->add_setting(
	'anariel_favicon',
	array(
	'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'anariel_favicon', array(
    'label'    => __( 'Favicon', 'anariel' ),
    'section'  => 'anariel_favicon_section',
    'settings' => 'anariel_favicon',
) ) );
}
add_action('customize_register', 'anariel_favicon_customizer');
/**
 * Adds the individual sections for custom colors
 */
function anariel_register_theme_customizer( $wp_customize ) {
	$wp_customize->add_setting('content_link_color', array(
        'default'           => '#cc653b',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'content_link_color', array(
        'label'    => __('Change color of the beidge elements', 'anariel'),
        'section'  => 'colors',
		'priority' => 25,
        'settings' => 'content_link_color',
    )));

	$wp_customize->add_setting('content_linkone_color', array(
        'default'           => '#133332',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'content_linkone_color', array(
        'label'    => __('Change color of the dashed menu item border', 'anariel'),
        'section'  => 'colors',
		'priority' => 26,
        'settings' => 'content_linkone_color',
    )));

	$wp_customize->add_setting('content_linkthree_color', array(
        'default'           => '#d79855',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'content_linkthree_color', array(
        'label'    => __('Change color of the brown elements', 'anariel'),
        'section'  => 'colors',
		'priority' => 27,
        'settings' => 'content_linkthree_color',
    )));

	$wp_customize->add_setting('content_linkfour_color', array(
        'default'           => '#911e3d',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'content_linkfour_color', array(
        'label'    => __('Change color of the footer and submenu dashed line', 'anariel'),
        'section'  => 'colors',
		'priority' => 28,
        'settings' => 'content_linkfour_color',
    )));

	$wp_customize->add_setting('content_linkfive_color', array(
        'default'           => '#d99a8a',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'content_linkfive_color', array(
        'label'    => __('Change color of the footer and submenu dashed line', 'anariel'),
        'section'  => 'colors',
		'priority' => 29,
        'settings' => 'content_linkfive_color',
    )));

	$wp_customize->add_setting('content_linktwo_color', array(
        'default'           => '#110614',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'content_linktwo_color', array(
        'label'    => __('Change color of the footer and submenu dashed line', 'anariel'),
        'section'  => 'colors',
		'priority' => 30,
        'settings' => 'content_linktwo_color',
    )));
}
add_action( 'customize_register', 'anariel_register_theme_customizer' );

function anariel_customizer_css() {
    ?>
    <style type="text/css">
	span.color, .rpwe-summary a.more-link, .entry-content p a, .content .entry-details p a, span.comments a, form#commentform span.required, .content .entry-link a, .widget_recent_comments a, .entry-content p a, .content .format-audio h4, .content .wpcf7 p span.required, #wp-calendar caption, .aboutpage a, .aboutpage a:visited,p.copyright a { color:  <?php echo get_theme_mod( 'content_link_color' ); ?>; }
	#site-title, .content .format-quote, .content .post .author-info, #comments a.comment-reply-link, input#submit, input.wpcf7-submit, .searchsubmit, input[type="submit"], .content .format-aside a, .homewidgetbio, #toppart #mainnav ul li.current_page_item, #toppart #mainnav ul li.current-menu-item {background-color: <?php echo get_theme_mod( 'content_link_color' ); ?>; }
	.lines, .type1, #toppart #mainnav ul li a:hover, #toppart #mainnav ul ul a, .lines1, .lines1 .type2, .csstransforms .cn-wrapper li a:hover, .csstransforms .cn-wrapper li a:active, .csstransforms .cn-wrapper li a:focus, time.rpwe-time, .homewidgettour span.gigpress-sidebar-date, .soundItem.g-highlighted, .soundItem.g-highlighted:hover, .edd-submit.button.blue  {background:  <?php echo get_theme_mod( 'content_link_color' ); ?>;}
	.woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3, table.shop_table th, table.shop_table th, .woocommerce-message:before, .woocommerce-info:before {background:  <?php echo get_theme_mod( 'content_link_color' ); ?>!important;}
	.woocommerce-message, .woocommerce-info {border-top-color:  <?php echo get_theme_mod( 'content_link_color' ); ?>!important;}
	.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .woocommerce .star-rating {color:  <?php echo get_theme_mod( 'content_link_color' ); ?>!important;}
	::selection {background:  <?php echo get_theme_mod( 'content_link_color' ); ?>;}
    ::-moz-selection {background:  <?php echo get_theme_mod( 'content_link_color' ); ?>;}

	.type4, .homewidgetnews h3.widget-title, .homewidgettour h3.widget-title, .entry-header p, .content .entry-details p, .format-image .entry-header p, .content .format-aside h3 {background:  <?php echo get_theme_mod( 'content_linkone_color' ); ?>;}
	.woocommerce-result-count, .woocommerce-result-count {background:  <?php echo get_theme_mod( 'content_linkone_color' ); ?>!important;}
	.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .woocommerce div.product span.price, .woocommerce div.product p.price, .woocommerce #content div.product span.price, .woocommerce #content div.product p.price, .woocommerce-page div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page #content div.product p.price {color:  <?php echo get_theme_mod( 'content_linkone_color' ); ?>!important;}

	.toppart, .socials {background-color: <?php echo get_theme_mod( 'content_linktwo_color' ); ?>; }
	.csstransforms .cn-wrapper li a {color: <?php echo get_theme_mod( 'content_linktwo_color' ); ?>; }

	.type2 {background: <?php echo get_theme_mod( 'content_linkthree_color' ); ?>; }
	.type3 {background: <?php echo get_theme_mod( 'content_linkfour_color' ); ?>; }
	.type5 {background: <?php echo get_theme_mod( 'content_linkfive_color' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'anariel_customizer_css' );
/*-----------------------------------------------------------------------------------*/
/*	Adds the individual sections, settings, and controls to the theme customizer
/*-----------------------------------------------------------------------------------*/
function anariel_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'anariel_section_one',
        array(
            'title' => 'Copyright Settings',
            'description' => 'This is a settings section.',
            'priority' => 35,
        )
    );
	$wp_customize->add_setting(
    'copyright_textbox',
    array(
        'default' => 'Tuned Balloon by Anariel Design. All rights reserved.',
		'sanitize_callback' => 'anariel_sanitize_text',
    )
);
$wp_customize->add_control(
    'copyright_textbox',
    array(
        'label' => 'Copyright text',
        'section' => 'anariel_section_one',
        'type' => 'text',
    )
);
$wp_customize->add_setting(
    'hide_copyright',
	array(
	'sanitize_callback' => 'anariel_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'hide_copyright',
    array(
        'type' => 'checkbox',
        'label' => 'Hide copyright text',
        'section' => 'anariel_section_one',
    )
);
}
add_action( 'customize_register', 'anariel_customizer' );
/**
 * Sanitization
 */
//Checkboxes
function anariel_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
//Integers
function anariel_sanitize_int( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
//Text
function anariel_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}