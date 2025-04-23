CREATE DATABASE IF NOT EXISTS municipalidad;
USE municipalidad;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL
    cedula VARCHAR(15) UNIQUE,
    apellido1 VARCHAR(100),
    apellido2 VARCHAR(100)
);

CREATE TABLE amenidades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    ubicacion VARCHAR(100),
    disponible BOOLEAN DEFAULT TRUE
);

CREATE TABLE reservaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    amenidad_id INT,
    fecha_reserva DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fin TIME NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (amenidad_id) REFERENCES amenidades(id)
);