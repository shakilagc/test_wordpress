<?php get_header();?>
        
<div class="main-content column col9 col8-sm" role="main">
  <div class="main-content-inner">
    <article class="entry-post error-404 not-found">
      <h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'tavisha' ); ?></h1>

      <div class="entry-content">
        <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'tavisha' ); ?></p>

				<?php get_search_form(); ?>
      </div><!-- .entry-content -->
    </article>
    <!-- /.entry-post -->

  </div><!-- .main-content-inner -->
  <div class="content-overflow"></div>
</div><!-- .main-content -->

<?php get_sidebar();?>
<!-- .sidebar -->
<?php get_footer();?>