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

if (isset($_GET['id'])){
    $post_id = mysqli_real_escape_string($conn,$_GET['id']);
    $str = "DELETE from posts where post_id = $post_id";
    $result = $conn->query($str);
    //echo $result;
    header("Location:posts.php");
}
else
    header("Location:posts.php");

?>