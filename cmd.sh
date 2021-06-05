#!/bin/bash

# Colocar aqui el o los comandos a ejecutar, siempre con salida al archivo cmd.txt
echo "Fecha: " $(date "+%Y-%m-%d %H:%M:%S") > cmd.txt
ping www.google.com -c 10 >> cmd.txt

# Mantener esto para evitar seguir consultando el archivo cmd.txt
echo "FIN" >> cmd.txt