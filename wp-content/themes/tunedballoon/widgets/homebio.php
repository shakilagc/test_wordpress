<?php

/*-----------------------------------------------------------------------------------

	Name: Anariel Home Bio Widget
	Description: Home Widget - Home Bio

-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'anariel_homebio_widgets' );


// Register widget.
function anariel_homebio_widgets() {
	register_widget( 'anariel_homebio_Widget' );
}

// Widget class.
class anariel_homebio_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function __construct() {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'anariel_homebio_widget', 'description' => __('Home Widget - Home Bio', 'tuned-balloon') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'anariel_homebio_widget' );

		/* Create the widget. */
		parent::__construct( 'anariel_homebio_widget', __('Anariel Home Bio Widget', 'tuned-balloon'), $widget_ops, $control_ops );
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

		$text_widget = $instance['text_widget'];
		$more_linkurl = $instance['more_linkurl'];
		$more_linktext = $instance['more_linktext'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?>

<div class="homewidgetbio special">
	<h3 class="widget-title"><?php echo $title; ?></h3>
	<img src="<?php echo $image_url; ?>" alt="<?php echo $image_title; ?>" class="aligncenter">
	<div class="textwidget"> <?php echo $text_widget; ?> <br>
		<a class="more-link" href="<?php echo $more_linkurl; ?>"><?php echo $more_linktext; ?></a></div>
</div>
<div class="lines special one"> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> </div>
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

				'title' => 'TUNED BALLOON BIO',

				'image_url' => 'http://www.anariel.com/intune/wp-content/uploads/2013/08/bio1.jpg',
			'image_title' => 'bio image',

				'text_widget' => 'This theme uses WordPress feature called Post Formats. Using Post Formats posts can be styled differently and independently of each other. This post, for example, is a standard post Using Post Formats posts can be styled differently and independently of each other. ',

			'more_linkurl' => 'http://www.anariel.com/intune/bio/',
			'more_linktext' => 'Find out more'

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
		<?php _e('Bio Image URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" value="<?php echo $instance['image_url']; ?>" />
</p>

<!-- Description: Text Input -->

<p>
	<label for="<?php echo $this->get_field_id( 'image_title' ); ?>">
		<?php _e('Bio Image Title:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image_title' ); ?>" name="<?php echo $this->get_field_name( 'image_title' ); ?>" value="<?php echo $instance['image_title']; ?>" />
</p>
<hr>
<p>
	<label for="<?php echo $this->get_field_id( 'text_widget' ); ?>">
		<?php _e('Text Part:', 'tuned-balloon') ?>
	</label>
	<textarea type="text"	id="<?php echo $this->get_field_id( 'text_widget' ); ?>" name="<?php echo $this->get_field_name( 'text_widget' ); ?>"><?php echo $instance['text_widget']; ?></textarea>
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'more_linkurl' ); ?>">
		<?php _e('Find our more link url:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'more_linkurl' ); ?>" name="<?php echo $this->get_field_name( 'more_linkurl' ); ?>" value="<?php echo $instance['more_linkurl']; ?>" />
</p>
<hr>
<p>
	<label for="<?php echo $this->get_field_id( 'more_linktext' ); ?>">
		<?php _e('Find out more link text:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'more_linktext' ); ?>" name="<?php echo $this->get_field_name( 'more_linktext' ); ?>" value="<?php echo $instance['more_linktext']; ?>" />
</p>
<hr>
<?php
	}
}
?>