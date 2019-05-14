<?php
 require_once("../utility/functions.php");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Pages</title>
    <!-- Bootstrap core CSS -->
    <link href="../../frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../frontend/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="../../frontend/css/style.css">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

   <header>
  <div class="container">
    <div id="logo">
      <h1><span class="highlight">Complete</span> CMS</h1>
    </div>
    <nav>
      <ul>
        <li class="current"><a href="index.php">Home</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li class="btn-nav"><a href="login.php">Login</a></li>
        <li class="btn-nav"><a href="register.php">Register</a></li>
      </ul>
    </nav>
  </div>
</header><br><br>


    <section id="breadcrumb">
      <div class="container">
        
      </div>
    </section>

          <div id = "page" class="col-md-13">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h2>Blogs</h2>
              </div>
              <div class="panel-body">
                <div class="row">
                      <!-- <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Pages...">
                      </div> -->
                </div>
                <br>
                <table class="table table-striped table-hover">
                      <!-- <tr>
                    
                        <th>Author Name</th>
                        <th>Post Title</th>
                        <th>Category Name</th>
                        <th>Published</th>
                        <th></th>
                      </tr> -->




                      <?php
                      $str =  "Select firstname,lastname,post_title,post_status,category_name,time from posts,users,categories where post_author_id = id AND posts.category_id = categories.category_id";
                      $result = $conn->query($str);
                      if ($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                        $post_author_name = $row["firstname"]. " " .$row['lastname'];
                       // $post_author_id = $row["post_author_id"];
                        $post_title = $row["post_title"];
                        $post_status = $row["post_status"];
                        $category_name = $row["category_name"];
                        $timing = $row['time'];
                      

                        
                        echo "<tr style = 'height:200px;'>";
                        echo  "<p id = 'posttitle'><h2><b>$post_title</b></h2></p><br>";
                        echo  "<p>Hello, My Name is Thanos.</p><br><hr>";
                        echo  "<p style = 'font-size: 12px;'> <span>Author :</span> $post_author_name</p>";
                        echo  "<p style = 'font-size: 12px;'><span>Category :</span>$category_name</p>";
                        echo  "<p style = 'font-size: 12px;'><span>Time :</span>$timing</p>";
                        // if ($post_status == 1){
                        // if ($post_status == 1){
                        // echo  '<p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></p>';}
                        // else
                        // echo  '<p><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></p>';
                        // echo  "<td></td>";
                        echo  "</tr>";  
                        echo  "<hr style = 'border: 2px solid black;'>";
                    }
                  }
                      
                      
                      
                      ?>

    
                    </table>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>


    <?php include('../../frontend/html/footer.html'); ?>

    <!-- Modals -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src = "js/bootstrap.min.js"></script>
  </body>
</html>


<script >
  var x = 1;
	$(document).ready(function(){
		$('#hide').click(function(){
			$('#tablehide').toggle();
       //$('#hide').html("Show");

      if (x%2 != 0){
        $('#hide').html("Show");
      } 
      else 
        $('#hide').html("Hide");
      x++  

		});
	});
</script>

