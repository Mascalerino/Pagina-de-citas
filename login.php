<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Citas</title>

        <script src="js/alertify/lib/alertify.min.js"> </script>
        <script src="js/general.js"> </script>

        <link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
        <link rel="stylesheet" href="js/alertify/themes/alertify.bootstrap.css" />

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/form-elements.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
        <link rel="stylesheet" href="js/alertify/themes/alertify.bootstrap.css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Consulta de Citas</strong></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Inicia sesión</h3>
                            		<p>Introduce tu correo eléctronico y tu contraseña para acceder</p>
                        		</div>
                        		<div class="form-top-right">
                        			<span class="glyphicon glyphicon-log-in"></span>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="controladoras/procesarUsuario.php?accion=Entrar" method="POST" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-email">Correo Eléctronico</label>
			                        	<input type="text" name="email" placeholder="Correo Eléctronico" class="form-email form-control" id="form-email">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Contraseña</label>
			                        	<input type="password" name="pass" placeholder="Contraseña" class="form-password form-control" id="form-password">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="boton btn-danger btn-lg btn-block" value="Iniciar Sesión">
                                    </div>
                                    <div class="form-group">
                                        <a href="registro.php" class="boton btn-danger btn-lg btn-block" role="button" aria-disabled="true">¿No tienes cuenta? Regístrate</a>
                                    </div>                                     
                                </form>
                            </div>
		                </div>
                    </div>
                </div>

            </div>
        </div>
        <footer class="text-center">
            <span><i>Copyright 2017.</i></span>
        </footer>



        <!-- Javascript -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        <script src="js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
