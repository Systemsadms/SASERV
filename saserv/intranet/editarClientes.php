<?php
	session_start();
	if ($_SESSION['admin'] == 'saadmin')
		{
			include ("cnx.php");					
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>SaServ-Tecnico</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style2.css">
	<link rel="stylesheet" type="text/css" media="all" href="style/mediastyle2.css">
	<script src="style/ventanas.js"></script>

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
<div style="background-color: rgba(000, 0, 0, 0.5); width: 100%; display: inline-block; vertical-align: top; padding-left: 80px; color:white; text-align: center; margin-bottom: 15px;">CLIENTES

	<div>
		<a href="clientes.php"><img src="img/arrowWhite.png" width="30px;" height="30px;" ></a>
	</div>

</div>
<!-------------------------------FIN DE BARRA TITULO Y FILTRO-------------------------------->









<div style="margin-left: 80px; text-align: center; padding-top: 50px;">



<!-------------------------------FUNCION EDITAR DE CLIENTES-------------------------------->
<?php



if(isset($_POST['estatus'])){

	
	$idAdmin=$_POST['idAdmin'];
	$estatus2=$_POST['estatus'];
	

			if($estatus2=='Confirmar'){

					
					require ("cnx.php");
							
							
				            $consulta = "UPDATE usuarios SET 
				            estatus='confirmado'
				                WHERE id='$idAdmin'";     
				            $hacerconsulta = mysql_query ($consulta);


							echo "<font color='white' style='margin-top:20px; margin-bottom:20px; color:red;'>
							  EL USUARIO HA SIDO CONFIRMADO
							</font>";


			}elseif($estatus2=='Desactivar'){		
					

						require ("cnx.php");
							
				            $consulta = "UPDATE usuarios SET 
				            estatus='noConfirmado'
				                WHERE id='$idAdmin'";     
				            $hacerconsulta = mysql_query ($consulta);


							echo "<font color='white' style='margin-top:20px; margin-bottom:20px; color:red;'>
							  EL TECNICO ESPECIALISTA ESTA INACTIVO
							</font>";
			}
}
		

if(isset($_POST['editar']))
			{

					
					$idAdmin 		= $_POST['idAdmin'];
					$nombres		=$_POST['nombres'];
					$apellidos 		=$_POST['apellidos'];													
					$email			=$_POST['email'];
					$pass			=$_POST['pass'];
					$ci	 			=$_POST['ci'];
					$fechaRegistro	=$_POST['fechaRegistro'];
					$telefono 		=$_POST['telefono'];
					$celular		=$_POST['celular'];
					$pais 			=$_POST['pais'];												
					$estado	 		=$_POST['estado'];	
					$ciudad	 		=$_POST['ciudad'];
					$dir	 		=$_POST['dir'];
					$zipCode		=$_POST['zipCode'];
					$encargado		=$_POST['encargado'];
					$cargo			=$_POST['cargo'];
					
			
												
										require ("cnx.php"); 
		                                $consulta = "UPDATE usuarios SET 
		                                nombres='$nombres',
		                                apellidos='$apellidos',
		                                email='$email',
		                                pass='$pass',
		                                rif='$ci',
		                                fecha='$fechaRegistro',
		                                telefono = '$telefono',
		                                celular='$celular',
		                                pais='$pais',
		                                estado='$estado',
		                                ciudad='$ciudad',
		                                dir='$dir',
		                                zipcode='$zipCode',
		                                encargado='$encargado',
		                                cargo='$cargo'	                                

		                                WHERE id='$idAdmin'";     
		                                $hacerconsulta = mysql_query ($consulta);


										echo "<font color='white' style='margin-top:20px; margin-bottom:20px; color:red;'>
											Los Datos del Cliente Fueron Administrados con exito
										</font>";

									

										
									
			}
							
?>



</div>

<!-------------------------------FIN DE FUNCION EDITAR REGISTRO DE ADMIN-------------------------------->




















<!-------------------------------FORMULARIO EDITAR DE ADMIN-------------------------------->

<div style=" width: auto; height: auto; margin-bottom:50px; background-color: rgba(000, 0, 0, 0.5); text-align: center; padding:10px 0 0 10px; margin-top: -50px;" id="nuevoRegistro" >


<?php

require ("cnx.php");

$idAdmin = $_POST['idAdmin'];



$ssql 		= mysql_query("SELECT * FROM usuarios WHERE id='$idAdmin'");


			$tipo	= mysql_result($ssql,0,"tipo");

				if($tipo=='1'){
					$tipoCliente='Persona Natural';
				}elseif($tipo=='2'){
					$tipoCliente='Empresa';
				}


			$zipCode		= mysql_result($ssql,0,"zipcode");
			$encargado		= mysql_result($ssql,0,"encargado");
			$cargo			= mysql_result($ssql,0,"cargo");
			$fechaRegistro	= mysql_result($ssql,0,"fecha");
			$nombres	= mysql_result($ssql,0,"nombres");	
			$apellidos	= mysql_result($ssql,0,"apellidos");
			$email		= mysql_result($ssql,0,"email");			
			$pass		= mysql_result($ssql,0,"pass");
			$ci			= mysql_result($ssql,0,"rif");
			$telefono	= mysql_result($ssql,0,"telefono");
			$celular	= mysql_result($ssql,0,"celular");
			$pais		= mysql_result($ssql,0,"pais");
			$estado		= mysql_result($ssql,0,"estado");
			$ciudad		= mysql_result($ssql,0,"ciudad");
			$dir		= mysql_result($ssql,0,"dir");
			$estatus	= mysql_result($ssql,0,"estatus");

?>





<label style="color:white;">Estatus : <font color="red"><?php echo " ".$estatus;?></font></label><br>

			
<form method="post" action="#">		
		<?php
			if($estatus=="confirmado")
				{		
					
					echo "<input type='hidden' name='idAdmin' class='boton' value='".$idAdmin."' />";
					echo "<input type='submit' name='estatus' class='boton' value='Desactivar' style='width:100px;'/>";
				}elseif($estatus=="noConfirmado")
					{
								echo "<input type='hidden' name='idAdmin' class='boton' value='".$idAdmin."' />";
								echo "<input type='submit' name='estatus' class='boton' value='Confirmar' style='width:100px;'/>";
					}

		?>	
</form>

<br>

<form method="post" action="#">
		<div style="display: inline-block; background-color: none; vertical-align: top; color: white">
		<label>Tipo de Cliente:</label><br>
		<input type="text" name="tipo" class="campoText" value="<?php echo $tipoCliente ?>"></input><br>
		<label>Nombres:</label><br>
		<input type="text" name="nombres" class="campoText" value="<?php echo $nombres ?>"></input><br>
		<label>Apellidos:</label><br>
		<input type="text" name="apellidos" class="campoText" value="<?php echo $apellidos ?>"></input><br>
		<label>Email:</label><br>
		<input type="text" name="email" class="campoText" value="<?php echo $email ?>"></input><br>
		<label>Password:</label><br>
		<input type="text" name="pass" class="campoText" value="<?php echo $pass ?>"></input><br>
		<label>Rif/NiT/Ci:</label><br>
		<input type="text" name="ci" class="campoText" value="<?php echo $ci ?>"></input><br>
		<label>Fecha de Registro:</label><br>				
		<input type="text" name="fechaRegistro" value="<?php echo $fechaRegistro ?>" class="campoText"></input><br>
		<label>Telefono:</label><br>
		<input type="text" name="telefono" class="campoText" value="<?php echo $telefono ?>"></input><br>
		<label>Celular:</label><br>
		<input type="text" name="celular" class="campoText" value="<?php echo $celular ?>"></input><br>
		</div>
		<div style="display: inline-block; background-color: none; vertical-align: top; color: white">

		<label>Pais:</label><br>
		<input type="text" name="pais" class="campoText" value="<?php echo $pais ?>"></input>	<br>
		<label>Estado:</label><br>
		<input type="text" name="estado" class="campoText" value="<?php echo $estado ?>"></input>	<br>
		<label>Ciudad:</label><br>
		<input type="text" name="ciudad" class="campoText" value="<?php echo $ciudad ?>"></input><br>
		<label>Direccion:</label><br>
		<input type="text" name="dir" class="campoText" value="<?php echo $dir ?>"></input><br>

		<label>Zip Code:</label><br>
		<input type="text" name="zipCode" class="campoText" value="<?php echo $zipCode ?>"></input><br>	

		<label>Encargado:</label><br>
		<input type="text"  name="encargado" id="dato" class="campoText" value="<?php echo $encargado ?>"><br>
						
		<label>Cargo:</label><br>
		<input type="text" name="cargo" id="dato" class="campoText" value="<?php echo $cargo ?>"><br>			
						          
		</div>

		<input type="hidden" name="idAdmin" value="<?php echo $idAdmin; ?>">

		<div style="margin-top: 20px;">	
		<input type="submit" name="editar" value="ACTUALIZAR DATOS" style="width: 220px;  height: 30px; border-radius: 3px; cursor:pointer; margin-bottom: 20px;"></input>
		</div>
		
		

</form>

<!-------------------------------FIN FORMULARIO EDITAR DE ADMIN-------------------------------->

















































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