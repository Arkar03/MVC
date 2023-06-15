<?php
require_once "C:/xampp/htdocs/MVC/app/models/CategoryModel.php";
class Category extends Controller
{
    private $catModel;
    public function __construct()
    {
        $this->catModel = new CategoryModel;
        // print_r($this->catModel);
    }

    public function create($data = [])
    {
        $data = [
            "name" => "",
            "name_err" => "",
            "cats" => $this->catModel->getAllCategory()
        ];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data['name'] = $_POST['name'];

            if (empty($data['name'])) {
                $data['name_err'] = "Category Name must be supply!";
                $this->view('admin/category/home', $data);
            } else {
                if ($this->catModel->getCategoryByName($data['name'])) {
                    $data['name_err'] = "Category Name is already in use!";
                    $this->view('admin/category/home', $data);
                } else {
                    if ($this->catModel->insetNewCategory($data['name'])) {
                        flash("cat_create_success", "Category Created Successfully");
                        $data['cats'] = $this->catModel->getAllCategory();
                        $this->view('admin/category/home', $data);
                    } else {
                        flash('cat_create_fail', 'Category Fails to create!!');
                        $this->view('admin/category/home', $data);
                    }
                }
            }
        } else {
            $this->view('admin/category/home', $data);
        }
    }
    public function edit($data = [])
    {
        $dta = [
            'name' => '',
            'name_err' => '',
            'cats' => '',
            'currentCat' => ''
        ];
        $dta['cats'] = $this->catModel->getAllCategory();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dta['name'] = $_POST['name'];
            if (!empty($dta['name'])) {
                if ($this->catModel->updateCategory(gettCurrentId(), $dta['name'])) {
                    deleteCurrentId();
                    redirect(URLROOT . 'category/create');
                } else {
                    $dta['currentCat'] = $this->catModel->getCategoryById(gettCurrentId());
                    deleteCurrentId();
                    flash('cat_edit_error', 'Category Update Fail!');
                    redirect(URLROOT . 'admin/category/edit', $dta);
                }
            } else {
                $dta['name_err'] = "Category Name must supply!";
                $dta['currentCat'] = $this->catModel->getCategoryById(gettCurrentId());
                deleteCurrentId();
                $this->view('admin/category/edit', $dta);
            }
        } else {
            setCurrentId($data[0]);
            $dta['currentCat'] = $this->catModel->getCategoryById($data[0]);
            $this->view('admin/category/edit', $dta);
        }
    }

    public function delete($data = [])
    {
        if ($this->catModel->deleteCat($data[0])) {
            redirect(URLROOT . 'category/create');
        } else {
            redirect(URLROOT . 'category/create');
        }
    }
}
