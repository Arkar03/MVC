<?php
error_reporting(0);
class Home extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model("userModel");
    }
    public function index($data = [])
    {
        $data = $this->userModel->getAllUser();
        $this->view("home/index",$data);
    }

}
