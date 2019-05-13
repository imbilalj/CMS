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

if (isset($_GET['categoryid'])){
    $categoryid = $_GET['categoryid'];
    $str = "DELETE from categories where category_id = $categoryid";
    $result = $conn->query($str);
   header("Location:category.php");
}
else
    
     header("Location:category.php");
   

?>