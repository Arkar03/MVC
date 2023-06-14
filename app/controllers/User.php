<?php
class User extends Controller
{
    private $um;
    public function __construct()
    {
        $this->model("userModel");
        $this->um = new userModel();
        // var_dump($this->userModel);
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'confirm_password' => $_POST['confirm_password'],
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            if (empty($data['name'])) {
                $data['name_err'] = "Please Enter Username!";
            }
            if (empty($data['email'])) {
                $data['email_err'] = "Please Enter Email!";
            } else {
                // $this->um->getUserByEmail($data['email']) ?  $data['email_err'] = "Email is already taken." : "";
                if ($this->um->getUserByEmail($data['email'])) {
                    $data['email_err'] = "Email is already taken.";
                }
            }
            if (empty($data['password'])) {
                $data['password_err'] = "Please Enter Password!";
            }
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please Confirm Password!";
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = "Password Do Not Match!";
                }
            }

            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                if ($this->um->register($data['name'], $data['email'], $data['password'])) {
                    flash('register_success', "Register Success, Please Login");
                    $this->view('user/login');
                } else {
                    $this->view('user/register');
                }
            } else {
                $this->view("user/register", $data);
            }
        } else {
            $this->view("user/register");
        }
        // var_dump($data['email_err']);

    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'email_err' => '',
                'password_err' => '',
            ];


            if (empty($data['email'])) {
                $data['email_err'] = "Please Enter Email!";
            }
            if (empty($data['password'])) {
                $data['password_err'] = "Please Enter Password!";
            } else {
                $rowUser = $this->um->getUserByEmail($data['email']);
            }
            if (empty($data['password'])) {
                $data['password_err'] = "Please Enter Password!";
            }
            if (empty($data['email_err']) && empty($data['password_err'])) {
                if ($rowUser) {

                    $hash_pass = $rowUser->password;
                    if (password_verify($data['password'], $hash_pass)) {
                        setUserSession($rowUser);
                        redirect(URLROOT.'admin/home');
                        $this->view('home/index');
                    } else {
                        flash('login_fail', 'Incorrect Email or Password');
                        $this->view('user/login');
                    }
                } else {
                    $data['email_err'] = "Incorrect Email";
                }
            } else {
                $this->view("user/login", $data);
            }
        } else {
            $this->view("user/login");
        }
    }

    public function logout() {
        unsetUserSession();
        $this->view('home/index');
    }
}
