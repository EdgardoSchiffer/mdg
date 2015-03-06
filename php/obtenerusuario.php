<?php 
if (!empty($_GET)) {
	$correo = $_REQUEST["correo"];
	require_once("conexion.php");
	$obj = new Conexion();
	$pst = $obj->conexion->prepare("SELECT nombre_cliente FROM cliente WHERE correo= :correo");
	$pst->bindValue(":correo", $correo);
	$pst->execute();
	$row = array();
	$row = $pst->fetch();
    echo '{"nombre" : "'.$row[0].'"}';
	$obj->conexion = null;
}
?>