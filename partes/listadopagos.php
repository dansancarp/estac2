<h2 id="titulo">Pagos</h2>
<?php
 require_once "clases/Pago.php";
 require_once "clases/AccesoDatos.php";                                     
if(isset($_SESSION['UsuarioActual']))
 {
 $arraysDePagos = Pago::TraerTodosLosPagos();

 if(count($arraysDePagos)>0)
      {      
      echo "<table class='table table-bordered table-striped table-hover table-responsive'>            
           <thead>              
              <tr><th>patente</th><th>ingreso</th><th>salida</th><th>monto</th></tr>
            </thead>
            <tbody>";
      foreach ($arraysDePagos as $pago)                              
          {          
           echo "<tr><td>$pago->patente</td><td>$pago->ingreso</td><td>$pago->salida</td><td>$pago->monto</td></tr>";           
           }
      echo"</tbody></table>";
      }
    }
    else
    {
      echo "<marquee>Tiene que estar logeado</marquee>";
    }
?>