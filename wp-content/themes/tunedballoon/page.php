<?php get_header(); ?>

<div class="container content page">
<div class="two_third">
	<?php the_post(); ?>
	<?php get_template_part( 'content', 'page' ); ?>
	<?php comments_template( '', true ); ?>
</div>
<!-- end two_third -->
<div class="one_third lastcolumn">
	<?php get_sidebar(); ?>
</div>
<!-- end container -->
<?php get_footer(); ?>