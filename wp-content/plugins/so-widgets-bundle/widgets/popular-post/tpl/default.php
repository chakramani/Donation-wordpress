<hr/>
<div class="popular-post">
    <h6 class="widget-title"><?php echo $title; ?> </h6>
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
            <h6 class="popular_hastag"><?php echo get_the_title(); ?></h6>
        </div>
        </div>
        <hr />
    <?php  }
    }
    wp_reset_postdata();
    ?>

</div>