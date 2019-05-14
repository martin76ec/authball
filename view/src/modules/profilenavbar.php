<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg game-navbar">
        <a class="navbar-brand" href="#">
            <i class="fas fa-volleyball-ball fa-3x mx-3"></i>
            AuthBall</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mr-auto"></div>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <div class="dropdown">
                        <a class="nav-link" href="#"><?php echo $_SESSION['user_name']; ?></a>
                        <div class="dropdown-content">
                            <a href="model/clearsesionModel.php">Cerrar sesion</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>