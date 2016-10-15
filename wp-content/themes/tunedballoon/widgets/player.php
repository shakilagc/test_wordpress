<?php

/*-----------------------------------------------------------------------------------

	Name: Anariel Player Widget
	Description: Home Widget - Player - 7 song player

-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'anariel_player_widgets' );


// Register widget.
function anariel_player_widgets() {
	register_widget( 'anariel_player_Widget' );
}

// Widget class.
class anariel_player_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function __construct() {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'anariel_player_widget', 'description' => __('Home Widget - Player - 7 song player', 'tuned-balloon') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'anariel_player_widget' );

		/* Create the widget. */
		parent::__construct( 'anariel_player_widget', __('Anariel Player Widget', 'tuned-balloon'), $widget_ops, $control_ops );
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

		$song_link1 = $instance['song_link1'];
		$song_link2 = $instance['song_link2'];
		$song_link3 = $instance['song_link3'];
		$song_link4 = $instance['song_link4'];
		$song_link5 = $instance['song_link5'];
		$song_link6 = $instance['song_link6'];
		$song_link7 = $instance['song_link7'];

		$song_text1 = $instance['song_text1'];
		$song_text2 = $instance['song_text2'];
		$song_text3 = $instance['song_text3'];
		$song_text4 = $instance['song_text4'];
		$song_text5 = $instance['song_text5'];
		$song_text6 = $instance['song_text6'];
		$song_text7 = $instance['song_text7'];

		$box_text1 = $instance['box_text1'];
		$box_text2 = $instance['box_text2'];


		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?>
<?php /* Display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>

<div class="button"> <img class="record" src="<?php echo $image_url; ?>" alt="<?php echo $image_title; ?>" />
	<button class="cn-button" id="cn-button">Play</button>
	<div class="cn-wrapper" id="cn-wrapper">
		<ul>
			<li><a href="<?php echo $song_link1; ?>" target="_blank"><span><?php echo $song_text1; ?></span></a></li>
			<li><a href="<?php echo $song_link2; ?>" target="_blank"><span><?php echo $song_text2; ?></span></a></li>
			<li><a href="<?php echo $song_link3; ?>" target="_blank"><span><?php echo $song_text3; ?></span></a></li>
			<li><a href="<?php echo $song_link4; ?>" target="_blank"><span><?php echo $song_text4; ?></span></a></li>
			<li><a href="<?php echo $song_link5; ?>" target="_blank"><span><?php echo $song_text5; ?></span></a></li>
			<li><a href="<?php echo $song_link6; ?>" target="_blank"><span><?php echo $song_text6; ?></span></a></li>
			<li><a href="<?php echo $song_link7; ?>" target="_blank"><span><?php echo $song_text7; ?></span></a></li>
		</ul>
	</div>
	<!-- End of Nav Structure -->
</div>
<div class="lines special"> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> </div>

<p class="special"><?php echo $box_text1; ?> <br><span class="color"><?php echo $box_text2; ?></span>

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

				'song_link1' => 'http://www.anariel.com/testwp/wp-content/uploads/2012/07/originaldixielandjazzbandwithalbernard-stlouisblues.mp3',
			'song_text1' => 'Song 1',

			'song_link2' => 'http://www.anariel.com/testwp/wp-content/uploads/2012/07/originaldixielandjazzbandwithalbernard-stlouisblues.mp3',
			'song_text2' => 'Song 2',

			'song_link3' => 'http://www.anariel.com/testwp/wp-content/uploads/2012/07/originaldixielandjazzbandwithalbernard-stlouisblues.mp3',
			'song_text3' => 'Song 3',

			'song_link4' => 'http://www.anariel.com/testwp/wp-content/uploads/2012/07/originaldixielandjazzbandwithalbernard-stlouisblues.mp3',
			'song_text4' => 'Song 4',

			'song_link5' => 'http://www.anariel.com/testwp/wp-content/uploads/2012/07/originaldixielandjazzbandwithalbernard-stlouisblues.mp3',
			'song_text5' => 'Song 5',

			'song_link6' => 'http://www.anariel.com/testwp/wp-content/uploads/2012/07/originaldixielandjazzbandwithalbernard-stlouisblues.mp3',
			'song_text6' => 'Song 6',

			'song_link7' => 'http://www.anariel.com/testwp/wp-content/uploads/2012/07/originaldixielandjazzbandwithalbernard-stlouisblues.mp3',
			'song_text7' => 'Song 7',

			'box_text1' => 'Songs from our latest album In Tune',
			'box_text2' => 'play button'

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
	<label for="<?php echo $this->get_field_id( 'song_link1' ); ?>">
		<?php _e('First Song Link URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'song_link1' ); ?>" name="<?php echo $this->get_field_name( 'song_link1' ); ?>" value="<?php echo $instance['song_link1']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'song_text1' ); ?>">
		<?php _e('First Song Link Text:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'song_text1' ); ?>" name="<?php echo $this->get_field_name( 'song_text1' ); ?>" value="<?php echo $instance['song_text1']; ?>" />
</p>
<hr>
<p>
	<label for="<?php echo $this->get_field_id( 'song_link2' ); ?>">
		<?php _e('Second Song Link URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'song_link2' ); ?>" name="<?php echo $this->get_field_name( 'song_link2' ); ?>" value="<?php echo $instance['song_link2']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'song_text2' ); ?>">
		<?php _e('Second Song Link Text:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'song_text2' ); ?>" name="<?php echo $this->get_field_name( 'song_text2' ); ?>" value="<?php echo $instance['song_text2']; ?>" />
</p>
<hr>
<p>
	<label for="<?php echo $this->get_field_id( 'song_link3' ); ?>">
		<?php _e('Third Song Link URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'song_link3' ); ?>" name="<?php echo $this->get_field_name( 'song_link3' ); ?>" value="<?php echo $instance['song_link3']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'song_text3' ); ?>">
		<?php _e('Third Song Link Text:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'song_text3' ); ?>" name="<?php echo $this->get_field_name( 'song_text3' ); ?>" value="<?php echo $instance['song_text3']; ?>" />
</p>
<hr>
<p>
	<label for="<?php echo $this->get_field_id( 'song_link4' ); ?>">
		<?php _e('Fourth Song Link URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'song_link4' ); ?>" name="<?php echo $this->get_field_name( 'song_link4' ); ?>" value="<?php echo $instance['song_link4']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'song_text4' ); ?>">
		<?php _e('Fourth Song Link Text:', 'tuned-balloon') ?>
	</label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'song_text4' ); ?>" name="<?php echo $this->get_field_name( 'song_text4' ); ?>" value="<?php echo $instance['song_text4']; ?>" />
</p>
<hr>
<p>
	<label for="<?php echo $this->get_field_id( 'song_link5' ); ?>">
		<?php _e('Fifth Song Link URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'song_link5' ); ?>" name="<?php echo $this->get_field_name( 'song_link5' ); ?>" value="<?php echo $instance['song_link5']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'song_text5' ); ?>">
		<?php _e('Fifth Song Link Text:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'song_text5' ); ?>" name="<?php echo $this->get_field_name( 'song_text5' ); ?>" value="<?php echo $instance['song_text5']; ?>" />
</p>
<hr>
<p>
	<label for="<?php echo $this->get_field_id( 'song_link6' ); ?>">
		<?php _e('Sexth Song Link URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'song_link6' ); ?>" name="<?php echo $this->get_field_name( 'song_link6' ); ?>" value="<?php echo $instance['song_link6']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'song_text6' ); ?>">
		<?php _e('Sexth Song Link Text:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'song_text6' ); ?>" name="<?php echo $this->get_field_name( 'song_text6' ); ?>" value="<?php echo $instance['song_text6']; ?>" />
</p>
<hr>
<p>
	<label for="<?php echo $this->get_field_id( 'song_link7' ); ?>">
		<?php _e('Seventh Song Link URL:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'song_link7' ); ?>" name="<?php echo $this->get_field_name( 'song_link7' ); ?>" value="<?php echo $instance['song_link7']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'song_text7' ); ?>">
		<?php _e('Seventh Song Link Text:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'song_text7' ); ?>" name="<?php echo $this->get_field_name( 'song_text7' ); ?>" value="<?php echo $instance['song_text7']; ?>" />
</p>
<hr>
<p>
	<label for="<?php echo $this->get_field_id( 'box_text1' ); ?>">
		<?php _e('Text box under player - first part:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'box_text1' ); ?>" name="<?php echo $this->get_field_name( 'box_text1' ); ?>" value="<?php echo $instance['box_text1']; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'box_text2' ); ?>">
		<?php _e('Text box under player - second part:', 'tuned-balloon') ?>
	</label>
	<input type="text" id="<?php echo $this->get_field_id( 'box_text2' ); ?>" name="<?php echo $this->get_field_name( 'box_text2' ); ?>" value="<?php echo $instance['box_text2']; ?>" />
</p>
<hr>
<?php
	}
}
?>