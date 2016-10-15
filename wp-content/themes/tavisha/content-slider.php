<?php 
$sticky = get_option( 'sticky_posts' );
$sticky_args = array(
  'posts_per_page' => -1,
  'post__in'  => $sticky,
);
$sticky_query = new WP_Query( $sticky_args );
if ( $sticky_query->have_posts() ) :
?>

<div class="slider-section">
  <div class="big-slider">
    <?php  while ( $sticky_query->have_posts() ) : $sticky_query->the_post(); ?>
    <div class="big-slider-item">
      <?php if ( has_post_thumbnail() ) :?>
      <div class="big-slider-image">
        <?php
          the_post_thumbnail( 'big-slider-tavisha', array( 'alt' => get_the_title() ) );
        ?>
      </div>
      <?php endif;?>
      <div class="big-slider-inner">
        <?php the_title( sprintf( '<h3 class="big-slider-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
        <?php
        echo sprintf( '<a href="%1$s" class="readmore-link"><i class="fa fa-chevron-circle-right"></i>%2$s</a>', esc_url( get_permalink( get_the_ID() ) ),__( 'Read Story', 'tavisha' ));
        ?>
      </div>
    </div>
    <?php endwhile;?>
  </div><!-- .big-slider -->


  <div class="slide-thumbnails-wrapper clearfix">
    <div class="slide-thumbnails">
      <?php  while ( $sticky_query->have_posts() ) : $sticky_query->the_post(); ?>
      <div class="slide-thumb-item">
        <a href="#">
          <?php if ( has_post_thumbnail() ) :?>
          <span class="slide-image">
          <?php
          the_post_thumbnail( 'small-slider-tavisha', array( 'alt' => get_the_title() ) );
          ?>
          </span>
          <?php endif;?>
          <span class="slide-title"><?php the_title();?></span>
        </a>
      </div>
      <?php endwhile;?>
    </div><!-- .slide-thumbnails -->
  </div><!-- .slide-thumbnails-wrapper -->
</div>
<?php endif;?>