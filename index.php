<?php session_start();?>
<!doctype html>
<html>
<head>	
	<title>Gestion de Estacionamiento</title>
	<meta lang="es">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilo.css"/>
	<link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>

	 <!--Lógica-Programación-->    	 
    <script src="js/jquery.min.js"></script>   
    <script src="js/funcionesAjax.js"></script>   
    <script src="js/funcionesLogin.js"></script>   
     <script src="js/funcionesABM.js"></script>
      <script src="js/geolocalizacionCommon.js"></script>
    <script src="js/moduloGeolocalizacion.js"></script>
    <script src="js/funcionesMapa.js"></script>
    <!--Final de Lógica- Programación -->
</head>
<body>
	
		<header>			
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
    				<div class="navbar-header">
      					<a class="navbar-brand" onclick="Mostrar('MostrarLogin')">Estacionamiento</a>
    				</div>
					<ul class="nav navbar-nav">						
						<li class="active"><a onclick="Mostrar('MostrarLogin')">Login</a></li>
						<li><a onclick="Mostrar('MostrarRegistroUsuario')">Registro</a></li>
						<li><a onclick="Mostrar('MostrarListadoAuto')">Autos Estacionados</a></li>
						<li><a onclick="Mostrar('MostrarFormAuto')">Asignar Espacio</a></li>	
						<li><a onclick="Mostrar('MostrarListadoPagos')">Pagos</a></li>
						<li><a onclick="Mostrar('MostrarListadoUsuarios')">Usuarios</a></li>				
						<li><a onclick="logout()">Salir</a></li>
					</ul>
				</div>
			</nav>
		</header>

	<div id="contenedor">												
				<div class="row">										
					<div id="dinamico" class="col-md-9">
						<marquee>Sistema de gestion de estacionamiento</marquee>
					</div>									
					<div>
						<div id="info" class="col-md-3">													
							<p class="label label-info"><?php if(isset($_SESSION['UsuarioActual'])) echo "Usuario Actual: ".$_SESSION['UsuarioActual'];?></p>
							<p class="label label-info"><?php if(isset($_SESSION['Cochera'])) echo "Lugares libres: ".$_SESSION['Cochera'];?></p>
						</div>
					</div>
				</div>			
	</div>

	<footer>
		<h5>Desarrollado por Daniel Sanchez, TP Laboratorio 4, UTN FRA, Tecnico Superior en Programacion</h5>
	</footer>
	
</body>
</html>