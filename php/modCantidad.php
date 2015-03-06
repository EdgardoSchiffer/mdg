<?php 
if (!empty($_GET)) {
	$id_evento = $_REQUEST["idevent"];
    $idplatillo = $_REQUEST["iplatillo"];
    $cantidad = $_REQUEST["cantidad"];
      
	require_once("conexion.php");
	$obj = new Conexion();
	$pst = $obj->conexion->prepare("UPDATE servicio set cantidad=:cantidad where id_reservacion=:idevento and id_platillo= :idplatillo");
	$pst->bindValue(':cantidad', $cantidad);
	$pst->bindValue(':idevento', $id_evento);
	$pst->bindValue(":idplatillo", $idplatillo);
	$pst->execute();
    echo '{"loggerPHP" : "Datos modificados con exito"}';
    $obj->conexion = null;
}
?>