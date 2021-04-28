<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hello world</title>

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
                <div class="login-ryt-wrap">
                    <div class="login-section"></div>
                    <div class="social-media d-none d-sm-inline-block">
                        <span class="call">
                            <i class="fas fa-phone-alt text-warning"></i> &nbsp; <a href="#">1(787)-775-97-377</a>
                        </span>
                        <span class="envelope">
                            <i class="fas fa-envelope text-warning"></i>&nbsp; <a href="#"> info@Themesun.com</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--main navbar-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
            <a class="navbar-brand" href="#"> <img src="<?= $image[0] ?>"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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