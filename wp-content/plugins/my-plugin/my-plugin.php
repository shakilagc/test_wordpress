<?php 

    /*
    Plugin Name: my-plugin
    Plugin URI: http://www.orangecreative.net
    Description: Plugin for displaying images like ads after every woocommerce product list.
    Author: Mr.Hitesh
    Version: 1.0
    License: demo
    Author URI: http://www.orangecreative.net
    */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

if (wp_mkdir_p('/wp-content/plugins')) {
  echo 'It worked! Now look for a directory named';
}
/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
{

  

    // Put your plugin code here
add_action( 'init', 'its_demo_plugin' );
function its_demo_plugin() {

  register_post_type( 'my-plugin', array(
      'labels' => array(
          'name' => ( 'My-Plugins' ),
          'singular_name' => ( 'My-Plugins' ),
          'add_new' => ( 'Add New' ),
          'add_new_item' => ( 'Add New My-Plugins' ),
          'edit' => ( 'Edit' ),
          'edit_item' => ( 'Edit My-Plugins' ),
          'new_item' => ( 'New My-Plugins' ),
          'view' => ( 'View My-Plugins' ),
          'view_item' => ( 'View My-Plugins' ),
          'search_items' => ( 'Search My-Plugins' ),
          'not_found' => ( 'No row found' ),
          'not_found_in_trash' => ( 'No row found in Trash' ),
          'parent' => ( 'Parent My-Plugins' ),
          ),

      'description' => 'My-Plugins work is great.',
      'public' => true,
      'capability_type' => 'post',
      'menu_position' => 5,
      'supports' => array( 'page-attributes' ),
      //'supports' => array( 'title', 'editor','custom-fields','page-attributes'),
      'exclude_from_search' => true,
  ));
}

add_filter('manage_edit-my-plugin_columns','edit_my_plugin_columns');
function edit_my_plugin_columns($columns){
  $columns = array(
            'cb'                => '<input type="checkbox" />',
            'title'           => ('Title'),
            'images'            => ('Images'),
            'date'              => ('Date')
    );
  return $columns;
}




add_action( 'wp_enqueue_scripts', 'ajax_jsplugin_enqueue_scripts' );
function ajax_jsplugin_enqueue_scripts() {
  if(is_single()){
    wp_enqueue_script( 'jsplugin', plugins_url( '/js/jsplugin.js', __FILE__ ), array('jquery'), '1.0', true );
  }
}

function myplugin_metabox(){
      add_meta_box(
       'myplugin_meta_box',       // $id
       'Custom Field',            // $title
       'show_myplugin_meta_box',  // $callback
       'my-plugin',               // $page
       'normal',                  // $context
       'high'                     // $priority
   );
}
add_action('add_meta_boxes','myplugin_metabox');

function show_myplugin_meta_box(){
  if(isset($_GET['post']) && $_GET['action']== 'edit'){
    //if(isset($_GET['post']) && $_GET['action']=='edit') {
      //get_field1( "meta_value", $_GET['post'] )
      echo 'select Stream:<select name="mydropdown" id="mydropdown">';
      echo "<option value='".get_field( "post_title", $_GET['post'] )."'>".get_field( "post_title", $_GET['post'] )."</option>";
      echo get_field( "post_title", $post_id );
      echo '<option value="BCA">BCA</option>';
      echo '<option value="BBA">BBA</option>';
      echo '<option value="MCA">MCA</option>';
      echo '<option value="MBA">MBA</option>';
      echo '<option value="PGDCA">PGDCA</option>';
      echo '<option value="MSCIT">MSCIT</option>';
      echo '</select><br />';
      if(get_field1( "meta_value", $_GET['post'] )) {
        echo 'select image: <input type="file" name="profilepic" id="profilepic" />';
        echo $img = '<img src="'.site_url().'/upload/myplugin/'.get_field1("meta_value",$_GET['post']). '" width="50px" />';
      }
      else{
        echo 'select image: <input type="file" name="profilepic" id="profilepic" />';  
      }
      
    //}
  }else{
    echo 'select Stream:<select name="mydropdown" id="mydropdown">';
    echo '<option value="">----Slect Stream----</option>';
    echo '<option value="BCA">BCA</option>';
    echo '<option value="BBA">BBA</option>';
    echo '<option value="MCA">MCA</option>';
    echo '<option value="MBA">MBA</option>';
    echo '<option value="PGDCA">PGDCA</option>';
    echo '<option value="MSCIT">MSCIT</option>';
    echo '</select><br />';
    echo 'select image: <input type="file" name="profilepic" id="profilepic" />';
  }
 
}


/*if( isset ( $_POST['mydropdown'] ) ) {
    $selected_val = $_POST['mydropdown'];
}*/
//echo $selected_val;


/*add_filter( 'wp_insert_post_data' , 'modify_post_title' , '99', 2 );
function modify_post_title( $data )
{
  //echo "aafasdf";exit;
    if($data['post_type'] == 'my-plugin') { 
      if($_POST['mydropdown'] != ''){
        $title = $_POST['mydropdown'];  
        $data['post_title'] =  $title ;
      }
    }
    return $data;  
    
}*/

function save_myplugin_meta_box($post_id)
{
  global $wpdb;
  
    //define('ABSPATH', dirname(__FILE__) . '/');
    //echo "<pre>"; print_r(dirname(__FILE__)); exit;
    if(isset($_POST["mydropdown"]) && isset($_POST["profilepic"]))
    {
      echo "<pre>"; print_r($_FILES);exit;
      $mydropdown = $_POST["mydropdown"];
      $profilepic = $_POST["profilepic"];
      $post_ID = $_POST["post_ID"];
      $filename = $_FILES['profilepic']['name'];
      
      $table = $wpdb->base_prefix.'test';
      $wpdb->insert($table, array(
                        'post_id' => $post_ID,
                        'streamname' => $mydropdown,
                        'pic' => 'myplugin_'.$post_ID
                        //'pic' => $profilepic
                        
                    )); 
  

    }
    //$mypath = ABSPATH.'wp-content/uploads';
    //$mypath = dirname(__FILE__);
     
    //move_uploaded_file($_FILES['profilepic']['tmp_name'], $mypath . '/myplugin/'. $filename);
   
    //echo $wpdb->last_query;exit;
 
}
add_action("save_post", "save_myplugin_meta_box", 10, 3);



add_action( 'post_edit_form_tag' , 'post_edit_form_tag' );
function post_edit_form_tag( ) {
    echo ' enctype="multipart/form-data"';
}

add_action( 'manage_posts_custom_column' , 'custom_plugin_column', 10, 2 );
function custom_plugin_column( $column, $post_id ) {   
    global $page;
    switch ( $column ) {
        case 'reprenm' :
            if(get_field( "post_title", $post_id )) {
                echo get_field( "post_title", $post_id );
            } else {
                echo 0;
            }
        break;

        case 'images' :
            if(get_field1( "meta_value", $post_id )) {
              
              echo $img = '<img src="'.site_url().'/upload/myplugin/'.get_field1("meta_value",$post_id). '" width="50px" />';
                
            } else {
                echo 0;
            }
        break;   
    }   
}

function get_field($column, $post_id){
  global $wpdb;
  $table = $wpdb->base_prefix.'posts';
  $table1 = $wpdb->base_prefix.'postmeta';
 
  $results = $wpdb->get_results("SELECT ".$table.".ID,".$table.".post_title,".$table.".post_type,".$table1.".post_id,".$table1.".meta_key,".$table1.".meta_value FROM ".$table.",".$table1." WHERE ".$table.".post_type in('my-plugin') and ".$table.".id = ".$table1.".post_id and ".$table1.".meta_key= 'ads_img' and ".$table.".ID = ".$post_id );
  foreach($results as $k=>$i){
    $content .= "{$i->post_title}";
  }
  //echo $wpdb->last_query;//exit;
  return "{$content}";
}

function get_field1($column, $post_id){
  global $wpdb;
  $table = $wpdb->base_prefix.'posts';
  $table1 = $wpdb->base_prefix.'postmeta';
 
  $results = $wpdb->get_results("SELECT ".$table.".ID,".$table.".post_title,".$table.".post_type,".$table1.".post_id,".$table1.".meta_key,".$table1.".meta_value FROM ".$table.",".$table1." WHERE ".$table.".post_type in('my-plugin') and ".$table.".id = ".$table1.".post_id and ".$table1.".meta_key= 'ads_img' and ".$table.".ID = ".$post_id." order by ".$table1.".meta_id desc limit 0,1");
  foreach($results as $k=>$i){
    $content .= "{$i->meta_value}";
  }
  //echo $content;//exit;
  //echo $wpdb->last_query;//exit;
  return "{$content}";
}


function save_team_meta_box($post_id)
{
  global $wpdb;
  //echo "<pre>"; print_r($_FILES['profilepic']);exit;
  //echo "<pre>";print_r($_POST);exit;
  //print_r($_POST['action']);exit;
  $ftype = $_FILES['profilepic']['type'];
  //echo $ftype;exit;
    if($ftype == 'image/png' || $ftype == 'image/jpg' || $ftype == 'image/jpeg' || $ftype == 'image/gif'){

      if($_POST['save']== 'Update'){
        $wpdb->update('wp_posts', array(
                'post_title' => $_POST["mydropdown"]
        ),array( 'ID' => $post_id ));
        //echo $wpdb->last_query;exit;

        if($_FILES['profilepic']['name'] != ''){
            $wpdb->update('wp_postmeta', array(
                'meta_key' => 'ads_img',
                'meta_value' => $_FILES['profilepic']['name']
            ),array( 'post_id' => $post_id,'meta_key' => 'ads_img' )); 
            //echo $wpdb->last_query;exit;
            }
            
      }else{
        //echo $_POST["mydropdown"].'-'.$_FILES['profilepic']['name'];exit;
          if(isset($_POST["mydropdown"]) && $_FILES['profilepic']['name'] != '')
          {
            $post_title = $_POST["mydropdown"];
              //$post_content = $_POST["content"];
              $post_author = $_POST["post_author"];
              $post_ID = $_POST["post_ID"];
              $ads_photo = $_POST["profilepic"];

            $uploads_dir = ABSPATH.'upload/myplugin/';
            if (! is_dir($uploads_dir)) {
                wp_mkdir_p( $uploads_dir, 0700 );
            }

            $uploadedfile = $uploads_dir . $_FILES['profilepic']['name'];
            
            //$move = "/Users/George/Desktop/uploads/".$_FILES['ads_photo']['name'];

            $table = $wpdb->base_prefix.'postmeta';
            $wpdb->insert($table, array(
                    'post_id' => $post_ID,
                    'meta_key' => 'ads_img',
                    'meta_value' => $_FILES['profilepic']['name']
                              //'ads_photo' => $ads_photo
                          )); 
            move_uploaded_file($_FILES['profilepic']['tmp_name'], $uploadedfile);
            //echo $wpdb->last_query;exit;
                
          echo $post_title = $_POST["mydropdown"];
          $table1 = $wpdb->base_prefix.'posts';
          //$where = " ID " => $post_id;

            $wpdb->update('wp_posts', array(
                'post_title' => $post_title
            ),array( 'ID' => $post_id )); 
            //echo $wpdb->last_query;//exit;
        
        }
        //echo ABSPATH.'myplugin/2016/04/'; 
      }
    }/*else{
    
    add_action('admin_footer', 'my_scripts_method');
    function my_scripts_method() {        
     ?>
      <script type="text/javascript">
      jQuery('#publish').on('click',function(){
            alert('please select proper Image.!! \n Only jpeg/png/gif image allowed.');
            jQuery('#profilepic').focus();
            return false;
      });

      </script>
    <?php 
    }
  }*/
}

add_action("save_post", "save_team_meta_box", 10, 3);


 /* function get_front_side_ads_image(){
    //echo 123;
       global $wpdb;
        $table1 = $wpdb->base_prefix.'posts';
        $table2 = $wpdb->base_prefix.'postmeta';
        //$results = $wpdb->get_results("select ".$table2.".post_id,".$table2.".meta_key,".$table2.".meta_value from ".$table2.",".$table1." where ".$table1.".id = ".$table2.".post_id and ".$table1.".post_type = 'adsimageupload' or ".$table1.".post_type = 'my-plugin' and ".$table2.".meta_value != '' and ".$table2.".meta_key='ads_img' order by RAND() limit 0,1");

        $results = $wpdb->get_results("select ".$table2.".post_id,".$table2.".meta_key,".$table2.".meta_value from ".$table2.",".$table1." where ".$table1.".id = ".$table2.".post_id and ".$table1.".post_type = 'my-plugin' and ".$table2.".meta_value != '' and ".$table2.".meta_key='ads_img' order by RAND(),post_id desc limit 0,1");

        foreach($results as $k=>$i){
          $path = "{$i->meta_value}";

          echo "<li><img src='../myplugin/2016/04/$path' width='100%' height='10%' /></li>";
        }
        //echo $wpdb->last_query;exit;
    }*/
    //add_filter( 'woocommerce_before_shop_loop','get_front_side_ads_image');

    /*
    function loop_columns() {
      $myloop = 3; // 4 products per row
      $myloop .= get_front_side_ads_image(); 
      return $myloop;
    }
    add_filter('wc_get_template_part', 'loop_columns', 999);
    */


    // get path for templates used in loop ( like content-product.php )


/********************************* Start Content-product.php file overriding ***************************************/
add_filter( 'wc_get_template_part', function( $template, $slug, $name ) { 
    // Look in plugin/woocommerce/slug-name.php or plugin/woocommerce/slug.php
    if ( $name ) {
        $path = plugin_dir_path( __FILE__ ) . WC()->template_path() . "{$slug}-{$name}.php";    
    } else {
        $path = plugin_dir_path( __FILE__ ) . WC()->template_path() . "{$slug}.php";    
    }
    return file_exists( $path ) ? $path : $template;
}, 10, 3 );
// get path for all other templates.
add_filter( 'woocommerce_locate_template', function( $template, $template_name, $template_path ) { 
    $path = plugin_dir_path( __FILE__ ) . $template_path . $template_name;  
    return file_exists( $path ) ? $path : $template;
}, 10, 3 );
/********************************* End Content-product.php file overriding ***************************************/



}
  

/*add_filter('my_filter1', 'my_callback');
function my_callback( $args ) {
  
  $output="<script>
  var args = '".$args[0].' '.$args[1]."';
  alert(args); </script>";
  echo $output;
    //access values with $args[0], $args[1] etc.
}
$args = array('Hello','World');
apply_filters('my_filter1', $args);
*/


?>