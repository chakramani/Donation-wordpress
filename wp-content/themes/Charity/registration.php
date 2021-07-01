<?php
    /*
    Template Name: Registration
    */
    get_header();
?>

<?php
$user=wp_get_current_user();
if($_POST['Register']){
    global $wpdb;
    $fname=$_POST['first_name'];
    $lname=$_POST['last_name'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $table=$wpdb->prefix . 'registration';
    if($wpdb->insert(
        $table,
        array(
            
            'first_name'=> $fname,
            'last_name'=> $lname,
            'phone'=> $phone,
            'address'=> $address,
            'email'=> $user->user_email


        )
     ) == false) wp_die('Database Insertion failed');
    else 
    echo 'Registration successfully';

}
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

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" required autocomplete="email" placeholder="<?php echo $user->user_email?>" disabled>
                            </div>
                        </div>

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


<?php get_footer()?>
