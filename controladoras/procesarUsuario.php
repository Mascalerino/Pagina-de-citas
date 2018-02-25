<?php

include "../modelos/usuario.php";

$accion = $_REQUEST['accion'];
if($accion == "Entrar"){
	$email = $_REQUEST['email']; 
	$password = $_REQUEST['pass'];
	$usuario = new Usuario("",$email,$password);
	$usuario->loguearUsuario();
} else { 
	if($accion=="Registrarse") { 

		$email = $_REQUEST['email'];
		$password = $_REQUEST['pass']; 
		$usuario = new Usuario("",$email,$password);
		$usuario->registrarUsuario();

	} else {
		/**/
	}
}
?> 