<?php

include_once 'config/init.php';
include_once 'lib/Database.php';

class readBlog{

		public $db;

		public function __construct(){
			$this->db = new Database();
		}


		public function single($id){
		  $sql = "SELECT * FROM page WHERE id = :id";
		  $stmt = $this->db->prepare($sql);
		  $stmt->bindParam(':id', $id);
		  $stmt->execute();
		  return $stmt->fetch();
 
		}

}

?>



