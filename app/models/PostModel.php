<?php

class PostModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getPostByCatId($id)
    {
        $this->db->query("SELECT * FROM posts WHERE cat_id=:id");
        $this->db->bind(":id", $id);
        return $this->db->multipleResult();
    }
}
