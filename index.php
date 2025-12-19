<?php
require_once 'src/config.php';

$controller = $_GET['controller'] ?? '';
switch ($controller) {
    case 'productos':
        include 'src/Controllers/Productos/productos.php';
        break;
    default:
        echo '<h1>Sistema de Inventario Productos</h1>';
        echo '<a href="?controller=productos&action=listar">Ir a Gestión de Productos</a>';
}
?>