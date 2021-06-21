<!-- <?php  var_dump($imagecounter); ?> -->


<div class="counter_up">
    <div class="content">
        <div class="row box ml-0">
            <?php if (isset($imagecounter)) : ?>
                <?php $selector = 0; ?>
                <?php foreach ($imagecounter as $i => $counter) : ?>

                    <?php $image = siteorigin_widgets_get_attachment_image_src(
                        $counter['image'],
                        !empty($counter['image_fallback']) ? $teams['icon_image_fallback'] : false ); 
                    ?>
                    <div class="col-md-3 pr-0 pl-0">
                        <div class="<?php echo (($selector % 2) == 0 ? 'box1' : 'box2'); $selector++;?> " style="background-image: url('<?php echo sow_esc_url($image[0]); ?>');">
                            <div class="counter"><?php echo $counter['count']; ?></div>
                            <div class="text"><?php echo $counter['topic']; ?></div>
                            <div class="icon"><i class="fas fa-donate"></i></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>