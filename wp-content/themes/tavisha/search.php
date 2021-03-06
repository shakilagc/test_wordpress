<?php get_header();?>  
<div class="main-content column col9 col8-sm" role="main">
  <div class="main-content-inner">
    <?php if ( have_posts() ) : ?>
    <div class="archive-heading">
      <h3 class="archive-title"><?php printf( __( 'Search Results for: %s', 'tavisha' ), get_search_query() ); ?></h3>
    </div><!-- .archive-heading -->

    <div class="post-list clearfix">
      <?php while ( have_posts() ) : the_post();?>
        <?php get_template_part( 'content', get_post_format() );?>
      <?php endwhile;?>
    </div>
    <!-- /.post-list -->

    <?php tavisha_paging_nav();?>
 
    <?php
    else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif;
		?>

  </div><!-- .main-content-inner -->
  <div class="content-overflow"></div>
</div><!-- .main-content -->

<?php get_sidebar();?>
<!-- .sidebar -->
<?php get_footer();?>