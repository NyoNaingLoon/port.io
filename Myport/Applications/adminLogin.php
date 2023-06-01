<?php

include_once 'config/init.php';
include_once 'lib/Database.php';


class adminLogin
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();

    }
    public function signIn($data)
    {
        $name = $data['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $pass = sha1($data['pass']);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);

        $select_admin = $this->db->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
        $select_admin->execute([$name, $pass]);
        $row = $select_admin->fetch(PDO::FETCH_ASSOC);

        if ($select_admin->rowCount() > 0) {
            $_SESSION['admin_id'] = $row['id'];
            header('location: admin/deashboard.php');
            // $_SESSION['logIn_alert'] = 'Welcome To My Channel';
            return true;
        } else {
            echo '<script>alert("incorrect !");</script>';
        }
    }
}



//     if ($stmt->rowCount() > 0) {
//         $row = $stmt->fetch(PDO::FETCH_ASSOC);

//         if (password_verify($password, $row['password'])) {

//             $_SESSION['user_id'] = $row['id'];
//             header('location: index.php');
//             $_SESSION['logIn_alert'] = 'Welcome To My Channel';
//             return true;
//         } else {

//             echo '<script>alert("incorrect username or password!");</script>';
//         }
//     } else {
//         echo '<script>alert("incorrect username or password!");</script>';
//     }
// }
