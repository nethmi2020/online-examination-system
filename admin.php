<?php

include_once 'dbConnection.php';
$ref=@$_GET['q'];
// print_r($ref);
// exit();
$email = $_POST['email'];
$password = $_POST['password'];


$result=mysqli_query($con, "SELECT email from admin WHERE email= '$email' and password ='$password'");
$count=mysqli_num_rows($result);
if($count==1){
    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["key"] ='sunny7785068889';
    
    header("location:dash.php?q=0");
}
else{
     header("location:$ref?w=Warning : Access denied");
}