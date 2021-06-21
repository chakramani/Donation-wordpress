<div class="link container">

    <?php if(!empty($title)):  ?>
    <p class="top-title <?php echo $title_tag; ?>"><?php echo $title; ?></p>
    <?php endif; ?>

    <?php while($posts->have_posts()) : $posts->the_post(); ?>

    <div class="space-around">
        <ul>
            <li><i class="fas fa-arrow-right"></i>&nbsp; &nbsp;
                <a href="<?php the_permalink() ?>" id="sow-carousel-id-<?php echo the_ID(); ?>"
                    <?php echo $link_target == 'new' ? 'target="_blank" rel="noopener noreferrer"': ''; ?>
                    tabindex="-1"><?php the_title() ?>
                </a>
            </li>
        </ul>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
</div>