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
<div style="background-color: rgba(000, 0, 0, 0.5); width: 100%; display: inline-block; vertical-align: top; padding-left: 80px; color:white; text-align: center;">TICKETS DE SERVICIOS



		<div id="filtroUsuarios" style="margin-top: 10px;">
			<form method="post" action="#">
				<div style="display: inline-block;">
					<label>Buscar por:</label>
					<select name="filtro" id="filtro">				
						<option>ID</option>
						<option>Por Cobrar</option>
            <option>Por Confirmar</option>
						<option>Pagadas</option>
						<option>Cenceladas</option>
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
					<a href="#" onclick="Facturar()">
           <div class="boton3"><img src="img/cliente.png" width="20px" height="20px"><br>Crear Factura</div>
          </a>
					
				</div>
			</form>
</div>
<!-------------------------------FIN DE BARRA TITULO Y FILTRO-------------------------------->










<div style="margin-left: 80px; text-align: center; padding-top: 50px;">




<!-------------------------------FUNCION CARGAR FACTURA-------------------------------->


<?php

            if(isset($_POST['cargarFactura']))///If se cargo una nueva factura
            {
              

            
              $extension= $_FILES["factura"]["type"];
                date_default_timezone_set('America/La_Paz');
                $hora       = date("G:H:s");
                $fecha      = date("j-n-y"); 


              if($extension == "application/pdf")
                {

                  $query= mysql_query("SELECT MAX(idFactura) AS id FROM facturas");
                   if ($row = mysql_fetch_row($query)) 
                    {
                         $numFactura = trim($row[0]);
                         $numFactura++;
                    }

                          $archivoRecibido= $_FILES['factura']['tmp_name'];
                          $destino="facturasPDF/" . $numFactura.".pdf";
                          move_uploaded_file($archivoRecibido, $destino);


                          $cliente  = $_POST['cliente'];
                          $idCliente = intval(preg_replace('/[^0-9]+/', '', $cliente), 10);
                         

                          $tipo     = $_POST['tipoFactura'];
                          //$idTipo   = $_POST['ticket2'];
                          $idTipo   = "No Aplica";              
                          $emision  = $fecha;
                          $vence    = $_POST['vence'];
                          $monto    = $_POST['monto']." ".$_POST['moneda'];
                          $control  = $_POST['control'];
                          $asunto   = $_POST['asunto2'];
                          $mensaje  = $_POST['mensaje2'];
                          $estatus  = "Facturado";


                           $ssql = mysql_query("SELECT * FROM usuarios WHERE id='$idCliente'");            
                           $pais    =  mysql_result($ssql,0,"pais");
                           $estado  =  mysql_result($ssql,0,"estado");
                           $ciudad  =  mysql_result($ssql,0,"ciudad");
                           $dir     =  mysql_result($ssql,0,"dir");
     

                    


                            require ("cnx.php");
                            mysql_query ("INSERT INTO facturas VALUES 
                              ('', '$tipo','$idTipo','$idCliente','$emision','$vence','$monto','$control','$estatus','$pais','$estado','$ciudad','$dir','$asunto','$mensaje')");
                            mysql_close ($conexion);

                            $archivoRecibido= $_FILES['factura']['tmp_name'];
                            $destino="../facturasPDF/" . $numFactura.".pdf";
                            move_uploaded_file($archivoRecibido, $destino);

                          
                            /*require ("cnx.php"); 
                            $consultaUpdate = "UPDATE tickets  SET estatus='Facturado' WHERE ticket='$ticket'"; 
                            $hacerconsulta  = mysql_query ($consultaUpdate);
                            */


                            ?>
                              <div id="cajaJs">
                              <br>
                              <font color="green">            
                                  <b>La Factura ha sido Generada con Exito<b>
                                  <br><br>
                                  <a href="index.php">ACTUALIZAR</a>   
                              </font>
                              </div>
                            <?php

                  

                }
              else
                {
                  ?>
                    <div id="cajaJs">
                    <br>
                    <font color="red">
                        <br><br>          
                        <font color="red">El archivo cargado no es un Fromato Pdf o no se cargo ningun Archivo</font>
                        
                    </font>
                    </div>
                  <?php         
                }
                
              }

?>



<!-------------------------------FIN DE CARGAR FACTURA-------------------------------->




















<!------------------------------------------FORMULARIO CREAR FACTURA-------------------------------------------------->



    

<div id="facturar" class="hidden" style="background-color:none; text-align: center; width: 100%;  padding-top: 40px; color:white;"> 
    <div id="facturar" class="hidden" style="text-align: right; padding-right: 0px; background-color: rgba(000, 0, 0, 0.5); width: 350px; display: inline-block; border-radius: 10px; padding-top: 30px; padding-bottom: 30px; text-align: center;" > 
      
      <form method="post" action="#"  id="crearNuevoT" enctype="multipart/form-data">

              
        <?php

           date_default_timezone_set('America/La_Paz');
                $hora       = date("G:H:s");
                $fecha      = date("j-n-y"); 


          $consulta_mysql='select * from usuarios where estatus="confirmado"';
          $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
        ?>

              <form method="post" action="#">
                <label>Tecnicos:</label>

                <?php
                  echo "<select name='cliente' style='height:30px; margin-bottom:15px;'>";
                ?>
                  <!--<option>Seleccionar..</option>-->
                <?php                     
                  while($fila=mysql_fetch_array($resultado_consulta_mysql))
                  {                       
                      echo "<option>".$fila['id']." ".$fila['nombres']." ".$fila['apellidos']."</option>";
                  }
                echo "</select>";
                ?>    

                <br>
                <label>Tipo Factura:</label><br>
                <select name="tipoFactura" style="width: 100px; height: 30px;">                  
                  <option>Venta de Licencia</option>
                  <option>Venta de Equipos</option>
                  <option>Servicios Especiales</option>
                </select><br>

                <label id="validarMonto">Monto:</label><br>
                <input type="text" name="monto"  size="3" style="width: 100px; height: 30px;"></input>
                <select name="moneda" style="width: 100px; height: 30px;">
                  <option>BsF</option>
                  <option>$(usd)</option>
                </select><br>

        
                <label id="validarEmision">Emision:</label><br>
                <input type="text" name="emision"  size="5" placeholder="dd-mm-yy" value="<?php  echo $fecha;?>" style="width: 210px; height: 30px;"></input><br>


      
                <label id="validarVence">Vence:</label><br>
                <input type="text" name="vence"  size="5" placeholder="dd-mm-yy" style="width: 210px; height: 30px;"></input><br>
       

                <label>N° Control:</label><br>
                <input type="text" name="control" placeholder="Opcional" size="4" style="width: 210px; height: 30px;"></input><br>

                 <label id="validarAsunto">Asunto:</label><br>
                <input type="text" name="asunto2"  size="5" placeholder="Titulo de Factura" style="width: 210px; height: 30px;"></input><br>

                 <label id="validarMensaje">Descripcion:</label><br>
                 <textarea name="mensaje2" placeholder="Descripcion de Factura"></textarea>
                <br>
                
                <label>Factura PDF:</label><br>
                <input type="file" name="factura" id="factura" /><br><br>
                


                <input type="hidden" name="tipo"   value="<?php echo $tipo; ?>"></input>
                <!--<input type="hidden" name="idTipo" value="<?php echo $idServicio; ?>"></input>
                <input type="hidden" name="cliente" value="<?php echo $cliente; ?>"></input>-->
                <input type="hidden" name="cargarFactura" value="holamundo"></input>
                <input type="hidden" name="ticket" value="<?php echo $ticket; ?>"></input>

                <input type="hidden" name="pais" value="<?php echo $pais; ?>"></input>
                <input type="hidden" name="estado" value="<?php echo $estado; ?>"></input>
                <input type="hidden" name="ciudad" value="<?php echo $ciudad; ?>"></input>
                <input type="hidden" name="direccion" value="<?php echo $dir; ?>"></input>

              
                <!--<input type="submit" name="cargarFactura" class="boton2" value="Facturar Servicio"  />-->
                <a href="javascript: validarCampos()" name="test">Facturar Servicio</a>
                    
              </form>

    </div>
  
</div>
<!------------------------------------------FIN CREAR FACTURA---------------------------------------------------->












<!--------------------------------- LISTA DE FACTURAS---------------------------------------->

<?php
                require ("cnx.php");
                $ssql = "SELECT * FROM facturas WHERE estatus='Facturado' OR estatus='Reportado'";
                $rs = mysql_query($ssql,$conexion);     
                if (mysql_num_rows($rs)>0)
                {

                        $consulta = "SELECT * FROM facturas WHERE estatus='Facturado' OR estatus='Reportado'";
                        $hacerconsulta=mysql_query ($consulta,$conexion);

                        $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
                        while ($reg)
                        {
                                    $cliente = $reg[3];
                                     


                                    $ssql = mysql_query("SELECT * FROM usuarios WHERE id='$cliente'");            
                                    $nombre    =  mysql_result($ssql,0,"nombres");
                                    $apellido =  mysql_result($ssql,0,"apellidos");
                                    $pais     = mysql_result($ssql,0,"pais");
                                    $nombreCliente=$nombre.$apellido;

/*
                                    $ticket3 = $reg[2];                                                       
                                    $ssql = mysql_query("SELECT * FROM tickets WHERE ticket='$ticket3'");            
                                    $asunto = mysql_result($ssql,0,"asunto");
                  */                  
                                    


                        echo "<div style='display:inline-block; background-color:none; text-align:center; margin-top:15px;'>";
                         
                                echo "<div class='ticket'>                                     
                                          <div align='left' style='color:#597fe1;'>Factura Nº:<font color='black'><b>(".$reg[0].")</b></font></div>
                                          <div align='center'><font size='3'>Cliente:".$nombreCliente."-".$pais."</font></div>
                                          <div align='center'><font size='3'>Tipo:".$reg[1]."</font></div>
                                          
                                           <div align='center'><font size='3'>Vence:".$reg[5]."</font></div>
                                      ";  
                                     


                                if($reg[8]=="Facturado")
                                {
                                     echo "  <form action='verFacturas.php' method='post'>
                                          <input type='hidden' name='estatus' value=".$reg[8].">
                                          <input type='hidden' name='factura' value=".$reg[0].">                                          
                                          <input type='hidden' name='ticket' value=".$reg[2].">
                                          <input type='hidden' name='cliente' value=".$reg[3].">
                                          <input type='hidden' name='monto' value=".$reg[6].">
                                          <input type='submit' name='ver' value='Por Cobrar' class='btm_abrirTicket' style='background-color:#d24949; color:white;'>
                                        </form>                  
                                      </div>";
                                }
                                else if($reg[8]=="Reportado")
                                {
                                     echo "  <form action='verFacturas.php' method='post'>
                                          <input type='hidden' name='estatus' value=".$reg[8].">
                                          <input type='hidden' name='factura' value=".$reg[0].">                                          
                                          <input type='hidden' name='ticket' value=".$reg[2].">
                                          <input type='hidden' name='cliente' value=".$reg[3].">
                                          <input type='hidden' name='monto' value=".$reg[6].">
                                          <input type='submit' name='ver' value='Por Confirmar' class='btm_abrirTicket' style='background-color:orange; color:white;'>
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
                echo "<div style='text-align:center;'>No hay Facturas por cobrar</div>";
                }





?>
</div>
<!---------------------------------  FIN LISTA DE FACTURAS---------------------------------------->






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
		session_destroy();		
		header("location:index.php");	
	}
?>	