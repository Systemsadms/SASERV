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


<?php
  require ("menu.php");
  require ("areaCliente.php");
?>
        




    
       


<!----------------------------------------------FIN HEADER---------------------------------->

<div id="contenidoGeneral">
	<div id="contenidoDesarrolloWeb">
		<div class="escrituraContenidoDerecha"><p style="margin-top: 2em; font-size: 2em; color: #333;">Desarrollo Web a Medida</p>
		<p style="font-size: 1.5em;  line-height:2em; color: #767676;">Si ya sabes que tu empresa necesita un sitio web para promover sus servicios o productos, aqui estamos nosotros para diseñarlo de forma que sea visualmente atractivo y garantice el exito de su negocio en mundo digital.</p>
		<a href="#"><div class="bottonSolicitarServicio">Solicitar Servicio</div></a>
		</div>
	</div>
	<div id="contenidoDominioyHosting">
		<div class="escrituraContenidoIzquierda"><p style="margin-top: 2em; font-size: 2em;">Domains and Hosting</p>
		<p style="font-size: 1.5em;  line-height:2em;">Si ya sabes que tu empresa necesita un sitio web para promover sus servicios, aqui estamos nosotros para diseñarlo de forma que sea visualmente atractivo y garantice el exito de su negocio</p>
		<a href="#"><div class="bottonSolicitarServicio">Solicitar Servicio</div></a>
		</div>
	</div>
	<div id="contenidoMercadeoSocial">
		<div class="escrituraContenidoDerecha"><p style="margin-top: 2em; font-size: 2em; color: #333;">Social Marketing</p>
		<p style="font-size: 1.5em;  line-height:2em; color: #767676;">Si ya sabes que tu empresa necesita un sitio web para promover sus servicios, aqui estamos nosotros para diseñarlo de forma que sea visualmente atractivo y garantice el exito de su negocio</p>
		<a href="#"><div class="bottonSolicitarServicio">Solicitar Servicio</div></a>
		</div>
	</div>
	<div id="contenidoSoporteTecnico">
		<div class="escrituraContenidoIzquierda"><p style="margin-top: 2em; font-size: 2em;">Soporte Tecnico</p>
		<p style="font-size: 1.5em;  line-height:2em;">Si ya sabes que tu empresa necesita un sitio web para promover sus servicios, aqui estamos nosotros para diseñarlo de forma que sea visualmente atractivo y garantice el exito de su negocio</p>
		<a href="#"><div class="bottonSolicitarServicio">Solicitar Servicio</div></a>
		</div>
	</div>
	<div id="contenidoCCTV">
		<div class="escrituraContenidoDerecha"><p style="margin-top: 2em; font-size: 2em; color: #333;">Social Marketing</p>
		<p style="font-size: 1.5em;  line-height:2em; color: #767676;">Si ya sabes que tu empresa necesita un sitio web para promover sus servicios, aqui estamos nosotros para diseñarlo de forma que sea visualmente atractivo y garantice el exito de su negocio</p>
		<a href="#"><div class="bottonSolicitarServicio">Solicitar Servicio</div></a>
		</div>
	</div>
	<div id="contenidonetwork">
		<div class="escrituraContenidoIzquierda"><p style="margin-top: 2em; font-size: 2em;">Soporte Tecnico</p>
		<p style="font-size: 1.5em;  line-height:2em;">Si ya sabes que tu empresa necesita un sitio web para promover sus servicios, aqui estamos nosotros para diseñarlo de forma que sea visualmente atractivo y garantice el exito de su negocio</p>
		<a href="#"><div class="bottonSolicitarServicio">Solicitar Servicio</div></a>
		</div>
	</div>


	<div id="footerPlanesDeServicios">© 2016 Systems Admins. All Rights Reserved.</div>

</div>




</body>
</html>
