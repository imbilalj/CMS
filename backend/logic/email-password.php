
<link rel="stylesheet" href="../../frontend/css/style.css">

<section>
        <div class="container">
          <div class="container-form">
            <h2>Enter Your Email</h2>
            <form action="password-reset.php" method="POST">
              <h2><?php if(isset($_GET['no']) == 'Email Not Found') {echo "<script>alert('Email Not Found')</script>"; $_GET['no'] = ""; }?><h2>
              <input type="email" placeholder="Enter your Email..." name="email" autocomplete="off" required>
              <button class="btn-1" type="submit" name="submit">Submit</button>
              </form>
          </div>
        </div>
      </section>