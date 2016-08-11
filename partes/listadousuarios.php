<h2 id="titulo">Usuarios</h2>
<?php
 require_once "clases/Usuario.php";
 require_once "clases/AccesoDatos.php";                                     
 if(isset($_SESSION['UsuarioActual']))
 {
 $arraysDeUsuarios = Usuario::TraerTodosLosUsuarios();
 if(count($arraysDeUsuarios)>0)
      {      
      echo "<table class='table table-bordered table-striped table-hover'>            
           <thead>              
              <tr><th>nombre</th><th>apellido</th><th>fecha de nacimiento</th><th>email</th><th>Vive en</th></tr>
            </thead>
            <tbody>";
      foreach ($arraysDeUsuarios as $u)                              
          {          
           echo "<tr><td>$u->nombre</td><td>$u->apellido</td><td>$u->fechanac</td><td>$u->email</td>";           
           echo "<td><input type='button' onclick='VerEnMapa(\"$u->provincia\",\"$u->direccion\", \"$u->localidad\")' class='btn btn-primary' value='Ver en Mapa'></td>";
           echo "</tr>";
           }
      echo"</tbody></table>";
      }
     }
    else
    {
      echo "<marquee>Tiene que estar logeado</marquee>";
    }
?>