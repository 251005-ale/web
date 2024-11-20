<!DOCTYPE html>
<html>
<head>
    <title>consultar Libro</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="consultar.css">
</head>
<body>
    <h1>Biblioteca</h1>
<form method="post" action="">
        <h2>Consultar Libro</h2>
        <input type="number" name="codigo_libro" placeholder="ID Administrador" required>
        <input type="submit" name="existe_administrador" value="Consultar Libro">
    </form>

 <div id="resultado-t">
        <?php
        include("conexion.php");

     if (isset($_POST['existe_administrador'])) {
            $codigo_libro = $_POST['codigo_libro'];

          
            $consulta = "SELECT titulo, genero, fecha_publicacion, id_autor,  id_editorial, cantidad_disponible, imagen FROM Libro WHERE codigo_libro = '$codigo_libro'";
            $resultado = mysqli_query($conex, $consulta);

            if (mysqli_num_rows($resultado) > 0) {
                $Libro = mysqli_fetch_assoc($resultado);
              
                echo '<div class="resultado-t">';
                echo '<h3>El Libro existe:</h3>';
                echo 'TITULO: <input type="text" name="titulo" value="' . $Libro['titulo'] . '"><br>';
                echo 'GENERO: <input type="text" name="genero" value="' . $Libro['genero'] . '"><br>';
                echo 'FECHA: <input type="date" name="fecha_publicacion" value="' . $Libro['fecha_publicacion'] . '"><br>';
                echo 'ID_AUTOR: <input type="number" name="id_autor" value="' . $Libro['id_autor'] . '"><br>';
                echo 'ID_EDITORIAL: <input type="number" name="id_editorial" value="' . $Libro['id_editorial'] . '"><br>';

                echo 'NIVEL: <input type="number" name="cantidad_disponible" value="' . $Libro['cantidad_disponible'] . '"><br>';
              

              // Mostrar la imagen si existe en la base de datos
                if (!empty($Libro['imagen'])) {
                    // Si la imagen está guardada como BLOB, la convertimos a base64 para mostrarla
                    $imagen_base64 = base64_encode($Libro['imagen']);
                    echo 'IMAGEN: <img src="data:image/jpeg;base64,' . $imagen_base64 . '" width="100" height="100"><br>';
                } else {
                    echo 'IMAGEN: No disponible<br>';
                }



                echo '</div>';
            } else {
                echo '<div class="resultado-t"><h3 class="bad">¡El Libro no existe!</h3></div>';
            }
        }
        ?>
    </div>
</body>
</html>



