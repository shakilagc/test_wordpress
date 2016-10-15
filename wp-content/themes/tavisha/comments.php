<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comment-section">
  <div class="comment-list-wrapper">
	<?php if ( have_comments() ) : ?>
    <div class="comment-header">
      <div class="comment-number"><?php echo number_format_i18n( get_comments_number() );?></div>
      <h3><?php echo __('Responses','tavisha');?></h3>
      <p><?php echo __('Write your opinion right <a href="#respond">here</a>','tavisha');?></p>
    </div><!-- .comment-header -->

		<ol class="commentlist">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 80,
          'callback'    => 'tavisha_comment_callback'
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation clearfix" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'tavisha' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'tavisha' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'tavisha' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'tavisha' ); ?></p>
	<?php endif; ?>

	<?php 
  $commenter = wp_get_current_commenter();
  $req = get_option( 'require_name_email' );
  $aria_req = ( $req ? " aria-required='true'" : '' );
 
  $fields =  array(

    'author' =>
      '<p class="comment-form-author">' .
      '<input id="author" placeholder="' . __( 'Your Name', 'tavisha' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' /></p>',

    'email' =>
      '<p class="comment-form-email">' .
      '<input id="email" placeholder="' . __( 'Your Email', 'tavisha' ) . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /></p>',

    'url' =>
      '<p class="comment-form-url">' .
      '<input id="url" placeholder="' . __( 'Website', 'tavisha' ) . '" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" /></p>',
  );
  comment_form(array(
    'title_reply'       => __( 'Leave Response', 'tavisha' ),
    'title_reply_to'    => __( 'Leave Response to %s', 'tavisha' ),
    'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8"     aria-required="true"></textarea></p>',
    'fields' => apply_filters( 'comment_form_default_fields', $fields ),
  )); ?>
  </div>
</div><!-- .comments-area -->
