<?php get_header();?>
        
<div class="main-content column col9 col8-sm" role="main">
  <div class="main-content-inner">
    <?php while ( have_posts() ) : the_post();?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('entry-post'); ?>>
      <?php the_title( '<h1 class="entry-title">', '</h1>' );?>
      <?php edit_post_link( __( 'Edit', 'tavisha' ), '<span class="edit-link">', '</span>' ); ?>
      <?php if ( has_post_thumbnail() ) :?>
      <div class="entry-image">
        <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );?>
      </div>
      <?php endif;?>

      <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        the_content();

        wp_link_pages( array(
          'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tavisha' ) . '</span>',
          'after'       => '</div>',
          'link_before' => '<span>',
          'link_after'  => '</span>',
          'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tavisha' ) . ' </span>%',
          'separator'   => '<span class="screen-reader-text">, </span>',
        ) );
        ?>
      </div><!-- .entry-content -->
    </article>
    <!-- /.entry-post -->
    
    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;
    ?>
    <!-- #comments -->
    <?php endwhile;?>

  </div><!-- .main-content-inner -->
  <div class="content-overflow"></div>
</div><!-- .main-content -->

<?php get_sidebar();?>
<!-- .sidebar -->
<?php get_footer();?>