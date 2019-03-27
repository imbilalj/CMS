<?php 

session_start();

if(isset($_SESSION['user_id'])) { 
  header("Location: index.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Complete CMS | Login</title>
    <link rel="stylesheet" href="../../frontend/css/style.css">
  </head>
  <body>

    <?php

      include('../../frontend/html/header.html');

      include('../../frontend/html/login-form.html');

      include('../../frontend/html/footer.html');

    ?>

  </body>
</html>