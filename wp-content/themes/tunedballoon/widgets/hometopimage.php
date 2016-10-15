<?php

/*-----------------------------------------------------------------------------------

	Name: Anariel Home Top Image Widget
	Description: Home Top Image Widget

-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'anariel_hometopimg_widgets' );


// Register widget.
function anariel_hometopimg_widgets() {
	register_widget( 'anariel_hometopimg_Widget' );
}

// Widget class.
class anariel_hometopimg_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function __construct() {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'anariel_hometopimg_widget', 'description' => __('Home Widget - Top Image - upload your top image', 'tuned-balloon') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'anariel_hometopimg_widget' );

		/* Create the widget. */
		parent::__construct( 'anariel_hometopimg_widget', __('Anariel Home Top Image', 'tuned-balloon'), $widget_ops, $control_ops );
	}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );

		/* Our variables from the widget settings. */
		$instance['title'] = $instance['title'];

		$image_url = $instance['image_url'];
		$image_title = $instance['image_title'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?>
<?php /* Display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>

<img class="headerimage" src="<?php echo $image_url; ?>" alt="<?php echo $image_title; ?>" />
<div class="lines1"> <span class="line1 type1"></span> <span class="line1 type2"></span> </div>
	<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(

				'title' => '',

				'image_url' => 'http://www.anariel.com/intune/wp-content/uploads/2013/08/header4.jpg',
			'image_title' => 'home top image',


		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<!-- Widget Title: Text Input -->
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<?php _e('Title:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
</p>
<hr>
<!-- Widget Title: Text Input -->
<p>
	<label for="<?php echo $this->get_field_id( 'image_url' ); ?>">
		<?php _e('Home Top Image URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" value="<?php echo $instance['image_url']; ?>" />
</p>

<!-- Description: Text Input -->

<p>
	<label for="<?php echo $this->get_field_id( 'image_title' ); ?>">
		<?php _e('Home Top Image Title:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image_title' ); ?>" name="<?php echo $this->get_field_name( 'image_title' ); ?>" value="<?php echo $instance['image_title']; ?>" />
</p>
<hr>
<?php
	}
}
?>