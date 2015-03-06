<?php 
	$correo = $_REQUEST["mail"];
	require_once("conexion.php");
	$obj = new Conexion();

  	$query = $obj->conexion->prepare("SELECT  e.tipo, e.id_reservacion, e.fecha, e.hora, e.cantidad_personas FROM  reservacion e  WHERE   correo=:idcliente ORDER BY e.fecha DESC");
 	$query->bindValue(':idcliente', $correo);
	$query->execute();
	$row = array();
	$row = $query->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($row);
	$obj->conexion = null;
?>