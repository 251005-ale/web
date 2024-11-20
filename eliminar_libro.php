<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>eliminar Libro</title>
    <link rel="stylesheet" type="text/css" href="eliminara.css">
</head>
<body>
     <h1>Biblioteca</h1>
<form method="post" action="">
        <h2>eliminar Libro</h2>
        <input type="number" name="codigo_libro" placeholder="ID Libro" required>
        <input type="submit" value="Consultar Libro" name="consultar_administrador">
    </form>

    <?php
   
    $conex = mysqli_connect("localhost", "root", "", "Biblioteca");
    if (!$conex) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    if (isset($_POST['consultar_administrador'])) {
        $codigo_libro = $_POST['codigo_libro'];
        $consulta = "SELECT * FROM Libro WHERE codigo_libro = '$codigo_libro'";
        $resultados = mysqli_query($conex, $consulta);

        if (mysqli_num_rows($resultados) > 0) {
            $registro = mysqli_fetch_assoc($resultados);
            ?>
            <form method="post">
                <input type="hidden" name="codigo_libro" value="<?php echo $registro['codigo_libro']; ?>">
                <input type="text" name="titulo" placeholder="NOMBRE" value="<?php echo $registro['titulo']; ?>" required>
                <input type="text" name="genero" placeholder="CONTRASEÑA" value="<?php echo $registro['genero']; ?>" required>
                <input type="date" name="fecha_publicacion" placeholder="CONTRASEÑA" value="<?php echo $registro['fecha_publicacion']; ?>" required>
                <input type="number" name="id_autor" placeholder="CONTRASEÑA" value="<?php echo $registro['id_autor']; ?>" required>
                <input type="number" name="id_editorial" placeholder="CONTRASEÑA" value="<?php echo $registro['id_editorial']; ?>" required>
                <input type="number" name="cantidad_disponible" placeholder="NIVEL" value="<?php echo $registro['cantidad_disponible']; ?>" required>
                <input type="file" name="Imagen" id="imagen" accept="image/*"><br/><br/>
            <?php if (!empty($registro['imagen'])): ?>
                <div style="text-align: center; margin: 10px 0;">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($registro['imagen']); ?>" width="100" height="100"/><br/><br/>
                </div>
            <?php endif; ?>
                <input type="submit" value="Eliminar Libro" name="eliminar_administrador">
                <input type="button" value="Cancelar" onclick="window.location.href='eliminar_administrador.php'">
              
            </form>
            <?php
        } else {
            echo "No se encontro Libro .";
        }
    }

    if (isset($_POST['modificar_administrador'])) {
        $codigo_libro = $_POST['codigo_libro'];
        $titulo = trim($_POST['titulo']);
        $genero = trim($_POST['genero']);
        $fecha_publicacion = trim($_POST['fecha_publicacion']);
        $id_autor = trim($_POST['id_autor']);
        $id_editorial = trim($_POST['id_editorial']);
        $cantidad_disponible = trim($_POST['cantidad_disponible']);
        $imagen = null;

         // Verifica si se cargó una nueva foto
       if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] == UPLOAD_ERR_OK) {
        // Obtiene la foto
        $imagen_tmp = $_FILES['Imagen']['tmp_name'];
        $imagen_contenido = file_get_contents($imagen_tmp);
        $imagen = mysqli_real_escape_string($conex, $imagen_contenido);
    } 

        $consulta1 = "UPDATE Libro SET titulo='$titulo', genero='$genero', fecha_publicacion='$fecha_publicacion', id_autor='$id_autor', id_editorial='$id_editorial', cantidad_disponible='$cantidad_disponible', imagen='$imagen'  WHERE codigo_libro = '$codigo_libro'";

        if (mysqli_query($conex, $consulta1)) {
            echo "Libro actualizado correctamente.";
        } else {
            echo "Error en la actualización: " . mysqli_error($conex);
        }
    }
     if (isset($_POST['eliminar_administrador'])) {
        $codigo_libro = $_POST['codigo_libro'];

        $consulta_administrador = "DELETE FROM Libro WHERE codigo_libro = '$codigo_libro'";
        mysqli_query($conex, $consulta_administrador); 
        $consulta1 = "DELETE FROM Libro WHERE codigo_libro = '$codigo_libro'";

        if (mysqli_query($conex, $consulta1)) {
            echo "Libro eliminado correctamente.";
        } else {
            echo "Error al eliminar: " . mysqli_error($conex);
        }
    }
    ?>