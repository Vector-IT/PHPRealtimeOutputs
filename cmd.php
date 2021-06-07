<?php
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");


$archivo = uniqid().'.txt';
if (file_exists($archivo)) {
	unlink($archivo);
}

// Run command Asynchroniously (in a separate thread)
if (PHP_OS == 'WINNT' || PHP_OS == 'WIN32' || PHP_OS == 'Windows') {
	// Windows
	$command = 'start "" cmd.bat '. $archivo ." ";
}
else {
	// Linux/UNIX
	$command = 'bash cmd.sh '. $archivo .' > /dev/null &';
}

$handle = popen($command, 'r');

if ($handle !== false) {
	pclose($handle);
	echo $archivo;
}
else {
	echo false;
}