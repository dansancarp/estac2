<?php
session_start();
require_once "clases/AccesoDatos.php";
require_once "clases/Auto.php";
require_once "clases/Pago.php";
require_once "clases/Usuario.php";

$quehago = $_POST['quehago'];
switch ($quehago)
 {
 	case 'MostrarLogin':		
		include("partes/formlogin.php");
		break;
 	case 'MostrarListadoAuto':
 		include "partes/listadoautos.php";
 		break;

 	case 'MostrarListadoPagos':
 		include "partes/listadopagos.php";
 		break;

 	case 'MostrarRegistroUsuario':
 		include "partes/registro.php";
 		break;

 	case 'MostrarFormAuto':
 		include "partes/formasignar.php";
 		break;
 		
 	case 'MostrarListadoUsuarios':
 		include "partes/listadousuarios.php";
 		break; 		
 		
 	case 'VerEnMapa':
 		include "partes/formMapaGoogle.php";
		break;


	case 'GuardarAuto':
		$disponibles = $_SESSION['Cochera'];
		if($disponibles > 0)
			{
			$auto = new Auto();
			$auto->patente = $_POST['patente'];
			$auto->color = $_POST['color'];
			$auto->tamanio = $_POST['tamanio'];
			$auto->foto = "fotos/".$_FILES['mifoto']['name'];
			$auto->InsertarAuto();		
			$disponibles--;
			$_SESSION['Cochera']=$disponibles;
			//guardo foto
			if(!move_uploaded_file($_FILES['mifoto']['tmp_name'],"fotos/".$_FILES['mifoto']['name']))
				{
					echo "error al subir";
				}
			}	
		break;


	case 'BorrarAuto':
		$disponibles = $_SESSION['Cochera'];
		$auto = Auto::BuscarUnAuto($_POST['patente']);
		$tiempo = Auto::TiempoDeUnAuto($_POST['patente']);
		//calculo monto a pagar
		$monto = 0;
		switch ($auto->tamanio) {
			case 'C':
				$monto = (int)$tiempo[0] * 0.25;
				break;
			case 'M':
				$monto = (int)$tiempo[0] * 0.5;
				break;	
			case 'G':
				$monto = (int)$tiempo[0] * 1;
				break;	
		}
		//guardo pago en un archivo historico de pagos
		$pago = new Pago();
		$pago->ingreso	= $auto->ingreso;
		$pago->patente = $auto->patente;
		$pago->monto = $monto;
		$pago->InsertarPago();
		//borro el auto
		$auto->BorrarAuto();
		//libero el espacio de la cochera
		$disponibles++;
		$_SESSION['Cochera']=$disponibles;	
		echo "Total a pagar: $monto";
		break;

	case 'RegistrarUsuario':
		$u = new Usuario();
		$u->nombre = $_POST['nombre'];
		$u->apellido = $_POST['apellido'];
		$u->fechanac = $_POST['fechanac'];
		$u->email = $_POST['email'];
		$u->direccion = $_POST['direccion'];
		$u->localidad = $_POST['localidad'];
		$u->provincia = $_POST['provincia'];
		$u->user = $_POST['usuario'];
		$u->password = $_POST['password'];
		$u->InsertarUsuario();
		//Logeo tambien
		$_SESSION['UsuarioActual'] = $_POST['usuario'];	
		//Crear cochera con lugares disponibles y guardarlo en una variable de session, en total de suponen 100 lugares menos los ocupados
		$ocupados = count(Auto::TraerTodosLosAutos());	
  		$_SESSION['Cochera']=100-$ocupados;
  		//
		break;
	case 'CambiarPassword':
		$usuario = Usuario::TraerUsuarioPorId($_POST['id']);
		$usuario->password = md5($_POST['password']);
		$usuario->ModificarPassword();
		break;
	case 'login':		
		$usuario = Usuario::BuscarUnUsuarioParaLogin($_POST['usuario'],$_POST['password']);
		if($usuario != null)
			{
			$_SESSION['UsuarioActual'] = $_POST['usuario'];	
			//Crear cochera con lugares disponibles y guardarlo en una variable de session, en total de suponen 100 lugares menos los ocupados
			$ocupados = count(Auto::TraerTodosLosAutos());
  			$_SESSION['Cochera']=100-$ocupados;  			
			echo 1;
			}
		else
			{
			echo 2;			
			}
		break;
	case 'logout':
		session_destroy();
		$_SESSION = null;
		echo 1;
		break;
  }
?>