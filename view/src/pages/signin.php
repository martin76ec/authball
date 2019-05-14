<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('view/src/modules/head.php'); ?>
</head>

<body>
    <header>
        <?php include('view/src/modules/navbar.php'); ?>
        <div class="container-fluid div-centered">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="container col-md-10 col-12">
                    <div class="row">
                        <div class="col-md-4 img-hide">
                            <img width="100%" src="view/assets/paint.png" alt="Book">
                        </div>
                        <div class="col-md-5 col-12">
                            <form action="model/signinModel.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dirección Email</label>
                                    <input name="username" type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">Tu dirección Email está segura
                                        con nosotros</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contraseña</label>
                                    <input name="password" type="password" class="form-control"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="container-fluid text-center">
                                    <button type="submit"
                                        class="btn btn-light btn-curved btn-purple px-5 py-2 primary-btn text-white btn-large">Iniciar
                                        Sesión</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>

</html>