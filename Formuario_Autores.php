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

        // Procesamiento del formulario de Autor
        if (isset($_POST['registrar_autor'])) {
            $nombre_autor = $_POST['nombre_autor'];
            $nacionalidad = $_POST['nacionalidad'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $genero_literario = $_POST['genero_literario'];
            $premios = $_POST['premios'];

            // Procesar la imagen
            $imagen = $_FILES['imagen']['tmp_name'];
            $imagen_data = addslashes(file_get_contents($imagen));

            $sql_autor = "INSERT INTO Autores (nombre_autor, nacionalidad, fecha_nacimiento, genero_literario, premios, imagen)
                          VALUES ('$nombre_autor', '$nacionalidad', '$fecha_nacimiento', '$genero_literario', '$premios', '$imagen_data')";
            if ($conex->query($sql_autor) === TRUE) {
                $mensaje = '<h3 class="message success">Autor agregado correctamente.</h3>';
            } else {
                $mensaje = '<h3 class="message error">Error al agregar el autor: ' . $conex->error . '</h3>';
            }
        }

        // Mostrar mensajes
        echo $mensaje;
        ?>

        <?php if ($mostrar_formularios): ?>
            <!-- Formulario para agregar autor -->
            <div class="form-container">
                <h2>Agregar Autor</h2>
                <form method="post" action="" enctype="multipart/form-data">
                    <input type="text" name="nombre_autor" placeholder="Nombre del Autor" required>
                    <input type="text" name="nacionalidad" placeholder="Nacionalidad" required>
                    <input type="date" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required>
                    <input type="text" name="genero_literario" placeholder="Género Literario" required>
                    <input type="text" name="premios" placeholder="Premios (opcional)">
                    <input type="file" name="imagen" accept="image/*" required>
                    <input type="submit" name="registrar_autor" value="Agregar Autor">
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