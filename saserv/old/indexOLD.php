<?php
session_start();
if(isset($_POST['cerrar']))
{
	session_destroy();
		?>	 
	  <script type="text/javascript">
	window.location="index.php";
	</script>    
    <?php	
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Systems Admins</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" media="all" href="style/mediastyle.css">
	<script src="style/ventanas.js"></script>
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


<!----------------------------------------------SECTION---------------------------------->	
	<section id="original" class="show">

		 <?php
			 if(isset ($_POST['entrar']))
			 {
				$nick	   	= 	$_POST['nick'];
				$pass	   	=	$_POST['pass'];
			  	$tipoCuenta =  $_POST['tipoCuenta'];


			    if($tipoCuenta == "client")
			    {
			        require("cnx.php");
			        $ssql = "SELECT * FROM usuarios WHERE email='$nick' and pass='$pass'";
			        $rs = mysql_query($ssql,$conexion);
			            if (mysql_num_rows($rs)==1)
			            {
			              session_start();
			              $_SESSION["login"] = $nick;    
			              mysql_close($conexion); 
			              ?>
			              <script type="text/javascript">
			              window.location="micuenta/";
			              </script>
			              <?php 
			            }
			            else
			            {
			            	?>
								<div style="background-color: white; text-align: center; color: red;">
									(***Usuario o contrasena incorrect@, Intente de nuevo***)
								</div>
			            	<?php     	       
			              mysql_close($conexion);
			            } 
			    }
			    elseif ($tipoCuenta == "admin")
			    {
			       require("cnx.php");
			        $ssql = "SELECT * FROM administradores WHERE email='$nick' and pass='$pass'";
			        $rs = mysql_query($ssql,$conexion);
			            if (mysql_num_rows($rs)==1)
			            {
			              session_start();
			              $_SESSION["administrador"] = $nick;    
			              mysql_close($conexion); 
			              ?>
			              <script type="text/javascript">
			              window.location="admin/";
			              </script>
			              <?php 
			            }
			            else
			            {
			            	?>
								<div style="background-color: white; text-align: center; color: red;">
									(***Administrador o contrasena incorrect@, Intente de nuevo***)
								</div>
			            	<?php     	       
			              mysql_close($conexion);
			            } 
			    }
	
			}						
		?>
	</section>
	

	<section id="sectionMenu" class="hidden">
		<nav>	
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="registro.php">Registrate</a></li>
				<li><a href="#">Portafolio</a></li>
				<li><a href="#">Servicios</a></li>
				<li><a href="#">Planes de Pago</a></li>
				<li><a href="#">Aplicaciones</a></li>
				<li><a href="#">FAQS</a></li>
				<li><a href="#">Tutoriales</a></li>
				<li><a href="#">Nosotros</a></li>
				<li><a href="#">Contactenos</a></li>
			</ul>
		</nav>
	</section>


	<section id="sectionAreaDeClientes" class="hidden">
		<div id="loginmodal">

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
	</section>






	<section id="ventanaServicios" class="hidden">
			<div id="serviciosPagina">
				<a href="solicitarservicios.php"><div id="desarrolloweb">
					<strong>
						<pre class="predesarrollo">  Web<br> Development</pre>
					</strong>
				</div></a>
				<a href="solicitarservicios.php"><div id="dominioyHosting">
					<strong>
						<pre class="predesarrollo">  Domains<br>       and<br>  Hosting</pre>
					</strong>
				</div></a>
				<a href="solicitarservicios.php"><div id="mercadeoSocial">
					<strong>
						<pre class="predesarrollo">  Social<br> Marketing</pre>
					</strong>

				</div></a>
			</div>

			<div id="serviciosSoporte">
				<a href="solicitarservicios.php"><div id="soporteTecnico">
					<strong>
						<pre class="predesarrollo"> Technical<br>   Support</pre>
					</strong>
				</div></a>
				<a href="solicitarservicios.php"><div id="cCTV">
					<strong>
						<pre class="predesarrollo">   CCTV </strong><br><font class="textcctv">  (Circuito cerrado de television)</font></pre>
					</strong>
				</div></a>
				<a href="solicitarservicios.php"><div id="network">
					<strong>
						<pre class="predesarrollo"> Network</pre>
					</strong>
				</div>
			</div></a>
	</section>


	<section id="sectionContactanos" class="hidden">
			<div id="formularioContactenos">
				<div id="informacion">
					<div id="telefono">
						<strong>
							<pre class="tituloscontacto"><br>(+58)212 3101971<br>(+58)212 3109813</pre>
						</strong>
					</div>
					<div id="email">
						<strong>
							<pre class="tituloscontacto"><br><br>        servicios@systemsadms.com</pre>
						</strong>
					</div>
					<div id="correo">
						<strong>
							<pre class="tituloscontacto"><br><br>        servicios@systemsadms.com</pre>
						</strong>
					</div>
				</div>

				<br>

				<font style="color: white; font-size: 24px; ">Contactanos</font>
				<form>									
					<input class="inputc" type="text" placeholder="Direccion email"></input>
					<br>
					<input class="inputc" type="text" placeholder="Persona contacto"></input>
					<br>
					<input class="inputc" type="text" placeholder="Telefono. +00 000 000000"></input>
					<br>
					<textarea id="area" class="inputc" placeholder="Mensaje" ></textarea>
					<br>
					<input  id="bottonsubmit"  type="submit" value="Enviar Mensaje"></input>
				</form>
			</div>
	</section>
<!----------------------------------------------FIN SECTION---------------------------------->


<!----------------------------------------------FOOTER---------------------------------->
	<footer>
		<a href="#" onclick="servicios()">
			<div id="bottonServicios">		
				<div id="servicios">
					<div id="imgServicios"></div>
					<div class="textFooter1">SERVICIOS</div>
				</div>
			</div>
		</a>
		
		<a href="planes">
		<div id="bottonPlanesdepago">	
			<div id="planesdepago">
				<div id="imgPlanesdepago"></div>
				<div class="textFooter2">PLANES DE SERVICIO</div>
			</div>
		</div>
		</a>

		<a href="#" onclick="contacto()">
			<div id="bottonContactenos">
				<div id="contactenos">
					<div id="imgContactenos"></div>
					<div class="textFooter1">CONTACTENOS</div>
				</div>	
			</div>
		</a>
	</footer>
<!----------------------------------------------FIN FOOTER---------------------------------->
</body>
</html>
