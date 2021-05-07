<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12 col-lg-offset-2 col-md-offset-1">
					<?php 
						if(have_posts()):
							while(have_posts()): the_post();
								?> <center> <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?> </center> <?php

								get_post_format();
								echo the_content();

								if(comments_open()|| get_comments_number()):
									comments_template();
								endif;

								$fields=array(
									'author' =>
									'<div class="form-group"><label for="author">' . __('Name', 'domainreference') . '</label> <span class="required">*</span> <input
									id="author" name="author" type="text" class="form-control" value="' . esc_attr($commentor['comment_author']) . '" required="required" /></div>',
								
									'email' =>
									'<div class="form-group"><label for="email">' . __('Email', 'domainreference') . '</label> <span class="required">*</span> <input
									id="email" name="email" type="text" class="form-control" value="' . esc_attr($commentor['comment_email']) . '" required="required" /></div>',

									'url' =>
									'<div class="form-group"><label for="url">' . __('Website', 'domainreference') . '</label><input id="url" name="url" type="text" class="form-control" value="' . esc_attr($commentor['comment_url']) . '" required="required" /></div>'
								
								
								);
								
								$arg1= array(
									'class_submit' => 'btn btn-block btn-lg btn-warning',
									'label_submit' => 'Submit Comment',
									'comment_field' => '<div class="form-group"><label for="comment">' . _x('Comment', 'noun') . '</label><textarea class="form-control" id="comment" name="comment" rows="4" required="required"></textarea></div>',
									'fields' => apply_filters('comment_form_default_fields',$fields)
								);
								comment_form($arg1);
								// comment_form();
								echo sunset_post_navigation();
							endwhile;
						endif;
					?>
				</div>
		</div>
	</main>
	
</div>



<?php get_footer(); ?>
