<?php 

if (!empty($_GET)) {
	$correo = $_REQUEST["mail"];
  $tipo = $_REQUEST["tipo"];
  $fecha = $_REQUEST["fecha"];
  $hora = $_REQUEST["hora"];
  $cantidad = $_REQUEST["canti"];
  $visto = 0;
  if (isset($_REQUEST["dui"])) {
    $dui = $_REQUEST["dui"];
    $tel = $_REQUEST["tel"];
  }

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


  $query = $obj->conexion->prepare("SELECT id_reservacion FROM reservacion WHERE hora= :horaevento and cantidad_personas= :cantidadpersonas and fecha=:fechaevento and correo=:correoevento" );
  $query->bindValue(":horaevento", $hora);
  $query->bindValue(":cantidadpersonas", $cantidad);
  $query->bindValue(":fechaevento", $fecha);
  $query->bindValue(":correoevento", $correo);
  $query->execute();
  $result2 = $query->fetch();
  if (isset($_REQUEST["dui"])) {
    $cliente = $obj->conexion->prepare('UPDATE clientes SET dui= :dui, telefono= :tel WHERE correo= :mail');
    $cliente->bindValue(":dui", $dui);
    $cliente->bindValue(":tel", $tel);
    $cliente->bindValue(":mail", $correo);
    $cliente->execute();
  }
  
  echo '{"codd" : "'.$result2[0].'"}';
  $obj->conexion = null;
}
?>