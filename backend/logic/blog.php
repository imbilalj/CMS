<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete CMS</title>
    <link rel="stylesheet" href="../../frontend/css/style.css">
    <link href="../../frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../frontend/css/dashboard.css" rel="stylesheet">
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
        <li ><a href="index.php">Home</a></li>
        <li class="current"><a href="blog.php">Blog</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li class="btn-nav"><a href="login.php">Login</a></li>
        <li class="btn-nav"><a href="register.php">Register</a></li>
      </ul>
    </nav>
  </div>
</header>

    <br>
    <br>

    <div id = "page" class="col-md-13">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
             
                <h3 class="panel-title-xs">Blogs</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <!-- <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Pages...">
                      </div> -->
                </div>
                <br>
                <table class="table table-striped table-hover">   
                
               
              </div>
              </div>

          </div>
</div>


     
    <?php
      include('../../frontend/html/footer.html');
    ?>
    
    <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
