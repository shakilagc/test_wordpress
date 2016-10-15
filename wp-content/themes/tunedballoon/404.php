<?php get_header(); ?>

<div class="container content">
<div class="two_third">
	<article id="page">
		<header class="page-entry-header">
			<h2 class="entry-title">
				<?php _e( 'Not Found', 'tuned-balloon' ); ?>
			</h2>
		</header>
		<!-- end page-entry-header -->

		<div class="single-entry-content">
			<p>
				<?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'tuned-balloon' ); ?>
			</p>
			<br>
			<?php get_search_form(); ?>
		</div>
		<script type="text/javascript">
				// focus on search field after it has loaded
				document.getElementById('s') && document.getElementById('s').focus();
			</script>
	</article>
</div>
<!-- end two_third -->
<div class="one_third lastcolumn">
	<?php get_sidebar(); ?>
</div>
<!-- end container -->
<?php get_footer(); ?>