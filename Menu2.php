<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <title>Menu Principal Biblioteca</title>
    <link rel="stylesheet" href="Estilos_izquierda2.css">
</head>
<body>
    <header>
    <center><h1>CONSULTAR MENU BIBLIOTECA</h1></center>
    </header>
        <h2>Selecciona una opción del menú</h2>
   
        <div class="main-container">
            <!-- Menú a la izquierda -->
            <div class="menu">
                <div class="contenedor" id="uno">
                    <a href="iniciarsesion.php" target="contenido">
                        <img class="icon" src="INICIO.png" alt="Inicio">
                        <p class="texto">Inicio de sesión</p>
                    </a>
                </div>
                <div class="contenedor" id="dos">
                    <a href="formulario_prestamos.php" target="contenido">
                        <img class="icon" src="AÑADIR.png" alt="Añadir">
                        <p class="texto">Añadir</p>
                    </a>
                </div>
                <div class="contenedor" id="tres">
                    <img class="icon" src="CONSULTAR.jpg" alt="Consultar">
                    <p class="texto">Consultar</p>
                    <div class="dropdown-content">
                        <a href="consultar_administrador.php" target="contenido">Consulta Administrador</a>
                        <a href="consultar_libro.php" target="contenido">Consulta libro</a>
                        <a href="consultar_autores.php" target="contenido">Consulta autor</a>
                        <a href="consultar_editorial.php" target="contenido">Consulta editorial</a>
                    </div>
                </div>
                <div class="contenedor" id="cuatro">
                    <img class="icon" src="MODIFICAR.png" alt="Modificar">
                    <p class="texto">Modificar</p>
                    <div class="dropdown-content">
                        <a href="modificar_administrador.php" target="contenido">Modificar Administrador</a>
                        <a href="modificar_libro.php" target="contenido">Modificar libro</a>
                        <a href="modificar_autor.php" target="contenido">Modificar autor</a>
                        <a href="modificar_editorial.php" target="contenido">Modificar editorial</a>
                    </div>
                </div>
                <div class="contenedor" id="cinco">
                    <img class="icon" src="ELIMINAR.png" alt="Eliminar">
                    <p class="texto">Eliminar</p>
                    <div class="dropdown-content">
                        <a href="eliminar_administrador.php" target="contenido">Eliminar Administrador</a>
                        <a href="eliminar_libro.php" target="contenido">Eliminar libro</a>
                        <a href="eliminar_autor.php" target="contenido">Eliminar autor</a>
                        <a href="eliminar_editorial.php" target="contenido">Eliminar editorial</a>
                    </div>
                </div>
                 <div class="contenedor" id="seis">
                    <img class="icon" src="pdf.png" alt="PDF">
                    <p class="texto">PDF</p>
                    <div class="dropdown-content">
                        <a href="fpdf/pdf.php" target="contenido">PDF ADMINISTRADOR</a>
                        <a href="fpdf/pdf2.php" target="contenido">PDF LIBRO</a>
                        <a href="fpdf/pdf3.php" target="contenido">PDF AUTORES</a>
                        <a href="fpdf/pdf4.php" target="contenido">PDF EDITORIAL</a>
                        <a href="fpdf/pdf5.php" target="contenido">PDF USUARIOS</a>
                        <a href="fpdf/pdf6.php" target="contenido">PDF PRESTAMOS</a>
                    </div>
                </div>
            </div>

            <!-- Contenedor del iframe a la derecha -->
            <div class="content">
                <iframe name="contenido" id="contenido" class="iframe-contenido"></iframe>

            </div>
        </div>
   
</body>
</html>