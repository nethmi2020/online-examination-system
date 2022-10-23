<?php

include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];

// delete feedback
if(isset($_SESSION['key'])){

    $id=$_GET['fdid'];
    // print_r($id);
    // die();
    $result=mysqli_query($con, "DELETE FROM feedback WHERE id='$id'");
    header("location:dash.php?q=3");
}
// if($_SESSION['email'] || $_SESSION['key']="sunny7785068889")){

// };

// delete feedback
if(isset($_SESSION['key'])){

    $email=$_GET['demail'];
    // print_r($id);
    // die();
    $result=mysqli_query($con, "DELETE FROM user WHERE email='$email'");
    header("location:dash.php?q=1");
}


// add quiz
if(isset($_SESSION['key'])){
    if($_GET['q']== "addquiz"){
        $title=$POST['quiztitle'];
        $total=$_POST['numquestion'];
        $right=$_POST['marks'];
        $wrong=$_POST['minmarks'];
        $time=$_POST['time'];
        $tag=$_POST['tag'];
        $description=$_POST['description'];
        $id=uniqid();
        $q3=mysqli_query($con , "INSERT INTO quiz VALUES  ( '$id','$title' , '$total' ,'$right',  '$wrong', 
        '$time', '$tag',' $description')");
         header("location:dash.php?q=4&step=2&id=$id&n=$total");

    }

}