<?php
    /*
    Template Name: Common Donation
    */
    get_header();
?>


<?php
    if($_GET['Donate']){
        $user=wp_get_current_user();
        $table1=$wpdb->prefix . 'transaction';
        $amount=$_GET['amount'];
        $donor_id=$user->ID;
        $donor_name=$user->user_login;

        if($wpdb->insert(
            $table1,
            array(
                
                'amount'=> $amount,
                'donor_id'=> $donor_id,
                'donor_name'=> $donor_name


            )
        ) == false) wp_die('Database Insertion failed');
        else{
            echo 'Donated successfully';
            ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost/wordpress/';
            </script>
            <?php
        }
    }
?>




<?php
if(is_user_logged_in()){

    ?>

    <div class="container">
        <form method="get">
            <div class="card ml-5 mr-5 mt-2">
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputAddress2"><h4>Amount</h4></label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Amount" name="amount">
                    </div>
                    <input type="hidden" value="<?php echo $_POST['id']?>" name="patient_id" />

                    <div class="form-group">
                        <div class="col-md-4 col-form-label text-md-right"><br>
                            <center><input type="submit" value="Donate" name="Donate"></center>
                            <br><br>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <?php
}
else{
    ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost/wordpress/log-in/';
    </script>
    <?php
}
?>

<?php get_footer() ?>