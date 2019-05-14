 <?php
  $hostName = 'localhost'; // Host name
  $user = 'root'; //Database User
  $password = ''; //Database Password
  $dbName = 'completecms'; // Database Name
  
  $conn = new mysqli($hostName, $user, $password, $dbName); //Establishing connection to Database
  
  if ($conn->connect_error) {
    die("Connection Failed: ". $conn->connect_error);
  }
?> 

<?php

    if(isset($_POST)){
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        //echo $email;
        $str = "SELECT question FROM users WHERE email ='$email'";
        $result = $conn->query($str);
    
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                    $question = $row['question'];
            }
        }
        header("Location:../../backend/logic/passwordresetconfirm.php?question=$question&email=$email");
    }
    else {
        header("Location:email-password.php");
    }



?>


  