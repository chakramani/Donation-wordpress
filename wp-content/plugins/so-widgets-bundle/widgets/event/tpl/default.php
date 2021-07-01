<?php
	$last_row = floor( ( count($instance['features']) - 1 ) / $instance['per_row'] );
	$width = round( 100 / $instance['per_row'], 3 );
?>

<div class="card-items-wrapper">
    <div class="container">
        <div class="row"> 
            <?php if( isset( $instance['event'] ) ) : ?>
                <?php foreach( $instance['event'] as $i => $event ) : ?>
                        <?php
                            $attachment = siteorigin_widgets_get_attachment_image_src(
                                $event['image'],
                                $size,
                                ! empty( $event['icon_image_fallback'] ) ? $event['icon_image_fallback'] : false
                            );
                        ?>

                        <div class="col-lg-auto mb-5" style="width: <?php echo round( 100 / $instance['per_row'], 3 ) ?>%">
                            <div class="c-display">
                                <div class="card-images">
                                    <?php if(!empty($attachment[0])):  ?>
                                        <img src="<?php echo sow_esc_url($attachment[0]); ?>" alt="img">
                                    <?php endif; ?>
                                </div>
                                <div class="card-content-wrapper">
                                    <h2><?php  echo $event['title']; ?></h2>
                                    <p><?php  echo $event['content']; ?></p>
                                    <span><i class="fas fa-clock"></i> 9:00 Am -11:00pm </br></span>
                                    <span class="location"><i class="fas fa-map-marker-alt"></i> <?php  echo $event['location']; ?></br></span>
                                    <span><i class="fas fa-calendar-alt"></i> <?php  echo $event['date']; ?></br></span>
                                    <div class="oval1">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>