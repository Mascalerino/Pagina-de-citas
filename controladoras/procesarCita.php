<?php

include "../modelos/citas.php";
include "../modelos/usuario.php";

session_start();

$accion = $_REQUEST['accion'];
if($accion == "add"){

	$idUsuario = $_SESSION['usuario']->idUsuario;
	$asunto = $_REQUEST['asunto'];
	$dia = $_REQUEST['dia'];
	$mes = $_REQUEST['mes'];
	$anho = $_REQUEST['anho'];
	$hora = $_REQUEST['hora'];
	$minuto = $_REQUEST['minuto'];

	$fecha=$anho."-".$mes."-".$dia." ".$hora.":".$minuto.":00";

	
	$cita = new Citas($idUsuario,"",$asunto,$fecha);
	$cita->registrarCita();
} else { 
	if($accion == "modificar"){

		$idUsuario = $_SESSION['usuario']->idUsuario;
		$idCita = $_REQUEST['idCita'];

		if(isset($_REQUEST['asunto'])){
			$asunto = $_REQUEST['asunto']; 
		}else{
			$asunto="";
		}
		if(isset($_REQUEST['dia'])){
			$dia = $_REQUEST['dia'];
		}else{
			$dia="";
		}
		if(isset($_REQUEST['mes'])){
			$mes = $_REQUEST['mes'];
		}else{
			$mes="";
		}
		if(isset($_REQUEST['anho'])){
			$anho = $_REQUEST['anho'];
		}else{
			$anho="";
		}
		if(isset($_REQUEST['hora'])){
			$hora = $_REQUEST['hora'];
		}else{
			$hora="";
		}
		if(isset($_REQUEST['minuto'])){
			$minuto = $_REQUEST['minuto'];
		}else{
			$minuto="";
		}


		$fecha=$anho."-".$mes."-".$dia." ".$hora.":".$minuto.":00";

		
		$cita = new Citas($idUsuario,$idCita,$asunto,$fecha);
		$cita->modificarCita($idCita,$cita);

	}else{
		
	}
}
?> 