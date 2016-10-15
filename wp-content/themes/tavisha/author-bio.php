<div class="author-info">
	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 80 );?>
	</div><!-- .author-avatar -->

	<div class="author-description">
		<h4 class="author-title"><?php echo get_the_author(); ?></h4>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p><!-- .author-bio -->

	</div><!-- .author-description -->
</div><!-- .author-info -->
