<h2 id="titulo">Registro</h2>
<div id="divImagen">
    <img src="imagenes/auto.png">
</div>
<div id="divForm">
<form  onsubmit="RegistrarUsuario();return false;" class="form" role="form">  
  <div class="form-group">
  <input type="text" id="nombre" name="nombre" maxlength=30 size=20 placeholder="Ingrese nombre" required class="form-control">
  </div>

  <div class="form-group">
  <input type="text" id="apellido" name="apellido" maxlength=30 size=20 placeholder="Ingrese apellido" required class="form-control">
  </div>

  <div class="form-group">
  <input type="date" id="fechanac" name="fechanac" required class="form-control">
  </div>

  <div class="form-group">
  <input type="email" id="email" name="email" maxlength=30 size=20 placeholder="Ingrese Email" required class="form-control">
  </div>

  <div class="form-group">
  <input type="text" id="direccion" name="direccion" maxlength=30 size=20 placeholder="Ingrese Direccion" required class="form-control">
  </div>

  <div class="form-group">
  <input type="text" id="localidad" name="localidad" maxlength=30 size=20 placeholder="Ingrese Localidad" required class="form-control">
  </div>

  <div class="form-group">
  <input type="text" id="provincia" name="provincia" maxlength=30 size=20 placeholder="Ingrese Provincia" required class="form-control">
  </div>

  <div class="form-group">
  <input type="text" id="usuario" name="usuario" maxlength=30 size=20 placeholder="Ingrese Usuario" required class="form-control">
  </div>

  <div class="form-group">
  <input type="password" id="password" name="password" maxlength=30 size=20 placeholder="Ingrese Password" required class="form-control">
  </div>

  <div class="form-group">
  <input type="password" id="cpassword" name="cpassword" maxlength=30 size=20 placeholder="Confirme Password" required class="form-control">
  </div>

  <input type="submit" value="Registrar" class="btn btn-danger">
</form>
</div>