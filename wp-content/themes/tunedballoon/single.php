<?php get_header(); ?>

<div class="container content single">
<div class="two_third">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'content', get_post_format() ); ?>
	<?php comments_template( '', true ); ?>
	<?php endwhile; // end of the loop. ?>
	<nav id="nav-below">
		<div class="nav-previous">
			<?php previous_post_link( '%link', __( '&larr;	Previous Post', 'tuned-balloon' ) . '' ); ?>
		</div>
		<div class="nav-next">
			<?php next_post_link( '%link', __( 'Next Post &rarr;', 'tuned-balloon' ) . '' ); ?>
		</div>
	</nav>
	<!-- end nav-below -->
</div>
<!-- end two_third -->
<div class="one_third lastcolumn">
	<?php get_sidebar(); ?>
</div>
<!-- end container -->
<?php get_footer(); ?>