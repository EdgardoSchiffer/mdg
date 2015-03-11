<?php 
if (!empty($_GET)) {
  	$id = $_REQUEST["idRe"];
	require_once("conexion.php");
	$obj = new Conexion();
	$pst = $obj->conexion->prepare("DELETE FROM reservacion WHERE id_reservacion = :id");
	$pst->bindValue(':id', $id);
	$resul = $pst->execute();
	$pst2 = $obj->conexion->prepare("DELETE FROM servicio WHERE id_reservacion = :id");
	$pst2->bindValue(':id', $id);
	$res = $pst2->execute();
	$result = $pst->fetch();
	if ($resul && $res) {
		echo '{"msj" : "1"}';
	}
	$obj->conexion = null;
}
 ?>