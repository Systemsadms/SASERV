<?php


include ("cnx.php");
  

  
  $tipo = $_POST['tipo'];


  
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




if ($tipo == "Personas")
  {


              $tipo     = 1;
              $nombres  = $_POST['nombres'];
              $apellidos  = $_POST['apellidos'];
              $rif    = "No aplica";
              $email    = $_POST['emailPersonas'];
              $pass   = $cad;
              $celular  = "Act";//$_POST['celularPersonas'];
              $telefono = $_POST['telefonoPersonas'];
              $pais   = $_POST['paisPersonas'];
              $estado   = "Act";//$_POST['estadoPersonas'];
              $ciudad   = "Act";//$_POST['ciudadPersonas'];
              $dir    = "Act";//$_POST['dirPersonas'];
              $zipcode  = "Act";//$_POST['zipCodePersonas'];
              $encargado  = "No aplica";
              $cargo    = "No aplica";
              $como   = $_POST['comoPersonas'];
              $fecha    = date("y-n-j");
              
              mysql_select_db ($baseDeDatos, $conexion);
              $consulta   = "SELECT * FROM usuarios WHERE email='$email'";
              $hconsulta  = mysql_query ($consulta, $conexion);
              
              if (mysql_num_rows($hconsulta)>0)
              {
                ?>
                                  <script type="text/javascript">
                                  window.location="http://managercode.com.ve/cuentaregistrada/";
                                  </script>
               <?php 
              }
              else
              {
                mysql_query ("INSERT INTO usuarios VALUES ('','$tipo','$nombres','$apellidos','$rif','$email','$pass','$telefono','$celular','$pais','$estado','$ciudad','$dir','$zipcode','$encargado','$cargo','$como','$fecha','noConfirmado')");
                
                mysql_close ($conexion);
                
                
                
                
                
                  //Enviar email a correo
                  
              
                
                $body='Se ha registrado un Nuevo Usuario (Persona Natural)                
                Nombres:  '.$_POST['nombres'].'
                Apellidos:  '.$_POST['apellidos'].'
                Pais:     '.$_POST['paisPersonas'].'
                Estado:   '.$_POST['estadoPersonas'].'
                Ciudad:   '.$_POST['ciudadPersonas'].'
                E-Mail:   '.$_POST['emailPersonas'].'
                Celular:  '.$_POST['celularPersonas'].'
                Telefono:   '.$_POST['telefonoPersonas'].'
                Direccion:  '.$_POST['dirPersonas'].'
                
                ';

                $body2 = 'Saludos Cordiales:
              
                Sr(a). '.$_POST['nombres'].', es un gusto para nosotros que usted forme parte de nuestra cartera de clientes. Su usuario y su password para acceer a su cuenta son los siguientes:
                
                    Usuario:  '.$_POST['emailPersonas'].'
                    Password: '.$cad.'
                  
                 Usted puede cambiar su contraseña cuando guste desde su cuenta en la pestaña editar perfil.        
                  
                  De igual forma lo invitamos a visitar nuestra pagina web www.managercode.com.ve donde con su usuario y su contrasena, usted podra monitorear el estatus de sus facturas, pagos y servicios.
                    
                    Gracias por preferirnos, esperamos brindarles un excelente servicio.
                    
                      ';
              
              
              
                    $para="managercode@hotmail.com";
                    
              
                  
                    
                      $asunto = "Nuevo Registro de Usuario";
                      $desde = $_POST["emailPersonas"];
                      $mensaje = $body;
                      
                      $cabeceras = "";
                      $cabeceras = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras = "To: " . $_POST ["nombres"] . "\r\n";
                      $cabeceras = "From: " . $_POST ["emailPersonas"] . "\r\n";  

                    mail ($para, $asunto, $mensaje, $cabeceras);


              
                    $para2= $_POST['emailPersonas'];

                      $asunto2  = "Bienvenido a Manager Code C.A";
                      $desde2   = $_POST['emailPersonas'];
                      $mensaje2   = $body2;
                      $cabeceras2 = "";
                      $cabeceras2 = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras2 = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras2 = "To: " . $_POST['emailPersonas'] . "\r\n";
                      $cabeceras2 = "From: " . "info@managercode.com" . "\r\n";    
              
              
                      mail ($para2, $asunto2, $mensaje2, $cabeceras2);   
              
        
                        ?>
                                              <script type="text/javascript">
                                              window.location="http://managercode.com.ve/registrosuccessfull/";
                                              </script>
                            <?php 
    
              }//FIN DE IF NUM ROWS DE PERSONA NATURAL
        
  }//FIN DEL IF PERSONA NATURAL











          elseif ($tipo == 'Empresas')
          {

            
              $tipo     = 2;
              $nombres  = $_POST['nombres'];
              $apellidos  = "No Aplica";
              $rif    = $_POST['rif'];
              $email    = $_POST['emailPersonas'];
              $pass   = $cad;
              $celular  = "Act";//$_POST['celularPersonas'];
              $telefono = $_POST['telefonoPersonas'];
              $pais   = $_POST['paisPersonas'];
              $estado   = "Act";//$_POST['estadoPersonas'];
              $ciudad   = "Act";//$_POST['ciudadPersonas'];
              $dir    = "Act";//$_POST['dirPersonas'];
              $zipcode  = "Act";//$_POST['zipCodePersonas'];
              $encargado  = $_POST['encargado'];
              $cargo    = $_POST['cargo'];
              $como   = $_POST['comoPersonas'];
              $fecha    = date("y-n-j");
              

               
              mysql_select_db ($baseDeDatos, $conexion);
              $consulta   = "SELECT * FROM usuarios WHERE email='$email'";
              $hconsulta  = mysql_query ($consulta, $conexion);
              
              if (mysql_num_rows($hconsulta)>0)
              {

                ?>
                                  <script type="text/javascript">
                                  window.location="http://managercode.com.ve/cuentaregistradae/";
                                  </script>
               <?php 
              }
              else
              {

                mysql_query ("INSERT INTO usuarios VALUES ('','$tipo','$nombres','$apellidos','$rif','$email','$pass','$telefono','$celular','$pais','$estado','$ciudad','$dir','$zipcode','$encargado','$cargo','$como','$fecha','noConfirmado')");
                
                mysql_close ($conexion);


                   



                  //Enviar email a correo
                  
              
                
                $body='Se ha registrado un Nuevo Usuario (Empresa)                
                Nombres:  '.$_POST['nombres'].'
                Apellidos:  '.$_POST['rif'].'
                Pais:     '.$_POST['paisPersonas'].'                
                E-Mail:   '.$_POST['emailPersonas'].'
                Celular:  '.$_POST['celularPersonas'].'
                Telefono:   '.$_POST['telefonoPersonas'].'
                Encargado:   '.$_POST['encargado'].'
                Cargo:  '.$_POST['cargo'].'
                
                ';

                $body2 = 'Saludos Cordiales:
              
                Sr(a). '.$_POST['nombres'].', es un gusto para nosotros que usted forme parte de nuestra cartera de clientes. Su usuario y su password para acceer a su cuenta son los siguientes:
                
                    Usuario:  '.$_POST['emailPersonas'].'
                    Password: '.$cad.'
                  
                 Usted puede cambiar su contrasena cuando guste desde su cuenta en la pestana editar perfil.        
                  
                  De igual forma lo invitamos a visitar nuestra pagina web www.managercode.com.ve donde con su usuario y su contrasena, usted podra monitorear el estatus de sus facturas, pagos y servicios.
                    
                    Gracias por preferirnos, esperamos brindarles un excelente servicio.
                    
                      ';
              
              
              
                    $para="managercode@hotmail.com";
                    
              
                  
                    
                      $asunto = "Nuevo Registro de Usuario";
                      $desde = $_POST["emailPersonas"];
                      $mensaje = $body;
                      
                      $cabeceras = "";
                      $cabeceras = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras = "To: " . $_POST ["nombres"] . "\r\n";
                      $cabeceras = "From: " . $_POST ["emailPersonas"] . "\r\n";  

                    mail ($para, $asunto, $mensaje, $cabeceras);


              
                    $para2= $_POST['emailPersonas'];

                      $asunto2  = "Bienvenido a Manager Code C.A";
                      $desde2   = $_POST['emailPersonas'];
                      $mensaje2   = $body2;
                      $cabeceras2 = "";
                      $cabeceras2 = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras2 = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras2 = "To: " . $_POST['emailPersonas'] . "\r\n";
                      $cabeceras2 = "From: " . "info@managercode.com" . "\r\n";    
              
              
                      mail ($para2, $asunto2, $mensaje2, $cabeceras2);


                       ?>
                      <script type="text/javascript">
                             window.location="http://managercode.com.ve/registrosuccessfull/";
                      </script>
                    <?php 



              }


                 /*
              else
              {
                echo "Registrar";

              }
                mysql_query ("INSERT INTO usuarios VALUES ('','$tipo','$nombres','$apellidos','$rif','$email','$pass','$telefono','$celular','$pais','$estado','$ciudad','$dir','$zipcode','$encargado','$cargo','$como','$fecha','noConfirmado')");
                
                mysql_close ($conexion);
                
                
                
             
                
                  //Enviar email a correo
                  
              
                
                $body='Se ha registrado un Nuevo Usuario (Empresa)                
                Nombres:  '.$_POST['nombres'].'
                Apellidos:  '.$_POST['rif'].'
                Pais:     '.$_POST['paisPersonas'].'                
                E-Mail:   '.$_POST['emailPersonas'].'
                Celular:  '.$_POST['celularPersonas'].'
                Telefono:   '.$_POST['telefonoPersonas'].'
                Encargado:   '.$_POST['encargado'].'
                Cargo:  '.$_POST['cargo'].'
                
                ';

                $body2 = 'Saludos Cordiales:
              
                Sr(a). '.$_POST['nombres'].', es un gusto para nosotros que usted forme parte de nuestra cartera de clientes. Su usuario y su password para acceer a su cuenta son los siguientes:
                
                    Usuario:  '.$_POST['emailPersonas'].'
                    Password: '.$cad.'
                  
                 Usted puede cambiar su contrasena cuando guste desde su cuenta en la pestana editar perfil.        
                  
                  De igual forma lo invitamos a visitar nuestra pagina web www.managercode.com.ve donde con su usuario y su contrasena, usted podra monitorear el estatus de sus facturas, pagos y servicios.
                    
                    Gracias por preferirnos, esperamos brindarles un excelente servicio.
                    
                      ';
              
              
              
                    $para="managercode@hotmail.com";
                    
              
                  
                    
                      $asunto = "Nuevo Registro de Usuario";
                      $desde = $_POST["emailPersonas"];
                      $mensaje = $body;
                      
                      $cabeceras = "";
                      $cabeceras = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras = "To: " . $_POST ["nombres"] . "\r\n";
                      $cabeceras = "From: " . $_POST ["emailPersonas"] . "\r\n";  

                    mail ($para, $asunto, $mensaje, $cabeceras);


              
                    $para2= $_POST['emailPersonas'];

                      $asunto2  = "Bienvenido a Manager Code C.A";
                      $desde2   = $_POST['emailPersonas'];
                      $mensaje2   = $body2;
                      $cabeceras2 = "";
                      $cabeceras2 = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras2 = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras2 = "To: " . $_POST['emailPersonas'] . "\r\n";
                      $cabeceras2 = "From: " . "info@managercode.com" . "\r\n";    
              
              
                      mail ($para2, $asunto2, $mensaje2, $cabeceras2);   
            
                      



                        ?>
                                              <script type="text/javascript">
                                              window.location="http://managercode.com.ve/registrosuccessfull/";
                                              </script>
                            <?php 
            */
          }
          

?>

































































