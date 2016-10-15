<?php

/*-----------------------------------------------------------------------------------

	Name: Anariel Record Link Widget
	Description: Home Widget - Record Link

-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'anariel_recordlink_widgets' );


// Register widget.
function anariel_recordlink_widgets() {
	register_widget( 'anariel_recordlink_Widget' );
}

// Widget class.
class anariel_recordlink_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function __construct() {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'anariel_recordlink_widget', 'description' => __('Home Widget - Record Link - instead of player add button link to the page where your songs are listed', 'tuned-balloon') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'anariel_recordlink_widget' );

		/* Create the widget. */
		parent::__construct( 'anariel_recordlink_widget', __('Anariel Record Image with Button Widget', 'tuned-balloon'), $widget_ops, $control_ops );
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

		$button_link = $instance['button_link'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?>
<?php /* Display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>

<div class="button"> <img class="record" src="<?php echo $image_url; ?>" alt="<?php echo $image_title; ?>" />
	<button class="cn-button">
	<a class="circlelink" href="<?php echo $button_link; ?>">Music</a>
	</button>
</div>
<div class="lines special"> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> </div>
<br>

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

				'image_url' => 'http://www.anariel.com/intune/wp-content/uploads/2013/08/record3.png',
			'image_title' => 'record image',

				'button_link' => 'http://www.anariel.com/intune/category/discography/'

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
		<?php _e('Record Image URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" value="<?php echo $instance['image_url']; ?>" />
</p>

<!-- Description: Text Input -->

<p>
	<label for="<?php echo $this->get_field_id( 'image_title' ); ?>">
		<?php _e('Record Image Title:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image_title' ); ?>" name="<?php echo $this->get_field_name( 'image_title' ); ?>" value="<?php echo $instance['image_title']; ?>" />
</p>
<hr>
<p>
	<label for="<?php echo $this->get_field_id( 'button_link' ); ?>">
		<?php _e('Button Link URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_link' ); ?>" name="<?php echo $this->get_field_name( 'button_link' ); ?>" value="<?php echo $instance['button_link']; ?>" />
</p>
<hr>
<?php
	}
}
?>