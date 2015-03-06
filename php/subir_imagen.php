<?php
	require_once("parametros.php");
	$uploads_dir = 'http://localhost/MesonGoya/img/galeria';
	$imagen_subida = $_FILES['foto']['name'];
	$temp = $_FILES['foto']['tmp_name'];
	move_uploaded_file($temp, "$uploads_dir/$imagen_subida");
	$logo = $imagen_subida;

	//Variables del metodo POST
	$descripcion=$_POST['descripcion'];
	$query = "insert into imagen (descripcion, ruta) value ('$descripcion', '$logo')";
	mysql_query($query) or die('Error al procesar consulta: ' . mysql_error()); //Ejecutamos la consutla
	header("location:frmImagen.php");

?> 