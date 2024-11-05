<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="style2.css" />
	<title>Actualizacion del evento</title>
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
			<div class="boxies">
				<h2>Evento a actualizar</h2>
				<?php
				$dbc = mysqli_connect('localhost', 'root');
				mysqli_select_db($dbc, 'Eventos');
				if (isset($_GET['Evento_id']) && is_numeric($_GET['Evento_id'])) {
					$query = "SELECT * FROM Eventos WHERE Evento_id={$_GET['Evento_id']}";
					if ($r = mysqli_query($dbc, $query)) {
						$fila = mysqli_fetch_array($r);
						echo "<form id=\"actualizar\" action=\"actualizar.php\" method=\"post\">";
						echo "<div class=\"box\">";
						echo "<label for=\"nombre\">Nombre de Evento: </label>";
						echo "<input type=\"text\" name=\"nombre\" id=\"nombre\" value=\"{$fila['Nombre']}\" /><br />";
						echo "</div>";
						echo "<div class=\"box\">";
						echo "<label for=\"fecha\">Fecha: </label>";
						echo "<input type=\"date\" name=\"fecha\" id=\"fecha\" value=\"{$fila['Fecha']}\" /><br />";
						echo "</div>";
						echo "<div class=\"box\">";
						echo "<label for=\"localizacion\">Localizacion: </label>";
						echo "<input type=\"text\" name=\"localizacion\" id=\"localizacion\" value=\"{$fila['Localizacion']}\" /><br />";
						echo "</div>";

						echo "<label for=\"ubicacion\">Ubicacion: </label>";

						if ($fila['Ubicacion'] == "aireLibre") {
							echo "<div class=\"box\">";
							echo "<p>Aire Libre:</p><input type=\"radio\" name=\"ubicacion\" id=\"aireLibre\" value=\"aireLibre\" checked /><br />";
							echo "</div>";
							echo "<div class=\"box\">";

							echo "<p>Teatro:</p><input type=\"radio\" name=\"ubicacion\" id=\"teatro\" value=\"teatro\" /><br />";
							echo "</div>";
							echo "<div class=\"box\">";

							echo "<p>Auditorio:</p><input type=\"radio\" name=\"ubicacion\" id=\"auditorio\" value=\"auditorio\" /><br />";
							echo "</div>";
							echo "<div class=\"box\">";

							echo "<p>Sala:</p> <input type=\"radio\" name=\"ubicacion\" id=\"sala\" value=\"sala\"/><br />";
							echo "</div>";

						}
						if ($fila['Ubicacion'] == "teatro") {
							echo "<div class=\"box\">";
							echo "<p>Aire Libre:</p><input type=\"radio\" name=\"ubicacion\" id=\"aireLibre\" value=\"aireLibre\"  /><br />";
							echo "</div>";
							echo "<div class=\"box\">";

							echo "<p>Teatro:</p><input type=\"radio\" name=\"ubicacion\" id=\"teatro\" value=\"teatro\" checked /><br />";
							echo "</div>";
							echo "<div class=\"box\">";

							echo "<p>Auditorio:</p><input type=\"radio\" name=\"ubicacion\" id=\"auditorio\" value=\"auditorio\" /><br />";
							echo "</div>";
							echo "<div class=\"box\">";

							echo "<p>Sala:</p> <input type=\"radio\" name=\"ubicacion\" id=\"sala\" value=\"sala\"/><br />";
							echo "</div>";
						}
						if ($fila['Ubicacion'] == "auditorio") {
							echo "<div class=\"box\">";
							echo "<p>Aire Libre:</p><input type=\"radio\" name=\"ubicacion\" id=\"aireLibre\" value=\"aireLibre\"  /><br />";
							echo "</div>";
							echo "<div class=\"box\">";

							echo "<p>Teatro:</p><input type=\"radio\" name=\"ubicacion\" id=\"teatro\" value=\"teatro\" /><br />";
							echo "</div>";
							echo "<div class=\"box\">";

							echo "<p>Auditorio:</p><input type=\"radio\" name=\"ubicacion\" id=\"auditorio\" value=\"auditorio\" checked /><br />";
							echo "</div>";
							echo "<div class=\"box\">";

							echo "<p>Sala:</p> <input type=\"radio\" name=\"ubicacion\" id=\"sala\" value=\"sala\"/><br />";
							echo "</div>";
						}
						if ($fila['Ubicacion'] == "sala") {
							echo "<div class=\"box\">";
							echo "<p>Aire Libre:</p><input type=\"radio\" name=\"ubicacion\" id=\"aireLibre\" value=\"aireLibre\"  /><br />";
							echo "</div>";
							echo "<div class=\"box\">";

							echo "<p>Teatro:</p><input type=\"radio\" name=\"ubicacion\" id=\"teatro\" value=\"teatro\" /><br />";
							echo "</div>";
							echo "<div class=\"box\">";

							echo "<p>Auditorio:</p><input type=\"radio\" name=\"ubicacion\" id=\"auditorio\" value=\"auditorio\" /><br />";
							echo "</div>";
							echo "<div class=\"box\">";

							echo "<p>Sala:</p> <input type=\"radio\" name=\"ubicacion\" id=\"sala\" value=\"sala\" checked /><br />";
							echo "</div>";
						}

						echo "<div class=\"box\">";

						echo "<label for=\"artistas\">Artistas: </label>";
						echo "<input type=\"text\" name=\"artistas\" id=\"artistas\" value=\"{$fila['Artistas']}\" /><br />";
						echo "</div>";

						echo "<label for=\"generos\">Generos: </label>";
						echo "<div class=\"box\">";

						echo "<p>Rock:</p><input type=\"checkbox\" name=\"generos[]\" id=\"Rock\" value=\"Rock\" /><br />";
						echo "</div>";
						echo "<div class=\"box\">";

						echo "<p>Punk:</p><input type=\"checkbox\" name=\"generos[]\" id=\"Punk\" value=\"Punk\" /><br />";
						echo "</div>";
						echo "<div class=\"box\">";


						echo "<p>Metal:</p><input type=\"checkbox\" name=\"generos[]\" id=\"Metal\" value=\"Metal\" /><br />";
						echo "</div>";
						echo "<div class=\"box\">";

						echo "<p>Clásico:</p> <input type=\"checkbox\" name=\"generos[]\" id=\"Clasico\" value=\"Clasico\"/ ><br />";
						echo "</div>";
						echo "<div class=\"box\">";

						echo "<p>Urbano:</p> <input type=\"checkbox\" name=\"generos[]\" id=\"Urbano\" value=\"Urbano\"/><br />";
						echo "</div>";
						echo "<div class=\"box\">";

						echo "<p>Reagge:</p> <input type=\"checkbox\" name=\"generos[]\" id=\"Reagge\" value=\"Reagge\"/><br />";
						echo "</div>";

						echo "<input type=\"hidden\" value=\"{$_GET['Evento_id']}\" name=\"Evento_id\"><br>";
						echo "<input  class=\"button-28\" type=\"submit\" value=\"Actualizar\">";
						echo "</form>";
					} else {
						echo "<p style=\"color:red;\" >Ha habido un error con la consulta </p>" . "<p>ERR: </p>" . mysqli_error($dbc);
					}
				} elseif (isset($_POST['Evento_id']) && is_numeric($_POST['Evento_id'])) {
					$error = false;
					if (!empty($_POST['nombre']) && !empty($_POST['fecha']) && !empty($_POST['localizacion']) && !empty($_POST['ubicacion']) && !empty($_POST['artistas']) && $_POST['generos'] != null) {
						$nombre = $_POST['nombre'];
						$fecha = $_POST['fecha'];
						$localizacion = $_POST['localizacion'];
						$ubicacion = $_POST['ubicacion'];
						$artistas = $_POST['artistas'];
						$generos = implode(",", $_POST['generos']);
					} else {
						echo "<p style=\"color:red;\" >Todos los campos son obligatorios</p>";
						$error = true;
					}
					if (!$error) {
						$query = "UPDATE Eventos SET Nombre = '$nombre',Fecha = '$fecha' , Localizacion ='$localizacion', Ubicacion='$ubicacion', Artistas = '$artistas', Generos = '$generos' WHERE Evento_id ={$_POST['Evento_id']}";
						$r = mysqli_query($dbc, $query);
						if (mysqli_affected_rows($dbc) == 1) {
							echo "<p style=\"color:green;\" >Evento actualizado correctamente</p>";

						} else {
							echo "<p style=\"color:red;\" >No se ha podido actualizar correctamente el evento</p>";
						}
					} else {
						echo "<p style=\"color:red;\" >No se ha podido acceder a la pagina</p>";

					}
				}

				mysqli_close($dbc);
				?>
			</div>
		</div>

	</div>
</body>

</html>