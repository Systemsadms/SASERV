<?php
  session_start();
  if ($_SESSION['login'])
    {
      include ("../cnx.php");          
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Manager Code</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style/style.css">
  <link rel="stylesheet" type="text/css" href="style/menu.css">
	<link rel="stylesheet" type="text/css" href="style/registro.css">
  <link rel="stylesheet" type="text/css" media="all" href="style/mediastyle.css">
  <link rel="stylesheet" type="text/css" media="all" href="style/mediastylemenu.css">
  <script src="style/ventanas.js"></script>
</head>
<body>
<!----------------------------------------------HEADER---------------------------------->

<header>
  <a href="#" onclick="menu2()">
    <div id="contenedorbottonMenu">
     
      <div id="systemsAdms">
        <img src="img/mcodeLogo.png" width="135px" height="40">
      </div>
    </div>
    </a>
    
  <a href="#" onclick="clientes2()">
    <div id="contenedorbottonClientes">
      <div id="cliente"></div>
      <div id="areadeCliente">Cliente</div>
    </div>
  </a>
</header>
<!----------------------------------------------FIN HEADER---------------------------------->

<!----------------------------------------------JS HEADER---------------------------------->
<div id="contenidoDelBody">

<?php
require ("menuPrincipal.php");
?>



<?php
require ("areaClientes.php");
?>

</div>
<!----------------------------------------------FIN JS HEADER---------------------------------->



<?php
require ("menuOpciones.php");
?>



<div id="contenedorInformacion">
<div style="text-align: center;">






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
         
          
//Script para resetear el rc(REVISADO POR EL CLIENTE) cuando se abre el ticket
          $rc = "0";        
          $consulta3 = "UPDATE tickets SET 
          rc ='$rc' WHERE ticket=$ticket" ; ;
          $hacerconsulta3 = mysql_query ($consulta3);  

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
  
       
                   







                                   
  
<div style="margin: 50px 0 0 30px; text-align: left;">
  <h3 style="color: green;">Ticket de Servicio Nº: (<?php echo $ticket;?>)</h3>

  <h4>Tipo de Servicio: <font color="#597fe1"><?php echo $area; ?></font></h4> 

  <h4>Asunto de Servicio: <font color="#597fe1"><?php echo $asunto; ?></font></h4> 
  
  <h4>Descripción: <font color="#597fe1"><?php echo $mensaje; ?></font></h4>                             
</div>













<div style="margin: 50px 0 0 30px; text-align: left;">
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
















<!---------------------------------BLOQUE DE GUARDADO DE SEGUIMIENTO, MENSAJE Y CORREO-------------------------------------------------------------->
<?php
 if(isset($_POST['seguir']))
 {

  
  $ticket3    = $_POST['ticket2'];
  $cliente3   = $_POST['cliente2'];
  $contenido3   = "<b>CLIENTE:</b> ".$_POST['contenido2'];
  $seguimiento3 = $_POST['seguimiento2'];
  $fecha3     = $_POST['fecha2'];
  $hora3      = $_POST['hora2'];
  $admin      = "Cliente";  
  
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
    $ranew = $ra+1;
    $rsnew = $rs+1;
    
    $consulta4 = "UPDATE tickets SET 
    ra ='$ranew', rs='$rsnew' WHERE ticket=$ticket3" ;
    $hacerconsulta = mysql_query ($consulta4);
    mysql_close($conexion);   
  
  ?>

        <h2 style="color: green;">El nuevo seguimiento ha sido reportado con exito...</h2>

  <?php
  
}
?>

<!---------------------------------FINBLOQUE DE GUARDADO DE SEGUIMIENTO, MENSAJE Y CORREO-------------------------------------------------------------->





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
  ?>
























                




           


    
</div>
</div><!-------FIN contenedorInformacion-------------->
</body>
</html>
<?php     
  }else 
  {     
    session_destroy();    
    header("location:../index.php"); 
  }
?>  