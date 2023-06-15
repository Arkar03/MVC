<div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg container bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Your MVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Features</a>
                    </li>
                    <!-- <?php if (getUserSession()) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Languages
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">PHP</a></li>
                                <li><a class="dropdown-item" href="#">Phython</a></li>
                                <li><a class="dropdown-item" href="#">MERN</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="<?= URLROOT . 'user/logout' ?>">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= URLROOT . 'user/login' ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= URLROOT . 'user/register' ?>">Register</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Languages
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">PHP</a></li>
                                <li><a class="dropdown-item" href="#">Phython</a></li>
                                <li><a class="dropdown-item" href="#">MERN</a></li>
                            </ul>
                        </li>
                    <?php endif ?> -->
                    <?php if (getUserSession()) :    ?>
                        <li class="nav-item">
                            <a class="nav-link text-warning english" aria-current="page" href="<?php echo URLROOT . 'admin/home';    ?>">Admin</a>
                        </li>
                    <?php endif;  ?>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle text-white english" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php if (getUserSession() != false) : ?>
                                <?= strtoupper(getUserSession()->name) ?>
                            <?php else : ?>
                                Member
                            <?php endif ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if (getUserSession() != false) : ?>
                                <li><a class="dropdown-item text-danger" href="<?php echo URLROOT . "user/logout";  ?>">Logout</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="<?php echo URLROOT . "user/login";  ?>">Login</a></li>
                                <li><a class="dropdown-item" href="<?php echo URLROOT . "user/register";  ?>">Register</a></li>
                            <?php endif; ?>
                        </ul>
            </div>
        </div>
    </nav>
</div>