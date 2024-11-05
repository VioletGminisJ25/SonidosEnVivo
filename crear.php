<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
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
    <main>

        <?php

        function formato($dato)
        {
            $dato = trim($dato);
            $dato = htmlspecialchars($dato);
            $dato = stripslashes($dato);
            return $dato;
        }

        /* Conexión a la base de datos :D */
        $dbc = mysqli_connect('localhost', 'root');
        mysqli_select_db($dbc, 'Eventos');

        /* Comprobación de los datos */
        $error = false;
        if (!empty($_POST['nombre']) && !empty($_POST['fecha']) && !empty($_POST['localizacion']) && !empty($_POST['ubicacion']) && !empty($_POST['artistas'])) {
            $nombre = formato($_POST['nombre']);

            $fecha = formato($_POST['fecha']);
            $localizacion = formato($_POST['localizacion']);
            $ubicacion = formato($_POST['ubicacion']);

            $artistas = formato($_POST['artistas']);
            $generos = implode(",", $_POST['generos']);
        } else {
            echo "<p style=\"color:red;\" >Todos los campos son obligatorios</p>";
            $error = true;
        }
        if (!$error) {
            $query = "SELECT * FROM Eventos WHERE Nombre = '$nombre' ";
            $result = mysqli_query($dbc, $query);
            if (mysqli_num_rows($result) == 0) {
                /*Configuramos la consulta */
                $query = "INSERT INTO Eventos(Evento_id,Nombre,Fecha,Localizacion,Artistas,Generos,Ubicacion) VALUES (null,'$nombre','$fecha','$localizacion','$artistas','$generos','$ubicacion')";
                /*Funcion que ejecuta la consulta */
                if (mysqli_query($dbc, $query)) {
                    echo "<p style=\"color:green;\" >Evento registrado correctamente</p>";
                } else {
                    echo "<p style=\"color:red;\" >Ha habido un error registrando el evento </p>" . "<p>ERR: </p>" . mysqli_error($dbc);
                }

            } else {
                echo "<p style=\"color:red;\" >Evento ya existente </p>";

            }
        }
        mysqli_close($dbc);
        ?>
    </main>
</body>

</html>