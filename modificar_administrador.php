<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar administrador</title>
    <link rel="stylesheet" type="text/css" href="modificara.css">
</head>
<body>
     <h1>Biblioteca</h1>
<form method="post" action="">
        <h2>Modificar Administrador</h2>
        <input type="number" name="codigo_administracion" placeholder="ID Administrador" required>
        <input type="submit" value="Modificar administrador" name="Modificar_administrador">
    </form>

    <?php

$conex = mysqli_connect("localhost", "root", "", "Biblioteca");
if (!$conex) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['Modificar_administrador'])) {
    $codigo_administracion = $_POST['codigo_administracion'];
    $consulta = "SELECT * FROM administrador WHERE codigo_administracion = '$codigo_administracion'";
    $resultados = mysqli_query($conex, $consulta);

    if (mysqli_num_rows($resultados) > 0) {
        $registro = mysqli_fetch_assoc($resultados);
        ?>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="codigo_administracion" value="<?php echo $registro['codigo_administracion']; ?>">
            <input type="text" name="nombre" placeholder="NOMBRE" value="<?php echo $registro['nombre']; ?>" required>
            <input type="text" name="contraseña" placeholder="CONTRASEÑA" value="<?php echo $registro['contraseña']; ?>" required>
            <input type="number" name="nivel" placeholder="NIVEL" value="<?php echo $registro['nivel']; ?>" required>
            
            <input type="file" name="Imagen" id="foto" accept="image/*"><br/><br/>
            <?php if (!empty($registro['foto'])): ?>
                <div style="text-align: center; margin: 10px 0;">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($registro['foto']); ?>" width="100" height="100"/><br/><br/>
                </div>
            <?php endif; ?>
            <input type="submit" value="Modificar Administrador" name="modificar_administrador">
        </form>
        <?php
    } else {
        echo "No se encontró administrador con ese código.";
    }
}

if (isset($_POST['modificar_administrador'])) {
    $codigo_administracion = $_POST['codigo_administracion'];
    $nombre = trim($_POST['nombre']);
    $contraseña = trim($_POST['contraseña']);
    $nivel = trim($_POST['nivel']);
    $foto = null;

    // Verifica si se cargó una nueva foto
    if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] == UPLOAD_ERR_OK) {
        // Obtiene la foto
        $imagen_tmp = $_FILES['Imagen']['tmp_name'];
        $imagen_contenido = file_get_contents($imagen_tmp);
        $foto = mysqli_real_escape_string($conex, $imagen_contenido);
    }

    // Realiza la actualización
    $consulta1 = "UPDATE administrador SET nombre='$nombre', contraseña='$contraseña', nivel='$nivel', foto='$foto' WHERE codigo_administracion = '$codigo_administracion'";

    if (mysqli_query($conex, $consulta1)) {
        echo "Administrador actualizado correctamente.";
    } else {
        echo "Error en la actualización: " . mysqli_error($conex);
    }
}

?>
