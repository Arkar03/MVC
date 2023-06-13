<?php
require_once APPROOT . "/views/inc/header.php";
require_once APPROOT . "/views/inc/nav.php";
?>
<style>
    .hover-me {
        text-decoration: none;
    }

    .hover-me:hover {
        text-decoration: underline;
    }
</style>

<body>
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="card bg-light p-5">
                    <h1 class="text-dark text-center mb-3">Register</h1>
                    <form action="<?= URLROOT."user/register" ?>" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control <?= !empty($data['name_err']) ? 'is-invalid' : '' ?>" id="floatingInput" name="name" placeholder="Username" autofocus>
                            <label for="floatingInput">Username</label>
                            <div class="invalid-feedback">
                                <?= !empty($data['name_err']) ? $data['name_err'] : '' ?>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control <?= !empty($data['email_err']) ? 'is-invalid' : '' ?>" name="email" placeholder="Email" id="floatingInput">
                            <label for="floatingInput">Email address</label>
                            <div class="invalid-feedback">
                                <?= !empty($data['email_err']) ? $data['email_err'] : '' ?>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control <?= !empty($data['password_err']) ? 'is-invalid' : ''; ?>" placeholder="Password" id="floatingInput">
                            <label for="floatingInput">Password</label>
                            <div class="invalid-feedback">
                                <?= !empty($data['password_err']) ? $data['password_err'] : ''; ?>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="confirm_password" class="form-control <?= !empty($data['confirm_password_err']) ? 'is-invalid' : '' ?>" placeholder="Confirm Password" id="floatingInput">
                            <label for="floatingInput">Confirm Password</label>
                            <div class="invalid-feedback">
                                <?= !empty($data['confirm_password_err']) ? $data['confirm_password_err'] : '' ?>
                            </div>
                        </div>
                        <div class=" d-flex justify-content-between no-gutters">
                            <a href="<?= URLROOT . 'user/login' ?>" class="text-secondary hover-me">Already registered? Please login!</a>
                            <div class="">
                                <button type=" cancle" class="btn btn-outline-dark">Cancle</button>
                                <button type="submit" class="btn btn-dark">Register</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php require_once APPROOT . "/views/inc/footer.php" ?>