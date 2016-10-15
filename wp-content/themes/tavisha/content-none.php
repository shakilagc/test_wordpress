<div class="archive-heading">
  <h3 class="archive-title"><?php _e( 'Nothing Found', 'tavisha' ); ?></h3>
</div><!-- .archive-heading -->

<article class="entry-post">
  <div class="entry-post-inner">
    <div class="entry-content">
      <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

      <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'tavisha' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

    <?php elseif ( is_search() ) : ?>

      <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tavisha' ); ?></p>
      <?php get_search_form(); ?>

    <?php else : ?>

      <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'tavisha' ); ?></p>
      <?php get_search_form(); ?>

    <?php endif; ?>
    </div>
  </div>  
</article><!-- .post-item -->