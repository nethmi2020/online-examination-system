<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

</head>
<?php
include_once 'dbConnection.php';
?>
 <div class="header">
        <div class="row">
            <div class="col lg-6">
            <span class="logo">Test Your Skill</span></div>
            <div class="col-md-2 col-md-offset-2">
            
            <?php 
            include_once 'dbConnection.php';
        session_start();
        if(!isset($_SESSION['email'])){
            header("location:index.php");
        }
        else{
            $name= $_SESSION['name'];
            $email= $_SESSION['email'];

            include_once 'dbConnection.php';
            echo '<p style="color:white;"> Hello I am ' .$name.'    <a href="index.php" class="pull-right btn sub1" >
            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;
            <span class="title1-signin"><b>Sign out</b></span></a></p>';
        }

        ?>
</div><!--header row closed-->
</div>

<div class="bg">
    <!--navigation menu-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">NetCamp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dash.php?q=1">History</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dash.php?q=2">Ranking</a>
      </li>
   
      <li class="nav-item">
        <button class="btn btn-light my-2 my-sm-0 dashlink"> <a href="index.php" style="color:black" >Sign out</a></button>
      </li>
      <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Enter Tag" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </ul>
   
  </div>
</nav>
<!--navigation menu closed-->
<div class="row">

<div class="col-md-7"></div>
<div class="col-md-4 panel">

</div><!--col-md-6 end-->
</div></div>
</div><!--container end-->
<body>
    
</body>
</html>