function Borrar(patente)
{        
    var miPatente = patente;
    var miAjax = $.ajax({
              method: "POST",
              url: "nexo.php",
              data:{
                patente:miPatente,
                quehago:"BorrarAuto"
              },
              success:function(resultado)
              {
                Mostrar('MostrarListadoAuto');     
                $("#info").load("index.php #principal #info");              
              }
          });
}

function Guardar()
{    
    var miTamanio = $('input:radio[name=tamanio]:checked').val()
    var envio = new FormData();
    var files = $("#foto").get(0).files; // $("#fichero") slector por id de jquery 
    envio.append("patente", $("#patente").val());
    envio.append("color", $("#color").val());
    envio.append("tamanio", miTamanio);     
    envio.append("quehago", "GuardarAuto");   
    
    
    for (var i = 0; i < files.length; i++) 
    {
        envio.append("mifoto", files[i]);
    }


    var miAjax = $.ajax({
              method: "POST",
              url: "nexo.php",              
              cache: false,                      
              contentType: false,
              processData: false,
              data: envio,              
              success:function(resultado)
              {
                Mostrar('MostrarListadoAuto');            
                $("#info").load("index.php #principal #info");   
              }
      });
    miAjax.fail(function(retorno)
    {
      alert(retorno);
    });
}


