<?php
class Auto
{
	public $patente;
 	public $color;
  	public $tamanio;
  	public $ingreso;
  	public $foto;

  	public function BorrarAuto()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("delete from autos where patente like :patente");	
				$consulta->bindValue(':patente',$this->patente, PDO::PARAM_STR);		
				$consulta->execute();
				return $consulta->rowCount();
	 }
	 	
	
  	
	
	 public function InsertarAuto()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into autos (patente,color,tamanio,ingreso,foto) values(:patente,:color,:tamanio,now(),:foto)");
				$consulta->bindValue(':patente',$this->patente, PDO::PARAM_STR);
				$consulta->bindValue(':color', $this->color, PDO::PARAM_STR);
				$consulta->bindValue(':tamanio', $this->tamanio, PDO::PARAM_STR);				
				$consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);				
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

	 public function ModificarAuto()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE autos SET color=:color,tamanio=:tamanio,foto=:foto where patente like :patente");
				$consulta->bindValue(':patente',$this->patente, PDO::PARAM_STR);
				$consulta->bindValue(':color', $this->color, PDO::PARAM_STR);
				$consulta->bindValue(':tamanio', $this->tamanio, PDO::PARAM_STR);				
				$consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);				
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 
  	public static function TraerTodosLosAutos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from autos");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Auto");		
	}
	public static function BuscarUnAuto($patente) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from autos where patente='$patente'");
			$consulta->execute();
			$aBuscado= $consulta->fetchObject('Auto');
			return $aBuscado;							
	}	

	public static function TiempoDeUnAuto($patente)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT TIMESTAMPDIFF(MINUTE,ingreso,now()) as diferencia from autos where patente like '$patente'");
		$consulta->execute();
		return $consulta->fetch(PDO::FETCH_NUM);;
	}

}
?>