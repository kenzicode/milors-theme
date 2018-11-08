<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Milors
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
		<h4 class="comments-title mb-5">
			<?php
			$milors_theme_comment_count = get_comments_number();
			if ( '1' === $milors_theme_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'milors-theme' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $milors_theme_comment_count, 'comments title', 'milors-theme' ) ),
					number_format_i18n( $milors_theme_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h4><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ul class="comment-list mb-5">
			<?php
			wp_list_comments( array(
				'style'      => 'ul',
				'avatar_size' => 50,
				'short_ping' => true,
			) );
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'milors-theme' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	$comments_args = array(
        // change the title of send button
        'label_submit'=>'SUBMIT COMMENT',
        // change the title of the reply section
        'title_reply'=>'Add Comment',
        'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
        'title_reply_after' => '</h4>',
        'class_submit' => 'btn btn-primary',

        'fields' => apply_filters('comment_form_defaults_fields', array(
			  'author' =>
			    '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) .
			    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
			    '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			    '" size="30"' . $aria_req . ' /></p>',

			  'email' =>
			    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) .
			    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
			    '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			    '" size="30"' . $aria_req . ' /></p>',

			  'url' =>
			    '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
			    '<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			    '" size="30" /></p>',


        )),
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" class="form-control" rows="7" name="comment" aria-required="true"></textarea></p>',
	);

	comment_form($comments_args);

	?>

</div><!-- #comments -->
