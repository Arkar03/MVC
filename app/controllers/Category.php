<?php

class Category extends Controller
{
    public function __construct()
    {
    }

    public function home()
    {
        $this->view('admin/category/home');
    }
}
