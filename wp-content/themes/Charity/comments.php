<?php /*

@charitytheme

*/

if(post_password_required()){
	return;
} ?>
<div class="comments-area" id="comments">
	<?php 
	if(have_comments()):
	?>
		<h2 class="comment-title">
			<?php
				printf(
					esc_html(_nx('One comment on &ldquo;%2$s&rdquo;','%1$s comments on &ldquo;%2$s&rdquo;',get_comments_number(),'comments title','charitytheme')),
					number_format_i18n(get_comments_number()),
					'<span>' .get_the_title() .'</span>'
				);
			?>
		</h2>
		<ol class="comment-list">
		<hr>
			<?php
				$args = array(
					'walker' => null,
					'max_depth' => '',
					'style' => 'ol',
					'callback' => null,
					'end-callback' =>  null,
					'type' => 'all',
					'page' => '',
					'per_page' => '',
					'avatar_size' => 32,
					'reverse_top_level' => null,
					'reverse_children' => '',
					'format' => 'html5',
					'shoty_ping' => false,
					'echo' => true,
					'reply_text' => 'Reply to Comment'. '<hr>',
				);

				wp_list_comments($args);
			?>
			<hr>

		</ol>
		<?php if(!comments_open() && get_comments_number()): ?>
			<p class="no-comments"> <?php esc_html_e('Commments are closed.','charitytheme'); ?></p>
		<?php endif; ?>
	<?php endif;?>

	
</div>