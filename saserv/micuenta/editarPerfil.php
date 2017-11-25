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


<h3 style="width: 100%; text-align: center;">EDITAR PERFIL</h3>



                   

<?php
            $nick = $_SESSION["login"];
        
              require ("../cnx.php");
              
                $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
                $nombres    =  mysql_result($ssql,0,"nombres");
                $apellidos  =  mysql_result($ssql,0,"apellidos");
                $idCliente  =  mysql_result($ssql,0,"id");
                $cliente    = $nombres." ".$apellidos;
                $telefono   =  mysql_result($ssql,0,"telefono");
                $celular    =  mysql_result($ssql,0,"celular");
                $pais       =  mysql_result($ssql,0,"pais");
                $estado     =  mysql_result($ssql,0,"estado");
                $ciudad     =  mysql_result($ssql,0,"ciudad");
                $dir        =  mysql_result($ssql,0,"dir");
                $zipCode    =  mysql_result($ssql,0,"zipcode");
                $pass       =  mysql_result($ssql,0,"pass");
                $tipoCuenta =  mysql_result($ssql,0,"tipo");
                $encargado  =  mysql_result($ssql,0,"encargado");
                $cargo      =  mysql_result($ssql,0,"cargo");
?>



<!-------------------------------------------------------------- FUNCIONES ARTUALIZAR DATOS Y FUARDAR PASWORD ---------------------------------------------------------->

<?php 
         
                if(isset($_POST['actualizar']))
                {

                          if(isset($_POST['juridico']))
                        {

                          $telefono2 = $_POST['telefono2'];
                          $celular2 = $_POST['celular2'];
                          $pais2 = $_POST['pais2'];
                          $estado2 = $_POST['estado2'];
                          $ciudad2 = $_POST['ciudad2'];
                          $dir2 = $_POST['dir2'];
                          $zipCode2 = $_POST['zipCode2'];
                          $encargado2 = $_POST['encargado2'];
                          $cargo2 = $_POST['cargo2'];

                                require ("../cnx.php"); 
                                $consulta = "UPDATE usuarios SET 
                                telefono ='$telefono2', celular='$celular2', pais='$pais2', estado='$estado2', ciudad='$ciudad2', dir='$dir2', zipcode='$zipCode2', encargado='$encargado2', cargo='$cargo2' WHERE email='$nick'";     
                                $hacerconsulta = mysql_query ($consulta);     

                                echo "<h3 style='color:green;'>Los Datos Fueron Actualizados...</h3>";
                                mysql_close ($conexion);                         
                        }else{


                              $telefono2 = $_POST['telefono2'];
                              $celular2 = $_POST['celular2'];
                              $pais2 = $_POST['pais2'];
                              $estado2 = $_POST['estado2'];
                              $ciudad2 = $_POST['ciudad2'];
                              $dir2 = $_POST['dir2'];
                              $zipCode2 = $_POST['zipCode2'];

                                require ("../cnx.php"); 
                                $consulta = "UPDATE usuarios SET 
                                telefono ='$telefono2', celular='$celular2', pais='$pais2', estado='$estado2', ciudad='$ciudad2', dir='$dir2', zipcode='$zipCode2' WHERE email='$nick'";     
                                $hacerconsulta = mysql_query ($consulta);     

                                echo "<h3 style='color:green;'>Los Datos Fueron Actualizados...</h3>";
                                mysql_close ($conexion);   
                        }

                }




                if(isset($_POST['guardar'])){

                  $oldPassword = $_POST['oldPassword'];
                  $newPassword = $_POST['newPassword'];
                  $newPasswordConfirm = $_POST['newPasswordConfirm'];

                        if ($pass==$oldPassword && $newPassword==$newPasswordConfirm)
                        {
                             require ("../cnx.php"); 
                              $consulta = "UPDATE usuarios SET 
                              pass ='$newPassword' WHERE email='$nick'";     
                              $hacerconsulta = mysql_query ($consulta);

                              echo "<h3 style='color:green;'>Contraseña Actualizada...</h3>";
                        }
                        else
                        {
                              echo "<h3 style='color:red;'>Las Contraseña no Coinciden ...</h3>";
                        }


                }



      
         /*   
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
                    

              echo "Se ha reportado el pago con exito.. <a href='pagosFacturas.php'><font color='green'><b>....Actualizar</b></font></a>";
              */
          

  ?>

<!-------------------------------------------------------------- FIN FUNCIONES ARTUALIZAR DATOS Y FUARDAR PASWORD---------------------------------------------------------->










<!-------------------------------------------------------------- FORMULARIO DE DATOS---------------------------------------------------------->

<div id ="solicitud" style="background-color: rgba(245, 240, 240, 0.6); margin-top: 50px; padding: 10px 0 50px 0; text-align: center; font-size: 15px;">





  <input onclick="verPassword()" class="btm_abrirTicket" type="button"  value="Cambiar Password" style="margin-right: 15px; margin-bottom: 10px; background-color:gray; color: white; width:200px; height: 20px; font-size: 15px; border-radius:10px;"/>



<div id="passwords" class="hidden">
    <form action="#" method="post">

        <input type="password" name="oldPassword" placeholder="Old Password">

        <input type="password" name="newPassword" placeholder="New Password">

        <input type="password" name="newPasswordConfirm" placeholder="Confirm Password">
      

         <input class="btm_abrirTicket" type="submit" name ="guardar" value="Guardar" style="display: inline; margin-right: 15px; margin-bottom: 10px; margin-top: 10px; background-color:green; color: white; width:200px; height: 20px; font-size: 15px; border-radius:10px;"/>
    </form>
</div>




<form method="post" action="#">

<div style="width: 80%; background-color: none; display: inline-block; font-size: 20px; padding-top: 20px; text-align: left; padding-left: 20px;">



                <label style="margin-right: 15px;">Telefono: </label>
                <input type="text" name="telefono2" size="6" value="<?php 
                  if ($telefono == ''){
                    echo'Actualizar...';
                  }
                  else{
                    echo $telefono; 
                  }
                  ?>" style="width: 50%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;"/>

                 <br>

                <label style="margin-right: 25px;">Celular: </label>
                <input type="text" name="celular2" size="6" value="<?php 
                   if ($celular == ''){
                    echo'Actualizar...';
                  }
                  else{
                    echo $celular; 
                  }
                 ?>" style="width: 50%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;"/>

                 <br>


                 <label style="margin-right: 48px;">Pais: </label>
                <input type="text" name="pais2" size="6" value="<?php
                                    if ($pais == ''){
                    echo'Actualizar...';
                  }
                  else{
                    echo $pais; 
                  }
                 ?>" style="width: 50%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;"/>

                 <br>

                 <label style="margin-right: 25px;">Estado: </label>
                <input type="text" name="estado2" size="6" value="<?php 
                                    if ($estado == ''){
                    echo'Actualizar...';
                  }
                  else{
                    echo $estado; 
                  }
                 ?>" style="width: 50%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;"/>

                 <br>

                 <label style="margin-right: 25px;">Ciudad: </label>
                <input type="text" name="ciudad2" size="6" value="<?php 
                                    if ($ciudad == ''){
                    echo'Actualizar...';
                  }
                  else{
                    echo $ciudad; 
                  }
                 ?>" style="width: 50%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;"/>

                 <br>

                <label style="margin-right: 5px;">Direccion: </label>
                <input type="text" name="dir2" size="6" value="<?php 
                                    if ($dir == ''){
                    echo'Actualizar...';
                  }
                  else{
                    echo $dir; 
                  }
                 ?>" style="width: 50%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;"/>

                 <br>


                <label style="margin-right: 7px;">Zip Code:</label>
                <input type="text" name="zipCode2" size="6" value="<?php 
                                    if ($zipCode == ''){
                    echo'Actualizar...';
                  }
                  else{
                    echo $zipCode; 
                  }
                 ?>" style="width: 50%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;"/>

                 <br>



                <?php                

                  if ($tipoCuenta == "2"){
                    ?>


                               <input type='hidden' name='juridico' ?>


                              <label style="margin-right: 5px;">Encargado: </label>
                              <input type="text" name="encargado2" size="6" value="<?php 
                                                  if ($encargado == ''){
                                  echo'Actualizar...';
                                }
                                else{
                                  echo $encargado; 
                                }
                               ?>" style="width: 50%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;"/>

                               <br>


                              <label style="margin-right: 7px;">Cargo:</label>
                              <input type="text" name="cargo2" size="6" value="<?php 
                                                  if ($cargo == ''){
                                  echo'Actualizar...';
                                }
                                else{
                                  echo $cargo; 
                                }
                               ?>" style="width: 50%; height: 50px; border-radius: 5px; font-size: 20px; color: gray; margin-bottom: 10px;"/>

                               <br>



                  <?php
                  }
                ?>

</div>
    <input type='hidden' name='factura' value="<?php echo $factura; ?>">
    <input type='hidden' name='ticket' value="<?php echo $ticket; ?>">            
    <input class="btm_abrirTicket" type="submit" name="actualizar" value="Actualizar Datos" style="margin-bottom: 50px; background-color:#63be33; color: white; width: 40%;" />
    <input class="btm_abrirTicket" type="reset" name="" value="Cacelar" style="margin-bottom: 50px; background-color:red; color: white; width: 40%;" />




  </form>
</div>


<!-------------------------------------------------------------- FIN DE FORMUALARIO DE DATOS---------------------------------------------------------->





           


    
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