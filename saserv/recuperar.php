<!DOCTYPE html>
<html lang="es">
<head>
	<title>Systems Admins</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style/style.css">
  <link rel="stylesheet" type="text/css" href="style/menu.css">
	<link rel="stylesheet" type="text/css" href="style/registro.css">
  <link rel="stylesheet" type="text/css" media="all" href="style/mediastyle.css">
  <link rel="stylesheet" type="text/css" media="all" href="style/mediastylemenu.css">
  <script src="style/ventanas.js"></script>

	<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  	<script src="SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
  	<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
  	<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
  	<link href="SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />
  	<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />

</head>
<body>
<!----------------------------------------------HEADER---------------------------------->

<header>
  <a href="#" onclick="menu()">
    <div id="contenedorbottonMenu">
      <div id="bottonMenu"></div>
      <div id="systemsAdms">
        <div id="systems">Systems</div>
        <div id="adms">Admins C.A</div>
        <div id="rifMenu">Rif:J-29952662-2</div>
      </div>
    </div>
    </a>
    
  <a href="#" onclick="clientes()">
    <div id="contenedorbottonClientes">
      <div id="cliente"></div>
      <div id="areadeCliente">Clientes</div>
    </div>
  </a>
</header>
<!----------------------------------------------FIN HEADER---------------------------------->

<?php
  require ("menu.php");
  require ("areaCliente.php");
?>


<div id="banner">

<!-------------------------------------------CUERPO PARA EL CONTENIDO-------------------------------------------------------------->


    <div style="width: 100%; text-align: center; margin-top:100px; "><strong><em><font color="#B01600">RECUPERAR CONTRASEÑA</font></em></strong></div>



<?php
  if(isset($_POST['recuperar']))
  {  
    require ("cnx.php");
    $email =$_POST['email'];

    $ssql = "SELECT * FROM usuarios WHERE email='$email'";
    $rs = mysql_query($ssql,$conexion);         
      if (mysql_num_rows($rs)>0)
        {
         
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$email'");
          $oldEmail    =  mysql_result($ssql,0,"email");  

          $largo=5;
          $str = "abcdefghijklmnopqrstuvwxyz";
          $may = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
          $num = "1234567890";
          $cad = "";
          # Comienzo de la generacion de clave.
          $cad = substr($may ,rand(0,24),1);
          $cad .= substr($num ,rand(0,10),1);
          $cad .= substr($num ,rand(0,10),1);
          for($i=0; $i<$largo; $i++) {
          $cad .= substr($str,rand(0,24),1);
          }
          ;


                $body='Se solicitado una contraseña nueva para el cliente 
                E-Mail:   '.$oldEmail.'             
                ';

                $body2 = 'Saludos Cordiales:
              
                Su nueva contraseña para acceder a su cuneta de usario es:                
                   
                    Password: '.$cad.'
                  
                 Recomendamos cambiar su contraseña cuando guste desde su cuenta en la pestaña editar perfil.        
                  
                  De igual forma lo invitamos a visitar nuestra pagina web www.systemsadms.com donde con su usuario y su contrasena, usted podra monitorear el estatus de sus facturas, pagos y servicios.
                    
                    Gracias por preferirnos, esperamos brindarles un excelente servicio.
                    
                      ';
              
              
              
                    $para="systemsadms@hotmail.com";
                    $para2= $_POST['email'];
              
                  
                    
                      $asunto = "Se ha solicitado un cambio de contrasena";
                      $desde = $_POST["emailPersonas"];
                      $mensaje = $body;
                      
                      $cabeceras = "";
                      $cabeceras = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras = "To: " . $_POST ["nombres"] . "\r\n";
                      $cabeceras = "From: " . $_POST ["emailPersonas"] . "\r\n";  
              
              
                      $asunto2  = "Nuevo Password www.systemsadms.com";
                      $desde2   = $_POST["emailPersonas"];
                      $mensaje2   = $body2;
                      $cabeceras2 = "";
                      $cabeceras2 = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras2 = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras2 = "To: " . $_POST ["emailPersonas"] . "\r\n";
                      $cabeceras2 = "From: " . "systemsadms@hotmail.com" . "\r\n";    
              
              
                      mail ($para2, $asunto2, $mensaje2, $cabeceras2);   
              
                            
                      mail ($para, $asunto, $mensaje, $cabeceras);
                        

        

            echo "<div style='text-align:center;'>Su contrasena fue Re-enviada a su direccion de correo electronico.</div>";

        }
        else
        {
          echo "<div style='text-align:center; color:red;'>La direccion de correo electronico colocada no esta registrada...</div>";

                ?>
                  <br>
                  <div style="text-align: center;">Ingrese la direccion email con la cual se registro. </div>
                  <br>
                    <form method="post" action="#">
                    <div style="text-align: center;">
                      <label>Email:</label>
                      <input type="email" name="email" required></input>
                      <br><br>
                      <input type="submit" name="recuperar" value="Recuperar Password"></input>
                    </div>
                    </form>
                  </div>
              <?php
        } 


  }
  else
  {
    ?>
        <div style="text-align: center;">Ingrese la direccion email con la cual se registro. </div>
        <br>
          <form method="post" action="#">
          <div style="text-align: center;">
            <label>Email:</label>
            <input type="email" name="email" required></input>
            <br><br>
            <input type="submit" name="recuperar" value="Recuperar Password"></input>
          </div>
          </form>
        </div>
    <?php
  }


 ?> 


<!--------------------------------------------FIN CUERPO PARA EL CONTENIDO---------------------------------------------->


</div><!----------------------------------------- FIN DEL DIV BANNER  ---------------------------------------------------->


<div id="footerRegistro">FOOTER</div>

</body>
</html>