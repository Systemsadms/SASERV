<?php


	$nick = $_SESSION["login"];	
	require ("cnx.php");

	$ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
    $idcliente  =  mysql_result($ssql,0,"id");  
	$tipo 		=  mysql_result($ssql,0,"tipo");
	$nombres 	=  mysql_result($ssql,0,"nombres");	
	$apellidos 	=  mysql_result($ssql,0,"apellidos");	
	$rif 		=  mysql_result($ssql,0,"rif");
	$email 		=  mysql_result($ssql,0,"email");	
	$pass 		=  mysql_result($ssql,0,"pass");
	$telefono 	=  mysql_result($ssql,0,"telefono");
	$celular 	=  mysql_result($ssql,0,"celular");
	$pais 		=  mysql_result($ssql,0,"pais");
	$estado 	=  mysql_result($ssql,0,"estado");
	$ciudad 	=  mysql_result($ssql,0,"ciudad");
	$dir 		=  mysql_result($ssql,0,"dir");
	$zipcode 	=  mysql_result($ssql,0,"zipcode");
	$encargado 	=  mysql_result($ssql,0,"encargado");
	$cargo 		=  mysql_result($ssql,0,"cargo");
	$como 		=  mysql_result($ssql,0,"como");
	

	mysql_close($conexion);

?>