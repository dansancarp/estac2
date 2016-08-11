<?php
class Pago
{
	public $id;
	public $ingreso;
	public $salida;
	public $patente;
	public $monto; 	
	
	 public function InsertarPago()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into pagos (ingreso,salida,patente,monto)values(:ingreso,now(),:patente,:monto)");
			$consulta->bindValue(':ingreso',$this->ingreso, PDO::PARAM_STR);
			$consulta->bindValue(':patente', $this->patente, PDO::PARAM_STR);
			$consulta->bindValue(':monto', $this->monto, PDO::PARAM_STR);
			$consulta->execute();		
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 	 
  	public static function TraerTodosLospagos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from pagos");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Pago");		
	}
	public static function BuscarUnaPatente($p)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM pagos WHERE patente LIKE '$p'");
			$consulta->execute();
			$uBuscado= $consulta->fetchObject('Pago');
			return $uBuscado;				
			
	}	
}
?>