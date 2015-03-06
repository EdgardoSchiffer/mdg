<?php 
	require_once("parametros.php");
 ?>
<!DOCTYPE>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>Galería de Imágenes</h1>
		<form method="post" enctype="multipart/form-data" action="subir_imagen.php">
			 
			 <h3>Ingrese la descripción de la imagen:</h3>
			 <textarea style="font-size: 19; " id="txt_descripcion" cols="50" name="descripcion" ></textarea><br>

			 <h3>Seleccione la imagen a subir: </h3>
			 <input id="file_url" type="file" name="foto"><br>
			 <input type="submit" value="Guardar"> <!--Botón para guardar imagen-->
		</form>
		<table border="4" cellpadding="10"  cellspacing="6" style="width:100%; font-size: 17; text-align:center;">
			<tr>
				<th>Imagen</th>
				<th>Descripción</th>
				<th>Eliminar</th>
			</tr>
		
			<?php 
                    $consulta = mysql_query("SELECT * FROM imagen");
                    
                    while ($Res= mysql_fetch_array($consulta)) {
                    	$ruta=$Res['ruta'];
                        $desc=$Res['descripcion'];
                        $idImagen= $Res['id'];
            ?>
			<tr>
				<?php 
					echo "<td><img  width='150px' src='http://localhost/MesonGoya/img/galeria/$ruta' alt='imagen'></td>";
				 ?>
				
				<td><?php echo nl2br("$desc"); ?></td>
				<?php 
					echo "<td><a href='eliminar_imagen.php?id=$idImagen'>Eliminar</a> </td>"
				 ?>
				
			</tr>
			<?php 

				$Imagenes[]= array("Ruta"=>$ruta, "Descripcion"=>$desc);
				} //Cerramos el While

				echo json_encode($Imagenes);
			?>

		</table>
	</body>
</html>