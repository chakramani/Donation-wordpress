
<div class="card-items-wrapper">
    <div class="our-event">
        <div class="container">
            <?php if( isset( $instance['event'] ) ) : ?>
                <?php foreach( $instance['event'] as $i => $event ) : ?>

                    <?php
                        $attachment = siteorigin_widgets_get_attachment_image_src(
                            $event['image'],
                            $size,
                            ! empty( $event['icon_image_fallback'] ) ? $event['icon_image_fallback'] : false    
                        );
                    ?>

                    <div class="horizontal-card">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="horizontal-card-image">
                                    <?php if(!empty($attachment[0])):  ?>
                                        <img src="<?php echo sow_esc_url($attachment[0]); ?>" alt="img">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="horizontal-card-content">
                                    <h2>
                                        <?php echo $event['title'];  ?>
                                    </h2>
                                    <p>
                                        <?php echo $event['content'];  ?>
                                    </p>
                                    <span>
                                        <i class="fas fa-clock"></i> <?php echo $event['time'];  ?> </br>
                                    </span>
                                    <span class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?php echo $event['location']; ?></br>
                                    </span>
                                    <span>
                                        <i class="fas fa-calendar-alt"></i>
                                        <?php echo $event['date'];  ?></br>
                                    </span>
                                    <div class="oval1 float-right">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

            <?php if( isset( $instance['event1'] ) ) : ?>
                <?php foreach( $instance['event1'] as $i => $event1 ) : ?>

                    <?php
                        $attachment1 = siteorigin_widgets_get_attachment_image_src(
                            $event1['image1'],
                            $size,
                            ! empty( $event1['icon_image_fallback'] ) ? $event1['icon_image_fallback'] : false
                        );
                    ?>

                    <div class="horizontal-card">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="horizontal-card-content">
                                    <h2>
                                        <?php echo $event1['title1'];  ?>
                                    </h2>
                                    <p>
                                        <?php echo $event1['content1'];  ?>
                                    </p>
                                    <span>
                                        <i class="fas fa-clock"></i> <?php echo $event1['time1'];  ?> </br>
                                    </span>
                                    <span class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?php echo $event1['location1'];  ?></br>
                                    </span>
                                    <span>
                                        <i class="fas fa-calendar-alt"></i>
                                        <?php  echo $event1['date1']; ?></br>
                                    </span>
                                    <div class="oval1 float-right">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-0">
                                <div class="horizontal-card-image">
                                    <?php if(!empty($attachment1[0])):  ?>
                                        <img src="<?php echo sow_esc_url($attachment1[0]); ?>" alt="img">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>