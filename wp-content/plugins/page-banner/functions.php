<?php
/* Plugin Name: Page Banner
  Description: This plugin registers the 'Page Banner' post type.
  Version: 1.0
  License: GPLv2
 */
// Page Banner Post type

add_action('init', 'create_page_banner_post_type');
function create_page_banner_post_type() {
    register_post_type('page_banner', array(
        'labels' => array(
            'name' => __('Page Banner'),
            'singular_name' => __('Page Banner')
        	),
        'public' => true,
        'has_archive' => true,
        'capability_type'     => 'post',
    	)
    );
}

add_action( 'init', 'remove_post_type' );
function remove_post_type() {
    remove_post_type_support( 'page_banner', 'title' );
    remove_post_type_support( 'page_banner', 'editor' );
}

//making the meta box (Note: meta box != custom meta field)
add_action('add_meta_boxes', 'wpse_add_custom_meta_box');
function wpse_add_custom_meta_box() {
   add_meta_box(
       'custom_meta_box-2',       // $id
       'Custom Field',            // $title
       'show_custom_meta_box',  // $callback
       'page_banner',                    // $page
       'normal',                  // $context
       'high'                     // $priority
   );
}

function show_custom_meta_box() {
	global $post;
	global $wpdb;
    // Use nonce for verification to secure data serialize(value)nding
    $args = array(
		'sort_order' => 'asc',
		'sort_column' => 'post_title',
		'hierarchical' => 1,
		'exclude' => '',
		'include' => '',
		'meta_key' => '',
		'meta_value' => '',
		'authors' => '',
		'child_of' => 0,
		'parent' => -1,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish',
	); 
	$pages = get_pages($args); 
?>
Pages: <select name="page_name" required>
        <option value=''>---Select Page---</option>
        <?php foreach ($pages as $page) {
        	$check_banner = $wpdb->get_row("SELECT id FROM banner WHERE id=".$page->ID);
        	if($check_banner->id != '' && wp_get_post_parent_id($post_ID) != $page->ID){
                $disabled = 'disabled';
            } else if(wp_get_post_parent_id($post_ID) != $page->ID && $_GET['action'] == 'edit') {
                $disabled = 'disabled';
            } else {
                $disabled = '';
            }
            if(wp_get_post_parent_id($post_ID) == $page->ID){
                $selected = 'selected';
            } else {
                $selected = '';
            }
         ?>
        <option <?php echo $disabled . $selected; ?> value='<?php echo $page->ID; ?>'><?php echo $page->post_title; ?></option>
        <?php } ?>
    </select><br />

Upload Banner: 
        <?php 
        if($_GET['action'] == 'edit'){
            $required = ''; 
        } else {
            $required = 'required'; 
        }
        ?>
        <input <?php echo $required; ?> type="file" name="banner_img" id="banner-img"  multiple="false" />
        <?php 
            if($_GET['action'] == 'edit'){ 
                $db_image = $wpdb->get_results("SELECT b.photo_url,p.id,p.post_title FROM banner as b LEFT JOIN wp_posts as p on p.id = b.id WHERE b.id=".$post->post_parent);
                $image = $db_image[0]->photo_url;
        ?>
        <img width="40" height="40" alt="<?php echo $db_image[0]->post_title; ?>" class="vc_single_image-img attachment-full" src="<?php echo $image; ?>"> 
   <?php }
}

/*********** save *****************/
add_action("save_post", "save_page_banner_meta_box", 10, 3);
function save_page_banner_meta_box($post_id, $post)
{
    global $wpdb;
    if(isset($_POST["page_name"]))
    {
        $uploadedfile = $_FILES['banner_img'];
        $upload_overrides = array(
		    'test_form' => false
		);
        $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

        if ($movefile && !isset($movefile['error'])) {	         
	        $table = 'banner';
	        $check_id = $wpdb->get_row("SELECT id FROM banner WHERE id=".$_POST["page_name"]);
	        if($check_id != ''){
	        	$wpdb->update($table, array('photo_url' => $movefile['url']), array('id' => $_POST["page_name"]));
	        } else {
	        	$banner_data = array(
		            'id' => $_POST["page_name"],
		            'photo_url' => $movefile['url'],
	            	);
		        $wpdb->insert($table, $banner_data);
		        remove_action( 'save_post', 'save_page_banner_meta_box' );
		    }
	    }

        $page = get_the_title($_POST["page_name"]);
    	$wpdb->update('wp_posts', array('post_title' => $page,'post_parent' => $_POST["page_name"]), array('ID' => $post_id));
        }
}

add_action('post_edit_form_tag', 'add_post_enctype');
function add_post_enctype() {
    echo ' enctype="multipart/form-data"';
}
?>