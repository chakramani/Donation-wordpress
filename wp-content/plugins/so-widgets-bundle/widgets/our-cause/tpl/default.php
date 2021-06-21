<?php
	$last_row = floor( ( count($instance['features']) - 1 ) / $instance['per_row'] );
	$width = round( 100 / $instance['per_row'], 3 );

?>
<!-- <?php var_dump($instance['ourcause'] ); ?> -->
<!-- <?php var_dump(sow_esc_url( $instance['ourcause']['link'] )); ?> -->


<div class="our_cause">
    <div class="container">
        <div class="row"> 
            <?php if( isset( $instance['ourcause'] ) ) : ?>
                <?php foreach( $instance['ourcause'] as $i => $ourcause ) : ?>
                    <?php
                        $attachment = siteorigin_widgets_get_attachment_image_src(
                            $ourcause['image'],
                            $size,
                            ! empty( $ourcause['icon_image_fallback'] ) ? $ourcause['icon_image_fallback'] : false
                        );
                    ?>

                    

                    <div  style="width: <?php echo round( 100 / $instance['per_row'], 3 ) ?>%">
                        <div class="c-display">
                            <div class="cause_description">
                                <div class="content">
                                    <div class="card-images">
                                    <?php if(!empty($attachment[0])):  ?>
                                        <img src="<?php echo sow_esc_url($attachment[0]); ?>" alt="img">
                                    <?php endif; ?>
                                    </div>
                                    <div class="content-overlay">
                                        <div class="content-details">
                                            <div class="donate_button">
                                                <a href="<?php echo sow_esc_url( $ourcause['link'] ); ?>"><button class="btn" type="submit"><?php  echo $ourcause['button']; ?> <span class="oval"><i class="fas fa-arrow-right"></i></span></button></a>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rg-Wrapper">
                                <h3><?php  echo $ourcause['title']; ?></h3>
                            
                                <div class="ad">
                                    <small><?php  echo $ourcause['content']; ?></small>
                                </div>
                                <div class="progress1">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo ($ourcause['raised']/$ourcause['goal'])*100; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-6">
                                        <div class="raised">
                                            <span>RAISED</span></br>
                                            <small class="cause_value"><?php  echo '$'.$ourcause['raised']; ?></small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="goal">
                                            <span>GOAL</span></br>
                                            <small class="cause_value"><?php  echo '$'.$ourcause['goal']; ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>