<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle Producto</title>
    <style> dl { margin: 10px 0; } dt { font-weight: bold; } </style>
</head>
<body>
    <h1><?= htmlspecialchars($producto['nombre']) ?></h1>
    <dl>
        <dt>ID:</dt><dd><?= $producto['producto_id'] ?></dd>
        <dt>Descripción:</dt><dd><?= htmlspecialchars($producto['descripcion']) ?></dd>
        <dt>Precio:</dt><dd>$<?= number_format($producto['precio'], 2) ?></dd>
        <dt>Estado:</dt><dd><?= htmlspecialchars($producto['estado']) ?></dd>
    </dl>
    <a href="?controller=productos&action=listar">Volver</a>
</body>
</html>