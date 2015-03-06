<?php 
	require_once("conexion.php");
	$obj = new Conexion();
	$pst = $obj->conexion->prepare("select * from tipo_servicio");
	$pst->execute();
	$rows = array();
	$rows = $pst->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($rows);
	$obj->conexion = null;
 ?>