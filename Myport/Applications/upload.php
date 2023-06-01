<?php
include_once '../config/init.php';
include_once '../lib/Database.php';
include_once '../admin/createpost.php';



class Upload
{

	public $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function uploadContent($data, $file)
	{
		$title = $data["title"];
		$para = $data["para"];
		$datetime = $data["datetime"];
		$imagename = $data['imagename'];
		$category = $data['category'];
		$type = $data['type'];


		$permited = array("jpg", "jpeg", "png", "gif");
		$file_name = $file["file"]["name"];
		$file_size = $file["file"]["size"];
		$file_temp = $file["file"]["tmp_name"];

		$div = explode(".", $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$upload_image = "../upload/" . $unique_image;
		if (in_array($file_ext, $permited) === false) {
			header('location: createpost.php');
			$_SESSION['upload_allowed'] = "Only " . implode(", ", $permited) . " files are allowed.";
		}

		if ($file_size > 2097152) {
			echo "File size must be less than 2 MB.";
		}

		if (move_uploaded_file($file_temp, $upload_image)) {
			$query = "INSERT INTO page (title, para, image, datetime,imagename,category,type) VALUES ('$title', '$para', '$unique_image','$datetime','$imagename','$category','$type')";
			$result = $this->db->query($query);
			if ($result) {
				header('location: createpost.php');
				$_SESSION['upload_alert'] = 'Uploaded Successfully';
			} else {
				echo "Error uploading image to database.";

			}
		} else {

			echo "Error uploading image to server.";
		}

		return null;

	}






}