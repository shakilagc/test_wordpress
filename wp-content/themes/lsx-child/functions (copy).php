<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


//----------------------------------------//
/*function test() {
	$test = '<div style="font-size:30px;color:green;">';
	$test .= '<p>Hello</p></div>';
	echo $test;
}
add_filter("test_hook", "test");
function test1($test) {
	$test1 = $test;
	$test1 .= '<div style="font-size:30px;color:red;">';
	$test1 .= '<p>Friends</p></div>';
	echo $test1;
}
add_filter("test_hook", "test1");
apply_filters("test_hook", "test1");
function add_content($content) {
	$new_content = '<p>This is added to the bottom of all post and page content</p>';
	$content = $content . $new_content;
	return $content;
}
add_filter('the_content', 'add_content');
apply_filters('the_content',"");*/
$my_class = new WC_Coupon($code);

/*add_action( 'init', 'woocommerce_custom_message' );
function woocommerce_custom_message() {
	global $my_class;
	$my_class->get_coupon( $code );
	$my_class->add_error( 'An Error Message' );
}

function get_coupon( $code ) {
	$this->code  = apply_filters( 'woocommerce_coupon_code', $code );
	// Coupon data lets developers create coupons through code
	if ( $coupon = apply_filters( 'woocommerce_get_shop_coupon_data', false, $this->code ) ) {
		$this->populate( $coupon );
		return true;
	}
	// Otherwise get ID from the code
	$this->id = $this->get_coupon_id_from_code( $this->code );
	if ( $this->code === apply_filters( 'woocommerce_coupon_code', get_the_title( $this->id ) ) ) {
		$this->populate();
		return true;
	}
	return false;
}*/
function custom_coupon_messages( $translated_text, $text, $text_domain ) {

	// bail if not modifying frontend woocommerce text
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}

	if ( 'Coupon usage limit has been reached.' === $text ) {
		return 'Our records show that you have already redeemed this discount code.';
	}

	if( 'This coupon has expired.' === $text ) {
		return 'Sorry, this discount code is no longer active123.';
	}

	if( 'Coupon "%s" does not exist!' === $text ) {
		return 'Coupon 123 does not exist!';
	}

	return $translated_text;
}
add_filter( 'gettext', 'custom_coupon_messages', 10, 3 );

function my_text_strings( $translated_text, $text, $domain ) {
	//echo $translated_text . '***';
	switch ( $translated_text ) {
		case 'Showing all %d results' :
			$translated_text = __('Showing %d results', 'Woocommerce');
			break;
		case 'Default sorting' :
			$translated_text = __('Sorting', 'Woocommerce');
			break;
		case 'Add to cart' :
			$translated_text = __( 'Add to basket', 'woocommerce' );
			break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'my_text_strings', 20, 3 );
/* --------------- Hide Coupon -----------------*/
/*function hide_coupon_field( $enabled ) {
	if ( is_cart() || is_checkout() ) {
		$enabled = false;
	}
	
	return $enabled;
}
add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field' );*/

// Creating the widget 
class wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'wpb_widget', 

// Widget name will appear in UI
__('Custom Widget', 'wpb_widget_domain'), 

// Widget description
array( 'description' => __( 'Sample widget based on Custom Tutorial', 'wpb_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
echo __( 'Hello, World!', 'wpb_widget_domain' );
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

function wpmm_setup() {
    register_nav_menus( array(
        'mega_menu' => 'Mega Menu'
    ) );
}
add_action( 'after_setup_theme', 'wpmm_setup' );

function wpmm_init() {
    $location = 'mega_menu';
    $css_class = 'has-mega-menu';
    $locations = get_nav_menu_locations();
    if ( isset( $locations[ $location ] ) ) {
        $menu = get_term( $locations[ $location ], 'nav_menu' );
        if ( $items = wp_get_nav_menu_items( $menu->name ) ) {
            foreach ( $items as $item ) {
                if ( in_array( $css_class, $item->classes ) ) {
                    register_sidebar( array(
                        'id'   => 'mega-menu-widget-area-' . $item->ID,
                        'name' => $item->title . ' - Mega Menu',
                    ) );
                }
            }
        }
    }
}
add_action( 'widgets_init', 'wpmm_init' );

/* ----------- Theme Setting ----------*/

function add_theme_menu_item()
{
	add_menu_page("Theme Options", "Theme Options", "manage_options", "theme-options", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Theme Options</h1>
	    <form method="post" action="options.php" enctype="multipart/form-data">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

function display_facebook_element()
{
	?>
    	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_twitter_element()
{
	?>
    	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_layout_element()
{
	?>
		<input type="checkbox" name="theme_layout" value="1" <?php checked(1, get_option('theme_layout'), true); ?> /> 
	<?php
}

function logo_display()
{
	?>
        <input type="file" name="logo" /> 
        <?php echo get_option('logo'); ?>
   <?php
}

function handle_logo_upload()
{
	if(!empty($_FILES["logo"]["tmp_name"]))
	{
		$urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
	    $temp = $urls["url"];
	    return $temp;   
	}
	  
	return $option;
}

function display_copyright_element()
{
	?>
    	<input type="text" name="copyright" id="copyright" value="<?php echo get_option('copyright'); ?>" />
    <?php
}

function display_theme_panel_fields()
{
	$parent_slug = 'themes.php';
	$page_title = 'Theme Options';
	add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
	add_settings_section("section", "All Settings", null, "theme-options");
	
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
	add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
	add_settings_field("theme_layout", "Do you want the layout to be responsive?", "display_layout_element", "theme-options", "section");
    add_settings_field("logo", "Footer Logo", "logo_file_display", "theme-options", "section");  
    add_settings_field("copyright", "Copy right text", "display_copyright_element", "theme-options", "section");

    register_setting("section", "facebook_url");
    register_setting("section", "twitter_url");
    register_setting("section", "theme_layout");
    register_setting("section", "copyright");
    register_setting("section", "logo", "handle_file_upload");
}

add_action("admin_init", "display_theme_panel_fields");


function handle_file_upload($option)
{
  if(!empty($_FILES["logo"]["tmp_name"]))
  {
    $urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
    $temp = $urls["url"];
    return $temp;  
  }
 
  return $option;
}

function logo_file_display()
{
   ?>
        <input type="file" name="logo" />
        <?php if(get_option('logo') != ''){ ?>
        <img width="40px" height="40px" style="margin:-30px;" src="<?php echo get_option('logo'); ?>">
        <?php } ?>
   <?php
}

add_action( 'category_term_edit_form_tag' , 'post_edit_form_tag' );

/*-------------------- Shortcode --------------------*/

add_shortcode('shortcode_posts', 'display_post_shortcode');

function display_post_shortcode(){
	$args = array(
		'posts_per_page'   => -1,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'acme_product',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'	   => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
		);
	$posts_array = get_posts( $args );
	//print_r($posts_array);
	foreach ($posts_array as $posts) {
		$date = date("d/m/Y", strtotime($posts->post_date));
		$post .= "<b style='color:#000;'><a href='".$posts->guid."'>".$posts->post_title."</a></b> <div style='float:right; color:#000;'><b>Post Date: </b>".$date."</div>";
		$post .= "<p>".$posts->post_content."</p><br>";
	}
	return $post;
}
add_action('woocommerce_cancelled_order', 'cancel_order');
function cancel_order(){
	if($_GET['cancel_order'] == 'true'){
		global $wpdb;
		$postmeta_query = "DELETE pm
					FROM wp_postmeta pm
					LEFT JOIN wp_posts wp ON wp.ID = pm.post_id
					WHERE wp.ID =".$_GET['order_id'];
		$postmeta_result =$wpdb->query($postmeta_query);

		$post_query = "DELETE FROM wp_posts WHERE ID =".$_GET['order_id'];
		$post_result =$wpdb->query($post_query);

		$order_data = $wpdb->get_results( "SELECT order_item_id FROM wp_woocommerce_order_items WHERE order_id='".$_GET['order_id']."'" );

		foreach ($order_data as $key => $value) {
			$ordermeta_query = "DELETE FROM wp_woocommerce_order_itemmeta WHERE order_item_id='".$value->order_item_id."'";
	        $ordermeta_result =$wpdb->query($ordermeta_query);
	    }

        $order_query = "DELETE FROM wp_woocommerce_order_items WHERE order_id =".$_GET['order_id'];
		$order_result =$wpdb->query($order_query);
		return;
	}
}
?>