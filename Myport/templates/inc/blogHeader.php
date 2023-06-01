<?php

session_start();
include_once 'config/init.php';
include_once 'lib/Database.php';


$db = new Database;





if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
}
;
ob_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">
  <title>PortNews</title>

  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">




  <head>





  </head>

<body class="body">


  <?php

  if (isset($_SESSION['feedback'])) {
    ?>
    <script>
      $(document).ready(function () {
        $('#myAlert').modal('show');
      });
    </script>
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
      <strong>
        <?php echo $_SESSION['feedback'] ?>
      </strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['feedback']);

  }



  ?>
  <?php

  if (
    isset($_SESSION['logIn_alert'])) {
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


  <header class="blog-header lh-2 ">


    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
        <a class="navbar-brand d-block-sm text-light " href="#">PortNews</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="blogAll.php">Blogs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="feedback.php">Feedback</a>
            </li>


          </ul>

          <form method="GET">
            <div class="search-box m-3 ">

              <input type="search" class="input-search bg-secondary " name="search_query"
                placeholder="Type to Search...">
              <button class="btn-search" type="submit" name="search"><i class="fas fa-search "></i></button>
            </div>

          </form>
          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Account
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
              <div class="profile">
                <?php
                $profile = $db->prepare("SELECT * FROM users WHERE id = ?");
                $profile->execute([$user_id]);
                if ($profile->rowCount() > 0) {
                  $fetch_profile = $profile->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <div class="user text-center">
                    <i class="fa-solid fa-user"></i>
                  </div>
                  <p class="text-center">
                    <?= $fetch_profile["name"]; ?>
                  </p>
                  <div class="user text-center d-flex">

                    <a href="update_user.php" class="btn"><i class="fa-solid fa-pen-to-square"></i> Update profile</a>
                  </div>

                  <div class="flex-btn">
                    <a class="dropdown-item" href="user_register.php" class="option-btn"><i
                        class="fa-sharp fa-solid fa-address-card"></i> Register</a>

                    <li><a class="dropdown-item" href="feedback.php"><i class="fa-solid fa-message"></i> Feedback</a></li>
                  </div>
                  <a class="dropdown-item" href="user_login.php" class="option-btn"><i
                      class="fa-solid fa-right-to-bracket"></i> Login</a>
                  <a class="dropdown-item" href="Applications/logout.php" class="delete-btn"
                    onclick="return confirm('logout from PortNews?');"> <i class="fa-solid fa-hands"></i> Logout</a>
                  <?php
                } else {

                  ?>
                  <p class="text-center">Account</p>
                  <li><a class="dropdown-item" href="user_login.php"><i class="fa-solid fa-right-to-bracket"></i>
                      Login</a></li>
                  <li><a class="dropdown-item" href="user_register.php"><i
                        class="fa-sharp fa-solid fa-address-card"></i>Register</a></li>

                  <?php
                }

                ?>






            </ul>
          </div>
        </div>
      </div>
      </div>
      </div>
    </nav>
  </header>