<?php


include_once 'config/init.php';
include_once 'lib/Database.php';
include 'templates/inc/blogHeader.php';
include 'Applications/search.php';
include 'Applications/time.php';




$db = new Database();



?>
<?php


$con = mysqli_connect('localhost', 'root', '', 'portblog');

if (isset($_POST['liked'])) {
  $user_id = $_SESSION['user_id'];
  $post_id = $_POST['post_id'];
  $result = mysqli_query($con, "SELECT * FROM `page` WHERE id=$post_id");
  $row = mysqli_fetch_array($result);
  $n = $row['likes'];

  mysqli_query($con, "INSERT INTO likes (user_id, post_id) VALUES ($user_id, $post_id)");
  mysqli_query($con, "UPDATE `page` SET likes = $n+1 WHERE id=$post_id");

  echo $n + 1;
  exit();
}
;
if (isset($_POST['unliked'])) {
  $user_id = $_SESSION['user_id'];
  $post_id = $_POST['post_id'];
  $result = mysqli_query($con, "SELECT * FROM `page` WHERE id=$post_id");
  $row = mysqli_fetch_array($result);
  $n = $row['likes'];

  mysqli_query($con, "DELETE FROM likes WHERE post_id=$post_id AND user_id= $user_id");
  mysqli_query($con, "UPDATE `page` SET likes=$n-1 WHERE id=$post_id");

  echo $n - 1;
  exit();
}

// Retrieve posts from the database
$posts = mysqli_query($con, "SELECT * FROM `page`");
?>










<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
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

        } else {


          $content = $db->prepare("SELECT * FROM `page` ");

          $content->execute();
          if ($content->rowCount() > 0) {
            while ($fetch_content = $content->fetch(PDO::FETCH_ASSOC)) {
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

                    <p id="para" class="card-text p-y-1 m-2">
                      <?= $fetch_content['para'] ?>
                    <h6 class="position-absolute p-1 my-2   top-0 start-0 rounded-end-2 bg-dark bg-opacity-75 text-white">
                      <?= date('M d ', strtotime($fetch_content['datetime'])); ?>
                    </h6>
                    </p>

                    <a class="btn btn-dark m-2" href="read.php?id=<?= $fetch_content['id']; ?>">Read More</a>

                    <span>
                      <?php
                      $like = $db->prepare("SELECT * FROM likes WHERE user_id =:user_id and post_id = :post_id ");
                      $_SESSION['user_id'] = $user_id;
                      $post_id = $fetch_content['id'];
                      $like->bindParam(':user_id', $user_id);
                      $like->bindParam(':post_id', $post_id);
                      $like->execute();
                      if ($like->rowCount() > 0) {


                        ?>
                        <span><a href="" class="unlike" id="<?php echo $fetch_content['id']; ?>"><i
                              class="fa-solid fa-heart text-danger"></i> </a></span>
                        <?= $fetch_content['likes']; ?>
                        <?php

                        $dateTime = $fetch_content['datetime'];
                        $timeZone = 'Asia/BangKok';

                        $formatter = new DateTimeFormatter($dateTime, $timeZone);



                        ?>
                        <p
                          class="position-absolute top-50 end-0 p-1  translate-middle-y rounded-start-2 bg-dark bg-opacity-75 text-light">
                          <?php
                          echo $formatter->formatDatetimeAgo();
                          ?>
                        </p>
                        <?php
                      } else {
                        ?>
                        <span><a href="" class="like" id="<?php echo $fetch_content['id']; ?>"><i
                              class="fa-regular fa-heart text-dark"></i>
                          </a>
                          <?= $fetch_content['likes'] ?>

                        </span>
                        <?php
                        $dateTime = $fetch_content['datetime'];
                        $timeZone = 'Asia/BangKok';

                        $formatter = new DateTimeFormatter($dateTime, $timeZone);




                        ?>
                        <p
                          class="position-absolute p-1  top-50 end-0 translate-middle-y rounded-start-2 bg-dark bg-opacity-75 text-light">
                          <?php
                          echo $formatter->formatDatetimeAgo();
                          ?>
                        </p>
                        <?php
                      }

                      ?>




                  </div>

                </div>

              </div>







              <?php
            }
          } else {
            echo '<p class="empty">no blogs is here</p>';
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('.like').click(function () {
        var post_id = $(this).attr('id');

        $post = $(this);
        $.ajax({
          url: 'blogAll.php',
          type: 'post',
          async: false,
          data: {
            'liked': 1,
            'post_id': post_id
          },

          success: function (response) {
            $post.parent().find('span.likes_count').text(response + " likes");
            $post.addClass('hide');
            $post.siblings().removeClass('hide');
          }


        });
      });
      $('.unlike').click(function () {
        var post_id = $(this).attr('id');

        $post = $(this);
        $.ajax({
          url: 'blogAll.php',
          type: 'post',
          async: false,
          data: {
            'unliked': 1,
            'post_id': post_id
          },

          success: function (response) {
            $post.parent().find('span.likes_count').text(response + " likes");
            $post.addClass('hide');
            $post.siblings().removeClass('hide');
          }


        });
      });

    });
  </script>
</body>


</html>