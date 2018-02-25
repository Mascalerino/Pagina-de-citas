<?php


class Usuario 
{
	
	var $idUsuario;
	var $email;
	var $pass;

	function __construct($idUsuario,$email,$pass)
	{
		$this->idUsuario=$idUsuario;
		$this->email=$email;
		$this->pass=$pass;
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


	function getObjetoUsuario($email){
		
		Usuario::conectarBD();

		$sql="SELECT * FROM usuario WHERE email = '".$email."'";
		$resultado= mysql_query($sql);
		$row=mysql_num_rows($resultado);

		if($row==1){
			$row=mysql_fetch_array($resultado);
			return new Usuario($row['idUsuario'],$row['email'],$row['pass']);
		}else{
			echo "El usuario no se encuentra registrado.";
		}
	}

	function loguearUsuario(){

		Usuario::conectarBD();

		$sql="SELECT * FROM usuario WHERE email = '".$this->email."' AND pass = '".$this->pass."'";
		$resultado=$this->consultaBD($sql);
		$row=mysql_num_rows($resultado);

		if($row==1){
			$row=mysql_fetch_array($resultado);
			session_start();
			$_SESSION['usuario'] = Usuario::getObjetoUsuario($this->email);
			if (!(isset($_SESSION['usuario']->email))) {
				echo "error";
			} else{
				header("Location: ../index.php");
			}
		} else {
			
			header("Location: ../noregistro.php");
		}
	}

	function registrarUsuario(){
		Usuario::conectarBD();

		$sql="SELECT * FROM usuario WHERE email= '".$this->email."'";

		$resultado = Usuario::consultaBD($sql);
	 	$row=mysql_num_rows($resultado);

	 	if($row==0){
			$sql="INSERT INTO usuario(idUsuario, email, pass) VALUES ('','".$this->email."','".$this->pass."')";
			$this->consultaBD($sql);

			header("Location:../login.php");
		}else{
			header("Location:../registro.php");
		}
	}
}






?>