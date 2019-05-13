<?php

session_start();

if(isset($_SESSION['user_id'])) {
  if(strcmp($_SESSION['usertype'], 'admin') != 0) {
    header("Location: ../index.php");
  }
} else {
  header("Location: ../login.php");
}

include('../../utility/db-connect.php');

if (isset($_GET['userid'])){
    $userid = $_GET['userid'];
    //echo $useremail;
    $str = "DELETE from users where id = $userid";
    //echo $str;
    $result = $conn->query($str);
    //echo $result;
   header("Location:users.php");
}
else
     header("Location:users.php");
    // echo "hello";



?>