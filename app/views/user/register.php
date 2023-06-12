<?php
require_once APPROOT . "/views/inc/header.php";
require_once APPROOT . "/views/inc/nav.php";
?>

<body>
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="card bg-light p-5">
                    <h1 class="text-secondary text-center mb-3">Register</h1>
                    <form action="" method="">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Username" autofocus>
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" id="floatingInput">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" id="floatingInput" >
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" id="floatingInput" >
                            <label for="floatingInput">Confirm Password</label>
                        </div>

                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php require_once APPROOT . "/views/inc/footer.php" ?>