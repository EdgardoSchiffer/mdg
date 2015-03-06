<?php
	require_once("parametros.php");
	$uploads_dir = 'C://xampp/htdocs/MesonGoya/img/promociones';
	$imagen_subida = $_FILES['foto']['name'];
	$temp = $_FILES['foto']['tmp_name'];
	move_uploaded_file($temp, "$uploads_dir/$imagen_subida");
	$logo = $imagen_subida;
	echo $logo;
	echo $uploads_dir;
	

	//Variables del metodo POST
	$descripcion=$_POST['descripcion'];
	$query = "insert into promociones  (descripcion, ruta)  value ('$descripcion', '$logo')";
	mysql_query($query) or die('Error al procesar consulta: ' . mysql_error()); //Ejecutamos la consutla
	header("location:frmPromociones.php");

?> 