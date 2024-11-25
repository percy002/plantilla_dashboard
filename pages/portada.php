<?php 
include 'includes/navbar.php';

$query_empresa = $pdo->query("SELECT * FROM empresa LIMIT 1");
$empresa = $query_empresa->fetch(PDO::FETCH_ASSOC);

$query_portada = $pdo->query("SELECT * FROM portada LIMIT 1");
$portada = $query_portada->fetch(PDO::FETCH_ASSOC);
?>


<section>
    <!-- Seccion Carrusel -->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="<?php echo ($portada['imagen_carrusel1'] ?? '');?>" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="<?php echo ($portada['imagen_carrusel2'] ?? '') ?>" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="<?php echo ($portada['imagen_carrusel3'] ?? '') ?>" class="d-block w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- Seccion Historia -->
<section class="bg-concrete-50">
    <div class="historia container-xl">
        <div class="historia__contenido">
            <h2>Nos Presentamos</h2>
            <p><?php echo ($empresa['historia_resumen'] ?? '')  ?></p>
        </div>
        <div class="historia__logo">
            <img src="<?php $portada['logo_color'] ?>" alt="">
        </div>
    </div>
</section>

<!-- Seccion Nuestros Servicios  -->
<section class="bg-servicio">
    <?php include 'includes/grupoServicios.php' ?>
</section>

<!-- Seccion Contacto -->
<section class="contacto  bg-concrete-50">
    <?php include 'includes/mapFormulario.php' ?>
</section>

<?php include 'includes/footer.php' ?>

</body>

</html>