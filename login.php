<?php
//session_start();
$res = null;
if (isset($_GET['nouser'])) {
    $res = $_GET['nouser'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- INICIO CABECERA -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
        <title>Login TFC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="style.css" rel="stylesheet" />
        <script type="text/javascript" src="js/jssor.slider.min.js"></script>
        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
        <script src="js/alertify/lib/alertify.min.js"> </script>
        <script type="text/javascript" src="js/general.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
        <link href="style.css" rel="stylesheet" />
        <link rel="icon" href="/img/logo2.ico" sizes="16x16">
        <link href="style/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="col-md-offset-4 navbar-header">
                <a class="navbar-brand" href="login.php">
                    <span>Página de inicio de sesión. Aplicación sencilla de citas</span>
                </a>
            </div>
        </nav>
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-signin" method="post" action="controladoras/register.php">
                    <div class="col-md-12">
                        <p>
                            <label for="email">Email</label>
                            <input type="text" class="form-control registro" placeholder="Introduce tu email" name="nombreUsuario" required/>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p>
                            <label>Contraseña</label>
                            <input type="password" placeholder="Introduce tu contraseña" class="form-control registro" name="pass" />
                        </p>
                    </div>
                    <div class="col-md-offset-2 col-md-6">
                        <button type="submit" class="btn btn-success btn-lg"> Iniciar Sesión </button>
                    </div>
                    <?php if($res == 1) echo "<p><a href=noregister.php></a></p>"; ?>    
                </form>
            </div>
        </div>
        <footer class="text-center">
            <span><i>Copyright 2017.</i></span>
        </footer>
    </div>
</body>
</html>
