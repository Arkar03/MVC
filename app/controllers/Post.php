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
        $this->view('admin/post/home', $data);
    }

    public function show($params = [])
    {
        $post = $this->postModel->getPostById($params[0]);
        // var_dump($params[0]);
        $this->view('admin/post/show', ['post' => $post]);
    }
    public function create()
    {
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $root =  dirname(dirname(dirname(__FILE__)));
            $files = $_FILES['file'];
            $data['title'] = $_POST['title'];
            $data['desc'] = $_POST['desc'];
            $data['content'] = $_POST['content'];

            if (empty($data['title'])) {
                $data['title_err'] = "Title must supply";
            }
            if (empty($data['desc'])) {
                $data['desc_err'] = "Desc must supply";
            }
            if (empty($data['content'])) {
                $data['content_err'] = "Content must supply";
            }


            if (empty($data['title_err']) && empty($data['desc_err']) && empty($data['content_err'])) {
                if (!empty($files['name'])) {
                    move_uploaded_file($files['tmp_name'], $root . '/public/assets/uploads/' . $files['name']);
                    if ($this->postModel->insertPost($_POST['cat_id'], $data['title'], $data['desc'], $files['name'], $data['content'])) {
                        flash('pis', 'Post insert successfully');
                        redirect(URLROOT . 'post/home/1');
                    } else {
                        $this->view('admin/post/creat', $data);
                    }
                } else {
                    flash('fne', 'file not exits, please inset file');
                    $this->view('admin/post/create', $data);
                }
            } else {
                $this->view('admin/post/create', $data);
            }

            $this->view('admin/post/create', $data);
        } else {
            $this->view('admin/post/create', $data);
        }
    }

    public function edit($param = [])
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'title' => '',
                'desc' => '',
                'file' => '',
                'content' => '',
                'title_err' => '',
                'desc_err' => '',
                'file_err' => '',
                'content_err' => '',
                'cats' => ''
            ];
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $root = dirname(dirname(dirname(__FILE__)));
            $files = $_FILES['file'];
            $filename = $_FILES['file']['name'];

            $data['title'] = $_POST['title'];
            $data['desc'] = $_POST['desc'];
            $data['content'] = $_POST['content'];

            if (empty($data['title'])) {
                $data['title_err'] = "Title must Supply!";
            }

            if (empty($data['desc'])) {
                $data['desc_err'] = "Description must Supply!";
            }

            if (empty($data['content'])) {
                $data['content_err'] = "Content must Supply!";
            }

            if (empty($data['title_err']) && empty($data['desc_err']) && empty($data['content_err'])) {
                if (!empty($files['name'])) {
                    move_uploaded_file($files['tmp_name'], $root . '/public/assets/uploads/' . $files['name']);
                } else {
                    $filename = $_POST['old_file'];
                }
                $curId = gettCurrentId();
                deleteCurrentId();
                if ($this->postModel->updateData($curId, $_POST['cat_id'], $data['title'], $data['desc'], $filename, $data['content'])) {
                    flash("pes", "Post Edit Success,Thank");
                    redirect(URLROOT . "post/show/" . $curId);
                } else {
                    flash("pef", "Post Edit Fail,Try Again");
                    redirect(URLROOT . "post/edit/" . $curId);
                }
            } else {
                $this->view("admin/post/edit", $data);
            }
        } else {
            setCurrentId($param[0]);
            $data['cats'] = $this->catModel->getAllCategory();
            $data['post'] = $this->postModel->getPostById($param[0]);
            $this->view("admin/post/edit", $data);
        }
    }
    public function delete($param = [])
    {
        $data = [
            'cats' => '',
            'posts' => ''
        ];
        if ($this->postModel->deletePost($param[0])) {
            flash("del_suc", "Post Delete Successfully!");
            redirect(URLROOT . "post/home/1");
        } else {
            flash("del_fal", "Post Delete Fail!");
        }
        $data['cats'] = $this->catModel->getAllCategory();
        $data['posts'] = $this->postModel->getPostByCatId($param[0]);
        $this->view("admin/post/home", $data);
    }
}
