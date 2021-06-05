# PHPRealtimeOutputs
Script para ejecutar comandos de consola tanto en ambientes Windows como Linux/Unix y obtener la salida en tiempo real

Requerimientos
=
- PHP 7.1.18 o superior
- jQuery 3.2.0 o superior

Características
=
El proyecto ejecuta de manera asincrónica el o los comandos establecidos en los archivos **cmd.bat** _(para ambientes Windows)_ y **cmd.sh** _(para ambientes Linux/Unix)_.

Cada comando debe redireccionar su salida al archivo de control __*cmd.txt*__, este archivo el sistema lo utiliza para ir leyendo de manera asíncrona los resultados que se van obteniendo en la ejecucion de los scripts.

Una vez iniciada la ejecución se establece un Timer mediante Javascript que cada 1 segundo consulta el contenido del archivo de control agregando así las nuevas líneas que encuentre.

### **Consideraciones a tener en cuenta según la plataforma**
_Windows: cmd.bat_
```dos
REM Colocar aqui el o los comandos a ejecutar, siempre con salida al archivo cmd.txt
echo Fecha: %date% %time% > cmd.txt
ping -n 10 www.google.com >> cmd.txt

REM Mantener esto
echo FIN >> cmd.txt
```
_Linux/Unix: cmd.sh_

```bash
#!/bin/bash

# Colocar aqui el o los comandos a ejecutar, siempre con salida al archivo cmd.txt
echo "Fecha: " $(date "+%Y-%m-%d %H:%M:%S") > cmd.txt
ping www.google.com -c 10 >> cmd.txt

# Mantener esto para evitar seguir consultando el archivo cmd.txt
echo "FIN" >> cmd.txt
```
Se debe conservar la última línea de código ya que es la encargada de indicar al script que la ejecución a llegado a su fin y asi evita seguir consultando el archivo de texto.

_Copyright: Jose Romero - [Github](https://github.com/jmperro)_