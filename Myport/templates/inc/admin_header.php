<?php

session_start();
include_once '../config/init.php';
include_once '../lib/Database.php';

$db = new Database;


if (!isset($_SESSION['admin_id'])) {
  header('Location: ../admin_login.php');
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">
  <title>Admin</title>


  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

  <link herf="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">




  <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


  <!-- Favicons -->


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="headers.css" rel="stylesheet">
</head>

<body>



  <main>
    <?php
    if (isset($_SESSION['upload_alert'])) {
      ?>

      <script>
        $(document).ready(function () {
          $('#myAlert').modal('show');
        });
      </script>

      <div class="alert alert-primary alert-dismissible fade show" role="alert" id="myAlert">
        <strong>
          <?php echo $_SESSION['upload_alert'] ?>
        </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php
      unset($_SESSION['upload_alert']);
    }
    if (isset($_SESSION['upload_allowed'])) {
      ?>

      <script>
        $(document).ready(function () {
          $('#myAlert').modal('show');
        });
      </script>

      <div class="alert alert-warning alert-dismissible fade show" role="alert" id="myAlert">
        <strong>
          <?php echo $_SESSION['upload_allowed'] ?>
        </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php
      unset($_SESSION['upload_allowed']);
    }






    ?>

    <h1 class="visually-hidden">Admin</h1>

    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
          </svg>
          <span class="fs-4 text-primary">Admin</span>
        </a>
        <?php

        ?>
        <div>

        </div>
        <?php
        ?>
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="deashboard.php" class="nav-link " aria-current="page">Dashboard</a>
          </li>
          <li class="nav-item"><a href="feedback.php" class="nav-link">FeedBack</a></li>
          <li class="nav-item"><a href="contents.php" class="nav-link">Contents</a></li>
          <li class="nav-item"><a href="createpost.php" class="nav-link">Upload</a></li>
          <li class="nav-item"><a href="users.php" class="nav-link">Users</a></li>
        </ul>
      </header>
    </div>