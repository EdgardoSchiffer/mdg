<?php
if (!empty($_GET)) {
	require_once("conexion.php");
	$correo = $_REQUEST["correo"];
	$pass = $_REQUEST["pass"];
	$obj = new Conexion();
	$pst = $obj->conexion->prepare("SELECT rol FROM usuarios WHERE correo = :correo AND pass = :pass");
	$pst->bindValue(":correo", $correo);
	$pst->bindValue(":pass", sha1($pass));
	$pst->execute();;
	$result = $pst->fetch();
	echo '{"rol" : "'.$result[0].'"}';
	$obj->conexion = null;
}	
?>