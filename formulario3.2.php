<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conexión a Base de Datos</title>
    <link rel="stylesheet" href="Misestios3.2.css"> 
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Agregar un nuevo registro</h1>
            <form method="post">
                <input type="number" name="codigo_administracion" placeholder="Escribe el ID" required>
                <input type="text" name="nombre" placeholder="Escribe nombre" required>
                <input type="text" name="contraseña" placeholder="contraseña" required>
                <input type="number" name="nivel" placeholder="nivel" required>
                <label>Imagen</label>
                <input type="file" name="imagen" accept="image/*" required>
                <input type="submit" name="registrar" value="Enviar">
            </form>

            <?php

            // Conexión a la base de datos "registros"
            $conex = mysqli_connect("localhost", "root", "", "Biblioteca");

            // Verificar si la conexión fue exitosa
            if (!$conex) {
                die("Conexión fallida: " . mysqli_connect_error());
            }

            // Verificar si el formulario fue enviado
            if (isset($_POST['registrar'])) {
                // Verificar que los campos requeridos no estén vacíos
                if (!empty($_POST['codigo_administracion']) && !empty($_POST['nombre']) && !empty($_POST['contraseña']) && !empty($_POST['nivel'])) {
                    // Recibir los datos del formulario
                    $codigo_administracion = trim($_POST['codigo_administracion']);
                    $nombre = trim($_POST['nombre']);
                    $contraseña = trim($_POST['contraseña']);
                    $nivel = $_POST['nivel'];

                    // Verificar si ya existe un registro con el mismo id_datos o email
                    $verificar = "SELECT * FROM Administrador WHERE codigo_administracion = '$codigo_administracion' OR contraseña = '$contraseña'";
                    $resultado_verificar = mysqli_query($conex, $verificar);

                    if (mysqli_num_rows($resultado_verificar) > 0) {
                        // Si el usuario ya existe, mostrar mensaje de error
                        echo '<div class="message error">¡El usuario ya existe, vuelve a intentarlo!</div>';
                    } else {
                        // Insertar los datos si no existe duplicado
                        $consulta = "INSERT INTO Administrador(codigo_administracion, nombre, contraseña, nivel) VALUES ('$codigo_administracion', '$nombre', '$contraseña', '$nivel')";
                        $resultado = mysqli_query($conex, $consulta);

                        // Verificar si el registro fue exitoso
                        if ($resultado) {
                            echo '<div class="message success">¡Se ha agregado un registro correctamente!</div>';
                        } else {
                            echo '<div class="message error">Error en la consulta: ' . mysqli_error($conex) . '</div>';
                        }
                    }
                } else {
                    echo '<div class="message error">¡Por favor completa todos los campos!</div>';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>