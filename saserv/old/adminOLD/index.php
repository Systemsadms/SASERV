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

 <style type="text/css">

#modal 
  { 
  font-size:14px; 
  left:50%; 
  margin:-250px 0 0 -40%; 
  opacity: 0; 
  position:absolute; 
  top:-50%; visibility: 
  hidden; width:80%; 
  box-shadow:0 3px 7px rgba(0,0,0,.25); 
  box-sizing:border-box; transition: all 0.4s ease-in-out;
   -moz-transition: all 0.4s ease-in-out; 
   -webkit-transition: all 0.4s ease-in-out; 
   overflow:scroll; 
   } 

/* Make the modal appear when targeted */ 
#modal:target { opacity: 1; top:50%; visibility: visible; } 
#modal .header,#modal .footer { border-bottom: 1px solid #e7e7e7; border-radius: 5px 5px 0 0; } 
#modal .footer { border:none; border-top: 1px solid #e7e7e7; border-radius: 0 0 5px 5px; }
#modal h2 { margin:0; } 
#modal .btn { float:right; } 
#modal .copy,#modal .header, #modal .footer { padding:15px; } 
.modal-content { background: #f7f7f7; position: relative; z-index: 20; border-radius:5px; } 
#modal .copy { background: #fff; } 
#modal .overlay { background-color: #000; background: rgba(0,0,0,.5); height: 100%; left: 0; position: fixed; top: 0; width: 100%; z-index: 10; } 

 </style>



</head>
<body>




<div style="background-color: black; width: 100%; height: 100px;"> HOLA</div>





<div id="ticketsYFacturas">
	<a href="#"><div id="tickets"><strong>Tickets</strong></div>
	<a href="pagos.php"><div id="facturas"><strong>Pagos</strong></div>
	<a href="../destruir.php"><div id="salir"></div></a>
</div>




<h3 style="text-align: center;">Tickets Asignados</h3>








<?php
/*
 if(isset($_POST['cargarFactura']))
				{
					require("../cnx.php");
					$ticket = $_POST['ticket'];	

					$consulta8 = "UPDATE tickets SET 
					estatus ='Por Facturar' WHERE ticket=$ticket" ;
					$hacerconsulta8 = mysql_query ($consulta8);
									
					

					date_default_timezone_set('America/La_Paz');
					$fecha 	= date("j-n-y"); 

					$nick          = $_SESSION["administrador"]; 
			        $ssql 		   = mysql_query("SELECT * FROM administradores WHERE email='$nick'");
			        $nombres       =  mysql_result($ssql,0,"nombres");
			        $apellidos     =  mysql_result($ssql,0,"apellidos");
			        $email     	   =  mysql_result($ssql,0,"email");
			        $hacerconsulta =mysql_query ($consulta,$conexion); 
					$admin 		   =$email;								
					
					$banco 		="";
					$medio 		="";
					$monto 		=$_POST['monto'].$_POST['moneda'];				
					$comentario ="";				
					$estatus	="Solicitado";

					require ("../cnx.php");
					mysql_query ("INSERT INTO pagosadmins VALUES 
					('', '$admin','$ticket','$fecha','$banco','$medio','$monto','$comentario','$estatus')");
					mysql_close ($conexion);



					echo "<br>";
					echo "El ticket ha sido Facturado con exito"; 
					echo "<br>";
					echo "<br>";

				}
*/




/*
 if(isset($_POST['facturar']))
				{
					$ticket = $_POST['ticket'];
					?>
					<div style="text-align: center; background-color: green;">
					<br>
					<h5><font color="white">Coloque el Costo del Servicio</font></h5>
					<form method="post" action="#">
						<label>Monto:</label>
						<input type="text" name="monto" size="3"></input>
						<select name="moneda">
							<option>Bsf</option>
							<option>$(usd)</option>
						</select>
						<br>
						<br>
						<input type="hidden" name="ticket" value="<?php echo $ticket; ?>"></input>
						<input type="submit" value="Cargar Factura" name="cargarFactura"></input>
					</form>		
					<br>	
					</div>
					<br>
					<br>
					<?php					
				}

*/







require("../cnx.php");
$email= $_SESSION['administrador'];

 $ssql = mysql_query("SELECT * FROM administradores WHERE email='$email'");
          $nombres    =  mysql_result($ssql,0,"nombres");
          $apellidos    =  mysql_result($ssql,0,"apellidos");

$admin = $nombres." ".$apellidos;

				
				$ssql = "SELECT * FROM tickets WHERE admin='$admin' AND estatus='Abierto'";
				$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{

				$consulta = "SELECT * FROM tickets WHERE admin='$admin' AND estatus='Abierto';";
				$hacerconsulta=mysql_query ($consulta,$conexion);

				echo "<table width='95%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:90%; color:#000'>";
				echo "<tr>";
				echo "<td align='center' class='letratitulo'>Ticket</td>";
				echo "<td align='center' class='letratitulo'>Fecha</td>";
				echo "<td align='center' class='letratitulo'>Area</td>";
				echo "<td align='center' class='letratitulo'>Asunto</td>";
				echo "<td align='center' class='letratitulo'>Estatus</td>";
				echo "<td align='center' class='letratitulo'>Nuevos</td>";
				echo "<td align='center' class='letratitulo'></td>";
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
				
				if ($reg[9]>0)
					{
						echo "<td align='center' bgcolor='#CCCCCC'><font color='red'>".$reg[9]."</font></td>";
					}
					else
					{
						echo "<td align='center' bgcolor='#CCCCCC'><font color='green'>".$reg[9]."</font></td>";
					}
				
				echo "<td align='center' bgcolor='#CCCCCC'>				
				<form action='#modal' method='post'>
					<input type='hidden' name='cliente' value=".$reg[1].">
					<input type='hidden' name='ticket' value=".$reg[0].">
					<input type='submit' name='ver' value=' Ver Seguimiento'>
				</form>				
				</td>";
				echo "<td align='center' bgcolor='#CCCCCC'>				
				<form action='#' method='post'>					
					<input type='hidden' name='ticket' value=".$reg[0].">
					<input type='submit' name='facturar' value=' Facturar Ticket'>
				</form>				
				</td>";
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










<!---------------------------------BLOQUE DE GUARDADO DE SEGUIMIENTO, MENSAJE Y CORREO-------------------------------------------------------------->
<?php
 if(isset($_POST['seguir']))
 {
	require ("../cnx.php");
	$email= $_SESSION['administrador'];

 	$ssql = mysql_query("SELECT * FROM administradores WHERE email='$email'");
    $nombres    =  mysql_result($ssql,0,"nombres");
    $apellidos    =  mysql_result($ssql,0,"apellidos");
	$admin = $nombres." ".$apellidos;


	$ticket3 	 	= $_POST['ticket2'];
	$cliente3		= $_POST['cliente2'];
	$contenido3 	= "<b>ADMIN:</b> ".$_POST['contenido2'];
	$seguimiento3	= $_POST['seguimiento2'];
	$fecha3 	 	= $_POST['fecha2'];
	$hora3 			= $_POST['hora2'];	
	
		require("../cnx.php");
		mysql_query ("INSERT INTO seguimientos VALUES 
		('', '$ticket3','$cliente3','$contenido3','$seguimiento3','$admin','$fecha3','$hora3')");
		mysql_close ($conexion);
				 
		require("../cnx.php");			
		$consulta = "UPDATE tickets SET 
		seguimientos ='$seguimiento3' WHERE ticket=$ticket3" ;
		$hacerconsulta = mysql_query ($consulta);
		mysql_close ($conexion);
		
		
		//Bloque de comando para resetear el rc cuando se revise el seguimiento (colocar rc en 0 para que se ve en mi proyecto)
		require("../cnx.php");
		$ssql = mysql_query("SELECT * FROM tickets WHERE ticket='$ticket3'");						
		$ra	 =  mysql_result($ssql,0,"ra");
		$rs	 =  mysql_result($ssql,0,"rs");
		$ranew = $ra+1;
		$rsnew = $rs+1;
		
		$consulta4 = "UPDATE tickets SET 
		ra ='$ranew', rs='$rsnew' WHERE ticket=$ticket3" ;
		$hacerconsulta = mysql_query ($consulta4);
		mysql_close($conexion);							
				
				
						/*------ENVIAR EMAIL-------------
						
							require("../cnx.php");					
							$ssql8 = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
							$cliente8	 	=  mysql_result($ssql8,0,"nombres");
							mysql_close($conexion);
								
							$to = $cliente8;
							$subject = 'Se ha realizado un nuevo seguimiento a su consulta';					
							$from = 'systemsadms@hotmail.com';
							$headers = "From:" . $from;	
							$message='Se ha reportado un nuevo seguimiento a su consulta
			
								Para hacer revision de sus seguimientos debe ir a su cuenta cliente en nuestro sitio web www.systemsadms.com									
								';
												
							mail($to,$subject,$message,$headers);

							
							echo $cliente8;
							*/
		
	?>
	<table width="" border="0" align="center">
  <tr>
    <td><font color="green">El nuevo seguimiento ha sido reportado con exito...</font></td>
  </tr>
</table>




	<?php	
}


 
 
			  if(isset($_POST['reabrir']))
			 	{
					require("../cnx.php");
					$ticket4 = $_POST['ticket2'];									
					$consulta8 = "UPDATE tickets SET 
					estatus ='Abierto' WHERE ticket=$ticket4" ;	
					$hacerconsulta8 = mysql_query ($consulta8);
					mysql_close ($conexion);					
					echo "<br>";
					echo "La gestion de este ticket ha sido completa. Nuevo estatus: Abierto"; 
				 }
?>

<!---------------------------------FINBLOQUE DE GUARDADO DE SEGUIMIENTO, MENSAJE Y CORREO-------------------------------------------------------------->














<!---------------------------------------------VENTA MODAL ------------------------------------------------>
<div id="modal">
          
         			<?php				
					$ticket = $_POST["ticket"];		
								
					require ("../cnx.php");	
					$ssql = mysql_query("SELECT * FROM tickets WHERE ticket='$ticket'");						
					$cliente	 	=  mysql_result($ssql,0,"cliente");
					$hora 			=  mysql_result($ssql,0,"hora");
					$fecha 			=  mysql_result($ssql,0,"fecha");
					$area 			=  mysql_result($ssql,0,"area");
					$asunto 		=  mysql_result($ssql,0,"asunto");
					$mensaje 		=  mysql_result($ssql,0,"mensaje");
					$estatus 		=  mysql_result($ssql,0,"estatus");
					$seguimientos	=  mysql_result($ssql,0,"seguimientos");	
					mysql_close($conexion);
					
					
					//Bloque de comando para resetear el rc cuando se revise el seguimiento
					$rc	=  "0";	
					require ("../cnx.php");					
					$consulta3 = "UPDATE tickets SET 
					rc ='$rc' WHERE ticket=$ticket" ; ;
					$hacerconsulta3 = mysql_query ($consulta3);
					mysql_close ($conexion);
					
					
					?>







 <div class="modal-content"> 
         <div class="header">
          <h2>

          		
			<?php	
          		require ("../cnx.php");	
					$ssql15 = mysql_query("SELECT * FROM usuarios WHERE id='$cliente'");			
					$nombres	=  mysql_result($ssql15,0,"nombres");
					$apellidos	=  mysql_result($ssql15,0,"apellidos");				
					mysql_close($conexion);
			  
             				
               ?>              
               <table width="100%" border="0">
               		<tr>
                    	<td align="left" width="50%"><?php echo $nombres. " ".$apellidos; ?></td>
                        
                        <td align="right" width="50%">                      
                        </td>
                    </tr>
               </table>         
          </h2> 
      </div> 
          
          
          
                  
  
    	

  
   <div class="copy"> 
    	
		<h4 align="center"><?php echo $asunto; ?></h4>    
                   
       <table width="80%" border="0" align="center">
          <tr>
            <td>

        
         <?php
		 		 
		 echo "<b>Area:</b><br>" . $area;
		 echo "<br>";
		 echo "<br>";
		 echo "<b>Solicitud de Servicio::</b><br><font color='red'>-</font>".$mensaje;
		 echo "<br>";

	

		 ?>
         
         <br />
         
         <?php
		
		

					require ("../cnx.php");	
			
				
					$consulta = "SELECT * FROM seguimientos WHERE ticket='$ticket'";
	
					$hacerconsulta=mysql_query ($consulta,$conexion);				
					echo "<table width='95%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:90%; color:#000'>";
					echo "<tr>";
					echo "<td align='center' class='letratitulo'></td>";							
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
         <br /><br />
       
           <form action="#" method="post">
           			<table width="200" border="0">
                      <tr>
                        <td valign="top"><b>Nuevo Seguimiento:</b></td>
                        <td>
                        
                        
                        
                        <?php
						date_default_timezone_set('America/La_Paz');
                        $hora 			= date("G:H:s");
						$fecha 			= date("j-n-y"); 
						$seguimiento = $seguimientos+1;						
						?>
                        
                        
                            <span id="sprytextarea1">
                            
                                  <input type="hidden" name="ticket2" value="<?php echo $ticket; ?>"/>
                                  <input type="hidden" name="cliente2" value="<?php echo $cliente; ?>"/>
                                  <textarea name="contenido2" id="textarea1" cols="80" rows="10"></textarea>
                                   
                                  <input type="hidden" name="seguimiento2" value="<?php echo $seguimiento; ?>"/>
                                  <!--Aqui obtener el numero de seguimiento anterior para sumarle uno y guardar en la tabla de seguimiento como referencia para ordenarlos-->
                                  <input type="hidden" name="fecha2" value="<?php echo $fecha; ?>"/>
                                  <input type="hidden" name="hora2" value="<?php echo $hora; ?>"/>
                                
                                  
                          
                            
                            
                            
                            
                        </td>
                      </tr>
                    </table>
		<br /><br />
        <table border="0" align="center">
        	<tr>
            	<td><input type="submit" name="seguir" value="Reportar Seguimiento"/></td>
            </tr>
        </table>
             
        </form>
        
    	</td>
          </tr>
			</table>
    </div> <!--FIN DE COPY-->  
    
     <div class="cf footer"> <a href="#"><font color="#0000FF">Cerrar Historial</font></a> </div> </div> <div class="overlay"></div> </div>
     
<!---------------------------------------------- FIN DE VENTA MODAL--------------------------------------------------->












</body>
</html>
<?php     
  }else 
  {     
    session_destroy();    
    header("location:../index.php"); 
  }
?>  