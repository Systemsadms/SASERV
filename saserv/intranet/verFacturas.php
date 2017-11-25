<?php
	session_start();
	if ($_SESSION['admin'] == 'saadmin')
		{
			include ("cnx.php");					
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>SaServicios</title>
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
<div style="background-color: rgba(000, 0, 0, 0.5); width: 100%; display: inline-block; vertical-align: top; padding-left: 80px; color:white; text-align: center;">FACTURA DE SERVICIOS
</div>
<!-------------------------------FIN BARRA TITULO Y FILTRO-------------------------------->





<div style="margin-left: 80px; text-align: center; padding-top: 50px;">


<?php
/***************************************************FUNCION  REPORTE DE PAGO Y CONFIRMACION*************************************************************/

$ticket   = $_POST["ticket"];
$monto   = $_POST["monto"];
$estatus   = $_POST["estatus"];

if(isset($_POST['confirmar']))
{
   $estatus   = $_POST["estatus"];
   $factura   = $_POST["factura"];
   $id        = $_POST["id"];

   require ("cnx.php");
     $consultaUpdate = "UPDATE facturas  SET estatus='Pagada' WHERE idFactura='$factura'";  
     $hacerconsulta  = mysql_query ($consultaUpdate);

      $consultaUpdate = "UPDATE pagos  SET estatus='Confirmado' WHERE id='$id'";  
      $hacerconsulta  = mysql_query ($consultaUpdate);

   
   
  echo "<font color='red'>El Pago ha sido confirmado con exito</font>";
  ?>
    <script type="text/javascript">
      setTimeout(function(){window.location="facturas.php"},3000);
    </script>
  <?php

}
else{     

          $estatus = $_POST["estatus"];

          echo "<h3 style='color:white;'>Reporte de Pago</h3>";

          if($estatus=="Reportado")
          {
                   $estatus   = $_POST["estatus"];
                   $factura   = $_POST["factura"];

               
                      $consulta = "SELECT * FROM pagos WHERE factura='$factura';";
                      $hacerconsulta=mysql_query ($consulta,$conexion);

                            
                        echo "<table border='0' bordercolor='#3ADF00' align='center' width='100%'>";
                        echo "<tr>";
                        echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Banco</b></td>";
                        echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Referencia</b></font></td>";
                        echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Monto</b></td>";
                        echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Fecha</b></td>";
                        echo "<td align='center' bgcolor='#58ACFA'><b><font color='black'>Comentario</b></td>";
                        echo "<td align='center' style='border: inset 0pt;'></td>";
                        echo "</tr>";
                        
                        
                        $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
                        
                        while ($reg)
                        {
                        echo "<tr>";
                        echo "<td align='center' class='dark'>".$reg[6]."</td>";
                        echo "<td align='center' class='dark'>".$reg[3]." "."Nº:".$reg[5]."</td>";
                        echo "<td align='center' class='dark'>".$reg[7]."</td>";
                        echo "<td align='center' class='dark'>".$reg[4]."</td>";
                        echo "<td align='center' class='dark'>".$reg[10]."</td>";


                        echo "<td class='dark' align='center' style='border: inset 0pt'>        
                          <form action='#' method='post'>      
                            <input type='hidden' name='id' value=".$reg[0].">
                            <input type='hidden' name='estatus' value=".$estatus.">
                            <input type='hidden' name='factura' value=".$factura.">
                            <input type='hidden' name='ticket' value=".$ticket.">
                            <input type='hidden' name='monto' value=".$monto.">
                            <input type='submit' name='confirmar' value='confirmar Pago'/>
                          </form>       
                        </td>";//FIN DEL echo
                        


                        $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
                        echo "</tr>";
                        }
                        echo "</table>";
                        mysql_close($conexion);


          }
}
/******************************************************FIN FUNCION  REPORTE DE PAGO Y CONFIRMACION*****************************************/





   

/**********************************************************FUNCION ELIMINAR TICKET**************************************************************/
  if(isset($_POST['eliminar'])){

  $ticket   = $_POST["ticket"];
   $factura   = $_POST["factura"];



                require ("cnx.php");
                $ssql = "SELECT * FROM tickets WHERE ticket='$ticket'";
                $rs = mysql_query($ssql,$conexion);     
                if (mysql_num_rows($rs)>0)
                {                  
                  $consulta3 = "UPDATE tickets SET 
                  estatus ='Abierto' WHERE ticket=$ticket" ; ;
                  $hacerconsulta3 = mysql_query ($consulta3); 
                  echo "<font color='red'>El Ticket ha sido cargado nuevamene</font>";
                }


          $consulta3 = "UPDATE facturas SET 
          estatus ='cancelada' WHERE idFactura=$factura" ; ;
          $hacerconsulta3 = mysql_query ($consulta3); 
          echo "<font color='red'>La Factura Ha sido Cancelada</font>";



          ?>

 


           <script type="text/javascript">
             setTimeout(function(){location="facturas.php"},3000);
           </script>
          <?php
      }
      else{
?>
</div>
<?php
  if($estatus=="Facturado")
  {
?>
<div style="text-align: center; margin-top: 30px;">
<a href="#" onclick="EliminarTicket()">
      <div class="boton3" style="width: 120px;"><img src="img/cliente.png" width="20px" height="20px"><br>Eliminar Factura</div>
    </a>
</div>
<?php
}

 $factura   = $_POST["factura"];
?>


<div id="cerrar" class="hidden" style="background-color:none; text-align: center; width: 100%;  padding-top: 40px; color:white;"> 

 Estas seguro que deseas Eliminar esta factura de Servicio, <br>Sera archivada como Factura Cancelada.

<form action="#" method="post">

  <input type="hidden" name="ticket" value="<?php echo $ticket; ?>"></input>
  <input type="hidden" name="factura" value="<?php echo $factura; ?>"></input> 
    <input type="hidden" name="monto" value="<?php echo $monto; ?>"></input>
  <input type="hidden" name="estatus" value="<?php echo $estatus; ?>"></input> 

  <input type="submit" name="eliminar" value="SI" style="width: 70px; height: 30px;">
  <input type="button" name="cerrar" value="NO" onclick="ocultar_ventana()" style="width: 70px; height: 30px;">
  
  
  <!--<a href="javascript: validarCierre()" name="test">Cerrar</a>-->
</form>


 </div>
<?php
}
/*********************************************************FIN FUNCION ELIMINAR TICKET**************************************************************/
?>












<div style="margin-left: 80px; text-align: center; padding-top: 50px;">
<?php       
/*********************************************************DATOS DE LA FACTURA**************************************************************/


 if ($_POST["ticket"]=='0')
      {


                    $factura   = $_POST["factura"];
                    $ticket   = $_POST["ticket"];
                                             
                                              require("cnx.php");
                                              $ssql = mysql_query("SELECT * FROM facturas WHERE ticket='$ticket'"); 
                                              $tipo       =  mysql_result($ssql,0,"tipo");
                                              $cliente      =  mysql_result($ssql,0,"cliente");
                                              $emision       =  mysql_result($ssql,0,"emision");
                                              $vence     =  mysql_result($ssql,0,"vence");
                                              $monto    =  mysql_result($ssql,0,"monto");
                                              $control    =  mysql_result($ssql,0,"control");
                                              $asunto    =  mysql_result($ssql,0,"asunto"); 
                                              $mensaje    =  mysql_result($ssql,0,"mensaje");
                                              $pais    =  mysql_result($ssql,0,"pais");
                                              $estado    =  mysql_result($ssql,0,"estado");
                                              $ciudad    =  mysql_result($ssql,0,"ciudad");
                                              $direccion    =  mysql_result($ssql,0,"direccion");




                                              $ssql = mysql_query("SELECT * FROM usuarios WHERE id='$cliente'");
                                               $nombre    =  mysql_result($ssql,0,"nombres");
                                               $apellido  =  mysql_result($ssql,0,"apellidos");
                                               $telefono  =  mysql_result($ssql,0,"telefono");
                                               $celular  =  mysql_result($ssql,0,"celular");
                                               $email  =  mysql_result($ssql,0,"email");                                                        
                                               $pais    =  mysql_result($ssql,0,"pais");
                                               $estado  =  mysql_result($ssql,0,"estado");
                                               $ciudad  =  mysql_result($ssql,0,"ciudad");
                                               $dir     =  mysql_result($ssql,0,"dir");
                                               $nameCliente = $nombre . " " . $apellido;  



                  ?>

                        <div style="margin: 50px 0 0 30px; text-align: left;">
                        <h3 style="color:#d24949;">FACTURA Nº: (<?php echo $factura;?>)</h3>

                        <h3 style="color:#d24949;">Cliente: (<?php echo $nameCliente;?>)</h3>

                          <h3 style="color: green;">Ticket de Servicio Nº: (No Aplica)</h3>

                          

                          <h4>Tipo de Factura: <font color="#597fe1"><?php echo $tipo; ?></font></h4> 

                          <h4>Asunto de Servicio: <font color="#597fe1"><?php echo $asunto; ?></font></h4> 
                          
                          <h4>Descripción: <font color="#597fe1"><?php echo $mensaje; ?></font></h4>

                          <h4>Emision: <font color="#597fe1"><?php echo $emision; ?></font></h4> 

                          <h4>Vencimiento: <font color="#597fe1"><?php echo $vence; ?></font></h4> 
                         

                            <h4>Cliente: <font color="#597fe1"><?php echo $nameCliente; ?></font></h4>

                            <h4>Pais: <font color="#597fe1"><?php echo $pais; ?></font></h4>

                            <h4>Estado: <font color="#597fe1"><?php echo $estado; ?></font></h4>

                            <h4>Ciudad: <font color="#597fe1"><?php echo $ciudad; ?></font></h4>

                            <h4>Direccion: <font color="#597fe1"><?php echo $dir; ?></font></h4>

                            <h4>Telefono: <font color="#597fe1"><?php echo $telefono; ?></font></h4>

                            <h4>Celular: <font color="#597fe1"><?php echo $celular; ?></font></h4>

                            <h4>Email: <font color="#597fe1"><?php echo $email; ?></font></h4>



                         <!-- <h4>Cliente: <font color="#597fe1"><?php echo $cliente; ?></font></h4> -->                            
                        </div>



        <?php

      }
      else
      {

                            $ticket   = $_POST["ticket"];
                            $factura  = $_POST["factura"];
                            $monto    = $_POST["monto"];  
                                                   

                                              require("cnx.php");
                                              $ssql = mysql_query("SELECT * FROM facturas WHERE idFactura='1'");            
                                              $vence    =  mysql_result($ssql,0,"vence");
                                              $tipo      =  mysql_result($ssql,0,"tipo");



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
                                              $admin    =  mysql_result($ssql,0,"admin"); 




                                               $ssql = mysql_query("SELECT * FROM usuarios WHERE id='$cliente'");
                                               $nombre    =  mysql_result($ssql,0,"nombres");
                                               $apellido  =  mysql_result($ssql,0,"apellidos");
                                               $telefono  =  mysql_result($ssql,0,"telefono");
                                               $celular  =  mysql_result($ssql,0,"celular");
                                               $email  =  mysql_result($ssql,0,"email");                                                        
                                               $pais    =  mysql_result($ssql,0,"pais");
                                               $estado  =  mysql_result($ssql,0,"estado");
                                               $ciudad  =  mysql_result($ssql,0,"ciudad");
                                               $dir     =  mysql_result($ssql,0,"dir");
                                               $nameCliente = $nombre . " " . $apellido;  
                        ?>



                        <div style="margin: 50px 0 0 30px; text-align: left;">
                        <h3 style="color:#d24949;">FACTURA Nº: (<?php echo $factura;?>)</h3>

                          <h3 style="color:#d24949;">Cliente: (<?php echo $nameCliente;?>)</h3>

                          <h3 style="color: green;">Ticket de Servicio Nº: (<?php echo $ticket;?>)</h3>

                          <h4>Tipo de Factura: <font color="#597fe1"><?php echo $tipo; ?></font></h4>      

                          <h4>Tipo de Servicio: <font color="#597fe1"><?php echo $area; ?></font></h4> 

                          <h4>Asunto de Servicio: <font color="#597fe1"><?php echo $asunto; ?></font></h4> 
                          
                          <h4>Descripción: <font color="#597fe1"><?php echo $mensaje; ?></font></h4>

                          <h4>Emision: <font color="#597fe1"><?php echo $fecha; ?></font></h4> 

                          <h4>Vencimiento: <font color="#597fe1"><?php echo $vence; ?></font></h4>

                          <h4>Hora: <font color="#597fe1"><?php echo $hora; ?></font></h4> 

                           <h4>Tecnico Asignado: <font color="#597fe1"><?php echo $admin; ?></font></h4>

                            <h4>Cliente: <font color="#597fe1"><?php echo $nameCliente; ?></font></h4>

                            <h4>Pais: <font color="#597fe1"><?php echo $pais; ?></font></h4>

                            <h4>Estado: <font color="#597fe1"><?php echo $estado; ?></font></h4>

                            <h4>Ciudad: <font color="#597fe1"><?php echo $ciudad; ?></font></h4>

                            <h4>Direccion: <font color="#597fe1"><?php echo $dir; ?></font></h4>

                            <h4>Telefono: <font color="#597fe1"><?php echo $telefono; ?></font></h4>

                            <h4>Celular: <font color="#597fe1"><?php echo $celular; ?></font></h4>

                            <h4>Email: <font color="#597fe1"><?php echo $email; ?></font></h4>



                         <!-- <h4>Cliente: <font color="#597fe1"><?php echo $cliente; ?></font></h4> -->                        		
                        </div>





                                 <?php 
                                          require ("../cnx.php");
                                      
                                        
                                          $consulta = "SELECT * FROM seguimientos WHERE ticket='$ticket' ORDER BY $ticket ASC";
                                  
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




/*********************************************************FIN DATOS DE LA FACTURA**************************************************************/

}
?>


</div>















<!-------------------------------OCULATAR VENTANA ELIMINAR TICKET-------------------------------->
<script type="text/javascript">
  function ocultar_ventana()
    {
      var estilo = document.getElementById("cerrar").className;

      if (estilo == "show")
      {
      document.getElementById("cerrar").className = "hidden";
      }
    }
</script>
<!-------------------------------FIN OCULATAR VENTANA ELIMINAR TICKET-------------------------------->



</body>
</html>
<?php			
	}else	
	{			
		session_destroy();		
		header("location:index.php");	
	}
?>



