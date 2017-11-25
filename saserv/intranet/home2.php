<?php
	session_start();
	if ($_SESSION['admin'] == 'saadmin')
		{
			include ("cnx.php");					
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>SaServ-Tickets</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style2.css">
	<link rel="stylesheet" type="text/css" media="all" href="style/mediastyle2.css">
  <script src="style/ventanas.js"></script>
</head>

<script type="text/javascript">
    setTimeout(function(){window.location="home2.php"},120000);
</script>
<body>






<?php
	require ("asideBotones.php");
?>




<!-------------------------------BARRA TITULO Y FILTRO-------------------------------->
<div style="background-color: rgba(000, 0, 0, 0.5); width: 100%; display: inline-block; vertical-align: top; padding-left: 80px; color:white; text-align: center;">TICKETS DE SERVICIOS



		<div id="filtroUsuarios" style="margin-top: 10px;">
			<form method="post" action="#">
				<div style="display: inline-block;">
					<label>Buscar por:</label>
					<select name="filtro" id="filtro">				
						<option>ID</option>
						<option>Cliente</option>
						<option>Tecnico</option>
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


			<form method="post" action="#" style="margin-top: 10px;">
				<div style="display: inline-block;">	

          <a href="#" onclick="crearTicket()">
           <div class="boton3"><img src="img/cliente.png" width="20px" height="20px"><br>Crear Ticket</div>
          </a>
					

				</div>
			</form>
</div>
<!-------------------------------FIN DE BARRA TITULO Y FILTRO-------------------------------->



















<!--------------------------------------- FORMULARIO CREAR SERVICIOS ---------------------------------------------------------->


    <div id="crearServicio" class="hidden" style="margin-left: 110px; text-align: left; padding-top: 50px; width: 90%;"  >

         <form method="post" action="#">


                 <label >Servicio:</label>

                 <select name="area" id="area" style="height:30px; margin-bottom:15px;">
                      <option>Dominios</option>
                      <option>Soporte</option>
                      <option>Camaras</option>
                      <option>Hosting</option>
                      <option>Sistemas</option>
                      <option>Redes</option>
                      <option>Proyectos Wep</option>
                      <option>Marketing</option>
                      <option>Diseños</option>
                </select>
             
                <br>







<?php
$consulta_mysql='select * from administradores where estatus="Activo"';
      $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);  
?>

<label>Tecnico:</label>

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





<br>




<?php
$consulta_mysql='select * from usuarios';
      $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);  
?>

<label>Cliente : </label>

                    <?php
                      echo "<select name='clientes' style='height:30px; margin-bottom:15px;'>";
                    ?>
                      
                    <?php                     
                      while($fila=mysql_fetch_array($resultado_consulta_mysql))
                      {                       
                          echo "<option>".$fila['id']." ".$fila['nombres']." ".$fila['apellidos']."</option>";
                      }
                    echo "</select>";
                    ?>

<br>






               <label>Asunto :</label>
               <input name="asunto" type="text" id="asunto"  />


                <br><br>


             <label>Describe el Servicio</label>
             <br>
             <textarea name="mensaje" id="mensaje" style="width: 80%; height: 200px;"></textarea>

                         
            <br><br>
                            
            <input name="crearTicket2" type="hidden" />
             <input class="btm_abrirTicket" type="submit" value="Enviar Soliciud" style=" background-color:#63be33; cursor:pointer; width: 80%; color: white" />

        </form>
</div>


<!-------------------------------------------------------------- FIN FORMULARIO CREAR SERVICIOS ---------------------------------------------------------->







    <!-------------------------------------------------------------- FUNCION SOLICITAR SERVICIOS ---------------------------------------------------------->
    <div style="margin-left: 80px; text-align: center; padding-top: 50px;">
<?php
  if(isset($_POST['crearTicket2'])){


    date_default_timezone_set('America/La_Paz');
 
            
  
            $clientes  = $_POST["clientes"]; 
            $idCliente = intval(preg_replace('/[^0-9]+/', '', $clientes), 10);

            $hora       = date("G:H:s");
            $fecha      = date("j-n-y"); 
            $area       =$_POST['area'];
            $asunto     =$_POST['asunto'];            
            $estatus    ="Abierto";
            $mensaje    =$_POST['mensaje']; 
            $ra       ="1"; 
            $rc       ="1";
            $rs       ="1";            
            $seguimientos   ="0";
            $admin    = $_POST["admin"];


                        
            mysql_query ("INSERT INTO tickets VALUES 
            ('', '$idCliente','$hora','$fecha','$area','$asunto','$mensaje','$estatus','$ra','$rc','$rs','$seguimientos','$admin')");
            mysql_close ($conexion);
            
            
            
          //------ENVIAR EMAIL1-------------   
      
      
      
              $to = "managercode@hotmail.com";
              $subject = $_POST['asunto'];          
              $from = 'info@mangaercode.com';
              $headers = "From:" . $from; 
              $message ='
              

              Se creado una nueva solicitud de servicios:
              

                            Se le ha asignado un nuevo ticket de servicios.


                            Por favor ingrese a su cuenta para gestionar la solicitud. 

                            En el caso de no poder brindar sus servicios, pongase en contacto con 

                            un administrador.
                            

                                ';     
                        
              mail($to,$subject,$message,$headers);
          
                
              echo "<br>";
              echo "<h3 align='center' ><font color='green'>Se ha creado un nuevo ticket de Servicio. </font></h3>";
              
}
?>
</div>
<!-------------------------------------------------------------- FIN FUNCION SOLICITAR SERVICIOS ---------------------------------------------------------->













<!-----------------------------LISTAS DE TICKETS -------------------------------->
<div style="margin-left: 80px; text-align: center; padding-top: 50px;">
<?php


                $ssql = "SELECT * FROM tickets WHERE estatus='Abierto' or estatus='completado'";
                $rs = mysql_query($ssql,$conexion);     
                if (mysql_num_rows($rs)>0)
                {

                        $consulta = "SELECT * FROM tickets WHERE estatus='Abierto' or estatus='completado';";
                        $hacerconsulta=mysql_query ($consulta,$conexion);

                        $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
                        while ($reg)
                        {
                          
                        echo "<div style='display:inline-block; background-color:none; text-align:center;'>";

                         
                         
                                echo "<div class='ticket'>                                     
                                          <div align='left' style='color:#597fe1;'>Ticket Nº:<font color='black'><b>(".$reg[0].")</b></font></div>
                                          <div align='center'><font size='3'>Servicio:".$reg[4]."</font></div>
                                          <div align='center'><font size='3'>Asunto:".$reg[5]."</font></div>
                                      ";  
                                     


                                if ($reg[12]=='Systems Admins' or $reg[10]>0 and $reg[7]=='Abierto')
                                {
                                     echo "  <form action='ticket.php' method='post'>
                                          <input type='hidden' name='cliente' value=".$reg[1].">
                                          <input type='hidden' name='ticket' value=".$reg[0].">
                                          <input type='submit' name='ver' value='Asignar Ticket' class='btm_abrirTicket' style='background-color:#d24949; color:white;'>
                                        </form>                  
                                      </div>";
                                }

                                 elseif ($reg[7]=='completado')
                                {
                                     echo "  <form action='ticket.php' method='post'>
                                          <input type='hidden' name='cliente' value=".$reg[1].">
                                          <input type='hidden' name='ticket' value=".$reg[0].">
                                          <input type='submit' name='ver' value='Completado' class='btm_abrirTicket' style='color:white; background-color:green;'>
                                        </form>                  
                                      </div>";
                                }


                                else
                                {
                                   echo "  <form action='ticket.php' method='post'>
                                          <input type='hidden' name='cliente' value=".$reg[1].">
                                          <input type='hidden' name='ticket' value=".$reg[0].">
                                          <input type='submit' name='ver' value='Abrir Ticket' class='btm_abrirTicket'>
                                        </form>                  
                                      </div>";
                                }

                          


                        $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
                        echo "</div>";
                        }
                        mysql_close($conexion);
                }
                        else
                {
                echo "<br><br>";
                echo "<div style='text-align:center;'>No hay Tickets de Servicio pendientes</div>";
                }





?>
</div>

<!-----------------------------FIN LISTAS DE TICKETS -------------------------------->






</body>
</html>



<?php			
	}else	
	{			
		session_destroy();		
		header("location:index.php");	
	}
?>	