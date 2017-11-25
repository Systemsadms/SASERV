<?php
	session_start();
	if ($_SESSION['admin'] == 'saadmin')
		{
			include ("cnx.php");					
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>SystemsAdmins C.A</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style2.css">
	<link rel="stylesheet" type="text/css" media="all" href="style/mediastyle2.css">

<style type="text/css">
	
.dark{
	background-color: rgba(000, 0, 0, 0.5);
}
</style>

</head>


<body>







<?php
	require ("asideBotones.php");
?>






<!-------------------------------BARRA TITULO Y FILTRO-------------------------------->
<div style="background-color: rgba(000, 0, 0, 0.5); width: 100%; display: inline-block; vertical-align: top; padding-left: 80px; color:white; text-align: center;">CLIENTES



		<div id="filtroUsuarios" style="margin-top: 10px;">
			<form method="post" action="#">
				<div style="display: inline-block;">
					<label>Buscar por:</label>
					<select name="filtro" id="filtro">				
						<option>ID</option>
						<option>Nombres</option>
						<option>Confirmados </option>
						<option>No Confirmados</option>
						<option>Pais</option>
					</select>
				</div>
				<div style="display: inline-block;">
					<label class="margen">ID:</label>
					<input name="dato" type="text" id="dato" size="1" />
				</div>
				<div style="display: inline-block;">
					<input name="buscar" type="submit" id="dato" value="Buscar"/>
				</div>
				</form>					
			</div>

</div>
<!-------------------------------FIN DE BARRA TITULO Y FILTRO-------------------------------->


<div style="margin-left: 80px; text-align: center; padding-top: 50px;">






<div style="margin-left:10px; width: auto; background-color:none; color: white">

	




<?php


require("../cnx.php");
					/*$ssql = "SELECT * FROM usuarios WHERE estatus='noConfirmado'";*/
					$ssql = "SELECT * FROM usuarios";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
 						$consulta = "SELECT * FROM usuarios;";
						$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='0' bordercolor='#3ADF00' align='center' width='100%'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>ID</b></font></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Tipo</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Nombres</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Contacto</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Pais</b></td>";
							echo "<td align='center' style='border: inset 0pt;'></td>";
							echo "</tr>";
							
							
							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							
							while ($reg)
							{
							echo "<tr>";
							echo "<td align='center' class='dark'>".$reg[0]."</td>";
							echo "<td align='center' class='dark'>".$reg[1]."</td>";
							echo "<td align='center' class='dark'>".$reg[2]." ".$reg[3]."</td>";
							echo "<td align='center' class='dark'>".$reg[5]." "."/"." ".$reg[7]." "."/"." ".$reg[8]."</td>";
							echo "<td align='center' class='dark'>".$reg[9]."</td>";


							echo "<td class='dark' align='center' style='border: inset 0pt'>				
								<form action='editarClientes.php' method='post'>			
									<input type='hidden' name='idAdmin' value=".$reg[0].">
									<input type='image' name='imageField' src='img/configurar.jpg' />
								</form>				
							</td>";//FIN DEL echo
							


							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);


					}else
					{
						echo "No hay registros por confirmar";
					}



?>



</div>




<br><br><br>























<?php

/*
require("../cnx.php");
					$ssql = "SELECT * FROM usuarios WHERE estatus='noConfirmado'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
 						$consulta = "SELECT * FROM usuarios WHERE estatus='noConfirmado';";
						$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Tipo</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Email</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Encargado</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Cargo</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
							echo "<td align='center' style='border: inset 0pt;'></td>";
							echo "</tr>";
							
							
							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							
							while ($reg)
							{
							echo "<tr>";
							echo "<td align='center'>".$reg[0]."</td>";
							echo "<td align='center'>".$reg[1]."</td>";
							echo "<td align='center'>".$reg[2]."</td>";
							echo "<td align='center'>".$reg[3]."</td>";
							echo "<td align='center'>".$reg[5]."</td>";
							echo "<td align='center'>".$reg[7]."</td>";				
							echo "<td align='center'>".$reg[8]."</td>";
							echo "<td align='center'>".$reg[9]."</td>";
							echo "<td align='center'>".$reg[14]."</td>";
							echo "<td align='center'>".$reg[15]."</td>";
							echo "<td align='center'>".$reg[18]."</td>";
							echo "<td align='center' style='border: inset 0pt'>				
								<form action='usuarios.php' method='post'>								
									<input type='hidden' name='id' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
							</td>";//FIN DEL echo
							


							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);


					}else
					{
						echo "No hay registros por confirmar";
					}


*/
?>
</div>








</body>
</html>



<?php			
	}else	
	{			
		session_destroy();		
		header("location:index.php");	
	}
?>	