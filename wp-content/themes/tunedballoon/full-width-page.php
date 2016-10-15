<?php
/**
 * Template Name: Full-width, no sidebar
 * Description: A full-width template with no sidebar
 *
 */

get_header(); ?>

<div class="container content page">
	<?php the_post(); ?>
	<?php get_template_part( 'content', 'page' ); ?>
	<?php comments_template( '', true ); ?>
</div>
<!-- end container -->

<?php get_footer(); ?>