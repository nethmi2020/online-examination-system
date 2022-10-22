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

<div class="col-md-6  panel"  style=" margin-left:auto; margin-right:auto; background-image:url(images/bg1.jpg); min-height:430px;">
    <h2 align="center">FEEDBACK/REPORT A PROBLEM</h2>

    <?php if(@$_GET['q'])echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
else
{echo'
 
You can send us your feedback through e-mail on the following e-mail id:
<p>Or you can directly submit your feedback by filling the enteries below:-</p>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10"> 
    <form action="feed.php?q=feedback.php" method="POST">

    <div class="row">
            <div class="col-md-3"><b>Name:</b><br /><br /><br /></div>
            <div class="col-md-9">
            <!-- Text input-->
            <div class="form-group">
            <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text" required><br />    
           
            </div>
            </div>
    </div>

    <div class="row">
            <div class="col-md-3"><b>Subject:</b></div>
            <div class="col-md-9">
            <!-- Text input-->
            <div class="form-group">
              <input id="name" name="subject" placeholder="Enter subject" class="form-control input-md" type="text" required>    

            </div>
            </div>
    </div>

    <div class="row">
            <div class="col-md-3"><b>Email Address:</b><br /><br /><br /></div>
            <div class="col-md-9">
            <!-- Text input-->
            <div class="form-group">
            <input id="email" name="email" placeholder="Enter your email" class="form-control input-md" type="email" required><br />             
            </div>
            </div>
    </div>

    <div class="form-group"> 
        <textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Write feedback here..." required></textarea>
        </div>
        <div class="form-group" align="center">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
    </div>
    </form>';}?>
</div>
</div>

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


</html>