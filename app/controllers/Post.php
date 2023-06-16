<?php
require_once "C:/xampp/htdocs/MVC/app/models/PostModel.php";
require_once "C:/xampp/htdocs/MVC/app/models/CategoryModel.php";
class Post extends Controller
{
    private $postModel;
    private $catModel;
    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->catModel = new CategoryModel();
    }
    public function home($params = [])
    {
        // echo $params[0];
        $data = [
            'cats' => '',
            'posts' => '',
        ];
        $data['cats'] = $this->catModel->getAllCategory();
        $data['posts'] = $this->postModel->getPostByCatId($params[0]);
        $this->view('admin/post/home',$data);
    }
    public function show($data = [])
    {
        echo "This is a function of " . __CLASS__ . " class<br>";
        echo "<pre>" . print_r($data, true) . "</pre>";
    }

    public function create() {
        $data = [
            'title' => '',
            'desc' => '',
            'file' => '',
            'content' => '',
            'title_err' => '',
            'desc_err' => '',
            'file_err' => '',
            'content_err' => '',
        ];
        $data['cats'] = $this->catModel->getAllCategory();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            print_r($_FILES['file']);
            
            $this->view('admin/post/create',$data);
        } else {
            $this->view('admin/post/create',$data);
        }
    }
}
