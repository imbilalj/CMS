<?php

require_once("db-connect.php");

if (isset($_POST['question'])){
    $question =$_POST['question'];
    $answer = $_POST['answer'];
    $str = "SELECT email FROM registration WHERE email="$_POST["email"]""; 
    $result = $conn->query($str);

    if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
            $emailid = $row['email'];

        }
        echo $emailid;

    $str1 = "INSERT into registration(question,answer) values ('$question','$answer')";
    $result = $conn->query($str1);
}
else 
    header("Location: ../../backend/logic/register.php");


?>