<?php 
  $id = $_REQUEST["comida"];
	$conexion = mysql_connect('localhost', 'root', '');
	if (!$conexion) {
		echo '{"loggerPHP" : "'.mysql_error().'"}';
	}
	mysql_select_db('meson', $conexion);
	$query = "select * from platillo where id_categoria =$id";
	$aDatos = array();
	$result = mysql_query($query, $conexion);
	while ($row=mysql_fetch_object($result)) {
		$aDatos[] = $row;
	}
	echo json_encode($aDatos);
	mysql_close($conexion);
 ?>