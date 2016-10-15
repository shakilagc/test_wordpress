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
		'post_status' => 'publish'
	); 
	$pages = get_pages($args); 
?>
        Pages: <select name="page_name" required>
                <option value=''>---Select Page---</option>
                <?php foreach ($pages as $page) {
                    if(get_the_ID () == $page->ID){
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                 ?>
                <option <?php echo $selected; ?> value='<?php echo $page->ID; ?>'><?php echo $page->post_title; ?></option>
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
                    /*if($_GET['action'] == 'edit'){ 
                        $db_image = $wpdb->get_results("SELECT rp.photo_url,r.id,r.first,r.last FROM rep_photos as rp LEFT JOIN representatives as r on r.id = rp.id WHERE rp.id=".$post->rep_id);
                        $wp_upload_dir = wp_upload_dir();
                        $image = $wp_upload_dir['baseurl'].'/representative/'.$db_image[0]->photo_url;
                ?>
                <img width="40" height="40" alt="<?php echo $db_image[0]->first . ' ' . $db_image[0]->last; ?>" class="vc_single_image-img attachment-full" src="<?php echo $image; ?>"> 
           <?php }*/
       }

/*********** save *****************/
add_action("save_post", "save_page_banner_meta_box", 10, 3);
function save_page_banner_meta_box($post_id, $post)
{
    global $wpdb;
    if(isset($_POST["page_name"]))
    {
        $file_name = $_FILES['banner_img']['name'];
        $file_size = $_FILES['banner_img']['size'];
        $file_tmp  = $_FILES['banner_img']['tmp_name'];
        $file_type = $_FILES['banner_img']['type'];  

        /*if($file_name == ''){
            $image = $wpdb->get_results("SELECT photo_url FROM rep_photos WHERE id=".$post->rep_id);
            $new_file_name = $image[0]->photo_url;  
        } else {
            $info = pathinfo($file_name);
            $new_file_name = 'rep_photo_'.$_POST["rep_name"].'.'.$info['extension'];
            $wp_upload_dir = wp_upload_dir();
            $rep_path = substr($wp_upload_dir['path'],0,-7).'representative';
            move_uploaded_file($file_tmp,$rep_path.'/'.$new_file_name);  */

            $uploadedfile = $file_name;
            $upload_name = $file_name;
            $uploads = wp_upload_dir();
            $filepath = substr($uploads['path'],0,-7).'/'.$uploadedfile;
             if (!function_exists('wp_handle_upload'))
                {
                        require_once (ABSPATH . 'wp-admin/includes/file.php');
                }

                //require_once (ABSPATH . 'wp-admin/includes/image.php');
                $upload_overrides = array(
				    'test_form' => false
				);
            $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
            //echo "<pre>";print_r($movefile);exit;
        //}
        if ($movefile && !isset($movefile['error'])) {
        	echo 'come';exit;
	        $banner_data = array(
	            'id' => $_POST["page_name"],
	            'photo_url' => $file_name,
	            ); 
	        $table = 'banner';
	        //print_r($banner_data);exit;
	        $wpdb->insert($table, $banner_data);
	        remove_action( 'save_post', 'save_rep_photos_meta_box' );
	    } else {
	    	echo 'not come';exit;
	    }

        /*$rep_data = $wpdb->get_results("SELECT first,last FROM representatives WHERE id=".$_POST["rep_name"]);
    $rep_name = $rep_data[0]->first . ' ' . $rep_data[0]->last;
    $my_post = array(
              'ID'           => $post_id,
              'post_title'   => $rep_name,
              'rep_id'       => $_POST["rep_name"],
          );
    $wpdb->update('wp_posts', $my_post, array( 'ID' => $post_id ));*/
        }
}

add_action('post_edit_form_tag', 'add_post_enctype');
function add_post_enctype() {
    echo ' enctype="multipart/form-data"';
}
?>