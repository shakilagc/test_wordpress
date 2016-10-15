<?php get_header(); ?>

<div class="container content category">
	<div class="two_third">
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if (	$wp_query->max_num_pages > 1 ) : ?>
		<nav id="nav-below">
			<div class="nav-previous">
				<?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'tuned-balloon' ) ); ?>
			</div>
			<div class="nav-next">
				<?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'tuned-balloon' ) ); ?>
			</div>
		</nav>
		<!-- end nav-below -->
		<?php endif; ?>
	</div>
	<div class="one_third lastcolumn">
		<?php get_sidebar(); ?>
</div>
<!-- end container -->
<?php get_footer(); ?>