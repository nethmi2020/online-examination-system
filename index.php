<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Exam System</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script src="js/main.js"></script>
<!-- Latest compiled and minified CSS -->
 
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/
    jquery/3.3.1/jquery.min.js">
    </script>

<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>

</head>
<body>
    <div class="header">
        <div class="row">
            <div class="col lg-6">
            <span class="logo">Test Your Skill</span></div>
            <div class="col-md-2 col-md-offset-4">
            <a href="#" class="pull-right btn sub1" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;
                <span class="title1-signin"><b>Signin</b></span></a></div>
                <!--sign in modal start-->
                <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content title1">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title title1"><span style="color:orange; margin-left:-450px;">Log In</span></h4>
                    </div>
                    <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email"></label>  
  <div class="col-md-6">
  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email" autocomplete="off">
    
  </div>
</div>


<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password" autocomplete="off">
    
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
		</fieldset>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--sign in modal closed-->
</div><!--header row closed-->
</div>

<div class="bg1">
<div class="row">

<div class="col-md-7"></div>
<div class="col-md-4 panel">
<!-- sign in form begins -->  
  <form class="form-horizontal" name="form1" action="sign.php"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name1" name="name" placeholder="Enter your name" class="form-control input-md" type="text" required>
  <!-- <h5 id="usercheck" style="color: red;">
    **Username is missing
  </h5> -->
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12">
    <select id="gender" name="gender" placeholder="Enter your gender" class="form-control input-md" required>
   <option value="Male">Select Gender</option>
  <option value="M">Male</option>
  <option value="F">Female</option> </select>
    <!-- <h5 id="gendercheck" style="color: red;">
      **Gender is missing
    </h5> -->
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="college" name="college" placeholder="Enter your college name" class="form-control input-md"
   type="text" required>
  <!-- <h5 id="collegecheck" style="color: red;">
      **College name  is missing
    </h5> -->
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label title1" for="email"></label>
  <div class="col-md-12">
    <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email"
    required>
    <!-- <small id="emailvalid" class="form-text text-muted invalid-feedback">
      Your email must be a valid email
    </small> -->
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="mob"></label>  
  <div class="col-md-12">
  <input id="mob" name="mob" placeholder="Enter your mobile number" class="form-control input-md" type="number"
  required>
  <!-- <h5 id="mobcheck" style="color: red;">
      **Mobile number  is missing
    </h5> -->
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" placeholder="Enter your password" class="form-control input-md" 
    type="password" required>
    <!-- <h5 id="usercheck" style="color: red;">
      **Password is missing
    </h5> -->
  </div>
</div>

<div class="form-group">
  <label class="col-md-12control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input id="cpassword" name="cpassword" placeholder="Conform Password" class="form-control input-md" 
    type="password" required>
    
  </div>
</div>
<!-- <?php if(@$_GET['q7'])
{ echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?> -->
<!-- Button -->
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" class="sub" value="sign up" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form>
</div><!--col-md-6 end-->
</div></div>
</div><!--container end-->

            </div>
        </div>
    </div>

    <!-- footer section -->
    <div class="row footer">
      
      <div class="col-md-3 box">
        <a href="http://www.projectworlds/online-examination" target="_blank">About us</a>
      </div>

      <div class="col-md-3 box">
          <a href="#" data-toggle="modal" data-target="#login">Admin Login</a>
      </div>

      <div class="col-md-3 box">
        <a href="#" data-toggle="modal" data-target="#developers">Developers</a>
      </div>

      <div class="col-md-3 box">
        <a href="feedback.php" target="_blank">Feedback</a>
      </div>

 <!-- developer model start -->
 <div class="modal fade" id="developers">
                <div class="modal-dialog">
                    <div class="modal-content title1">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title title1"><span style="color:orange; margin-left:-450px;">Developers</span></h4>
                    </div>
                    <div class="modal-body">
        
                    <div class="row">
                      <div class="col md-3">
                        <img src="images/800.jpg" alt="" width=200 height=200 class="img-rounded">
                      </div>
                      <div class="col md-9 text-dark">
                        <p>Yugesh warma</p>
                        <p>0716897175</p>
                        <p>nethmi@gmail.com</p>
                        <p>CIS</p>
                      </div>
                    </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--developer modal closed-->


      <!-- admin login model start -->
      <div class="modal fade" id="login">
                <div class="modal-dialog">
                    <div class="modal-content title1">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title title1"><span style="color:orange; margin-left:-450px;">Log In</span></h4>
                    </div>
                    <div class="modal-body">
                      
        <form class="form-horizontal" action="admin.php?q=index.php" method="POST">
<fieldset>

<!-- Text input-->
<div class="form-group"> 
  <div class="col-md-6">
  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email" autocomplete="off">    
  </div>
</div>


<!-- Password input-->
<div class="form-group">
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password" autocomplete="off">
    
  </div>
</div>

      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-primary">Log in</button>
		</fieldset>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--admin login modal closed-->
  </div>
</body>

<script>
//   $("#form1").validate({
//     onsubmit: false
//   }
//   rules: {
//     name: {
//     required: "Please specify your  name",
//   }
//     email: {
//       required: true,
//       email: true
//     }
//   },
//   college: {
//     required: "Please specify your college name",
//   }
//     email: {
//       required: "We need your email address to contact you",
//       email: "Your email address must be in the format of name@domain.com"
//     }
//   }
// });
</script>
</html>