<?php 
	require_once("conexion.php");
	$obj = new Conexion();
	$pst = $obj->conexion->prepare("SELECT * FROM `tipo_evento`");
	$pst->execute();
	$rows = array();
	$rows = $pst->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($rows);
	$obj->conexion = null;
 ?>