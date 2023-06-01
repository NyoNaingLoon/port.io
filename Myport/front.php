<?php



include 'templates/inc/blogHeader.php';

include_once 'config/init.php';
include_once 'lib/Database.php';


$db = new Database();

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
}
;




?>
<style>


</style>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<!-- 
<link rel="stylesheet" href="css/blog.css"> -->
<link rel="stylesheet" href="slider.css">
<link rel="stylesheet" href="templates/inc/style.css">

<body>


  <html>
  <section>
    


    <div class="wrapper container my-5">
      <i id="left" class="fa-solid fa-angle-left d-none d-md-block"></i>
      <div class="carousel">
        <?php
        $type = "Header";
        $stmt = $db->prepare("SELECT * FROM `page` WHERE type = ?");
        $stmt->execute([$type]);

        if ($stmt->rowCount() > 0) {
          while ($types = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>

            <a href="read.php?id=<?= $types['id']; ?>"> <img class="carousel-img" alt="img"
                src="upload/<?= $types['image']; ?>" draggable=" false"></a>

            <?php
          }

          ?>
          <?php

        } else {
          echo "No Blog Here!";
        }
        ?>
      </div>

      <i id="right" class="fa-solid fa-angle-right d-none d-md-block"></i>
    </div>




  </section>
  <div>
    <h3 class="text-center text-light">Categories</h3>
  </div>
  <div class="py-5 m-3 ">
    <div class="container ">
      <div class="row d-flex justify-content-center ">
        <div class="col-md-2  border border-2 border-dark bg-light m-2 shadow box-shadow">
          <a class="text-dark text-decoration-none" href="category.php?category=Art">
            <?php



            $select_post = $db->prepare("SELECT * FROM `page` WHERE category = 'Art'");
            $select_post->execute();
            $number_of_post = $select_post->rowCount();
            ?>
            <span class="badge text-dark">
              <?= $number_of_post ?>
            </span>
            <div class="d-flex justify-content-center">
              <img class="p-5" alt="img" src="severimg/art.png">
            </div>
            <div class="d-flex justify-content-center">
              Arts
            </div>
          </a>

        </div>
        <div class="col-md-2 border  border-2 border-dark  bg-light  m-2 shadow box-shadow">
          <a class="text-dark text-decoration-none" href="category.php?category=Technology">
            <?php



            $select_post = $db->prepare("SELECT * FROM `page` WHERE category = 'Technology'");
            $select_post->execute();
            $number_of_post = $select_post->rowCount();
            ?>
            <span class="badge text-dark">
              <?= $number_of_post ?>
            </span>
            <div class="d-flex justify-content-center">
              <img class="p-5" alt="img" src="severimg/techno.png">
            </div>
            <div class="d-flex justify-content-center">
              Technology
            </div>
        </div>
        </a>
        <div class="col-md-2 border border-2 border-dark  bg-light  m-2 shadow box-shadow">
          <a class="text-dark text-decoration-none" href="category.php?category=Nature">
            <?php



            $select_post = $db->prepare("SELECT * FROM `page` WHERE category = 'Nature'");
            $select_post->execute();
            $number_of_post = $select_post->rowCount();
            ?>
            <span class="badge text-dark">
              <?= $number_of_post ?>
            </span>
            <div class="d-flex justify-content-center">
              <img class="p-5" alt="img" src="severimg/nature.png">
            </div>
            <div class="d-flex justify-content-center">
              Nature
            </div>
          </a>
        </div>

        <div class="col-md-2 border  border-2 border-dark bg-light  m-2 shadow box-shadow">
          <a class="text-dark text-decoration-none" href="category.php?category=Other">
            <?php



            $select_post = $db->prepare("SELECT * FROM `page` WHERE category = 'Other'");
            $select_post->execute();
            $number_of_post = $select_post->rowCount();
            ?>
            <span class="badge text-dark">
              <?= $number_of_post ?>
            </span>
            <div class="d-flex justify-content-center">
              <img class="p-5 " alt="img" src="severimg/other.png">
            </div>
            <div class="d-flex justify-content-center">
              Other
            </div>
          </a>
        </div>

      </div>

    </div>
  </div>

  <!-- 
  <div class=" category mb-2 my-2 ">
    <div class="category-title">
      <h1 class="text-light text-center"> Categories</h1>
    </div>

    <ol class="list-group list-group-numbered">
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
          <div class="fw-bold"><a class="text-dark text-decoration-none" href="category.php?category=Art">Arts</a>
          </div>
          Content for list item
        </div>

        <?php



        $select_post = $db->prepare("SELECT * FROM `page` WHERE category = 'Art'");
        $select_post->execute();
        $number_of_post = $select_post->rowCount();
        ?>
        <span class="badge bg-primary rounded-pill">
          <?= $number_of_post ?>
        </span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
          <div class="fw-bold"><a class="text-dark text-decoration-none"
              href="category.php?category=Technology">Technology</a></div>
          Content for list item
        </div>

        <?php



        $select_post = $db->prepare("SELECT * FROM `page` WHERE category = 'Technology'");
        $select_post->execute();
        $number_of_post = $select_post->rowCount();
        ?>
        <span class="badge bg-primary rounded-pill">
          <?= $number_of_post ?>
        </span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
          <div class="fw-bold"><a class="text-dark text-decoration-none" href="category.php?category=Nature">Nature</a>
          </div>
          Content for list item
        </div>

        <?php



        $select_post = $db->prepare("SELECT * FROM `page` WHERE category = 'Nature'");
        $select_post->execute();
        $number_of_post = $select_post->rowCount();
        ?>
        <span class="badge bg-primary rounded-pill">
          <?= $number_of_post ?>
        </span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
          <div class="fw-bold"><a class="text-dark text-decoration-none" href="category.php?category=Other">Other</a>
          </div>
          Content for list item
        </div>

        <?php



        $select_post = $db->prepare("SELECT * FROM `page` WHERE category = 'Other'");
        $select_post->execute();
        $number_of_post = $select_post->rowCount();
        ?>
        <span class="badge bg-primary rounded-pill">
          <?= $number_of_post ?>
        </span>
      </li>
    </ol>

  </div> -->

</body>

</html>

<script src="slider.js"></script>

<?php include 'templates/inc/footer.php'; ?>