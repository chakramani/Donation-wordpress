<?php
get_header();
?>

<?php if(is_page('blog')){ ?>
<style>
  .img-nav {
    background-image: url(http://localhost/Wordpress/wp-content/uploads/2021/06/background.jpg);
    background-position: 0 0;
    background-repeat: no-repeat;
    background-repeat: repeat;
    box-shadow: inset 0 0 0 2000px #050404c4;
  }
</style>


<!----bradcrumb starts here -->
<div id="blog-page">
  <div class="img-nav">
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
            <div class="search-button">
              <div class="input-group">
                <div class="form-outline">
                  <input type="search" id="form1" class="form-control" />
                </div>
              </div>
            </div>
            <div class="side-bar-categories py-3">
              <h6 class="blog-heading">blog categories</h6>
              <ul class="side-bar-list">
                <?php $categories = get_categories();
                foreach ($categories as $category) {
                  $count = $category->category_count;
                  echo '<li class="categories"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '&nbsp;(' . $count . ')</a></li>';
                }
                ?>
              </ul>
            </div>
            <hr />
            <div class="popular-post">
              <h6 class="blog-heading">Recent blogs</h6>
              <?php

              $args = array('posts_per_page' => '5');
              $recent_posts = new WP_Query($args);
              while ($recent_posts->have_posts()) {

                $recent_posts->the_post();

                if (has_post_thumbnail()) { ?>
                  <div class="d-flex space-between pt-4">
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
            <div class="d-none d-lg-block banner-facebook py-3">
              <img src="http://localhost/Wordpress/wp-content/uploads/2021/06/leader1.jpeg" width="270" height="350" alt="" />
            </div>
            <div class="popular-tag pb-5">
              <h6 class="blog-heading">blog categories</h6>
              <div class="btn-first d-flex">
                <button type="button" class="btn btn-outline-secondary">
                  Finance
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  Working
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  Secondary
                </button>
              </div>
              <div class="btn-second d-flex mt-1">
                <button type="button" class="btn btn-outline-secondary">
                  Finance
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  Working
                </button>
              </div>
              <div class="btn-first d-flex mt-1">
                <button type="button" class="btn btn-outline-secondary">
                  Finance
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  Working
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  Secondary
                </button>
              </div>
            </div>
          </section>
        </div>
        <!-- end-of-column -->
        <!-- second-column -->
        <div class="col-md-9 col-12">
          <section class="main-bar">
            <?php

            $args = array('posts_per_page' => '5');
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
            <?php  }
            }
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

<?php } 
else{
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>

<?php endwhile; endif; ?>

<?php }  ?>

<?php
get_footer();
?>