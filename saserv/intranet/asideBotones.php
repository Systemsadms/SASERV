<!-------------------------------ASIDE BOTONES-------------------------------->
<div id="aside">

	<div id="botonera">


<div>OCULTAR MENU</div>


		<a href="home2.php">
		<?php
			require ("cnx.php");

			  $ssql = "SELECT * FROM tickets WHERE estatus='Abierto' AND rs>'0' OR admin='Systems Admins'";
                $rs = mysql_query($ssql,$conexion);     
                if (mysql_num_rows($rs)>0){
                	?>
 							<div class="boton" style="background-color: red;"><img src="img/tickets.png"></div>
							<div style="color: grey;">Tickets</div>
                	<?php
				}
				else{
					?>
							<div class="boton"><img src="img/tickets.png"></div>
							<div style="color: grey;">Tickets</div>
					<?php
				}
		?>
		</a>


		<a href="clientes.php"><div class="boton"><img src="img/cliente.png"></div>
		<div style="color: grey;">Clientes</div></a>

		<a href="facturas.php"><div class="boton"><img src="img/facturas.png"></div>
		<div style="color: grey;">Facturas</div></a>	

		<a href="tecnicos.php"><div class="boton"><img src="img/tecnicos.png"></div>
		<div style="color: grey;">Tecnicos</div></a>

		<a href="pagos.php"><div class="boton"><img src="img/pagos.png"></div>
		<div style="color: grey;">Pagos</div></a>


		<a href="destruir.php">
			<div style="
				width: 30px; 
				height: 30px; 
				display: inline-block;
				border-radius: 5px;
				background-color: #44464c;
				margin-top: 20px;
				cursor: pointer;
				">
					<img src="img/salir4.png" height="30px" width="30px;"></div>
			<div style="color: grey;">Salir</div>
		</a>
	</div>


	<div style="background-color: white; border-top: solid 1px white; border-bottom: solid 1px white;">	
		Power By<img src="img/logoSA.png" width="100%" height="40px">
	</div>

</div>


<!-------------------------------FIN ASIDE BOTONES-------------------------------->
