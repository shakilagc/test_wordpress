<?php
/* Plugin Name: Student
  Description: This plugin registers the 'student' post type.
  Version: 1.0
  License: GPLv2
 */
// Student Post type

add_action('init', 'create_post_type');

function create_post_type() {
    register_post_type('acme_product', array(
        'labels' => array(
            'name' => __('Student'),
            'singular_name' => __('Student')
        ),
        'public' => true,
        'has_archive' => true,
            )
    );
}

//add_action('init', 'department_tax');
//
//function department_tax() {
//    register_taxonomy(
//            'department', 'acme_product', array(
//        'label' => __('Department'),
//        'rewrite' => array('slug' => 'department'),
//        'hierarchical' => true,
//            )
//    );
//}
?>

<?php // get_sidebar('deparment');  ?>

<?php
/* * ******************************************************************************************** */
/* Add Sidebar Support */
/* * ******************************************************************************************** */
if (function_exists('register_sidebar')) {

    register_sidebar(
            array(
                'name' => __('Deparment Sidebar', 'the-bootstrap'),
                'id' => 'deparment',
                'description' => __('The deparment Sidebar', 'the-bootstrap'),
                'before_widget' => '<div class="card" >',
                'after_widget' => '</div> <!-- end footer-widget -->',
                'before_title' => '<h3 class="card-heading simple">',
                'after_title' => '</h3>'
            )
    );
}

class My_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'my_widget',
            'description' => 'My Widget is awesome',
        );
        parent::__construct('my_widget', 'My Widget', $widget_ops);
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    function widget($args, $instance) {
        global $post;
        extract($args);

        // Widget options
        if (array_key_exists('title', $instance)) {
            $title = apply_filters('widget_title', $instance['title']); // Title
        } else {
            $title = '';
        }
        if (array_key_exists('taxonomy', $instance)) {
            $this_taxonomy = $instance['taxonomy']; // Taxonomy to show
        } else {
            $this_taxonomy = '';
        }

        // Dropdown doesn't work for built-in taxonomies.
        $builtin = array('post_tag', 'post_format', 'category');
        if ($dropdown && in_array($this_taxonomy, $builtin)) {
            $dropdown = false;
        }
        // Output
        $tax = $this_taxonomy;
        echo $before_widget;
        echo '<div id="lct-widget-' . $tax . '-container" class="list-custom-taxonomy-widget">';
        if ($title)
            echo $before_title . $title . $after_title;
        if ($dropdown) {
            $taxonomy_object = get_taxonomy($tax);
            $args = array(
                'name' => $taxonomy_object->query_var,
                'id' => 'lct-widget-' . $tax,
                'depth' => 0,
                'taxonomy' => $tax,
                'hide_if_empty' => true,
            );
            echo '<form action="' . get_bloginfo('url') . '" method="get">';
            wp_dropdown_categories($args);
            echo '<input type="submit" value="go &raquo;" /></form>';
        } else {
            $args = array(
                'title_li' => '',
                'show_option_none' => 'No Categories',
                'number' => null,
                'echo' => 1,
                'depth' => 0,
                'taxonomy' => $tax,
            );
            echo '<ul id="lct-widget-' . $tax . '">';
            wp_list_categories($args);
            echo '</ul>';
        }
        echo '</div>';
        echo $after_widget;
    }

    /** Widget control update */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['taxonomy'] = strip_tags($new_instance['taxonomy']);

        return $instance;
    }

    /**
     * Widget settings
     * */
    function form($instance) {
        // instance exist? if not set defaults
        if ($instance) {
            $title = $instance['title'];
            $this_taxonomy = $instance['taxonomy'];
        } else {
            //These are our defaults
            $title = '';

            $this_taxonomy = 'category'; //this will display the category taxonomy, which is used for normal, built-in posts
        }

        // The widget form 
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __('Title:'); ?></label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php echo __('Select Taxonomy:'); ?></label>
            <select name="<?php echo $this->get_field_name('taxonomy'); ?>" id="<?php echo $this->get_field_id('taxonomy'); ?>" class="widefat" style="height: auto;" size="4">
        <?php
        $args = array(
            'public' => true,
            '_builtin' => false //these are manually added to the array later
        );
        $output = 'names'; // or objects
        $operator = 'and'; // 'and' or 'or'
        $taxonomies = get_taxonomies($args, $output, $operator);
        $taxonomies[] = 'category';
        $taxonomies[] = 'post_tag';
        $taxonomies[] = 'post_format';
        foreach ($taxonomies as $taxonomy) {
            ?>
                    <option value="<?php echo $taxonomy; ?>" <?php if ($taxonomy == $this_taxonomy) {
                echo 'selected="selected"';
            } ?>><?php echo $taxonomy; ?></option>
                <?php } ?>
            </select>
        </p>

        <?php
    }

}

add_action('widgets_init', function() {
    register_widget('My_Widget');
});
?>