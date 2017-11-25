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





                
                   
                                   
                            <input onclick="solicitarServ()" type="button"  value="Solicitar Servicio" 
                                style="
                                 width: 200px;
                                 height: 100px; 
                                 background-color: #63be33; 
                                 border: none; 
                                 margin-top: 50px;
                                 font-size: 20px;
                                 color: #333;
                                 cursor: pointer;                        
                            ;" />



<!--
                            <input onclick="servSolicitados()" type="button"  value="Servicios Solicitados" 
                                style="
                                 width: 200px;
                                 height: 100px;
                                 background-color: #63be33;  
                                 /*background-color: #597fe1;*/ 
                                 border: none; 
                                 margin-top: 50px;
                                 font-size: 20px;
                                 color: #333;
                                 cursor: pointer;                        
                            ;" />

                         -->             





<!-------------------------------------------------------------- FUNCION SOLICITAR SERVICIOS ---------------------------------------------------------->



<?php
if(isset($_POST['crear']))
{
    date_default_timezone_set('America/La_Paz');
    require ("../cnx.php");  
            
            
          $nick = $_SESSION["login"];         
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");
          $nombres      =  mysql_result($ssql,0,"nombres");
          $apellidos    =  mysql_result($ssql,0,"apellidos");
            
            
            $cliente    =$idcliente;
            $hora       = date("G:H:s");
            $fecha      = date("j-n-y"); 
            $area       =$_POST['area'];
            $asunto     =$_POST['asunto'];            
            $estatus    ="Abierto";
            $mensaje    =$_POST['mensaje']; 
            $ra       ="1"; 
            $rc       ="0";
            $rs       ="1";            
            $seguimientos   ="0";
            $admin      ="Systems Admins";
            

                        
            mysql_query ("INSERT INTO tickets VALUES 
            ('', '$cliente','$hora','$fecha','$area','$asunto','$mensaje','$estatus','$ra','$rc','$rs','$seguimientos','$admin')");
            mysql_close ($conexion);
            
            
            
          //------ENVIAR EMAIL1-------------   
      
      
      
              $to = "managercode@hotmail.com";
              $subject = $_POST['asunto'];          
              $from = 'info@mangaercode.com';
              $headers = "From:" . $from; 
              $message ='
              

              Se ha enviado una nueva solicitud de servicios:
              
              Cliente: '.$cliente.' '.$nombres.' '.$apellidos.'
                  
              Fecha: '.$fecha.'
    
              Hora: '.$hora.'
              
              Area: '.$_POST['area'].'
    
              Asunto: '.$_POST['asunto'].'
              
              Mensaje: '.$_POST['mensaje'].'
                  ';     
                        
              mail($to,$subject,$message,$headers);
          
                
              echo "<br>";
              echo "<h3 align='center' ><font color='green'>Se ha creado un nuevo ticket de Servicio. </font></h3>";




              



}
?>

<!-------------------------------------------------------------- FIN FUNCION SOLICITAR SERVICIOS ---------------------------------------------------------->















<!-------------------------------------------------------------- FORMULARIO SOLICITAR SERVICIOS ---------------------------------------------------------->


    <div id ="solicitud" class="hidden" style="background-color: rgba(245, 240, 240, 0.6); margin-top: 50px; padding: 50px 0 50px 0; text-align: center; font-size: 20px;">

         <form method="post" action="#">


                 <label>Area de Servicios</label>

                 <select name="area" id="area">
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
             
                <br><br>

               <label>Enunciado de Servicio</label>
               <input name="asunto" type="text" id="asunto"  />


                <br><br>


             <label>Describe el Servicio</label>
             <br>
             <textarea name="mensaje" id="mensaje" style="width: 80%; height: 200px;"></textarea>

                         
            <br><br>
                            
            <input name="crear" type="hidden" />
             <input class="btm_abrirTicket" type="submit" value="Enviar Soliciud" style=" background-color:#63be33; cursor:pointer; width: 80%; color: white" />

        </form>
</div>


<!-------------------------------------------------------------- FIN FORMULARIO SOLICITAR SERVICIOS ---------------------------------------------------------->



















<!-------------------------------------------------------------- LISTADO DE TICKETS DE SERVICIOS ---------------------------------------------------------->

<div id="solicitados" class="show" style="background-color: rgba(245, 240, 240, 0.6); margin-top: 50px; padding: 10px 0 50px 0; text-align: left;">         

<h3 align="center">SERVICIOS SOLICITADOS</h3>


<?php

      require ("../mostrar.php");
      require ("../cnx.php");
      $nick = $_SESSION["login"]; 

                $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
                $idCliente    =  mysql_result($ssql,0,"id");
               
                    

                $ssql = "SELECT * FROM tickets WHERE estatus='Abierto' AND cliente='$idCliente' or estatus='completado'";
                $rs = mysql_query($ssql,$conexion);     
                if (mysql_num_rows($rs)>0)
                {

                        $consulta = "SELECT * FROM tickets WHERE estatus='Abierto' AND cliente='$idCliente' or estatus='completado' ;";
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
                                     


                                if ($reg[9]>0 AND $reg[7]=='Abrierto')
                                {
                                     echo "  <form action='chatServicios.php' method='post'>
                                          <input type='hidden' name='cliente' value=".$reg[1].">
                                          <input type='hidden' name='ticket' value=".$reg[0].">
                                          <input type='submit' name='ver' value='Abrir Ticket' class='btm_abrirTicket' style='background-color:#d24949; color:white;'>
                                        </form>                  
                                      </div>";
                                }



                                elseif ($reg[7]=='completado')
                                {
                                     echo "  <form action='chatServicios.php' method='post'>
                                          <input type='hidden' name='cliente' value=".$reg[1].">
                                          <input type='hidden' name='ticket' value=".$reg[0].">
                                          <input type='submit' name='ver' value='Completado' class='btm_abrirTicket' style='background-color:green; color:white;'>
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