-- Crear DB y tabla (exacta como te dio el ing)
CREATE DATABASE IF NOT EXISTS examen;
USE examen;

CREATE TABLE productos (
    producto_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion VARCHAR(150),
    precio DECIMAL(10,2),
    estado VARCHAR(20)
);

-- 20 INSERTs válidos (productos variados para inventario)
INSERT INTO productos (nombre, descripcion, precio, estado) VALUES
('Laptop HP Pavilion', 'Portátil gaming con i5, 8GB RAM y GPU dedicada', 899.99, 'Activo'),
('Samsung Galaxy S23', 'Smartphone Android con pantalla AMOLED 6.1"', 699.00, 'Activo'),
('Sudadera Adidas Originals', 'Hoodie unisex en felpa suave con logo clásico', 59.99, 'Activo'),
('Mouse Logitech MX Master', 'Ratón ergonómico inalámbrico con scroll infinito', 99.99, 'Inactivo'),
('Lámpara de Escritorio LED', 'Luz ajustable con 3 modos y carga USB', 29.50, 'Activo'),
('Botas Timberland', 'Botas impermeables de cuero para trekking', 149.00, 'Activo'),
('Monitor Dell 27"', 'Pantalla IPS Full HD con altavoces integrados', 199.99, 'Activo'),
('Cuaderno Moleskine', 'Libreta dura de 240 páginas rayada', 24.99, 'Activo'),
('Tostadora Cuisinart', 'Tostadora de 2 rebanadas con ajuste de dorado', 39.99, 'Inactivo'),
('Patineta Eléctrica Xiaomi', 'Scooter con motor 250W y batería 30km autonomía', 399.00, 'Activo'),
('Aros de Oro 14K', 'Pendientes simples para uso diario', 250.00, 'Activo'),
('Tapete de Yoga Manduka', 'Mat antideslizante de 6mm grosor', 89.99, 'Activo'),
('Kindle Paperwhite', 'Lector e-books impermeable con luz ajustable', 129.99, 'Activo'),
('Bufanda de Lana Cashmere', 'Bufanda suave en tono neutro para invierno', 79.50, 'Inactivo'),
('Escáner Canon', 'Escáner de documentos portátil A4', 89.00, 'Activo'),
('Set de Ollas Tefal', 'Juego de 5 piezas antiadherente inducción', 199.99, 'Activo'),
('Altavoz Bluetooth JBL', 'Speaker portátil resistente al agua IPX7', 129.00, 'Activo'),
('Batería Externa Anker', 'Power bank 20000mAh con carga rápida', 49.99, 'Inactivo'),
('Ventilador Dyson', 'Ventilador sin aspas torre con control remoto', 349.00, 'Activo'),
('Vela Aromática Yankee', 'Vela de soja con aroma vainilla 3 mechas', 29.99, 'Activo');