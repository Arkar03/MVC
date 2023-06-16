<?php
require_once APPROOT . "/views/inc/header.php";
require_once APPROOT . "/views/inc/nav.php";
?>
<style>
    .btn-circle.btn-lg {
        width: 173px;
        height: 50px;
        padding: 12px 6px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 25px;
    }
</style>
<div class="container-fluid">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">

                    <?php foreach ($data['cats'] as $cat) : ?>
                        <li class="list-group-item rounded-0">
                            <a href="<?= URLROOT . 'post/home/' . $cat->id; ?>" class="text-decoration-none text-secondary"><?= $cat->name ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
                <div class="d-flex  mt-4">
                    <a href="<?= URLROOT.'post/create' ?>" type="button" class="btn btn-dark border btn-circle btn-lg justify-content-center">
                        <i class="fa-solid fa-plus"></i>
                        <span>Create Post</span>
                    </a>

                </div>
            </div>

            <div class="col-md-8">
                <?php foreach ($data['posts'] as $post) : ?>
                    <div class="card rounded-0 mb-3">
                        <div class="card-header rounded-0 bg-dark text-white">
                            <h1 class="h5">
                                <?= $post->title; ?>
                            </h1>
                        </div>
                        <div class="card-block p-3">
                            <p>
                                <?= $post->desc; ?>
                            </p>
                            <div class="float-end no-gutters">
                                <button class="btn btn-success text-white btn-sm text-dark">Detail</button>
                                <button class="btn btn-warning btn-sm text-dark">Edit</button>
                                <button class="btn btn-danger btn-sm text-white">Delete</button>
                            </div>

                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once APPROOT . "/views/inc/footer.php";
?>