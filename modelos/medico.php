<?php


class Medico {


	var $idMedico;
	var $nombre;
	var $email;
	var $password;

	function __construct($idMedico,$nombre,$email,$password){
		$this->idMedico=$idMedico;
		$this->nombre=$nombre;
		$this->email=$email;
		$this->password=$password;
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


	function getObjetoUsuario($email){
		mysql_connect("localhost","root","") or die ('No se pudo conectar: '.mysql_error());
		mysql_select_db("citas_bd") or die ('No se pudo seleccionar la base de datos');
		$sql="SELECT * FROM medico WHERE email = '".$email."'";
		$resultado= mysql_query($sql);
		$row=mysql_num_rows($resultado);
		if($row==1){
			$row=mysql_fetch_array($resultado);
			return new Medico($row['idMedico'],$row['nombre'],$row['email'],$row['password']);
		}else{
			echo "El medico no se encuentra registrado.";
		}
	}

	function loguearUsuario(){
		$this->conectarBD();
		$sql="SELECT * FROM medico WHERE email = '".$this->email."' AND password = '".$this->password."'";
		$resultado=$this->consultaBD($sql);
		$row=mysql_num_rows($resultado);
		if($row==1){
			$row=mysql_fetch_array($resultado);
			session_start();
			$_SESSION['medico'] = Medico::getObjetoUsuario($this->email);
			if (!(isset($_SESSION['medico']->email))) {
				echo "error";
			} else{
				header("Location: ../index.php");
			}
		} else {
			header("Location: ../noregistro.php");
		}
	}

	function registrarMedico(){
		Medico::conectarBD();

		$sql="SELECT * FROM medico WHERE email= '".$this->email."'";

		$resultado = Medico::consultaBD($sql);
	 	$row=mysql_num_rows($resultado);

	 	if($row==0){
			$sql="INSERT INTO medico(idMedico, nombre, email, password) VALUES ('','".$this->nombre."','".$this->email."','".$this->password."')";
			$this->consultaBD($sql);

			header("Location:../login.php");
		}else{
			header("Location:../registro.php");
		}
	}
	
}

?>