  <?php  get_header();  ?>
  
  <!-- Page Content -->
  <div id="page-home">
    <!-- jumbotron header starts here -->
    <section class="jumbotron-title">
      <div class="jumbotron">
        <div class="heading">
          <div class="container">
            <h4 class="text-uppercase float-left text-dark">
              <a href="http://localhost/wordpress/about-us/" class="text-dark">about us</a>
            </h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                  <a href="http://localhost/wordpress/" class="active">Home</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  <a href="http://localhost/wordpress/about-us/">about us</a>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <!-- Jumbotron section ends here -->

    
    <!-- about section starts here -->
    <section>
      <div class="about-section">
        <div class="container">
        <?php
          if(have_posts()) : while(have_posts()) : the_post();
          // the_title();
            the_content();

          endwhile; endif;
        ?>      
        </div>
      </div>
    </section>
  </div>
<?php get_footer();  ?>