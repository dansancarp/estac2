<h2 id="titulo">Login</h2>
<div id="divImagen">
	<img src="imagenes/auto.png">
</div>
<div id="divForm">
<form onsubmit="login();return false;" class="form" role="form">
	<div class="form-group">
		<label for="usuario">Usuario </label>
		<input type="text" id="usuario" placeholder="Ingrese Usuario" required class="form-control">
	</div>
	<div class="form-group">
		<label for="password">Password </label>
		<input type="password" id="password" placeholder="Ingrese Password" required class="form-control">
	</div>
	<input type="submit" value="Login" class="btn btn-danger">
</form>
</div>