<!-- footer-jumbotron starts here -->


<!-- Footer -->
<footer>
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 footer_first_column">
          <?php if ( is_active_sidebar( 'footer-one' ) ) { ?>
            <div class="widget-column footer-widget-1">
            <?php dynamic_sidebar( 'footer-one' ); ?>
            </div>
          <?php } ?>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 footer_first_column">
          <?php if ( is_active_sidebar( 'footer-two' ) ) { ?>
            <div class="widget-column footer-widget-2">
              <?php dynamic_sidebar( 'footer-two' ); ?>
            </div>
          <?php } ?>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 footer_first_column">
          <?php if ( is_active_sidebar( 'footer-three' ) ) { ?>
            <div class="widget-column footer-widget-3">
            <?php dynamic_sidebar( 'footer-three' ); ?>
            </div>
          <?php } ?>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer_first_column">
          <?php if ( is_active_sidebar( 'footer-four' ) ) { ?>
            <div class="widget-column footer-widget-4">
            <?php dynamic_sidebar( 'footer-four' ); ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div> 
</footer>


<section class="end-section">
  <div class="container">
    <div class="row">
      <span class="mx-auto mt-4">
        <p class="text-light text-center"> @copyright 2021 UX-Qode. all right segments </p>
      </span>
    </div>
  </div>
</section>
<?php
wp_footer();
?>
</body>
</html>