<?php






include_once '../config/init.php';
include_once '../lib/Database.php';
include_once '../Applications/delete.php';
include '../templates/inc/admin_header.php';
$db = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = new Delete();
    $delete->deleteContent($id);

}



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>



    <div class="py-5" id="contents">
        <div class="container">
            <div class="row hidden-md-up">
                <?php


                $content = $db->prepare("SELECT * FROM `page` ");
                $content->execute();
                if ($content->rowCount() > 0) {
                    while ($fetch_content = $content->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-block">
                                    <div class="img-card  ">
                                        <img class="img-fluid container  my-2 " src="../upload/<?= $fetch_content['image']; ?>">
                                    </div>
                                    <h4 class="card-title m-2">
                                        <?= $fetch_content['title'] ?>
                                    </h4>

                                    <p id="para" class="card-text p-y-1 m-2">
                                        <?= $fetch_content['para'] ?>
                                    </p>

                                    <a class="btn btn-dark m-2" href="../read.php?id=<?= $fetch_content['id']; ?>">Read More</a>

                                    <a class="btn btn-danger my-2" href="contents.php?id=<?= $fetch_content['id']; ?>"
                                        class="card-link">Delete</a>
                                    <span class="position-absolute bottom-0 end-0">Like
                                        <?= $fetch_content['likes']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>







                        <?php
                    }
                } else {
                    echo '<p class="empty">No News is here</p>';
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
</body>

</html>