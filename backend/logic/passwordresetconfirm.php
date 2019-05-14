<?php

include('../../backend/utility/db-connect.php');
 

    if(isset($_GET['question'])){
       //echo $_GET['question'];
       //echo $_GET['email'];
        $question = mysqli_real_escape_string($conn,$_GET['question']);
        $email = mysqli_real_escape_string($conn,$_GET['email']);
    
    

    $str = "SELECT password,answer FROM users WHERE email='$email' AND question='$question'";
    //echo $str;
    $result = $conn->query($str);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                $answer = $row['answer'];
                $password = $row['password'];
        }
    }
   //echo $password;
   else if ($result->num_rows <= 0){
    //echo "<script> alert('Email Not Found :('); </script>";  
    $no = "Email Not Found";
    header("Location:email-password.php?no='$no'");
   }

     
        if(isset($_POST['answer']) && $result->num_rows > 0){
            if($_POST['answer'] == $answer){
            echo "<script> alert('Password = $password'); </script>";
                
            // echo "<script type='text/javascript'>
            // alert($password);
            // </script>"; 
            }
            
            else
            echo "<script type='text/javascript'>
            alert('Incorrect');
            </script>"; 
        }
}

    else{ 
    header("email-password.php");
    }

     
 
//  if(isset($_POST['answer'])){
//      if($_POST['answer'] == $answer){
//         // echo "<script> alert("The Password has been sent to your Email"); </script>";
         
//      echo "<script type='text/javascript'>
//      alert($password);
//      </script>"; 
//      }
     
//      else
//      echo "<script type='text/javascript'>
//      alert('Incorrect');
//      </script>"; 
//  }
//  else if (!isset($_POST['submit'])){
//      //header("Location:../../backend/logic/passwordresetconfirm.php");
    
//  }
 

?>

 <link rel="stylesheet" href="../../frontend/css/style.css">

<?php include('../../frontend/html/header.html'); ?>

<section>
  <div class="container">
    <div class="container-form">
      <form action=""<?php echo $_SERVER['PHP_SELF']; ?>"" method="POST">
        <h2><?php echo strtoupper($question); ?><h2>
        <input type="text" placeholder="Answer" name="answer"  autocomplete="off" required>
        <button class="btn-1" type="submit" name="submit">Submit</button>
      </form>
    </div>
  </div>
</section>

