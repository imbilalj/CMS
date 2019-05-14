<?php

  session_start();

  if(isset($_SESSION['user_id'])) {
    if(strcmp($_SESSION['usertype'], 'admin') != 0) {
      header("Location: ../index.php");
      exit();
    }
  } else {
    header("Location: ../login.php");
    exit();
  }

  require_once("../../utility/functions.php");

  if(isset($_POST)) {
    $author_id = $_SESSION['user_id'];
    $post_title = $_POST['post-title'];
    $post_body = $_POST['post-body'];
    $post_category = $_POST['post-category'];

    if(!publishPost($author_id, $post_title, $post_body, $post_category)) {
      $_SESSION['publishError'] = 'Post was not Published Successfully... Try Again!';
      header("Location: add-post.php");
      exit();
    } else {
      $_SESSION['publishSuccess'] = 'Post was Published Successfully!';
      header('Location: add-post.php');
    }
  } else {
    header("Location: add-post.php");
    exit();
  }
?>