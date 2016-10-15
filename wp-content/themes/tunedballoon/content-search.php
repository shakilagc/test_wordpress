<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header clearfix">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'tuned-balloon' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php the_title(); ?>
			</a></h2>
	</header>
	<!-- end entry-header -->

	<div class="entry-details">
		<?php if ( has_post_thumbnail() ): ?>
		<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail(); ?>
		</a>
		<?php endif; ?>
	</div>
	<!-- end entry-details -->

	<div class="entry-content">
		<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
		<?php the_excerpt(); ?>
		<?php else : ?>
		<?php the_content( __( 'Continue Reading', 'tuned-balloon' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tuned-balloon' ), 'after' => '</div>' ) ); ?>
		<?php endif; ?>
		<footer class="entry-meta">
			<p>
				<?php if ( count( get_the_category() ) ) : ?>
				<?php printf( __( 'Categories: %2$s', 'tuned-balloon' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?> <span class="devider">&bull;</span>
				<?php endif; ?>
				<?php $tags_list = get_the_tag_list( '', ', ' );
			if ( $tags_list ): ?>
				<?php printf( __( 'Tags: %2$s', 'tuned-balloon' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?> <span class="devider">&bull;</span>
				<?php endif; ?>
				<a href="<?php echo get_permalink(); ?>">
				<?php _e( 'Permalink ', 'tuned-balloon' ); ?>
				</a>
				<?php edit_post_link( __( 'Edit', 'tuned-balloon' ), '<span class="devider">&bull;</span> <span class="edit-link">', '</span>' ); ?>
			</p>
		</footer>
		<!-- end entry-meta -->
	</div>
	<!-- end entry-content -->

</article>
<!-- end post-<?php the_ID(); ?> -->