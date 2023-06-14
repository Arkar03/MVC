<?php 

class CategoryModel {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
}