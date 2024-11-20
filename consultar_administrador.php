<!DOCTYPE html>
<html>
<head>
    <title>consultar administrador</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="consultar.css">
</head>
<body>
    <h1>Biblioteca</h1>
<form method="post" action="">
        <h2>Consultar Administrador</h2>
        <input type="number" name="codigo_administracion" placeholder="ID Administrador" required>
        <input type="submit" name="existe_administrador" value="Consultar Administrador">
    </form>

 <div id="resultado-t">
        <?php
        include("conexion.php");

     if (isset($_POST['existe_administrador'])) {
            $codigo_administracion = $_POST['codigo_administracion'];

            // Consulta que incluye la foto
            $consulta = "SELECT nombre, contraseña, nivel, foto FROM administrador WHERE codigo_administracion = '$codigo_administracion'";
            $resultado = mysqli_query($conex, $consulta);

            if (mysqli_num_rows($resultado) > 0) {
                $administrador = mysqli_fetch_assoc($resultado);
                echo '<div class="resultado-t">';
                echo '<h3>El administrador existe:</h3>';
                echo 'NOMBRE: <input type="text" name="nombre" value="' . $administrador['nombre'] . '"><br>';
                echo 'CONTRASEÑA: <input type="text" name="contraseña" value="' . $administrador['contraseña'] . '"><br>';
                echo 'NIVEL: <input type="number" name="nivel" value="' . $administrador['nivel'] . '"><br>';

                // Mostrar la foto si existe en la base de datos
                if (!empty($administrador['foto'])) {
                    // Si la foto está guardada como BLOB, la convertimos a base64 para mostrarla
                    $foto_base64 = base64_encode($administrador['foto']);
                    echo 'FOTO: <img src="data:image/jpeg;base64,' . $foto_base64 . '" width="100" height="100"><br>';
                } else {
                    echo 'FOTO: No disponible<br>';
                }

                echo '</div>';
            } else {
                echo '<div class="resultado-t"><h3 class="bad">¡El administrador no existe!</h3></div>';
            }
        }
        ?>
    </div>
</body>
</html>
