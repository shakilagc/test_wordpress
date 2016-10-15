<?php get_header(); ?>

<div class="container content">
<div class="two_third">
	<?php if ( have_posts() ) : ?>
	<header class="page-header">
		<h2 class="page-title"><?php echo $wp_query->found_posts; ?> <?php printf( __( 'Search Results for: %s', 'tuned-balloon' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		<hr>
		<br>
	</header>
	<!--end page-header-->

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'content', 'search' ); ?>
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
	<?php else : ?>
	<article id="post-0" class="post no-results not-found">
		<header class="page-header">
			<h2 class="page-title">
				<?php _e( 'Nothing Found', 'tuned-balloon' ); ?>
			</h2>
		</header>
		<div class="single-entry-content">
			<p>
				<?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'tuned-balloon' ); ?>
			</p>
			<br>
			<?php get_search_form(); ?>
		</div>
	</article>
	<?php endif; ?>
</div>
<!-- end two_third -->
<div class="one_third lastcolumn">
	<?php get_sidebar(); ?>
</div>
<!-- end container -->
<?php get_footer(); ?>