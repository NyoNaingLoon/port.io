<?php

include_once 'config/init.php';
include_once 'lib/Database.php';
include_once 'templates/inc/blogHeader.php';
class Search
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function searchQuery($data)
    {
        $searched = $data['search_query'];


        $query = "SELECT * FROM `page` WHERE category = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$searched]);

        return $stmt->fetchAll();
    }

}