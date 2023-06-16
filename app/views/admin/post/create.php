<?php
require_once APPROOT . "/views/inc/header.php";
require_once APPROOT . "/views/inc/nav.php";
?>

<div class="container my-5">
    <div class="col-md-8 offset-md-2">
        <div class="card bg-light p-5">
            <h1 class="text-dark text-center mb-3">Create A Post</h1>
            <form action="<?= URLROOT . "post/create" ?>" method="POST" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control <?= !empty($data['title_err']) ? 'is-invalid' : '' ?>" id="floatingInput" name="name" placeholder="Username" autofocus>
                    <label for="floatingInput">Title</label>
                    <div class="invalid-feedback">
                        <?= !empty($data['title_err']) ? $data['title_err'] : '' ?>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="desc" class="form-control <?= !empty($data['title_err']) ? 'is-invalid' : '' ?>" placeholder="Leave a comment here" id="desc" style="height: 100px"></textarea>
                    <label for="desc">Description</label>
                    <div class="invalid-feedback">
                        <?= !empty($data['desc_err']) ? $data['desc_err'] : '' ?>
                    </div>
                </div>
                <div class="mb-3">
                    <input name="file" class="form-control form-control-sm" id="file" type="file" required>
                    <!-- <label for="file">Description</label> -->
                    <div class="invalid-feedback">
                        <?= !empty($data['file_err']) ? $data['file_err'] : '' ?>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="content" class="form-control <?= !empty($data['title_err']) ? 'is-invalid' : '' ?>" placeholder="Leave a comment here" id="content" style="height: 100px"></textarea>
                    <label for="content">Content</label>
                    <div class="invalid-feedback">
                        <?= !empty($data['content_err']) ? $data['content_err'] : '' ?>
                    </div>
                </div>
                <div class="form-group my-3">
                    <!-- <label for="PostCategory" class="form-label">Post Category</label> -->
                    <select class="form-select" id="cat_id" name="PostCategory" aria-label="Post Type">
                        <?php foreach ($data['cats'] as $cat) : ?>
                            <option value="<?= $cat->id ?>"> <?= $cat->name ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class=" d-flex justify-content-end no-gutters">
                    <div class="">
                        <button type=" cancle" class="btn btn-outline-dark">Cancle</button>
                        <button type="submit" class="btn btn-dark">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php require_once APPROOT . "/views/inc/nav.php";
    ?>