


<?php session_start(); /* Starts the session */
if(!isset($_SESSION['UserData']['Username'])){
header("location:http://localhost/wordpress/registration/");
exit;
}
?>