<?php
 $attachment = siteorigin_widgets_get_attachment_image_src(
    $image,
    !empty($whoweare['icon_image_fallback']) ? $whoweare['icon_image_fallback'] : false ); 
?>
<div class="who_we_are">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 p-0">
                <div class="who_we_are_image">
                    <?php if(!empty($attachment[0])):  ?>
                        <img src="<?php echo sow_esc_url($attachment[0]); ?>" alt="img">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="who_we_are_wrapper">
                    <div class="heading">
                        <h5 class="underline"><?php echo $title;  ?></h5>
                    </div>
                    <div class="content">
                        <p> <?php echo $content;  ?> </p>
                        <div class="donate_button">
                            <button class="btn"><a href="#"><?php echo $button;  ?></a><span class="oval"><i class="fas fa-arrow-right"></i></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>