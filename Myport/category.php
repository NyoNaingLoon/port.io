<?php
include_once 'config/init.php';
include_once 'lib/Database.php';
include 'templates/inc/blogHeader.php';
include_once 'Applications/search.php';
include_once 'Applications/time.php';

$db = new Database;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

  <link rel="stylesheet" href="css/blog.css">
  <link rel="stylesheet" href="slider.css">
  <link rel="stylesheet" href="templates/inc/style.css">
</head>

<body>


  <div class="py-5">
    <div class="container">
      <div class="row hidden-md-up">
        <?php
        $search = new Search;
        if (isset($_GET['search_query'])) {

          if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $results = $search->searchQuery($_GET);

            if ($results) {

              foreach ($results as $result) {

                ?>

                <div class="col-md-4">
                  <div class="card">
                    <div class="card-block">
                      <div class="img-card  ">
                        <img class="img-fluid container  my-2 " src="upload/<?= $result['image']; ?>">
                      </div>
                      <h4 class="card-title m-2">
                        <?= $result['title'] ?>
                      </h4>
                      <h6 class="position-absolute m-2 top-0 start-0 rounded-end-2 bg-opacity-75  bg-dark text-white">
                        <?= date('M-d', strtotime($result['datetime'])); ?>
                      </h6>
                      <p id="para" class="card-text p-y-1 m-2">
                        <?= $result['para'] ?>
                      </p>




                      <?php


                      $dateTime = $result['datetime'];
                      $timeZone = 'Asia/BangKok';

                      $formatter = new DateTimeFormatter($dateTime, $timeZone);



                      ?>
                      <p
                        class="position-absolute p-1  top-50 end-0 p-1 translate-middle-y rounded-start-2 bg-dark bg-opacity-75 text-light">
                        <?php


                        // Format datetime ago
                        echo $formatter->formatDatetimeAgo();
                        ?>
                      </p>

                      <a class="btn btn-dark m-2" href="read.php?id=<?= $result['id']; ?>">Read More</a>
                      <span><i class="fa-solid fa-heart "></i>
                        <?= $result['likes'] ?>

                      </span>

                    </div>
                  </div>
                </div>
                <!-- </div> -->
                <?php
              }
            } else {
              echo "No blog here";

            }
          }


        } else {



          $category = $_GET['category'];
          $select_contents = $db->prepare("SELECT * FROM `page` WHERE category LIKE '%{$category}%'");
          $select_contents->execute();
          if ($select_contents->rowCount() > 0) {
            while ($fetch_content = $select_contents->fetch(PDO::FETCH_ASSOC)) {

              ?>

              <div class="col-md-4">
                <div class="card">
                  <div class="card-block">
                    <div class="img-card  ">
                      <img class="img-fluid container  my-2 " src="upload/<?= $fetch_content['image']; ?>">

                    </div>
                    <h4 class="card-title m-2">
                      <?= $fetch_content['title'] ?>
                    </h4>
                    <h6 class="position-absolute p-1 my-2   top-0 start-0 rounded-end-2 bg-dark bg-opacity-75 text-white">
                      <?= date('M d ', strtotime($fetch_content['datetime'])); ?>
                    </h6>

                    <p id="para" class="card-text p-y-1 m-2">
                      <?= $fetch_content['para'] ?>
                    </p>

                    <a class="btn btn-dark m-2" href="read.php?id=<?= $fetch_content['id']; ?>">Read More</a>
                    <span><i class="fa-solid fa-heart "></i>

                      <?= $fetch_content['likes'] ?>



                      <?php
                      $dateTime = $fetch_content['datetime'];
                      $timeZone = 'Asia/BangKok';

                      $formatter = new DateTimeFormatter($dateTime, $timeZone);

                      // Format datetime with timezone
                



                      ?>
                      <p
                        class="position-absolute p-1  top-50 end-0 p-1 translate-middle-y rounded-start-2  bg-dark bg-opacity-75 text-light">
                        <?php

                        echo $formatter->formatDatetimeAgo();
                        ?>
                      </p>

                    </span>
                  </div>
                </div>
              </div>







              <?php
            }
          } else {
            echo '<p class="empty">No News is here</p>';
          }
        }
        ?>

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