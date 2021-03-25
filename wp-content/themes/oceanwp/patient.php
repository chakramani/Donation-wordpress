<?php
    /*
    Template Name: patient
    */
    get_header();

    patient();


?>
<?php
function patient(){
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
        <h1>Patient List</h1>
    </div>
    <form method="post">
        <div class="row">
            <?php
            foreach ( $result as $print ) 
            {
            ?>
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
                        <h5 class="card-title"><?php echo '* '.$print->description; ?></h5>
                    </div>
                    <div>
                        <label>Required Amount</label>
                        <button disabled="disabled"><?php echo $print->required_amt; ?></button>
                    </div>
                    <div>
                    <?php echo $print->id; ?>
                        <input type="hidden" name="p_id" value="<?php echo $print->id ?>" />
                    </div>
                    <center>
                    <button type="submit" value="Donate" name="Donate" formaction="http://localhost/wordpress/transaction/">Donate</button>
                    </center>
                </div>
            </div>
            <?php
    }
    ?>
        </div>
    </form>

</div>
<?php }
?>


<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
    float: left;
    width: 25%;
    padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {
    margin: 0 -5px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
    .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
    }
}

/* Style the counter cards */
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    padding: 16px;
    text-align: center;
    background-color: #f1f1f1;
    margin: 9px 0px;
}

/*margin of donate button*/
input.donate_btn {
    margin: 14px;
}

/*Amount button margin*/
button {
    margin-left: 26px;
}

h1 {
    color: olive;
    margin-top: 17px;
    margin-left: 70px;
    text-decoration-line: underline;
}
h5.card-title {
    color: #c33b3b;
}
</style>