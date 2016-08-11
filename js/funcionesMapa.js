function VerEnMapa(prov, dire, loc)
{    
    var punto = dire +", " +  loc  +", " +  prov +", Argentina";
    console.log(punto);
    var funcionAjax=$.ajax({
    url:"nexo.php",
    type:"post",
    data:{
      quehago:"VerEnMapa"
    }
  });
    funcionAjax.done(function(retorno){
    $("#dinamico").html(retorno);
        $("#punto").val(punto);           
  });
}