<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/estilos.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <title>Hielos Point</title>

    <style>
        a:hover {
            text-decoration: none;
            color: var(--color-secundario);
        }

        h1,
        h2 {
            color: var(--color-primario);
        }

        .buAgregar {
            color: white;
            background-color: var(--color-primario);
        }

        .menu-item a:hover {
            background-color: var(--color-primario);
            color: white;
        }

        .navbar__menu li:hover {
            background-color: var(--color-primario);
            border-radius: 10px;
            color: white;
        }

        .navbar__carrito button {
            background-color: var(--color-secundario);
            border: 0px solid;
        }

        .navbar__carrito button:hover {
            background-color: var(--color-primario);
            border: 0px solid;
        }

        .navbar__carrito-mobile button {
            background-color: var(--color-secundario);
            border: 0px solid;

        }

        .navbar__carrito-mobile button:hover {
            background-color: var(--color-primario);
            border: 0px solid;

        }

        .footer_empresa {
            background-color: var(--color-primario);
        }

        .footer-gob {
            background-color: var(--color-secundario);
        }

        .servicio__card__button button {
            background-color: var(--color-primario);
        }

        .bg-primario {
            background-color: var(--color-primario);
        }

        .formulario .submit {
            background-color: var(--color-primario);
        }

        .servicio-detalle__card__descripcion h4 {
            color: var(--color-primario);
        }

        .active {
            background-color: var(--color-primario);
            color: white;
            border-radius: 20px;
        }
    </style>

    <script src="../../public/assets/js/header.js"></script>
    <script src="../../public/assets/js/servicios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php
require_once '../config/database.php';

// Consultar datos de la tabla empresa

$query = $pdo->query("SELECT * FROM contacto LIMIT 1");
$contacto = $query->fetch(PDO::FETCH_ASSOC);
?>
<body>
    <header class="header">
        <div class="navbar-info" style="background-color: var(--color-primario);">
            <div class="navbar-info__item"><i class="fas fa-map-marker-alt"></i><?= htmlspecialchars($contacto['direccion'] ?? '') ?></div>
            <div class="navbar-info__item"><i class="fas fa-envelope"></i><?= htmlspecialchars($contacto['correo_electronico'] ?? '') ?></div>
            <div class="navbar-info__item"><i class="fas fa-mobile-alt"></i><?= htmlspecialchars($contacto['telefono1']) ?? '' ?> <?= htmlspecialchars($contacto['telefono2'] ?? '') ?> </div>
            <div class="navbar-info__item">
                <div class="redes__iconos">
                    <a target="_blank" href="<?= htmlspecialchars($contacto['instagram']) ?? '' ?>"><i class="fab fa-facebook"></i></a>
                    <a target="_blank" href="<?= htmlspecialchars($contacto['instagram']) ?? '' ?>"><i class="fab fa-instagram"></i></a>
                    <a target="_blank" href="<?= htmlspecialchars($contacto['tiktok']) ?? '' ?>"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-2">
            <div class="container-fluid navbar__contenido">
                <a class="navbar-brand navbar__logo" href="./">
                    <img src="assets/imagenes/logos/logo_color.png" alt="">

                </a>
                <div class="navbar__carrito-mobile">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="navbar__carrito__cantidad" id="carrito_cantidad">0</span>

                    </button>

                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <?php
                        $current_page = basename($_SERVER['REQUEST_URI']);
                        $menu_items = [
                            '' => 'Inicio',
                            'nosotros' => 'Nosotros',
                            'servicios' => 'Productos',
                            'contacto' => 'Contacto'
                        ];

                        foreach ($menu_items as $url => $title) {
                            $active_class = ($current_page == $url) ? 'active' : '';
                            echo "<li class='nav-item menu-item'>
                                    <a class='$active_class' aria-current='page' href='./$url'>$title</a>
                                </li>";
                        }
                        ?>
                    </ul>

                </div>
                <div class="navbar__carrito">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </button>
                    <span class="navbar__carrito__cantidad" id="carrito_cantidad_mobile">0</span>
                </div>

            </div>
        </nav>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header ">
                        <div class="modal-title-icon">
                            <i class="fas fa-check-circle"></i>
                            <h5 class="modal-title" id="exampleModalLabel">Has agregado estos productos a tu carrito</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id='modalBodyContent'>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn buWhatsapp " onclick="comprar()"><i class="fa-brands fa-whatsapp"></i> Whatsapp</button>
                    </div>
                </div>
            </div>
        </div>
    </header>