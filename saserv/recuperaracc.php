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
                  
                  De igual forma lo invitamos a visitar nuestra pagina web www.managercode.com.ve donde con su usuario y su contrasena, usted podra monitorear el estatus de sus facturas, pagos y servicios.
                    
                    Gracias por preferirnos, esperamos brindarles un excelente servicio.
                    
                      ';
              
              
              
                    $para="info@managercode.com.ve";
                    $para2= $_POST['email'];
              
                  
                    
                      $asunto = "Se ha solicitado un cambio de contrasena";
                      $desde = $_POST["emailPersonas"];
                      $mensaje = $body;
                      
                      $cabeceras = "";
                      $cabeceras = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras = "To: " . $_POST ["nombres"] . "\r\n";
                      $cabeceras = "From: " . $_POST ["emailPersonas"] . "\r\n";  
              
              
                      $asunto2  = "Nuevo Password www.managercode.com.ve";
                      $desde2   = $_POST["emailPersonas"];
                      $mensaje2   = $body2;
                      $cabeceras2 = "";
                      $cabeceras2 = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras2 = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras2 = "To: " . $_POST ["emailPersonas"] . "\r\n";
                      $cabeceras2 = "From: " . "info@managercode.com.ve" . "\r\n";    
              
              
                      mail ($para2, $asunto2, $mensaje2, $cabeceras2);   
              
                            
                      mail ($para, $asunto, $mensaje, $cabeceras);
                        

        

                  ?>
                     <script type="text/javascript">
                       window.location="http://managercode.com.ve/recuperaraccok/";
                    </script>
                  <?php

        }
        else
        {



                  ?>
                     <script type="text/javascript">
                       window.location="http://managercode.com.ve/recuperaraccfail/";
                    </script>
                  <?php
        
        } 


  }
  else
  {
    ?>
       <script type="text/javascript">
         window.location="http://managercode.com.ve/recuperaracc/";
      </script>
    <?php
  }


 ?> 