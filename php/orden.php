<?php 
if (!empty($_GET)) {
	require_once("conexion.php");
	$id_evento = $_REQUEST["idreservacion"];
    $idplatillo = $_REQUEST["idplatillo"];
    $cantidad = $_REQUEST["cantidad"];
    $preciounitario = $_REQUEST["unitario"];
	$obj = new Conexion();
	$comprobar = $obj->conexion->prepare("SELECT * FROM servicio WHERE id_reservacion = :res AND id_platillo = :plat");
	$comprobar->bindValue(":res", $id_evento);
	$comprobar->bindValue(":plat", $idplatillo);
	$comprobar->execute();
	$res = $comprobar->fetch();
	if ($res == null) {
		$pst = $obj->conexion->prepare("INSERT INTO servicio VALUES(:idreservacion, :platillo, :cantidad, :unitario)");
		$pst->bindValue(':cantidad', $cantidad);
	}else{
		$pst = $obj->conexion->prepare("UPDATE servicio SET id_platillo = :platillo, cantidad = :cantidad, preciounitario = :unitario WHERE id_reservacion = :idreservacion");
		$pst->bindValue(':cantidad', $cantidad+$res['cantidad']);
	}
	$pst->bindValue(':idreservacion', $id_evento);
	$pst->bindValue(':platillo', $idplatillo);
	
	$pst->bindValue(':unitario', $preciounitario);
	$pst->execute();
	echo '{"loggerPHP" : "Datos ingresados con exito"}';
	$obj->conexion = null;
}
?>