<?php 
	require_once("parametros.php");

	$idImagen=$_GET['id'];


	$eliminar=mysql_query("DELETE FROM Imagen WHERE id='".$idImagen."'");

	header("location:frmImagen.php");
 ?>