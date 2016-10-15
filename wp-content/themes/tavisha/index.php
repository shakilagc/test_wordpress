<?php get_header(); ?>
<div class="main-content column col9 col8-sm" role="main">
  <div class="main-content-inner">
    <?php get_template_part('content','slider');?>
    <!-- /.slider-section -->

    <div class="row">
      <?php
      $args = array(
        'type'                     => 'post',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'name',
        'order'                    => 'ASC',
        'hide_empty'               => 1,
        'hierarchical'             => 1,
        'exclude'                  => '',
        'include'                  => '',
        'number'                   => '',
        'taxonomy'                 => 'category',
        'pad_counts'               => true 
        );
      $categories = get_categories($args);
      if($categories):
      ?>
      <div class="category-list">
        <?php foreach ( $categories as $category ) :?>
        <div class="category-block column col4">
          <h3 class="category-title fa fa-newspaper-o">
            <?php echo '<a rel="bookmark" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';?>
          </h3>
          <?php
          $sticky = get_option( 'sticky_posts' );
          $latest_args = array( 'posts_per_page' => 5, 'post__not_in' => $sticky, 'category' => $category->term_id );
          $latest_posts = get_posts( $latest_args );
          if($latest_posts):
          ?>
          <ul class="category-post-list">
            <?php
            $i = 1;
            foreach ( $latest_posts as $post ) : 
            setup_postdata( $post ); ?>
            <li class="category-post-item">
              <?php if($i==1):?>
              <div class="entry-image">
                <a class="post-thumbnail" href="<?php the_permalink();?>">
                  <?php
                    the_post_thumbnail( 'archive-thumb-tavisha', array( 'alt' => get_the_title() ) );
                  ?>
                </a>
              </div>
              <?php endif;?>
              <h4 class="category-post-title">
                <a rel="bookmark" href="<?php the_permalink();?>"><span><?php the_title();?></span></a>
              </h4>
            </li>
            <?php 
            $i++;
            endforeach;
            wp_reset_postdata(); ?>
          </ul>
          <?php endif;?>
        </div><!-- .category-block -->
        <?php endforeach;?>

      </div><!-- .category-list -->
      <?php endif;?>
    </div><!-- .row -->
  </div><!-- .main-content-inner -->
  <div class="content-overflow"></div>
</div><!-- .main-content -->

<?php get_sidebar();?>
<!-- .sidebar -->
<?php get_footer(); ?>