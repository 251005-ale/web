<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
     <title>Agregar Libro y Registrar Prestamo</title>
    <link rel="stylesheet" type="text/css" href="Misestilos3.00.css">
</head>
<body>
	<div class="container">
		<?php
		//conexion a la base de datos
		$conex = new mysqli("localhost", "root","", "Biblioteca");
		if($conex->connect_error){
			die("error al conectar a la base de datos:" . $conex->connect_error);
		}

		$mensaje = '';
		$mostrar_formulario_prestamo = false;
		$ultimo_codigo_libro = null;

       //procesamiento del formulario libro
		if (isset($_POST['registrar_libro'])) {
			$titulo = $_POST['titulo'];
			$genero = $_POST['genero'];
			$fecha_publicacion = $_POST['fecha_publicacion'];
			$id_autor = $_POST['id_autor'];
			$id_editorial = $_POST['id_editorial'];
			$cantidad_disponible = $_POST['cantidad_disponible'];

			if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
				$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
				$sql_libro = "INSERT INTO Libro (titulo, genero, fecha_publicacion, id_autor, id_editorial, cantidad_disponible, imagen) 
				VALUES('$titulo', '$genero', '$fecha_publicacion', '$id_autor', '$id_editorial', '$cantidad_disponible', '$imagen')";
				if($conex->query($sql_libro) === TRUE){
					$ultimo_codigo_libro = $conex->insert_id;  //obtener el ultimo codigo de libro insertado
					$mensaje = '<h3 class="message sucess">Libro agregado correctamnete.</h3>';
					$mostrar_formulario_prestamo = TRUE;
                }else{
					$mensaje = '<h3 class="message error">Error al agregar el Libro:' .$conex->error. '</h3>';
				}
			}else{
				$mensaje = '<h3 class="message error">Error al subir la imagen del Libro.</h3>';
			}
		}

// Procesamiento del formulario de Préstamo
if (isset($_POST['registrar prestamo'])) {
$codigo_libro = $_POST['codigo_libro'];
$id_usuarios = $_POST['id_usuarios'];
$fecha_prestamo = $_POST['fecha_prestamo'];
$fecha_devolucion = $_POST['fecha_devolucion'];

// Verificar si el libro existe en la tabla 'Libro'
$consulta_libro = "SELECT codigo_libro FROM Libro WHERE codigo_libro = '$codigo_libro'";
$resultado_libro = $conex->query($consulta_libro);

if ($resultado_libro->num_rows > 0){
$sql_prestamo = "INSERT INTO Prestamos (codigo_libro, id_usuario, fecha_prestamo, fecha_devolucion, estado) 
VALUES ('$codigo_libro', '$id_usuario', '$fecha_prestamo', '$fecha_devolucion', 'En proceso')";
if ($conex->query($sql_prestamo) === TRUE) {
$mensaje = '<h3 class="message success">Préstamo registrado correctamente.</h3>';
$mostrar_formulario_prestamo = false;
}else{
$mensaje = '<h3 class="message error"> Error al registrar el préstamo:' . $conex->error . '</h3>';
}
}else{
	$mensaje = '<h3 class="message error"> El código del Libro no existe en la tabla de Libros.</h3>';
}
}

// Acción del botón "Cancelar
if (isset($_POST['cancelar'])){
	$mostrar_formulario_prestamo = false;
}  

echo $mensaje;
?>

<?php if (!$mostrar_formulario_prestamo): ?>
    <!-- Formulario para agregar libro -->
		<div class="form-container">
           <h2>Agregar Libro</h2>
<form method="post" action="" enctype="multipart/form-data">
<input type="text" name="titulo" placeholder="Título" required>
<input type="text" name="genero" placeholder="Género" required>
<label>Fecha de Publicación</label>
<input type="date" name="fecha_publicacion" required>
<input type="number" name="id_autor" placeholder="ID Autor" required>
<input type="number" name="id_editorial" placeholder="ID Editorial" required> 
<input type="number" name="cantidad_disponible" placeholder="Cantidad Disponible" required>
<label>Imagen</label>
<input type="file" name="imagen" accept="image/*" required>
<input type="submit" name="registrar_libro" value="Agregar Libro">
</form>
</div>
<?php else: ?>
<!-- Formulario para registrar préstamo -->
<div class="form-container">
<h2>Registrar Préstamo</h2>
<form method="post" action="">
<!-- Uso del último código de Libro agregado automáticamente -->
<input type="number" name="codigo_libro" value="<?php echo $ultimo_codigo_libro; ?>" readonly required>
<input type="number" name="id_usuario" placeholder="ID del Usuario" required> 
<label>Fecha de Préstamo</label>
<input type="date" name="fecha_prestamo" required>
<label>Fecha de Devolución</label>
<input type="date" name="fecha_devolucion">
<input type="submit" name="registrar_prestamo" value="Registrar Préstamo">
</form>

<!-- Botón de cancelar -->
<form method="post" action="">
    <input type="submit" name="cancelar" value="Cancelar" class="btn">
</form>
</div>
<?php endif; ?>
</div>
</body>
</html>