<?php
require_once '../../../src/Dao/Productos/productos.php';
require_once '../../../src/config.php';

$dao = new ProductoDAO();
$action = $_GET['action'] ?? 'listar';
$mensaje = '';

switch ($action) {
    case 'listar':
        $productos = $dao->listar();
        include '../../../Views/templates/productos/listar.php';
        break;

    case 'crear':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $descripcion = trim($_POST['descripcion'] ?? '');
            $precio = (float) ($_POST['precio'] ?? 0);
            $estado = $_POST['estado'] ?? 'Activo';
            if (!empty($nombre) && !empty($descripcion) && $precio > 0) {
                if ($dao->crear($nombre, $descripcion, $precio, $estado)) {
                    $mensaje = 'Creado exitosamente.';
                    header('Location: ?controller=productos&action=listar');
                    exit;
                } else {
                    $mensaje = 'Error al crear.';
                }
            } else {
                $mensaje = 'Datos inválidos.';
            }
        }
        include '../../../Views/templates/productos/formulario.php';
        break;

    case 'editar':
        $id = (int) ($_GET['id'] ?? 0);
        $producto = $dao->obtenerPorId($id);
        if (!$producto) {
            header('Location: ?controller=productos&action=listar');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $descripcion = trim($_POST['descripcion'] ?? '');
            $precio = (float) ($_POST['precio'] ?? 0);
            $estado = $_POST['estado'] ?? 'Activo';
            if (!empty($nombre) && !empty($descripcion) && $precio > 0) {
                if ($dao->actualizar($id, $nombre, $descripcion, $precio, $estado)) {
                    $mensaje = 'Actualizado exitosamente.';
                    header('Location: ?controller=productos&action=listar');
                    exit;
                } else {
                    $mensaje = 'Error al actualizar.';
                }
            } else {
                $mensaje = 'Datos inválidos.';
            }
        }
        include '../../../Views/templates/productos/formulario.php';
        break;

    case 'detalle':
        $id = (int) ($_GET['id'] ?? 0);
        $producto = $dao->obtenerPorId($id);
        if ($producto) {
            include '../../../Views/templates/productos/detalle.php';
        } else {
            header('Location: ?controller=productos&action=listar');
            exit;
        }
        break;

    case 'eliminar':
        $id = (int) ($_GET['id'] ?? 0);
        if ($id > 0) {
            $dao->eliminar($id);
        }
        header('Location: ?controller=productos&action=listar');
        exit;
        break;

    default:
        header('Location: ?controller=productos&action=listar');
}
?>