<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="two_third imagegallery">
		<div class="entry-details">
			<?php if ( has_post_thumbnail() ): ?>
			<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('gallery_thumbnail'); ?>
			</a>
			<?php endif; ?>
		</div>
		<!-- end entry-details -->
		<div class="inner">
			<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
			<div class="entry-summary">
				<?php the_excerpt( __( 'More', 'tuned-balloon' ) ); ?>
			</div>
			<!-- end entry-summary -->
			<?php else : ?>
			<?php if ( post_password_required() ) : ?>
			<?php the_content( __( 'More', 'tuned-balloon' ) ); ?>
			<?php else : ?>
			<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID );
				?>
			<!-- end gallery-thumb -->

			<?php endif; ?>
			<div class="entry-post-format">
				<?php the_content( __( 'More', 'tuned-balloon' ) ); ?>
				<?php endif; ?>
			</div>
			<!-- end entry-content-gallery -->
			<?php endif; ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tuned-balloon' ), 'after' => '</div>' ) ); ?>
		</div>
	</div>
	<div class="one_third lastcolumn rightside">
		<div class="inner">
			<div class="entry-post-format clearfix">
				<header class="entry-header">
					<p><span class="date">
						<?php echo get_the_date(); ?>
						</span><br>
						<span class="author">
						<?php the_author(); ?>
						</span></p>
				</header>
				<!-- end entry-header -->
			</div>
			<header class="entry-header clearfix">
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'tuned-balloon' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
					<?php the_title(); ?>
					</a></h3>
			</header>
		</div>
	</div>
</article>
<!-- end post-<?php the_ID(); ?> -->