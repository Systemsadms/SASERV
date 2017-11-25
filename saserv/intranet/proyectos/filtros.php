<?php

if(isset($_POST['crear']))
{
	?>
	<hr>
		
			
		<form action="#" method="post" id="crearNuevoP" style="text-align: center; background-color: grey; width: 100%; margin:0 auto; padding: 20px;">
		<h4>Nuevo Proyecto</h4>
		
			<div style="background-color: none; width: 250px; display: inline-block; text-align: center;">
				<label>Cliente:</label>	
				<?php 
						require ("../cnx.php");
						$consulta_mysql='select * from usuarios where estatus="confirmado"';
						$resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
						echo "<select name='cliente'>";
							?>
								<!--<option>Systems Admins</option>-->
							<?php											
							while($fila=mysql_fetch_array($resultado_consulta_mysql))
							{												
								echo "<option>"."(".$fila['id'].")".$fila['nombres']." ".$fila['apellidos']."</option>";
							}
							echo "</select>";
					?>
			</div>

			<div style="background-color: none; width:80px; display: inline-block; text-align: center; margin-top: 10px;">
				<label id="validarId">ID:</label>
				<input type="text" name="id" size="2"></input>
				
			</div>


			<div style="background-color: none; width: 250px; display: inline-block; margin-top: 10px; text-align: center;">
				<label>Area:</label>
				<select name="area">										
						<option>Dominios</option>
	                    <option>Hosting</option>
	                    <option>Desarrollo Web</option>
	                    <option>Diseno Grafico</option>
	                    <option>Social</option>					
	 					<option>Sistemas</option>
	                    <option>Redes</option>
	                    <option>Soporte</option>                    
	                    <option>CCTV</option>             
                    
				</select>		
			</div>
			
			
			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label id="validarEnunciado">Enunciado:</label>
				<input type="text" name="enunciado">		
			</div>
			<br>

			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label id="validarMonto">Monto:</label>
				<input type="text" name="monto" size="3">
				<select name="moneda">
					<option>BsF</option>
                    <option>$(usd)</option>
                 </select>		
			</div>
			<br>


			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label>Pagos:</label>
				<select name="pagos">
					<option>Pago Unico</option>   
					<option>Mensual</option>
					<option>Bimensual</option>
                    <option>Trimestral</option>
                    <option>Semestral</option>
                    <option>Anual</option>                                    
                 </select>		
			</div>
			<br>
				
			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label id="validarVence">Vence:</label>
				<input type="text" name="vence" placeholder="dd-mm-aa" size="6">		
			</div>
			<br>
			
			<div style="background-color: none; width: 100%;  display: inline-block; margin-top: 10px;">
				<label id="validarDescripcion">Descripcion:</label>		
			</div>
			<br>
			<textarea name="mensaje"></textarea>
			
			<br>
			<div style="background-color: none; width: 100%;  display: inline-block; margin-top: 10px;">
				<!--<input type="button" name="crearTicket" value="CREAR TICKET" onclick="validarCampos()">-->
				<a href="javascript: validarCampos()">CARGAR NUEVO PROYECTO</a>
			</div>
		</form>
	<hr>
	<?php
}

/*******************************************************************************************************/

	if(isset ($_POST["buscar"]))
			{
				
				$filtro	= $_POST['filtro'];
				$dato	= $_POST['dato'];
				require("../cnx.php");






if ($_POST["filtro"]=="ID" and $dato=="Todos")
				{
									

				echo "<br><br>";
				echo "FILTRADO POR ID";


						$consulta = "SELECT * FROM proyectos;";
						$hacerconsulta=mysql_query ($consulta,$conexion);	
				
									
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Proyecto</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>cliente</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Area</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Enunciado</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";		
						echo "<td align='center' bgcolor='#58ACFA'><b>Pagos</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Inicio</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Vence</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[2]."</td>";
						echo "<td align='center'>".$reg[1]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";
						echo "<td align='center'>".$reg[5]."</td>";
						echo "<td align='center'>".$reg[8]."</td>";
						echo "<td align='center'>".$reg[6]."</td>";
						echo "<td align='center'>".$reg[9]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='proyectos.php' method='post'>								
									<input type='hidden' name='idProyecto' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);

				
				}		

			elseif ($_POST["filtro"]=="ID")
				{
							
					echo "<br><br>";
					echo "Proyectos en Area:" . $dato;

					$ssql = "SELECT * FROM proyectos WHERE area='$dato'";
					$rs = mysql_query($ssql,$conexion);			
						if (mysql_num_rows($rs)>0)
						{

							$consulta = "SELECT * FROM proyectos WHERE area='$dato';";
							$hacerconsulta=mysql_query ($consulta,$conexion);	
					
										
							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Proyecto</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>cliente</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Area</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Enunciado</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";		
							echo "<td align='center' bgcolor='#58ACFA'><b>Pagos</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Inicio</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Vence</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
							echo "<td align='center' style='border: inset 0pt'></td>";
							echo "</tr>";
							
							
							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							
							while ($reg)
							{
							echo "<tr>";
							echo "<td align='center'>".$reg[0]."</td>";
							echo "<td align='center'>".$reg[2]."</td>";
							echo "<td align='center'>".$reg[1]."</td>";
							echo "<td align='center'>".$reg[3]."</td>";
							echo "<td align='center'>".$reg[4]."</td>";
							echo "<td align='center'>".$reg[5]."</td>";
							echo "<td align='center'>".$reg[8]."</td>";
							echo "<td align='center'>".$reg[6]."</td>";
							echo "<td align='center'>".$reg[9]."</td>";
							echo "<td align='center' style='border: inset 0pt'>				
									<form action='proyectos.php' method='post'>								
										<input type='hidden' name='idProyecto' value=".$reg[0].">
										<input type='submit' name='ver' value='Abrir'>
									</form>				
							</td>";//FIN DEL echo

							
							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);
						}
						else
						{
							echo "<br><br>";
							echo "No hay Proyectos en esta area";
						}
				
				}
				elseif ($filtro!="ID" and $dato=="Todos")
				{



						echo "<br><br>";
						echo "Proyectos en Area:" . $dato;

						$ssql = "SELECT * FROM proyectos WHERE estatus='$filtro'";
						$rs = mysql_query($ssql,$conexion);			
						if (mysql_num_rows($rs)>0)
						{

						
						$consulta = "SELECT * FROM proyectos WHERE estatus='$filtro';";
						$hacerconsulta=mysql_query ($consulta,$conexion);	
				
									
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Proyecto</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>cliente</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Area</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Enunciado</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";		
						echo "<td align='center' bgcolor='#58ACFA'><b>Pagos</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Inicio</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Vence</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[2]."</td>";
						echo "<td align='center'>".$reg[1]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";
						echo "<td align='center'>".$reg[5]."</td>";
						echo "<td align='center'>".$reg[8]."</td>";
						echo "<td align='center'>".$reg[6]."</td>";
						echo "<td align='center'>".$reg[9]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='proyectos.php' method='post'>								
									<input type='hidden' name='idProyecto' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);
					}
					else
					{
						echo "<br><br>";
						echo "No hay Proyectos con este Estatus";
					}
				
				}
				elseif ($filtro!="ID" and $dato!="Todos")
				{



						echo "<br><br>";
						echo "Proyectos en Area:" . $dato;

						$ssql = "SELECT * FROM proyectos WHERE estatus='$filtro' AND area='$dato'";
						$rs = mysql_query($ssql,$conexion);			
						if (mysql_num_rows($rs)>0)
						{

						
						$consulta = "SELECT * FROM proyectos WHERE estatus='$filtro' AND area='$dato';";
						$hacerconsulta=mysql_query ($consulta,$conexion);	
				
									
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Proyecto</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>cliente</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Area</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Enunciado</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";		
						echo "<td align='center' bgcolor='#58ACFA'><b>Pagos</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Inicio</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Vence</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[2]."</td>";
						echo "<td align='center'>".$reg[1]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";
						echo "<td align='center'>".$reg[5]."</td>";
						echo "<td align='center'>".$reg[8]."</td>";
						echo "<td align='center'>".$reg[6]."</td>";
						echo "<td align='center'>".$reg[9]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='proyectos.php' method='post'>								
									<input type='hidden' name='idProyecto' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);
					}
					else
					{
						echo "<br><br>";
						echo "No hay Proyectos con este Estatus";
					}
				
				}		
				}
			else
				{
				echo "<br><br>";
				echo "<font color='#8A0829'>*Proyectos Vencidos*</font>";
				echo "<br><br>";


				$ssql = "SELECT * FROM proyectos WHERE estatus='Vencido'";
				$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
						 $consulta = "SELECT * FROM proyectos WHERE estatus='Vencido';";
						 $hacerconsulta=mysql_query ($consulta,$conexion);
						 //$hacerconsulta=mysql_query ($consulta,$conexion);
								
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Proyecto</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>cliente</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Area</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Enunciado</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";		
						echo "<td align='center' bgcolor='#58ACFA'><b>Pagos</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Inicio</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Vence</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[2]."</td>";
						echo "<td align='center'>".$reg[1]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";
						echo "<td align='center'>".$reg[5]."</td>";
						echo "<td align='center'>".$reg[8]."</td>";
						echo "<td align='center'>".$reg[6]."</td>";
						echo "<td align='center'>".$reg[9]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='proyectos.php' method='post'>								
									<input type='hidden' name='idProyecto' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);
					}
					else
					{
					echo "Todos los proyectos estan Activos";
					}


				
						

				


			}//FIn de If principal

