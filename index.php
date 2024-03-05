<?php
include 'includes/boot.php';

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="resources/css/style.css">

<div class="container">
  <h1 class="text-center" style="margin-top:30px; color: red;">Login Page</h1>
  <hr>
  <div class="row justify-content-md-center">
    <div class="col-md-5">
      <?php
      if (isset($_SESSION['error'])) {
        echo "
                        <div class='alert alert-danger text-center'>
                            <i class='fas fa-exclamation-triangle'></i> " . $_SESSION['error'] . "
                        </div>
                    ";


        unset($_SESSION['error']);
      }

      if (isset($_SESSION['success'])) {
        echo "
                        <div class='alert alert-success text-center'>
                            <i class='fas fa-check-circle'></i> " . $_SESSION['success'] . "
                        </div>
                    ";


        unset($_SESSION['success']);
      }
      ?>

      <div class="card">
        <div class="card-body">
          <form method="POST" action="resources/dr/logcode.php">
            <div class="mb-3">
              <label for="email">Email</label>
              <input class="form-control" type="email" id="email" name="email" placeholder="Enter email" required>


            </div>
            <br>
            <div class="mb-3">
              <label for="password">Password</label>
              <input class="form-control" type="password" id="password" name="password" placeholder="Enter password" required>


            </div>
            <hr>
            <div>
              <button type="submit" class="btn btn-primary" name="login"><i class="fas fa-sign-in-alt"></i> Login</button>
              <a href="signin.php">Register a new account</a>
            </div>
          </form>
        </div>



        <?php
        include 'includes/footer.php';
        ?>
