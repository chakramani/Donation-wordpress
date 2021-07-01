<?php get_header(); ?>
<?php if(is_page('blog') || is_page('page')){ ?>
  <!----bradcrumb starts here -->
  <div id="blog-page">
    <div class="img-nav">
      <!-- <?php get_header(); ?> -->

      <span>
        <hr class="horizontal" />
      </span>
      <div class="container text-center blog-items">
        <h4>our blog</h4>
        <nav aria-label="breadcrumb ">
          <ol class="breadcrumb breadcrumb-nav">
            <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>" class="active">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">
              <a href="#">our blog</a>
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- end of navbar -->

    <!-- blog-wrapper-content -->
    <div class="blog-wrapper-content py-5">
      <!-- start-of-row-column -->
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-3">
            <!-- side-bar-content -->
            <section class="side-bar-content">
              <?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
                <div id="secondary" class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
                </div>
                <hr />
              <?php } ?>

              <hr />
            </section>
          </div>
          <!-- end-of-column -->
          <!-- second-column -->
          <div class="col-md-9 col-12">
            <section class="main-bar">
              <?php

              $args = array('posts_per_page' => '3');
              $recent_posts = new WP_Query($args);
              while ($recent_posts->have_posts()) {

                $recent_posts->the_post();

                if (has_post_thumbnail()) { ?>
                  <figure class="first-image">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="images" height="300px;" />
                  </figure>
                  <div class="caption-wrapper">
                    <h4 class="pb-2"><?php echo get_the_title(); ?></h4>
                    <i class="far fa-alarm-clock"></i> <a href="#"> <?php the_time('m/j/y g:i A') ?></a>
                    <i class="far fa-user-circle"></i> <a href="#"> By <?php echo the_author_posts_link(); ?></a>
                    <i class="fal fa-comment-alt-dots"></i> <a href="#"><?php echo get_comments_number(); ?> </a>
                    <i class="fal fa-folder"></i><a href="#"> <?php echo the_category('/') ?></a>
                    <p>
                      <?php echo get_the_excerpt($post); ?>
                    </p>
                    <a href="<?php echo get_permalink(); ?>" class="read-more">READ MORE<i class="fas fa-arrow-right"></i></a>
                  </div>
                  <hr />
                  <?php
                }
              }
              previous_posts_link();
              next_posts_link();
              wp_reset_postdata();
              ?>
              <!-- pagiation section -->
              <nav aria-label="...">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link active" href="#">1</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link next-btn" href="#">Next ></a>
                  </li>
                </ul>
              </nav>
              <!-- pagiation section ends here-->
            </section>
          </div>
        </div>
      </div>
      <!-- end-of-row & container  -->
      <!-- end-of-blog-wrapper-content -->
    </div>
    <!-- end-of-page -->
  </div>
  </div>
  <?php 
} 
else{
  ?>
  <div>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; endif; ?>
  </div>

<?php }  ?>
<?php get_footer(); ?>