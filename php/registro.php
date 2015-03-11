<?php 

if (!empty($_GET)) {
	    $correo = $_REQUEST["correo"];
	  	$nombre = $_REQUEST["nombre"];
        $apellido = $_REQUEST["apellido"];
       // $dui = $_REQUEST["dui"];
       //$telefono = $_REQUEST["telefono"];
    require_once("conexion.php");
	$obj = new Conexion();
	$pst = $obj->conexion->prepare("INSERT INTO clientes(correo, nombre, apellido) VALUES(:correo,:nombre,:apellido)");
	$pst->bindValue(":correo", $correo);
	$pst->bindValue(":nombre", $nombre);
	$pst->bindValue(":apellido", $apellido);
	//$pst->bindValue(":dui", $dui);
	//$pst->bindValue(":telefono", $telefono);
	$pst->execute();
	$pass = $_REQUEST["pass"];
	$rol = "Cliente";
	$nuevousuario = $obj->conexion->prepare("INSERT INTO usuarios VALUES(:correo, :pass, :rol)");
	$nuevousuario->bindValue(":correo", $correo);
	$nuevousuario->bindValue(":pass", sha1($pass));
	$nuevousuario->bindValue(":rol", $rol);
	$nuevousuario->execute();
    echo '{"loggerPHP" : "Datos ingresados con exito"}';
    $obj->conexion = null;
   }
	
?>
