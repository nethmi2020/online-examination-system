<?php

include_once 'dbConnection.php';

// print_r($_POST);
// die();
$id=uniqid();
$ref=@$_GET['q'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];
$date=date("Y-m-d");
$time=date("h:i:sa");


$query=mysqli_query($con, "INSERT INTO feedback VALUES (

        '$id','$name', '$email', '$subject', '$feedback', '$date', '$time'
    )");
     
     header("location:$ref?q=Thank you for your valuable feedback");
       ?>
      
     
       