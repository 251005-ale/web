 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de Sesión - Administrador</title>
    <link rel="stylesheet" href="Misestilos2.5.css">

</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Inicio de Sesión - Administrador</h1>
            <form method="post" action="">
                <input type="text" name="nombre" placeholder="Escribe el nombre" required>
                <input type="password" name="contraseña" placeholder="Escribe la contraseña" required>
                <input type="submit" name="login" value="Iniciar Sesión">
            </form>

            <?php
            // Conexión a la base de datos "Biblioteca"
            $conex = mysqli_connect("localhost", "root", "", "Biblioteca");

            // Verificar si la conexión fue exitosa
            if (!$conex) {
                die("Conexión fallida: " . mysqli_connect_error());
            }

            // Verificar si el formulario de inicio de sesión fue enviado
            if (isset($_POST['login'])) {
                $nombre = trim($_POST['nombre']);
                $contraseña = trim($_POST['contraseña']);

                // Consulta para verificar el administrador en la base de datos
                $verificar = "SELECT * FROM Administrador WHERE nombre = '$nombre' AND contraseña = '$contraseña'";
                $resultado = mysqli_query($conex, $verificar);

                if (mysqli_num_rows($resultado) > 0) {
                    // Si el administrador existe, mostrar mensaje de éxito y opciones de bienvenida
                    echo '<div class="message success">Inicio de sesión exitoso.</div>';
                    echo '<div class="welcome-message">Bienvenido a la biblioteca CETIS167. ¿Desea un libro?</div>';
                    echo '<div class="confirm-buttons">
                            <form method="post">
                                <button type="submit" name="si">Sí</button>
                                <button type="submit" name="no">No</button>
                            </form>
                          </div>';
                } else {
                    // Si no existe, mostrar mensaje de error
                    echo '<div class="message bye">¡Credenciales incorrectas! Acceso denegado.</div>';
                }
            }

            // Verificar si se ha presionado el botón "Sí" o "No"
            if (isset($_POST['si'])) {
                echo '<div class="access-buttons" style="display: flex;">
                        <form method="post">
                            <button formaction="Formulario_Prestamos.php">Agregar libro y préstamo</button>
                            <button formaction="Formulario_Editoriales.php">Agregar editorial</button>
                            <button formaction="Formulario_registar.php">Agregar autor</button>
                            <button type="submit" name="cancelar">Cancelar</button>
                        </form>
                      </div>';
            }

            if (isset($_POST['no']) || isset($_POST['cancelar'])) {
                echo '<div class="message bye">Vuelve pronto</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>