<?php
/* Plugin Name: Faculty
  Description: This plugin registers the 'faculty' post type.
  Version: 1.0
  License: GPLv2
 */
// Faculty Post type

add_action('init', 'faculty_post_type');

function faculty_post_type(){
    register_post_type('faculty', array(
        'labels' => array(
            'name' => __('Faculty'),
            'singular_name' => __('Faculty')
        ),
        'public' => true,
        'has_archive' => true,
    )
            );
}


add_action('init', 'department_tax');

function department_tax() {
register_taxonomy(
      'department',
      array( 'faculty','acme_product' ),
      array( 'hierarchical' => false,
             'label' => __('Department', 'Department'),
             'query_var' => 'department',
             'rewrite' => array( 'slug' => 'department' ),
      )
        
   );
}
//add_action('init', 'department_tax');

//function department_tax() {
//    register_taxonomy(
//            'department', 'faculty', array(
//        'label' => __('Department'),
//        'rewrite' => array('slug' => 'department'),
//        'hierarchical' => true,
//            )
//    );
//}
?>