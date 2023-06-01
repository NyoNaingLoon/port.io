<?php
session_start();
session_destroy();






header('Location: ../user_login.php?alert=You_are_logged_out..');