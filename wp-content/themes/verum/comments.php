<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package verum
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

	<?php
// You can start editing here -- including this comment!
if (have_comments()):
?>
		<h2 class="comments-title">
			<?php
$verum_comment_count = get_comments_number();
if ('1' === $verum_comment_count) {
    printf(
        /* translators: 1: title. */
        esc_html__('One thought on &ldquo;%1$s&rdquo;', 'verum'),
        '<span>' . get_the_title() . '</span>'
    );
} else {
    printf( // WPCS: XSS OK.
        /* translators: 1: comment count number, 2: title. */
        esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $verum_comment_count, 'comments title', 'verum')),
        number_format_i18n($verum_comment_count),
        '<span>' . get_the_title() . '</span>'
    );
}
?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation();?>

		<ol class="comment-list">
			<?php
wp_list_comments(array(
    'style' => 'ol',
    'short_ping' => true,
));
?>
		</ol><!-- .comment-list -->

		<?php
the_comments_navigation();

// If comments are closed and there are comments, let's leave a little note, shall we?
if (!comments_open()):
?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'verum');?></p>
			<?php
endif;

endif; // Check for have_comments().

$verum_comment_fields = array();
$verum_name_field_placeholder = __('Name', 'verum');
$verum_email_field_placeholder = __('Email', 'verum');
$verum_website_field_placeholder = __('Website', 'verum');
$verum_submit_label = __('Send', 'verum');
$verum_comment_fields['author'] = <<<EOD
<div class="row">
<div class=" col-md-4">
<div class="form-group">
			<input type="text" id="author" name="author"  class="form-control" placeholder="{$verum_name_field_placeholder}*" required="">
		</div>
	</div>
EOD;
$verum_comment_fields['email'] = <<<EOD
		<div class=" col-md-4">
			<div class="form-group">
				<input type="email" id="email" name="email" class="form-control" placeholder="{$verum_email_field_placeholder}*" required="">
			</div>
		</div>

EOD;
$verum_comment_fields['url'] = <<<EOD
		<div class=" col-md-4">
                                        <div class="form-group ">
		<input type="text" id="url" name="url" class="form-control" placeholder="{$verum_website_field_placeholder}*" required="">
		</div>
</div>
</div>
EOD;
$verum_comment_field = <<<EOD
<div class="form-group">
	<div class="controls">
        <textarea id="comment" name="comment" rows="5" placeholder="Comments*" class="form-control"
                  required=""></textarea>
	</div>
</div>
EOD;
$verum_comment_submit_button = <<<EOD
<div class="text-center mt-md-5">
	<button type="submit" class="btn btn-black">{$verum_submit_label}</button>
</div>
EOD;
$verum_comment_form_arguments = array(
    'fields' => $verum_comment_fields,
    'comment_field' => $verum_comment_field,
    'submit_button' => $verum_comment_submit_button,
    'class_form' => 'comments-form text-left',
    'comment_notes_before' => '<p></p>',
    'comment_notes_after' => '<p>' . __('Your email address will not be published. Required fields are marked *', 'verum') . '</p>',
    'title_reply' => '',
);
comment_form($verum_comment_form_arguments);
?>

</div><!-- #comments -->
