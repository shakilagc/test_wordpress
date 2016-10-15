<?php
/**
 * Template Name: Bio Page
 *
 */

get_header(); ?>

<div class="container content page aboutpage">
	<div class="one_third">
		<div class="entry-details about">
			<?php if ( has_post_thumbnail() ): ?>
			<div class="circleimage"><?php the_post_thumbnail('about_thumbnail'); ?></div>
			<?php endif; ?>
		</div>
		<!-- end entry-details -->
	</div>
	<div class="two_third lastcolumn">
		<div class="aboutcontent">
		<?php the_post(); ?>
		<?php get_template_part( 'content', 'page' ); ?>
		<?php comments_template( '', true ); ?>
	</div>
	</div>
</div>
<!-- end container -->

<?php get_footer(); ?>