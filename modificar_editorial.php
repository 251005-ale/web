<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Editorial</title>
    <link rel="stylesheet" type="text/css" href="modificara.css">
</head>
<body>
     <h1>Biblioteca</h1>
<form method="post" action="">
        <h2>Modificar Editorial</h2>
        <input type="number" name="id_editorial" placeholder="ID Editorial" required>
        <input type="submit" value="Modificar Editorial" name="Modificar_administrador">
    </form>

    <?php
   
    $conex = mysqli_connect("localhost", "root", "", "Biblioteca");
    if (!$conex) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    if (isset($_POST['Modificar_administrador'])) {
        $id_editorial = $_POST['id_editorial'];
        $consulta = "SELECT * FROM Editorial WHERE id_editorial = '$id_editorial'";
        $resultados = mysqli_query($conex, $consulta);

        if (mysqli_num_rows($resultados) > 0) {
            $registro = mysqli_fetch_assoc($resultados);
            ?>
            <form method="post">
                <input type="hidden" name="id_editorial" value="<?php echo $registro['id_editorial']; ?>">
                <input type="text" name="nombre_editorial" placeholder="NOMBRE" value="<?php echo $registro['nombre_editorial']; ?>" required>
                <input type="text" name="nacionalidad" placeholder="NACIONALIDAD" value="<?php echo $registro['nacionalidad']; ?>" required>
                <input type="text" name="direccion" placeholder="DIRECCION" value="<?php echo $registro['direccion']; ?>" required>
                <input type="text" name="telefono" placeholder="TELEFONO" value="<?php echo $registro['telefono']; ?>" required>
                <input type="text" name="email" placeholder="TELEFONO" value="<?php echo $registro['email']; ?>" required>
                <input type="text" name="sitio_web" placeholder="SITIO WEB" value="<?php echo $registro['sitio_web']; ?>" required>
                <input type="submit" value="Modificar Editorial" name="modificar_administrador">
              
            </form>
            <?php
        } else {
            echo "No se encontro Editorial con esa codigo.";
        }
    }

    if (isset($_POST['modificar_administrador'])) {
        $id_editorial = $_POST['id_editorial'];
        $nombre_editorial = trim($_POST['nombre_editorial']);
        $nacionalidad = trim($_POST['nacionalidad']);
        $direccion = trim($_POST['direccion']);
        $telefono = trim($_POST['telefono']);
        $email = trim($_POST['email']);
        $sitio_web = $_POST['sitio_web'];

        $consulta1 = "UPDATE Editorial SET nombre_editorial='$nombre_editorial', nacionalidad='$nacionalidad', direccion='$direccion', telefono='$telefono', email='$email', sitio_web='$sitio_web' WHERE id_editorial = '$id_editorial'";

        if (mysqli_query($conex, $consulta1)) {
            echo "Editorial actualizado correctamente.";
        } else {
            echo "Error en la actualización: " . mysqli_error($conex);
        }
    }
    ?>