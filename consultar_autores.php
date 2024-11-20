<!DOCTYPE html>
<html>
<head>
    <title>consultar Autores</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="consultar.css">
</head>
<body>
    <h1>Biblioteca</h1>
<form method="post" action="">
        <h2>Consultar Autores</h2>
        <input type="number" name="id_autor" placeholder="ID Autores" required>
        <input type="submit" name="existe_administrador" value="Consultar Autores">
    </form>

 <div id="resultado-t">
        <?php
        include("conexion.php");

     if (isset($_POST['existe_administrador'])) {
            $id_autor = $_POST['id_autor'];

          
            $consulta = "SELECT nombre_autor, nacionalidad, fecha_nacimiento, genero_literario,  premios, imagen FROM Autores WHERE id_autor = '$id_autor'";
            $resultado = mysqli_query($conex, $consulta);

            if (mysqli_num_rows($resultado) > 0) {
                $Autores = mysqli_fetch_assoc($resultado);
              
                echo '<div class="resultado-t">';
                echo '<h3>El Autores existe:</h3>';
                echo 'NOMBRE: <input type="text" name="nombre_autor" value="' . $Autores['nombre_autor'] . '"><br>';
                echo 'NACIONALIDAD: <input type="text" name="nacionalidad" value="' . $Autores['nacionalidad'] . '"><br>';
                echo 'FECHA: <input type="date" name="fecha_nacimiento" value="' . $Autores['fecha_nacimiento'] . '"><br>';
                echo 'GENERO: <input type="text" name="genero_literario" value="' . $Autores['genero_literario'] . '"><br>';
                echo 'PREMIOS: <input type="CANTIDAD" name="premios" value="' . $Autores['premios'] . '"><br>';

                 // Mostrar la imagen si existe en la base de datos
                if (!empty($Autores['imagen'])) {
                    // Si la imagen está guardada como BLOB, la convertimos a base64 para mostrarla
                    $imagen_base64 = base64_encode($Autores['imagen']);
                    echo 'IMAGEN: <img src="data:image/jpeg;base64,' . $imagen_base64 . '" width="100" height="100"><br>';
                } else {
                    echo 'IMAGEN: No disponible<br>';
                }

                echo '</div>';
            } else {
                echo '<div class="resultado-t"><h3 class="bad">¡El Autores no existe!</h3></div>';
            }
        }
        ?>
    </div>
</body>
</html>



