<?php

include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
// print_r($_SESSION);




// delete feedback
if(isset($_SESSION['key'])){
if(@$_GET['fdid'] && $_SESSION['key']=='sunny7785068889') {
    $id=$_GET['fdid'];
    // print_r($id);
    // die();
    $result=mysqli_query($con, "DELETE FROM feedback WHERE id='$id'");
    header("location:dash.php?q=3");
}
}



// delete user
if(isset($_SESSION['key'])){
 if(@$_GET['demail'] && $_SESSION['key']=='sunny7785068889') {
    $email=@$_GET['demail'];
    $result=mysqli_query($con, "DELETE FROM user WHERE email='$email'");
    header("location:dash.php?q=1");
}

}
// add quiz
if(isset($_SESSION['key'])){
    if(@$_GET['q']== "addquiz"){
        $title=$_POST['quiztitle'];
        $total=$_POST['numquestion'];
        $right=$_POST['marks'];
        $wrong=$_POST['minmarks'];
        $time=$_POST['time'];
        $tag=$_POST['tag'];
        $description=$_POST['description'];
        $id=uniqid();
        
        print_r($id);
        // die();
        $q3=mysqli_query($con , "INSERT INTO quiz VALUES  ( '$id','$title' , '$total' ,'$right',  '$wrong', 
        '$time', '$tag',' $description')");
         header("location:dash.php?q=5&step=2&id=$id&n=$total");

    }

}
    // save questions
    if(isset($_SESSION['key'])){

        if(@$_GET['q'] =='addqns' && $_SESSION['key']=='sunny7785068889'){
            $n=@$_GET['n']; //quiz eke thiyn total questions gana
            $eid=$_GET['id'];  // quiz eke unique id eka
            $ch=$_GET['ch']; //choices gana, meke nam 4i

          
            for($i=1;$i<=$n; $i++){

                $qid=uniqid(); // quiz eek thiyn question wala unique id eka
                $qns=$_POST['qns'.$i]; //number of questions in a  quiz


                $q3=mysqli_query($con, "INSERT INTO questions VALUES ('$eid', '$qid', '$qns','$ch','$i')");

                // answers unique id
                $oaid=uniqid();
                $obid=uniqid();
                $ocid=uniqid();
                $odid=uniqid();

                // answers are inserted
                $a=$_POST[$i.'1'];
                $b=$_POST[$i.'1'];
                $c=$_POST[$i.'1'];
                $d=$_POST[$i.'1'];

            $qa=mysqli_query($con,"INSERT INTO options VALUES ('$qid', '$a','$oaid')");
            $qb=mysqli_query($con,"INSERT INTO options VALUES ('$qid', '$b','$obid')");
            $qc=mysqli_query($con,"INSERT INTO options VALUES ('$qid', '$c','$ocid')");
            $qd=mysqli_query($con,"INSERT INTO options VALUES ('$qid', '$d','$odid')");

            $e=$_POST['ans' .$i];

            switch($e){

                case 'a':
                    $ansid=$oaid;
                    break;

                case 'b':
                    $ansid=$obid;
                    break;

                case 'c':
                    $ansid=$ocid;
                    break;

                case 'd':
                    $ansid=$odid;
                    break;

                default:
                    $ansid=$oaid;
                    
            }

            $qans=mysqli_query($con, "INSERT INTO answer VALUES ('$qid','$ansid')");

            }

            // print_r($_POST);
            // die();
            header("location:dash.php?q=0");

        }

        
    }

    if(isset($_SESSION['key'])){
        if(@$_GET['q']== '5' && $_SESSION['key']=='sunny7785068889') {
      
            print_r($_GET);
            die();
            // $email=@$_GET['id'];
            // $result=mysqli_query($con, "DELETE FROM user WHERE email='$email'");
            header("location:dash.php?q=1");
      
        }}

        // remove quiz
if(isset($_SESSION['key'])){
    if(@$_GET['qid'] && $_SESSION['key']=='sunny7785068889') {
       $id=@$_GET['qid'];
    //    print_r($id);
    //    die();
       $result=mysqli_query($con, "DELETE FROM quiz WHERE id='$id'");
       header("location:dash.php?q=6");
   }
   
   }