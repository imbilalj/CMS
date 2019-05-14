<?php

  session_start();

  if(isset($_SESSION['user_id'])) {
    if(strcmp($_SESSION['usertype'], 'admin') != 0) {
      header("Location: ../index.php");
    }
  } else {
    header("Location: ../login.php");
  }

  require_once("../../utility/functions.php");

  $noOfUsers = countData("users");
  $noOfPosts = countPost("posts");
  $noOfCategories = countCategories("categories");
  //noOfPages needed!
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Posts</title>
    <!-- Bootstrap core CSS -->
    <link href="../../../frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../frontend/css/dashboard.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Complete CMS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="pages.php">Pages</a></li>
            <li class="active"><a href="posts.php">Posts</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="category.php">Categories</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, <?php echo $_SESSION['name']; ?></a></li>
            <li><a href="../logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Posts<small>Manage Blog Posts</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Create Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li>
                <li><a href="#">Add Post</a></li>
                <li><a href="#">Add User</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.php">Dashboard</a></li>
          <li class="active">Posts</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="pages.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pages <span class="badge">4</span></a>
              <a href="posts.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts <span class="badge"><?php echo $noOfPosts; ?></span></a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge"><?php echo $noOfUsers; ?></span></a>
              <a href="category.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Categories <span class="badge"><?php echo  $noOfCategories; ?></span></a>
            </div>

            <div class="well">
              <h4>Disk Space Used</h4>
              <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                      60%
              </div>
            </div>
            <h4>Bandwidth Used </h4>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                    40%
            </div>
          </div>
            </div>
          </div>
          <div id = "page" class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <button id="hide" style="float: right;" class = "btn btn-default btn-xs">Hide</button>
                <h3 class="panel-title">Posts</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Filter Posts...">
                        </div>
                        <div class="col-md-4">
                          <a class="btn btn-primary" href="add-post.php" role="button">Add New Post</a>
                        </div>
                </div>
                <br>
                  <table id = "tablehide" class="table table-striped table-hover">
                      <tr>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Comments Count</th>  
                        <th></th>
                      </tr>

                      <?php
                          $str =  "SELECT * FROM posts";
                          $result = $conn->query($str);
                          if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                            $post_id = $row["post_id"];
                            $author_id = $row["author_id"];

                            $post_author_id = $row["post_author_id"];

                            $post_title = $row["post_title"];
                            $post_status = $row["post_status"];
                            $category_id = $row["category_id"];
                            $post_comment_count = $row["post_comment_count"];
                      ?>

                            
                
                      <tr>
                        <td><?php echo getAuthorNameById($author_id); ?></td>
                        <td><?php echo $post_title; ?></td>
                        <?php
                          if ($post_status == 1){
                        ?>
                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                        <?php
                          } else {
                        ?>
                        <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                        <?php
                          }
                        ?>
                        <td><?php echo getCategoryNameById($category_id); ?></td>
                        <td><?php echo $post_comment_count; ?></td>
                        <td><a class="btn btn-danger" href="deletepost.php?id=<?php echo $post_id; ?>">Delete</a></td>
                      </tr>
                            <?php

                            echo "<tr>";
                            echo  "<td>$post_id</td>";
                            echo  "<td>$post_author_id</td>";
                            echo  "<td>$post_title</td>";
                            if ($post_status == 1){
                            echo  '<td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>';}
                            else
                            echo  '<td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>';
                            echo  "<td>$category_id</td>";
                            echo  "<td>$post_comment_count</td>";
                            echo "<td><a class='btn btn-danger' href='deletepost.php?id=$post_id'>Delete</a></td>";
                            echo  "</tr>";  
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

    <?php include('../../../frontend/html/footer.html'); ?>

    <!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Page</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Page Title</label>
          <input type="text" class="form-control" placeholder="Page Title">
        </div>
        <div class="form-group">
          <label>Page Body</label>
          <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Published
          </label>
        </div>
        <div class="form-group">
          <label>Meta Tags</label>
          <input type="text" class="form-control" placeholder="Add Some Tags...">
        </div>
        <div class="form-group">
          <label>Meta Description</label>
          <input type="text" class="form-control" placeholder="Add Meta Description...">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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