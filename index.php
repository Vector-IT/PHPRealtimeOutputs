<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
	</head>
	<body>
		<div>
			<button id="btnEjecutar">Ejecutar</button>
		</div>
		<div id="ontimeoutputArea" style="border: 1px solid red"></div>
	</body>

	<script src="https://code.jquery.com/jquery-3.2.0.min.js" integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I=" crossorigin="anonymous"></script>

	<script type="text/javascript">
		var I;
		var archivo;
		var tmrReader;
		var leyendo = false;

		$('#btnEjecutar').click(function() {
			if (tmrReader != undefined) {
				I = 'FIN';
			}

			I = 0;
			leyendo = false;

			$('#ontimeoutputArea').html('Ejecutar comando!');

			$.post("./cmd.php").done(function (data) {
				archivo = data;

				$('#ontimeoutputArea').append('<br>Archivo: ' + archivo + '<br>');

				tmrReader = setInterval(leer, 1000);
			});

		});

		function leer() {
			if (I == 'FIN') {
				clearInterval(tmrReader);
				$('#ontimeoutputArea').append('<br>Fin ejecución!');
			}
			else if (!leyendo) {
				leyendo = true;
				$.get("./cmd-reader.php", { 'index': I, 'archivo': archivo })
					.done(
						function (data) {
							I = data.I;

							$('#ontimeoutputArea').append(data.texto);

							leyendo = false;
						}
					)
					.fail(
						function(data) {
							I = 'FIN';
							leyendo = false;
							console.log('error')
						}
					);
			}
		}
	</script>
</html>
