<?php 

if (!empty($_GET)) {
	$correo = $_REQUEST["mail"];
  $tipo = $_REQUEST["tipo"];
  $fecha = $_REQUEST["fecha"];
  $hora = $_REQUEST["hora"];
  $cantidad = $_REQUEST["canti"];
  $visto = 0;
	require_once("conexion.php");
	$obj = new Conexion();

   $evento = $obj->conexion->prepare("INSERT INTO reservacion VALUES(null,:tipo,:hora, :fecha,  :cantidad, :correo, :visto)");
   $evento->bindValue(":tipo", $tipo);
    $evento->bindValue(":hora", $hora);
   $evento->bindValue(":fecha", $fecha);
   $evento->bindValue(":cantidad", $cantidad);
   $evento->bindValue(":correo", $correo);
   $evento->bindValue(":visto", $visto);
   $evento->execute();


  $query = $obj->conexion->prepare("SELECT id_reservacion FROM reservacion WHERE hora= :horaevento and cantidad_personas= :cantidadpersonas and fecha=:fecha" );
  $query->bindValue(":horaevento", $hora);
  $query->bindValue(":cantidadpersonas", $cantidad);
  $query->bindValue(":fecha", $fecha);
  $query->execute();
  $result2 = $query->fetch();
  echo '{"codd" : "'.$result2[0].'"}';
  $obj->conexion = null;
}
?>