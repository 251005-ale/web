 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Biblioteca</title>
    <link rel="stylesheet" href="Misestilos2.5.css">
</head>
<body>
    <div class="container">
        <?php
        // Conexión a la base de datos
        $conex = new mysqli("localhost", "root", "", "Biblioteca");
        if ($conex->connect_error) {
            die("Error al conectar a la base de datos: " . $conex->connect_error);
        }

        // Inicialización de variables
        $mostrar_formularios = true;
        $mensaje = '';

        // Procesamiento del formulario de Editorial
        if (isset($_POST['registrar_editorial'])) {
            $nombre_editorial = $_POST['nombre_editorial'];
            $nacionalidad = $_POST['nacionalidad'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $sitio_web = $_POST['sitio_web'];

            $sql_editorial = "INSERT INTO Editorial (nombre_editorial, nacionalidad, direccion, telefono, email, sitio_web)
                              VALUES ('$nombre_editorial', '$nacionalidad', '$direccion', '$telefono', '$email', '$sitio_web')";
            if ($conex->query($sql_editorial) === TRUE) {
                $mensaje = '<h3 class="message success">Editorial agregada correctamente.</h3>';
            } else {
                $mensaje = '<h3 class="message error">Error al agregar la editorial: ' . $conex->error . '</h3>';
            }
        }

        // Mostrar mensajes
        echo $mensaje;
        ?>

        <?php if ($mostrar_formularios): ?>
            <!-- Formulario para agregar editorial -->
            <div class="form-container">
                <h2>Agregar Editorial</h2>
                <form method="post" action="">
                    <input type="text" name="nombre_editorial" placeholder="Nombre de la Editorial" required>
                    <input type="text" name="nacionalidad" placeholder="Nacionalidad" required>
                    <input type="text" name="direccion" placeholder="Dirección" required>
                    <input type="text" name="telefono" placeholder="Teléfono" required>
                    <input type="email" name="email" placeholder="Correo Electrónico" required>
                    <input type="text" name="sitio_web" placeholder="Sitio Web" required>
                    <input type="submit" name="registrar_editorial" value="Agregar Editorial">
                </form>

                <!-- Botón para regresar a la página Biblioteca.php -->
                <form method="post" action="Iniciarsesion.php">
                    <input type="submit" value="Regresar a Biblioteca">
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>