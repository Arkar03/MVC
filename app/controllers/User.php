<?php

class User extends Controller
{
    public function __construct(){

    }
    public function register() {
        $this->view("user/register");
    }

    public function login() {
        $this->view("user/login");
    }
}
