<?php
require_once '../config/config.php';
require_once '../config/database.php';

// Obtener la ruta actual
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Definir rutas
switch ($uri) {
    case '/':
        require '../pages/portada.php';
        break;
    case '/nosotros':
        require '../pages/empresa.php';
        break;
    case '/productos':
        require '../pages/productos.php';
        break;
    case '/contacto':
        require '../pages/contacto.php';
        break;
    default:
        http_response_code(404);
        echo "Página no encontrada.";
        break;
}
