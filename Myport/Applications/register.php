<?php

include_once 'config/init.php';
include_once 'lib/Database.php';




class Register
{
	public $db;

	public function __construct()
	{
		$this->db = new Database();

	}
	public function createAccount($data)
	{
		$name = $data['username'];
		$email = $data['email'];
		$password = $data['password'];

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $hashed_password);

		if ($stmt->execute()) {
			$_SESSION['status'] = "Please Login Again";
			header("location: user_login.php ");
		} else {
			echo "Error inserting data.";
		}

		return null;


	}



}












?>