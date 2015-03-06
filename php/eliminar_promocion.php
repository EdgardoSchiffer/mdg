<?php 
	require_once("parametros.php");

	$idImagen=$_GET['id'];


	$eliminar=mysql_query("DELETE FROM promociones WHERE id='".$idImagen."'");

	header("location:frmPromociones.php");
 ?>