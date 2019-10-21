<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Schulte_Roofing
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$schulte_roofing_comment_count = get_comments_number();
			if ( '1' === $schulte_roofing_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( '1 comment', 'schulte-roofing' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s comment', '%1$s comments', $schulte_roofing_comment_count, 'comments title', 'schulte-roofing' ) ),
					number_format_i18n( $schulte_roofing_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'schulte-roofing' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	
	$sr_post_name = get_post_type( get_the_ID() );
	$req          = get_option( 'require_name_email' );
	$html_req     = ( $req ? " required='required'" : '' );
	
	$commenter    = wp_get_current_commenter();
	$consent      = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
	
	$fields   =  array(
		'author'  => '<div class="comment-field comment-form-author">' . '<div class="sr-placeholder"><label for="author">' . __( 'Name' ) . ( $req ? '<span class="required star">*</span>' : '' ) . '</label></div> ' .
					 '<input class="comment-field-input" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $html_req . ' /></div>',
		'email'   => '<div class="comment-field comment-form-email"><div class="sr-placeholder"><label for="email">' . __( 'Email' ) . ( $req ? '<span class="required star">*</span>' : '' ) . '</label></div> ' .
					 '<input class="comment-field-input" id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $html_req . ' /></div>',
		'url'     => '<div class="comment-field comment-form-url"><div class="sr-placeholder"><label for="url">' . __( 'Website' ) . '</label></div>' .
					 '<input class="comment-field-input" id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></div>',
	);
	$fields = apply_filters( 'comment_form_default_fields', $fields );
	if( $sr_post_name == 'ht_kb' ) {
		$comments_args = array(
			'fields'               => $fields,
			'comment_field'        => '<div class="comment-field comment-form-comment"><div class="sr-placeholder"><label for="comment">' . _x( 'Comment', 'noun' ) . '<span class="required star">*</span></label></div> <textarea class="comment-field-input" id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></div>',
			'comment_notes_before' => '',
			'title_reply'          => __( 'Leave a Comment' ),
			'label_submit'         => __( 'SUBMIT' ),
		);
	} else {
		$comments_args = array(
			'fields'               => $fields,
			'comment_field'        => '<div class="comment-field comment-form-comment"><div class="sr-placeholder"><label for="comment">' . _x( 'Comment', 'noun' ) . '<span class="required star">*</span></label></div> <textarea class="comment-field-input" id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></div>',
			'comment_notes_before' => '',
			'label_submit'         => __( 'SUBMIT' ),
		);
	}
	comment_form($comments_args);
	?>

</div><!-- #comments -->
