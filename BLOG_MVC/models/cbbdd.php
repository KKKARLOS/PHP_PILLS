<?php
include_once("cbdconfig.php");
class CBBDD extends CBDConfig {
	//Atributos
	protected $conexion;
	//Propiedades
	
	//Funciones de la clase
	public function __construct() {
		parent::__construct();
		$this->connectBBDD();
	}
	
	private function connectBBDD() {
		//Conectamos con el servidor de bbdd:
		try {			
			$this->conexion=new PDO("mysql:host=$this->mServ; dbname=$this->mBDName",$this->mBDUser, $this->mBDPass);
			$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conexion->exec("SET CHARACTER SET utf8");			

		} catch (Exception $e) {
			//No hemos podido conectar con el servidor de bbdd
			throw new Exception("Sin conexión con el servidor:   ". $e);
		}
	}
		
	protected function disconnectBBDD() {
		//Desconectamos con la BBDD:
		try {
			$this->conexion=null;
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	public function __destruct() { 
		$this->disconnectBBDD();
	}
	
}	
?>