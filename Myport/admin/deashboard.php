<?php

include '../templates/inc/admin_header.php';

include_once '../config/init.php';
include_once '../lib/Database.php';

$db = new Database();


?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>


<body>




  ?>
  <div class="py-5 ">
    <div class="container  justify-content-center">
      <div class="row hidden-md-up">


        <div class="col-md-3 mb-5 ">
          <div class="card">
            <div class="card-block">
              <div class="img-card  ">
                <div class="user">
                  <h1 class="text-center">Users</h1>
                </div>
                <div class="counts">
                  <?php
                  $select_users = $db->prepare("SELECT * FROM `users`");
                  $select_users->execute();
                  $number_of_users = $select_users->rowCount();
                  ?>
                  <h3 class="text-center">
                    <?= $number_of_users; ?>
                  </h3>
                  <p class="text-center">normal users</p>

                  <div class="d-grid gap-2 col-12 mx-auto">
                    <a class="btn btn-dark m-2 " href="users.php">Details</a>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-3 mb-5">
          <div class="card">
            <div class="card-block">

              <div class="img-card">
                <h1 class="text-center">Contents</h1>
              </div>
              <div class="contents">
                <?php

                $select_contents = $db->prepare("SELECT * FROM `page`");
                $select_contents->execute();
                $number_of_contents = $select_contents->rowCount();

                ?>
                <h3 class="text-center">
                  <?= $number_of_contents; ?>
                </h3>
                <p class="text-center">contents</p>

                <div class="d-grid gap-2 col-12 mx-auto">
                  <a class="btn btn-dark m-2 " href="contents.php ">Details</a>

                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-5">
          <div class="card">
            <div class="card-block">

              <div class="img-card">
                <h1 class="text-center">Likes</h1>
              </div>
              <div class="contents">
                <?php

                $select_contents = $db->prepare("SELECT * FROM `likes`");
                $select_contents->execute();
                $number_of_contents = $select_contents->rowCount();

                ?>
                <h3 class="text-center">
                  <?= $number_of_contents; ?>
                </h3>
                <p class="text-center">Likes</p>

                <div class="d-grid gap-2 col-12 mx-auto">
                  <a class="btn btn-dark m-2 " href="">Details</a>

                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-5">
          <div class="card">
            <div class="card-block">

              <div class="img-card">
                <h1 class="text-center">FeedBack</h1>
              </div>
              <div class="contents">
                <?php

                $select_contents = $db->prepare("SELECT * FROM `messages`");
                $select_contents->execute();
                $number_of_contents = $select_contents->rowCount();

                ?>
                <h3 class="text-center">
                  <?= $number_of_contents; ?>
                </h3>
                <p class="text-center">User FeedBack</p>

                <div class="d-grid gap-2 col-12 mx-auto">
                  <a class="btn btn-dark m-2 " href="feedback.php">Details</a>

                </div>

              </div>
            </div>
          </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
          crossorigin="anonymous"></script>
</body>

</html>
<?php
include 'adminfooter.php';
?>