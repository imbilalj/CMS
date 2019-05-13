<?php

include('../../backend/utility/db-connect.php');
 

    if(isset($_GET['question'])){
       // echo $_GET['question'];
        //echo $_GET['email'];
        $question = $_GET['question'];
        $email = $_GET['email'];
    
    

    $str = "SELECT password,answer FROM registration WHERE email='$email' AND question='$question'";
    //echo $str;
    $result = $conn->query($str);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                $answer = $row['answer'];
                $password = $row['password'];
        }
    }
    //echo $password;

}

    else{ 
    header("Location:../../backend/logic/password-reset.html");
    }

     
 
 if(isset($_POST['answer'])){
     if($_POST['answer'] == $answer){
        // echo "<script> alert("The Password has been sent to your Email"); </script>";
         
     echo "<script type='text/javascript'>
     alert($password);
     </script>"; 
 
    //  echo "<script  type='text/javascript'>
    //  function timeFunction() {
    //   setTimeout(function(){ alert('After 5 seconds!'); }, 5000);
    //  }
    //  </script>";

     //header("Location:../../backend/logic/login.php");
     }
     else
     echo "<script type='text/javascript'>
     alert('Incorrect');
     </script>"; 
 
 }
 else if (!isset($_POST['submit'])){
     //header("Location:../../backend/logic/passwordresetconfirm.php");
    
 }
 

?>

 <link rel="stylesheet" href="../../frontend/css/style.css">

<?php include('../../frontend/html/header.html'); ?>

<section>
  <div class="container">
    <div class="container-form">
      <form action=""<?php echo $_SERVER['PHP_SELF']; ?>"" method="POST">
        <h2><?php echo strtoupper($question)?><h2>
        <input type="text" placeholder="Answer" name="answer"  autocomplete="off" required>
        <button class="btn-1" type="submit" name="submit">Login</button>
      </form>
    </div>
  </div>
</section>

