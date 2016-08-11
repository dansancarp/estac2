<?php
class Usuario
{
	public $id;
	public $user;
	public $password;
	public $nombre;
	public $apellido;
	public $email;
	public $provincia;
	public $direccion;
	public $localidad;
	public $fechanac;

	public function BorrarUsuario()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("delete from usuarios where id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }
  	
	
	 public function InsertarUsuario()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (user,password,nombre,apellido,fechanac,email,direccion,localidad,provincia)values(:user,:password,:nombre,:apellido,:fecha,:email,:direccion,:localidad,:provincia)");
				$consulta->bindValue(':user',$this->user, PDO::PARAM_STR);
				$consulta->bindValue(':password', $this->password, PDO::PARAM_STR);
				$consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
				$consulta->bindValue(':fecha', $this->fechanac, PDO::PARAM_STR);
				$consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
				$consulta->bindValue(':direccion', $this->direccion, PDO::PARAM_STR);
				$consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
				$consulta->bindValue(':provincia', $this->provincia, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

	 public function ModificarUsuario()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("update usuarios set user=:user,passwod=:password,nombre=:nombre,apellido=:apellido,email=:email,direccion=:direccion,localidad=:localidad,provincia=:provincia WHERE id=:id");
			$consulta->bindValue(':user',$this->user, PDO::PARAM_STR);
			$consulta->bindValue(':password', $this->password, PDO::PARAM_STR);
			$consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
			$consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
			$consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
			$consulta->bindValue(':direccion', $this->direccion, PDO::PARAM_STR);
			$consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
			$consulta->bindValue(':provincia', $this->provincia, PDO::PARAM_STR);
			return $consulta->execute();
	 }
	 

	 public function ModificarPassword()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("update usuarios set password=:password where id=:id");			
			$consulta->bindValue(':password', $this->password, PDO::PARAM_STR);
			$consulta->bindValue(':id', $this->id, PDO::PARAM_INT);			
			return $consulta->execute();
	 }

	public static function TraerUsuarioPorId($id)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuarios where id=$id");
			$consulta->execute();			
			return $consulta->fetchObject("Usuario");		
	}

	public static function TraerUsuarioPorEmail($email)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuarios where email like '$email'");
			$consulta->execute();			
			return $consulta->fetchObject("Usuario");		
	}

  	public static function TraerTodosLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuarios");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");		
	}

	public static function BuscarUnUsuarioParaLogin($u,$p)
	{			
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios WHERE user LIKE '$u' AND password LIKE '$p'");
			$consulta->execute();
			$uBuscado= $consulta->fetchObject('Usuario');
			return $uBuscado;				
			
	}	
}
?>