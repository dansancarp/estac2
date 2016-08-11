function Mostrar(queHacer)
{          
    var miAjax = $.ajax({
              method: "POST",
              url: "nexo.php",
              data:{                
                quehago:queHacer
              },
              success:function(resultado)
              {
                $("#dinamico").html(resultado);
                $("#info").load("index.php #info");
              }
          });
}
