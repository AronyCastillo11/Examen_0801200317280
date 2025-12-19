<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= isset($producto) ? 'Editar' : 'Crear' ?> Producto</title>
    <style> form { max-width: 500px; } label { display: block; margin: 10px 0; } input, textarea, select { width: 100%; padding: 5px; } </style>
</head>
<body>
    <h1><?= isset($producto) ? 'Editar' : 'Crear' ?> Producto</h1>
    <?php if (isset($mensaje)): ?><p style="color: <?= str_contains($mensaje, 'Error') ? 'red' : 'green' ?>;"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
    <form method="POST">
        <label>Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre'] ?? '') ?>" required maxlength="100"></label>
        <label>Descripción: <textarea name="descripcion" rows="4" required maxlength="150"><?= htmlspecialchars($producto['descripcion'] ?? '') ?></textarea></label>
        <label>Precio: <input type="number" name="precio" step="0.01" min="0" value="<?= $producto['precio'] ?? '' ?>" required></label>
        <label>Estado:
            <select name="estado">
                <option value="Activo" <?= (isset($producto['estado']) && $producto['estado'] == 'Activo') ? 'selected' : '' ?>>Activo</option>
                <option value="Inactivo" <?= (isset($producto['estado']) && $producto['estado'] == 'Inactivo') ? 'selected' : '' ?>>Inactivo</option>
            </select>
        </label>
        <button type="submit"><?= isset($producto) ? 'Actualizar' : 'Crear' ?></button>
        <a href="?controller=productos&action=listar">Cancelar</a>
    </form>
</body>
</html>