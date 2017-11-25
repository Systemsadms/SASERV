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
      <div id="areadeCliente">Clientes</div>
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

    <h3 style="width: 100%; text-align: center;">FACTURAS</h3>








<!----------COMIENZO DE DIV DE FACTURAS---------->
<div style="
  background-color:#EFEFEF; 
    height:30%;
    padding-top: 1%;
    padding-left: 1%;
    ">
    <?php
    
    require ("../cnx.php");
    $nick = $_SESSION["login"];
          
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");  
          $cliente    =  mysql_result($ssql,0,"nombres");           
          
          
          

          $ssql = "SELECT * FROM facturas WHERE cliente='$idcliente' AND estatus='Facturado' OR estatus='Reportado'";
          $rs = mysql_query($ssql,$conexion);     
          if (mysql_num_rows($rs)>0)
          {
             
          
            
              $consulta = "SELECT * FROM facturas WHERE cliente='$idcliente' AND estatus='Facturado' OR estatus='Reportado'";      
              $hacerconsulta=mysql_query ($consulta,$conexion);     

              
              $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
              while ($reg)
              {



                                echo "<div style='display:inline-block; background-color:none; text-align:center;'>";

                         
                         
                                echo "<div class='ticket'>                                     
                                          <div align='left' style='color:#597fe1;'>Factura Nº:<font color='black'><b>(".$reg[0].")</b></font></div>
                                          <div align='center'><font size='3'>Tipo:".$reg[1]."</font></div>
                                          <div align='center'><font size='3'>Monto:".$reg[6]."</font></div>
                                      ";  
                                     


                                if($reg[8]=="Facturado")
                                {
                                     echo "  <form action='pagarFacturas.php' method='post'>
                                          <input type='hidden' name='factura' value=".$reg[0]."> 
                                          <input type='hidden' name='tipo' value=".$reg[1].">                                        
                                           <input type='hidden' name='ticket' value=".$reg[2].">
                                           <input type='hidden' name='cliente' value=".$reg[3].">
                                           <input type='hidden' name='monto' value=".$reg[6].">
                                           <input type='submit' name='ver' value='Pagar Factura' class='btm_abrirTicket' style='background-color:#d24949; color:white;'>
                                        </form>                  
                                      </div>";
                                }
                                else if($reg[8]=="Reportado")
                                {
                                   echo "  <form action='#' method='post'>
                                          <input type='hidden' name='cliente' value=".$reg[0].">
                                          <input type='hidden' name='tipo' value=".$reg[1].">
                                          <input type='hidden' name='ticket' value=".$reg[2].">
                                          <input type='hidden' name='cliente' value=".$reg[3].">                                          
                                          <input type='submit' name='ver' value='Pago por Confirmar' class='btm_abrirTicket'>
                                        </form>                  
                                      </div>";
                                }



              $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
              echo "</tr>";
              }
              echo "</table>";
              mysql_close($conexion);

          }
       else
          {

          echo "<div style='text-align:center;'>No hay Servicios por pagar</div>";
          }
  ?>
    
</div>
<!----------FIN DE DIV DE FACTURAS---------->











   

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