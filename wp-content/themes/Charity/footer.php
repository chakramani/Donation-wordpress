<!-- footer-jumbotron starts here -->

<div class="jumbotron jumbo d-none d-sm-block">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h6 class="pt-2 text-capitalize text-secondary">Contribute in my donation charity.Thanks for your heart</h6>
            </div>
            <div class="col-6">
                <div class="donate_button float-right">
                  <a href="http://localhost/wordpress/common-donation/">
                    <button class="button">
                        DONATE NOW
                        <span class="oval"><i class="fas fa-arrow-right"></i></span>
                    </button>
                  </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer-jumbotron ends here -->

<!-- Footer -->
<footer>
  <div class="footer"
    <!-- Main Footer -->
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

<!-- Bottom Copyright footer -->
<section class="end-section">
  <div class="container">
    <div class="row">
      <span class="mx-auto mt-4">
        <p class="text-light"> @copyright 2015 themedevelopment. all right segments </p>
      </span>
    </div>
  </div>
</section>
<?php
wp_footer();
?>
</body>
</html>