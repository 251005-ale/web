CREATE DATABASE IF NOT EXISTS Biblioteca;
USE Biblioteca;

CREATE TABLE IF NOT EXISTS Autores (
    id_autor INT PRIMARY KEY AUTO_INCREMENT,
    nombre_autor VARCHAR(100) NOT NULL,
    nacionalidad VARCHAR(50) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    genero_literario VARCHAR(50) NOT NULL,
    premios VARCHAR(100),
    imagen LONGBLOB NOT NULL
);

CREATE TABLE IF NOT EXISTS Editorial (
    id_editorial INT PRIMARY KEY AUTO_INCREMENT,
    nombre_editorial VARCHAR(100) NOT NULL,
    nacionalidad VARCHAR(50) NOT NULL,
    direccion VARCHAR(200) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    sitio_web VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS Libro (
    codigo_libro INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    fecha_publicacion DATE NOT NULL,
    id_autor INT NOT NULL,
    id_editorial INT NOT NULL, 
    cantidad_disponible INT NOT NULL,
    imagen LONGBLOB NOT NULL,
    FOREIGN KEY (id_autor) REFERENCES Autores(id_autor),
    FOREIGN KEY (id_editorial) REFERENCES Editorial(id_editorial)
);

CREATE TABLE IF NOT EXISTS Usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre_completo VARCHAR(100) NOT NULL,
    direccion VARCHAR(200) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    fecha_registro DATE NOT NULL,
    imagen LONGBLOB NOT NULL
);

CREATE TABLE IF NOT EXISTS Prestamos (
    id_prestamo INT PRIMARY KEY AUTO_INCREMENT,
    codigo_libro INT NOT NULL,
    id_usuario INT NOT NULL,
    fecha_prestamo DATE NOT NULL,
    fecha_devolucion DATE,
    estado VARCHAR(50) NOT NULL,
    FOREIGN KEY (codigo_libro) REFERENCES Libro(codigo_libro),
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);
 
 CREATE TABLE IF NOT EXISTS administrador (
    codigo_administracion INT PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(100) NOT NULL,
    contraseña VARCHAR(50) NOT NULL,
    nivel INT NOT NULL,
    foto  LONGBLOB NOT NULL
 );   
 

INSERT INTO Autores(nombre_autor, nacionalidad, fecha_nacimiento, genero_literario, premios)
VALUES ('Gabriel García Márquez', 'colombiano', '1917-03-06', 'realismo magico', 'premio nobel de literatura');
INSERT INTO Autores(nombre_autor, nacionalidad, fecha_nacimiento, genero_literario, premios)
VALUES('Antoine de Saint Exupery', 'francés', '1900-06-29', 'literatura infantil', 'ninguno');
INSERT INTO Autores(nombre_autor, nacionalidad, fecha_nacimiento, genero_literario, premios)
VALUES('J.K. Rowling', 'britanica', '1965-07-31', 'fantasia', 'premio britanico de literatura');
INSERT INTO Autores(nombre_autor, nacionalidad, fecha_nacimiento, genero_literario, premios)
VALUES('Jenni Desmond', 'española', '1975-01-01', 'infantil', 'ninguno');
INSERT INTO Autores(nombre_autor, nacionalidad, fecha_nacimiento, genero_literario, premios)
VALUES('Joseph Charles Mardrus', 'frances', '1000-01-01', 'literatura clásica','Premios Fénix'); 
INSERT INTO Autores(nombre_autor, nacionalidad, fecha_nacimiento, genero_literario, premios)
values('Paulo Coelho','brasileño','1947-08-24','Autoayuda, Novela ','Premio Bambi ');
INSERT INTO Autores(nombre_autor, nacionalidad, fecha_nacimiento, genero_literario, premios)
values('Jane Austen','Inglaterra','1775-09-16','novela','ninguno');
INSERT INTO Autores(nombre_autor, nacionalidad, fecha_nacimiento, genero_literario, premios)
values('Miguel de Cervantes','español','1547-09-29','novela','2023-Luis Mateo Díez.');
INSERT INTO Autores(nombre_autor, nacionalidad, fecha_nacimiento, genero_literario, premios)
values('Agatha Chistie','británica','1890-09-15','romántico',' Edgar Grand Maste');
INSERT INTO Autores(nombre_autor, nacionalidad, fecha_nacimiento, genero_literario, premios)
values('Edgar Allan Poe', 'estadounidense ', '1809-01-19', 'ciencia ficción', 'Premio Villa de Bilbao');
SELECT * FROM Autores;

INSERT INTO Editorial(nombre_editorial, nacionalidad, direccion, telefono, email, sitio_web)
VALUES ('Editorial de Vanguardia en Lengua Castellana', 'Colombia', '08036-Barcelona, Av', '933.481.482', 'atencionalcliente@clubvanguardia.com', 'www.clubvanguardia.com');
INSERT INTO Editorial(nombre_editorial, nacionalidad, direccion, telefono, email, sitio_web)
VALUES('Editorial Juventud', 'Francia', 'Rue de la Paix, 20', '01234-5678', 'info@editorialjuventud.com', 'www.editorialjuventud.com');
INSERT INTO Editorial(nombre_editorial, nacionalidad, direccion, telefono, email, sitio_web)
VALUES('Bloomsbury', 'Reino Unido', '50 Bedford Square, London', '020-1234-5678', 'contact@bloomsbury.com', 'www.bloomsbury.com');
INSERT INTO Editorial(nombre_editorial, nacionalidad, direccion, telefono, email, sitio_web)
VALUES('Editorial Anaya', 'España', 'Calle de la Paz, 10', '09876-5432', 'info@anaya.com', 'www.anaya.com');
INSERT INTO Editorial(nombre_editorial, nacionalidad, direccion, telefono, email, sitio_web)
VALUES('Editorial Clásicos', 'Desconocido', 'Calle de la Historia, 5', '11111-2222', 'info@clasicos.com', 'www.clasicos.com');  
INSERT INTO Editorial(nombre_editorial, nacionalidad, direccion, telefono, email, sitio_web)
values('Alba','española','Baixada de Sant Miquel, 1 bajos 08002 Barcelona.','(34) 93 415 29 29.','alba@gmail.com','https://www.albaeditorial.es/');
INSERT INTO Editorial(nombre_editorial, nacionalidad, direccion, telefono, email, sitio_web)
values('Acantilado','española','calle Muntaner, 462 E-08006 (Barcelona)',' (+34) 934 144 906','correo@acantilado.es','https://www.acantilado.es/');
INSERT INTO Editorial(nombre_editorial, nacionalidad, direccion, telefono, email, sitio_web)
values('Alfaguara','española','CP 03240, Benito Juárez, Ciudad de México','5420 7530','alfaguara@gmail.com','https://sic.cultura.gob.mx/');
INSERT INTO Editorial(nombre_editorial, nacionalidad, direccion, telefono, email, sitio_web)
values('Anagrama','española','Mexico City: Roma Norte, Ciudad de México, 06700)','+52 (55) 7825 8809','anagrama@gmail.com','https://anagrama.com/');
INSERT INTO Editorial(nombre_editorial, nacionalidad, direccion, telefono, email, sitio_web)
values('Alianza','española','S.A. C/ Valentín Beato, Madrid (España)','[+34] 91 393 88 88','alianza@gmail.com','https://www.alianzaeditorial.es/');
SELECT * FROM Editorial;

INSERT INTO Libro(titulo, genero, fecha_publicacion, id_autor, id_editorial, cantidad_disponible)
VALUES ('Cien años de soledad', 'realismo mágico', '1967-06-05', 1, 1, 5);
INSERT INTO Libro(titulo, genero, fecha_publicacion, id_autor, id_editorial, cantidad_disponible)
VALUES('El Principito', 'fantasía', '1943-04-06', 2, 2, 3);
INSERT INTO Libro(titulo, genero, fecha_publicacion, id_autor, id_editorial, cantidad_disponible)
VALUES('Harry Potter y la piedra filosofal', 'fantasía', '1997-06-26', 3, 3, 4);
INSERT INTO Libro(titulo, genero, fecha_publicacion, id_autor, id_editorial, cantidad_disponible)
VALUES('La ballena azul', 'infantil', '1970-01-01', 4, 4, 2);
INSERT INTO Libro(titulo, genero, fecha_publicacion, id_autor, id_editorial, cantidad_disponible)
VALUES('Las mil y una noches', 'literatura clásica', '1000-01-01', 5, 5, 1);  
INSERT INTO Libro(titulo, genero, fecha_publicacion, id_autor, id_editorial, cantidad_disponible)
values('El cuervo','poema narrativo','1845-01-29','6','6','9');
INSERT INTO Libro(titulo, genero, fecha_publicacion, id_autor, id_editorial, cantidad_disponible)
values('Orgullo y prejuicio','novela rosa','1813-01-28','7','7','3');
INSERT INTO Libro(titulo, genero, fecha_publicacion, id_autor, id_editorial, cantidad_disponible)
values('Don Quixote','Novela de aventuras','1605-01-01','8','8','4');
INSERT INTO Libro(titulo, genero, fecha_publicacion, id_autor, id_editorial, cantidad_disponible)
values('Asesinato en el Orient Express','misterio','1934-01-01','9','9','4');
INSERT INTO Libro(titulo, genero, fecha_publicacion, id_autor, id_editorial, cantidad_disponible)
values('El alquimista','novela','1988-03-17','10','10','6');
SELECT * FROM Libro;

INSERT INTO Usuarios(nombre_completo, direccion, telefono, email, fecha_registro)
VALUES ('Diana Hernandez Sanchez', 'Milpa Alta', '5556789098', 'diana@gmail.com', '2017-03-06');
INSERT INTO Usuarios(nombre_completo, direccion, telefono, email, fecha_registro)
VALUES('Juan Hernan Pérez', 'Calle Falsa 123', '5551234567', 'juan@gmail.com', '2022-01-01');
INSERT INTO Usuarios(nombre_completo, direccion, telefono, email, fecha_registro)
VALUES('María lopez Gómez', 'Av. Libertad 456', '5559876543', 'maria@gmail.com', '2022-02-01');
INSERT INTO Usuarios(nombre_completo, direccion, telefono, email, fecha_registro)
VALUES('Luis santos Martínez', 'Calle Real 789', '5556543210', 'luis@gmail.com', '2022-03-01');
INSERT INTO Usuarios(nombre_completo, direccion, telefono, email, fecha_registro)
VALUES('Nadia nanco vazquez', 'Calle Nueva 321', '5553219870', 'nadia@gmail.com', '2022-04-01'); 
INSERT INTO Usuarios(nombre_completo, direccion, telefono, email, fecha_registro)
values('Nadia Nanco Vazquez','Pino S/N','5578392526','nadia@gmail.com','2024-10-29');
INSERT INTO Usuarios(nombre_completo, direccion, telefono, email, fecha_registro)
values('javier santos luz','Calle 11','5545325433','leti@gmail.com','2024-11-02');
INSERT INTO Usuarios(nombre_completo, direccion, telefono, email, fecha_registro)
values('diana rojas castillo','Gerrero','5567484293','emanuel@gmail.com','2024-11-01');
INSERT INTO Usuarios(nombre_completo, direccion, telefono, email, fecha_registro)
values('anet martinez hernandez','san pedro','5574556543','ana@gmail.com','2024-10-30');
INSERT INTO Usuarios(nombre_completo, direccion, telefono, email, fecha_registro)
values('ana karen martines','santa cecilia','5545634532','omar@gmail.com','2024-10-28');
SELECT * FROM Usuarios;

INSERT INTO Prestamos(codigo_libro, id_usuario, fecha_prestamo, fecha_devolucion, estado)
VALUES (1, 1, '2023-03-06', '2023-03-16', 'devuelto');
INSERT INTO Prestamos(codigo_libro, id_usuario, fecha_prestamo, fecha_devolucion, estado)
VALUES(2, 2, '2023-03-10', '2023-03-10', 'prestado');
INSERT INTO Prestamos(codigo_libro, id_usuario, fecha_prestamo, fecha_devolucion, estado)
VALUES(3, 3, '2023-03-12', '2023-03-12', 'devuelto');
INSERT INTO Prestamos(codigo_libro, id_usuario, fecha_prestamo, fecha_devolucion, estado)
VALUES(4, 4, '2023-03-14', '2023-03-14', 'prestado');
INSERT INTO Prestamos(codigo_libro, id_usuario, fecha_prestamo, fecha_devolucion, estado)
VALUES(5, 5, '2023-03-15', '2023-03-18', 'devuelto'); 
INSERT INTO Prestamos(codigo_libro, id_usuario, fecha_prestamo, fecha_devolucion, estado)
values(6, 6,'2023-03-06','2024-10-29','devuelto');
INSERT INTO Prestamos(codigo_libro, id_usuario, fecha_prestamo, fecha_devolucion, estado)
values(7, 7,'2023-03-06','2024-11-02','devuelto');
INSERT INTO Prestamos(codigo_libro, id_usuario, fecha_prestamo, fecha_devolucion, estado)
values(8, 8,'2023-03-06','2024-11-01','devuelto');
INSERT INTO Prestamos(codigo_libro, id_usuario, fecha_prestamo, fecha_devolucion, estado)
values(9, 9,'2023-03-06','2024-10-30','devuelto');
INSERT INTO Prestamos(codigo_libro, id_usuario, fecha_prestamo, fecha_devolucion, estado)
values(10, 10,'2023-03-06','2024-10-28','devuelto');
SELECT * FROM Prestamos;

INSERT INTO administrador(nombre, contraseña, nivel, foto)
VALUES ('Administracion general', 'admin6123', '2', 'ruta/imagen/jpg');
INSERT INTO administrador(nombre, contraseña, nivel, foto)
VALUES ('sofia de luna', '12345', '2', 'ruta/imagen/jpg');
INSERT INTO administrador(nombre, contraseña, nivel, foto)
VALUES ('nadia nanco vazquez', '23456', '2', 'ruta/imagen/jpg');
INSERT INTO administrador(nombre, contraseña, nivel, foto)
VALUES ('javier santos luz', '34567', '2', 'ruta/imagen/jpg');
INSERT INTO administrador(nombre, contraseña, nivel, foto)
VALUES ('isac sanches rojas', '45678', '2', 'ruta/imagen/jpg');
INSERT INTO administrador(nombre, contraseña, nivel, foto)
VALUES ('paola madelyn vazquez', '56789', '2', 'ruta/imagen/jpg');
INSERT INTO administrador(nombre, contraseña, nivel, foto)
VALUES ('carlos molina', '90123', '2', 'ruta/imagen/jpg');
INSERT INTO administrador(nombre, contraseña, nivel, foto)
VALUES ('elesban tapia', '03456', '2', 'ruta/imagen/jpg');
INSERT INTO administrador(nombre, contraseña, nivel, foto)
VALUES ('tomas de luna', '077834', '2', 'ruta/imagen/jpg');
INSERT INTO administrador(nombre, contraseña, nivel, foto)
VALUES ('kelly serra hernandez', '25678', '2', 'ruta/imagen/jpg');
SELECT * FROM administrador;


DROP DATABASE Biblioteca;