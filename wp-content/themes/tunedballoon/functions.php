<?php
// ============== Define constants
define('ANARIEL_WIDGETS', get_template_directory() . '/widgets/');
/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 */
load_theme_textdomain( 'tuned-balloon', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
/**
 * Enqueue the Open Sans font.
 */
function tunedballoon_fonts() {
		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'tunedballoon-dosis', "$protocol://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800" );}
add_action( 'wp_enqueue_scripts', 'tunedballoon_fonts' );
/*-----------------------------------------------------------------------------------*/
// Scripts
/*-----------------------------------------------------------------------------------*/
function anariel_scripts() {
	/*
	 * Adds JavaScript to pages with the comment form to support sites with
	 * threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	if(is_page()){ //Check if we are viewing a page
	global $wp_query;
		//Check which template is assigned to current page we are looking at
		$template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
	if($template_name == 'template-home.php'){
	wp_enqueue_script( 'circle', get_template_directory_uri() . '/js/circle.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'polyfills', get_template_directory_uri() . '/js/polyfills.js', array( 'jquery' ), '1.3.4', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js', array( 'jquery' ), '2.6.2', true );
	}}
	wp_enqueue_script( 'anariel-script', get_template_directory_uri() . '/js/screen.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'anariel_scripts' );

/*-----------------------------------------------------------------------------------*/
/*Include Stylesheets
/*-----------------------------------------------------------------------------------*/
function anariel_enqueue_css() {

	// Loads our main stylesheet.
	wp_enqueue_style( 'anariel-style', get_stylesheet_uri() );
	wp_enqueue_style( 'anariel-skeleton', get_template_directory_uri() . '/css/skeleton.css' );

}
add_action('wp_enqueue_scripts', 'anariel_enqueue_css');

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 1280;

/**
 * Tell WordPress to run anariel() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'anariel' );

if ( ! function_exists( 'anariel' ) ):

/**
 * Sets up theme defaults and registers support for WordPress features.
 */
function anariel() {

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'gallery_thumbnail', 960, 9999, true );
	add_image_size( 'about_thumbnail', 264, 9999, true );
	add_image_size( 'audio_thumbnail', 199, 9999, true );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'tuned-balloon' ) );

	// Add support for Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'video', 'image', 'quote', 'audio' ) );

	// This theme allows users to set a custom background
	add_theme_support( 'custom-background' );

	// Add support for flexible headers
	 $header_args = array(
	 'flex-height' => true,
	 'height' => 400,
	 'flex-width' => true,
	 'width' => 1920,
	 'default-image' => '%s/images/headers/headerimage.jpg',
	 'header-text' => false,
	 );

 add_theme_support( 'custom-header', $header_args );

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
			'beach' => array(
			'url' => '%s/images/headers/headerimage.jpg',
			'thumbnail_url' => '%s/images/headers/headerimage-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Header Image', 'tuned-balloon' )
			),
			'urban' => array(
			'url' => '%s/images/headers/headerimage1.jpg',
			'thumbnail_url' => '%s/images/headers/headerimage1-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Header Image One', 'tuned-balloon' )
			),
			'palms' => array(
			'url' => '%s/images/headers/headerimage2.jpg',
			'thumbnail_url' => '%s/images/headers/headerimage2-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Header Image Two', 'tuned-balloon' )
			),
			'romantic' => array(
			'url' => '%s/images/headers/headerimage3.jpg',
			'thumbnail_url' => '%s/images/headers/headerimage3-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Header Image Three', 'tuned-balloon' )
			),
			'summer' => array(
			'url' => '%s/images/headers/headerimage4.jpg',
			'thumbnail_url' => '%s/images/headers/headerimage4-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Header Image 4', 'tuned-balloon' )
			),
			'landscape' => array(
			'url' => '%s/images/headers/headerimage5.jpg',
			'thumbnail_url' => '%s/images/headers/headerimage5-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Header Image Five', 'tuned-balloon' )
			)
	) );
}
endif;

if ( ! function_exists( 'anariel_admin_header_style' ) ) :

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 * Referenced via add_custom_image_header() in anariel_setup().
 */
function anariel_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#heading {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function anariel_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'anariel_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 */
function anariel_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'anariel_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function anariel_continue_reading_link() {
	return ' <br><br><a class="more-link" href="'. get_permalink() . '">' . __( 'Continue reading', 'tuned-balloon' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and anariel_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function anariel_auto_excerpt_more( $more ) {
	return ' &hellip;' . anariel_continue_reading_link();
}
add_filter( 'excerpt_more', 'anariel_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function anariel_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= anariel_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'anariel_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 */
function anariel_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'anariel_remove_gallery_css' );

if ( ! function_exists( 'anariel_comment' ) ) :

/**
 * Template for comments and pingbacks.
 */
function anariel_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-gravatar"><?php echo get_avatar( $comment, 65 ); ?></div>
		<div class="comment-body">
			<div class="comment-meta commentmetadata"> <?php printf( __( '%s', 'tuned-balloon' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?><br/>
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'tuned-balloon' ), get_comment_date(),	get_comment_time() ); ?>
				</a>
				<?php edit_comment_link( __( 'Edit', 'tuned-balloon' ), ' ' );
			?>
			</div>
			<!-- .comment-meta .commentmetadata -->

			<?php comment_text(); ?>
			<?php if ( $comment->comment_approved == '0' ) : ?>
			<p class="moderation">
				<?php _e( 'Your comment is awaiting moderation.', 'tuned-balloon' ); ?>
			</p>
			<?php endif; ?>
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
			<!-- .reply -->

		</div>
		<!--comment Body-->

	</div>
	<!-- #comment-##	-->

	<?php
			break;
		case 'pingback'	:
		case 'trackback' :
	?>
<li class="post pingback">
	<p>
		<?php _e( 'Pingback:', 'tuned-balloon' ); ?>
		<?php comment_author_link(); ?>
		<?php edit_comment_link( __('(Edit)', 'tuned-balloon'), ' ' ); ?>
	</p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized area and update sidebar with default widgets
 */
function anariel_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Home - Top Image', 'tuned-balloon' ),
		'id' => 'hometopimage',
		'description' => __( 'We used this sidebar for top image', 'tuned-balloon'),
		'before_widget' => '<aside class="home_widget">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array (
		'name' => __( 'Home - Latest News Block', 'tuned-balloon' ),
		'id' => 'homelatestnews',
		'description' => __( 'We used this sidebar for latest news - install Recent Post Widget Extended: http://wordpress.org/plugins/recent-posts-widget-extended/', 'tuned-balloon'),
		'before_widget' => '<aside class="home_widget">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array (
		'name' => __( 'Home - Audio Player', 'tuned-balloon' ),
		'id' => 'homeplayer',
		'description' => __( 'We used this sidebar for audio player. Note: because of the design you can use max 7 songs - widget Anariel Player', 'tuned-balloon'),
		'before_widget' => '<aside class="home_widget">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array (
		'name' => __( 'Home - Short Band Bio', 'tuned-balloon' ),
		'id' => 'homebio',
		'description' => __( 'We used this sidebar for band bio text widget. ', 'tuned-balloon'),
		'before_widget' => '<aside class="home_widget">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array (
		'name' => __( 'Home - Shows and Media', 'tuned-balloon' ),
		'id' => 'hometourdates',
		'description' => __( 'We used this sidebar for upcoming shows - install GigPress plugin: http://wordpress.org/plugins/gigpress/. For photos and videos slider - install Soliloquy slider from plugins folder', 'tuned-balloon'),
		'before_widget' => '<aside class="home_widget">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array (
		'name' => __( 'Home V. One - Record Image Link', 'tuned-balloon' ),
		'id' => 'homerecord',
		'description' => __( 'We used this sidebar for record image and button that you can link to the page you want', 'tuned-balloon'),
		'before_widget' => '<aside class="home_widget">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array (
		'name' => __( 'Home V. Two and Three-Soundcloud', 'tuned-balloon' ),
		'id' => 'homemusic',
		'description' => __( 'We used this sidebar for soundcloud iframe', 'tuned-balloon'),
		'before_widget' => '<aside class="home_widget">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array (
		'name' => __( 'Footer Socials Widget:', 'tuned-balloon' ),
		'id' => 'homesocials',
		'description' => __( 'We used this sidebar for socials', 'tuned-balloon'),
		'before_widget' => '<aside class="footer_widget">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array (
		'name' => __( 'News Page - Right Sidebar', 'tuned-balloon' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'init', 'anariel_widgets_init' );

// ============== Load widgets
require_once( ANARIEL_WIDGETS .'player.php' );
require_once( ANARIEL_WIDGETS .'homebio.php' );
require_once( ANARIEL_WIDGETS .'socials.php' );
require_once( ANARIEL_WIDGETS .'recordlink.php' );
require_once( ANARIEL_WIDGETS .'hometopimage.php' );
/*-----------------------------------------------------------------------------------*/
/*	Shortcodes use inside widgets
/*-----------------------------------------------------------------------------------*/
add_filter('widget_text', 'do_shortcode');

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 */
function anariel_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'anariel_remove_recent_comments_style' );

/**
 * Search form custom styling
 */
function anariel_search_form( $form ) {

		$form = '<form role="search" method="get" class="searchform" action="'.home_url().'" >
		<div><label class="screen-reader-text" for="s">' . __('Search', 'tuned-balloon') . '</label>
		<input type="text" class="search-input" value="' . get_search_query() . '" name="s" id="s" />
		<input type="submit" class="searchsubmit" value="'. esc_attr__('Search', 'tuned-balloon') .'" />
		</div>
		</form>';

		return $form;
}
add_filter( 'get_search_form', 'anariel_search_form' );

/**
 * Remove the default CSS style from the WP image gallery
 */
add_filter('gallery_style', create_function('$a', 'return "
<div class=\'gallery\'>";'));

/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 */
function anariel_customize_preview_js() {
	wp_enqueue_script( 'anariel-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130213', true );
}
add_action( 'customize_preview_init', 'anariel_customize_preview_js' );
/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';
/**
 * WooCommerce
 *
 * Unhook sidebar
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_theme_support( 'woocommerce' );
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );