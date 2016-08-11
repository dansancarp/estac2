function login()
{
var miUsuario = $("#usuario").val();
var miPassword = $("#password").val();
var miAjax = $.ajax({
	url:"nexo.php",
	type:"post",
	data:
		{
		usuario:miUsuario,
		password:miPassword,
		quehago:"login"
		}
	});
miAjax.done(function(resultado)
	{
		if(resultado==1)
		{
			location.href="index.php";			
		}
		else
		{
			alert("Usuario no registrado");
		}										
		
	}
);
}//fin funcion login

function logout()
{
var miAjax = $.ajax({
	url:"nexo.php",
	type:"post",
	data:
		{
		quehago:"logout"
		}
	});
miAjax.done(function(resultado)
	{		
		location.href="index.php";				
	}
);
}//fin funcion login

function RegistrarUsuario()
{  	
	var miUsuario = $("#usuario").val();
	var miPassword = $("#password").val();
	var micPassword = $("#cpassword").val();
	var miEmail = $("#email").val();
	var miDireccion = $("#direccion").val();
	var miLocalidad = $("#localidad").val();
	var miProvincia = $("#provincia").val();
	var miNombre = $("#nombre").val();
	var miApellido = $("#apellido").val();
	var miFecha = $("#fechanac").val();			
    var miAjax = $.ajax({
              method: "POST",
              url: "nexo.php",
              data:{                
                quehago:"RegistrarUsuario",
                usuario:miUsuario,
                password:miPassword,
                cpassword:micPassword,
                email:miEmail,
                direccion:miDireccion,
                localidad:miLocalidad,
                provincia:miProvincia,
                nombre:miNombre,
                apellido:miApellido,
                fechanac:miFecha
              }
              
          });
    miAjax.done(function(resultado)
              {
                location.href = "index.php";
              });
}

function Validar()
{	
	if(miPassword.length<6||(micPassword!=miPassword))
	{
		$("#mensaje").val("Reingrese password: deben coincidir");
		$("#password").focus();
		return false;
	}		   
	return true;
}