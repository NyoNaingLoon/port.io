<?php
session_start();
include_once 'config/init.php';
include_once 'Applications/login.php';


$re = new Login();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $create = $re->signIn($_POST);




}
?>



<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log In</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<style type="text/css">
  /*  */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  html,
  body {
    height: 100%;
    background: #474747;
  }

  body {
    display: flex;
    align-items: center;
    padding-top: 40px;
    padding-bottom: 40px;

  }

  .form-signin {
    max-width: 330px;
    padding: 15px;


  }

  .form-signin .form-floating:focus-within {
    z-index: 2;


  }

  .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;


  }

  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;

  }



  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }





  .btn-primary {
    --bd-orange-bg: #ff7a57;
    --bd-orange-rgb: 255, 122, 87, 1;

    --bs-btn-font-weight: 600;
    --bs-btn-color: var(--bs-white);
    --bs-btn-bg: var(--bd-orange-bg);
    --bs-btn-border-color: var(--bd-orange-bg);
    --bs-btn-hover-color: var(--bs-white);
    --bs-btn-hover-bg: #FD6F4A;
    --bs-btn-hover-border-color: #FD6F4A;
    --bs-btn-focus-shadow-rgb: var(--bd-orange-rgb);
    --bs-btn-active-color: var(--bs-btn-hover-color);
    --bs-btn-active-bg: #c45700;
    --bs-btn-active-border-color: #c45700;

  }
</style>
<?php

?>



<body class="text-center">
  <main class="form-signin w-100 m-auto border border-dark shadow">

    <form method="POST" class="form-signin">

      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating mb-2">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating mb-2">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="link">
        <a href="user_register.php">Don`t you have any Account?</a>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>

    </form>
  </main>



  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
</body>

</html>