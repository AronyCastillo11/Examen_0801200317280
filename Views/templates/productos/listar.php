<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listar Productos</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f4f4f4; }
        a { color: #007bff; text-decoration: none; margin-right: 10px; }
        .eliminar { color: #dc3545; }
    </style>
</head>
<body>
    <h1>Lista de Productos</h1>
    <?php if (isset($mensaje)): ?>
        <p style="color: green;"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>
    <a href="?controller=productos&action=crear">+ Crear Nuevo</a>
    <table>
        <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Estado</th><th>Acciones</th></tr>
        <?php foreach ($productos as $p): ?>
        <tr>
            <td><?= $p['producto_id'] ?></td>
            <td><?= htmlspecialchars($p['nombre']) ?></td>
            <td><?= htmlspecialchars($p['descripcion']) ?></td>
            <td>$<?= number_format($p['precio'], 2) ?></td>
            <td><?= htmlspecialchars($p['estado']) ?></td>
            <td>
                <a href="?controller=productos&action=detalle&id=<?= $p['producto_id'] ?>">Detalle</a>
                <a href="?controller=productos&action=editar&id=<?= $p['producto_id'] ?>">Editar</a>
                <a href="?controller=productos&action=eliminar&id=<?= $p['producto_id'] ?>" class="eliminar" onclick="return confirm('¿Eliminar?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>