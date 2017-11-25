<div id="loginmodal" class="hidden" style="position:absolute; right:0px; z-index:100;">

      <?php   
        if (isset($_SESSION["login"]))
      {
        $micuenta=$_SESSION["login"]; 
        ?>          
              <div id="iramiCuenta"><a href="micuenta.<?php  ?>">Ir a mi cuenta</a><br><br><a href="destruir.php">Cerrar Session</a></div>
            <div id="social">
                 <a href=""><img src="iconos/twit.png" width="50" height="43" /></a>
                 <a href=""><img src="iconos/face.png" width="50" height="43" /></a>
                 <a href=""><img src="iconos/google.png" width="50" height="43" /></a>
            </div>    
      <?php
            }
        else
            {  
          ?>
            <form method="post" action="#" >
             <br>
                      <div id="tipo">
                            <input type="radio" name="tipoCuenta" value="client" checked />
                            <label>Cliente</label>
                            <input type="radio" name="tipoCuenta" value="admin"/>    
                            <label>Administrador</label>
                        </div>                
                      <br>
                            
                      <div id="camposlogin">
                            <label>Usuario</label><br> 
                            <input class="inputareadeClientes" type="text" class="textbox" name="nick"/> 
                            <br>              
                            <label>Password</label><br> 
                            <input class="inputareadeClientes" type="password" class="textbox" name="pass"/>
                            <br><br>
                            <input type="submit" class="textbox" name="entrar" size="35" value="Iniciar Session"/>  
                        </div>
           </form>         
             
             <div id="registro">
                 <em><a href="registro.php">Registrate</a>         
                 <em><a style="cursor:pointer;" href="recuperar.php"><p>Recuperar Contraseña</p></a></em>
             </div>

             <div id="social">
                 <a href=""><img src="iconos/twit.png" width="45" height="43" /></a>
                 <a href=""><img src="iconos/face.png" width="45" height="43" /></a>
                 <a href=""><img src="iconos/google.png" width="45" height="43" /></a>
             </div>  
        <?php
      }
      ?>
    </div>