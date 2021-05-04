<?php
    /*
    Template Name: Transaction form
    */
    get_header();

?>
<?php
    if($_POST['Submit']){
        global $wpdb;
        $user=wp_get_current_user();
        $table1=$wpdb->prefix . 'transaction';
        $amount=$_POST['amount'];
        $donor_id=$user->ID;
        $donor_name=$user->user_login;

        $problem=$_POST['patient_problem'];

        $patient_id=$_POST['patient_id'];
        if($wpdb->insert(
            $table1,
            array(
                
                'amount'=> $amount,
                'donor_id'=> $donor_id,
                'donor_name'=> $donor_name,
                'patient_id'=> $patient_id


            )
        ) == false) wp_die('Database Insertion failed');
        else
        {
            transaction_suggestion($problem,$patient_id);


        }
    }
?>


<?php
    global $wpdb;
    $upload_dir = wp_upload_dir();

    $user=wp_get_current_user();
    $reg_table=$wpdb->prefix . 'registration';
    $res=$wpdb->get_var($wpdb->prepare( "SELECT count(email) FROM $reg_table where email=%s",$user->user_email));
    if(!$res){

        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost/wordpress/registration/';
        </script>
        <?php
    }

    $table=$wpdb->prefix . 'patient';
    $query = $wpdb->prepare( "SELECT * FROM $table where id=%d",$_POST['p_id']);

    $result=$wpdb->get_results($query);

    $table1=$wpdb->prefix . 'transaction';
    $query1 = $wpdb->prepare( "SELECT amount FROM $table1 where patient_id=%d",$_POST['p_id']);
    $result1=$wpdb->get_results($query1);

    $amount=0;
    foreach($result1 as $d){
        $amount=$amount+$d->amount;
    }
?>

<?php

    if(is_user_logged_in()){
        foreach ( $result as $print ) {
            $max=$print->required_amt-$amount;
            ?>
            <div class="container transaction">
                <center><label for="username" class="patient_name_title"><?php echo $print->first_name?>
                        <?php echo $print->last_name?></label></center>
                <form method="post">
                    <div>

                        <div class="row">
                            <div class="patient_doc" style="background-color:#aaa;">
                                <img src=<?php echo $upload_dir['url']."/".$print->photo; ?> alt="img" width="45" height="20">
                            </div>
                            <div class="patient_doc" style="background-color:#bbb;">
                                <a href="<?php echo $upload_dir['url']."/".$print->citizenship; ?>">Citizenship</a>
                            </div>
                            <div class="patient_doc" style="background-color:#ccc;">
                                <a href="<?php echo $upload_dir['url']."/".$print->document; ?>">Document</a>
                            </div>
                            <div class="patient_id" style="background-color:#ddd;">
                                <label for="Pat_id">Pat_ID: <?php echo $_POST['p_id']; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="name">
                            <label for="inputfirstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" placeholder="<?php echo $print->first_name; ?>"
                                disabled>
                        </div>
                        <div class="name lastname">
                            <label for="inputlastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" placeholder="<?php echo $print->last_name; ?>"
                                disabled>
                        </div>
                    </div>


                    <div>
                        <label for="inputAddress">Address</label>
                        <input type="text" placeholder="<?php echo $print->address; ?>" disabled>
                    </div>

                    <div class="row">
                        <div class="tran_req_amount">
                            <label for="inputRequiredAmount">Required Amount</label>
                            <input type="text" placeholder="<?php echo $print->required_amt; ?>" name="required_amount" disabled>
                        </div>
                        <div class="tran_req_amount colected">
                            <label for="inputTotalCollectedDonation">Total Collected Donation</label>
                            <input type="text" placeholder="<?php echo $amount ?>" disabled>
                        </div>
                    </div>

                    <div>
                        <label for="inputDescription">Description</label>
                        <input type="text" rows="3" disabled placeholder="<?php echo $print->description; ?>" />
                    </div>

                    <div>
                        <label for="inputAmount">Amount</label>
                        <input type="number" id="amount" placeholder="Amount" name="amount" max="<?php echo $max ?>" min="1"
                            class="form-control @error('amount') is-invalid @enderror" required autocomplete="amount" autofocus>
                    </div>
                    <input type="hidden" value="<?php echo $_POST['p_id']?>" name="patient_id" />
                    <input type="hidden" value="<?php echo $print->problem ?>" name="patient_problem" />


                    <div class="donation submit">
                        <input type="submit" value="Submit" name="Submit" class="button">
                    </div>

                </form>
            </div>
        <?php
        }
    }
    else{
        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost/wordpress/log-in/';
        </script>
        <?php
    }
?>

<?php

    function transaction_suggestion($problem,$patient_id)
    {
        global $wpdb;
        $upload_dir = wp_upload_dir();

        $patient_table=$wpdb->prefix . 'patient';
        $sql=$wpdb->prepare( "SELECT * FROM $patient_table where problem = '$problem' and id != $patient_id");
        $suggestion=$wpdb->get_results($sql);


        if($suggestion !=null){
            ?>
            <div class="container">
                <div>
                    <h1 class="patient_list">Some Suggestions</h1>
                </div>
            
                <div class="row">
                    <?php
                    foreach ( $suggestion as $print ) 
                    {
                    ?>
                    <form method="post">
                        <div class="column">
                            <div class="patient-list">
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
                                        formaction="http://localhost/wordpress/transaction/" class="button">Donate</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
            <script>
                alert("Well Done! Successfully Donated.");
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Well Done! Successfully Donated.");
                alert("Suggestion not found.");
                window.location.href = 'http://localhost/wordpress/patient/';
            </script>
            <?php
        }
    }

?>

<?php get_footer();?>



