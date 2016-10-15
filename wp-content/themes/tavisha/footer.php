    </div>
  </div>
  <!-- .main-section -->

  
  <footer class="footer-section container">
    <div class="row">
      <div class="column col8 col6-xs">
        <div class="footer-logo logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        </div>
        <div class="copyrights">
        <?php do_action( 'tavisha_credits' );?>
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'tavisha' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'tavisha' ), 'WordPress' ); ?></a>
        </div>
      </div>

      <?php if ( has_nav_menu( 'social' ) ) :
          // Social links navigation menu.
          wp_nav_menu( array(
            'theme_location'  => 'social',
            'depth'           => 1,
            'container'       => 'div',
            'container_class' => 'column col4 col6-xs',
            'container_id'    => '',
            'menu_class'      => 'social-links text-right',
          ) );
      endif;?>
    </div>
  </footer>
  <!-- .footer-section -->
    
  <?php if ( has_nav_menu( 'primary' ) ) : ?>
  <div class="mobile-menu-wrapper" id="mobile-menu-target">
    <div class="mm-inner">
    
      <a href="#page" class="hide-menu"><i class="fa fa-times"></i> <?php echo __('Hide Navigation','tavisha');?></a>
      
      <?php
      // Primary navigation menu.
      wp_nav_menu( array(
        'container_class' => 'mobile-menu',
        'menu_class'      => '',
        'theme_location'  => 'primary',
      ) );
      ?>

    </div>
  </div>
  <!-- .mobile-menu -->
  <?php endif;?>

</div>
<!-- /.main-wrapper -->
<?php wp_footer(); ?>
</body>
</html>