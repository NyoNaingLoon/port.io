<?php


include '../templates/inc/admin_header.php';

include_once '../config/init.php';
include_once '../Applications/upload.php';


$re = new Upload();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $upload = $re->uploadContent($_POST, $_FILES);

  var_dump($upload);


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
</head>

<body>

  <h1 class="text-center">Post list</h1>

  <div class="container d-flex justify-content-center">
    <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group  mb-3">
          <h6>Title</h6>
          <input type="text" name="title" class="form-control" placeholder="Enter title">
        </div>
        <div class="form-group mb-3 col-14 ">
          <label for="exampleTextarea">Text</label>
          <textarea class="form-control" name="para" id="exampleTextarea" rows="3"></textarea>
        </div>
        <div class="form-group mb-3">
          <label for="exampleFormControlFile1"></label>
          <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group mb-3">
          <h6>Image Name</h6>
          <input type="text" name="imagename" class="form-control" placeholder="Enter Image Name">
        </div>

        <div class="form-group mb-3">
          <label for="exampleFormControlFile1"></label>
          <input type="datetime-local" name="datetime" id="exampleFormControlFile1">
        </div>
        <div class="form-group mb-3">
          <select class="form-select" name="category" aria-label="Default select example">
            <option selected>Categories</option>
            <option value="Art">Art</option>
            <option value="Technology">Technology</option>
            <option value="Nature">Nature</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="form-group mb-3">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="Header" checked>
            <label class="form-check-label" for="flexRadioDefault1">
              Header
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="Ordinary" checked>
            <label class="form-check-label" for="flexRadioDefault2">
              Ordinary
            </label>
          </div>
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>

  </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>