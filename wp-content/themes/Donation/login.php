<?php
    /*
    Template Name: Login
    */
    get_header();

?>

<?php

if($_POST['Login']){
    global $wpdb;

    $email=$_POST['email'];
    $password=$_POST['password'];

    $table=$wpdb->prefix . 'registration';
    // $results = $wpdb->get_results( 
    //     $wpdb->prepare("SELECT * FROM {$wpdb->prefix}registration WHERE email, $email) );
    $query1 = $wpdb->prepare( "SELECT password FROM $table where email= %s",$email);
    $hash=$wpdb->get_results($query1);
    // var_dump($query );
    $query = $wpdb->prepare( "SELECT * FROM $table ");

    $result=$wpdb->get_results($query);
    // var_dump($result);
    // echo $result;
    // if (password_verify($password,$result)) {
    //     echo 'Password is valid!';
    // } else {
    //     echo 'Invalid password.';
    // }

    // $result=$wpdb->get_results("select * from $table where email=$email");
        // if(password_verify($password, $query)) {
            // If the password inputs matched the hashed password in the database
            // Do something, you know... log them in.
        //     echo 'varified';
        // } 
        // else {
        //     echo 'not varified';
        // }

    
    // if($email!='' && $password!=''){

    //     while($row=mysqli_fetch_assoc($result)){
    //         if(password_verify($pass1,$row['password']))
    //         {
    //             echo 'logged in sucessfully!';
                    
    //         }
    //         else{
    //             echo 'milen';
    //         }
            
            
    //     }

    // }
    // var_dump($email,$password);
    
    if(wp_check_password( $password,$hash )){
        echo 'success!';
    }
    else{
        echo 'try again';
    }


?>

<?php
    }
    else{
        ?>
<div class="container">
    <form action="" method="post">
        <div>
            <label for="email">E-Mail Address</label>
            <div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    required autocomplete="email">
            </div>
        </div>

        <div>
            <label for="password">Password</label>
            <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">
            </div>
        </div>

        <div>
            <div><br>
                <center><input type="submit" value="Login" name="Login" class="btn btn-primary"></center>
                <br><br>
            </div>
        </div>
    </form>
</div>
<?php
}