<?php


	$nick = $_SESSION["administrador"];	
	require ("../cnx.php");

	$ssql = mysql_query("SELECT * FROM administradores WHERE email='$nick'");
    $idAdmin  	=  mysql_result($ssql,0,"idAdmin");  
	$nombres 	=  mysql_result($ssql,0,"nombres");	
	$apellidos 	=  mysql_result($ssql,0,"apellidos");	
	$ci 		=  mysql_result($ssql,0,"ci");
	$email 		=  mysql_result($ssql,0,"email");	
	$pass 		=  mysql_result($ssql,0,"pass");
	$telefono 	=  mysql_result($ssql,0,"telefono");
	$celular 	=  mysql_result($ssql,0,"celular");
	$pais 		=  mysql_result($ssql,0,"pais");
	$estado 	=  mysql_result($ssql,0,"estado");
	$ciudad 	=  mysql_result($ssql,0,"ciudad");
	$dir 		=  mysql_result($ssql,0,"dir");
	$especialidad1 	=  mysql_result($ssql,0,"especialidad1");
	$especialidad2 	=  mysql_result($ssql,0,"especialidad2");

	

	mysql_close($conexion);

?>