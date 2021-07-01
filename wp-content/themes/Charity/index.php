<?php  get_header();  ?>

<!-- Page Content -->
<div id="page-home">
    <section>
        <div class="about-section">
            <div >
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


<!-- <div class="container">
        <nav aria-label="Page navigation">
            <ul class="pagination event">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li><a href="#">Next &nbsp;<i class="fas fa-angle-right"></i></a></li>
            </ul>
        </nav>
    </div> -->






