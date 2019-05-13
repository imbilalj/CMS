<?php

    
include("db-connect.php");

    if(isset($_POST)){
        $firstname =  mysqli_real_escape_string($conn,$_POST['firstname']);
        $lastname = mysqli_real_escape_string ($conn,$_POST['lastname']);
        $email =  mysqli_real_escape_string($conn,$_POST['email']);
        $question =   mysqli_real_escape_string($conn,$_POST['question']);
        $answer =  mysqli_real_escape_string($conn,$_POST['answer']);
        
        if (!strcmp($_POST['password'],$_POST['confirmpassword'])){
        
            $password = mysqli_real_escape_string($conn,$_POST['password']);
            $confirmpassword = mysqli_real_escape_string($conn,$_POST['confirmpassword']);
            $str = "INSERT into users(firstname,lastname,email,password,usertype,question,answer) values ('$firstname','$lastname','$email','$password','user','$question','$answer')";
            $result = $conn->query($str);
            // echo "<script type='text/javascript'>
            // alert('Registered');
            // </script>";

           // sleep(10);
           if ($result == 1)
            header("Location:../../backend/logic/login.php?reg='registered'");
            //header("Location:../../backend/logic/personaldata.php");
            else
            header("Location:../../backend/logic/register.php?reg='Not Registered'");

        
        }
        else {
            header("Location:../../backend/logic/register.php?reg='Not Registered'");
           
        }
    }


?>