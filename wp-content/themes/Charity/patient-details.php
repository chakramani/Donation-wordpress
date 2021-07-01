<?php
    /*
    Template Name: Patient Details
    */
    get_header();
    // $current_user = wp_get_current_user();
    $upload_dir   = wp_upload_dir();
    // echo $current_user;
    // echo $upload_dir;
    // var_dump($upload_dir);
    patient_details();
?>

<!-- stored in database -->
<?php  
    if($_POST['Register']){
        global $wpdb;
        $fname=$_POST['first_name'];
        $lname=$_POST['last_name'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $photo=$_FILES["photo"]["name"];
        $citizenship=$_FILES["citizenship"]["name"];
        $document=$_FILES["document"]["name"];
        $description=$_POST['description'];
        $required_amount=$_POST['required_amount'];
        $problem=$_POST['problem'];
        $table=$wpdb->prefix . 'patient';
        
        if($wpdb->insert(
            $table,
            array(
                
                'first_name'=> $fname,
                'last_name'=> $lname,
                'phone'=> $phone,
                'address'=> $address,
                'photo'=> $photo,
                'citizenship'=> $citizenship,
                'document'=> $document,
                'description'=> $description,
                'required_amt'=> $required_amount,
                'problem'=> $problem,
            )
        ) == false) wp_die('Database Insertion failed');
        else echo 'Registration successfully';

        $upload_dir   = wp_upload_dir();

        $target_dir = $upload_dir['path'].'/';
        // echo $target_dir;
        $target_file1 = $target_dir . basename($_FILES["photo"]["name"]);
        echo $target_file1;
        $target_file2 = $target_dir . basename($_FILES["document"]["name"]);
        $target_file3 = $target_dir . basename($_FILES["citizenship"]["name"]);


        if((move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file1)) &&
        (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file2)) &&
        (move_uploaded_file($_FILES["citizenship"]["tmp_name"], $target_file3))){
            echo "The file ". htmlspecialchars( basename( $_FILES["document"]["name"])). " has been uploaded.";
            echo "The file ". htmlspecialchars( basename( $_FILES["citizenship"]["name"])). " has been uploaded.";
            echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
        }

        ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost/wordpress/';
            </script>
        <?php
    }
?>

 <!-- part of image -->
<!-- <?php  
    $upload_dir   = wp_upload_dir();

    $target_dir = $upload_dir['url'];
    // echo $target_dir;
    $target_file1 = $target_dir . basename($_FILES["photo"]["name"]);
    echo $target_file1;
    $target_file2 = $target_dir . basename($_FILES["document"]["name"]);
    $target_file3 = $target_dir . basename($_FILES["citizenship"]["name"]);
    
    
    if((move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file1)) &&
    (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file2)) &&
    (move_uploaded_file($_FILES["citizenship"]["tmp_name"], $target_file3))){
        echo "The file ". htmlspecialchars( basename( $_FILES["document"]["name"])). " has been uploaded.";
        echo "The file ". htmlspecialchars( basename( $_FILES["citizenship"]["name"])). " has been uploaded.";
        echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
    }
?> -->



<?php
    function patient_details(){
        if(is_user_logged_in()){
            ?>
            <div class="container mt-5"> 
                <h5 class="text-center">Register form</h5>             
                <form method="POST" enctype="multipart/form-data" class="patient-details">
                    <div class="row">
                        <div class="col-8">
                            <div class="patient-dels">
                                <label for="first_name">First Name</label>
                                <div>
                                    <input id="first_name" type="text"
                                        class="form-control" name="first_name"
                                        placeholder="First Name" required autocomplete="first_name" autofocus>
                                </div>
                            </div>

                            <div class="patient-dels">
                                <label for="last_name">Last Name</label>

                                <div>
                                    <input id="last_name" type="text"
                                        class="form-control" name="last_name"
                                        placeholder="caste" required autocomplete="last_name" autofocus>
                                </div>
                            </div>


                            <div class="patient-dels">
                                <label for="phone">Phone</label>

                                <div>
                                    <input id="phone" type="text" class="form-control "
                                        placeholder="Phone" name="phone" required autocomplete="phone" autofocus>
                                </div>
                            </div>

                            <div class="patient-dels">
                                <label for="address">Address</label>

                                <div>
                                    <input id="address" type="text"
                                        class="form-control " name="address"
                                        placeholder="Address" required autocomplete="address" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="patient-dels">
                                <label for="photo">Photo</label>

                                <div>
                                    <input id="photo" type="file" class="form-control "
                                        name="photo" required autocomplete="photo" autofocus>
                                </div>
                            </div>

                            <div class="patient-dels">
                                <label for="document">Document</label>

                                <div>
                                    <input id="document" type="file"
                                        class="form-control " name="document"
                                        placeholder="Document" required autocomplete="document" autofocus>
                                </div>
                            </div>


                            <div class="patient-dels">
                                <label for="citizenship">Citizenship</label>

                                <div>
                                    <input id="citizenship" type="file"
                                        class="form-control " name="citizenship"
                                        required autocomplete="citizenship" autofocus>
                                </div>
                            </div>

                            <div class="patient-dels">
                                <div class="required_amount">
                                    <label for="required_amount">Required Amount</label>

                                    <div >
                                        <input id="required_amount" type="number"
                                            class="form-control " name="required_amount"
                                            placeholder="Required Amount" required autocomplete="required_amount" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="patient-dels">
                        <label for="description">Description</label>

                        <div>
                            <input id="description" type="text"
                                class="form-control " name="description"
                                placeholder="Describe problem in brief...." required autocomplete="description"
                                maxlength="60" autofocus>
                        </div>
                    </div>

                    <div class="patient-dels">
                        <label for="problem">Type of Problem:</label>
                        <div>
                                <select name="problem">
                                <option value="poor">Poor</option>
                                <option value="education">Education</option>
                                <option value="kidney">Kidney</option>
                                <option value="Old Aged" selected>Old Aged</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="patient_register_btn">
                        <input type="submit" value="Register" name="Register" class="button">
                    </div>

                </form>
            </div>
            <?php
            
        }
        else{
            ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost/wordpress';
            </script>
            <?php
        }
    }
?>
<?php get_footer()?>