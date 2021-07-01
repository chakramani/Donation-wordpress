<?php
    /*
    Template Name: patient
    */
    get_header();
?>


<?php 

    $upload_dir = wp_upload_dir();
    // echo $upload_dir['url'];
    global $wpdb;
    $table=$wpdb->prefix . 'patient';
    $query = $wpdb->prepare( "SELECT * FROM $table");
    $result=$wpdb->get_results($query);
    
?>



<div class="container">
    <div>
        <h1 class="patient_list">Patient List</h1>
    </div>

    <div class="row">
        <?php
        foreach ( $result as $print ) 
        {
        ?>
        <form method="post">
            <div class="column">
                <div class="card">
                    <div class="image_section">
                        <img class="card-img-top" src=<?php echo $upload_dir['url']."/".$print->photo; ?> alt="img"
                            width="40" height="8">
                    </div>
                    <center>
                        <div>
                            <h3 class="card-title"><?php echo $print->first_name ?> <?php echo $print->last_name ?></h3>
                        </div>
                    </center>
                    <center>
                        <div>
                            <p class="card-title"><?php echo $print->address ?></p>
                        </div>
                    </center>
                    <div>
                        <h5 class="patient_desc"><?php echo '* '.$print->description; ?></h5>
                    </div>
                    <div class="reqd_amount">
                        <label>Required Amount</label>
                        <button disabled="disabled"><?php echo $print->required_amt; ?></button>
                    </div>
                    <div>
                        <input type="hidden" name="p_id" value="<?php echo $print->id ?>" />
                    </div>
                    <div class="amount_donate_btn">
                        <button type="submit" value="Donate" name="Donate"
                            formaction="http://localhost/wordpress/transaction/" class="donate_btn">Donate</button>
                    </div>
                </div>
            </div>
        </form>
        <?php
    }
    ?>
</div>
<?php get_footer();?>