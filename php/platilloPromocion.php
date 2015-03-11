<?php 
if (!empty($_GET)) {
  	$id = $_REQUEST["idPlat"];
	require_once("conexion.php");
	$obj = new Conexion();
	$pst = $obj->conexion->prepare("select * from platillos where id_platillo = :id");
	$pst->bindValue(':id', $id);
	$pst->execute();
	$row = array();
	$row = $pst->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($row);
	$obj->conexion = null;
}
 ?>