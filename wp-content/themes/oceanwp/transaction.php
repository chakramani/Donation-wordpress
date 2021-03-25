<?php
    /*
    Template Name: Transaction form
    */
    get_header();
    
    // var_dump($_POST['p_id']);
    detailform();

?>

<?php


if($_POST['Donate']){
    echo 'hi';
    

    $user=wp_get_current_user();
    $table1=$wpdb->prefix . 'transaction';
    $amount=$_POST['amount'];
    $donor_id=$user->ID;
    $donor_name=$user->user_login;

    $patient_id=$_POST['patient_id'];

    var_dump($table1 , $amount , $donor_id, $donor_name , $patient_id);

    // if($wpdb->insert(
    //     $table1,
    //     array(
            
    //         'amount'=> $amount,
    //         'donor_id'=> $donor_id,
    //         'donor_name'=> $donor_name,
    //         'patient_id'=> $patient_id


    //     )
    // ) == false) wp_die('Database Insertion failed');
    // else
    // {
    //     echo 'Registration successfully';
    //     ?>
    //     <script type="text/javascript">
    //     window.location.href = 'http://localhost/wordpress/patient/';
    //     </script>
    //     <?php
    // }
}
?>


<?php

function detailform(){
    if(is_user_logged_in()){

        global $wpdb;
        $upload_dir = wp_upload_dir();

        $user=wp_get_current_user();
        // var_dump($user->user_email);
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
// var_dump($result);
            $table1=$wpdb->prefix . 'transaction';
            $query1 = $wpdb->prepare( "SELECT amount FROM $table1 where patient_id=%d",$_POST['p_id']);
            $result1=$wpdb->get_results($query1);
            // var_dump($result1);
            $amount=0;
            foreach($result1 as $d){
                $amount=$amount+$d->amount;
            }
        ?>
<?php
    foreach ( $result as $print ) {
        $max=$print->required_amt-$amount;

        ?>
        

    <form method="post">
        <div >

            <div class="row">
                <div class="column" style="background-color:#aaa;">
                    <img class="card-img-top" src=<?php echo $upload_dir['url']."/".$print->photo; ?> alt="img"
                        width="45" height="20">
                </div>
                <div class="column" style="background-color:#bbb;">
                    <a href="<?php echo $upload_dir['url']."/".$print->citizenship; ?>">Citizenship</a>
                </div>
                <div class="column" style="background-color:#ccc;">
                    <a href="<?php echo $upload_dir['url']."/".$print->document; ?>">Document</a>
                </div>
                <div class="column1" style="background-color:#ddd;">
                    <label for="Pat_id">Pat_ID: <?php echo $_POST['p_id']; ?></label>
                    <!-- <input type="text" name="pat_id" value="<?php echo $_POST['p_id']; ?>" > -->
                </div>
            </div>
        </div>
        <div class="card ml-5 mr-5 mt-2">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail">First Name</label>
                    <input type="email" class="form-control" id="inputEmail4"
                        placeholder="<?php echo $print->first_name; ?>" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword">Last Name</label>
                    <input type="password" class="form-control" id="inputPassword4"
                        placeholder="<?php echo $print->last_name; ?>" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" placeholder="<?php echo $print->address; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="inputDescription">Description</label>
                <input type="text" placeholder="<?php echo $print->description; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="inputRequiredAmount">Required Amount</label>
                <input type="text" placeholder="<?php echo $print->required_amt; ?>" name="required_amount" disabled>
            </div>
            <div class="form-group">
                <label for="inputTotalCollectedDonation">Total Collected Donation</label>
                <input type="text" placeholder="<?php echo $amount ?>" disabled>
            </div>
            <div class="form-group">
                <label for="inputAmount">Amount</label>
                <input type="number" placeholder="Amount" name="amount" max="<?php echo $max ?>" min="1">
            </div>
            <input type="hidden" value="<?php echo $_POST['p_id']?>" name="patient_id" />

            <div class="form-group">
                <div class="col-md-4 col-form-label text-md-right"><br>
                    <center><input type="submit" value="Donate" name="Donate"></center>
                    <br><br>
                </div>
            </div>

        </div>
    </form>
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
}
?>







<style>
* {
    box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 30%;
    padding: 10px;
    height: 60px;
    /* Should be removed. Only for demonstration */
}

.column1 {
    float: left;
    width: 10%;
    padding: 10px;
    height: 60px;
    /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
</style>