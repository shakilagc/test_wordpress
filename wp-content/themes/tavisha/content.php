<article id="post-<?php the_ID(); ?>" <?php post_class('post-item column col4'); ?>>
  <?php if ( has_post_thumbnail() ) :?>
  <div class="entry-image">
    <a href="<?php the_permalink();?>">
    <?php
      the_post_thumbnail( 'cat-thumb-tavisha', array( 'alt' => get_the_title() ) );
    ?>
    </a>
  </div>
  <?php endif;?>
  <div class="post-item-inner">
    <?php if ( 'post' == get_post_type() ) : ?>
      <div class="entry-category"><?php the_category(', ');?></div>
      <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
      <div class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></div>
    <?php else : ?>
      <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <?php endif; ?>
  </div>
  <?php
  if ( comments_open() ) :
    echo '<div class="entry-comment-number">';
    echo '<i class="fa fa-comment"></i> ';
    comments_popup_link( '0', '1', '%', 'comments-link', '');
    echo '</div>';
  endif;
  ?>
</article><!-- #post-## -->
