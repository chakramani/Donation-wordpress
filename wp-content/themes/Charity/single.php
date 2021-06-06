<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 ">
                    <?php 
						if(have_posts()):
							while(have_posts()): the_post();
								?>
                    <!-- <center> <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?> </center>  -->

                    <?php
								get_post_format();
								echo the_content();?>
                    <div class="prev_post">
                        <?php
									echo sunset_post_navigation();
								?>
                    </div>
                    <?php

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
									'class_submit' => 'btn rounded-pill btn-md btn-warning mt-2',
									'label_submit' => 'Comment',
									'comment_field' => '<div class="form-group"><label for="comment">' . _x('Comment', 'noun') . '</label> 
									
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4"></label>
											<input
											type="email"
											class="form-control"
											id="inputEmail4"
											placeholder="your name"
											/>
										</div>
										<div class="form-group col-md-6">
											<label for="inputEmail4"></label>
											<input
											type="email"
											class="form-control"
											id="inputEmail4"
											placeholder="your email"
											/>
										</div>
										</div>
										<div class="form-group">
										<label for="comment"></label>
										<textarea
											class="form-control"
											rows="4"
											id="comment"
											required="required"
											name="comment"
											placeholder="your comment"
										></textarea>
										</div>
									</div>',
									'fields' => apply_filters('comment_form_default_fields',$fields)
								);
								comment_form($arg1);
							endwhile;
						endif;
					?>
                </div>
            </div>
    </main>

</div>



<?php get_footer(); ?>