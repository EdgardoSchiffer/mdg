<?php 
if (!empty($_GET)) {
	require_once("conexion.php");
	$obj = new Conexion();
	$id = $_REQUEST['id'];
	$pst = $obj->conexion->prepare("select * from platillos where id_platillo= :id");
	$pst->bindValue(':id', $id);
	$pst->execute();
	$rows = array();
	$rows = $pst->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($rows);
	$obj->conexion = null;
}
 ?>