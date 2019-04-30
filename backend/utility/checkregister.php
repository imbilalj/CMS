<?php

    
require_once("db-connect.php");

    if(isset($_POST)){
        $firstname =  mysqli_real_escape_string($conn,$_POST['firstname']);
        $lastname = mysqli_real_escape_string ($conn,$_POST['lastname']);
        $email =  mysqli_real_escape_string($conn,$_POST['email']);
        if (!strcmp($_POST['password'],$_POST['confirmpassword'])){
            $password = mysqli_real_escape_string($conn,$_POST['password']);
            $confirmpassword = mysqli_real_escape_string($conn,$_POST['confirmpassword']);
            echo "Welcome " .$firstname;
        
        }
        else {
            echo "Not Same";
        }
    }

?>