<?php

include '../templates/inc/admin_header.php';




include_once '../config/init.php';
include_once '../lib/Database.php';
include_once '../Applications/delete.php';

$db = new Database();
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $delete = new Delete();
  $delete->deleteUser($id);

}
?>














<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>

  <div class="py-5">
    <div class="container">
      <div class="row hidden-md-up">
        <?php


        $content = $db->prepare("SELECT * FROM `users` ");
        $content->execute();
        if ($content->rowCount() > 0) {
          while ($row = $content->fetch(PDO::FETCH_ASSOC)) {

            ?>


            <div class="col-md-4">
              <div class="card m-3">
                <div class="card-block m-3 text-center">
                  <p class="card-title">User id -
                    <?= $row['id'] ?>
                  </p>
                  <h6 class="card-subtitle text-muted"> Username-
                    <?= $row['name'] ?>
                  </h6>

                  <a class="btn btn-danger my-2" href="../admin/users.php?id=<?= $row['id']; ?>"
                    class="card-link">Delete</a>

                </div>
              </div>
            </div>

            <?php
          }
        } else {
          echo '<p class="empty">You have no users!</p>';
        }
        ?>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
</body>

</html>