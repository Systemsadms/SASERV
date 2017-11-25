<?php
  session_start();
  if ($_SESSION['administrador'])
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
        <img src="img/menu.png" width="50px" height="40"><img src="img/mcodeLogo.png" width="135px" height="40">
      </div>
    </div>
    </a>
    
  <a href="#" onclick="clientes2()">
    <div id="contenedorbottonClientes">
     <a href="../destruir.php"><img src="img/cerrar.png" width="40px" height="40"></a>
    </div>
  </a>
</header>
<!----------------------------------------------FIN HEADER---------------------------------->

<!----------------------------------------------JS HEADER---------------------------------->
<div id="contenidoDelBody">

<?php
require ("menuPrincipal.php");
?>




</div>
<!----------------------------------------------FIN JS HEADER---------------------------------->







<div id="contenedorInformacion">
<div style="text-align: center;">




















<!-------------------------------------------------------------- LISTADO DE TICKETS DE SERVICIOS ---------------------------------------------------------->

<div id="solicitados" style="background-color: rgba(245, 240, 240, 0.6); margin-top: 50px; padding: 10px 0 50px 0; text-align: center;">         

<h3>Tickets de Servicios</h3>


<?php

      require ("mostrar.php");
      require ("../cnx.php");
      $email = $_SESSION["administrador"]; 


 $ssql = mysql_query("SELECT * FROM administradores WHERE email='$email'");
          $nombres    =  mysql_result($ssql,0,"nombres");
          $apellidos  =  mysql_result($ssql,0,"apellidos");
          $idAdmin    =  mysql_result($ssql,0,"idAdmin");
          $admin      =  $idAdmin." ".$nombres." ".$apellidos;




                $ssql = "SELECT * FROM tickets WHERE estatus='Abierto' AND admin='$admin'";
                $rs = mysql_query($ssql,$conexion);     
                if (mysql_num_rows($rs)>0)
                {

                        $consulta = "SELECT * FROM tickets WHERE estatus='Abierto' AND admin='$admin';";
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
                                     


                                if ($reg[8]>0)
                                {
                                     echo "  <form action='chatServicios.php' method='post'>
                                          <input type='hidden' name='cliente' value=".$reg[1].">
                                          <input type='hidden' name='ticket' value=".$reg[0].">
                                          <input type='submit' name='ver' value='Abrir Ticket' class='btm_abrirTicket' style='background-color:#d24949; color:white;'>
                                        </form>                  
                                      </div>";
                                }
                                else
                                {
                                   echo "  <form action='chatServicios.php' method='post'>
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


<!-------------------------------------------------------------- FIN DE LISTADO DE TICKETS DE SERVICIOS ---------------------------------------------------------->


                



    
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