CREATE TABLE cursos (
    curso_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(200),
    creditos INT NOT NULL,
    estado VARCHAR(20) DEFAULT 'Activo'
);