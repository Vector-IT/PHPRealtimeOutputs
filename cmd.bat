REM Colocar aqui el o los comandos a ejecutar, siempre con salida al archivo cmd.txt
echo Fecha: %date% %time% > %1
ping -n 10 www.google.com >> %1

REM Mantener esto para evitar seguir consultando el archivo cmd.txt
echo FIN >> %1