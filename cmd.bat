REM Colocar aqui el o los comandos a ejecutar, siempre con salida al archivo cmd.txt
echo Fecha: %date% %time% > cmd.txt
ping -n 10 www.google.com >> cmd.txt

REM Mantener esto para evitar seguir consultando el archivo cmd.txt
echo FIN >> cmd.txt