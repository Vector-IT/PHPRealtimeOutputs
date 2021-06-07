#!/bin/bash

# Colocar aqui el o los comandos a ejecutar, siempre con salida al archivo cmd.txt
echo "Fecha: " $(date "+%Y-%m-%d %H:%M:%S") > $1
ping www.google.com -c 10 >> $1

# Mantener esto para evitar seguir consultando el archivo cmd.txt
echo "FIN" >> $1