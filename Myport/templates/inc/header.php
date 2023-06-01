<?php

session_start();
include_once '../config/init.php';
include_once '../lib/Database.php';


$db = new Database;



if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
}
;

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">
  <title>Home</title>
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>




  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">



</head>

<body>
  <?php

  if (isset($_SESSION['logIn_alert'])) {
    ?>
    <script>
      $(document).ready(function () {
        $('#myModal').modal('show');
      });
    </script>
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-body">
            <div class="position-absolute top-0 end-0 p-3">
              <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <p>
              <?php
              $greeting = $db->prepare("SELECT * FROM users WHERE id = ?");
              $greeting->execute([$user_id]);
              if ($greeting->rowCount() > 0) {
                $fetch_name = $greeting->fetch(PDO::FETCH_ASSOC);
                ?>
              <p class="d-flex justify-content-center ">
                Hello
                <strong class="mx-2 ">
                  <?= $fetch_name["name"]; ?>
                </strong>

                <?php
              }
              ?>
              <?php echo $_SESSION['logIn_alert'] ?>
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>

    <?php
    unset($_SESSION['logIn_alert']);

  }



  ?>
  <!-- Vertically centered modal -->



  <!-- Vertically centered scrollable modal -->


  <div class="container">
    <header class="blog-header lh-1 py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="link-secondary" href="#">Subscribe</a>
        </div>
        <div class="col-4 text-center">
          <h1><a class="blog-header-logo text-dark " href="#">PortNews</a></h1>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="link-secondary" href="#" aria-label="Search">

          </a>
          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Account
            </a>

            <ul class="dropdown-menu">
              <div class="profile">
                <?php
                $profile = $db->prepare("SELECT * FROM users WHERE id = ?");
                $profile->execute([$user_id]);
                if ($profile->rowCount() > 0) {
                  $fetch_profile = $profile->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <p class="text-center">
                    <?= $fetch_profile["name"]; ?>
                  </p>
                  <a href="update_user.php" class="btn">update profile</a>
                  <div class="flex-btn">
                    <a class="dropdown-item" href="user_register.php" class="option-btn">register</a>
                    <a class="dropdown-item" href="user_login.php" class="option-btn">login</a>

                  </div>
                  <a class="dropdown-item" href="Applications/logout.php" class="delete-btn"
                    onclick="return confirm('logout from the website?');">logout</a>
                  <li><a class="dropdown-item" href="feedback.php">Feedback</a></li>
                  <?php
                } else {

                  ?>
                  <p class="text-center">Account</p>
                  <li><a class="dropdown-item" href="user_login.php">Login</a></li>
                  <li><a class="dropdown-item" href="user_register.php">Register</a></li>

                  <?php
                }
                ?>





            </ul>
          </div>
        </div>
      </div>
    </header>



    <!--   <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-center">
      <a class="p-2 link-secondary" href="#">World</a>
      <a class="p-2 link-secondary" href="#">U.S.</a>
      <a class="p-2 link-secondary" href="#">Technology</a>
      
    </nav>
  </div>
</div> -->