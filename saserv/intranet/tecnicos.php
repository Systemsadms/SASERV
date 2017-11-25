<?php
	session_start();
	if ($_SESSION['admin'] == 'saadmin')
		{
			include ("cnx.php");					
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Sa-Admins</title>
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
<div style="background-color: rgba(000, 0, 0, 0.5); width: 100%; display: inline-block; vertical-align: top; padding-left: 80px; color:white; text-align: center;">TECNICOS



		<div id="filtroUsuarios" style="margin-top: 10px;">
			<form method="post" action="#">
				<div style="display: inline-block;">
					<label>Buscar por:</label>
					<select name="filtro" id="filtro">				
						<option>ID</option>
						<option>Sin Asignar</option>
						<option>Asignados</option>
						<option>Abiertos</option>
						<option>Por Facturar</option>						
						<option>Facturados</option>
						<option>Cerrados</option>
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

		<a href="#" onclick="registrar()">
           <div class="boton3" style="width: 120px; margin-bottom: 20px;"><img src="img/cliente.png" width="20px" height="20px"><br>Agregar Tecnico</div>
          </a>

</div>
<!-------------------------------FIN DE BARRA TITULO Y FILTRO-------------------------------->


<div style="margin-left: 80px; text-align: center; padding-top: 50px;">



<!--
	<div>
		<a href="home2.php"><img src="img/arrowWhite.png" width="30px;" height="30px;" ></a>
	</div>





-->






<!-------------------------------FORMULARIO REGISTRO DE ADMIN-------------------------------->

<div style=" width: auto; height: auto; margin-bottom:50px; background-color: rgba(000, 0, 0, 0.5); text-align: center; padding:10px 0 0 10px; margin-top: -50px;" id="nuevoRegistro" class="hidden">




<form method="post" action="#">

		<div style="display: inline-block; background-color: none; vertical-align: top; color: white">
		<label>Nombres:</label><br>
		<input type="text" name="nombres" class="campoText"></input><br>
		<label>Apellidos:</label><br>
		<input type="text" name="apellidos" class="campoText"></input><br>
		<label>Email:</label><br>
		<input type="text" name="email" class="campoText"></input><br>
		<label>Password:</label><br>
		<input type="text" name="pass" class="campoText"></input><br>
		<label>Cedula:</label><br>
		<input type="text" name="ci" class="campoText"></input><br>
		<label>Fecha de Naciento:</label><br>
		

		
		<input type="text" name="fechaNacimiento" placeholder="dd-mm-yy" class="campoText"></input><br>
		<label>Telefono:</label><br>
		<input type="text" name="telefono" class="campoText"></input><br>
		<label>Celular:</label><br>
		<input type="text" name="celular" class="campoText"></input><br>
		</div>
		<div style="display: inline-block; background-color: none; vertical-align: top; color: white">

		<label>Pais:</label><br>
		<input type="text" name="pais" class="campoText"></input>	<br>
		<label>Estado:</label><br>
		<input type="text" name="estado" class="campoText"></input>	<br>
		<label>Ciudad:</label><br>
		<input type="text" name="ciudad" class="campoText"></input><br>
		<label>Direccion:</label><br>
		<input type="text" name="dir" class="campoText"></input><br>	
		<label>Especialidad1:</label><br>
		<select name="especialidad1" id="dato" class="campoText">	
						<option>Soporte</option>
	                    <option>Redes</option>
	                    <option>Telefono</option>
	                    <option>Desarrollo Web</option>
	                    <option>Diseno Grafico</option>
	                    <option>Backend</option>
	                    <option>Frontend</option> 
	                    <option>Social Marketing</option>
	                    <option>Programador</option>					
	 					<option>Programador Movil</option>	                                       
	                    <option>Base de Datos</option>                   
		</select><br>
		<label>Especialidad2:</label><br>
		<select name="especialidad2" id="dato" class="campoText">			
						<option>Soporte</option>
	                    <option>Redes</option>
	                    <option>Telefono</option>
	                    <option>Desarrollo Web</option>
	                    <option>Diseno Grafico</option>
	                    <option>Backend</option>
	                    <option>Frontend</option> 
	                    <option>Social Marketing</option>
	                    <option>Programador</option>					
	 					<option>Programador Movil</option>	                                       
	                    <option>Base de Datos</option>                   
		</select><br>
		<label>Descripcion:</label><br>
		<textarea name="descripcion" style="width: 300px; height:100px; border-radius: 5px;"></textarea><br><br>
		</div>

		<div style="margin-top: 20px;">	
		<input type="submit" name="registrar" value="REGISTRAR TECNICO" style="width: 220px;  height: 30px; border-radius: 3px; cursor:pointer; margin-bottom: 20px;"></input>
		</div>
		
		

</form>














<?php
if(isset($_POST['registrar']))
			{

			

					$email =$_POST['email'];

		

						require("cnx.php");
						$ssql = "SELECT * FROM administradores WHERE email='$email'";
						$rs = mysql_query($ssql,$conexion);			
								if (mysql_num_rows($rs)>"0")
									{

										echo "<br><br>";
										echo "<font color='red'>*Ya existen administradores registrados con este email*</font>";
										
									}else
									{
										
										$nombres		=$_POST['nombres'];
										$apellidos 		=$_POST['apellidos'];													
										$email			=$_POST['email'];
										$pass			=$_POST['pass'];
										$ci	 			=$_POST['ci'];
										$fecha	 		=$_POST['fechaNacimiento'];
										$telefono 		=$_POST['telefono'];
										$celular		=$_POST['celular'];
										$pais 			=$_POST['pais'];												
										$estado	 		=$_POST['estado'];	
										$ciudad	 		=$_POST['ciudad'];
										$dir	 		=$_POST['dir'];
										$especialidad1	=$_POST['especialidad1'];
										$especialidad2	=$_POST['especialidad2'];
										$descripcion	=$_POST['descripcion'];
										$estatus	 	="Activo";
	
					
														
										mysql_query ("INSERT INTO administradores VALUES 
										('', '$email','$pass','$nombres','$apellidos','$ci','$fecha','$telefono','$celular','$pais','$estado','$ciudad','$dir','$especialidad1','$especialidad2','$descripcion','$estatus')");										
										mysql_close ($conexion);	

										echo "<br><br>";
										echo "<font color='white'>El nuevo administrador ha sido registrado con exito</font>";
										echo "<br><br>";
										echo "<a href='index.php'>ACTUALIZAR</a>";

										
									}	
			}					
?>

















</div>

<!-------------------------------FIN DE FORMULARIO DE REGISTRO DE ADMIN-------------------------------->



























<div style="margin-left:10px; width: auto; background-color:none; color: white">






<?php


require("../cnx.php");
					$ssql = "SELECT * FROM administradores WHERE estatus='Activo'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
 						$consulta = "SELECT * FROM administradores WHERE estatus='Activo';";
						$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='0' bordercolor='#3ADF00' align='center' width='100%'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>ID</b></font></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Nombres</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Contacto</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Pais</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Especialidades</b></td>";
							echo "<td align='center' style='border: inset 0pt;'></td>";
							echo "</tr>";
							
							
							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							
							while ($reg)
							{
							echo "<tr>";
							echo "<td align='center' class='dark'>".$reg[0]."</td>";
							echo "<td align='center' class='dark'>".$reg[3]." ".$reg[4]."</td>";
							echo "<td align='center' class='dark'>".$reg[7]." "."/"." ".$reg[8]."</td>";
							echo "<td align='center' class='dark'>".$reg[9]." / ".$reg[10]."</td>";
							echo "<td align='center' class='dark'>".$reg[13]." / ".$reg[14]."</td>";


							echo "<td class='dark' align='center' style='border: inset 0pt'>				
								<form action='editarTecnicos.php' method='post'>			
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