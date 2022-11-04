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
                $b=$_POST[$i.'2'];
                $c=$_POST[$i.'3'];
                $d=$_POST[$i.'4'];

             
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

    
//    quiz start
if(isset($_SESSION['key'])){
    if(@$_GET['q']=='quiz' && @$_GET['step']==2){

        $id=@$_GET['id']; //quiz eke id eka
        $sn=@$_GET['n'];
        $total=@$_GET['t']; // quiz eke thiyn prashn gana
        $ans=$_POST['ans'];
        $qid=@$_GET['qid'];

        // print_r($_GET);
        // echo '<br>';
        // print_r($_POST);
        // echo '<br>';
        // print_r($_SESSION);
        // die();

        $q=mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid'");
        while($row=mysqli_fetch_array($q))
        {
            $ansid=$row['ansid'];

        }

        if($ans == $ansid)
        {
            $q=mysqli_query($con,"SELECT * FROM  quiz WHERE id='$id' ");
            while($row=mysqli_fetch_array($q))
            {
                $right=$row['right'];
            }

            if($n==1){
                $q=mysqli_query($con, "INSERT INTO hisory VALUES('$email, '$id', '0', '0','0', '0', NOW())");
            }

            $q=mysqli_query($con,"SELECT * FROM  history WHERE id='$id' AND email='$email' ");

            while($row=mysqli_fetch_array($q)){
                $s=$row['score'];
                $r=$row['sahi'];
            }
            $r++;
            $s=$sahi+$s;

            $q=mysqli_query($con, "UPDATE `history` SET `score`=$s, `level`=$sn,`sahi`=$r,date=NOW() WHERE email='$email' 
            AND id='$id'");
        }

        else{
            $q=mysqli_query($con,"SELECT * FROM  quiz WHERE id='$id' ");
            while($row=mysqli_fetch_array($q))
            {
                $wrong=$row['wrong'];
            }

            if($n==1){
                $q=mysqli_query($con, "INSERT INTO hisory VALUES('$email, '$id', '0', '0','0', '0', NOW())");
            }

            $q=mysqli_query($con,"SELECT * FROM  history WHERE id='$id' AND email='$email' ");

            while($row=mysqli_fetch_array($q)){
                $s=$row['score'];
                $r=$row['wrong'];
            }
            $r++;
            $s=$s-$wrong;

            $q=mysqli_query($con, "UPDATE `history` SET `score`=$s, `level`=$sn,`sahi`=$r,date=NOW() WHERE email='$email' 
            AND id='$id'");
        }
        if($sn!= $total){
            $sn++;
            // header("location:account.php?q=quiz&step=2&qid='.$id.'&n='.$n.'&t='.$total.'");
        }
        else if($_SESSION['key']!='sunny7785068889'){
            $q=mysqli_query($con,"SELECT score FROM  history WHERE id='$id' AND email='$email' ");

            while($row=mysqli_fetch_array($q)){
               
                $s=$row['score'];
            }
            $q=mysqli_query($con,"SELECT *  FROM  rank WHERE  email='$email' ");
            $rowcount=mysqli_num_rows($q);
            if($rowcount ==0){
                $q=mysqli_query($con, "INSERT INTO rank VALUES('$email, '$s' NOW())");
            }
            else{
                while($row=mysqli_fetch_array($q)){
                    $sun=$row['score'];

                }

                $sun=$s+$sun;
                $q=mysqli_query($con, "UPDATE `history` SET `score`=$s, `level`=$sn,`sahi`=$r,date=NOW() WHERE email='$email' 
                AND id='$id'");
            }
            header("location:account.php?q=result&id=$id");

        }
        else{
            header("location:account.php?q=result&id=$id");
        }
    }
}
    

    // if(isset($_SESSION['key'])){
    //     if(@$_GET['q']== '5' && $_SESSION['key']=='sunny7785068889') {
      
    //         print_r($_GET);
    //         die();
    //         // $email=@$_GET['id'];
    //         // $result=mysqli_query($con, "DELETE FROM user WHERE email='$email'");
    //         header("location:dash.php?q=1");
      
    //     }}


