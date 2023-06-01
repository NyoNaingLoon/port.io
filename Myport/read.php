<?php

include_once 'config/init.php';
include_once 'lib/Database.php';
include_once 'Applications/readBlog.php';
include_once 'Applications/search.php';
include_once 'Applications/time.php';
// include 'templates/inc/blogHeader.php';





$db = new Database();

$blog = new readBlog();

if (isset($_GET['id'])) {
  $read = $blog->single($_GET['id']);
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="css/blog.css">
<link rel="stylesheet" href="slider.css">
<link rel="stylesheet" href="templates/inc/style.css">

<body>


  <main class="container">
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
                        <h6 class="position-absolute p-1 my-2   top-0 start-0 rounded-end-2 bg-dark bg-opacity-75 text-white">
                          <?= date('M d ', strtotime($result['datetime'])); ?>
                        </h6>

                        <p id="para" class="card-text p-y-1 m-2">
                          <?= $result['para'] ?>

                        </p>

                        <a class="btn btn-dark m-2" href="read.php?id=<?= $result['id']; ?>">Read More</a>

                        <span><i class="fa-solid fa-heart "></i>


                          <?= $result['likes'] ?>

                          <?php

                          $dateTime = $result['datetime'];
                          $timeZone = 'Asia/BangKok';

                          $formatter = new DateTimeFormatter($dateTime, $timeZone);




                          ?>
                          <p
                            class="position-absolute top-50 end-0 p-1 translate-middle-y rounded-start-2 bg-dark bg-opacity-75 text-light">
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
            <?php
          } else {
            ?>

            <div class="p-4 p-md-5 mb-4  d-flex justify-content-around ">
              <div class="border ">
                <div class="container">
                  <img class="container" src="upload/<?= $read['image']; ?>" alt="image">
                </div>
                <div class="m-3 col-md-6">
                  <h6>
                    <?= $read['imagename']; ?>
                  </h6>
                </div>

              </div>

              <div class="">
                <h6 class="mx-5">

                  <?= date('M-d', strtotime($read['datetime'])); ?>
                </h6>
                <p class="mx-5  col-md-4">
                  Creator:Myport
                </p>
              </div>
            </div>






            <div class="col-md-12 px-0">

              <h1 class="display-4 fst-italic d-flex justify-content-center">
                <?= $read['title'] ?>
              </h1>
            </div>

            <div id="paragraph">
              <p class=" text-start lh-base">
                <?= $read['para'] ?>
              </p>
              <!-- <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p> -->

            </div>
            <?php
          }
          ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>

  <script>
    let letters = document.getElementById("paragraph");
    let text = letters.textContent;
    let paragraphs = text.split("#");
    letters.textContent = "";

    for (let i = 0; i < paragraphs.length; i++) {
      paragraphsDiv = document.createElement("p");
      paragraphsDiv.textContent = paragraphs[i];
      letters.appendChild(paragraphsDiv);
    }
  </script>
</body>

</html>