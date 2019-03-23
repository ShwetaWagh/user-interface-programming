<?php

require('db_connection.php');
 
echo 'Your name is ';

session_start();

//If the form is submitted
if (isset($_POST['bartender_username']) and isset($_POST['bartender_password'])){
     
    $username = $_POST['bartender_username'];
    $password = $_POST['bartender_password'];
    
    $query = "SELECT * FROM `Bartender` WHERE Bar_username='$username' and Bar_pwd='$password'";
    
    echo $query;
    
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    
    echo ' get variable result ';
    
    $count = mysqli_num_rows($result);
    
    if ($count ==1){
        echo ' correct login name';
        
        $_SESSION["username"] = $username;
        
        header("Location: http://localhost:8888/bartender_v3/bartender_home.html");
    }
    
    else{
        echo ' Invalid Login Credentials';
        
        $_SESSION["error"] = "error";
        
        header("Location: http://localhost:8888/bartender_v3/bartender_login.php");
    }
    
}

?>