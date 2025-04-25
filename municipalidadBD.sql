CREATE DATABASE IF NOT EXISTS municipalidad;

CREATE TABLE municipalidad.usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL,
    cedula VARCHAR(15) UNIQUE,
    apellido1 VARCHAR(100),
    apellido2 VARCHAR(100)
);


CREATE TABLE municipalidad.amenidades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    ubicacion VARCHAR(100),
    disponible BOOLEAN DEFAULT TRUE,
    reservado BOOLEAN DEFAULT FALSE,
    imagen_url VARCHAR(255),
    comentarios VARCHAR(255)
);


CREATE TABLE municipalidad.reservas (
  idReservas INT AUTO_INCREMENT PRIMARY KEY,
  espacio VARCHAR(30) NOT NULL,
  fecha DATE NOT NULL,
  horario VARCHAR(30) NOT NULL,
  nombreCompleto VARCHAR(100) NOT NULL,
  correo VARCHAR(50) NOT NULL,
  cedula VARCHAR(30) NOT NULL,
  telefono VARCHAR(8) NOT NULL,
  tipoEvento VARCHAR(30) NOT NULL,
  cantidadPersonas INT NOT NULL,
  comentarios TEXT
)