<?php  get_header();  ?>

<!-- Page Content -->
<div id="page-home">
    <section>
        <div class="about-section">
            <div class="container">
                <?php
          if(have_posts()) : 
            while(have_posts()) : 
            the_post();
            the_content();
          endwhile; endif;
        ?>
            </div>
        </div>
    </section>
</div>






