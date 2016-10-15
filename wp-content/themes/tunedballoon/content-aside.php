<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
			<?php the_content( __( 'Continue reading', 'tuned-balloon' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tuned-balloon' ), 'after' => '</div>' ) ); ?>
	</div>
	<!-- end entry-content -->
</article>
<!-- end post-<?php the_ID(); ?> -->