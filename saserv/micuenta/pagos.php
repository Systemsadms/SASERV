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
   transition:-webkit- all 0.4s ease-in-out;
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

    <h3 style="width: 100%; text-align: center;">Pagos Realizados</h3>





<!------------------------------------------CUERPO CLIENTE-------------------------------------------------->
<div id="cuerpocliente">




<?php


require ("../mostrar.php");
require ("../cnx.php");
$nick = $_SESSION["login"]; 

          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idCliente    =  mysql_result($ssql,0,"id");
              





          $ssql = "SELECT * FROM pagos WHERE estatus='Confirmado' AND idCliente='$idCliente'";
          $rs = mysql_query($ssql,$conexion);     
          if (mysql_num_rows($rs)>0)
          {

                  $consulta = "SELECT * FROM pagos WHERE estatus='Confirmado' AND idCliente='$idCliente';";

                  $hacerconsulta=mysql_query ($consulta,$conexion);       
                  echo "<table width='95%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:90%; color:#000'>";
                  echo "<tr>";
                  echo "<td align='center' class='letratitulo'><b>Reporte Nº</b></td>";
                  echo "<td align='center' class='letratitulo'><b>Fecha</b></td>";
                  echo "<td align='center' class='letratitulo'><b>Banco</b></td>";
                  echo "<td align='center' class='letratitulo'><b>Medio</b></td>";
                  echo "<td align='center' class='letratitulo'><b>Monto</b></td>";
                  echo "<td align='center' class='letratitulo'></td>";
                  echo "</tr>";
                  $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
                  while ($reg)
                  {
                  echo "<tr>";
                  echo "<td align='center' bgcolor='#CCCCCC'>".$reg[0]."</td>";
                  echo "<td align='center' bgcolor='#CCCCCC'>".$reg[4]."</td>";
                  echo "<td align='center' bgcolor='#CCCCCC'>".$reg[6]."</td>";
                  echo "<td align='center' bgcolor='#CCCCCC'>".$reg[3]."</td>";
                  echo "<td align='center' bgcolor='#CCCCCC'>".$reg[7]."</td>";
              



                    echo "<td align='center' >
                    <a href='../intranet/facturasPDF/".$reg[8].".pdf' target='_blank'>Ver Factura</a>                   
                  </td>";



                  $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
                  echo "</tr>";
                  }
                  echo "</table>";
                  mysql_close($conexion);
          }
                  else
          {
          echo "<br><br>";
          echo "<div style='text-align:center;'>No hay Tickets de Servicio pendientes</div>";
          }

      
?>




























</div><!---------------------------------------------------------FIN DE CUERPO CLIENTES-------------------------------------------------------->





</div>
<!---------------------------------------------------------fin de DIV DE CUERPO PARA TODO------------------------------------------------------------->


    

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