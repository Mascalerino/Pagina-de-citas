<?php
include_once "modelos/usuario.php";
?>

<!-- INICIO Fixed navbar -->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Consulta de Citas</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a>Bienvenido <?php echo $_SESSION['usuario']->email?></a></li>
                    <a class="navbar-brand" href="index.php">Ver Citas</a>
                    <li class="dropdown-danger" ><a onclick="cerrarSesion()">Cerrar Sesión</a></li>
                </ul>
            </div>
        </nav>
        <!-- FIN Fixed navbar -->