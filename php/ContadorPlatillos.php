<?php 
if (!empty($_GET)) {
	$id = $_REQUEST["idCount"];
	require_once("conexion.php");
	$obj = new Conexion();
	$pst = $obj->conexion->prepare("SELECT  SUM(cantidad)  FROM servicio   WHERE id_reservacion= :idevento");
 	$pst->bindValue(":idevento", $id);
	$pst->execute();
	$result = $pst->fetch();
	echo '{"cont" : "'.$result[0].'"}';
	$obj->conexion = null;
}
?>