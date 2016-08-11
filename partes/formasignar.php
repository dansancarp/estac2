<?php
if(isset($_SESSION['UsuarioActual']))
 {
?>
<h2 id="titulo">Ingresar Auto</h2>
<div id="divImagen">
    <img src="imagenes/auto.png">
</div>
<div id="divForm">
<form method="post" enctype="multipart/form-data" onsubmit="Guardar();return false;" class="form" role="form">
    <div class="form-group">
    <input type="text" id="patente" name="patente" maxlength=6 size=20 placeholder="Ingrese patente" required class="form-control" pattern="[A-Za-z]{3}[0-9]{3}" title="3 letras seguido de 3 numeros">
    </div>
    <div class="form-group">
     <select name="color" id="color" required class="form-control">
            <option value="Rojo">Rojo
            <option value="Verda">Verde
            <option value="Azul">Azul
            <option value="Negro">Negro
            <option value="Violeta">Violeta
            <option value="Blanco">Blanco
            <option value="Gris">Gris
            <option value="Celeste">Celeste
     </select>
     </div>
    
    <div class="form-group">
    <input type="radio" id="tamanio" name="tamanio" value="G" checked/>Grande
    <input type="radio" id="tamanio" name="tamanio" value="M" />Mediano
    <input type="radio" id="tamanio" name="tamanio" value="C" />Chico
    </div>
    
    <div class="form-group">
        <input type="file" name="foto" id="foto" required class="form-control btn btn-danger">
    </div>
    <input type="submit" value="Asignar Espacio" class="btn btn-success">
                 
</form>
</div>
<?php
}
else
{
   echo "<marquee>Tiene que estar logeado</marquee>";
}
?>