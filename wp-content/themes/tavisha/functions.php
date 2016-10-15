<?php
/*-----------------------------------------------------------------------------------*/
/* Start ColorLabs Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/
error_reporting(0);


if ( ! isset( $content_width ) ){
  $content_width = 1170;
}

if ( ! function_exists( 'tavisha_setup' ) ) :
function tavisha_setup() {

  load_theme_textdomain( 'tavisha', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 848, 500, true );
  add_image_size( 'big-slider-tavisha', 832, 385, true );
  add_image_size( 'small-slider-tavisha', 173, 96, true );
  add_image_size( 'archive-thumb-tavisha', 270, 153, true );
  add_image_size( 'cat-thumb-tavisha', 265, 265, true );

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'tavisha' ),
    'social'  => __( 'Social Links Menu', 'tavisha' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
  ) );

}
endif; // tavisha_setup
add_action( 'after_setup_theme', 'tavisha_setup' );

/**
 * Enqueue scripts and styles.
 *
 * @since Tavisha 1.0
 */
function tavisha_scripts() {
  // Add custom fonts, used in the main stylesheet.
  wp_enqueue_style( 'tavisha-fonts', 'http://fonts.googleapis.com/css?family=Merriweather:700|Roboto:400,400italic,700,700italic|Crimson+Text:400,400italic,700,700italic', array(), null );

  wp_enqueue_style( 'framework-css', get_template_directory_uri() . '/includes/css/framework.css', array(), '1.0' );
  wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/includes/css/font-awesome.css', array(), '4.3.0' );
  wp_enqueue_style( 'owl-css', get_template_directory_uri() . '/includes/css/owl.carousel.css', array(), '1.3.3' );
  wp_enqueue_style( 'jmmenu-css', get_template_directory_uri() . '/includes/css/jquery.mmenu.css', array(), '5.0.4' );

  // Load our main stylesheet.
  wp_enqueue_style( 'tavisha-style', get_stylesheet_uri() );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  wp_enqueue_script( 'modernizr-js', get_template_directory_uri() . '/includes/js/modernizr.js', array( 'jquery' ), '2.8.3', false );
  wp_enqueue_script( 'throttle-script', get_template_directory_uri() . '/includes/js/jquery.ba-throttle-debounce.js', array( 'jquery' ), '1.1', true );
  wp_enqueue_script( 'owl-script', get_template_directory_uri() . '/includes/js/owl.carousel.js', array( 'jquery' ), '1.3.3', true );
  wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/includes/js/jquery.fitvids.js', array( 'jquery' ), '1.1', true );
  wp_enqueue_script( 'jmmenu-script', get_template_directory_uri() . '/includes/js/jquery.mmenu.all.js', array( 'jquery' ), '5.0.4', true );
  wp_enqueue_script( 'tavisha-script', get_template_directory_uri() . '/includes/js/scripts.js', array( 'jquery' ), '20150430', true );
  ?>
  <script>(function(){document.documentElement.className='js'})();</script>
  <?php
}
add_action( 'wp_enqueue_scripts', 'tavisha_scripts' );

function tavisha_search_form( $form ) {
  $form = '<form role="search" method="get" id="search-form" class="search-form" action="' . esc_url(home_url( '/' )) . '" >
  <label for="s"><i class="fa fa-search"></i>' . __( 'Search', 'tavisha' ) . '</label>
  <input type="text" value="' . get_search_query() . '" name="s" id="s" />
  </form>';

  return $form;
}

add_filter( 'get_search_form', 'tavisha_search_form' );

function tavisha_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Widget Area', 'tavisha' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here to appear in your sidebar.', 'tavisha' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );
}
add_action( 'widgets_init', 'tavisha_widgets_init' );

if ( ! function_exists( 'tavisha_credits' ) ) :
function tavisha_credits() {
  $text = __('Theme designed by <a href="'.esc_url('http://colorlabsproject.com/themes/tavisha').'">Colorlabs & Company</a>.', 'tavisha');
  echo apply_filters( 'tavisha_credits_text', $text) ;
}
endif; 
add_action( 'tavisha_credits', 'tavisha_credits' );

if ( ! function_exists( 'tavisha_comment_callback' ) ) :
function tavisha_comment_callback($comment, $args, $depth) {
  ?>
  <li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
      <div class="comment-entry">
        <div class="comment-avatar">
          <?php echo get_avatar( $comment, $args['avatar_size'] );?>
        </div>
        <div class="comment-author-wrap">
          <span class="comment-author vcard"><?php echo get_comment_author_link();?></span>
          <div class="comment-meta commentmetadata">
            <?php printf( __('%1$s at %2$s', 'tavisha'), get_comment_date(),  get_comment_time() ); ?>         
            &nbsp;&bull;&nbsp;
            <?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>       
          </div>
        </div>
      </div>
      <div class="comment-content">
        <?php comment_text(); ?>
      </div>
    </div>
  </li>
  <?php
}
endif; 

if ( ! function_exists( 'tavisha_paging_nav' ) ) :
function tavisha_paging_nav() {
  global $wp_query, $wp_rewrite;

  // Don't print empty markup if there's only one page.
  if ( $wp_query->max_num_pages < 2 ) {
    return;
  }

  $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
  $pagenum_link = html_entity_decode( get_pagenum_link() );
  $query_args   = array();
  $url_parts    = explode( '?', $pagenum_link );

  if ( isset( $url_parts[1] ) ) {
    wp_parse_str( $url_parts[1], $query_args );
  }

  $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
  $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

  $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
  $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

  // Set up paginated links.
  $links = paginate_links( array(
    'base'     => $pagenum_link,
    'format'   => $format,
    'total'    => $wp_query->max_num_pages,
    'current'  => $paged,
    'mid_size' => 1,
    'add_args' => array_map( 'urlencode', $query_args ),
    'prev_text' => __( '&lsaquo;', 'tavisha' ),
    'next_text' => __( '&rsaquo;', 'tavisha' ),
  ) );

  if ( $links ) :

  ?>
  <div class="pagination">
    <?php echo $links; ?>
  </div><!-- .pagination -->
  <?php
  endif;
}
endif;

function tavisha_customize_register( $wp_customize ) {
  
  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
  
  $wp_customize->add_setting( 'header_background_color', array(
    'default'           => '#ED423C',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
    'label'       => __( 'Header Background Color', 'tavisha' ),
    'description' => __( 'Applied to the background header sections.', 'tavisha' ),
    'section'     => 'colors',
  ) ) );
  
  $wp_customize->add_setting( 'header_text_color', array(
    'default'           => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text_color', array(
    'label'       => __( 'Header Text Color', 'tavisha' ),
    'description' => __( 'Applied to the text header sections.', 'tavisha' ),
    'section'     => 'colors',
  ) ) );
  
  $wp_customize->add_setting( 'main_background_color', array(
    'default'           => '#F9F9F9',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_background_color', array(
    'label'       => __( 'Main Background Color', 'tavisha' ),
    'description' => __( 'Applied to the background main sections.', 'tavisha' ),
    'section'     => 'colors',
  ) ) );
  
  $wp_customize->add_setting( 'general_text_color', array(
    'default'           => '#111111',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'general_text_color', array(
    'label'       => __( 'General Text Color', 'tavisha' ),
    'description' => __( 'Applied to general text color.', 'tavisha' ),
    'section'     => 'colors',
  ) ) );
  
  $wp_customize->add_setting( 'link_text_color', array(
    'default'           => '#ED423C',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_text_color', array(
    'label'       => __( 'General Link Color', 'tavisha' ),
    'description' => __( 'Applied to general link color.', 'tavisha' ),
    'section'     => 'colors',
  ) ) );
  
  $wp_customize->add_setting( 'heading_text_color', array(
    'default'           => '#3b3b3b',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_text_color', array(
    'label'       => __( 'Heading Text Color', 'tavisha' ),
    'description' => __( 'Applied to general all heading text color.', 'tavisha' ),
    'section'     => 'colors',
  ) ) );
  
  $wp_customize->add_setting( 'sidebar_background_color', array(
    'default'           => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_background_color', array(
    'label'       => __( 'Sidebar Background Color', 'tavisha' ),
    'description' => __( 'Applied to the background sidebar sections.', 'tavisha' ),
    'section'     => 'colors',
  ) ) );
  
  $wp_customize->add_setting( 'sidebar_text_color', array(
    'default'           => '#7d7d7d',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_text_color', array(
    'label'       => __( 'Sidebar Text Color', 'tavisha' ),
    'description' => __( 'Applied to sidebar text color.', 'tavisha' ),
    'section'     => 'colors',
  ) ) );
  
  $wp_customize->add_setting( 'footer_background_color', array(
    'default'           => '#3B3B3B',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
    'label'       => __( 'Footer Background Color', 'tavisha' ),
    'description' => __( 'Applied to the background footer sections.', 'tavisha' ),
    'section'     => 'colors',
  ) ) );
  
  $wp_customize->add_setting( 'footer_text_color', array(
    'default'           => '#898989',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
    'label'       => __( 'Footer Text Color', 'tavisha' ),
    'description' => __( 'Applied to footer text color.', 'tavisha' ),
    'section'     => 'colors',
  ) ) );
  
  $wp_customize->add_setting( 'footer_link_color', array(
    'default'           => '#898989',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color', array(
    'label'       => __( 'Footer Link Color', 'tavisha' ),
    'description' => __( 'Applied to footer link color.', 'tavisha' ),
    'section'     => 'colors',
  ) ) );
  
  $wp_customize->add_section( 'layout_settings', array(
    'title'    => __( 'Layout Settings', 'tavisha' ),
    'priority' => 50,
  ) );
  
  $wp_customize->add_setting( 'sidebar_layout_setting', array(
    'default'           => 'sidebar_right',
    'sanitize_callback' => 'tavisha_sanitize_layout',
    'transport'         => 'postMessage',
  ) );

  $wp_customize->add_control( 'sidebar_layout_setting', array(
    'label'    => __( 'Select layout for your blog', 'tavisha' ),
    'section'    => 'layout_settings',
    'type'       => 'radio',
    'choices'    => array(
      'sidebar_right' => __( 'Sidebar Right (default)', 'tavisha' ), 
      'sidebar_left' => __( 'Sidebar Left', 'tavisha' )
    ),
    'priority'   => 1       
  ) );
} 

add_action( 'customize_register', 'tavisha_customize_register', 11 ); 

/**
 * Sanitize Customizer Layout Option
 */
function tavisha_sanitize_layout( $value ) {
  if ( ! in_array( $value, array( 'sidebar_left', 'sidebar_left' ) ) )
    $value = 'content_left';

  return $value;
}

function tavisha_customize_preview_js() {
  wp_enqueue_script( 'tavisha-customize-preview', get_template_directory_uri() . '/includes/js/customize-preview.js', array( 'customize-preview' ), '20150430', true );
}
add_action( 'customize_preview_init', 'tavisha_customize_preview_js' );

function tavisha_color_custom_css() {

  $colors = array(
    'header_background_color'       => esc_attr(get_theme_mod( 'header_background_color', 'ED423C' )),
    'header_text_color'             => esc_attr(get_theme_mod( 'header_text_color', 'FFFFFF' )),
    'main_background_color'         => esc_attr(get_theme_mod( 'main_background_color', 'F9F9F9' )),
    'sidebar_background_color'      => esc_attr(get_theme_mod( 'sidebar_background_color', 'FFFFFF' )),
    'footer_background_color'       => esc_attr(get_theme_mod( 'footer_background_color', '3B3B3B' )),
    'general_text_color'            => esc_attr(get_theme_mod( 'general_text_color', '111111' )),
    'link_text_color'               => esc_attr(get_theme_mod( 'link_text_color', 'ED423C' )),
    'heading_text_color'            => esc_attr(get_theme_mod( 'heading_text_color', '3B3B3B' )),
    'sidebar_text_color'            => esc_attr(get_theme_mod( 'sidebar_text_color', '7d7d7d' )),
    'footer_text_color'             => esc_attr(get_theme_mod( 'footer_text_color', '898989' )),
    'footer_link_color'             => esc_attr(get_theme_mod( 'footer_link_color', '898989' )),
  );

  $color_custom_css = tavisha_get_color_custom_css( $colors );

  wp_add_inline_style( 'tavisha-style', $color_custom_css );
}
add_action( 'wp_enqueue_scripts', 'tavisha_color_custom_css' );

function tavisha_get_color_custom_css( $colors ) {

  $css = <<<CSS
  /* Custom Color */

  /* Header Section */
  .header-section {
    background-color: {$colors['header_background_color']};
    color: {$colors['header_text_color']};
  }
  .header-section a {
    color: {$colors['header_text_color']};
  }
  .btn-nav span, .header-section .search-form:before{
    background-color: {$colors['header_text_color']};
  }
  
  /* Main Section */
  .content-overflow {
    background-color: {$colors['main_background_color']};
  }
  
  /* General Section */
  body {
    color: {$colors['general_text_color']};
  }
  
  a, .slide-thumb-item a:hover .slide-title, .synced .slide-thumb-item .slide-title, .entry-post .entry-meta time, code, .post-item:hover .entry-comment-number {
    color: {$colors['link_text_color']};
  }
  
  .category-title:before, .category-block .category-title a, .big-slider-title a, .widget-title, .entry-post .entry-title, .archive-title, .author-info .author-title, .comment-header h3, .commentlist .comment-author, .commentlist .comment-author a {
    color: {$colors['heading_text_color']};
  }
  
  /* Sidebar Section */
  body {
    background-color: {$colors['sidebar_background_color']};
  }
  
  .widget {
    color: {$colors['sidebar_text_color']};
    color: {$colors['sidebar_text_color']};
  }
  
  /* Footer Section */
  .footer-section {
    background-color: {$colors['footer_background_color']};
  }
  
  .footer-section {
    color: {$colors['footer_text_color']};
  }
  
  .footer-section a {
    color: {$colors['footer_link_color']};
  }

CSS;

  return $css;
}

if ( ! function_exists( 'tavisha_layout_body_class' ) ) {
  function tavisha_layout_body_class( $classes ) {
  
    $layout = '';
    $layout = esc_attr(get_theme_mod( 'sidebar_layout_setting' ));
    
    if ( 'sidebar_left' == $layout ) $layout = "two-col-right";
                    
    // Add classes to body_class() output 
    $classes[] = $layout;

        
    return apply_filters('tavisha_layout_body_class', $classes);
  }
  add_filter( 'body_class','tavisha_layout_body_class', 10 );
}


/**
 * Add Editor Styles
 */
function tavisha_add_editor_styles() {
  $font_url = 'http://fonts.googleapis.com/css?family=Merriweather:700|Crimson+Text:400,400italic,700,700italic';
  add_editor_style( array(
    'editor-style.css',
    str_replace( ',', '%2C', $font_url ) 
  ));
}
add_action( 'after_setup_theme', 'tavisha_add_editor_styles' );

function tavisha_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'tavisha_nav_description', 10, 4 );

add_action('init', 'portfolio_register');
 
function portfolio_register() {
 
	$labels = array(
		'name' => _x('My Portfolio', 'post type general name'),
		'singular_name' => _x('Portfolio Item', 'post type singular name'),
		'add_new' => _x('Add New', 'portfolio item'),
		'add_new_item' => __('Add New Portfolio Item'),
		'edit_item' => __('Edit Portfolio Item'),
		'new_item' => __('New Portfolio Item'),
		'view_item' => __('View Portfolio Item'),
		'search_items' => __('Search Portfolio'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'portfolio' , $args );
}