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
</head>


<body>




<?php
	require ("asideBotones.php");
?>




<!-------------------------------BARRA TITULO Y FILTRO-------------------------------->
<div style="background-color: rgba(000, 0, 0, 0.5); width: 100%; display: inline-block; vertical-align: top; padding-left: 80px; color:white; text-align: center;">TICKETS DE SERVICIOS

	<div>
		<a href="home2.php"><img src="img/arrowWhite.png" width="30px;" height="30px;" ></a>
	</div>
	
</div>
<!-------------------------------FIN DE BARRA TITULO Y FILTRO-------------------------------->








<!-------------------------------CONSULTA DATOS DEL TICKET -------------------------------->
<div style="margin-left: 80px; text-align: center; padding-top: 50px;">
					<?php   

					if (isset($_POST["ticket"]))
					{
					          $ticket = $_POST["ticket"]; 
					               
					          require("../cnx.php");
					          $ssql = mysql_query("SELECT * FROM tickets WHERE ticket='$ticket'");            
					          $cliente    =  mysql_result($ssql,0,"cliente");
					          $hora       =  mysql_result($ssql,0,"hora");
					          $fecha      =  mysql_result($ssql,0,"fecha");
					          $area       =  mysql_result($ssql,0,"area");
					          $asunto     =  mysql_result($ssql,0,"asunto");
					          $mensaje    =  mysql_result($ssql,0,"mensaje");
					          $estatus    =  mysql_result($ssql,0,"estatus");
					          $seguimientos =  mysql_result($ssql,0,"seguimientos");
					          $admin 		=  mysql_result($ssql,0,"admin");

					         $ssql = mysql_query("SELECT * FROM usuarios WHERE id='$cliente'");            
					         $pais    =  mysql_result($ssql,0,"pais");
					         $estado  =  mysql_result($ssql,0,"estado");
					         $ciudad  =  mysql_result($ssql,0,"ciudad");
					         $dir     =  mysql_result($ssql,0,"dir");
					          
					//Script para resetear el rc(REVISADO POR EL CLIENTE) cuando se abre el ticket
					          $rs = "0";        
					          $consulta3 = "UPDATE tickets SET 
					          rs ='$rs' WHERE ticket=$ticket";
					          $hacerconsulta3 = mysql_query ($consulta3);



					          $ssql = mysql_query("SELECT * FROM usuarios WHERE id='$cliente'");
					          $nombres    =  mysql_result($ssql,0,"nombres");
					          $apellidos    =  mysql_result($ssql,0,"apellidos");
					          $clienteName = $nombres.$apellidos;

					}
					else
					{
					  ?>
					        <script type="text/javascript">
					        window.location="index.php";
					        </script>
					  <?php
					}

					?>
<!-------------------------------FIN CONSULTA DATOS DEL TICKET-------------------------------->					  
		










<!--------------------------------- BOTONES ASIGNAR, FACTURAR, CERRAR---------------------------------------->
<div>
		<a href="#" onclick="AsignarTicket()">
			<div class="boton3"><img src="img/cliente.png" width="20px" height="20px"><br>Asignar</div>
		</a>
		
		<a href="#" onclick="Facturar()">
			<div class="boton3"><img src="img/cliente.png" width="20px" height="20px"><br>Facturar</div>
		</a>
		
		<a href="#" onclick="EliminarTicket()">
			<div class="boton3"><img src="img/cliente.png" width="20px" height="20px"><br>Eliminar Ticket</div>
		</a>

			
</div>
<!--------------------------------- FIN BOTONES ASIGNAR, FACTURAR, CERRAR---------------------------------------->








<!---------------------------------  FUNCIONES POS---------------------------------------->

<?php
	require ("funcionesTicket.php");
?>

<!---------------------------------  FUNCIONES POS---------------------------------------->









<!---------------------------------DATOS DEL TICKET---------------------------------------->					                                   
					  
					<div style="margin: 50px 0 0 30px; text-align: center;">
					  <h3 style="color: #d24949;">Ticket de Servicio Nº: (<?php echo $ticket;?>)</h3>

					  <h4>Tipo de Servicio: <font color="#e0e0e0"><?php echo $area; ?></font></h4> 

					  <h4>Asunto de Servicio: <font color="#e0e0e0"><?php echo $asunto; ?></font></h4> 
					  
					  <h4>Descripción: <font color="#e0e0e0"><?php echo $mensaje; ?></font></h4>

					  <h4>Cliente: <font color="#e0e0e0"><?php echo $clienteName; ?></font></h4>

					  <h4>Asignado a: <font color="#e0e0e0"><?php echo $admin; ?></font></h4>
           
					</div>


<!---------------------------------FIN DATOS DEL TICKET---------------------------------------->










<!---------------------------------FORMULARIO NUEVO SEGUIMIENTO---------------------------------------->
					<div style="margin: 50px 0 0 30px; text-align: center;">
					<form action="#" method="post">                
					                    
					      <h3>Nuevo Seguimiento:</h3>                
					                        
					                                      
					  <?php
					  date_default_timezone_set('America/La_Paz');
					  $hora       = date("G:H:s");
					  $fecha      = date("j-n-y"); 
					  $seguimiento = $seguimientos+1;  
					 /*Aqui se obtiene ultimo id o numero de seguimiento para este ticket para sumarle uno y guardar en la tabla de seguimiento para referencia del nuevo seguimiento*/         
					  ?>
					                                                                 
					                            
					              <input type="hidden" name="ticket2" value="<?php echo $ticket; ?>"/>
					              <input type="hidden" name="cliente2" value="<?php echo $cliente; ?>"/>
					              <input type="hidden" name="seguimiento2" value="<?php echo $seguimiento; ?>"/>
					              <input type="hidden" name="fecha2" value="<?php echo $fecha; ?>"/>
					              <input type="hidden" name="hora2" value="<?php echo $hora; ?>"/>
					              <input type="hidden" name="ticket" value="<?php echo $ticket; ?>"/>
					              <textarea name="contenido2" id="textarea1" style="width: 80%; height: 50px;"></textarea><br>
					                                
					                           
					              <input class="btm_abrirTicket" type="submit" name="seguir" value="Reportar Seguimiento" style="margin-bottom: 50px; background-color:#63be33; color: white; width: 80%;" />
					              		
					             
					</form>
					</div>


<!---------------------------------  FIN DE FORMULARIO NUEVO SEGUIMIENTO---------------------------------------->















<!---------------------------------  SEGUIMIENTOS---------------------------------------->

					 <?php 
					          require ("../cnx.php");
					      
					        
					          $consulta = "SELECT * FROM seguimientos WHERE ticket='$ticket' ORDER BY $ticket DESC";
					  
					          $hacerconsulta=mysql_query ($consulta,$conexion);       
					          echo "<table width='95%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:90%; color:#000'>";
					          echo "<tr>";
					          /*echo "<td align='center' class='letratitulo'></td>";*/           
					          echo "</tr>";
					          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
					          while ($reg)
					          {
					          echo "<tr>";
					          echo "<td align='left' bgcolor='#CCCCCC'>".$reg[3]."<br><br><div style='text-align:right;'>".$reg[5]."<br>".$reg[6]."</div></td>";                  
					        
					        
					          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
					          echo "</tr>";
					          }
					          echo "</table>";
					          mysql_close($conexion);
					  ?>

</div>


<!---------------------------------  FIN DE SEGUIMIENTOS---------------------------------------->













<!--<script>
	function validarCierre(){
		var text=document.form['motivoCierre'].motivo.value.length;

		if(text==0){
			document.forms['motivoCierre'].motivo.focus();
			document.getElementById('labelMotivo').innerHTML ="POR FAVOR EXPLIQUE EL MOTIVO DEL CIERRE DEL TICKET";
			document.getElementById('labelMotivo').style.color="red";
		}
		else{
			documet.forms['motivoCierre'].submit();
		}
	}
</script>
-->


<!---------------------------------  VALIDACION DE FORMULARIO FACTURAR---------------------------------------->
<script>
function validarCampos(){

    var text=document.forms['crearNuevoT'].monto.value.length;

    var text2=document.forms['crearNuevoT'].emision.value.length;

    var text3=document.forms['crearNuevoT'].vence.value.length;

    if(text==0) {
        document.forms['crearNuevoT'].monto.focus();   
        document.getElementById("validarMonto").innerHTML = "*Monto*";
        document.getElementById("validarMonto").style.color = "white";
    }
    else if(text2==0) 
    {
        document.forms['crearNuevoT'].emision.focus();   
        document.getElementById("validarEmision").innerHTML = "*Emision*";
        document.getElementById("validarEmision").style.color = "white";
    }
    else if(text3==0) 
    {
        document.forms['crearNuevoT'].vence.focus();   
        document.getElementById("validarVence").innerHTML = "*Vence*";
        document.getElementById("validarVence").style.color = "white";
    }
    else
    {
    	document.forms['crearNuevoT'].submit();
    }

}
</script>



<!---------------------------------  VALIDACION DE FORMULARIO FACTURAR---------------------------------------->


</body>
</html>



<?php			
	}else	
	{			
		//session_destroy();		
		//header("location:index.php");	
	}
?>	