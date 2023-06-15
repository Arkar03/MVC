<?php
require_once "C:/xampp/htdocs/MVC/app/models/PostModel.php";

class Post extends Controller
{
    private $postModel;
    public function __construct()
    {
        $this->postModel = new PostModel();
    }
    public function home()
    {
        $this->view('admin/post/home');
    }
    public function show($data = [])
    {
        echo "This is a function of " . __CLASS__ . " class<br>";
        echo "<pre>" . print_r($data, true) . "</pre>";
    }
}
