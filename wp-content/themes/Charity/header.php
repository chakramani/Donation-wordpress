<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Donation</title>

    <?php
    wp_head();
    ?>
</head>

<body>
    <!------navbar top head------->
    <div class="login-menu">
        <div class="container">
            <div class="login-menu-wrap clearfix">
                <select name="language" id="language">
                    <option value="Nepali">Choose Language</option>
                    <option value="Nepali">Nepali</option>
                    <option value="English">English</option>
                    <option value="Hindi">Hindi</option>
                </select>
                <div class="float-right">
                    <span class="call">
                    <i class="fas fa-phone-alt text-warning"></i> &nbsp; <a href="#">1(787)-775-97-377</a>
                    </span>
                    <span class="call">
                        <i class="fas fa-envelope text-warning"></i>&nbsp; <a href="#"> info@Themesun.com</a>
                    </span>
                </div>
            </div>



        </div>
        
    </div>


    <!--main navbar-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- <?php $blog_info = get_bloginfo( 'name' ); ?> -->
        

            
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
            if(has_custom_logo()): ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?= $image[0] ?>"></a>
            <?php endif;?>
            
            <div >
                <?php if ( ! empty( $blog_info ) ) : ?>
                    <?php if ( is_front_page() && is_home() ) : ?>
                        <a class="navbar-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                    <?php else : ?>
                        <a class="navbar-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            
            <div>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description">
                            <?php echo $description; ?>
                        </p>
                <?php endif; ?>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <?php
                wp_nav_menu(
                    array(
                        'menu' => 'primary',
                        'container' => '',
                        'theme_location' => 'primary',
                        'items_wrap' => ' <ul class="navbar-nav ml-auto text-uppercase" id="">%3$s</ul>',
                        'walker' => new WP_Bootstrap_Navwalker(),
                    )
                    );
                ?>
                 <ul class="navbar-nav ml-auto text-uppercase">

                    <li>
                        <div class="donate_button">
                            <button class="button">
                                DONATE
                                <i class="fas fa-arrow-right arrow"></i>
                            </button>
                    </li>

                </ul> 
            </div>
        </nav>
    </div>
    
