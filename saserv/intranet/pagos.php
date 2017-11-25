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
	<script src="style/ventanas.js"></script>

<style type="text/css">
	
.dark{
	background-color: rgba(000, 0, 0, 0.5);
}
</style>

</head>


<body>






<!-------------------------------ASIDE BOTONES-------------------------------->
<?php
	require ("asideBotones.php");
?>
<!-------------------------------FIN ASIDE BOTONES-------------------------------->






<!-------------------------------BARRA TITULO Y FILTRO-------------------------------->
<div style="background-color: rgba(000, 0, 0, 0.5); width: 100%; display: inline-block; vertical-align: top; padding-left: 80px; color:white; text-align: center;">PAGOS



		<div id="filtroUsuarios" style="margin-top: 10px;">
			<form method="post" action="#">
				<div style="display: inline-block;">
					<label>Buscar por:</label>
					<select name="filtro" id="filtro">				
						<option>ID</option>
						<option>Realizados</option>
						<option>Recibidos</option>
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

			<div>
<a href="#" onclick="Asignar()">
			<div class="boton3" style="width: 250px;"><img src="img/cliente.png" width="20px" height="20px"><br>Reportar Pagos Tecnicos</div>
		</a>
</div>

</div>
<!-------------------------------FIN DE BARRA TITULO Y FILTRO-------------------------------->


<div style="margin-left: 80px; text-align: center; padding-top: 50px;">






<div style="margin-left:10px; width: auto; background-color:none; color: white" >

	




<!--------------------------------------------CARGAR PAGO TECNICOS---------------------------------------->
<?php

if(isset($_POST['submit']))
			{

													
				$admin 		=$_POST['admin'];								
				$fecha 		= $_POST['fecha']; 
				$banco 		=$_POST['banco'];
				$medio 		=$_POST['medio'];
				$monto 		=$_POST['monto'].$_POST['moneda'];				
				$comentario =$_POST['comentario'];
				$ticket 	=$_POST['ticket'];
				echo $referencia	=$_POST['referencia'];
				$estatus	='Pagado';


				if(empty($ticket)){
					$ticket2 = "No Aplica";
				}else{
					$ticket2 =$ticket;
				}

								

				require ("../cnx.php");
				mysql_query ("INSERT INTO pagosadmins VALUES 
				('', '$admin','$ticket2','$fecha','$banco','$medio','$referencia', '$monto','$comentario','$estatus')");
				mysql_close ($conexion);

				echo "<br><br>";
				echo "<font color='red'>El pago al Tecnico ha sido reportado con Exito</font>";
				echo "<br><br>";
			
								

			}

?>
<!----------------------------------------FIN DE CARGA DE PAGOS TECNICOS-------------------------------------------->













<!--------------------------------------------FORMULARIO REPORTAR PAGOS DE TECNICOS-------------------------------------------->

<div id="reportarPago" class="hidden" style="text-align: center; width: 100%; background-color: none; margin:0 auto ;">



<form action="#" method="post" id="crearNuevoT" style="text-align: center; background-color: rgba(000, 0, 0, 0.5); width: 450px; margin:0 auto; padding: 20px;">
		<h4>Pagar Ticket a</h4>







		<?php
$consulta_mysql='select * from administradores where estatus="Activo"';
      $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);  
?>

			<font color="white">Admin:</font><br>

			<?php
                      echo "<select name='admin' style='height:30px; margin-bottom:15px;'>";
                  
                    
                                        
                      while($fila=mysql_fetch_array($resultado_consulta_mysql))
                      {                       
                          echo "<option>".$fila['idAdmin']." ".$fila['nombres']." ".$fila['apellidos']."</option>";
                      }
                    echo "</select>";
                    ?>


            <div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label id="validarFecha">Ticket de Servicio Nº:</label><br>
				<input type="text" name="ticket" size="4" value="" style="width: 100px; height: 30px;">		
			</div>


			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label id="validarFecha">Fecha:</label><br>
				<input type="text" name="fecha" size="4" placeholder="dd-mm-yy" style="width: 100px; height: 30px;">		
			</div>
			<br>

			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label>Banco..........Medio</label><br>
				<select name="banco" style="width: 100px; height: 30px;">
					<option>Banesco</option>
 					<option>Mercantil</option>
                    <option>PayPal</option>
				</select>	
				<select name="medio" style="width: 100px; height: 30px;">
					<option>Deposito</option>
 					<option>Transferencia</option>
				</select>		
			</div>
			<br>


						<br>
				<label id="validarMonto">Nº Referencia</label><br>
				<input type="text" name="referencia" style="width: 200px; height: 30px;">
				<br>


			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label id="validarMonto">Monto - 10%</label><br>
				<input type="text" name="monto" size="3" style="width: 100px; height: 30px;">
				<select name="moneda" style="width: 100px; height: 30px;">
					<option>BsF</option>
 					<option>$(usd)</option>
				</select>	
			</div>

				
			
			<div style="background-color: none; width: 100%;  display: inline-block; margin-top: 10px;">
				<label id="validarComentario">Descripcion:</label><br>
				<textarea name="comentario" style="width: 210px; height: 60px;"></textarea>	
			</div>
			<br>
			
			
			<br>
			<div style="background-color: none; width: 100%;  display: inline-block; margin-top: 10px;">
				<!--<input type="button" name="crearTicket" value="CREAR TICKET" onclick="validarCampos()">-->
				<input type="hidden" name="idPago" value="<?php echo $id; ?>">
				<input type="hidden" name="administrador" value="<?php echo $administrador; ?>">
				<input type="submit" name="submit" value="Enviar">
				<!--<a href="javascript: validarCampos()" name="test">REPORTAR PAGO</a>-->
			</div>
		</form>


</div>
<!--------------------------------------------FORMULARIO REPORTAR PAGOS DE TECNICOS-------------------------------------------->
<?php










/*******************************************LISTA DE PAGOS REALIZADOS A CLIENTES***************************************************/


require("cnx.php");
					$ssql = "SELECT * FROM pagosadmins WHERE estatus='Pagado'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
 						$consulta = "SELECT * FROM pagosadmins WHERE estatus='Pagado';";
						$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='0' bordercolor='#3ADF00' align='center' width='100%'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>ID</b></font></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Tecnico</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Transaccion</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Fecha</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Ticket</b></td>";

							echo "<td align='center' style='border: inset 0pt;'></td>";
							echo "</tr>";
							
							
							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							
							while ($reg)
							{
							echo "<tr>";
							echo "<td align='center' class='dark'>".$reg[0]."</td>";
							echo "<td align='center' class='dark'>".$reg[1]."</td>";
							echo "<td align='center' class='dark'>".$reg[7]." / ".$reg[5].""."Nº:"." ".$reg[6]." / ".$reg[3]."</td>";
							echo "<td align='center' class='dark'>".$reg[3]."</td>";
							echo "<td align='center' class='dark'>".$reg[2]."</td>";


							/*
							echo "<td class='dark' align='center' style='border: inset 0pt'>				
								<form action='usuarios.php' method='post'>			
									<input type='hidden' name='id' value=".$reg[0].">
									<input type='image' name='imageField' src='img/configurar.jpg' />
								</form>				
							</td>";//FIN DEL echo
							*/


							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);


					}else
					{
						echo "No hay registros por confirmar";
					}

/*******************************************FIN DE LISTA DE PAGOS REALIZADOS A CLIENTES*********************************************/





/*******************************************LISTA DE PAGOS REALIZADOS A CLIENTES***************************************************/
echo "<br><br><br>";
echo "PAGOS REPORTADOS POR CLIENTES";
require("cnx.php");
					$ssql = "SELECT * FROM pagos WHERE estatus='Confirmado'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
 						$consulta = "SELECT * FROM pagos WHERE estatus='Confirmado';";
						$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='0' bordercolor='#3ADF00' align='center' width='100%'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>ID</b></font></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Tecnico</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Transaccion</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Fecha</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Ticket</b></td>";

							echo "<td align='center' style='border: inset 0pt;'></td>";
							echo "</tr>";
							
							
							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							
							while ($reg)
							{
							echo "<tr>";
							echo "<td align='center' class='dark'>".$reg[0]."</td>";
							echo "<td align='center' class='dark'>".$reg[1]."</td>";
							echo "<td align='center' class='dark'>".$reg[7]." / ".$reg[5].""."Nº:"." ".$reg[6]." / ".$reg[3]."</td>";
							echo "<td align='center' class='dark'>".$reg[3]."</td>";
							echo "<td align='center' class='dark'>".$reg[2]."</td>";


							/*
							echo "<td class='dark' align='center' style='border: inset 0pt'>				
								<form action='usuarios.php' method='post'>			
									<input type='hidden' name='id' value=".$reg[0].">
									<input type='image' name='imageField' src='img/configurar.jpg' />
								</form>				
							</td>";//FIN DEL echo
							*/


							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);


					}else
					{
						echo "No hay registros por confirmar";
					}

/*******************************************FIN DE LISTA DE PAGOS REALIZADOS A CLIENTES*********************************************/
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





 

<script>
function validarCampos(){

    var text=document.forms['crearNuevoT'].id.value.length;

    var text2=document.forms['crearNuevoT'].enunciado.value.length;

    var text3=document.forms['crearNuevoT'].monto.value.length;

    var text4=document.forms['crearNuevoT'].vence.value.length;

    var text5=document.forms['crearNuevoT'].mensaje.value.length;

    if(text==0) {
        document.forms['crearNuevoT'].id.focus();   
        document.getElementById("validarId").innerHTML = "*ID*";
        document.getElementById("validarId").style.color = "white";
        return false;
    }
    else if(text2==0) 
    {
        document.forms['crearNuevoT'].enunciado.focus();   
        document.getElementById("validarEnunciado").innerHTML = "*Enunciado*";
        document.getElementById("validarEnunciado").style.color = "white";
        return false;
    }
    else if(text3==0) 
    {
        document.forms['crearNuevoT'].monto.focus();   
        document.getElementById("validarMonto").innerHTML = "*Monto*";
        document.getElementById("validarMonto").style.color = "white";
        return false;
    }
    else if(text4==0) 
    {
        document.forms['crearNuevoT'].vence.focus();   
        document.getElementById("validarVence").innerHTML = "*Vence*";
        document.getElementById("validarVence").style.color = "white";
        return false;
    }
    else if(text5==0) 
    {
        document.forms['crearNuevoT'].mensaje.focus();   
        document.getElementById("validarDescripcion").innerHTML = "*Descripcion*";
        document.getElementById("validarDescripcion").style.color = "white";
        return false;
    }
    else
    {
    	document.forms['crearNuevoP'].submit();
    }

}

</script>





</body>
</html>



<?php			
	}else	
	{			
		session_destroy();		
		header("location:index.php");	
	}
?>	