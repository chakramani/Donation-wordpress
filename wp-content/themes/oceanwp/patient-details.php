<?php
    /*
    Template Name: Patient Details
    */
    get_header();
?>



<?php

// if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
//   }


if(is_user_logged_in()){
    if($_POST['Register']){
        global $wpdb;
        echo 'hehe12';
        $fname=$_POST['first_name'];
        $lname=$_POST['last_name'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $photo=$_FILES["photo"]["name"];

       
        
        
        
        // echo $_FILES["photo"]["name"];
        $citizenship=$_FILES["citizenship"]["name"];
        $document=$_FILES["document"]["name"];
        $description=$_POST['description'];
        $required_amount=$_POST['required_amount'];
        
        $target_dir = "C:/xampp/htdocs/wordpress/wp-content/uploads/2021/03/";
        $target_file1 = $target_dir . basename($_FILES["photo"]["name"]);
        $target_file2 = $target_dir . basename($_FILES["document"]["name"]);
        $target_file3 = $target_dir . basename($_FILES["citizenship"]["name"]);
        
        
        if((move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file1)) &&
        (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file2)) &&
        (move_uploaded_file($_FILES["citizenship"]["tmp_name"], $target_file3))){
            echo "The file ". htmlspecialchars( basename( $_FILES["document"]["name"])). " has been uploaded.";
            echo "The file ". htmlspecialchars( basename( $_FILES["citizenship"]["name"])). " has been uploaded.";
            echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
        }
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
            )
        ) == false) wp_die('Database Insertion failed');
        else echo 'Registration successfully';
        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost/wordpress/';
        </script>
        <?php



        ?>

<?php
    }

    
    else
    {
        ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="first_name" >First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="First Name"
                                    required autocomplete="first_name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" >Last Name</label>

                            <div class="col-md-6">
                                <input id="last_)name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="caste"
                                    required autocomplete="last_name" autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone" >Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone"
                                    name="phone" required autocomplete="phone" autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="address" >Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" required
                                    autocomplete="address" autofocus>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="photo" >Photo</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror"
                                    name="photo" required autocomplete="photo" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="document" >Document</label>

                            <div class="col-md-6">
                                <input id="document" type="file"
                                    class="form-control @error('document') is-invalid @enderror" name="document" placeholder="Document"
                                    required autocomplete="photo" autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="citizenship" class="col-md-4 col-form-label text-md-right">Citizenship</label>

                            <div class="col-md-6">
                                <input id="citizenship" type="file"
                                    class="form-control @error('citizenship') is-invalid @enderror" name="citizenship"
                                    required autocomplete="photo" autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="description" placeholder="Describe problem in brief...."
                                    required autocomplete="address" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="Reqd_amount">Required Amount</label>

                            <div class="col-md-6">
                                <input id="address" type="number"
                                    class="form-control @error('address') is-invalid @enderror" name="required_amount" placeholder="Required Amount"
                                    required autocomplete="address" autofocus>
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-4 col-form-label text-md-right"><br>
                                <center><input type="submit" value="Register" name="Register" class="btn btn-primary">
                                </center>
                                <br><br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
<style>
    input#address {
    max-width: 100%;
}
</style>