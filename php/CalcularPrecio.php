<?php 
if (!empty($_GET)) {
	$id = $_REQUEST["idCo"];
	require_once("conexion.php");
	$obj = new Conexion();
	$pst = $obj->conexion->prepare("SELECT  (s.preciounitario * SUM(s.cantidad))   FROM  platillos p join servicio s  on p.id_platillo = s.id_platillo   WHERE id_reservacion= :idevento");
 	$pst->bindValue(":idevento", $id);
	$pst->execute();
	$result = $pst->fetch();
	echo '{"total" : "'.$result[0].'"}';
	$obj->conexion = null;
}
?>
