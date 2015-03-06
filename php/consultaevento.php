<?php 
if (!empty($_GET)) {	
	require_once("conexion.php");
	$obj = new Conexion();
	$id = $_REQUEST["ideve"];
	$pst = $obj->conexion->prepare("SELECT  *  FROM servicio o  join platillos p on o.id_platillo = p.id_platillo  WHERE id_reservacion= :idevento");
 	$pst->bindValue(':idevento', $id);
	$pst->execute();
	$row = array();
	$row = $pst->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($row);
	$obj->conexion = null;
}	
?>