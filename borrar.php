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

			<h2>Eliminación de evento</h2>
			<?php
			$dbc = mysqli_connect('localhost', 'root');
			mysqli_select_db($dbc, 'Eventos');
			if (isset($_GET['Evento_id']) && is_numeric($_GET['Evento_id'])) {
				$query = "SELECT * FROM Eventos WHERE Evento_id={$_GET['Evento_id']}";
				if ($r = mysqli_query($dbc, $query)) {
					$fila = mysqli_fetch_array($r);
					echo "<form id=\"borrar\" action=\"borrar.php\" method=\"post\">";
					echo "<h3 style=\"color:red;\" >¿Quiere realmente borrar este evento?</h3>";
					echo "<strong>Nombre del evento: </strong>" ."<span>". $fila['Nombre'] . "</span>";
					echo "<strong>Fecha: </strong>" ."<span>". $fila['Fecha']."</span>";
					echo "<strong>Localizacion: </strong>" . "<span>". $fila['Localizacion'] ."</span>";
					echo "<strong>Ubicacion: </strong>" ."<span>". $fila['Ubicacion']."</span>";
					echo "<strong>Artistas: </strong>" ."<span>". $fila['Artistas'] . "</span>" ;
					echo "<strong>Generos: </strong>" . "<span>". $fila['Generos'] ."</span>" ;
					echo "<input type=\"hidden\" value=\"{$_GET['Evento_id']}\" name=\"Evento_id\"><br>";
					echo "<input role=\"button\" class=\"button-28\" type=\"submit\" value=\"Borrar\">";
					echo "</form>";
				} else {
					echo "<p style=\"color:red;\" >Ha habido un error con la consulta </p>" . "<p>ERR: </p>" . mysqli_error($dbc);
				}
			} elseif (isset($_POST['Evento_id']) && is_numeric($_POST['Evento_id'])) {
				$query = "DELETE FROM Eventos WHERE Evento_id={$_POST['Evento_id']} LIMIT 1";
				$r = mysqli_query($dbc, $query);
				if (mysqli_affected_rows($dbc) == 1) {
					echo "<p style=\"color:green;\" >Evento borrado correctamente</p>";

				} else {
					echo "<p style=\"color:red;\" >No se ha podido borrar correctamente el evento</p>";
				}
			}
			mysqli_close($dbc);
			?>

		</div>
	</div>
</body>

</html>