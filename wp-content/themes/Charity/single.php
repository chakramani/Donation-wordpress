
<!----bradcrumb starts here -->
<div id="blog-page">
    <div class="img-nav">
    <?php get_header(); ?>
        <span>
            <hr class="horizontal" />
        </span>
        <div class="container text-center blog-items">
            <h4>our blog</h4>
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb breadcrumb-nav">
                    <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>" class="active">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="http://localhost/Wordpress/blog/">OUR BLOG</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- // // the_content();
        // get_template_part('template-parts/content', 'article'); -->
<div class="blog-content">
    <div class="blog-content-wrapper">
        <div class="container">
            <div class="row mt-4">
                <div class="col-3 d-none d-md-block">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                    </form>
                    <!-- blog categories- -->
                    <h5 class="pt-4 categories">BLOG CATEGORIES</h5>
                    <ul>
                        <?php $categories = get_categories();
                        foreach ($categories as $category) {
                            $count = $category->category_count;
                            echo '<li><h3><a href="' . get_category_link($category->term_id) . '">' . $category->name . '&nbsp;(' . $count . ')</a></h3></li>';
                        }
                        ?>
                    </ul>

                    <div class="popular-post">
                        <h5 class="blog-heading">Recent blogs</h5>
                        <?php
                        $args = array('posts_per_page' => '5');
                        $recent_posts = new WP_Query($args);
                        while ($recent_posts->have_posts()) {
                            $recent_posts->the_post();
                            if (has_post_thumbnail()) { ?>
                        <div class="d-flex space-between pt-4" style="padding-right: 0 !important;">
                            <div>
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" width="100" height="60" alt="" />
                            </div>
                            <div>
                                <h6 class="hastag"><?php echo get_the_title(); ?></h6>
                            </div>
                        </div>
                        <hr />
                        <?php  }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                    <img src="http://localhost/Wordpress/wp-content/uploads/2021/06/leader1.jpeg" alt=""
                        width="270" height="350" class="image-3" />

                    <h5 class="pt-3 categories">popular post</h5>
					<div id="popular_post">
						<div class="btn">
							<button type="button" class="btn btn-outline-secondary btn-sm">
								Primary
							</button>
							<button type="button" class="btn btn-outline-secondary btn-sm">
								Secondary
							</button>
							<button type="button" class="btn btn-outline-secondary btn-sm">
								Success
							</button>
						</div>
						<div class="btn">
							<button type="button" class="btn btn-outline-secondary btn-sm">
								Secondary
							</button>
							<button type="button" class="btn btn-outline-secondary btn-sm">
								Success
							</button>
						</div>
						<div class="btn">
							<button type="button" class="btn btn-outline-secondary btn-sm">
								Primary
							</button>
							<button type="button" class="btn btn-outline-secondary btn-sm">
								Secondary
							</button>
							<button type="button" class="btn btn-outline-secondary btn-sm">
								Success
							</button>
						</div>
					</div>
                </div>
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post(); ?>
                <div class="col-sm-12 col-md-9">

                    <?php if (has_post_thumbnail()) { ?>
                    <!-- img banner of about page -->
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="banner200"
                        class="img-banner" height="500px" />
                    <?php } ?>

                    <h5 class="py-3"><?php echo the_title(); ?></h5>

                    <!-- font-system -->
                    <div class="font-system">
                        <i class="far fa-alarm-clock "></i><a href="#"><?php the_time('m/j/y g:i A') ?></a>
                        <i class="far fa-user-circle "></i><?php echo the_author_posts_link(); ?>
                        <i class="fal fa-comment-alt-dots "></i> <a
                            href=""><?php echo get_comments_number(); ?></a>
                        <i class="fal fa-folder "></i> <a href=""><?php echo the_category('/') ?></a>

                        <p class="py-3">
                            <?php echo the_content(); ?>
                        </p>
                    </div>
                    <div class="sharing-part d-flex justify-content-between pb-4">
                        <div>
                            <i class="fal fa-share-alt social-icons pt-3"></i><a class="#">bluetooth</a>
                        </div>

                        <div class="btn">
                            <button type="button" class="btn btn-outline-secondary btn-sm">
                                Primary
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">
                                Secondary
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">
                                Success
                            </button>
                        </div>
                    </div>

                    <span>
                        <hr class="horizontal" />
                    </span>

                    <!-- previous next span -->
                    <div>
                        <div class="float-left">
                            <!-- <a href=""> -->
                            <?php previous_post_link(); ?>
                            <!-- <h6>< previous</h6> -->
                            </a>
                        </div>
                        <div class="float-right">
                            <!-- <a href=""> -->
                            <?php next_post_link(); ?>
                            <!-- <h6>next ></h6> -->
                            </a>
                        </div>
                    </div>
                    <br />
                    <br />

                    <div class="prev-next d-none d-sm-flex justify-content-between pb-4">
                        <div class="prev d-flex">
                            <img src="assets/images/download1.jpg" alt="" />
                            <a href="#">
                                <h6>8 ways you can refuees</h6>
                            </a>
                        </div>
                        <div class="prev d-flex">
                            <a href="#">
                                <h6>excitement of quote about charity</h6>
                            </a>
                            <img src="assets/images/download1.jpg" alt="" />
                        </div>
                    </div>

                    <span>
                        <hr class="horizontal" />
                    </span>

                    <!-- comment-section -->
                    <div class="comment-section">
                        <div class="container mb-5 mt-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <!-- <h5>comments(3)</h5> -->
                                        <!-- <div class="col-md-12">
                                            <div class="media">
                                                <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview"
                                                    src="https://i.imgur.com/stD0Q19.jpg" />
                                                <div class="media-body">
                                                    <div class="row">
                                                        <div class="col-8 d-flex">
                                                            <h6>Maria Smantha</h6>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="pull-right reply">
                                                                <a href="#"><span class="text-warning float-right">
                                                                        reply</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <i class="far fa-alarm-clock social-icons pb-3"></i><a href="#">july
                                                        29,2016 at 2:56</a>
                                                    <p>
                                                        It is a long established fact that a reader will
                                                        be distracted by the readable content of a page.
                                                    </p>
                                                    <span>
                                                        <hr class="horizontal" />
                                                    </span>
                                                    <div class="media mt-4">
                                                        <a class="pr-3" href="#"><img class="rounded-circle"
                                                                alt="Bootstrap Media Another Preview"
                                                                src="https://i.imgur.com/xELPaag.jpg" /></a>
                                                        <div class="media-body">
                                                            <div class="row">
                                                                <div class="col-12 d-flex">
                                                                    <h6>Simona Disa</h6>
                                                                    <span></span>
                                                                </div>
                                                            </div>
                                                            <i class="far fa-alarm-clock social-icons pb-3"></i><a
                                                                href="#">july 29,2016 at 2:56</a>
                                                            <p>
                                                                letters, as opposed to using 'Content here,
                                                                content here', making it look like readable
                                                                English.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span>
                                                <hr class="horizontal" />
                                            </span>
                                            <div class="media mt-4">
                                                <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview"
                                                    src="https://i.imgur.com/xELPaag.jpg" />
                                                <div class="media-body">
                                                    <div class="row">
                                                        <div class="col-8 d-flex">
                                                            <h6>Shad f</h6>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="pull-right reply">
                                                                <a href="#"><span class="text-warning float-right">
                                                                        reply</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <i class="far fa-alarm-clock social-icons pb-3"></i><a href="#">july
                                                        29,2016 at 2:56</a>
                                                    <p>
                                                        The standard chunk of Lorem Ipsum used since the
                                                        1500s is reproduced below for those interested.
                                                        Sections 1.10.32 and 1.10.33.
                                                    </p>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
                    }
                }
?>








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
								// get_post_format();
								// echo the_content();?>
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