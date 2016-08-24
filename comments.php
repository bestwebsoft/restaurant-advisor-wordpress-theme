<?php
/**
 * The template for displaying comments list and comment form
 *
 * @package    BestWebLayout
 * @subpackage Restaurant Advisor
 * @since      Restaurant Advisor 1.0
 **/

if ( ! comments_open() ) {
	echo "<p class='advisor-nocomments'>" . __( 'Comments closed', 'restaurant-advisor' ) . '</p>';
} elseif ( ! get_comments_number() ) {
	echo "<p class='advisor-nocomments'>" . __( 'No comments yet', 'restaurant-advisor' ) . '</p>';
} else { ?>
	<ul class="advisor-comment-list">
		<?php echo "<div class='advisor-comments-title'>" . __( 'comments', 'restaurant-advisor' ) . "&nbsp;(<span class='advisor-comments-number'>" . esc_html( get_comments_number() ) . '</span>)</div>'; ?>
		<div class="advisor-comments-nav">
			<p class="advisor-comments-link">
				<?php previous_comments_link( '<i class="fa fa-arrow-left"></i>' . __( 'prev comments', 'restaurant-advisor' ) ); ?>
			</p>
			<p class="advisor-comments-link">
				<?php next_comments_link( __( 'next comments', 'restaurant-advisor' ) . '<i class="fa fa-arrow-right"></i>' ); ?>
			</p>
		</div>
		<?php wp_list_comments( array(
			'style'       => 'ul',
			'avatar_size' => 76,
			'reply_text'  => '<i class="fa fa-reply"></i>',
			'callback'    => 'advisor_comment',
		) ); ?>
	</ul> <!-- .advisor-comment-list -->
	<div class="advisor-comments-nav">
		<p class="advisor-comments-link">
			<?php previous_comments_link( '<i class="fa fa-arrow-left"></i>' . __( 'prev comments', 'restaurant-advisor' ) ); ?>
		</p>
		<p class="advisor-comments-link">
			<?php next_comments_link( __( 'next comments', 'restaurant-advisor' ) . '<i class="fa fa-arrow-right"></i>' ); ?>
		</p>
	</div>
<?php }
$fields       = array(
	'author' => '<div id="advisor-reply-author"><span class="advisor-required">*</span> <p class="advisor-comment-form-author"> <label for="author">'
							. __( 'name', 'restaurant-advisor' ) . '</label> </p>' . '<input id="advisor-author" name="author" type="text" size="30" placeholder="'
							. __( 'Your Name', 'restaurant-advisor' ) . '..." required/></div>',
	'email'  => '<div id="advisor-reply-email"><span class="advisor-required">*</span> <p class="advisor-comment-form-email"> <label class="advisor-email" for="email">'
							. __( 'e-mail', 'restaurant-advisor' ) . '</label> </p>' . '<input id="advisor-email" name="email" type="text" size="30" placeholder="'
							. __( 'Your E-mail', 'restaurant-advisor' ) . '..." required/></div>',
);
$comment_args = array(
	'comment_notes_before' => '',
	'fields'               => $fields,
	'comment_field'        => '<div id="advisor-reply-text"><span class="advisor-required"> * </span> <p class="advisor-comment-form-comment"> <label for="comment">'
														. __( 'comment', 'restaurant-advisor' ) . '</label> </p> <textarea id="advisor-comment" name="comment" cols="45" rows="8" placeholder="'
														. __( 'Your Comment', 'restaurant-advisor' ) . '..." >' . '</textarea></div>',
	'title_reply'          => __( 'leave a comment', 'restaurant-advisor' ),
	'label_submit'         => __( 'submit comment', 'restaurant-advisor' ),
);
comment_form( $comment_args );
