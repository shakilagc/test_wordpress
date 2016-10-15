<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="two_third entry-content">
		<div class="innerpart">
		<h2 class="entry-title"><?php the_title(); ?></h2>
			<?php the_content( __( 'Continue reading', 'tuned-balloon' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tuned-balloon' ), 'after' => '</div>' ) ); ?>
		</div>
		<div class="lines"> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> </div>
	</div>
	<!-- end entry-content -->
	<aside class="one_third lastcolumn">
		<div class="entry-details">
			<p><span class="date">
				<?php echo get_the_date(); ?>
				</span></p>
				 <?php if ( has_post_thumbnail() ): ?>
		<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('audio_thumbnail'); ?>
		</a>
		<?php endif; ?>
		</div>
		<!-- end entry-details -->
	</aside>
</article>
<!-- end post-<?php the_ID(); ?> -->