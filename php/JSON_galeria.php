<?php 
	require_once("conexion.php");
	$obj = new Conexion();
	$pst = $obj->conexion->prepare("SELECT * FROM platillos WHERE id_servicio =2");
	$pst->execute();	 
	$row = array();
	$row = $pst->fetchAll(PDO::FETCH_ASSOC);
	 echo json_encode($row);
	$obj->conexion = null;
?>