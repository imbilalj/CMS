<?php
session_start();

require_once("db-connect.php");

if(isset($_POST)) {

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$sql = "SELECT id, firstname, lastname, email, usertype FROM users WHERE email='$email' AND password='$password'";
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$name = $row["firstname"] . " " . $row["lastname"];
      $user_id = $row["id"];
      $usertype = $row["usertype"];
		}
		$_SESSION['user_id'] = $user_id;
    $_SESSION['name'] = $name;
    $_SESSION['usertype'] = $usertype;
    if($usertype === 'admin') {
      header("Location: admin/index.php");
    } else {
      header("Location: user/index.php");
    }
 	} else {
 		$_SESSION['loginError'] = $conn->error;
 		header("Location: login.php");
		exit();
 	}

 	$conn->close();

} else {
	header("Location: login.php");
	exit();
}