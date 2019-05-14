<?php

  include("db-connect.php");

  // Function to return number of Users
  function countData($column) {
    global $conn;
    $sql = "SELECT * FROM". " " . $column;
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      $totalno = $result->num_rows;
    } else {
      $totalno = 0;
    }
    return $totalno;
  }

  function countPost($column) {
    global $conn;
    $sql = "SELECT * FROM". " " . $column;
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      $totalno = $result->num_rows;
    } else {
      $totalno = 0;
    }
    return $totalno;
  }

  function countCategories($column) {
    global $conn;
    $sql = "SELECT * FROM". " " . $column;
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      $totalno = $result->num_rows;
    } else {
      $totalno = 0;
    }
    return $totalno;
  }

  function getUserData() {
    global $conn;
    $sql = "SELECT id,firstname, lastname, email, usertype FROM users";
    $result = $conn->query($sql);
    return $result;
  }

  function getCategoryData() {
    global $conn;
    $sql = "SELECT category_id, category_name FROM categories";
    $result = $conn->query($sql);
    return $result;
  }

  function publishPost($author_id, $post_title, $post_body, $category_id) {
    global $conn;
    $sql = "INSERT INTO posts(post_title, post_body, post_status, category_id, post_comment_count, author_id) VALUES('$post_title', '$post_body', 1, $category_id, 0, $author_id)";
    if($conn->query($sql) === TRUE) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function getAuthorNameById($id) {
    global $conn;
    $fullName = "";
    $sql = "SELECT firstname, lastname FROM users WHERE id=$id";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $fullName = $row['firstname'] . " " . $row['lastname'];
      }
    }
    return $fullName;
  }

  function getCategoryNameById($id) {
    global $conn;
    $categoryName = "";
    $sql = "SELECT category_name FROM categories WHERE category_id=$id";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $categoryName = $row['category_name'];
      }
    }
    return $categoryName;
  }

?>