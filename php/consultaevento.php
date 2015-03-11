<?php 
if (!empty($_GET)) {	
	require_once("conexion.php");
	$obj = new Conexion();
	$id = $_REQUEST["ideve"];
	$pst = $obj->conexion->prepare("SELECT  o.id_reservacion, o.id_platillo, SUM(o.cantidad) AS cantidad, o.preciounitario, p.platillo, p.imagen  FROM servicio o  join platillos p 
									ON o.id_platillo = p.id_platillo  
									WHERE id_reservacion= :idevento 
									GROUP BY p.platillo");
 	$pst->bindValue(':idevento', $id);
	$pst->execute();
	$row = array();
	$row = $pst->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($row);
	$obj->conexion = null;
}	
?>