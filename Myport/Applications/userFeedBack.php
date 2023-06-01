<?php

include_once 'config/init.php';
include_once 'lib/Database.php';


class FeedBack
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function sendFB($data)
    {

        $user_id = $_SESSION['user_id'];
        $name = $data['name'];
        $email = $data['email'];
        $message = $data['message'];

        $sql = "INSERT INTO messages (user_id,name, email, message) VALUES (:user_id,:name, :email, :message)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            header('location: feedback.php');
            $_SESSION['feedback'] = "Thanks for your feedback";

        } else {
            echo "Error inserting data.";
        }
        return true;
    }

}