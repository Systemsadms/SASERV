<?php
  session_start();
  if ($_SESSION['administrador'])
    {
      include ("../cnx.php");          
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Systems Admins</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" media="all" href="style/mediastyle.css">


</head>
<body>
<div id="ticketsYFacturas">
	<a href="index.php"><div id="tickets"><strong>Tickets</strong></div>
	<a href="#"><div id="facturas"><strong>Pagos</strong></div>
	<a href="../destruir.php"><div id="salir"></div></a>
</div>




<h3 style="text-align: center;">Tickets Por Facturar</h3>




<div style="width: 50%; background-color: none; float: left; text-align: center;">
	<h4>Tickets Facturados</h4>
<?php
require("../cnx.php");
$email= $_SESSION['administrador'];

 $ssql = mysql_query("SELECT * FROM administradores WHERE email='$email'");
          $nombres    =  mysql_result($ssql,0,"nombres");
          $apellidos    =  mysql_result($ssql,0,"apellidos");

$admin = $nombres." ".$apellidos;

				
				$ssql = "SELECT * FROM tickets WHERE admin='$admin' AND estatus='Por Facturar'";
				$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{

				$consulta = "SELECT * FROM tickets WHERE admin='$admin' AND estatus='Por Facturar';";
				$hacerconsulta=mysql_query ($consulta,$conexion);

				echo "<table width='95%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:90%; color:#000'>";
				echo "<tr>";
				echo "<td align='center' class='letratitulo'>Ticket</td>";
				echo "<td align='center' class='letratitulo'>Fecha</td>";
				echo "<td align='center' class='letratitulo'>Area</td>";
				echo "<td align='center' class='letratitulo'>Asunto</td>";
				echo "<td align='center' class='letratitulo'>Estatus</td>";


				echo "</tr>";
				$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);				
				while ($reg)
				{
				echo "<tr>";
				echo "<td align='center' bgcolor='#CCCCCC'>".$reg[0]."</td>";
				echo "<td align='center' bgcolor='#CCCCCC'>".$reg[3]."</td>";
				echo "<td align='center' bgcolor='#CCCCCC'>".$reg[4]."</td>";
				echo "<td align='center' bgcolor='#CCCCCC'>".$reg[5]."</td>";						
				echo "<td align='center' bgcolor='#CCCCCC'>".$reg[7]."</td>";
				
				
				
				$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
				echo "</tr>";
				}
				echo "</table>";
				mysql_close($conexion);

			}
			else
			{
				echo "No Hay Nuevos tickets o seguimientos por revisar";
			}
?>

</div>



<div style="width: 50%; background-color: none; float: left; text-align: center;">
	<h4>Pagos Abonados</h4>


	<?php
	require("../cnx.php");
					$nick          = $_SESSION["administrador"]; 
			        $ssql 		   = mysql_query("SELECT * FROM administradores WHERE email='$nick'");
			        $nombres       =  mysql_result($ssql,0,"nombres");
			        $apellidos     =  mysql_result($ssql,0,"apellidos");
			        $hacerconsulta =mysql_query ($consulta,$conexion); 
					$admin 		   =$nombres." ".$apellidos;	


		
							$ssql = "SELECT * FROM pagosadmins WHERE admin='$admin'";
							$rs = mysql_query($ssql,$conexion);			
							if (mysql_num_rows($rs)>0)
							{
 							$consulta = "SELECT * FROM pagosadmins WHERE admin='$admin';";
							$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b>IdPago</b></td>";

							echo "<td align='center' bgcolor='#58ACFA'><b>Ticket</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Fecha</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Banco</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Medio</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Descripcion</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";							
							echo "</tr>";
							
							
							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							
							while ($reg)
							{
							echo "<tr>";
							echo "<td align='center'>".$reg[0]."</td>";
		
							echo "<td align='center'>".$reg[2]."</td>";
							echo "<td align='center'>".$reg[3]."</td>";
							echo "<td align='center'>".$reg[4]."</td>";
							echo "<td align='center'>".$reg[5]."</td>";				
							echo "<td align='center'>".$reg[6]."</td>";
							echo "<td align='center'>".$reg[7]."</td>";
							echo "<td align='center'>".$reg[8]."</td>";


							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);


					}else
					{
						echo "No hay Pagos solicitados";
					}

	?>
</div>














</body>
</html>
<?php     
  }else 
  {     
    session_destroy();    
    header("location:../index.php"); 
  }
?>  