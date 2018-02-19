<?php

include "../modelos/citas.php";
include "../modelos/medico.php";

session_start();

$accion = $_REQUEST['accion'];
if($accion == "add"){

	$idMedico = $_SESSION['medico']->idMedico;
	$asunto = $_REQUEST['asunto'];
	$dia = $_REQUEST['dia'];
	$mes = $_REQUEST['mes'];
	$anho = $_REQUEST['anho'];
	$hora = $_REQUEST['hora'];
	$minuto = $_REQUEST['minuto'];

	$fecha=$anho."-".$mes."-".$dia." ".$hora.":".$minuto.":00";

	
	$cita = new Citas($idMedico,"",$fecha,$asunto);
	$cita->registrarCita();
} else { 

}
?> 