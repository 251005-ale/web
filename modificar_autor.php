<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Autores</title>
    <link rel="stylesheet" type="text/css" href="modificara.css">
</head>
<body>
     <h1>Biblioteca</h1>
<form method="post" action="">
        <h2>Modificar Autores</h2>
        <input type="number" name="id_autor" placeholder="ID Autores" required>
        <input type="submit" value="Modificar Autores" name="Modificar_administrador">
    </form>

    <?php
   
    $conex = mysqli_connect("localhost", "root", "", "Biblioteca");
    if (!$conex) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    if (isset($_POST['Modificar_administrador'])) {
        $id_autor = $_POST['id_autor'];
        $consulta = "SELECT * FROM Autores WHERE id_autor = '$id_autor'";
        $resultados = mysqli_query($conex, $consulta);

        if (mysqli_num_rows($resultados) > 0) {
            $registro = mysqli_fetch_assoc($resultados);
            ?>
           <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_autor" value="<?php echo $registro['id_autor']; ?>">
                <input type="text" name="nombre_autor" placeholder="NOMBRE" value="<?php echo $registro['nombre_autor']; ?>" required>
                <input type="text" name="nacionalidad" placeholder="NACIONALIDAD" value="<?php echo $registro['nacionalidad']; ?>" required>
                <input type="date" name="fecha_nacimiento" placeholder="FECHA" value="<?php echo $registro['fecha_nacimiento']; ?>" required>
                <input type="text" name="genero_literario" placeholder="GENERO" value="<?php echo $registro['genero_literario']; ?>" required>
                <input type="text" name="premios" placeholder="PREMIOS" value="<?php echo $registro['premios']; ?>" required>
                 <input type="file" name="Imagen" id="imagen" accept="image/*"><br/><br/>
            <?php if (!empty($registro['imagen'])): ?>
                <div style="text-align: center; margin: 10px 0;">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($registro['imagen']); ?>" width="100" height="100"/><br/><br/>
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
        $id_autor = $_POST['id_autor'];
        $nombre_autor = trim($_POST['nombre_autor']);
        $nacionalidad = trim($_POST['nacionalidad']);
        $fecha_nacimiento = trim($_POST['fecha_nacimiento']);
        $genero_literario = trim($_POST['genero_literario']);
        $premios = trim($_POST['premios']);
        $imagen = null;

        // Verifica si se cargó una nueva foto
       if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] == UPLOAD_ERR_OK) {
        // Obtiene la foto
        $imagen_tmp = $_FILES['Imagen']['tmp_name'];
        $imagen_contenido = file_get_contents($imagen_tmp);
        $imagen = mysqli_real_escape_string($conex, $imagen_contenido);
    } 


        $consulta1 = "UPDATE Autores SET nombre_autor='$nombre_autor', nacionalidad='$nacionalidad', fecha_nacimiento='$fecha_nacimiento', genero_literario='$genero_literario', premios='$premios', imagen='$imagen' WHERE id_autor = '$id_autor'";

        if (mysqli_query($conex, $consulta1)) {
            echo "Autores actualizado correctamente.";
        } else {
            echo "Error en la actualización: " . mysqli_error($conex);
        }
    }
    ?>