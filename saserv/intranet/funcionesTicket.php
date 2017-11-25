
<!------------------------------------FUNCIONES ASIGNAR, FACTURAR y CERRAR TICKET------------------------------------------------------>


					<?php

								 
					if(isset($_POST['seguir']))
					 {

					  
					  $ticket3    = $_POST['ticket2'];
					  $cliente3   = $_POST['cliente2'];
					  $contenido3   = "<b>Operador:</b> ".$_POST['contenido2'];
					  $seguimiento3 = $_POST['seguimiento2'];
					  $fecha3     = $_POST['fecha2'];
					  $hora3      = $_POST['hora2'];
					  $admin      = "Analista Tecnico";  
					  
					  require("../cnx.php");
					  mysql_query ("INSERT INTO seguimientos VALUES 
					  ('', '$ticket3','$cliente3','$contenido3','$seguimiento3','$admin','$fecha3','$hora3')");
					       
					  $consulta = "UPDATE tickets SET 
					  seguimientos ='$seguimiento3' WHERE ticket=$ticket3";     
					  $hacerconsulta = mysql_query ($consulta);

					  
					  //Bloque de comando para incrementar el ra y rs cuando se realiza el seguimiento

					    $ssql = mysql_query("SELECT * FROM tickets WHERE ticket='$ticket3'");           
					    $ra  =  mysql_result($ssql,0,"ra");
					    $rs  =  mysql_result($ssql,0,"rs");
					    $rc  =  mysql_result($ssql,0,"rc");
					    $ranew = $ra+1;
					    $rsnew = $rs+1;
					    $rcnew = $rc+1;
					    
					    $consulta4 = "UPDATE tickets SET 
					    ra ='$ranew', rc='$rcnew', rs='$rsnew' WHERE ticket=$ticket3" ;
					    $hacerconsulta = mysql_query ($consulta4);
					    mysql_close($conexion);   
					  
					  ?>

					        <h2 style="color: green;">El nuevo seguimiento ha sido reportado con exito...</h2>

					  <?php
					  
					}

/*-------------------------BLOQUE DE GUARDADO DE SEGUIMIENTO, MENSAJE Y CORREO------------------------------------------*/
					/*
						elseif(isset($_POST['abrir']))
						{
							require ("../cnx.php");
							$ticket = $_POST['ticket'];

							$consultaUpdate = "UPDATE tickets  SET estatus='Abierto' WHERE ticket='$ticket'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
							?>
								<div id="cajaJs">
									<br>
									<font color="red">
										El Ticket se ha Abierto nuevamente.
									</font>
									<br><br>
								</div>
							<?php								
						}
					*/
						elseif(isset($_POST['cerrar']))
						{
							require ("../cnx.php");
							$ticket = $_POST['ticket'];
							$action = $_POST['cerrar'];

								if($action=='SI'){
									$consultaUpdate = "UPDATE tickets  SET estatus='Cerrado' WHERE ticket='$ticket'";	
									$hacerconsulta  = mysql_query ($consultaUpdate);
									?>
										<div id="cajaJs">
											<br>
											<font color="red">
												El Ticket se ha Cerrado.
											</font>
											<br><br>
										</div>
										<script type="text/javascript">
											setTimeout(function(){window.location='home2.php'},3000);
										</script>
									<?php
								}elseif($action=='Cancelar'){
									?>
										<script type="text/javascript">
								        window.location="home2.php";
								        </script>
									<?php
								}
															
						}
/*********************************************ASIGNACION DE TICKETS***************************************************/						
						elseif(isset($_POST['asignarTicket']))
						{
							require ("../cnx.php");
							$ticket = $_POST['ticket'];
							$admin 	= $_POST['admin'];
							$resultado = intval(preg_replace('/[^0-9]+/', '', $admin), 10); 


							
							$ssql 		= mysql_query("SELECT * FROM administradores WHERE idAdmin='$resultado'");			
							$emailAdmin	= mysql_result($ssql,0,"email");


							$ssql 		= mysql_query("SELECT * FROM tickets WHERE ticket='$ticket'");			
							$cliente	= mysql_result($ssql,0,"cliente");


							$ssql 		= mysql_query("SELECT * FROM usuarios WHERE id='$cliente'");			
							$nombres	= mysql_result($ssql,0,"nombres");
							$apellidos	= mysql_result($ssql,0,"apellidos");


							

							$consultaUpdate = "UPDATE tickets  SET admin='$admin' WHERE ticket='$ticket'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
							?>
								<div id="cajaJs">
									<br>
									<font color="red">
										El Ticket a sido Asignado a: <?php echo $admin?>
									</font>
									<br><br>
								</div>	
							<?php

				//------ENVIAR EMAIL DE NOTIFICACION DE SERVICIOS-------------   
      
      
      
							              $to = $emailAdmin;
							              $subject = 'Nuevo Ticket de Servicio Asignado';          
							              $from = 'info@mangaercode.com';
							              $headers = "From:" . $from; 
							              $message ='
							              

							              Se le ha asignado un nuevo ticket de servicios.


							              Por favor ingrese a su cuenta para gestionar la solicitud. 

							              En el caso de no poder brindar sus servicios, pongase en contacto con 

							              un administrador.
							              

							                  ';     
							                        
							              mail($to,$subject,$message,$headers);
							          
							                
							              echo "<br>";
							              echo "<h3 align='center' ><font color='green'>Se ha creado un nuevo ticket de Servicio. </font></h3>";

						}


						elseif(isset($_POST['cargarFactura']))///If se cargo una nueva factura
						{
							

						
							$extension= $_FILES["factura"]["type"];

							if($extension == "application/pdf")
								{

									$query= mysql_query("SELECT MAX(idFactura) AS id FROM facturas");
									 if ($row = mysql_fetch_row($query)) 
										{
									  		 $numFactura = trim($row[0]);
									  		 $numFactura++;
									 	}

									$archivoRecibido= $_FILES['factura']['tmp_name'];
									$destino="facturasPDF/" . $numFactura.".pdf";
									move_uploaded_file($archivoRecibido, $destino);

									$tipo 		= 'Servicio';
									$idTipo 	= $_POST['ticket'];
									$cliente 	= $_POST['cliente'];
									$emision	= $_POST['emision'];
									$vence 		= $_POST['vence'];
									$monto 		= $_POST['monto']." ".$_POST['moneda'];
									$control 	= $_POST['control'];
									$estatus 	= "Facturado";
									$asunto		=$_POST['asunto'];
									$mensaje	=$_POST['mensaje'];
									$pais		=$_POST['pais'];
									$estado		=$_POST['estado'];
									$ciudad		=$_POST['ciudad'];
									$direccion	=$_POST['direccion'];
									
								

									require ("../cnx.php");
									mysql_query ("INSERT INTO facturas VALUES 
										('', '$tipo','$idTipo','$cliente','$emision','$vence','$monto','$control','$estatus','$pais','$estado','$ciudad','$direccion','$asunto','$mensaje')");
									mysql_close ($conexion);

									$archivoRecibido= $_FILES['factura']['tmp_name'];
									$destino="../facturasPDF/" . $numFactura.".pdf";
									move_uploaded_file($archivoRecibido, $destino);


											require ("../cnx.php");	
											$consultaUpdate = "UPDATE tickets  SET estatus='Facturado' WHERE ticket='$ticket'";	
											$hacerconsulta  = mysql_query ($consultaUpdate);


									?>
										<div id="cajaJs">
										<br>
										<font color="green">						
												<b>La Factura ha sido Generada con Exito<b>
												<br><br>
												<a href="index.php">ACTUALIZAR</a>	 
										</font>
										</div>
									<?php

									

								}
							else
								{
									?>
										<div id="cajaJs">
										<br>
										<font color="red">
												<br><br>					
												<font color="red">El archivo cargado no es un Fromato Pdf o no se cargo ningun Archivo</font>
												
										</font>
										</div>
									<?php					
								}
								
							}









?>



<!---------------------------------------------------------------------------------------------------------------------------->





















<!------------------------------------------FORMULARIO ASIGANAR TIKET---------------------------------------------------->



<div id="asignar" class="hidden" style="background-color:none; text-align: center; width: 100%; color: white; padding-top: 40px;">
	

		<?php
			$consulta_mysql='select * from administradores where estatus="Activo"';
			$resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
		?>
								
									<form method="post" action="#">
										<label>Tecnicos:</label>

										<?php
											echo "<select name='admin' style='height:30px; margin-bottom:15px;'>";
										?>
											<option>Systems Admins</option>
										<?php											
											while($fila=mysql_fetch_array($resultado_consulta_mysql))
											{												
										    	echo "<option>".$fila['idAdmin']." ".$fila['nombres']." ".$fila['apellidos']."</option>";
											}
										echo "</select>";
										?>										
										
										<input type="hidden" name="ticket" value="<?php echo $ticket; ?>"></input>
										<input style="height: 30px; background-color: white; cursor: pointer;" type="submit" name="asignarTicket" value="Asignar Ticket"/>
									</form>

								
						
</div>

<!------------------------------------------FIN ASIGANAR TIKET---------------------------------------------------->
















<!------------------------------------------FORMULARIO FACTURAR TIKET-------------------------------------------------->



		

<div id="facturar" class="hidden" style="background-color:none; text-align: center; width: 100%;  padding-top: 40px; color:white;"> 
		<div id="facturar" class="hidden" style="text-align: right; padding-right: 20px; background-color: rgba(000, 0, 0, 0.5); width: 350px; display: inline-block; border-radius: 10px; padding-top: 30px; padding-bottom: 30px;">	
			
			<form method="post" action="#"  id="crearNuevoT" enctype="multipart/form-data">

							
								


								<label id="validarMonto">Monto:</label><br>
								<input type="text" name="monto" size="3" style="width: 100px; height: 30px;"></input>
								<select name="moneda" style="width: 100px; height: 30px;">
									<option >BsF</option>
									<option>$(usd)</option>
								</select><br>

								<label id="validarEmision" >Emision:</label><br>
								<input type="text" name="emision"  size="5" placeholder="dd-mm-yy" value="<?php echo $fecha;?>" style="width: 100px; height: 30px;"></input><br>

								<label id="validarVence">Vence:</label><br>
								<input type="text" name="vence" size="5" placeholder="dd-mm-yy" style="width: 100px; height: 30px;"></input><br>

								<label>N° Control:</label><br>
								<input type="text" name="control" placeholder="Opcional" size="4" style="width: 100px; height: 30px;"></input><br>
								
								<label>Factura PDF:</label><br>
								<input type="file" name="factura" id="factura" /><br><br>
								


								<input type="hidden" name="tipo"   value="<?php echo $tipo; ?>"></input>
								<!--<input type="hidden" name="idTipo" value="<?php echo $idServicio; ?>"></input>-->
								<input type="hidden" name="cliente" value="<?php echo $cliente; ?>"></input>
								<input type="hidden" name="cargarFactura" value="holamundo"></input>
								<input type="hidden" name="ticket" value="<?php echo $ticket; ?>"></input>
								<input type="hidden" name="asunto" value="<?php echo $asunto; ?>"></input>
								<input type="hidden" name="mensaje" value="<?php echo $mensaje; ?>"></input>

								<input type="hidden" name="pais" value="<?php echo $pais; ?>"></input>
								<input type="hidden" name="estado" value="<?php echo $estado; ?>"></input>
								<input type="hidden" name="ciudad" value="<?php echo $ciudad; ?>"></input>
								<input type="hidden" name="direccion" value="<?php echo $dir; ?>"></input>

							
								<!--<input type="submit" name="cargarFactura" class="boton2" value="Facturar Servicio"  />-->
								<a href="javascript: validarCampos()" name="test"><div style="width: 130px; height: 25px; border-radius:2px; padding-top:3px; padding-right:5px;  float: right;" class="boton3">Facturar Servicio</div></a>
										
							</form>

		</div>
	
</div>
<!------------------------------------------FIN FACTURAR TIKET---------------------------------------------------->








<!------------------------------------------FORMULARIO ELIMINTAR TIKET---------------------------------------------------->
<div id="cerrar" class="hidden" style="background-color:none; text-align: center; width: 100%;  padding-top: 40px; color:white;"> 

 Estas seguro que deseas Cerrar este ticket de Servicio, <br>No sera facturado ni almacenado como gestionado, sin embargo el ticket de servicio sera archivado. Podra reabrir el ticket si es necesario.

<form action="#" method="post" id="motivoCierre">
	<input type="hidden" name="ticket" value="<?php echo $ticket; ?>"></input>
	
	<!--<label id="labelMotivo">Motivo de Cierre del Ticket</label>
	<textarea name="motivo"></textarea><br>-->
 	<input type="submit" name="cerrar" value="SI" style="width: 70px; height: 30px;">
 	<input type="submit" name="cerrar" value="Cancelar" style="width: 70px; height: 30px;">
 	<!--<a href="javascript: validarCierre()" name="test">Cerrar</a>-->
</form>
 </div>
<!------------------------------------------FIN ELIMINTAR TIKET---------------------------------------------------->