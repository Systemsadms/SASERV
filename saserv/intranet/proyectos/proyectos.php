<?php
	session_start();
	if ($_SESSION['admin'] == 'saadmin')
		{
			include ("../cnx.php");					
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>SystemsAdmins C.A</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<link rel="stylesheet" type="text/css" media="all" href="../style/mediastyle.css">
</head>

	<style>


		section{
			height: auto;
			min-height: 60%;
			text-align: center;
			background-color:#D8D8D8;			
			margin: 0;
			padding: 0;			
		}

		#filtroUsuarios{
			height: auto;
			width: 600px;
			min-height: 40px;
			background-color: grey;
			padding-top: 8px;
			border: 1px solid black;
			border-top:none ;
			text-align: left;
			padding-left: 5px;
			display: inline-block;
		}

		#abrirUsuario{
			height: auto;
			width: 230px;
			min-height: 40px;
			background-color: grey;
			padding-top: 8px;
			border: 1px solid black;
			border-top:none ;
			text-align: left;
			padding-left: 5px;
			display: inline-block;
		}

		.margen{margin-left: 5px;}

		aside{			
			min-width: 250px;
			width: auto;
			max-width: 400px;
			height: auto;
			padding-left: 20px;			
			text-align: left;
			display: inline-block;
			border-radius: 5px;
			padding-bottom:20px; 
			background-color: green;
		}

		aside div{
			margin-top: 20px;
		}

		#botonera{
			width: 250px;
			height: auto;			
			display: inline-block;
			background-color: none;
			vertical-align: top;
		}

		
		#boton{
			height: 50px;
			width: 200px;
			border-radius: 5px;
			background-color: blue;
			color: white;			
			margin: 3px;
			vertical-align: top;
			padding-top: 10px;
		}

		.boton{
			height: 50px;
			width: 200px;
			border-radius: 5px;
			background-color: blue;
			color: white;
			font-size: 0.9em;
			margin-top: 5px;
			padding: 0;
			cursor: pointer;
		}

		#boton a{
			color: white;
			text-decoration: none;
		}

		#cajaJs{
			width: 100%;
			height: auto;
			background-color: none;			
		}


    </style>  
<body>


<!---------------------------------HEADER-------------------------------->
	<header>
		<article><img src="../img/logoSA.png" height="100%" width="100%"></article>
		<a href="../home.php">Home</a> / <a href="index.php">Proyectos</a> / <a href="../destruir.php">Cerrar Session</a>
	</header>
<!-------------------------------//HEADER-------------------------------->


<!---------------------------------SECTION-------------------------------->
<section>


		
					<?php
						if(isset($_POST['facturar']))							
						{
							require ("../cnx.php");
							$idProyecto = $_POST['idProyecto'];

							$consultaUpdate = "UPDATE proyectos  SET estatus='Por facturar' WHERE id='$idProyecto'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
							?>
								<div id="cajaJs">
									<br>
									<font color="red">
										El Proyecto ha sido facturado.
									</font>
									<br><br>
								</div>
							<?php							
						}						
						elseif(isset($_POST['renovar']))
						{
							
							require ("../cnx.php");
							$idProyecto = $_POST['idProyecto'];

							$ssql 		= mysql_query("SELECT * FROM proyectos WHERE id='$idProyecto'");
							$inicio		= mysql_result($ssql,0,"inicio");		
							$vence		= mysql_result($ssql,0,"vence");

							?>
								<div id="cajaJs">
									<br>
										<label><b>Inicio: <?php echo $inicio; ?></b></label>
										<br>
										<label><b>Vence: <?php echo $vence; ?></b></label>
										<br><br>
										<label>Nueva Fecha de Inicio</label>
										<br>
										<form method="post" action="#">
										<input type="text" name="nInicio" size="6" placeholder="dd-mm-yy">
										<br>
										<label>Nueva Fecha de Vencimiento</label>
										<br>
										<input type="text" name="nVence" size="6" placeholder="dd-mm-yy">
										<br><br>
										<input type="hidden" name="idProyecto" value="<?php echo $idProyecto; ?>"/>
										<input type="submit" name="renovarFecha" value="Guardar Cambios">
										</form>

									<br><br>
								</div>
								
							<?php							
						}
						elseif(isset($_POST['vencido']))
						{
							require ("../cnx.php");
							$idProyecto = $_POST['idProyecto'];

							$consultaUpdate = "UPDATE proyectos  SET estatus='Vencido' WHERE id='$idProyecto'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
							?>
								<div id="cajaJs">
									<br>
									<font color="red">
										El Proyecto ha sido Caducado.
									</font>
									<br><br>
								</div>
							<?php								
						}						
						elseif(isset($_POST['cancelar']))
						{
							require ("../cnx.php");
							$idProyecto = $_POST['idProyecto'];

							$consultaUpdate = "UPDATE proyectos  SET estatus='Cancelado' WHERE id='$idProyecto'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
							?>
								<div id="cajaJs">
									<br>
									<font color="red">
										El Proyecto ha sido cancelado.
									</font>
									<br><br>
								</div>
							<?php			
						}
						elseif(isset($_POST['renovarFecha']))
						{
							require ("../cnx.php");
							$idProyecto = $_POST['idProyecto'];
							$nInicio = $_POST['nInicio'];
							$nVence = $_POST['nVence'];

							
							$consulta = "UPDATE proyectos SET vence='$nVence', inicio='$nInicio', estatus='Activo' WHERE id='$idProyecto'" ;	
							$hacerconsulta = mysql_query ($consulta);
							?>
								<div id="cajaJs">

								<?php 
								echo $nInicio;
								echo "<br><br>";
								echo $nVence;
								?>
									<br>
									<font color="red">
										Las fechas de vencimiento del proyecto han sido renovadas.
									</font>
									<br><br>
								</div>
							<?php			
						}
						elseif(isset($_POST['atras']))
						{
							?>
								<script type="text/javascript">							    
							      	document.location = 'index.php';
							  	</script>
							<?php
						}

					
					?>
				

<!------------------------------------------------------------------------------------------------------------------------>

<?php	
	$idProyecto = $_POST['idProyecto'];
	require ("../cnx.php");


	$ssql = "SELECT * FROM proyectos WHERE id='$idProyecto'";
	$rs = mysql_query($ssql,$conexion);			
		if (mysql_num_rows($rs)>0)
		{

			$ssql 		= mysql_query("SELECT * FROM proyectos WHERE id='$idProyecto'");			
			$idCliente	= mysql_result($ssql,0,"cliente");			
			$area		= mysql_result($ssql,0,"area");
			$titulo		= mysql_result($ssql,0,"titulo");			
			$monto		= mysql_result($ssql,0,"monto");
			$pagos		= mysql_result($ssql,0,"pagos");
			$resumen	= mysql_result($ssql,0,"resumen");
			$vence		= mysql_result($ssql,0,"vence");
			$inicio		= mysql_result($ssql,0,"inicio");
			$estatus	= mysql_result($ssql,0,"estatus");



			$ssql 		= mysql_query("SELECT * FROM usuarios WHERE id='$idCliente'");			
			$nombres	= mysql_result($ssql,0,"nombres");
			$apellido	= mysql_result($ssql,0,"apellidos");
			$pais		= mysql_result($ssql,0,"pais");
			$estado		= mysql_result($ssql,0,"estado");
			$ciudad		= mysql_result($ssql,0,"ciudad");
			$dir		= mysql_result($ssql,0,"dir");
			?>

				<aside>
					<h2>Datos del Tickets</h2>

					<div><strong>ID Proyecto:</strong> <?php echo $idProyecto; ?></div>
					<div><strong>Estatus:</strong> <?php echo $estatus; ?></div>
					<div><strong>Cliente:</strong> <?php echo $nombres . " ". $apellido; ?></div>
					<div><strong>Area:</strong> <?php echo $area; ?></div>
					<div><strong>Enunciado:</strong> <?php echo $titulo; ?></div>					
					<div><strong>Inicio:</strong> <?php echo $inicio; ?></div>
					<div><strong>Vence:</strong> <?php echo $vence; ?></div>					
					<div><strong>Monto:</strong> <?php echo $monto; ?></div>
					<div><strong>Pagos:</strong> <?php echo $pagos; ?></div>
					<div><strong>Descripcion:</strong> <?php echo $resumen; ?></div>

					<br>
					<font color="white">Localizacion de Cliente</font>
					<hr>
					<div><strong>Pais:</strong> <?php echo $pais; ?></div>
					<div><strong>Estado:</strong> <?php echo $estado; ?></div>
					<div><strong>Ciudad:</strong> <?php echo $ciudad; ?></div>
					<div><strong>Dir:</strong> <?php echo $dir; ?></div>
										
					
					
					
					

				</aside>
				
				<div id="botonera">
					<form method="post" action="#">
						<input type="hidden" name="idProyecto" value="<?php echo $idProyecto; ?>"></input>
						<input type="submit" name="renovar" class="boton" value="Renovar"  />
						<input type="submit" name="facturar" class="boton" value="Facturar"  />
						<input type="submit" name="vencido" class="boton" value="Caducar"  />
						<input type="submit" name="cancelar" class="boton" value="Cancelar"  />
						<input type="submit" name="atras" class="boton" value="Volver"  />			
					</form>
				</div>
			<?php

		}
		else
		{
			echo "Lo lamentamos por seguridad, la ventana ha sido cerrarda, vuelva  a abrir el ticket y realice la gestion deseada";
			echo "<br><br>";	
			echo "<a href='index.php'>VOLVER A TICKETS</a>";		
		}
		
?>
</section>
<!-------------------------------//SECTION-------------------------------->



<!---------------------------------FOOTER-------------------------------->
	<footer>
		<!--<article><img src="../img/logoSA.png" width="100%" height="100%"></article>-->
	</footer>
<!--------------------------------//FOOTER-------------------------------->	




</body>
</html>
<?php			
	}else	
	{			
		session_destroy();		
		header("location:../index.php");	
	}
?>	