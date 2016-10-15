<?php
/**
 * Template Name: Custom Full Page - without header image
 *
 */

get_header( 'custom' ); ?>

<div class="container content page fullpage">
	<?php the_post(); ?>
	<?php get_template_part( 'content', 'page' ); ?>
	<?php comments_template( '', true ); ?>
</div>
<!-- end container -->

<?php get_footer(); ?>