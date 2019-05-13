<?php

// session_start();
// if (isset($_GET))

// ?>


<link rel="stylesheet" href="../../frontend/css/style.css">

<section>
        <div class="container">
          <div class="container-form">
            <h2>Enter Data</h2>
            <form action="../../backend/logic/insertpersonaldata.php" method="POST">
              <input type="email" placeholder="Enter your Email" name="email"  required value ="<?php if(isset($_GET['email']))
              {
                echo $_GET['email'];
              } 
              else echo ''; ?>">
              <input type = "text" placeholder= "Enter your Personal Question" name="question" required>
              <input type = "text" placeholder= "Answer to the Question" name="answer" required> 
              <button class="btn-1" type="submit" name="submit">Submit</button>
             
            </form>
          </div>
        </div>
      </section>