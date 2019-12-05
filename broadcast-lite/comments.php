<?php
/**
 * @package Wordpress
 * @subpackage Broadcast Lite
 */
if ( post_password_required() ) {
	return;
}
	if ( have_comments() ) {
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comments_number = get_comments_number();
        if ( '1' === $comments_number ) {
            $commentPlural = 'Comment';
        } else {
            $commentPlural= 'Comments';
        } ?>
		<h3 class="cp-single__comments-title">
		    <?php echo esc_attr(number_format_i18n( $comments_number )).' '.$commentPlural; ?>
		</h3>

		<ol class="cp-single__comments-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
                    'format'      => 'html5',
				) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous', 'broadcast-lite' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'broadcast-lite' ) . '</span>',
		) );

	}

    $fields =  array(
      
      'author' =>
        '<p class="comment-form-author"><label for="author">' . __( 'Name', 'broadcast-lite' ) .
        ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
        '" size="30"' . $aria_req . ' placeholder="Name"/></p>',

      'email' =>
        '<p class="comment-form-email"><label for="email">' . __( 'Email', 'broadcast-lite' ) .
        ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
        '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
        '" size="30"' . $aria_req . ' placeholder="Email"/></p>',

    );

	comment_form( array(
        'id_form' => '',
        'class_form' => 'cp-single__comments-form',
        'title_reply' => '',
        'title_reply_before' => '<h3 class="cp-single__comments-respond-title">',
        'format'      => 'html5',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'class_submit' => 'button l-colour__button',
        'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . esc_html_x( 'Comment', 'broadcast-lite' ) .
    '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Leave a comment...">' .
    '</textarea></p>',        
        'fields' => apply_filters( 'comment_form_default_fields', $fields )
    ));
	?>
