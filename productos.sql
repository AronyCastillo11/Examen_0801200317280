-- Crear base de datos si no existe
CREATE DATABASE IF NOT EXISTS examen;
USE examen;

-- Crear tabla productos (exacta como te dio el ing)
CREATE TABLE productos (
    producto_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion VARCHAR(150),
    precio DECIMAL(10,2),
    estado VARCHAR(20)
);

-- Insertar 20 registros válidos (datos reales de inventario)
INSERT INTO productos (nombre, descripcion, precio, estado) VALUES
('Laptop Dell XPS 13', 'Ultrabook con procesador Intel i7, 16GB RAM y SSD 512GB', 1299.99, 'Activo'),
('iPhone 15', 'Smartphone con cámara de 48MP y chip A16 Bionic', 799.00, 'Activo'),
('Camisa Polo Ralph Lauren', 'Camisa casual de algodón pima con cuello clásico', 89.50, 'Activo'),
('Auriculares AirPods Pro', 'Inalámbricos con Active Noise Cancellation', 249.00, 'Inactivo'),
('Escritorio Ergonómico', 'Mesa ajustable en altura para oficina en casa', 299.00, 'Activo'),
('Zapatillas Nike Air Force 1', 'Sneakers icónicas de cuero blanco', 110.00, 'Activo'),
('TV OLED LG 55"', 'Televisor 4K con Dolby Vision y webOS', 1499.00, 'Activo'),
('Libro "Clean Code"', 'Guía esencial para programadores sobre código limpio', 42.00, 'Activo'),
('Cafetera Keurig K-Mini', 'Máquina de café compacta con pod single-serve', 79.99, 'Inactivo'),
('Bicicleta Eléctrica Rad Power', 'E-bike urbana con batería de 48V', 1599.00, 'Activo'),
('Reloj Apple Watch Series 9', 'Smartwatch con GPS y sensor de oxígeno en sangre', 399.00, 'Activo'),
('Silla Eames Lounge', 'Silla de diseño icónica en cuero y madera', 5500.00, 'Activo'),
('iPad Pro 12.9"', 'Tablet con chip M2 y pantalla Liquid Retina XDR', 1099.00, 'Activo'),
('Jeans Levi\'s 501', 'Pantalones vaqueros originales straight fit', 69.50, 'Inactivo'),
('Impresora Epson EcoTank', 'Impresora inkjet sin cartuchos con tanques recargables', 199.99, 'Activo'),
('Juego de Toallas Cotton', 'Set de 6 toallas de baño en algodón egipcio', 45.00, 'Activo'),
('Cámara Canon EOS R5', 'Mirrorless full-frame con 45MP y 8K video', 3899.00, 'Activo'),
('Guitarra Eléctrica Fender Stratocaster', 'Guitarra legendaria con pastillas single-coil', 799.00, 'Inactivo'),
('Refrigerador Samsung French Door', 'Fridge de 23 cu ft con dispensador de agua', 1899.00, 'Activo'),
('Perfume Dior Sauvage', 'Eau de Toilette para hombre con notas amaderadas', 115.00, 'Activo');