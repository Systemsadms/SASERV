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

</head>
<body style="background-image:url(img/cotanera.jpg); background-size:100% 130%; ">
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


<div id="divPlanesDeServicios">




	<p style="color:white;">Planes de Servicio</p>

    <div id="planesContenedor">
      <h3>Soporte Tecnico</h3>
      <div id="imgPortalWeb"></div>

      <ul>
        <li>Equipos Informaticos</li>
        <li>HardWare y Software</li>
        <li>Circuito Cerrado</li>
        <li>Soporte Remoto</li>
        <li>Consultoria Telefonica</li>
        <li>Consultoria via Whatsapp</li>
        <li>Reportes de Servicios</li>
        <li>Estadisticas desde su smartphone</li>
      </ul> 

    <div class="solicitarS">Solicitar Servicio</div>

    </div>


  <div id="planesContenedor"><h3>Comunicaciones</h3>
  <div id="imgDisenoProfesional"></div>
      <ul>
        <li>Redes Locales</li>
        <li>Redes Metropolitanas</li>
        <li>Active Directory</li>
        <li>DHCP Server</li>
        <li>Print Server</li>
        <li>File Server</li>
        <li>Mail Server</li>
        <li>Soporte Remoto</li>
      </ul> 
      <div class="solicitarS">Solicitar Servicio</div>
  </div>


  <div id="planesContenedor"><h3>Diseño Web</h3>
  <div id="imgDisenoWeb"></div>
      <ul>
        <li>Diseño Grafico Digital</li>
        <li>Facebook</li>
        <li>Twitter</li>
        <li>Instagram</li>
        <li>Tuneles de Conversión</li>
        <li>Landing Page</li>
        <li>Email Marketing</li>
        <li>Estadisticas</li>

      </ul> 
      <div class="solicitarS">Solicitar Servicio</div>
  </div>



  <div id="planesContenedor"><h3>Social Marketing</h3>
  <div id="imgDesarrolloCoorporativo"></div>
      <ul>
        <li>Diseño Grafico Digital</li>
        <li>Facebook</li>
        <li>Twitter</li>
        <li>Instagram</li>
        <li>Tuneles de Conversión</li>
        <li>Landing Page</li>
        <li>Email Marketing</li>
        <li>Estadisticas</li>

      </ul> 
      <div class="solicitarS">Solicitar Servicio</div>
  </div>




</div>

<div id="footerPlanesDeServicios">© 2016 Systems Admins. All Rights Reserved.</div>

		
	</body>

</html>