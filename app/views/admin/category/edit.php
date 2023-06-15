<?php
require_once APPROOT . "/views/inc/header.php";
require_once APPROOT . "/views/inc/nav.php";
?>
<style>
    body {
        overflow-x: hidden;
    }
</style>
<div class="container-fluid my-3 p-0">
    <div class="row no-gutters">
        <div class="col-md-3">
            <div class="card roundex-0">
                <div class="card-header">
                    <h2 class="ps-4">Category</h2>
                </div>
                <div class="card-block">
                    <ul class="list-group">

                        <?php foreach ($data['cats'] as $cat) : ?>
                            <li class="list-group-item rounded-0 d-flex justify-content-between">
                                <span class=""><?= $cat->name ?></span>
                                <span>
                                    <a href="<?= URLROOT.'category/edit/'.$cat->id ?>"><i class="fa fa-edit text-warning"></i></a>
                                    <a href="#"><i class="fa fa-trash text-danger"></i></a>
                                </span>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-7 offset-md-1">
            <?php flash('cat_create_success') ?>
            <?php flash('cat_create_fail') ?>
            <div class="card bg-light p-4 my-3">

                <h1 class="text-dark text-center mb-3">Edit Category</h1>
                <form action="<?= URLROOT . "category/edit" ?>" method="POST">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control <?= !empty($data['name_err']) ? 'is-invalid' : '' ?>" name="name" placeholder="Name" id="name" value="<?= $data['currentCat']->name ?>">
                        <label for="floatingInput">Category Name</label>
                        <div class="invalid-feedback">
                            <?= !empty($data['name_err']) ? $data['name_err'] : '' ?>
                        </div>
                    </div>

                    <div class=" d-flex justify-content-end no-gutters">
                        <!-- <a href="<?= URLROOT . 'user/register' ?>" class="text-secondary hover-me">Don't have an account? Please Register!</a> -->
                        <div class="">
                            <button type=" cancle" class="btn btn-outline-dark">Cancle</button>
                            <button type="submit" class="btn btn-dark">Update</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
    <?php require_once APPROOT . "/views/inc/footer.php" ?>