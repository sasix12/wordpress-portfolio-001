<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
		return;
?>
<?php if ( have_comments() ) : ?>
	<div class="list-comment mb-30">
		<h3 class="title mb-30"><?php comments_number( esc_html__('0 Comments', 'boston'), esc_html__('1 Comment', 'boston'), esc_html__('% Comments', 'boston') ); ?></h3>
		<?php wp_list_comments('callback=boston_theme_comment'); ?>
	</div>
<?php endif; ?>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
?>
	<div class="text-center">
		<ul class="pagination">
			<li>
				<?php
				paginate_comments_links( array(
					'prev_text' => wp_specialchars_decode('<i class="ti-angle-left"></i>',ENT_QUOTES), 
					'next_text' => wp_specialchars_decode('<i class="ti-angle-right"></i>',ENT_QUOTES)
				));?>
			</li>
		</ul>
	</div>
<?php endif;?>
<?php
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$comment_args = array(
				'class_container' => 'form-comment',
				'id_form' => 'form',
				'class_form' => 'row',
				'title_reply'=>esc_html__( 'Leave A Comment', 'boston' ),
				'title_reply_before' =>'<h3 class="mb-30 title">',
				'title_reply_after' => '</h3>',
				'fields' => apply_filters( 'comment_form_default_fields', array(
						'author' 	=> '<div class="col-md-6"><input type="text" name="name" id="name" placeholder="'.esc_attr__('Name *', 'boston').'" required=""></div>',
						'email'		=> '<div class="col-md-6"><input type="email" name="email" id="email" placeholder="'.esc_attr__('Email *', 'boston').'" required=""></div>',
				) ),
					'comment_field' => '<div class="col-md-12"><textarea name="comment" id="message" cols="40" rows="4" placeholder="'.esc_attr__('Write A Comment', 'boston').'" required=""></textarea></div>',
				'label_submit' => esc_html__( 'Post A Comment', 'boston' ),
				'submit_button' => '<div class="col-md-12 %3$s"><button class="button-1"><span>%4$s</span></button></div>',
				'submit_field' => '%1$s %2$s',
				'comment_notes_before' => '',
				'comment_notes_after' => '',
		)
?>
<?php if ( comments_open() ) : ?>
<?php comment_form($comment_args); ?>
<?php endif; ?> 