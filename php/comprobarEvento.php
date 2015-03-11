<?php 
if (!empty($_GET)) {
  	$id = $_REQUEST["idR"];
	require_once("conexion.php");
	$obj = new Conexion();
	$pst = $obj->conexion->prepare("SELECT visto FROM reservacion WHERE id_reservacion = :id AND visto=0");
	$pst->bindValue(':id', $id);
	$pst->execute();
	$result = $pst->fetch();
	echo '{"visto" : "'.$result[0].'"}';
	$obj->conexion = null;
}
 ?>