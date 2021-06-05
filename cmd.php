<?php
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");

if (file_exists('cmd.txt')) {
	unlink('cmd.txt');
}

if (PHP_OS == 'WINNT' || PHP_OS == 'WIN32' || PHP_OS == 'Windows') {
	$cmd = 'cmd.bat';
}
else {
	$cmd = 'bash cmd.sh';
}

echo LaunchBackgroundProcess($cmd);

function LaunchBackgroundProcess($command) {
	// Run command Asynchroniously (in a separate thread)
	if (PHP_OS == 'WINNT' || PHP_OS == 'WIN32' || PHP_OS == 'Windows') {
		// Windows
		$command = 'start "" ' . $command . " ";
	} 
	else {
		// Linux/UNIX
		$command = $command . ' > /dev/null &';
	}
	echo $command;

	$handle = popen($command, 'r');

	if ($handle !== false) {
		pclose($handle);
		return true;
	} 
	else {
		return false;
	}
}
