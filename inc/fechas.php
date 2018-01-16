<?php
// Definese secuencia para salto de lнсa.
  define ("salto","\n<br>\n");
/* Determinase se existe unha variable de formulario (POST) ca data en curso da axenda.
Se existe, a variable de memoria da data axustase ao contido da do formulario
(proceda de onde proceda). Se non existe, tomase a data do sistema.*/
  if (isset($_POST["fechaEnCurso"])){
	  $fechaEnCurso=$_POST["fechaEnCurso"];
  } else {
	  $fechaEnCurso=date("Y-m-d");
  }
/* A partir da variable de memoria ca data en curso, obtense o ano, o mes e o dia. */
  $annioActual=substr($fechaEnCurso,0,4);
  $mesActual=substr($fechaEnCurso,5,2);
  $diaActual=substr($fechaEnCurso,8);
?>