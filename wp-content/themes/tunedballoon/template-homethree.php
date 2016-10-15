<?php
/**
 * Template Name: Home Version Three - Static Page
 *
 */

get_header( 'custom' ); ?>
<div class="component">
	<div class="container">
		<!-- Start Nav Structure -->
		<div class="one_third_main">
			<?php get_sidebar( 'hometourdates' ); ?>
		</div>
		<div class="one_third_main buttoncircle">
		<div class="clearfix">
			 <?php get_sidebar( 'homemusic' ); ?>
		</div>
			 <?php get_sidebar( 'homebio' ); ?>
		</div>
		<div class="one_third_main lastcolumn">
		<?php get_sidebar( 'homelatestnews' ); ?>
		</div>
	</div>
</div>

<div class="container">
	<?php the_post(); ?>
	<?php get_template_part( 'content', 'home' ); ?>
</div>
<!-- end container -->

<?php get_footer(); ?>