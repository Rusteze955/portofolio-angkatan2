<?php
$id_level = isset($_SESSION['LEVEL']) ? $_SESSION['LEVEL'] : '';
?>
<header class="shadow">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CMS Abdullah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Page
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=manage-profile">Management Profile</a></li>
                            <!-- jika level admin maka bisa dapat halaman user, bukan admin maka janagan atau hilang -->
                            <?php if ($id_level == 1): ?>
                                <li><a class="dropdown-item" href="?page=user">User</a></li>
                            <?php endif; ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="?page=contact">Contact</a></li>
                        </ul>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Skill</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=portofolio">Portofolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=service">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=resume">Resume</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['NAME']; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="php/keluar.php">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>