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


<h3 style="width: 100%; text-align: center;">REPORTAR PAGOS</h3>



 <?php       


          $tipo   = $_POST["tipo"];
          $ticket   = $_POST["ticket"];
          $factura  = $_POST["factura"];
          /*$monto    = $_POST["monto"];*/  
              


   require("../cnx.php");
          $ssql = mysql_query("SELECT * FROM facturas WHERE idFactura='$factura'");            
          $cliente    =  mysql_result($ssql,0,"cliente");          
          $emision      =  mysql_result($ssql,0,"emision");
          $vence       =  mysql_result($ssql,0,"vence");
          $monto     =  mysql_result($ssql,0,"monto");
          $control    =  mysql_result($ssql,0,"control");
          $asunto    =  mysql_result($ssql,0,"asunto");
          $mensaje    =  mysql_result($ssql,0,"mensaje");  



/*
else
{
  ?>
        <script type="text/javascript">
        window.location="facturas.php";
        </script>
  <?php
}
*/

?>
  
       
                   


                       
  
<div style="margin: 50px 0 0 30px; text-align: left;">
<h3 style="color:#d24949;">FACTURA Nº: (<?php echo $factura;?>)</h3>

  <!--<h3 style="color: green;">Ticket de Servicio Nº: (<?php echo $ticket;?>)</h3>-->

  <h4>Tipo de Servicio: <font color="#597fe1"><?php echo $tipo; ?></font></h4> 

  <h4>Asunto de Servicio: <font color="#597fe1"><?php echo $asunto; ?></font></h4> 
  
  <h4>Descripción: <font color="#597fe1"><?php echo $mensaje; ?></font></h4>

  <h4>Emision: <font color="#597fe1"><?php echo $emision; ?></font></h4>

   <h4>Control: <font color="#597fe1"><?php echo $control; ?></font></h4>

  <h4>Monto: <font color="#597fe1"><?php echo $monto; ?></font></h4>

 <!-- <h4>Cliente: <font color="#597fe1"><?php echo $cliente; ?></font></h4> -->

 
 <?php
 if($ticket>'0'){
 ?>
<input onclick="verHistorial()" type="button"  value="Ver Historial" 
                                style="
                                 width: 200px;
                                 height: 30px;
                                 background-color: #63be33;  
                                 /*background-color: #63be33;*/ 
                                 border: none;                                
                                 font-size: 20px;
                                 color: #333;
                                 cursor: pointer;                        
                            ;" />
<?php
}
?>




<!-------------------------------------------------------------- FUNCION REPORTAR PAGO ---------------------------------------------------------->

<?php 
          if(isset($_POST['reportar']))
          {
            $nick = $_SESSION["login"];
        
              require ("../cnx.php");
              
                $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
                $nombres    =  mysql_result($ssql,0,"nombres");
                $apellidos  =  mysql_result($ssql,0,"apellidos");
                $idCliente  =  mysql_result($ssql,0,"id");
                $cliente    = $nombres." ".$apellidos;
                $medio      =$_POST['medio'];
                $fecha      =$_POST['fecha'];
                $deposito   =$_POST['deposito'];
                $banco      =$_POST['banco'];
                $monto      =$_POST['monto'];
                $factura    =$_POST['factura'];               
                $estatus    ="Reportado";
                $comentario =$_POST['comentario'];
                
               
                mysql_query ("INSERT INTO pagos VALUES 
                ('', '$cliente','$idCliente','$medio','$fecha','$deposito','$banco','$monto','$factura','$estatus','$comentario')");
                 
          
          
                $estatusFactura = "Reportado";        
                $consulta3 = "UPDATE facturas SET 
                estatus ='$estatusFactura' WHERE idFactura=$factura" ; 
                $hacerconsulta3 = mysql_query ($consulta3);  
                mysql_close ($conexion); 
          
                    //------ENVIAR EMAIL-------------   
      
      
      
                $to = "systemsadms@hotmail.com";
                $subject = 'Reporte de Pago';         
                $from = 'systemsadms@hotmail.com';
                $headers = "From:" . $from; 
                $message='Se ha reportado un nuevo pago de servicios
        
                  Cliente:    '.$cliente.'
                  Numero de Deposito o Transferencia:   '.$_POST['deposito'].'
                  Banco:    '.$banco.'
                  Monto:    '.$monto.'
                  Fecha:    '.$fecha.'
                  Nombre del Depositante:   '.$cliente.'                
                  ';
                        
                mail($to,$subject,$message,$headers);
                    

              echo "Se ha reportado el pago de la Factura con exito..";

                  ?>
                    <script type="text/javascript">
                      setTimeout(function(){window.location="facturas.php"},3000);
                    </script>
                  <?php
          }

  ?>

<!-------------------------------------------------------------- FIN DE FUNCION REPORTAR PAGO---------------------------------------------------------->






<!-------------------------------------------------------------- HISTORIAL---------------------------------------------------------->


<div id="historiales" class="hidden">
 <?php 
          require ("../cnx.php");
      
        
          $consulta = "SELECT * FROM seguimientos WHERE ticket=$ticket ORDER BY $ticket ASC";
  
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



<!-------------------------------------------------------------- END HISTORIAL---------------------------------------------------------->











<!-------------------------------------------------------------- FORMULARIO DE PAGO---------------------------------------------------------->

<div id ="solicitud" style="background-color: rgba(245, 240, 240, 0.6); margin-top: 50px; padding: 50px 0 50px 0; text-align: center; font-size: 15px;">


<form method="post" action="#">

<div style="width: 80%; background-color: none; display: inline-block; font-size: 20px; padding-top: 20px; text-align: left; padding-left: 20px;">

                <label>Medio:</label>
                <select name="medio" id="medio" style="width: 80%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;">
                    <option selected="selected">Seleccione...</option>
                    <option>Deposito</option>
                    <option>Transferencia</option>
                    <option>PayPal</option>
                </select>

                <br>

                <label>Banco:</label>
                <select name="banco" id="banco" style="width: 80%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;">
                    <option selected="selected">Seleccione...</option>
                    <option>Banesco</option>
                    <option>Mercantil</option>
                    <option>Provincial</option>
                    <option>Venezuela</option>
                    <option>Del Tesoro</option>
                    <option>PayPal</option>                    
                </select>

                <br>

                <label>Referencia:</label>
                <input type="text" name="deposito" size="14" style="width: 50%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;"/>

                <br>

                <label>Monto:</label>
                <input type="text" name="monto" value="<?php echo $monto; ?>" size="3" style="width: 40%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;"/>


                <!--<select name="moneda" style="width: 20%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;">
                    <option>BsF</option>
                    <option>$(USD)</option>                    
                </select>-->

                <br>

                <label>Fecha: </label>
                <input type="text" name="fecha" size="6" placeholder="dd-mm-yy" style="width: 50%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;"/>

                 <br>

                <label>Comentario</label><br>
                <textarea name="comentario" style="width: 80%; height: 100px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;"></textarea>
                <br><br>
</div>
    <input type='hidden' name='tipo' value="<?php echo $tipo; ?>">
    <input type='hidden' name='factura' value="<?php echo $factura; ?>">
    <input type='hidden' name='ticket' value="<?php echo $ticket; ?>">            
    <input class="btm_abrirTicket" type="submit" name="reportar" value="Reportar Pago" style="margin-bottom: 50px; background-color:#63be33; color: white; width: 80%;" />




  </form>
</div>


<!-------------------------------------------------------------- FIN DE FORMUALARIO DE PAGOS---------------------------------------------------------->





           


    
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