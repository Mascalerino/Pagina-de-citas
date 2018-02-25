<?php


class Citas 
{
	var $idUsuario;
	var $idCita;
	var $fecha;
	var $asunto;

	function __construct($idUsuario,$idCita,$asunto,$fecha)
	{
		$this->idUsuario=$idUsuario;
		$this->idCita=$idCita;
		$this->asunto=$asunto;
		$this->fecha=$fecha;
	}

	function conectarBD(){
		mysql_connect("localhost","root","") or die ('No se pudo conectar: '.mysql_error());
		mysql_select_db("consultacitas") or die ('No se pudo seleccionar la base de datos');
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

	 	$sql="SELECT * FROM citas WHERE idUsuario= '".$this->idUsuario."' AND fecha='".$this->fecha."'";
	 	$resultado = Citas::consultaBD($sql);
	 	$row=mysql_num_rows($resultado);
	 
	 	if($row==0){
	 		$sql1="INSERT INTO citas (idUsuario,idCita,asunto,fecha) VALUES ('$this->idUsuario', '$this->idCita', '$this->asunto','$this->fecha')";
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
		
		
		$sql = "SELECT * FROM citas ORDER BY fecha ASC";
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
	
	function eliminarCita($idCita){
		Citas::conectarBD();
		$sql="DELETE FROM citas WHERE idCita ='".$idCita."'";
		return Citas::consultaBD($sql);

	}

	function modificarCita($idCita,$cita)
	{

		Citas::conectarBD();

		$sql="SELECT * FROM citas WHERE idCita='".$idCita."'";
		echo $sql;
		$resultado=Citas::consultaBD($sql);

		$original=mysql_fetch_array($resultado);

		$cita1=new Citas($original['idUsuario'],$original['idCita'],$original['asunto'],$original['fecha']);


		if($cita->idUsuario!=""){
			$cita1->idUsuario=$cita->idUsuario;
		}
		if($cita->idCita!=""){
			$cita1->idCita=$cita->idCita;
		}
		if($cita->asunto!=""){
			$cita1->asunto=$cita->asunto;
		}
		if($cita->fecha!=""){
			$cita1->fecha=$cita->fecha;
		}
		


		$sql2="UPDATE citas SET asunto ='$cita1->asunto', 
		fecha = '$cita1->fecha' WHERE idCita = $cita1->idCita";
		echo $sql2;
		header("Location:../index.php");
		return Citas::consultaBD($sql2);
	}
}
?>