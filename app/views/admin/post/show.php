<?php
require_once APPROOT . "/views/inc/header.php";
require_once APPROOT . "/views/inc/nav.php";
?>

<div class="container-fluid">
    <div class="container my-5">
        <div class="d-flex justify-content-between">
           
                <a class="btn btn-dark btn-small" href="<?= URLROOT . '/post/home/' . $data['post']->cat_id ?>">Back</a>
        
        
                <a class="btn btn-dark" href="<?= URLROOT . '/post/edit/' . $data['post']->id ?>">Edit</a>
  
        </div>
        <div class="col-md-8 offset-md-2">
            <div class="card p-5">
                <div class="card-header">
                    <?php //var_dump($data) 
                    // var_dump($data['post']->image);
                    ?>
                    <h6>
                        <?= $data['post']->title ?>
                    </h6>
                </div>
                <div class="card-body">
                    <img class="img-thumbnail" src="<?= URLROOT . 'public/assets/uploads/' . $data['post']->image ?>" alt="">
                    <p>
                        <?= $data['post']->content ?>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>