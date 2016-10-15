<?php

/*-----------------------------------------------------------------------------------

	Name: Anariel Socials Widget
	Description: Home Widget - Socials - 7 song socials

-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'anariel_socials_widgets' );


// Register widget.
function anariel_socials_widgets() {
	register_widget( 'anariel_socials_Widget' );
}

// Widget class.
class anariel_socials_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function __construct() {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'anariel_socials_widget', 'description' => __('Home Widget - Socials - 5 social icons', 'tuned-balloon') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'anariel_socials_widget' );

		/* Create the widget. */
		parent::__construct( 'anariel_socials_widget', __('Anariel Footer Socials Widget', 'tuned-balloon'), $widget_ops, $control_ops );
	}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );

		/* Our variables from the widget settings. */
		$instance['title'] = $instance['title'];

		$link1_url = $instance['link1_url'];
		$image1_url = $instance['image1_url'];
		$image1_title = $instance['image1_title'];

		$link2_url = $instance['link2_url'];
		$image2_url = $instance['image2_url'];
		$image2_title = $instance['image2_title'];

		$link3_url = $instance['link3_url'];
		$image3_url = $instance['image3_url'];
		$image3_title = $instance['image3_title'];

		$link4_url = $instance['link4_url'];
		$image4_url = $instance['image4_url'];
		$image4_title = $instance['image4_title'];

		$link5_url = $instance['link5_url'];
		$image5_url = $instance['image5_url'];
		$image5_title = $instance['image5_title'];




		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?>
<?php /* Display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>

<ul class="socialicons">
	<?php if($link1_url!="") { ?> <li><a href="<?php echo $link1_url; ?>" target="_blank"><img src="<?php echo $image1_url; ?>" alt="<?php echo $image1_title; ?>" /></a></li> <?php } ?>
<?php if($link2_url!="") { ?> <li><a href="<?php echo $link2_url; ?>" target="_blank"><img src="<?php echo $image2_url; ?>" alt="<?php echo $image2_title; ?>" /></a></li> <?php	} ?>
<?php if($link3_url!="") { ?> <li><a href="<?php echo $link3_url; ?>" target="_blank"><img src="<?php echo $image3_url; ?>" alt="<?php echo $image3_title; ?>" /></a></li> <?php } ?>
<?php if($link4_url!="") { ?> <li><a href="<?php echo $link4_url; ?>" target="_blank"><img src="<?php echo $image4_url; ?>" alt="<?php echo $image4_title; ?>" /></a></li> <?php } ?>
<?php if($link5_url!="") { ?> <li><a href="<?php echo $link5_url; ?>" target="_blank"><img src="<?php echo $image5_url; ?>" alt="<?php echo $image5_title; ?>" /></a></li> <?php } ?>
</ul>
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

				'link1_url' => 'https://www.facebook.com/Anariel.Design',
				'image1_url' => 'http://www.anariel.com/intune/wp-content/uploads/2013/08/facebook.png',
			'image1_title' => 'facebook image',

			'link2_url' => 'https://twitter.com/Anariel77',
				'image2_url' => 'http://www.anariel.com/intune/wp-content/uploads/2013/08/twitter.png',
			'image2_title' => 'twitter image',

			'link3_url' => 'https://plus.google.com/u/0/b/111668042102800918091/111668042102800918091/posts',
				'image3_url' => 'http://www.anariel.com/intune/wp-content/uploads/2013/08/google.png',
			'image3_title' => 'google image',

			'link4_url' => 'http://www.youtube.com/channel/UCYaqQyXnkj6-EI5H8IETqEw',
				'image4_url' => 'http://www.anariel.com/intune/wp-content/uploads/2013/08/youtube.png',
			'image4_title' => 'youtube image',

			'link5_url' => 'http://www.anarieldesign.com',
				'image5_url' => 'http://www.anariel.com/intune/wp-content/uploads/2013/08/instagram.png',
			'image5_title' => 'instagram image',


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
	<label for="<?php echo $this->get_field_id( 'link1_url' ); ?>">
		<?php _e('Facebook link URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'link1_url' ); ?>" name="<?php echo $this->get_field_name( 'link1_url' ); ?>" value="<?php echo $instance['link1_url']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'image1_url' ); ?>">
		<?php _e('Facebook Image URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image1_url' ); ?>" name="<?php echo $this->get_field_name( 'image1_url' ); ?>" value="<?php echo $instance['image1_url']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'image1_title' ); ?>">
		<?php _e('Facebook Image Title:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image1_title' ); ?>" name="<?php echo $this->get_field_name( 'image1_title' ); ?>" value="<?php echo $instance['image1_title']; ?>" />
</p>
<hr>
<!-- Widget Title: Text Input -->
<p>
	<label for="<?php echo $this->get_field_id( 'link2_url' ); ?>">
		<?php _e('Twitter link URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'link2_url' ); ?>" name="<?php echo $this->get_field_name( 'link2_url' ); ?>" value="<?php echo $instance['link2_url']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'image2_url' ); ?>">
		<?php _e('Twitter Image URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image2_url' ); ?>" name="<?php echo $this->get_field_name( 'image2_url' ); ?>" value="<?php echo $instance['image2_url']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'image2_title' ); ?>">
		<?php _e('Twitter Image Title:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image2_title' ); ?>" name="<?php echo $this->get_field_name( 'image2_title' ); ?>" value="<?php echo $instance['image2_title']; ?>" />
</p>
<hr>
<!-- Widget Title: Text Input -->
<p>
	<label for="<?php echo $this->get_field_id( 'link3_url' ); ?>">
		<?php _e('Google link URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'link3_url' ); ?>" name="<?php echo $this->get_field_name( 'link3_url' ); ?>" value="<?php echo $instance['link3_url']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'image3_url' ); ?>">
		<?php _e('Google Image URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image3_url' ); ?>" name="<?php echo $this->get_field_name( 'image3_url' ); ?>" value="<?php echo $instance['image3_url']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'image3_title' ); ?>">
		<?php _e('Google Image Title:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image3_title' ); ?>" name="<?php echo $this->get_field_name( 'image3_title' ); ?>" value="<?php echo $instance['image3_title']; ?>" />
</p>
<hr>
<!-- Widget Title: Text Input -->
<p>
	<label for="<?php echo $this->get_field_id( 'link4_url' ); ?>">
		<?php _e('YouTube link URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'link4_url' ); ?>" name="<?php echo $this->get_field_name( 'link4_url' ); ?>" value="<?php echo $instance['link4_url']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'image4_url' ); ?>">
		<?php _e('YouTube Image URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image4_url' ); ?>" name="<?php echo $this->get_field_name( 'image4_url' ); ?>" value="<?php echo $instance['image4_url']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'image4_title' ); ?>">
		<?php _e('YouTube Image Title:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image4_title' ); ?>" name="<?php echo $this->get_field_name( 'image4_title' ); ?>" value="<?php echo $instance['image4_title']; ?>" />
</p>
<hr>
<!-- Widget Title: Text Input -->
<p>
	<label for="<?php echo $this->get_field_id( 'link5_url' ); ?>">
		<?php _e('Instagram link URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'link5_url' ); ?>" name="<?php echo $this->get_field_name( 'link5_url' ); ?>" value="<?php echo $instance['link5_url']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'image5_url' ); ?>">
		<?php _e('Instagram Image URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image5_url' ); ?>" name="<?php echo $this->get_field_name( 'image5_url' ); ?>" value="<?php echo $instance['image5_url']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'image5_title' ); ?>">
		<?php _e('Instagram Image Title:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'image5_title' ); ?>" name="<?php echo $this->get_field_name( 'image5_title' ); ?>" value="<?php echo $instance['image5_title']; ?>" />
</p>
<hr>
<?php
	}
}
?>