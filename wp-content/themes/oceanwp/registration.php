<?php
    /*
    Template Name: Registration
    */
    get_header();
    $user=wp_get_current_user();


?>

<?php

if($_POST['Register']){
    global $wpdb;
    $fname=$_POST['first_name'];
    $lname=$_POST['last_name'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    // $dob=$_POST['dob'];
    // $photo=$_POST['photo'];
    // $email=$_POST['email'];
    // $password=$_POST['password'];
    // $role=$_POST['user_case'];

    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($hashed_password);

    // var_dump($fname);
    $table=$wpdb->prefix . 'registration';
    // var_dump($role);

    if($wpdb->insert(
        $table,
        array(
            
            'first_name'=> $fname,
            'last_name'=> $lname,
            'phone'=> $phone,
            'address'=> $address,
            // 'dob'=> $dob,
            // 'photo'=> $photo,
            'email'=> $user->user_email
            // 'password'=> $hashed_password,
            // 'role'=> $role


        )
     ) == false) wp_die('Database Insertion failed');
    else 
    echo 'Registration successfully';

    ?>

<?php
}
else{
    ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST">

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    required autocomplete="first_name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_)name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    required autocomplete="last_name" autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" required autocomplete="phone" autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address" required
                                    autocomplete="address" autofocus>
                            </div>
                        </div>


                        <!-- <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">DOB</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror"
                                    name="dob" required autocomplete="dob" autofocus>
                            </div>
                        </div> -->

                        <!-- <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">Photo</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror"
                                    name="photo" required autocomplete="photo" autofocus>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" required autocomplete="email" placeholder="<?php echo $user->user_email?>" disabled>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                            </div>
                        </div> -->


                        <!-- <label for="id" class="col-md-4 col-form-label text-md-right">Choose</label>

                        <select id="user_case_id" name="user_case">
                            <option value="Donor">Donor</option>
                            <option value="Patient">Patient</option>
                        </select> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-4 col-form-label text-md-right"><br>
                                <center><input type="submit" value="Register" name="Register" class="btn btn-primary"></center>
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