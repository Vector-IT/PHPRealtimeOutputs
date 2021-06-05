<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
	</head>
	<body>
		<div>
			<button id="btnEjecutar">Ejecutar</button>
			<button id="btnFinalizar">Finalizar</button>
		</div>
		<div id="ontimeoutputArea" style="border: 1px solid red"></div>
	</body>
	
	<script src="https://code.jquery.com/jquery-3.2.0.min.js" integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I=" crossorigin="anonymous"></script>

	<script type="text/javascript">
		var I;
		var tmrReader;
		var leyendo = false;

		$('#btnEjecutar').click(function() {
			if (tmrReader != undefined) {
				clearInterval(tmrReader);
			}

			I = 0;
			leyendo = false;

			$('#ontimeoutputArea').html('Ejecutando...<br>');

			$.post("./cmd.php", {}, undefined, 'text');

			tmrReader = setInterval(leer, 1000);
		});

		$('#btnFinalizar').click(function (e) { 
			e.preventDefault();
			
			I = 'FIN';
		});

		function leer() {
			if (I == 'FIN') {
				clearInterval(tmrReader);
				$('#ontimeoutputArea').append('<br>Fin ejecución!');
			}
			else if (!leyendo) {
				leyendo = true;
				$.get("./cmd-reader.php", { 'index': I })
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
