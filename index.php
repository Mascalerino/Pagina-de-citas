<?php

include_once "modelos/medico.php";
include_once "modelos/citas.php";

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
                
                <!-- INICIO Lista de citas -->
                <div id="listaCitas" class="col-sm-6 col-sm-offset-3">
                    <div class="form-group">
                        <a href="addCita.php" class="btn btn-danger btn-lg" role="button" aria-disabled="true"><span class="glyphicon glyphicon-plus"></span> Añadir Cita</a>
                    </div>
                    <!-- INICIO Listado de citas -->
                    <div id="listadoCitas">
                        <?php
                            $arrayCitas=Citas::mostrarCitas();
                            foreach($arrayCitas as $panelCita){
                            echo '<div id="cita" class="cajaCita">';
                                echo '<div class="col-sm-9">';
                                echo "<p><b>Medico: </b>".$panelCita['idMedico']."</p>";
                                // echo "<p><b>Numero de Cita: </b>".$panelCita['idCita']."</p>";
                                echo "<p><b>Fecha: </b>".$panelCita['fecha']."</p>";
                                echo "<p><b>Asunto: </b>".$panelCita['asunto']."</p>";
                                echo '</div>';
                                echo '<div class="col-sm-3">';
                                ?>
                                    <a href="modficarCita.php" class="btn btn-primary btn-lg btn-block" role="button" aria-disabled="true"><span class="glyphicon glyphicon-edit"></span> Modificar Cita</a>
                                    <a href="modficarCita.php" class="btn btn-danger btn-lg btn-block" role="button" aria-disabled="true"><span class="glyphicon glyphicon-remove"></span> Eliminar Cita</a>
                                <?php
                                echo '</div>';
                            echo '</div>';
                          }
                        ?>
                    </div>
                    <!-- FIN Listado de citas -->
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

