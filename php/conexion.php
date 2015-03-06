<?php
	require_once ("parametros.php");
	class Conexion{
		public $conexion;

		function __construct(){
			$this->conexion = new PDO(HOST, USER, PASS);
		}
	}
?>