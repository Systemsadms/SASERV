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
		#cajaImagenHome{
			height: 200px;
			width: 200px;
			border-radius: 5px;
			background-color: red;
			display: inline-block;
			margin: 3px;		
		}

		section{
			height: auto;
			min-height: 60%;
			text-align: center;
			background-color:#D8D8D8;
			margin: 0;
			padding:0;			
		}

		#filtroUsuarios{
			height: auto;
			width: 505px;
			min-height: 40px;
			background-color: grey;
			padding-top: 8px;
			border: 1px solid black;
			border-top:none ;
			text-align: left;
			padding-left: 5px;
			display: inline-block;
		}

		#crearTicket{
			height: auto;
			width: 155px;
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
<body>

<!---------------------------------HEADER-------------------------------->
	<header>
		<article><img src="../img/logoSA.png" width="100%" height="100%"></article>
		<a href="../home.php">Home</a> / <a href="../destruir.php">Cerrar Session</a>
	</header>
<!-------------------------------//HEADER-------------------------------->


<!---------------------------------SECTION-------------------------------->
	<section>
		<div id="filtroUsuarios">
			<form method="post" action="#">
				<div style="display: inline-block;">
					<label>Buscar Proyectos por:</label>
					<select name="filtro" id="filtro">				
						<option>ID</option>
						<option>Activo</option>
						<option>Vencido</option>
						<option>Por Facturar</option>
						<option>Facturado</option>						
						<option>Pagado</option>
						<option>Cancelado</option>
					</select>
				</div>

				<div style="display: inline-block;">
					<label class="margen">Area:</label>
					<select name="dato" id="dato">			
						<option>Todos</option>
						<option>Dominios</option>
	                    <option>Hosting</option>
	                    <option>Desarrollo Web</option>
	                    <option>Diseno Grafico</option>
	                    <option>Social</option>					
	 					<option>Sistemas</option>
	                    <option>Redes</option>
	                    <option>Soporte</option>                    
	                    <option>CCTV</option>
					</select>
				</div>

				<div style="display: inline-block;">
					<input name="buscar" type="submit" id="dato" value="Buscar"/>
				</div>					
				</div>
			</form>

		<div id="crearTicket">
			<form method="post" action="#">
				<div style="display: inline-block;">					
					<input type="submit" name="crear" id="crear" value="NUEVO PROYECTO"/>					
				</div>
			</form>
		</div>

	<?php 
			if(isset($_POST['id']))
			{

				date_default_timezone_set('America/La_Paz');

					$cliente =$_POST['id'];

						require("../cnx.php");
						$ssql = "SELECT * FROM usuarios WHERE id='$cliente'";
						$rs = mysql_query($ssql,$conexion);			
								if (mysql_num_rows($rs)>0)
									{
													$area		=$_POST['area'];
													$cliente 	=$_POST['id'];													
													$titulo		=$_POST['enunciado'];
													$monto	 	=$_POST['monto']." ".$_POST['moneda'];
													$pagos	 	=$_POST['pagos'];
													$vence 		=$_POST['vence'];
													$resumen 	=$_POST['mensaje'];
													$estatus 	="Activo";													
													$fecha	 	=date("j-n-y");
					
														
										mysql_query ("INSERT INTO proyectos VALUES 
										('', '$area','$cliente','$titulo','$monto','$pagos','$vence','$resumen','$fecha','$estatus')");										
										mysql_close ($conexion);	

										echo "<br><br>";
										echo "El Proyecto ha sido cargado con Exito";
										echo "<br><br>";
										echo "<a href='index.php'>ACTUALIZAR</a>";
									}else
									{
										echo "<br><br>";
										echo "<b><font color='red'>***El ID de USUARIO ingresado no existe en nuestra base de datos <br>(IMPORTANTE) verifique que el ID Cliente ingresado sea el mismo que el expuesta en la lista cliente segun su seleccion***</font></b>";
										
									}	

			}					
			else
			{
					require("filtros.php");
				
			}

		
	?>
		





	






<script>
function validarCampos(){

    var text=document.forms['crearNuevoP'].id.value.length;

    var text2=document.forms['crearNuevoP'].enunciado.value.length;

    var text3=document.forms['crearNuevoP'].monto.value.length;

    var text4=document.forms['crearNuevoP'].vence.value.length;

    var text5=document.forms['crearNuevoP'].mensaje.value.length;

    if(text==0) {
        document.forms['crearNuevoP'].id.focus();   
        document.getElementById("validarId").innerHTML = "*ID*";
        document.getElementById("validarId").style.color = "white";
    }
    else if(text2==0) 
    {
        document.forms['crearNuevoP'].enunciado.focus();   
        document.getElementById("validarEnunciado").innerHTML = "*Enunciado*";
        document.getElementById("validarEnunciado").style.color = "white";
    }
    else if(text3==0) 
    {
        document.forms['crearNuevoP'].monto.focus();   
        document.getElementById("validarMonto").innerHTML = "*Monto*";
        document.getElementById("validarMonto").style.color = "white";
    }
    else if(text4==0) 
    {
        document.forms['crearNuevoP'].vence.focus();   
        document.getElementById("validarVence").innerHTML = "*Vence*";
        document.getElementById("validarVence").style.color = "white";
    }
    else if(text5==0) 
    {
        document.forms['crearNuevoP'].mensaje.focus();   
        document.getElementById("validarDescripcion").innerHTML = "*Descripcion*";
        document.getElementById("validarDescripcion").style.color = "white";
    }
    else
    {
    	document.forms['crearNuevoP'].submit();
    }

}

</script>







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