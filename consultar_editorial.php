<!DOCTYPE html>
<html>
<head>
    <title>consultar Editorial</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="consultar.css">
</head>
<body>
    <h1>Biblioteca</h1>
<form method="post" action="">
        <h2>Consultar Editorial</h2>
        <input type="number" name="id_editorial" placeholder="ID Editorial" required>
        <input type="submit" name="existe_administrador" value="Consultar Editorial">
    </form>

 <div id="resultado-t">
        <?php
        include("conexion.php");

     if (isset($_POST['existe_administrador'])) {
            $id_editorial = $_POST['id_editorial'];

          
            $consulta = "SELECT nombre_editorial, nacionalidad, direccion, telefono,   sitio_web FROM Editorial WHERE id_editorial = '$id_editorial'";
            $resultado = mysqli_query($conex, $consulta);

            if (mysqli_num_rows($resultado) > 0) {
                $Editorial = mysqli_fetch_assoc($resultado);
              
                echo '<div class="resultado-t">';
                echo '<h3>El Editorial existe:</h3>';
                echo 'NOMBRE: <input type="text" name="nombre_editorial" value="' . $Editorial['nombre_editorial'] . '"><br>';
                echo 'NACIONALIDAD: <input type="text" name="nacionalidad" value="' . $Editorial['nacionalidad'] . '"><br>';
                echo 'DIRECCION: <input type="date" name="direccion" value="' . $Editorial['direccion'] . '"><br>';
                echo 'TELFONO: <input type="text" name="telefono" value="' . $Editorial['telefono'] . '"><br>';
                echo 'SITIO: <input type="text" name="sitio_web" value="' . $Editorial['sitio_web'] . '"><br>';
                echo '</div>';
            } else {
                echo '<div class="resultado-t"><h3 class="bad">¡El Editorial no existe!</h3></div>';
            }
        }
        ?>
    </div>
</body>
</html>



