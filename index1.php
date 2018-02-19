<?php

include_once "modelos/medico.php";

session_start();

if(isset($_SESSION['medico']->email)){
    

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Consulta de Citas</title>

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

        
        <!-- INICIO Fixed navbar -->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Consulta de Citas</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a>Bienvenido <?php echo $_SESSION['medico']->nombre?></a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Editar Perfil</a></li>
                        <li><a href="login.php">Cerrar Sesión</a></li>
                    </ul>
                </li>
                </ul>
            </div>
        </nav>
        <!-- FIN Fixed navbar -->


        
        <!-- INICIO container-fluid -->
        <div class="container-fluid">
            
            <!-- INICIO row -->
            <div class="row">

                
                <!-- INICIO Columna de calendario -->
                <div id="calendario" class="col-xs-12 col-md-8">
                    
                </div>
                <!-- FIN Columna de calendario -->
                

                
                <!-- INICIO Lista de citas -->
                <div id="listaCitas" class="col-xs-6 col-md-4">
                    <div class="form-group">
                        <a href="addCita.php" class="btn btn-danger btn-lg" role="button" aria-disabled="true"><span class="glyphicon glyphicon-plus"></span>Añadir Cita</a>
                    </div>
                    <div id="listadoCitas">
                        <div id="cita" class="cajaCita">
                            <p class="cita"><strong>Cita día 02/02/2018 12:00</strong></p>
                            <p class="cita">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
                        </div>
                        <div id="cita" class="cajaCita">
                            <p class="cita"><strong>Cita día 02/02/2018 12:00</strong></p>
                            <p class="cita">Texto de prueba</p>
                        </div>
                        <div id="cita" class="cajaCita">
                            <p class="cita"><strong>Cita día 02/02/2018 12:00</strong></p>
                            <p class="cita">Texto de prueba</p>
                        </div>
                        <div id="cita" class="cajaCita">
                            <p class="cita"><strong>Cita día 02/02/2018 12:00</strong></p>
                            <p class="cita">Texto de prueba</p>
                        </div>
                    </div>
                </div>
                <!-- FIN Lista de Citas -->     
            </div>
            <!-- FIN row -->
        </div>
        <!-- FIN container-fluid -->


        <footer class="text-center">
            <span><i>Copyright 2017.</i></span>
        </footer>

        <!-- Javascript -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/moments.js"></script> 
        <script src="js/combodate.js"></script> 
    
    </body>

</html>

<?php 
}
else {  
    header("Location: noregistro.php");
}
?>

