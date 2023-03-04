<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prueba sincronica</title>
</head>
<body>
	<?php
	echo 'exec<br>';
	echo '<pre>';

	// Muestra el resultado completo del comando "ls", y devuelve la
	// ultima linea de la salida en $ultima_linea. Almacena el valor de
	// retorno del comando en $retval.
	//$ultima_linea = passthru('ls', $retval);
	$ultima_linea = exec('dir', $out, $retval);
	echo print_r($out, true);
	// echo mb_convert_encoding(print_r($out, true), 'UTF-8', 'WINDOWS-1252');

	// Imprimir informacion adicional
	echo '
	</pre>
	<hr />Ultima linea de la salida: ' . $ultima_linea . '
	<hr />Valor de retorno: ' . $retval;
	?>
</body>
</html>
