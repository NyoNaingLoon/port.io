<?php


include_once '../config/init.php';
include_once '../lib/Database.php';
//include_once '../admin/users.php';

class Delete
{

  public $db;

  public function __construct()
  {
    $this->db = new Database();

  }




  public function deleteUser($id)
  {

    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();


    return $stmt->rowCount();
  }


  public function deleteContent($id)
  {

    $sql = "DELETE FROM page WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();


    return $stmt->rowCount();
  }
  public function deleteMsg($id)
  {

    $sql = "DELETE FROM messages WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();


    return $stmt->rowCount();
  }

}






?>