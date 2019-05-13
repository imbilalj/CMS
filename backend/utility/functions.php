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

?>