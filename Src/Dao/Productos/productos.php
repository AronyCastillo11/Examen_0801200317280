<?php
require_once '../../../src/config.php';  // Ruta relativa desde Dao a src

class ProductoDAO {
    private $conn;

    public function __construct() {
        $this->conn = getConnection();
    }

    // Listar todos
    public function listar() {
        $sql = "SELECT * FROM productos ORDER BY nombre";
        $result = $this->conn->query($sql);
        $productos = [];
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
        return $productos;
    }

    // Crear
    public function crear($nombre, $descripcion, $precio, $estado) {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, estado) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $estado);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    // Obtener por ID (para editar/detalle)
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM productos WHERE producto_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $producto = $resultado->fetch_assoc();
        $stmt->close();
        return $producto;
    }

    // Actualizar
    public function actualizar($id, $nombre, $descripcion, $precio, $estado) {
        $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, estado=? WHERE producto_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdsi", $nombre, $descripcion, $precio, $estado, $id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    // Eliminar
    public function eliminar($id) {
        $sql = "DELETE FROM productos WHERE producto_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function __destruct() {
        $this->conn->close();
    }
}
?>