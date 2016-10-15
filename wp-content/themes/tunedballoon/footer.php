<div class="socials">
	<div class="container">
	<?php get_sidebar( 'homesocials' ); ?>
	</div>
	<!-- end container -->
</div>

<div class="footer">
	<div class="container">
		<div class="clearfix">
			<p class="copyright"><?php if( get_theme_mod( 'hide_copyright' ) == '') { ?>
			<?php esc_attr_e('&copy;', 'tuned-balloon'); ?>
			<a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"> <?php echo get_theme_mod( 'copyright_textbox', 'No copyright information has been saved yet.' ); ?> </a>
			<?php } // end if ?></p>
		</div>
		<!-- end clearfix -->

	</div>
	<!-- end container -->
</div>
<?php wp_footer(); ?>
</body></html>