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
      <li class="nav-item ">
        <a class="nav-link" href="dash.php?q=0">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" <?php if(@$_GET['q']==1) echo'class="active"'; ?>>
        <a class="nav-link" href="dash.php?q=1">User</a>
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
    </ul>
   
  </div>
</nav>
<!--navigation menu closed-->

<div class="container">
  <div class="row">
    <div class="col-md-12">

<!-- home page start -->

<?php if(@$_GET['q']==0){
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


echo 
'<tr>

<td>'. $id.'</td>
<td>'.$name.'</td>
<td>'.$total.'</td>
<td>'.$right. '</td>
<td>'.$time.'</td>
<td><a title="Delete User" href="update.php?qid='.$id.'" class="btn btn-primary">Start Quiz<i class="fa-solid fa-trash-can-list"></i></td>

</tr>';

}  
    $c=0;
    echo '</table></div></div>';
    
    }?>


<!-- home page end -->

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
<td><a class="btn btn-danger" title="Delete User" href="update.php?demail='.$email.'">Delete<i class="fa-solid fa-trash-can-list"></i></td>
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
<td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'" class="btn btn-success">
Open<i class="fa-solid fa-trash-can-list"></i></td>';
echo'
<td><a title="Delete User" href="update.php?fdid='.$id.'" class="btn btn-danger">Delete<i class="fa-solid fa-trash-can-list"></i></td>
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
  <!-- feedback closed -->

  <!-- add quiz -->

  <?php if(@$_GET['q']==4){

    echo '  <form class="form-addquiz" name="form1" action="update.php?q=addquiz"  method="POST">
    <fieldset>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="name"></label>  
      <div class="col-md-12">
      <input id="qtitle" name="quiztitle" placeholder="Enter Quiz  title" class="form-control input-md" type="text" required>
      <!-- <h5 id="usercheck" style="color: red;">
        **Username is missing
      </h5> -->
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="name"></label>  
      <div class="col-md-12">
      <input id="nquestion" name="numquestion" placeholder="Enter total number of questions" class="form-control input-md" type="number" required>
      <!-- <h5 id="usercheck" style="color: red;">
        **Username is missing
      </h5> -->
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="name"></label>  
      <div class="col-md-12">
      <input id="qmarks" name="marks" placeholder="Enter marks on right answer" class="form-control input-md"
       type="number" required>
      <!-- <h5 id="collegecheck" style="color: red;">
          **College name  is missing
        </h5> -->
      </div>
    </div>
    
    
      <!-- Text input-->
      <div class="form-group">
      <label class="col-md-12 control-label" for="name"></label>  
      <div class="col-md-12">
      <input id="mmarks" name="minmarks" placeholder="Enter minus marks on right answer" class="form-control input-md"
       type="number" required>
      <!-- <h5 id="collegecheck" style="color: red;">
          **College name  is missing
        </h5> -->
      </div>
    </div>
    
     <!-- Text input-->
     <div class="form-group">
      <label class="col-md-12 control-label" for="name"></label>  
      <div class="col-md-12">
      <input id="qtime" name="time" placeholder="Enter time limit" class="form-control input-md"
       type="number" required>
      <!-- <h5 id="collegecheck" style="color: red;">
          **College name  is missing
        </h5> -->
      </div>
    </div>
    
    
     <!-- Text input-->
     <div class="form-group">
      <label class="col-md-12 control-label" for="name"></label>  
      <div class="col-md-12">
      <input id="#tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md"
       type="text" required>
      <!-- <h5 id="collegecheck" style="color: red;">
          **College name  is missing
        </h5> -->
      </div>
    </div>
    
    <div class="form-group">
    <textarea rows="5" cols="8" name="description" class="form-control" placeholder="Write description here..." required></textarea>
        
      </div>
    </div>
 
    <div class="form-group">
      <label class="col-md-12 control-label" for=""></label>
      <div class="col-md-12"> 
        <input  type="submit" class="sub quiz" value="sign up" class="btn btn-primary"/>
      </div>
    </div>
    
    </fieldset>
    </form>'; }
?>

  <!-- add quiz step 2 -->
    
  <?php if(@$_GET['q']==5 && (@$_GET['step'])==2)
  {

    // print_r($_POST);
    // die();
    echo '  <div class="row">
    <span><b>Enter Question Details</b></span>
    <div class="col-md-1"></div>
    <div class="col-md-11">
      <form class="form-horizontal title1" action="update.php?q=addqns&n='.$_GET['n'].' &id='.$_GET['id'].'&ch=4" method="POST">
    
    ';
  for($i=1;$i<=@$_GET['n']; $i++){

    echo '
      <h4>Question number '.$i.'</h4>
      <div class="form-group">
        <label class="col-sm-12 control-label" for="qns'.$i.' "></label>  
        <div class="col-md-12">
          <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
        </div>
      </div>
    
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>

<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />';
      
      
   
  }
  
  echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
}
?><!--add quiz step 2 end-->
  
 
  <!-- remove quiz -->
  <?php if(@$_GET['q']==6){
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


echo 
'<tr>

<td>'. $id.'</td>
<td>'.$name.'</td>
<td>'.$total.'</td>
<td>'.$right. '</td>
<td>'.$time.'</td>
<td><a title="Delete User" href="update.php?qid='.$id.'" class="btn btn-danger">Delete<i class="fa-solid fa-trash-can-list"></i></td>

</tr>';

}  
    $c=0;
    echo '</table></div></div>';
    
    }?>
 
    </div>
    
  </div>
</div>
</body>
</html>