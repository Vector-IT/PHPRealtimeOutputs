<?php
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");

$index = $_REQUEST["index"];
$archivo = $_REQUEST["archivo"];

if (file_exists($archivo)) {
	$archivo = fopen($archivo, 'r');

	if ($index > 0) {
		for ($I = 0; $I < $index; $I++) {
			$linea = trim(fgets($archivo));
		}
	}
	else {
		$I = 0;
	}

	$texto = '';
	while ($linea = fgets($archivo)) {
		$linea = mb_convert_encoding(trim($linea), 'CP1252');

		if ($linea == "FIN") {
			$I = 'FIN';
		}
		else {
			$I++;
			$texto.= "\n<br>".$linea;
		}
	}

	fclose($archivo);

	if ($I == 'FIN') {
		unlink($_REQUEST["archivo"]);
	}

	$resultado = [
		"I" => $I,
		"texto" => $texto
	];
}
else {
	$resultado = [
		"I" => 0,
		"texto" => ''
	];
}

header('Content-Type: application/json');
$resultado = json_encode($resultado);
echo $resultado;