<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="style2.css" />
	<title>Conciertos y eventos musicales</title>
</head>

<body>
	<header style="position:sticky !important;">
		<picture><img src="resources/logo-vectorizado.svg" alt="logo" /></picture>
		<ul>
			<a class="link" href="index.html">
				<li>Inicio</li>
			</a>
			<a class="link" href="eventos.php">
				<li>Eventos</li>
			</a>
			<a class="link" href="contacto.html">
				<li>Contacto</li>
			</a>
		</ul>
	</header>


	<div id="box-out">

		<div id="box-in">

			<h2>Todos los Eventos</h2>
			<?php
			$dbc = mysqli_connect('localhost', 'root');
			mysqli_select_db($dbc, 'Eventos');
			$query = "SELECT * FROM Eventos;";
			if ($r = mysqli_query($dbc, $query)) {
				while ($fila = mysqli_fetch_array($r)) {
					echo "<strong>Nombre del evento: </strong>" . $fila['Nombre'] . "<br>";
					echo "<strong>Fecha: </strong>" . $fila['Fecha'] . "<br>";
					echo "<strong>Localizacion: </strong>" . $fila['Localizacion'] . "<br>";
					echo "<strong>Ubicacion: </strong>" . $fila['Ubicacion'] . "<br>";
					echo "<strong>Artistas: </strong>" . $fila['Artistas'] . "<br>";
					echo "<strong>Generos: </strong>" . $fila['Generos'] . "<br>";
					echo "<div id=\"links\">";
					echo "<a href=\"actualizar.php?Evento_id={$fila['Evento_id']}\">Actualizar evento</a>    ";
					echo "<a href=\"borrar.php?Evento_id={$fila['Evento_id']}\">Borrar evento</a><br>";
					echo "</div>";
					echo "<hr>";
				}
			} else {
				echo "<p style=\"color:red;\" >Ha habido un error con la consulta </p>" . "<p>ERR: </p>" . mysqli_error($dbc);

			}
			mysqli_close($dbc);

			?>
			<form id="crear" action="form.html" method="post">
				<input class="button-28" role="button" type="submit" value="Crear eventos" />
			</form>

		</div>
	</div>
</body>

</html>