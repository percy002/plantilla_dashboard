<?php
require_once '../config/database.php';

// Consultar productos
$query = $pdo->query("SELECT * FROM productos");
$productos = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <h1>Productos</h1>
    <ul>
        <?php foreach ($productos as $producto): ?>
            <li>
                <strong><?= htmlspecialchars($producto['nombre_producto']) ?></strong><br>
                Precio: <?= number_format($producto['precio'], 2) ?><br>
                Descripción: <?= htmlspecialchars($producto['descripcion']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
