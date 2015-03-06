<?php 
if (!empty($_GET)) {
	require_once("conexion.php");
	$id_evento = $_REQUEST["idreservacion"];
    $idplatillo = $_REQUEST["idplatillo"];
    $cantidad = $_REQUEST["cantidad"];
	$obj = new Conexion();
	$pst = $obj->conexion->prepare("INSERT INTO servicio VALUES(:idreservacion, :platillo, :cantidad)");
	$pst->bindValue(':idreservacion', $id_evento);
	$pst->bindValue(':platillo', $idplatillo);
	$pst->bindValue(':cantidad', $cantidad);
	$pst->execute();
	echo '{"loggerPHP" : "Datos ingresados con exito"}';
	$obj->conexion = null;
}
?>