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
                </ul>
            </div>
        </div>
    </nav>
</div>