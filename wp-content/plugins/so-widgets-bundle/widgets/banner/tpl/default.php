<?php $attachment = siteorigin_widgets_get_attachment_image_src(
    $image,
    !empty($counter['image_fallback']) ? $teams['icon_image_fallback'] : false ); 

    // var_dump($conten);
?>
<div class="banner">
    <div id="banner-slider" class="owl-carousel owl-theme">
        <div class="item">
            <div class="overlay">
                <?php if(!empty($attachment[0])):  ?>
                    <img src="<?php echo sow_esc_url($attachment[0]); ?>" alt="img">
                <?php endif; ?>
                <div class="overlay-layer_top">
                    <div class="card" style="width: 16rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $title; ?></h5>
                            <p class="card-text"><?php echo $title1; ?></p>
                            <small>DONATION GOAL</small></br>
                            <span>$<?php echo $goal; ?></span></br>
                            <progress value="<?php echo ($raised/$goal)*100; ?>" max="100"></progress></br>
                            <!-- <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> -->
                            <small>RAISED: </small><span>$<?php echo $raised; ?></span>
                            <div class="donate_button">
                                <a href="<?php echo sow_esc_url( $link ); ?>"><button class="btn card_button mx-auto" type="submit"><?php echo $button; ?> <span class="oval"><i class="fas fa-arrow-right"></i></span></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="social-media1">
                        <ul>
                            <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="www.youtube.com"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php if( isset( $instance['bannerimage'] ) ) : ?>
            <?php foreach( $instance['bannerimage'] as $i => $bannerimage ) : ?>
                <?php
                    $bannerimg = siteorigin_widgets_get_attachment_image_src(
                        $bannerimage['image1'],
                        $size,
                        ! empty( $bannerimage['icon_image_fallback'] ) ? $bannerimage['icon_image_fallback'] : false
                    );
                ?>
                <div class="item">
                    <div class="overlay">
                        <?php if(!empty($attachment[0])):  ?>
                            <img src="<?php echo sow_esc_url($bannerimg[0]); ?>" alt="img">
                        <?php endif; ?>
                        <div class="overlay-layer_top">
                            <div class="banner-title-wrap">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>