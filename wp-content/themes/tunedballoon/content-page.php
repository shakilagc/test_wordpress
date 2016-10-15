<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-entry-content">
		<?php the_content( __( 'Continue Reading', 'tuned-balloon' ) ); ?>
		<div class="clear"></div>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tuned-balloon' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'tuned-balloon' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
	<!--end entry-content-->

</article>
<!-- end post-<?php the_ID(); ?> -->