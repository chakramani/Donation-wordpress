<!-- <?php  var_dump($instance['connect']['text']); ?> -->
<!-- <?php var_dump($instance['other']);  ?> -->


<?php
    $attachment = siteorigin_widgets_get_attachment_image_src(
        $instance['connect']['image'],
        $size,
        ! empty( $feature['icon_image_fallback'] ) ? $feature['icon_image_fallback'] : false
    );
?>

<div class="container">
    <div class="row">
        <div>
            <div class="logo">
                <a class="navbar-brand pb-3" href="#">
                    <?php if(!empty($attachment[0])):  ?>
                    <img src="<?php echo sow_esc_url($attachment[0]); ?>" alt="img" height="50" width="100">
                    <?php endif; ?>
                </a>
            </div>
            <?php if(!empty($instance['connect']['text'])): ?>
                <p>
                    <?php echo $instance['connect']['text'];  ?>
                </p>
            <?php endif; ?>
            <div class="footer_link">
                <ul>
                    <?php foreach($instance['other'] as $other):  ?>
                        <li>
                            <i class="<?php echo $other['icon'];  ?>"></i>
                            <a href="#"><span> &nbsp; &nbsp;<?php echo $other['text'];  ?></span></a>
                        </li>
                    <?php endforeach;  ?>
                </ul>
            </div>
        </div>
    </div>
</div>