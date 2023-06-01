<?php

include_once 'config/init.php';
include_once 'lib/Database.php';


class login
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();

    }
    public function signIn($data)
    {
        $email = $data["email"];
        $password = $data['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $row['password'])) {

                $_SESSION['user_id'] = $row['id'];
                header('location: index.php');
                $_SESSION['logIn_alert'] = 'Welcome To My Channel';
                return true;
            } else {

                echo '<script>alert("incorrect username or password!");</script>';
            }
        } else {
            echo '<script>alert("incorrect username or password!");</script>';
        }
    }









}