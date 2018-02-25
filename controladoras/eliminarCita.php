<?php

include_once "../modelos/citas.php";

		
		$idCita=$_GET["idCita"];
		echo $idCita;	
		$resultado = Citas::eliminarCita($idCita);
	

		header("Location: ../index.php");

?>
