<!-- jumbotron header starts here -->
<section class="jumbotron-title">
    <div class="jumbotron">
        <div class="heading">
            <div class="container">
                <h4 class="text-uppercase float-left text-dark">
                    <a href="<?php echo sow_esc_url( $instance['textbutton']['url']);  ?>"
                        class="text-dark"><?php echo $instance['textbutton']['text'];  ?></a>
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="<?php echo sow_esc_url( $instance['textbutton']['url1']);  ?>"
                                class="active"><?php echo $instance['textbutton']['text1'];  ?></a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a
                                href="<?php echo sow_esc_url( $instance['textbutton']['url2']);  ?>"><?php echo $instance['textbutton']['text2'];  ?></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Jumbotron section ends here -->