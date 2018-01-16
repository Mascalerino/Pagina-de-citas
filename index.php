<?php
session_start();
//echo "Bienvenido: ".$_SESSION['user']." ,pass: ".$_SESSION['login'];
if( ($_SESSION['user'] == "a@a.es") || ($_SESSION['user'] == "b@b.es")) {   
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="css/base.css"/>	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script language="javascript" type="text/javascript">
/* a seguinte funci�n de JavaScript env�a o formulario � p�xina que corresponda ao pulsar o bot�n. */
      function saltar(pagina){
        document.formularioCitasPrincipal.action=pagina;
		document.formularioCitasPrincipal.submit();
      }
/* Aqu� termina a funci�n de env�o do formulario. */
    </script>
	<title>Control Citas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<!--link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen"/-->
	<link rel="stylesheet" href="css/base.css"/>
</head>

<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand">
                <span>P&aacute;gina de inicio. Aplicaci&oacute;n sencilla de citas</span>
            </a>
        </div>
    </nav> 
<div class="panel panel-default">
  <div class="panel-body">
	<?php
		include ("inc/usarBD.php");
		include "inc/fechas.php";
		echo "Bienvenido: ".$_SESSION['user']." ,pass: ".$_SESSION['login'];

		$consulta="SELECT * FROM citas WHERE diacita='".$fechaEnCurso."' ORDER BY horacita;";

		$hacerConsulta=mysql_query($consulta, $conexion);
		/* determinase o n�mero de rexistros recuperados polo cursor, porque se � 0 o
		dese�o da p�xina (parte HTML) � diferente que se hai rexistros. */
		$numeroDeCitasDelDia=mysql_num_rows($hacerConsulta);
		echo "<br>";
		echo "Citas del d&iacute;a: ".$numeroDeCitasDelDia.salto;
		?>
		AGENDA DEL D&Iacute;A:
	<?php
		echo ($diaActual." del ".$mesActual." de ".$annioActual);
	?>
	<!-- O formulario non ten valor no par�metro action porque se lle
	asigna por unha funci�n javascript antes de envialo. A funci�n que se execute
	e, por tanto, o valor deste par�metro, depende do bot�n pulsado polo usuario.-->
    <form class="form-horizontal" action="" method="post" name="formularioCitasPrincipal" id="formularioCitasPrincipal">
	<!-- O seguinte campo oculto almacena a data en curso, obtida dende PHP.
	Este dato enviar�se a outros formularios e, a sua vez, recuperar�se dende a 
	p�xina de cambio de fecha actual. -->
      <input type="hidden" name="fechaEnCurso" id="fechaEnCurso" value="<?php echo($fechaEnCurso); ?>">
      <table width="500" border="0" cellspacing="0" cellpadding="0">
		<tr><th>CITAS</th></tr>
      </table>
      <hr>
      <?php
	/* comprobase se hai citas no cursor. Se � as�, debuxar�se unha
	taboa na que se mostrar�n as citas e uns botons de selecci�n. */
      if ($numeroDeCitasDelDia>0){
        echo ("<table width='500' border='0' cellspacing='0' cellpadding='0'>");
        while ($cita = mysql_fetch_array($hacerConsulta, MYSQL_ASSOC)) {
            echo ("<tr><td>".$cita["horacita"]."</td>");
            echo ("<td>".$cita["asuntocita"]."</td>");
			/* Cada cita ten asociado un bot�n de selecci�n por se o usuario quere
			modificala ou borrarla. O valor do bot�n � o identificativo da cita,
			de modo que se usar� nas correspondentes consultas de actualizaci�n ou
			eliminaci�n nas p�xinas que proceda.*/
            echo ("<td><input type='radio' id='citaSeleccionada' name='citaSeleccionada' value='".$cita["idcita"]."'>");
			echo ("<input name='borrarCita' type='button' id='borrarCita' value='Eliminar' onClick='javascript:saltar(\"eliminarCita.php\");'>");
            echo ("<input name='cambiarCita' type='button' id='cambiarCita' value='Modificar' onClick='javascript:saltar(\"cambiarCita.php\");'>".salto);
            echo ("</td></tr>");
        }
        echo ("</table>");
		/* Se existen citas mostrar�nse os botons de borrar e modificar. */
        //echo ("<input name='borrarCita' type='button' id='borrarCita' value='Eliminar Cita' onClick='javascript:saltar(\"eliminarCita.php\");'>".salto);
        //echo ("<input name='cambiarCita' type='button' id='cambiarCita' value='Modificar cita' onClick='javascript:saltar(\"cambiarCita.php\");'>".salto);
	}
	/* En todo caso mostrar�nse os botons de agregar cita e cambiar a fecha en curso. */
	echo ("<br/>");
    echo ("<input name='nuevaCita' type='button' id='nuevaCita' value='Agregar cita' onClick='javascript:saltar(\"agregarCita.php\");'>".salto);
    echo ("<input name='cambiarFecha' type='button' id='cambiarFecha' value='Otro d&iacute;a' onClick='javascript:saltar(\"cambiarFecha.php\");'>".salto);
    ?>
    </form>
	<p><a href="logout.php">Cerrar sesi&oacute;n</a></p>
  </div>
 </div>
<footer class="text-center">
    <span><i>Copyright 2017.</i></span>
</footer>
</div>
</body>
</html>
<?php 
}
else {  header("location: login.php");
}
?>