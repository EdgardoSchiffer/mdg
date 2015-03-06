<?php
	define('SERVER', '127.0.0.1');
	define('USER', 'root');
	define('PASS', '');
	define('BD', 'bd_meson');
	define('CHAR', 'UTF-8');

	$conn = mysql_connect('localhost', USER, PASS)or die('ERROR: ' . mysql_error());
    mysql_select_db('bd_meson') or die('No pudo seleccionar la BD');
?>