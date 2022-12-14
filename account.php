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
<body>
 <div class="header">
        <div class="row">
            <div class="col lg-6">
            <span class="logo">Test Your Skill</span></div>
            <div class="col-md-2 col-md-offset-2">
            
            <?php 
            include_once 'dbConnection.php';
        session_start();
        if(!(isset($_SESSION['email']))){
            header("location:index.php");
        }
        else{
            // $name= $_SESSION['name'];
            $email= $_SESSION['email'];

            include_once 'dbConnection.php';
            echo '<p style="color:white;"> Hello I am Admin    <a href="index.php" class="pull-right btn sub1" >
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
        <a class="nav-link" href="account.php?q=1">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dash.php?q=1">History</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dash.php?q=2">Ranking</a>
      </li>

      <li class="nav-item <?php if(@$_GET['q']==3) echo'class="active"'; ?>">
        <a class="nav-link" href="dash.php?q=3">Feedback</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Quiz
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="dash.php?q=4">Add Quiz</a>
          <a class="dropdown-item" href="dash.php?q=6">Remove Quiz</a>
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

<div class="container">
  <div class="row">
    <div class="col-md-12">
    
<!-- home page start -->

     <?php if(@$_GET['q']==1){
    $result = mysqli_query($con,"SELECT * FROM quiz") ;


    echo '<table class="table mt-5">
    <thead>
      <tr>
        <th scope="col"><b>S.N.</b></th>
        <th scope="col"><b>Topic</b></th>
        <th scope="col"><b>Total Questions</b></th>
        <th scope="col"><b>Marks</b></th>
        <th scope="col"><b>Time Limit</b></th>
    
      </tr>
    </thead>';

    $c=1;
    while($row=mysqli_fetch_array($result)){

      $id=$row['id'];
      $name=$row['name'];
      $total=$row['total'];
      $right=$row['right'];
      $time=$row['time'];
      $id=$row['id'];

    $q12=mysqli_query($con,"SELECT score  FROM history WHERE id='$id' AND email='$email'") ;
    $rowcount=mysqli_num_rows($q12);
    if($rowcount==0){
      echo 
          '<tr>

          <td>'. $id.'</td>
          <td>'.$name.'</td>
          <td>'.$total.'</td>
          <td>'.$right.  '</td>
          <td>'.$time.'</td>
          <td><a title="Start Quiz" href="account.php?q=quiz&step=2&qid='.$id.'&n=1&t='.$total.'" class="btn btn-primary">
          Start Quiz<i class="fa-solid fa-trash-can-list"></i></td>

          </tr>';
    }
    else{
      echo 
          '<tr>

          <td>'. $id.'</td>
          <td>'.$name.'</td>
          <td>'.$total.'</td>
          <td>'.$right.  '</td>
          <td>'.$time.'</td>
          <td><a title="ReStart Quiz" href="update.php?q=quizre&step=25&qid='.$id.'&n=1&t='.$total.'" class="btn btn-primary">
          Start Quiz<i class="fa-solid fa-trash-can-list"></i></td>

          </tr>';
    }


    }  
        $c=0;
        echo '</table></div></div>';
        
        }?>
        <!-- home closed -->


        <!-- quiz start -->

        <?php if(@$_GET['q']=='quiz'  && @$_GET['step'] ==2){

          $id=@$_GET['qid']; //quiz eke id eka
          $sn=@$_GET['n'];
          $total=@$_GET['t']; // quiz eke thiyn prashn gana

          $q=mysqli_query($con, "SELECT * FROM questions WHERE id='$id' AND sn='$sn' ");
          echo '<div class="panel">';
          while($row=mysqli_fetch_array($q)){
            $qns=$row['qns'];  //question eka
            $qid=$row['qid'];
            echo '<b>Question &nbsp;'.$sn.'&nbsp;::' .$qns. '</b><br><br>';
          }

          $q=mysqli_query($con, "SELECT * FROM options WHERE qid='$qid'  ");

            echo '
            <form class="form-horizontal title1" action="update.php?q=quiz&step=2&id='.$id.'&n='.$sn.
            '&t='.$total.'&qid='.$qid.'" method="POST">
            <br>';
            
        
              while($row=mysqli_fetch_array($q)){
              
                $options=$row['options'];
                $optionid=$row['optionid'];

              echo '<input type="radio" name="ans" value="'.$optionid.'"> '.$options.'<br>';
              }
              echo '<br>
              <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              </div>
              ';
        }
        ?>

      <?php if(@$_GET['q']=='result' ){
        
        echo 'hi';
      }

      ?>
         </div>
    </div>
  </div>
</body>
</html>