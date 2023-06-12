<?php
require_once "C:/xampp/htdocs/MVC/app/models/userModel.php";
// include_once "../models/userModel.php";
class Home extends Controller
{
    private $userModel;
    public function __construct()
    {
        $userModel = new userModel();
        $userModel = $this->model("userModel");
    }
    public function index($data = [])
    {
        // var_dump($this->userModel);
        $userModel = new userModel();
        $data = $userModel->getAllUser();
        $this->view("home/index", $data);
    }
}
