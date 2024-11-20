<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>eliminar Editorial</title>
    <link rel="stylesheet" type="text/css" href="eliminara.css">
</head>
<body>
     <h1>Biblioteca</h1>
<form method="post" action="">
        <h2>eliminar Editorial</h2>
        <input type="number" name="id_editorial" placeholder="ID Editorial" required>
        <input type="submit" value="Consultar Editorial" name="consultar_administrador">
    </form>

    <?php
   
    $conex = mysqli_connect("localhost", "root", "", "Biblioteca");
    if (!$conex) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    if (isset($_POST['consultar_administrador'])) {
        $id_editorial = $_POST['id_editorial'];
        $consulta = "SELECT * FROM Editorial WHERE id_editorial = '$id_editorial'";
        $resultados = mysqli_query($conex, $consulta);

        if (mysqli_num_rows($resultados) > 0) {
            $registro = mysqli_fetch_assoc($resultados);
            ?>
            <form method="post">
                <input type="hidden" name="id_editorial" value="<?php echo $registro['id_editorial']; ?>">
                <input type="text" name="nombre_editorial" placeholder="NOMBRE" value="<?php echo $registro['nombre_editorial']; ?>" required>
                <input type="text" name="nacionalidad" placeholder="CONTRASEÑA" value="<?php echo $registro['nacionalidad']; ?>" required>
                <input type="text" name="direccion" placeholder="CONTRASEÑA" value="<?php echo $registro['direccion']; ?>" required>
                <input type="text" name="telefono" placeholder="CONTRASEÑA" value="<?php echo $registro['telefono']; ?>" required>
                <input type="text" name="email" placeholder="CONTRASEÑA" value="<?php echo $registro['email']; ?>" required>
                <input type="text" name="sitio_web" placeholder="NIVEL" value="<?php echo $registro['sitio_web']; ?>" required>
                <input type="submit" value="Eliminar Editorial" name="eliminar_administrador">
                <input type="button" value="Cancelar" onclick="window.location.href='eliminar_administrador.php'">
              
            </form>
            <?php
        } else {
            echo "No se encontro Editorial .";
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

        $consulta1 = "UPDATE Editorial SET nombre_editorial='$nombre_editorial', nacionalidad='$nacionalidad', direccion='$direccion', telefono='$telefono', email='$email', sitio_web='$sitio_web'  WHERE id_editorial = '$id_editorial'";

        if (mysqli_query($conex, $consulta1)) {
            echo "Editorial actualizado correctamente.";
        } else {
            echo "Error en la actualización: " . mysqli_error($conex);
        }
    }
     if (isset($_POST['eliminar_administrador'])) {
        $id_editorial = $_POST['id_editorial'];

        $consulta_administrador = "DELETE FROM Editorial WHERE id_editorial = '$id_editorial'";
        mysqli_query($conex, $consulta_administrador); 
        $consulta1 = "DELETE FROM Editorial WHERE id_editorial = '$id_editorial'";

        if (mysqli_query($conex, $consulta1)) {
            echo "Editorial eliminado correctamente.";
        } else {
            echo "Error al eliminar: " . mysqli_error($conex);
        }
    }
    ?>