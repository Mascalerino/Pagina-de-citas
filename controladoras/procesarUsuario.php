<?php

include "../modelos/medico.php";

$accion = $_REQUEST['accion'];
if($accion == "Entrar"){
	$email = $_REQUEST['email']; 
	$password = $_REQUEST['password'];
	$medico = new Medico("","",$email,$password);
	$medico->loguearUsuario();
} else { 
	if($accion=="Registrarse") { 

		$nombreMedico = $_REQUEST['nombre'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password']; 
		$medico = new Medico("",$nombreMedico,$email,$password);
		$medico->registrarMedico();

	} else {
		/**/
	}
}
?> 