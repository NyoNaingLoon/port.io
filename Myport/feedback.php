<?php
include_once 'config/init.php';
include_once 'lib/Database.php';
include 'templates/inc/blogHeader.php';
include 'Applications/search.php';
include 'Applications/time.php';
include 'Applications/userFeedBack.php';

$msg = new FeedBack;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sent = $msg->sendFB($_POST);


}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/blog.css">
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
                                            <h6
                                                class="position-absolute p-1 my-2   top-0 start-0 rounded-end-2 bg-dark bg-opacity-75 text-white">
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
                                                    class="position-absolute p-1  bottom-0 end-0 rounded-start-2 bg-dark bg-opacity-75 text-light">
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

                    <h1 class="text-center">Get In Touch</h1>

                    <div class="container d-flex justify-content-center">
                        <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
                            <form action="" method="POST">
                                <div class="form-group  mb-3">

                                    <input type="text" name="name" class="form-control" placeholder="Enter your Name">
                                </div>
                                <div class="form-group  mb-3">

                                    <input type="email" name="email" class="form-control" placeholder="Enter your Mail"
                                        required>
                                </div>
                                <div class="form-group mb-3 col-14 ">

                                    <textarea class="form-control" name="message" id="message" rows="3"
                                        placeholder="Write Message Here..."></textarea>
                                </div>



                                <button type="submit" class="btn btn-secondary ">Submit</button>
                            </form>

                        </div>

                    </div>
                </div>

                <?php
                }
                ?>
        </div>
    </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>