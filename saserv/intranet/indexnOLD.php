<!DOCTYPE html>
<html lang="es">
<head>
	<title>SystemsAdmins C.A</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" media="all" href="style/mediastyle.css">
</head>

	<style>
       #intranet{
       	height: 300px;
       	width: 510px;
       	margin: 0 auto;
       	padding-top: 100px;
        background-image:url(img/intranet.jpg);
        background-size: auto;
        background-repeat: no-repeat;
        text-align: center;
        }

        #intranet h4{
       	color: red;
        }

        @media (max-width:600px){
	#intranet{
        width: 100%;
        }
}
    </style>  
<body>

<!---------------------------------HEADER-------------------------------->
	<header>
		<article><img src="img/logo.jpg"></article>
		<a href="../">Volver a CsaTestprep</a>
	</header>
<!-------------------------------//HEADER-------------------------------->

<!---------------------------------SECTION-------------------------------->
	<section>
		<div id="intranet">
			
			<form method="post" action="administrar.php">
				<div class="acceso">
					<label>Usuario</label>
					<input type="text" name="user" id="user" />
				</div>
				<div class="acceso">
					<label>Password</label>
					<input type="password" name="password" id="password" />
				</div>
				<div class="acceso">
					<input name="enviar" type="submit" id="enviar" value="Entrar" />
				</div>
				<h4 style="color:white">DATOS DE ACCESO INCORRECTOS</h4>
			</form>
		</div>		
	</section>
<!--------------------------------//SECTION-------------------------------->

<!---------------------------------FOOTER-------------------------------->
	<footer>
		<article><img src="img/logoSA.png" width="100%" height="100%"></article>
	</footer>
<!-------------------------------//FOOTER-------------------------------->
		
</body>
</html>