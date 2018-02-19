<?php


class Citas 
{
	var $idMedico;
	var $idCita;
	var $fecha;
	var $asunto;

	function __construct($idMedico,$idCita,$fecha,$asunto)
	{
		$this->idMedico=$idMedico;
		$this->idCita=$idCita;
		$this->fecha=$fecha;
		$this->asunto=$asunto;
	}

	function conectarBD(){
		mysql_connect("localhost","root","") or die ('No se pudo conectar: '.mysql_error());
		mysql_select_db("citas_bd") or die ('No se pudo seleccionar la base de datos');
	}

	function consultaBD($consulta){
		$resultado = mysql_query($consulta);
		if(!$resultado){
			echo 'MySql Error: '.mysql_error();
			exit;
		}
		return $resultado;
	}

	function registrarCita()//inserta un cita en la bd
	{
	 	Citas::conectarBD();

	 	$sql="SELECT * FROM citas WHERE idMedico= '".$this->idMedico."' AND fecha='".$this->fecha."'";
	 	$resultado = Citas::consultaBD($sql);
	 	$row=mysql_num_rows($resultado);
	 	
	 	if($row==0){
	 		$sql1="INSERT INTO citas (idMedico,idCita,fecha,asunto) VALUES ('$this->idMedico', '$this->idCita', '$this->fecha', '$this->asunto')";
	 		$resultado=$this->consultaBD($sql1);
	 		echo "Cita registrada";
			header("Location:../addCita.php?add=good");	
	 	}else{
	 		echo "Cita duplicada";
	 		header("Location:../addCita.php?add=bad");	
	 	}
			
	}

	function mostrarCitas(){

		Citas::conectarBD();
		
		
		$sql = "SELECT * FROM citas ORDER BY idMedico,fecha ASC";
		$result = Citas::consultaBD($sql);

		while ($tuplas = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$toRet[$tuplas["idCita"]] = $tuplas;
		}

		return $toRet;


	}

	function mostrarCita($idCita){
		Citas::conectarBD();
		$sql="SELECT * FROM citas WHERE idCita= '".$idCita."'";
		$resultado=Citas::consultaBD($sql);
		$toRet=mysql_fetch_array($resultado, MYSQL_ASSOC);
		return $toRet;
	}
	
}
?>