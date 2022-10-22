<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Worlds || DASHBOARD</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script src="js/main.js"></script>

</head>
<body>

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
           
            $email= $_SESSION['email'];
           

            include_once 'dbConnection.php';
            echo '<p style="color:white;"> Hello I am admin   <a href="index.php" class="pull-right btn sub1" >
            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;
            <span class="title1-signin"><b>Sign out</b></span></a></p>';
        }

        ?>
    </div><!--header row closed-->
</div>
<!-- admin start-->

<!--navigation menu-->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <a class="navbar-brand" href="#">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" <?php if(@$_GET['q']==1) echo'class="active"'; ?>>
        <a class="nav-link" href="dash.php?q=1">User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dash.php?q=2">Ranking</a>
      </li>
      <li class="nav-item <?php if(@$_GET['q']==1) echo'class="active"'; ?>">
        <a class="nav-link" href="dash.php?q=3">Feedback</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Quiz
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="dash.php?q=4">Add Quiz</a>
          <a class="dropdown-item" href="dash.php?q=5">Remove Quiz</a>
      </li>
      <li class="nav-item">
        <button class="btn btn-light my-2 my-sm-0 dashlink"> <a href="index.php" style="color:black" >Sign out</a></button>
      </li>
    </ul>
   
  </div>
</nav>
<!--navigation menu closed-->

<div class="container">
  <div class="row">
    <div class="col-md-12">


    <!-- user start -->
    <?php if(@$_GET['q']==1){
$result = mysqli_query($con,"SELECT * FROM user") ;
echo '<table class="table mt-5">
<thead>
  <tr>
    <th scope="col"><b>S.N.</b></th>
    <th scope="col"><b>Name</b></th>
    <th scope="col"><b>Gender</b></th>
    <th scope="col"><b>College</b></th>
    <th scope="col"><b>Email</b></th>
    <th scope="col"> <b>Mobile</b></th>
    <th scope="col"> <b>Action</b></th>
  </tr>
</thead>';

$c=1;
while($row=mysqli_fetch_array($result)){
  $name=$row['name'];
  $mob=$row['mob'];
  $gender=$row['gender'];
  $email=$row['email'];
  $college=$row['college'];



echo 
'<tr>
<td>'.$c++.'</td>
<td>'.$name.'</td>
<td>'.$mob.'</td>
<td>'.$gender. '</td>
<td>'.$email.'</td>
<td>'.$college.'</td>
<td><a title="Delete User" href="update.php?demail='.$email.'">Del<i class="fa-solid fa-trash-can-list"></i></td>
</tr>';

}  
    $c=0;
    echo '</table></div></div>';
    
    }?>
    <!--user end-->
  

     <!-- feedback start -->
     <?php if(@$_GET['q']==3){
$result = mysqli_query($con,"SELECT * FROM feedback") ;
echo '<table class="table mt-5">
<thead>
  <tr>
    <th scope="col"><b>S.N.</b></th>
    <th scope="col"><b>Subject</b></th>
    <th scope="col"><b>Email</b></th>
    <th scope="col"><b>Date</b></th>
    <th scope="col"><b>Time</b></th>
    <th scope="col"> <b>By</b></th>
    <th scope="col"> <b></b></th>
    <th scope="col"> <b></b></th>
  </tr>
</thead>';

$c=1;
while($row=mysqli_fetch_array($result)){
  $subject=$row['subject'];
  $email=$row['email'];
  $date=$row['date'];
  $time=$row['time'];
  $name=$row['name'];
  $id=$row['id'];

echo 
'<tr>
<td>'.$c++.'</td>
<td>'.$subject.'</td>
<td>'.$email.'</td>
<td>'.$date. '</td>
<td>'.$time.'</td>
<td>'.$name.'</td>
<td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'">
Open<i class="fa-solid fa-trash-can-list"></i></td>';
echo'
<td><a title="Delete User" href="update.php?fdid='.$id.'">Del<i class="fa-solid fa-trash-can-list"></i></td>
</tr>';

}  
    $c=0;
    echo '</table></div></div>';
    
    }?>
    <!--feedback end-->

    <!-- feedbakc open -->
    <?php if(@$_GET['fid']){
      $id=@$_GET['fid'];
      
      $result = mysqli_query($con,"SELECT * FROM feedback where id='$id'");

      while($row=mysqli_fetch_array($result)){
        $subject=$row['subject'];
        $email=$row['email'];
        $date=$row['date'];
        $time=$row['time'];
        $name=$row['name'];
        $feedback=$row['feedback'];
        $id=$row['id'];
      echo 
      '<div class="panel text-center"><p>'.$subject.'</p>
            <p><b>DATE:</b>'.$date.'<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTime:</b>'.$time.'
             <b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspBY:</b>'.$name.'</p>
            <p>'.$feedback.'</p>
            
      
      </div>';

    }
  }
    ?>
  
    </div>
  </div>
</div>
</body>
</html>