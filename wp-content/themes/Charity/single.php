
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

<div class="blog-content">
    <div class="blog-content-wrapper">
        <div class="container">
            <div class="row mt-4">
                <div class="col-3 d-none d-md-block">
                    <?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
                        <div id="secondary" class="widget-area" role="complementary">
                        <?php dynamic_sidebar( 'sidebar-2' ); ?>
                        </div>
                        <hr />
                    <?php } ?>
                </div>
                <div class="col-sm-12 col-md-9">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post(); ?>

                            <?php if (has_post_thumbnail()) { ?>
                            <!-- img banner of about page -->
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="banner200"
                                class="img-banner" height="435px" />
                            <?php } ?>

                            <h5 class="py-3"><?php echo the_title(); ?></h5>

                            <!-- font-system -->
                            <div class="font-system">
                                <i class="far fa-alarm-clock "></i><a href="#"><?php the_time('m/j/y g:i A') ?></a>
                                <i class="far fa-user-circle "></i><?php echo the_author_posts_link(); ?>
                                <i class="fal fa-comment-alt-dots "></i> <a
                                    href=""><?php echo get_comments_number(); ?></a>
                                <i class="fal fa-folder "></i> <a href="<?php get_the_category_list(); ?>"><?php echo the_category('/') ?></a>

                                <p class="py-3">
                                    <?php echo the_content(); ?>
                                </p>
                            </div>

                            <div class="sharing-part d-flex justify-content-between pb-4">
                                <div>
                                    <i class="fal fa-share-alt social-icons pt-3"></i><a href="">bluetooth</a>
                                </div>

                                <div class="single-sidebar">
                                    <?php if ( is_active_sidebar( 'mytheme-single-post-widgets' ) ) { ?>
                                        <div id="secondary" class="widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'mytheme-single-post-widgets' ); ?>
                                        </div>
                                        <hr />
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- prev/next link -->
                            
                            <div>
                                <div class="float-left">
                                    <?php previous_post_link(); ?>
                                </div>
                                <div class="float-right">
                                    <?php next_post_link(); ?>
                                </div>
                            </div>

                            <br>
                                
                            <div class="prev-next d-none d-sm-flex justify-content-between pb-4" >
                                <div class="prev d-flex">
                                    <img src="assets/images/1.jpg" alt="" />
                                    <a href="#">
                                    <h6>8 ways you can refuees</h6>
                                    </a>
                                </div>
                                <div class="prev d-flex">
                                    <a href="#">
                                    <h6 class="pr-3">excitement of quote about charity</h6>
                                    </a>
                                    <img src="assets/images/2.jpg" alt="" />
                                </div>
                            </div>
                            <span>
                                <hr class="horizontal" />
                            </span>
                            <?php
                        }
                    }
                    ?>
                    <div id="primary" class="content-area mt-5">
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
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>